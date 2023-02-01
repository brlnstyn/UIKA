<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KesmasController;
use App\Http\Controllers\GiziController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileStrukturProgramController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('kesehatan-masyarakat', KesmasController::class);
Route::resource('gizi', GiziController::class);
Route::resource('profile-struktur-program-studi', ProfileStrukturProgramController::class);
