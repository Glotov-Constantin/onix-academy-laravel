<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('posts')->group(function (){
    Route::get('/', [\App\Http\Controllers\Api\PostController::class, 'index']);
//    Route::get('/', [\App\Http\Controllers\Api\PostController::class, 'store']);
//    Route::get('/{post}', [\App\Http\Controllers\Api\PostController::class, 'show']);
    Route::get('/{post}', [\App\Http\Controllers\Api\PostController::class, 'update']);
    Route::get('/{post}/destroy', [\App\Http\Controllers\Api\PostController::class, 'destroy']);
});

Route::prefix('users')->group(function (){
    Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'index']);
});
