<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumPhotoController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CmsProxyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LiveStreamController;
use App\Http\Controllers\WhitepaperController;


Route::get('/whitepaper', [WhitepaperController::class, 'index'])->name('whitepaper');

Route::get('/', function () {
    return view('home.home');
})->name('home.index');

Route::get('/login', function () {
    return redirect()->route('members.login');
})->name('login');

Route::resource('/members', MemberController::class)->only('index');

Route::resource('/standing-committee', CommitteeController::class)->only('index');
Route::get('api/standing-committee', [CommitteeController::class, 'apiIndex']);

Route::resource('/district-assignments', AssignmentController::class)->only('index');
Route::get('api/district-assignments', [AssignmentController::class, 'apiIndex']);

Route::resource('/photo-journals', AlbumController::class);

// Proxy to CMS: API routes live in routes/api.php (stateless). Storage below uses session.
Route::get('storage/{path}', [CmsProxyController::class, 'storage'])->where('path', '.*');

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

Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');

Route::get('api/members', [MemberController::class, 'apiIndex']);


Route::get('api/org-chart/members', [OrganizationController::class, 'loadNodes']);

Route::get('/live', [LiveStreamController::class, 'index'])->name('live.index');

Route::prefix('sb-members')->group(function () {

    Route::get('/login', [MemberAuthController::class, 'showLoginForm'])
        ->name('members.login');

    Route::post('/login', [MemberAuthController::class, 'login'])
        ->name('members.login.submit');

    Route::post('/logout', [MemberAuthController::class, 'logout'])
        ->name('members.logout');

    Route::middleware('auth:member')->group(function () {
        Route::get('/dashboard', function () {
            return view('members.dashboard');
        })->name('members.dashboard');
    });

    Route::get('/sessions', [SessionController::class,'index'])
    ->name('sessions.index');

    Route::get('/sessions/{id}/agenda', [SessionController::class,'agenda'])
        ->name('sessions.agenda');

    Route::post('/sessions/{id}/remark', [SessionController::class,'remark'])
        ->name('sessions.remark');

    Route::get('/sessions/document/{id}/remarks',
        [SessionController::class,'getRemarks']
    )->name('sessions.remarks.fetch');    
});

Route::middleware('auth:member')->prefix('sb-members')->group(function () {

    Route::get('/dashboard', [MemberDashboardController::class, 'index'])
        ->name('members.dashboard');

    Route::post('/upload', [MemberDashboardController::class, 'upload'])
        ->name('members.upload');

    Route::delete('/document/{id}', [MemberDashboardController::class, 'destroy'])
        ->name('members.document.delete');

    Route::get('/document/{id}/edit', [MemberDashboardController::class, 'edit'])
        ->name('members.document.edit');

    Route::put('/document/{id}', [MemberDashboardController::class, 'update'])
        ->name('members.document.update');

    Route::post('/document/{id}/forward', [MemberDashboardController::class, 'forward'])
        ->name('members.document.forward');   
        
    Route::post('/document/secure-action', 
        [MemberDashboardController::class, 'secureAction']
    )->name('members.document.secure');

    Route::get('/account', [MemberAuthController::class, 'showCredentialsForm'])
        ->name('members.account');
    Route::put('/account', [MemberAuthController::class, 'updateCredentials'])
        ->name('members.account.update');
});