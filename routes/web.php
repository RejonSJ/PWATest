<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::post('creategame', [App\Http\Controllers\HomeController::class, 'creategame'])->name('creategame');
Route::put('updategame', [App\Http\Controllers\HomeController::class, 'updategame'])->name('updategame');
Route::post('deletegame', [App\Http\Controllers\HomeController::class, 'deletegame'])->name('deletegame');

Route::post('/push-subscribe', [App\Http\Controllers\PushController::class, 'store']);