<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class,'logout']);

    Route::resource('book', BookController::class);
});

Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
// Route::post('book', [BookController::class, 'store']);
// Route::get('book', [BookController::class, 'index']);
// Route::get('book/{id}', [BookController::class, 'show']);
// Route::put('book/{id}', [BookController::class, 'update']);
// Route::delete('book/{id}', [BookController::class, 'destroy']);

// Route::resource('book',BookController::class)->middleware('auth');

