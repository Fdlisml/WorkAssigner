<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexKaryawanController;
use App\Http\Controllers\pekerjaanAdminController;
use App\Http\Controllers\LaporanKaryawanController;
use App\Http\Controllers\LaporanAdminController;
use App\Http\Controllers\ProyekAdminController;
use App\Http\Controllers\PenggunaAdminController;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login_check', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['check.login', 'role:karyawan'])->group(function () {
   Route::prefix('karyawan')->group(function () {
       Route::get('/index', [IndexKaryawanController::class, 'index']);
       Route::get('/index/filter', [IndexKaryawanController::class, 'filter']);
       Route::get('/laporan', [LaporanKaryawanController::class, 'index']);
       Route::post('/laporan/store', [LaporanKaryawanController::class, 'store']);
       Route::post('/laporan/update/{id}', [LaporanKaryawanController::class, 'update']);
   });
});

Route::middleware(['check.login', 'role:admin'])->group(function () {
   Route::prefix('admin')->group(function () {
       Route::get('/index', [ProyekAdminController::class, 'index']);
       Route::post('/proyek/store', [ProyekAdminController::class, 'store']);
       Route::get('/proyek/edit/{id}', [ProyekAdminController::class, 'edit']);
       Route::post('/proyek/update/{id}', [ProyekAdminController::class, 'update']);
       Route::get('/proyek/destroy/{id}', [ProyekAdminController::class, 'destroy']);
       Route::get('/proyek/search', [ProyekAdminController::class, 'search']);
       Route::get('/pekerjaan', [PekerjaanAdminController::class, 'index']);
       Route::post('/pekerjaan/store', [PekerjaanAdminController::class, 'store']);
       Route::get('/pekerjaan/create/{id_proyek}', [PekerjaanAdminController::class, 'create_proyek_selected']);
       Route::get('/pekerjaan/edit/{id}', [PekerjaanAdminController::class, 'edit']);
       Route::post('/pekerjaan/update/{id}', [PekerjaanAdminController::class, 'update']);
       Route::get('/pekerjaan/destroy/{id}', [PekerjaanAdminController::class, 'destroy']);
       Route::get('/pekerjaan/search', [PekerjaanAdminController::class, 'search']);
       Route::get('/laporan', [LaporanAdminController::class, 'index']);
       Route::get('/laporan/destroy/{id}', [LaporanAdminController::class, 'destroy']);
       Route::get('/laporan/search', [LaporanAdminController::class, 'search']);
       Route::get('/user', [PenggunaAdminController::class, 'index']);
       Route::post('/user/store', [AuthController::class, 'store']);
       Route::get('/user/edit/{id}', [PenggunaAdminController::class, 'edit']);
       Route::post('/user/update/{id}', [PenggunaAdminController::class, 'update']);
       Route::get('/user/destroy/{id}', [PenggunaAdminController::class, 'destroy']);
       Route::get('/user/search', [PenggunaAdminController::class, 'search']);
   });
});