<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommittee;
use App\Http\Requests\UpdateCommittee;
use App\Models\Committee;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CommitteeController extends Controller
{
    public function index()
    {
        $api = config('app.api_url');
        return view('committee.index', compact('api'));
    }
}
