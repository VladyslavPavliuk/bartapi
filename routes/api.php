<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\v1\GalleryController;
use \App\Http\Controllers\Api\v1\ImageController;

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

Route::apiResource('/gallery',GalleryController::class);

Route::post('/gallery/{path}', [ImageController::class, 'store']);

Route::get('/images/{path?}', [ImageController::class, 'show'])
                ->where('path', '(.*)');

