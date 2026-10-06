<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommittee;
use App\Http\Requests\UpdateCommittee;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CommitteeController extends Controller
{
    public function index()
    {
        $api = config('app.api_url');
        return view('committee.index', compact('api'));
    }

    public function apiIndex()
    {
        $committees = Committee::where('isActive', 1)
            ->orderBy('id')
            ->get()
            ->map(function (Committee $committee) {
                $members = CommitteeMember::where('standing_comittee_id', $committee->id)
                    ->where('isActive', 1)
                    ->orderBy('id')
                    ->get(['name', 'position']);

                return [
                    'id' => $committee->id,
                    'name' => $committee->name,
                    'members' => $members,
                ];
            });

        return response()->json([
            'data' => $committees,
        ]);
    }
}
