<?php

use App\Http\Controllers\ApdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\JenisBelanjaInventarisController;
use App\Http\Controllers\JenisPerlengkapanController;
use App\Http\Controllers\JenisProgramController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ModaPengadaanController;
use App\Http\Controllers\NonDiklatController;
use App\Http\Controllers\PembiayaanController;
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

Route::get('/', [LogController::class,'login'])->name('login')->middleware('guest');
Route::post('/', [LogController::class,'authenticate']);
Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [LogController::class,'store']);
Route::get('/logout', [LogController::class,'logout']);

Route::get('/home',[HomeController::class,'index'])->name('home')->middleware('auth');
Route::get('/rencana-kegiatan',[HomeController::class,'rencanakegiatan']);
Route::get('/tambah-kegiatan',[HomeController::class,'rencanakegiatannew']);
Route::post('/tambah-kegiatan',[HomeController::class,'rencanakegiatanstore']);
Route::get('/detail-rencana-kegiatan/{idkegiatan}',[HomeController::class,'detailkegiatan']);
Route::get('/cetak-kegiatan/{idkegiatan}',[HomeController::class,'cetakkegiatan']);

Route::get('/rencana-belanja',[HomeController::class,'rencanabelanja']);
Route::get('/tambah-rencana-belanja',[HomeController::class,'rencanabelanjanew']);
Route::post('/tambah-rencana-belanja',[HomeController::class,'rencanabelanjastore']);
Route::get('/detail-rencana-belanja/{idbelanjabarang}',[HomeController::class,'detailrencanabelanja']);
Route::get('/cetak-rencana-belanja/{idbelanjabarang}',[HomeController::class,'cetakrencanabelanja']);

Route::resource('/apd', ApdController::class)->middleware('superadmin');
Route::resource('/jenis-program', JenisProgramController::class)->middleware('superadmin');
Route::resource('/jen-keg-non-diklat', NonDiklatController::class)->middleware('superadmin');
Route::resource('/jenis-pembiayaan', PembiayaanController::class)->middleware('superadmin');
Route::resource('/jenis-perlengkapan', JenisPerlengkapanController::class)->middleware('superadmin');
Route::resource('/jenis-barang', JenisBarangController::class)->middleware('superadmin');
Route::resource('/jenis-belanja-inventaris', JenisBelanjaInventarisController::class)->middleware('superadmin');
Route::resource('/jenis-pengadaan', ModaPengadaanController::class)->middleware('superadmin');

Route::get('/profil','HomeController@halprof');