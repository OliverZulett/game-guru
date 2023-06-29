<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/roles', [RoleController::class, 'index'])->middleware(['auth', 'verified'])->name('roles');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->middleware(['auth', 'verified'])->name('roles.edit');
Route::put('/roles/update/{id}', [RoleController::class, 'update'])->middleware(['auth', 'verified'])->name('roles.update');
Route::get('/roles/create', [RoleController::class, 'create'])->middleware(['auth', 'verified'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->middleware(['auth', 'verified'])->name('roles.store');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->middleware(['auth', 'verified'])->name('roles.destroy');


Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
