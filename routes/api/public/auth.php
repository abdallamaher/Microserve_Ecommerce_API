<?php

Route::group(['prefix'=>'auth'], function () {

    Route::post('/register', ['Auth\RegisterController::class', 'register']);

});
