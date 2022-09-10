<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\BBSApiController;
use App\Http\Controllers\BBSController;

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

Route::get('/', [TopController::class, 'index'])->name('top');

//スレッド表示
Route::post('/api/bbs', [BBSApiController::class, 'show']);

//レス投稿
Route::post('/submit', [BBSController::class, 'submit']);