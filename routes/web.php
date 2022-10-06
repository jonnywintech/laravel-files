<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{folder}', [App\Http\Controllers\HomeController::class, 'indexAction'])->name('home.action');
Route::get('/home/{file_name}', [StoreController::class, 'downloadFile'])->name('home.download');
Route::put('/home', [StoreController::class, 'store'])->name('home.store');
