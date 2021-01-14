<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\TerritoryController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MemberController;

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

    // Testing
    Route::get('adds', [MemberController::class, 'adds']);
    Route::middleware('auth:api')->group(function(){
        // Register Territory
        Route::prefix('territory')->group(function(){
            Route::post('province-regist', [TerritoryController::class, 'ProvinceRegist']);
        });

        // Member Prefix
        Route::prefix('members')->group(function(){
            Route::post('member-detail', [MemberController::class, 'MemberDetail']);
        });
    });
});
