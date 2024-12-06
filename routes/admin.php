<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ServiceController;

Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});

Route::get('/cuisines' , [ CuisineController::class , 'index']);
Route::get('/services' , [ ServiceController::class , 'index']);
Route::get('/packages' , [ PackageController::class , 'index']);

Route::middleware(['api','auth.guard:admin'])->group(function(){
    Route::resource('services' , ServiceController::class )->except(['index','create', 'edit']);
    Route::resource('cuisines' , CuisineController::class )->except(['index','create', 'edit']);
    Route::resource('packages' , PackageController::class )->except(['index','create', 'edit']);
}); 