<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=> 'auth', 'namespace'=>"App\Http\Controllers\Api"], function () {
    Route::post("login", [UserController::class, "login"]);
    Route::post("signin", [UserController::class, "signin"]);
});

Route::post("/auth/logout", [UserController::class, "logout"])->middleware("auth:sanctum");