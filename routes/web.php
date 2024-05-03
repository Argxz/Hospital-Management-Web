<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dokter/laporan', [DokterController::class, 'laporan'])->name('dokter.laporan');
Route::get('pasien/laporan', [PasienController::class, 'laporan'])->name('pasien.laporan');

Route::resource(name: 'pasien', controller: PasienController::class);
Route::resource(name: 'dokter', controller: DokterController::class);
