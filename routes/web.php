<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/create', [ArticleController::class, 'create']);
Route::post('/articles/store', [ArticleController::class, 'store']);
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit']);
Route::put('/articles/{id}', [ArticleController::class, 'update']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::delete('/articles/{id}', [ArticleController::class, 'delete']);

Route::post('/comments/store', [CommentController::class, 'store']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// // Static route
// Route::get('/articles', function () {
//     return 'Article List';
// });

// // Static route
// Route::get('/articles/detail', function () {
//     return 'Article Detail';
// })->name('articles.detail'); // Route name

// // Dynamic route
// Route::get('/articles/detail/{id}', function ($id) {
//     // return "Article Detail - $id";
//     return 'Article Detail - '.$id;
// });

// // Dynamic route
// // students?id=1
// Route::get('/students/{id}', function ($id) {
//     return "Student Id - $id";
// });

// // Redirect
// Route::get('/articles/more', function() {
//     // return redirect('/articles/detail');
//     return redirect()->route('articles.detail');
// });

// Basic
// => resource/action/id
// resource -> articles, students, users, custsomers, products
// action -> create, update, delete, ...

// Sub route
// => users/detail/{id}/photos
// => articles/view/{id}/comment/add
// => students/show/{id}/classes

// URL Query
// students?id=1&gender=female


// Route::resource('photos', PhotoController::class);

// (or)

// Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
// Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
// Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
// ... 7 routes
// https://laravel.com/docs/11.x/controllers#actions-handled-by-resource-controllers
