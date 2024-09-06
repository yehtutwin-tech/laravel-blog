<?php

use App\Http\Controllers\API\ArticleControler;
use App\Http\Controllers\API\CategoryControler;
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

// Route::get('/articles', [ArticleControler::class, 'index']);
Route::apiResource('articles', ArticleControler::class);
Route::apiResource('categories', CategoryControler::class);
