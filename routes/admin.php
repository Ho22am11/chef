<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;




Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});
