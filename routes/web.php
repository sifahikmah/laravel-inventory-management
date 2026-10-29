<?php

use App\Models\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});

// Mengarahkan URL /barang ke fungsi index() di BarangController
Route::get('/barang', [BarangController::class, 'index']);

Route::get('/barang/create', [BarangController::class, 'create']);

Route::post('/barang', [BarangController::class, 'store']);

Route::get('/barang/{barang}/edit', [BarangController::class, 'edit']);
Route::put('/barang/{barang}', [BarangController::class, 'update']);

Route::delete('/barang/{barang}', [BarangController::class, 'destroy']);