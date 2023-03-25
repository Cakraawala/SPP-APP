<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\UserController;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class,'index'])->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::any('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/dashboard/laporan',[DashboardController::class, 'report']);


Route::controller(SiswaController::class)->group(function(){
    Route::get('/dashboard/data/siswa', 'index');
    Route::get('/dashboard/data/siswa/{id}/show', 'show');
    Route::post('/dashboard/data/siswa/store', 'store');
    Route::get('/dashboard/data/siswa/{id}', 'edit');
    Route::post('/dashboard/data/siswa/{id}/update', 'postedit');
    Route::any('/dashboard/data/siswa/{id}/delete', 'destroy');
});

Route::controller(KelasController::class)->group(function(){
    Route::get('/dashboard/data/kelas', 'index');
    Route::post('/dashboard/data/kelas/store', 'store');
    Route::get('/dashboard/data/kelas/{id}/edit', 'edit');
    Route::post('/dashboard/data/kelas/{id}/update' ,'postedit');
    Route::get('/dashboard/data/kelas/{id}', 'show');
    Route::any('/dashboard/data/kelas/{id}/delete', 'destroy');
});

Route::controller(SPPController::class)->group(function(){
    Route::get('/dashboard/data/spp', 'index');
    Route::post('/dashboard/data/spp/store', 'store');
    Route::get('/dashboard/data/spp/{id}/edit', 'edit');
    Route::get('/dashboard/data/spp/{id}', 'show');
    Route::post('/dashboard/data/spp/{id}/update', 'update');
    Route::any('/dashboard/data/spp/{id}/delete', 'destroy');
});


Route::controller(PembayaranController::class)->group(function(){
    Route::get('/dashboard/pembayaran', 'index');
    Route::post('/dashboard/pembayaran/store', 'store');
    Route::get('/dashboard/pembayaran/{id}', 'show');
    Route::GET('/dashboard/pembayaran/{id}/invoice', 'invoice');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/dashboard/user', 'index');
    Route::get('/dashboard/user/{id}', 'edit');
    Route::post('/dashboard/user/store', 'store');
    Route::post('/dashboard/user/{id}/update','post');
    Route::any('/dashboard/user/{id}/delete', 'destroy');
});

