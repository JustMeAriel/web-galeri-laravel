<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\GaleriController;
use  App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------------div>
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');
Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
Route::put('/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');









