<?php

use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/roles', [RoleController::class, 'getRoles']);
Route::get('/roles/{id}', [RoleController::class, 'getRoleById']);
Route::post('/roles', [RoleController::class, 'postRole']);
Route::patch('/roles/{id}', [RoleController::class, 'patchRole']);
Route::put('/roles/{id}', [RoleController::class, 'putRole']);
Route::delete('/roles/{id}', [RoleController::class, 'deleteRole']);