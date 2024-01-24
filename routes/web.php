<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//top up
Route::get('/topup', [App\Http\Controllers\SaldoController::class, 'index'])->name('topup');
Route::post('/create', [App\Http\Controllers\SaldoController::class, 'store'])->name('topup.saldo');
Route::get('/topup/setuju{transaksi_id}', [App\Http\Controllers\SaldoController::class, 'update'])->name('topup.setuju');
Route::get('/topup/tolak{transaksi_id}', [App\Http\Controllers\SaldoController::class, 'destroy'])->name('topup.tolak');

//tariktunai
Route::get('/tariktunai', [App\Http\Controllers\TariktunaiController::class, 'index'])->name('tariktunai');
Route::post('/tariktunai/saldo', [App\Http\Controllers\TariktunaiController::class, 'store'])->name('tariktunai.saldo');
Route::get('/tariktunai/setuju{transaksi_id}', [App\Http\Controllers\TariktunaiController::class, 'update'])->name('tariktunai.setuju');
Route::get('/tariktunai/tolak{transaksi_id}', [App\Http\Controllers\TariktunaiController::class, 'destroy'])->name('tariktunai.tolak');


//produk

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::post('/addtocart{id}', [App\Http\Controllers\ProdukController::class, 'create'])->name('addtocart');
Route::get('/chekout', [App\Http\Controllers\ProdukController::class, 'store'])->name('chekout');
Route::get('/bayar', [App\Http\Controllers\ProdukController::class, 'update'])->name('bayar');
Route::get('/bayar/setuju{id}', [App\Http\Controllers\ProdukController::class, 'setuju'])->name('bayar.setuju');
Route::get('/bayar/tolak{id}', [App\Http\Controllers\ProdukController::class, 'tolak'])->name('bayar.tolak');




//crud produk
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/edit{id}', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/update{id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/delete{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.delete');


//riwayat

Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');