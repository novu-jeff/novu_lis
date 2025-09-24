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
        $api = config('app.api_url');
        return view('photo-album.photo.index', compact('api', 'id'));
    }
}
