<?php


use App\Http\Controllers\CategoryController;


Route::group(['prefix' => 'categories'], function () {

    Route::get('/', [CategoryController::class, 'index']);

    Route::get('/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+');

});
