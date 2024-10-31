<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;


Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
    Route::post('login' , [ AuthController::class , 'login']);
});

Route::middleware(['api','auth.guard:user'])->group(function(){
    Route::post('/logout' , [ AuthController::class , 'logout']);
    Route::post('/refresh' , [ AuthController::class , 'refresh']);
}); 