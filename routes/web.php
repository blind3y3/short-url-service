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

//Auth::routes();

Route::get('/', [\App\Http\Controllers\ShortLinkController::class, 'index'])->name('index');
Route::post('/', [\App\Http\Controllers\ShortLinkController::class, 'store'])->name('store');
Route::get('{token}', [\App\Http\Controllers\ShortLinkController::class, 'getShortLinkRedirect'])->name('getShortLinkRedirect');




