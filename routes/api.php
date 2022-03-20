<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->middleware(['auth:sanctum', 'role:user'])->group(function () {
    foreach (File::allFiles(base_path('routes/api/user')) as $file) {
        require_once($file->getPathname());
    }
});


Route::prefix('guest')->middleware('api')->group(function () {
    foreach (File::allFiles(base_path('routes/api/public')) as $file) {
        require_once($file->getPathname());
    }
});
