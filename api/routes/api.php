<?php

use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::prefix('zones')->group(function () {
        Route::get('/', [ZoneController::class, 'index']);
        Route::get('/{id}', [ZoneController::class, 'getOne']);
        Route::post('/', [ZoneController::class, 'store']);
        Route::put('/{id}', [ZoneController::class, 'update']);
        Route::delete('/{id}', [ZoneController::class, 'destroy']);
    });
});
