<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\TerritoryController;
use App\Http\Controllers\API\UserController;

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

Route::namespace('API')->group(function(){
    Route::post('admin-login', [AdminController::class, 'AdminLogin']);
    Route::post('user-login', [UserController::class, 'login']);
    Route::post('user-register',[UserController::class, 'register']);
    Route::middleware('auth:api')->group(function(){
        // Register Territory
        Route::prefix('territory')->group(function(){
            Route::post('province-regist', [TerritoryController::class, 'ProvinceRegist']);
        });
        // Route::post('details', [UserController::class, 'details']);
    });
});
