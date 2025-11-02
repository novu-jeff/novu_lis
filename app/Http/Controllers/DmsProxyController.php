<?php

// app/Http/Controllers/DmsProxyController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DmsProxyController extends Controller
{
    public function getDocuments(Request $request)
    {
        $dmsUrl = config('services.dms.url') . '/api/getdocuments';

        // forward only expected query params
        $params = $request->only(['tags','year','month','doc_date','type','page']);

        // make server-to-server request with secret token
        $response = Http::withHeaders([
            'X-API-KEY' => config('services.dms.token'),
            'Accept' => 'application/json',
        ])->get($dmsUrl, $params);

        // Optionally check status code and forward error
        if ($response->failed()) {
            return response()->json([
                'message' => 'DMS request failed',
                'details' => $response->json()
            ], $response->status());
        }

        // Forward the JSON response as-is
        return response()->json($response->json(), $response->status());
    }
}