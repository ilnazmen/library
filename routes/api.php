<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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
Route::post('forgot-password', [ForgotPasswordController::class, "sendResetLinkEmail"]);
Route::post('reset-password', [ResetPasswordController::class, "reset"]);
//Route::get('/reset-password',[ResetPasswordController::class,'create'])->name('password.reset');
//Route::post('/reset-password',[ResetPasswordController::class,'store'])->name('password.update');
//Route::post('/books/{book}',[BookController::class, 'update']);


//Route::get('/{any}','SpaController@index')->where('any','.*');
