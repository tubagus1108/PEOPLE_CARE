<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADMIN\DashboardController;
use App\Http\Controllers\ADMIN\TerritoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('ADMIN')->group(function(){
    // Dashboard Prefix
    Route::prefix('/')->group(function(){
        Route::get('/', [DashboardController::class, 'Dashboard'])->name('my-dashboard');
    });

    // Hospitals Prefix
    Route::prefix('hospitals')->group(function(){
        Route::get('hospital-data', [RestControlller::class, 'hospitalData'])->name('hospitals');
    });

    // Territory Prefix
    Route::prefix('territory')->group(function(){
        // PROVINCE
        Route::get('province', [TerritoryController::class, 'province'])->name('province');
        Route::get('province-datatable', [TerritoryController::class, 'provinceDatatable'])->name('province-datatable');
        Route::post('province', [TerritoryController::class, 'province']);
        Route::get('province-delete/{id}', [TerritoryController::class, 'provinceDelete']);
        Route::get('/{id}/province-edit', [TerritoryController::class, 'provinceEdit'])->name('provinceEdit');
        Route::post('province-edit-execute', [TerritoryController::class, 'provinceEditExecute']);
            
        
        // CITY
        Route::get('city', [TerritoryController::class, 'city'])->name('city');
        Route::post('city', [TerritoryController::class, 'city']);
        Route::get('city-datatable', [TerritoryController::class, 'cityDatatable'])->name('city-datatable');
        Route::get('city-delete/{id}', [TerritoryController::class, 'cityDelete']);
        Route::get('/{id}/city-edit', [TerritoryController::class, 'cityEdit'])->name('cityEdit');
        Route::post('city-edit-execute', [TerritoryController::class, 'cityEditExecute']);
    });
});