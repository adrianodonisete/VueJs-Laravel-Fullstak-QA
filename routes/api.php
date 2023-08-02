<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;

const AUTH_SANCTUM = 'auth:sanctum';

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';


Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->middleware(AUTH_SANCTUM);
    Route::post('/register', RegisterController::class);
});

Route::middleware(AUTH_SANCTUM)
    ->get('/user', function (Request $request) {
        return $request->user();
    });
