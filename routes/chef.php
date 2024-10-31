<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chef\AuthController;




Route::prefix('auth')->group(function(){
    Route::post('/register' , [ AuthController::class , 'register']);
});

Route::middleware(['api','auth.guard:chef'])->group(function(){
    // all routes
}); 