<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chef\AuthController;
use App\Http\Controllers\Chef\ChefProfileController;
use App\Http\Controllers\Chef\ProfileImageController;

Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});

Route::middleware(['api','auth.guard:chef'])->group(function(){
    Route::resource('/profiles' , ChefProfileController::class);
    Route::resource('/upload_profile_images', ProfileImageController::class);
}); 