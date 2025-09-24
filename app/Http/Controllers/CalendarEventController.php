<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class CalendarEventController extends Controller
{
    public function index()
    {
        $api = config('app.api_url');
        return view('calendar-event.index', compact('api'));
    }
}