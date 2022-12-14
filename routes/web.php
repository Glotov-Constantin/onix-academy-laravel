<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Auth::routes();

Route::get('/admin', function() {
    return view('admin');
})->name('admin')->middleware('auth');

Route::prefix('posts')->group(function (){
    Route::get('', [PostController::class, 'index']);
    Route::get('{post}', [PostController::class, 'show']);
});

Route::prefix('admin/posts')->group(function (){
    Route::get('', [\App\Http\Controllers\admin\PostController::class, 'index']);
    Route::post('', [\App\Http\Controllers\admin\PostController::class, 'store']);
    Route::get('new', [\App\Http\Controllers\admin\PostController::class, 'create']);
    Route::get('{post}', [\App\Http\Controllers\admin\PostController::class, 'show']);
    Route::put('{post}', [\App\Http\Controllers\admin\PostController::class, 'update']);
    Route::delete('{post}/destroy', [\App\Http\Controllers\admin\PostController::class, 'destroy']);
});

Route::prefix('admin/tags')->group(function (){
    Route::get('', [\App\Http\Controllers\admin\TagController::class, 'index']);
    Route::post('', [\App\Http\Controllers\admin\TagController::class, 'store']);
    Route::get('new', [\App\Http\Controllers\admin\TagController::class, 'create']);
    Route::get('{tag}', [\App\Http\Controllers\admin\TagController::class, 'show']);
    Route::put('{tag}', [\App\Http\Controllers\admin\TagController::class, 'update']);
    Route::delete('{tag}/destroy', [\App\Http\Controllers\admin\TagController::class, 'destroy']);
});
