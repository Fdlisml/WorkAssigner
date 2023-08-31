<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexUserController;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Controllers\TugasAdminController;
use App\Http\Controllers\LaporanUserController;
use App\Http\Controllers\LaporanAdminController;
use App\Http\Controllers\ProjectAdminController;

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

Route::get('/', [IndexUserController::class, 'index'])->middleware(CheckLoginMiddleware::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_check', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::prefix('user')->group(function(){
   Route::get('/index', [IndexUserController::class, 'index'])->middleware(CheckLoginMiddleware::class);
   Route::get('/laporan', [LaporanUserController::class, 'index'])->middleware(CheckLoginMiddleware::class);
   Route::post('/laporan', [IndexUserController::class, 'laporan'])->middleware(CheckLoginMiddleware::class);
});

Route::prefix('admin')->group(function(){
   Route::get('/index', [ProjectAdminController::class, 'index'])->middleware(CheckLoginMiddleware::class);
   Route::get('/tugas', [TugasAdminController::class, 'index'])->middleware(CheckLoginMiddleware::class);
   Route::get('/laporan', [LaporanAdminController::class, 'index'])->middleware(CheckLoginMiddleware::class);
});