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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']],function(){



    Route::post("review/create",[\App\Http\Controllers\ReviewController::class,'store']);



    Route::post("logout",[\App\Http\Controllers\AuthController::class,'logout']);

    Route::get("reviews/list/{employee?}",[\App\Http\Controllers\ReviewController::class,'show']);


});

Route::post("user/create",[\App\Http\Controllers\UserController::class,'store']);

Route::get("users",[\App\Http\Controllers\UserController::class,'index']);

Route::delete("user/delete/{id}",[\App\Http\Controllers\UserController::class,'destroy']);

Route::post("login",[\App\Http\Controllers\AuthController::class,'login']);

Route::get('listEmployee',[\App\Http\Controllers\ReviewController::class,'listReviewByEmployee']);

Route::get("reviews",[\App\Http\Controllers\ReviewController::class,'index']);
