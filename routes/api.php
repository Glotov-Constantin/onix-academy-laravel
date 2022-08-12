<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('post')->group(function (){
    Route::get('/', [PostController::class, 'index']);
    Route::get('/store', [PostController::class, 'store']);
    Route::get('/show', [PostController::class, 'show']);
    Route::get('/update', [PostController::class, 'update']);
    Route::get('/destroy', [PostController::class, 'destroy']);
});
