<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminMapelController;
use App\Http\Controllers\AdminMapelUjianController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AdminSoalController;
use App\Http\Controllers\AdminWaktuController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UjianController;

//routes login admin
Route::get('loginadmin', [LoginController::class, 'FormLoginAdmin']);
Route::post('loginadmin', [LoginController::class, 'LoginAdmin']);
Route::get('registeradmin', [RegisterController::class, 'FormRegisterAdmin']);
Route::post('registeradmin', [RegisterController::class, 'RegisterAdmin']);

Route::resource('admin', AdminController::class);
Route::resource('adminpendaftaran', AdminPendaftaranController::class);
Route::post('adminpendaftaran/cari', [AdminPendaftaranController::class, 'cariData']);
Route::resource('adminguru', AdminGuruController::class);
Route::post('adminguru/cari', [AdminGuruController::class, 'cariData']);
Route::resource('adminkelas', AdminKelasController::class);
Route::post('adminkelas/cari', [AdminKelasController::class, 'cariData']);
Route::resource('adminwaktu', AdminWaktuController::class);
Route::resource('adminmapel', AdminMapelController::class);
Route::post('adminmapel/cari', [AdminMapelController::class, 'cariData']);
Route::resource('adminsoal', AdminSoalController::class);
Route::post('adminsoal/cari', [AdminSoalController::class, 'cariData']);
Route::resource('adminmapelujian', AdminMapelUjianController::class);
Route::post('adminmapelujian/cari', [AdminMapelUjianController::class, 'cariData']);


Route::middleware('auth')->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('daftar', DaftarController::class);
    Route::post('daftar/updatefoto/{id}', [DaftarController::class, 'ubahFoto']);
    Route::resource('dokumen', DokumenController::class);
    Route::resource('ujian', UjianController::class);
    Route::resource('pengumuman', PengumumanController::class);
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();


