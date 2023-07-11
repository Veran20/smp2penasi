<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kelolaPenggunaController;
use App\Http\Controllers\PenasiController;
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
    return view('halamanAwal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/admin/kelolaPengguna', [kelolaPenggunaController::class, 'kelolaPengguna'])->name('dataPengguna');
Route::post('/admin/kelolaPengguna/tambah', [kelolaPenggunaController::class, 'tambahPengguna'])->name('tambahPengguna');
Route::patch('/admin/kelolaPengguna/ubahPengguna',[kelolaPenggunaController::class, 'ubahPengguna'])->name('ubahPengguna');
Route::get('/admin/ajaxadmin/dataPengguna/{id}', [kelolaPenggunaController::class, 'getPengguna'])->name('getPengguna');

Route::get('/admin/buatPenasi', [PenasiController::class, 'buatPenasi'])->name('penasi');
Route::post('/admin/buatPenasi/tambah', [PenasiController::class, 'tambahPenasi'])->name('tambahPenasi');