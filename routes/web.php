<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HomeController;
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

Route::GET('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/produk', [ProdukController::class, 'index']);

    Route::get('/kategori', [KategoriProdukController::class, 'index']);

    Route::get('/pesanan', [PesananController::class, 'index']);

});

Route::prefix('front')->group(function(){
    Route::get('/home', [HomeController::class, 'index']);
});