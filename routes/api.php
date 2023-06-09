<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::apiResource('posts', PostController::class);
Route::post('/posts/{id}', [PostController::class, 'update']);

Route::get('postsrandom', [PostController::class, 'random']);


Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user', [UserController::class, 'getUser']);


});

