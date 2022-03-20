<?php


use App\Http\Controllers\OrderController;


Route::group(['prefix' => 'orders'], function () {

    Route::get('/', [OrderController::class, 'index']);

    Route::get('/{id}', [OrderController::class, 'show'])->where('id', '[0-9]+');

    Route::post('/', [OrderController::class, 'store']);

    Route::delete('/{id}', [OrderController::class, 'destroy'])->where('id', '[0-9]+');

    Route::post('/filter', [OrderController::class, 'filter']);

    Route::post('/product-search', [OrderController::class, 'search']);

});
