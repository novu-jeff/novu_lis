<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumPhotoController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function index(string $id)
    {
        // API: CMS URL. Images: same-origin so LIS proxy serves them (avoids CMS 404/cert).
        $api = rtrim(config('app.api_url'), '/');
        $imageBase = ''; // LIS URL for images (proxy at /storage/*)
        return view('photo-album.photo.index', compact('api', 'imageBase', 'id'));
    }

    public function apiIndex(string $id)
    {
        $album = Album::findOrFail($id);

        $photos = AlbumPhoto::where('album_id', $id)
            ->where('isActive', 1)
            ->orderBy('id')
            ->get();

        return response()->json([
            'parent' => $album,
            'data' => $photos,
        ]);
    }
}
