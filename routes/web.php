<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\DownloadController;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ContentController::class, 'index']);

// Profile Desa
Route::get('/visi-misi', [ContentController::class, 'getVisionAndMisionContent']);
Route::get('/perangkat-desa', [ContentController::class, 'getPerangkatDesaContent']);
Route::get('/profile-dusun', [ContentController::class, 'getProfileDusunContent']);
Route::get('/profile-dusun/{code}', [ContentController::class, 'getProfileDusunContentByCode']);

// Potensi Desa
Route::get('/potensi-desa', [ContentController::class, 'getPotensiDesaContent']);
Route::get('/potensi-desa/{code}', [ContentController::class, 'getPotensiDesaContentByCode']);

// Informasi
Route::get('/informasi', [ContentController::class, 'getInformasiContent']);
Route::get('/informasi/{code}', [ContentController::class, 'getInformasiContentByCode']);

// Downlaod
Route::get('/download-center', [ContentController::class, 'getDownloadContent']);
Route::get('/download/{code}', [DownloadController::class, 'getDownloadByCode']);