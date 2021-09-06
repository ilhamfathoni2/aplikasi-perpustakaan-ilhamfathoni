<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\TransaksiController;

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [PerpusController::class, 'home']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('pinjam');
Route::get('/detail-buku/{id}', [PerpusController::class, 'showdetails']);
Route::get('/kembali', [TransaksiController::class, 'showkembali']);
Route::post('/kembali', [TransaksiController::class, 'update'])->name('kembali');
Route::get('/tambah-buku', [PerpusController::class, 'showtambahbuku']);
Route::post('/tambah-buku', [PerpusController::class, 'storeBook'])->name('addbooks');

Route::get('/tambah-kategori', [PerpusController::class, 'showkategori']);
Route::post('/tambah-kategori', [PerpusController::class, 'storekategori'])->name('kategori');
Route::get('/{id}/{image}', [PerpusController::class, 'hapusBuku']);

// Route::resource('/transaksi', 'TransaksiController');
