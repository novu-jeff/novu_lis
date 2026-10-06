<?php

use App\Http\Controllers\CmsProxyController;
use Illuminate\Support\Facades\Route;

/*
| API proxy routes (stateless, no session/DB). Proxies to CMS to avoid
| browser ERR_CERT_AUTHORITY_INVALID when CMS uses self-signed cert.
*/
Route::get('photo-journals', [CmsProxyController::class, 'photoJournals']);
Route::get('photo-journals/photos/{id}', [CmsProxyController::class, 'photoJournalPhotos']);
