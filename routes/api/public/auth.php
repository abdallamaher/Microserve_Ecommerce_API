<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

Route::group(['prefix'=>'auth'], function () {

    Route::post('/register', [RegisterController::class, 'register']);

    Route::post('/login', [LoginController::class, 'login']);

});
