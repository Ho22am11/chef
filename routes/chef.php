<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chef\AuthController;
use App\Http\Controllers\Chef\CalendarController;
use App\Http\Controllers\Chef\ChefloctionController;
use App\Http\Controllers\Chef\ChefPaymentController;
use App\Http\Controllers\Chef\ChefProfileController;
use App\Http\Controllers\Chef\MenuController;
use App\Http\Controllers\Chef\OfferController;
use App\Http\Controllers\Chef\PlateController;
use App\Http\Controllers\Chef\ProfileImageController;
use App\Http\Controllers\Chef\RequestSettingController;

Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});

Route::middleware(['api','auth.guard:chef'])->group(function(){
    Route::resource('/profiles' , ChefProfileController::class);
    Route::resource('/upload_profile_images', ProfileImageController::class);
    Route::post('upload_profile' , [ProfileImageController::class , 'update'] );
    Route::resource('/loctions', ChefloctionController::class);
    Route::post('/calendars/{id}/edit', [CalendarController::class, 'edit']);
    Route::resource('/calendars', CalendarController::class)->except('show');
    Route::post('/calendars_show' , [CalendarController::class , 'show_data'] );
    Route::resource('/payments', ChefPaymentController::class);
    Route::resource('/plates', PlateController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/request_settings', RequestSettingController::class);
    Route::resource('/offers', OfferController::class);
}); 