<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/books', BookController::class);
Route::apiResource('/genres', GenreController::class);
Route::apiResource('/statuses', StatusController::class);

//Route::get('/{any}','SpaController@index')->where('any','.*');
