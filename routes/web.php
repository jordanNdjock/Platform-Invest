<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MiningController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\LocalizationController;

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
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/register', [AuthController::class,'registerPost'])->name('register');
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'loginPost'])->name('login');
    Route::get('/forgot_password',[AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot_password',[AuthController::class, 'forgotPost'])->name('forgot');
    Route::get('/code',[AuthController::class, 'code'])->name('code');
    Route::post('/code',[AuthController::class, 'codePost'])->name('code');
    Route::get('/reinitialized',[AuthController::class, 'reinitialized'])->name('modify');
    Route::post('/reinitialized',[AuthController::class, 'reinitializedPost'])->name('modify');
});

Route::group(['middleware' => 'auth'], function(){
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profil', [DashboardController::class, 'indexProfil'])->name('profil');
Route::post('/profil', [DashboardController::class, 'postProfil'])->name('profil');
Route::get('/action', [ActionController::class, 'indexAction'])->name('action');
Route::get('/mining', [MiningController::class, 'indexMining'])->name('mining');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('locale', [LocalizationController::class,'getlang'])->name('getlang');
Route::get('locale/{lang}', [LocalizationController::class,'setLang'])->name('setlang');
