<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumPhotoController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.home');
})->name('home.index');

Route::resource('/members', MemberController::class)->only('index');

Route::resource('/standing-committee', CommitteeController::class)->only('index');

Route::resource('/district-assignments', AssignmentController::class)->only('index');

Route::resource('/photo-journals', AlbumController::class);

Route::get('/photo-journals/photos/{id}', [AlbumPhotoController::class, 'index'])->name('photo.index');

Route::resource('/organization', OrganizationController::class)->only('index');

Route::resource('/calendar-event', CalendarEventController::class)->only('index');

Route::resource('/barangay-officials', BarangayController::class)->only('index');

# reports

Route::get('/committee-reports', function () {
    return view('reports.committee-report.index');
})->name('committee-reports.index');

Route::get('/resolution', function () {
    return view('reports.resolution.index');
})->name('resolution.index');

Route::get('/ordinance', function () {
    return view('reports.ordinance.index');
})->name('ordinance.index');

Route::get('/session-meeting', function () {
    return view('reports.session-meeting.index');
})->name('session-meeting.index');

Route::get('/executive-order', function () {
    return view('reports.executive-order.index');
})->name('executive-order.index');


Route::get('api/org-chart/members', [OrganizationController::class, 'loadNodes']);