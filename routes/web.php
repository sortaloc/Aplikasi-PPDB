<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminKritiksaranController;
use App\Http\Controllers\AdminLatarbelakangController;
use App\Http\Controllers\AdminMapelController;
use App\Http\Controllers\AdminMapelUjianController;
use App\Http\Controllers\AdminPembagianController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\AdminSoalController;
use App\Http\Controllers\AdminTagihanController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminWaktuPendaftaranController;
use App\Http\Controllers\AdminWaktuUjianController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\VisiMisiController;

//routes login admin
Route::get('loginadmin', [LoginController::class, 'FormLoginAdmin']);
Route::post('loginadmin', [LoginController::class, 'LoginAdmin']);
Route::get('registeradmin', [RegisterController::class, 'FormRegisterAdmin']);
Route::post('registeradmin', [RegisterController::class, 'RegisterAdmin']);

Route::resource('admin', AdminController::class);
Route::resource('adminpendaftaran', AdminPendaftaranController::class);

Route::resource('adminguru', AdminGuruController::class);

Route::resource('adminkelas', AdminKelasController::class);

Route::resource('adminwaktuujian', AdminWaktuUjianController::class);
Route::resource('adminwaktupendaftaran', AdminWaktuPendaftaranController::class);
Route::resource('adminmapel', AdminMapelController::class);

Route::resource('adminsoal', AdminSoalController::class);

Route::resource('adminmapelujian', AdminMapelUjianController::class);

Route::resource('admintagihan', AdminTagihanController::class);

Route::resource('adminsiswa', AdminSiswaController::class);

Route::resource('adminpembagian', AdminPembagianController::class);
Route::resource('adminlatarbelakang', AdminLatarbelakangController::class);
Route::resource('adminkritiksaran', AdminKritiksaranController::class);

Route::resource('adminusers', AdminUserController::class);


Route::middleware('auth')->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('daftar', DaftarController::class);
    Route::post('daftar/updatefoto/{id}', [DaftarController::class, 'ubahFoto']);
    Route::resource('dokumen', DokumenController::class);
    Route::resource('ujian', UjianController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('tagihan', TagihanController::class);
    Route::resource('jadwal', JadwalController::class);
});

Route::resource('guru', GuruController::class);
Route::resource('sejarah', SejarahController::class);
Route::resource('visimisi', VisiMisiController::class);
Route::resource('kritiksaran', AdminKritiksaranController::class);

Route::get('/', function () {
    return view('index');
});

Auth::routes();


