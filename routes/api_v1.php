<?php
    use App\Http\Controllers\Api\V1\UsersController;
    use App\Http\Controllers\Api\V1\TransportersController;
    use App\Http\Controllers\Api\V1\CustomAuthController;

    Route::apiResource('users', UsersController::class);
    Route::apiResource('transporters', TransportersController::class);
    //Route::apiResource('customauth', CustomAuthController::class);
    Route::post('/customlogin', [CustomAuthController::class, 'customLogin']);
    Route::post('/customforgotpassword', [CustomAuthController::class, 'customForgotPassword']);