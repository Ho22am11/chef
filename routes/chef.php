<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chef\AuthController;
use App\Http\Controllers\Chef\CalendarController;
use App\Http\Controllers\Chef\ChefloctionController;
use App\Http\Controllers\Chef\ChefPaymentController;
use App\Http\Controllers\Chef\ChefProfileController;
use App\Http\Controllers\Chef\PlateController;
use App\Http\Controllers\Chef\ProfileImageController;

Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});

Route::middleware(['api','auth.guard:chef'])->group(function(){
    Route::resource('/profiles' , ChefProfileController::class);
    Route::resource('/upload_profile_images', ProfileImageController::class);
    Route::resource('/loctions', ChefloctionController::class);
    Route::resource('/calendars', CalendarController::class);
    Route::resource('/payments', ChefPaymentController::class);
    Route::resource('/plates', PlateController::class);
}); 