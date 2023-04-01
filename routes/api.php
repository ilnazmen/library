<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->with('role')->get();
});
Route::controller(AuthController::class)->group(function (){
    Route::post('login','login');
    Route::post('register','register');
});
Route::apiResource('/books', BookController::class);
Route::apiResource('/genres', GenreController::class);
Route::apiResource('/statuses', StatusController::class);
Route::apiResource('/users',UserController::class);
Route::apiResource('/roles',RoleController::class);
//Route::post('/books/{book}',[BookController::class, 'update']);


//Route::get('/{any}','SpaController@index')->where('any','.*');
