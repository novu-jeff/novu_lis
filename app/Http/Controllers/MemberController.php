<?php

namespace App\Http\Controllers;

use App\Models\Member;
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
        $appUrl = rtrim(config('app.url'), '/');
        return view('member.index', compact('api', 'appUrl'));
    }

    /**
     * Show a single member. Fetches from CMS API (same as buguey).
     */
    public function show($id)
    {
        $api = rtrim(config('app.cms_internal_url', config('app.api_url')), '/');
        try {
            $response = Http::timeout(15)->get($api . '/api/members');
        } catch (\Throwable $e) {
            report($e);
            abort(502, 'Unable to reach members service.');
        }

        if (!$response->successful()) {
            abort(502, 'Members service returned an error.');
        }

        $data = $response->json('data');
        if (!is_array($data)) {
            abort(404);
        }

        $member = collect($data)->firstWhere('id', (int) $id);
        if (!$member || !is_array($member)) {
            abort(404);
        }

        // Normalize to object with safe defaults so view never 500s on missing keys
        $member = (object) array_merge([
            'name' => '',
            'position' => '',
            'image_path' => null,
            'description' => null,
        ], $member);

        return view('member.show', compact('member', 'api'));
    }

    public function apiIndex()
    {
        return response()->json([
            'data' => Member::orderBy('id')->get(),
        ]);
    }


}
