<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\UserController;

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

Route::get('/', [DestinasiController::class, 'beranda'])->name('beranda');

Route::get('/destinations', [DestinasiController::class, 'index'])->name('destinations');

/*ROUTE CRUD Destibasi*/
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
