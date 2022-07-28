<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('post')->group(function (){
    Route::get('/', [PostController::class, 'index']);
    Route::get('/store', [PostController::class, 'store']);
    Route::get('/show', [PostController::class, 'show']);
    Route::get('/update', [PostController::class, 'update']);
    Route::get('/destroy', [PostController::class, 'destroy']);
});
