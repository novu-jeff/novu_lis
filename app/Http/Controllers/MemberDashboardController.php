<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberDocument;
use Illuminate\Support\Facades\Hash;

class MemberDashboardController extends Controller
{
    public function index()
    {
       
        $documents = MemberDocument::where(
            'member_account_id',
            auth('member')->id()
        )->latest()->get();

        return view('members.dashboard', compact('documents'));
    }

    public function edit($id)
    {
        $document = MemberDocument::where('id', $id)
            ->where('member_account_id', auth('member')->id())
            ->firstOrFail();

        return view('members.document-edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = MemberDocument::where('id', $id)
            ->where('member_account_id', auth('member')->id())
            ->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('file')) {
            \Storage::disk('public')->delete($document->file_path);

            $file = $request->file('file');
            $path = $file->store('member-documents', 'public');

            $data['file_name'] = $file->getClientOriginalName();
            $data['file_path'] = $path;
        }

        $document->update($data);

        return redirect()->route('members.dashboard')
            ->with('success', 'Document updated successfully.');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('file');

        $path = $file->store('member-documents', 'public');

        MemberDocument::create([
            'member_id' => auth('member')->user()->member_id,
            'member_account_id' => auth('member')->id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'status' => 'draft'
        ]);

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function destroy($id)
    {
        $document = MemberDocument::where('id', $id)
            ->where('member_account_id', auth('member')->id())
            ->firstOrFail();
            //dd($document);

        if (in_array($document->status, ['forwarded', 'approved', 'rejected'])) {
           // dd('Cannot delete forwarded document.');
            return back()->with('error', 'Cannot delete forwarded document.');
        }

        \Storage::disk('public')->delete($document->file_path);

        $document->delete();

        return back()->with('success', 'Document deleted successfully.');
    }


    public function forward($id)
    {
        $document = MemberDocument::where('id', $id)
            ->where('member_account_id', auth('member')->id())
            ->firstOrFail();

        if ($document->status !== 'draft') {
            return back()->with('error', 'Document already forwarded.');
        }

        $document->update([
            'status' => 'forwarded'
        ]);

        return back()->with('success', 'Document forwarded to SB Secretary.');
    }

    public function secureAction(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:member_documents,id',
            'action' => 'required|in:delete,forward,view',
            'password' => 'required'
        ]);

        $user = auth('member')->user();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Incorrect password.'
            ], 422);
        }

        $document = MemberDocument::where('id', $request->document_id)
            ->where('member_account_id', $user->id)
            ->firstOrFail();

        if ($request->action === 'delete') {
            if ($document->status !== 'draft') {
                return response()->json([
                    'status' => false,
                    'message' => 'Cannot delete forwarded document.'
                ], 422);
            }

            \Storage::disk('public')->delete($document->file_path);
            $document->delete();
        }

        if ($request->action === 'forward') {
            if ($document->status !== 'draft') {
                return response()->json([
                    'status' => false,
                    'message' => 'Already forwarded.'
                ], 422);
            }

            $document->update(['status' => 'forwarded']);
        }

        if ($request->action === 'view') {
            return response()->json([
                'status' => true,
                'redirect' => asset('storage/'.$document->file_path)
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Action successful.'
        ]);
    }
}
