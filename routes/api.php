<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user/{user}', function (Request $request) {
    return $request->user();
});

Route::middleware([
    "auth:sanctum",
    "access_tokens.set"
])->group(function () {
    Route::get('user-info', [UserController::class, "show"]);

    Route::prefix('ctm-post')->group(function () {
        Route::resource('posts', PostController::class);
    });

    Route::group(['prefix' => 'facebook'], function () {
        Route::get('/get-login-url', [FacebookPostController::class, 'getUrl']);
        Route::get('/get-user-pages', [FacebookPostController::class, 'getPages']);
        Route::get('/get-post-comments/{pageId}/{postId}', [CommentController::class, 'getFacebookPostComments']);
        Route::post('/create-comment/{pageId}/{postId}', [CommentController::class, 'store']);
        Route::post('/reply-to-comment/{pageId}/{commentId}', [CommentController::class, 'store']);
    });
});
