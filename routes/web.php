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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/subscribe', [App\Http\Controllers\SubscriprtionFormController::class, 'create'])->name('subscribe');
Route::get('/newspaper', [App\Http\Controllers\NewsPaperController::class, 'show'])->name('newspaper');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'Show'])->name('admin');

