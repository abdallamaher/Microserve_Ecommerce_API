<?php


use App\Http\Controllers\CategoryController;


Route::group(['prefix' => 'categories'], function () {

    Route::get('/', [CategoryController::class, 'index']);

    Route::get('/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+');

    Route::post('/', [CategoryController::class, 'store']);

    Route::post('/{id}', [CategoryController::class, 'update'])->where('id', '[0-9]+');

    Route::delete('/{id}', [CategoryController::class, 'destroy'])->where('id', '[0-9]+');

});
