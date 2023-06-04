<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\VaksinasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MainController;


use App\Http\Controllers\LoginController;

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


Route::get('', function () {
    return view('main.index', [
        // 'title' => 'Silahkan login terlebih dahulu'
    ]);
});
// Route::get('/main',[MainController::class,'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('kandang', KandangController::class);
Route::resource('member', MemberController::class);
Route::resource('periksa', PeriksaController::class);
Route::resource('vaksinasi', VaksinasiController::class);
Route::resource('laporan', LaporanController::class);

Route::post('kandang/create', [KandangController::class, 'create'])->name('kandang.create');
Route::match(['get', 'post'], 'kandang/edit/{id}', [KandangController::class, 'edit']);
Route::post('kandang/delete/{id}', [KandangController::class, 'delete']);

Route::post('member/create', [MemberController::class, 'createMember'])->name('member.create');
Route::match(['get', 'post'], 'member/edit/{id}', [MemberController::class, 'edit']);
Route::post('member/delete/{id}', [MemberController::class, 'delete']);

Route::post('periksa/create', [PeriksaController::class, 'createPeriksa'])->name('periksa.create');
Route::match(['get', 'post'], 'periksa/edit/{id}', [PeriksaController::class, 'edit']);
Route::post('periksa/delete/{id}', [PeriksaController::class, 'delete']);

Route::post('vaksinasi/create', [VaksinasiController::class, 'createVaksinasi'])->name('vaksinasi.create');
Route::match(['get', 'post'], 'vaksinasi/edit/{id}', [VaksinasiController::class, 'edit']);
Route::post('vaksinasi/delete/{id}', [VaksinasiController::class, 'delete']);

// Route::get('laporan/exportPdf/{id}',  [LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
Route::get('/exportPdf', [LaporanController::class, 'exportPdf'])->name('exportPdf');
Route::get('laporan/exportExcel/{id}', [LaporanController::class, 'exportExcel']);

Route::get('/printReview', [LaporanController::class, 'printReview'])->name('printReview');

Route::get('/filter',[LaporanController::class,'filter']);


