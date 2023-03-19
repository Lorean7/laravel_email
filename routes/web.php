<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::match(['get','post'],'/',[UserController::class,'index']);

Route::match(['get','post'],'/registration',[UserController::class,'registration']);

Route::match(['get','post'],'/auth',[UserController::class,'auth'])->name('auth');


Route::match(['get','post'],'/personal',[UserController::class,'personal'])->name('personal');

Route::match(['get','post'],'/user/add',[PostController::class,'add']);

Route::match(['get','post'],'/message',[PostController::class,'checkData']);

Route::match(['get','post'],'/process-data',[PostController::class,'processData']);
