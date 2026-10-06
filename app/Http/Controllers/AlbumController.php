<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function index()
    {
        // API: CMS URL so browser calls CMS directly. Images: same-origin so LIS proxy serves them (avoids CMS 404/cert).
        $api = rtrim(config('app.api_url'), '/');
        $imageBase = ''; // LIS URL for images (proxy at /storage/*)
        return view('photo-album.index', compact('api', 'imageBase'));
    }

    public function apiIndex(Request $request)
    {
        $perPage = (int) $request->query('per_page', 12);

        $albums = Album::orderBy('id')->paginate($perPage);

        return response()->json([
            'data' => $albums,
        ]);
    }
}
