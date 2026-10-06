<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionMeeting;
use App\Models\SessionDocument;
use App\Models\DocumentRemark;

class SessionController extends Controller
{

    public function index()
    {
        $sessions = SessionMeeting::whereIn('status', ['upcoming', 'ongoing', 'completed', 'cancelled'])
        ->whereIn('id', SessionDocument::select('session_id'))
        ->orderBy('session_date')
        ->get();

    return view('sessions.index', compact('sessions'));
    }

    public function agenda($id)
    {
        $session = SessionMeeting::findOrFail($id);

        $documents = SessionDocument::where('session_id', $id)
        ->with([
            'document.member',
            'document.documentRemarks' => function ($q) {
                $q->whereNull('parent_id')
                ->with([
                    'member.member',
                    'replies.member.member'
                ]);
            }
        ])
        ->orderBy('agenda_order')
        ->get();

        

        return view('sessions.agenda', compact('session','documents'));
    }

    public function remark(Request $request)
    {

        $request->validate([
            'document_id' => 'required',
            'remark' => 'required'
        ]);
    
        DocumentRemark::create([
    
            'document_id' => $request->document_id,
            'parent_id' => $request->parent_id ?? null,
            'member_account_id' => auth('member')->id(),
            'remark' => $request->remark
    
        ]);
    
        return back()->with('success','Remark added.');

    }

    public function getRemarks($id)
    {
        $remarks = DocumentRemark::where('document_id',$id)
            ->with('member.member')
            ->latest()
            ->get();

        return response()->json($remarks);
    }

}