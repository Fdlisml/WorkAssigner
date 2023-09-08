<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexUserController;
use App\Http\Controllers\TugasAdminController;
use App\Http\Controllers\LaporanUserController;
use App\Http\Controllers\LaporanAdminController;
use App\Http\Controllers\ProjectAdminController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckRole;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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

Route::get('/', [IndexUserController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_check', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['check.login', 'role:user'])->group(function () {
   Route::prefix('user')->group(function () {
       Route::get('/index', [IndexUserController::class, 'index']);
       Route::get('/laporan', [LaporanUserController::class, 'index']);
       Route::post('/laporan/store', [IndexUserController::class, 'store']);
       Route::post('/laporan/update/{id}', [IndexUserController::class, 'update']);
   });
});

Route::middleware(['check.login', 'role:admin'])->group(function () {
   Route::prefix('admin')->group(function () {
       Route::get('/index', [ProjectAdminController::class, 'index']);
       Route::post('/project/store', [ProjectAdminController::class, 'store']);
       Route::get('/tugas', [TugasAdminController::class, 'index']);
       Route::post('/tugas/store', [TugasAdminController::class, 'store']);
       Route::get('/laporan', [LaporanAdminController::class, 'index']);
       Route::get('/project/destroy/{id}', [ProjectAdminController::class, 'destroy']);
       Route::get('/project/edit/{id}', [ProjectAdminController::class, 'edit']);
       Route::post('/project/update/{id}', [ProjectAdminController::class, 'update']);
       Route::get('/laporan/destroy/{id}', [LaporanAdminController::class, 'destroy']);
       Route::post('/laporan/update/{id}', [LaporanAdminController::class, 'update']);
       Route::get('/tugas/destroy/{id}', [TugasAdminController::class, 'destroy']);
       Route::get('/tugas/edit/{id}', [TugasAdminController::class, 'edit']);
       Route::post('/tugas/update/{id}', [TugasAdminController::class, 'update']);
   });
});