<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Proxy to CMS to avoid browser SSL errors (ERR_CERT_AUTHORITY_INVALID).
 * Server-side requests can disable SSL verification.
 */
class CmsProxyController extends Controller
{
    public function photoJournals(Request $request)
    {
        $base = rtrim(config('app.cms_api_url', config('app.api_url')), '/');
        $url = $base . '/api/photo-journals?' . $request->getQueryString();

        $response = Http::withOptions(['verify' => false])
            ->timeout(15)
            ->get($url);

        return response($response->body(), $response->status())
            ->header('Content-Type', 'application/json');
    }

    public function photoJournalPhotos(string $id)
    {
        $base = rtrim(config('app.cms_api_url', config('app.api_url')), '/');
        $url = $base . '/api/photo-journals/photos/' . $id;

        $response = Http::withOptions(['verify' => false])
            ->timeout(15)
            ->get($url);

        return response($response->body(), $response->status())
            ->header('Content-Type', 'application/json');
    }

    /**
     * Stream a file from CMS storage (avoids browser hitting CMS cert).
     */
    public function storage(string $path)
    {
        $base = rtrim(config('app.cms_api_url', config('app.api_url')), '/');
        $url = $base . '/storage/' . $path;

        $response = Http::withOptions(['verify' => false])
            ->timeout(15)
            ->withHeaders(['Accept' => '*/*'])
            ->get($url);

        if (!$response->successful()) {
            abort($response->status());
        }

        $contentType = $response->header('Content-Type') ?: 'application/octet-stream';
        $filename = basename($path);

        return response($response->body(), $response->status(), [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
}
