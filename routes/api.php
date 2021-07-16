<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\FacebookPostController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('ctm-post')->group(function () {
    // Route::post('posts', [PostController::class, 'store']);
    // Route::get('posts', [PostController::class, 'index']);
    // Route::get('posts/{id}', [PostController::class, 'show']);
    // Route::patch('posts/{id}', [PostController::class, 'update']);
    // Route::delete('posts/{id}', [PostController::class, 'destroy']);

    Route::resource('posts', PostController::class);

    Route::prefix('facebook')->group(function () {
        Route::get('/get-login-url', [FacebookPostController::class, 'getUrl']);
    });
});
