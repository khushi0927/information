<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LmsController;

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
Route::get('/', [LmsController::class,'show']);   

Route::post('/store', [LmsController::class,'store']);

Route::get('/edit/{id}', [LmsController::class,'edit']);
Route::post('/update/{id}', [LmsController::class,'update']);

Route::get('/delete/{id}', [LmsController::class,'destroy']);
