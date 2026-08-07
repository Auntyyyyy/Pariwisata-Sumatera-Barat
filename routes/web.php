<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtraksiController;



Route::get('/', [DestinasiController::class, 'beranda'])->name('beranda');
Route::get('/destinations', [DestinasiController::class, 'index'])->name('destinations');

/*ROUTE CRUD Destinasi*/
Route::get('/destinations/create', [DestinasiController::class, 'create'])->name('destinations.create');
Route::post('/destinations', [DestinasiController::class, 'store'])->name('destinations.store');
Route::get('/destinations/{id}/edit', [DestinasiController::class, 'edit'])->name('destinations.edit');
Route::put('/destinations/{id}', [DestinasiController::class, 'update'])->name('destinations.update');
Route::delete('/destinations/{id}', [DestinasiController::class, 'destroy'])->name('destinations.destroy');
 
// Route {id} generik selalu PALING BAWAH:
Route::get('/destinations/{id}', [DestinasiController::class, 'show'])->name('destinations.detail');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

 // Route untuk halaman USER/Role //
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Route untuk halaman ATRAKSI //
Route::get('/atraksi', [AtraksiController::class, 'index'])->name('atraksi');
Route::get('/atraksi/create', [AtraksiController::class, 'create'])->name('atraksi.create');
Route::post('/atraksi', [AtraksiController::class, 'store'])->name('atraksi.store');
Route::get('/atraksi/{id}/edit', [AtraksiController::class, 'edit'])->name('atraksi.edit');
Route::put('/atraksi/{id}', [AtraksiController::class, 'update'])->name('atraksi.update');
Route::delete('/atraksi/{id}', [AtraksiController::class, 'destroy'])->name('atraksi.destroy');

