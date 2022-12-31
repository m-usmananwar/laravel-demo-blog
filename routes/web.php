<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [App\Http\Controllers\ListingController::class, 'index'])->name('index');
    Route::get('/login', [App\Http\Controllers\UserController::class, 'showLogin'])->name('show-login');
    Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::get('/register', [App\Http\Controllers\UserController::class, 'showRegister'])->name('show-register');
    Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
    Route::get('/all-articles', [App\Http\Controllers\ListingController::class, 'allArticles'])->name('all-articles');
});
Route::get('/article/{id}/detail', [App\Http\Controllers\ListingController::class, 'show'])->name('detail');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\ListingController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [App\Http\Controllers\ListingController::class, 'create'])->name('show-create');
    Route::post('/create', [App\Http\Controllers\ListingController::class, 'store'])->name('create');
    Route::get('/article/{id}', [App\Http\Controllers\ListingController::class, 'edit'])->name('show-edit');
    Route::put('/article/{id}', [App\Http\Controllers\ListingController::class, 'update'])->name('update');
    Route::delete('/article/{id}', [App\Http\Controllers\ListingController::class, 'destroy'])->name('delete');
});
