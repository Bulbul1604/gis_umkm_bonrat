<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\DataUMKMController;
use App\Http\Controllers\KelompokUsahaController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\UMKMController;
use App\Models\UMKM;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $umkms = UMKM::get();
    return view('index', compact('umkms'));
})->name('welcome');

Route::get('/detail/{id}', function ($id) {
    $umkm = UMKM::findOrFail($id);
    return view('detailMap', compact('umkm'));
})->name('detail-map');

Route::get('/detail-rute/{id}', function ($id) {
    $umkm = UMKM::findOrFail($id);
    return view('mapRute', compact('umkm'));
})->name('detail-map-rute');

Auth::routes();

Route::get('/map', function () {
    return view('map');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['role:admin,umkm']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
    Route::resource('users', UsersController::class)->except('show');
    Route::resource('kelurahan', KelurahanController::class)->except('show');
    Route::resource('kelompok_usaha', KelompokUsahaController::class)->except('show');
    Route::resource('umkm', UMKMController::class);
});
Route::group(['prefix' => 'umkm', 'middleware' => ['auth', 'role:umkm'], 'as' => 'umkm.'], function () {
    Route::resource('data', DataUMKMController::class);
});
