<?php

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/authors/search', [\App\Http\Controllers\Api\AuthorController::class, 'search'])->name('authors.search');
Route::get('/books/search', [\App\Http\Controllers\Api\BookController::class, 'search'])->name('books.search');

Route::apiResource('authors', \App\Http\Controllers\Api\AuthorController::class);
Route::apiResource('books', \App\Http\Controllers\Api\BookController::class);

