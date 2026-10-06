<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Models\Assignment;
use App\Models\AssignmentMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AssignmentController extends Controller
{
    public function index()
    {
        $api = config('app.api_url');
        return view('assignments.index', compact('api'));
    }

    public function apiIndex()
    {
        $assignments = Assignment::where('isActive', 1)
            ->orderBy('id')
            ->get()
            ->map(function (Assignment $assignment) {
                $members = AssignmentMember::where('assignment_id', $assignment->id)
                    ->where('isActive', 1)
                    ->orderBy('id')
                    ->get(['name', 'position']);

                return [
                    'id' => $assignment->id,
                    'name' => $assignment->name,
                    'members' => $members,
                ];
            });

        return response()->json([
            'data' => $assignments,
        ]);
    }
}
