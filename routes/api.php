<?php

use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cuisines' , [ CuisineController::class , 'index']);
Route::get('/services' , [ ServiceController::class , 'index']);
Route::get('/packages' , [ PackageController::class , 'index']);