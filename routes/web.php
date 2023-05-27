<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\MemberController;


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
    return view('login.login', [
        'title' => 'Silahkan login terlebih dahulu'
    ]);
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('kandang', KandangController::class);
Route::resource('member', MemberController::class);
Route::resource('periksa', PeriksaController::class);

Route::post('kandang/create', [KandangController::class, 'create'])->name('kandang.create');
Route::match(['get', 'post'], 'kandang/edit/{id}', [KandangController::class, 'edit']);
Route::post('kandang/delete/{id}', [KandangController::class, 'delete']);

Route::post('member/create', [MemberController::class, 'createMember'])->name('member.create');
Route::match(['get', 'post'], 'member/edit/{id}', [MemberController::class, 'edit']);
Route::post('member/delete/{id}', [MemberController::class, 'delete']);

Route::post('periksa/create', [PeriksaController::class, 'createPeriksa'])->name('periksa.create');
// Route::match(['get', 'post'], 'member/edit/{id}', [MemberController::class, 'edit']);
// Route::post('member/delete/{id}', [MemberController::class, 'delete']);

