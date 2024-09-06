<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function() {
    return 'API Get Request';
});

Route::post('/', function() {
    return 'API Post Request';
});

// Route::get('/articles', [ArticleController::class, 'index']);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('categories', CategoryController::class);
