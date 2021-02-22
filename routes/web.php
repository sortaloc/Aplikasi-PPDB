<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengumumanController;

//routes login admin
Route::get('loginadmin', [LoginController::class, 'FormLoginAdmin']);
Route::post('loginadmin', [LoginController::class, 'LoginAdmin']);
Route::get('registeradmin', [RegisterController::class, 'FormRegisterAdmin']);
Route::post('registeradmin', [RegisterController::class, 'RegisterAdmin']);

Route::resource('admin', AdminController::class);
Route::resource('adminpendaftaran', AdminPendaftaranController::class);
Route::post('adminpendaftaran/cari', [AdminPendaftaranController::class, 'cariData']);
Route::resource('adminguru', AdminGuruController::class);



Route::middleware('auth')->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('daftar', DaftarController::class);
    Route::post('daftar/updatefoto/{id}', [DaftarController::class, 'ubahFoto']);
    Route::resource('dokumen', DokumenController::class);
    Route::resource('pengumuman', PengumumanController::class);
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();


