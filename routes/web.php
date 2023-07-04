<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Redirect::to('/dashboard');
});

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Roles Routes
Route::get('/roles', [RoleController::class, 'index'])->middleware(['auth', 'verified'])->name('roles');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->middleware(['auth', 'verified'])->name('roles.edit');
Route::put('/roles/update/{id}', [RoleController::class, 'update'])->middleware(['auth', 'verified'])->name('roles.update');
Route::get('/roles/create', [RoleController::class, 'create'])->middleware(['auth', 'verified'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->middleware(['auth', 'verified'])->name('roles.store');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->middleware(['auth', 'verified'])->name('roles.destroy');

// Categories Routes
Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('categories');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('categories.update');
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('categories.store');
Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('categories.destroy');

// Tags Routes
Route::get('/tags', [TagController::class, 'index'])->middleware(['auth', 'verified'])->name('tags');
Route::get('/tags/edit/{id}', [TagController::class, 'edit'])->middleware(['auth', 'verified'])->name('tags.edit');
Route::put('/tags/update/{id}', [TagController::class, 'update'])->middleware(['auth', 'verified'])->name('tags.update');
Route::get('/tags/create', [TagController::class, 'create'])->middleware(['auth', 'verified'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->middleware(['auth', 'verified'])->name('tags.store');
Route::get('/tags/delete/{id}', [TagController::class, 'destroy'])->middleware(['auth', 'verified'])->name('tags.destroy');

// Users Routes
Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('users.create');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('users.update');
Route::get('/users/{id}', [UserController::class, 'preview'])->middleware(['auth', 'verified'])->name('users.preview');
Route::post('/users', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('users.store');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('users.destroy');


// Posts Routes
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts.store');
Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('posts.destroy');

// Posts Routes
Route::get('/my-posts/{id}', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('my-posts');
Route::get('/my-posts/edit/{id}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('my-posts.edit');
Route::put('/my-posts/update/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('my-posts.update');
Route::get('/my-posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('my-posts.create');
Route::post('/my-posts', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('my-posts.store');
Route::get('/my-posts/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('my-posts.destroy');

require __DIR__.'/auth.php';
