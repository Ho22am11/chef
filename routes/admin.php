<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\ServiceController;

Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});

Route::middleware(['api','auth.guard:admin'])->group(function(){
    Route::resource('services' , ServiceController::class )->except(['create', 'edit']);
    Route::resource('cuisines' , CuisineController::class )->except(['create', 'edit']);
}); 