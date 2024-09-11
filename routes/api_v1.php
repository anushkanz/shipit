<?php
    use App\Http\Controllers\Api\V1\UsersController;
    use App\Http\Controllers\Api\V1\TransportersController;

    Route::apiResource('users', UsersController::class);
    Route::apiResource('transporters', TransportersController::class);