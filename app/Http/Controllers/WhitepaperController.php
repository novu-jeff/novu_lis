<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WhitepaperController extends Controller
{
    public function index(): View
    {
        return view('whitepaper.index', [
            'productName' => 'LIS',
            'productLabel' => 'Legislative Information System',
            'homeRoute' => route('home.index'),
            'loginRoute' => \Illuminate\Support\Facades\Route::has('members.login')
                ? route('members.login')
                : route('home.index'),
            'loginLabel' => \Illuminate\Support\Facades\Route::has('members.login')
                ? 'SB Member Login'
                : 'Home',
        ]);
    }
}
