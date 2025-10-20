<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BarangayOfficialController;

Route::get('/barangay-officials', [BarangayOfficialController::class, 'index']);



