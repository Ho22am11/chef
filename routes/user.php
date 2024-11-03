<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\DataController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\OrderController;

Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
    Route::post('login' , [ AuthController::class , 'login']);
});

Route::middleware(['api','auth.guard:user'])->group(function(){
    Route::post('/date_update/{id}' , [ DataController::class , 'update']);

}); 
Route::resource('/orders' , OrderController::class)->except(['index', 'create']);
Route::post('/feedback' , [ FeedbackController::class , 'store']);
