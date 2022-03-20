<?php


use App\Http\Controllers\ProductController;

Route::group(['prefix' => 'products'], function () {

    Route::get('/', [ProductController::class, 'index']);

    Route::get('/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');

    Route::post('/', [ProductController::class, 'store']);

    Route::post('/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');

    Route::delete('/{id}', [ProductController::class, 'destroy'])->where('id', '[0-9]+');

    Route::post('/filter', [ProductController::class, 'filter']);

    Route::post('/product-search', [ProductController::class, 'search']);

});
