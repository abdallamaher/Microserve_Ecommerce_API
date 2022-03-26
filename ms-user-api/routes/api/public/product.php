<?php


use App\Http\Controllers\ProductController;

Route::group(['prefix' => 'products'], function () {

    Route::get('/', [ProductController::class, 'index']);

    Route::get('/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');

});
