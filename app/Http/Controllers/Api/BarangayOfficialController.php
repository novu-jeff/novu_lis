<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangayOfficial;
use Illuminate\Http\Request;

class BarangayOfficialController extends Controller
{
    public function index(Request $request)
    {
        $query = BarangayOfficial::with('barangay');

        // Optional filter by barangay_id
        if ($request->filled('barangay_id')) {
            $query->where('barangay_id', $request->barangay_id);
        }

        return response()->json([
            'data' => $query->orderBy('sort_order', 'asc')->get()
        ]);
    }
}
