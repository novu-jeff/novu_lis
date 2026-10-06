<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $api = config('app.api_url');
        return view('member.index', compact('api'));
    }

    /**
     * Show a single member. Fetches from CMS API (LIS has no local members table).
     */
    public function show($id)
    {
        $api = config('app.api_url');
        $apiInternal = config('app.api_url_internal', $api);
        $url = rtrim($apiInternal, '/') . '/api/members';

        $client = Http::timeout(10);
        $internalHost = parse_url($apiInternal, PHP_URL_HOST);
        if (in_array($internalHost, ['127.0.0.1', 'localhost'], true)) {
            $publicHost = parse_url($api, PHP_URL_HOST);
            if ($publicHost) {
                $client = $client->withHeaders(['Host' => $publicHost]);
            }
        }
        $response = $client->get($url);

        if (!$response->successful() || empty($response->json('data'))) {
            abort(404);
        }

        $member = collect($response->json('data'))->firstWhere('id', (int) $id);
        if (!$member) {
            abort(404);
        }

        $member = (object) $member;
        return view('member.show', compact('member', 'api'));
    }
}
