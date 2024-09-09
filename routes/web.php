<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// User
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

// Admin
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    // return view('welcome');
    return redirect('/articles');
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

Route::resource('categories', CategoryController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('user.dashboard');

Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');

// // Static route
// Route::get('/articles', function () {
//     return 'Article List';
// });

// Static route
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

// Redirect
// use Illuminate\Support\Facades\Redirect;
// Route::get('/articles/more', function() {
    // return redirect('/articles/detail');
    // return redirect()->route('articles.detail');
    // return redirect()->to('/articles/detail');
    // return Redirect()->to('/articles/detail');
    // return Redirect('/articles/detail');
    // return to_route('articles.detail');
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
