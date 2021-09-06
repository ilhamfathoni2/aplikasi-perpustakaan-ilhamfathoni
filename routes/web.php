<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusController;

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [PerpusController::class, 'home']);
Route::get('/tambah-buku', [PerpusController::class, 'showtambahbuku']);
Route::post('/tambah-buku', [PerpusController::class, 'storeBook'])->name('addbooks');
Route::get('/{id}/{image}', [PerpusController::class, 'hapusBuku']);
