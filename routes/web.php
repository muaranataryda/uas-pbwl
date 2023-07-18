<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\JuaraController;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/kategori', KategoriController::class)->middleware('auth');
Route::resource('/peserta', PesertaController::class)->middleware('auth');
Route::resource('/juara', JuaraController::class)->middleware('auth');