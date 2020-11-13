<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADMIN\DashboardController;
use App\Http\Controllers\ADMIN\TerritoryController;
use App\Http\Controllers\ADMIN\RestControlller;
use App\Http\Controllers\ADMIN\SettingsController;

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
    Route::prefix('hospital')->group(function(){
        Route::get('hospital-data', [RestControlller::class, 'hospitalData'])->name('hospital');
        Route::get('hospital-datatable', [RestControlller::class, 'hospitalDatatable'])->name('hospital-datatable');
        Route::post('hospital-data', [RestControlller::class, 'hospitalData']);
        Route::get('hospital-delete/{id}', [RestControlller::class, 'hospitalDelete']);
        Route::get('/{id}/hospital-edit', [RestControlller::class, 'hospitalEdit'])->name('hospitalEdit');
        Route::post('hospital-edit-execute', [RestControlller::class, 'hospitalEditExecute']);
        Route::get('/{id}/hospital-detail', [RestControlller::class, 'hospitalDetail'])->name('hospitalDetail');
        Route::get('/{uid}/employee-edit', [RestControlller::class, 'employeeHospitalEdit']);
        Route::post('/{uid}/employee-edit', [RestControlller::class, 'employeeHospitalEdit']);
        Route::get('employee-delete/{uid}', [RestControlller::class, 'employeeHospitalDelete']);
        // Add Pegawai Hospital
        Route::get('/{id}/hospital-add-pegawai', [RestControlller::class, 'hospitalAddPegawai'])->name('hospitalAddPegawai');
        Route::post('/{id}/hospital-add-pegawai', [RestControlller::class, 'hospitalAddPegawai']);
        Route::get('pegawai-hospital-datatable/{rest_id}', [RestControlller::class, 'pegawaiHospitalDatatable']);
        Route::get('/{id}/return',[RestControlller::class, 'returnEmployee']);
        
        
    });
    // Firefighters Prefix
    Route::prefix('firefighters')->group(function(){
        Route::get('firefighters-data', [RestControlller::class, 'firefightersData'])->name('firefighters');
        Route::get('firefighters-datatable', [RestControlller::class, 'firefightersDatatable'])->name('firefighters-datatable');
        Route::post('firefighters-data', [RestControlller::class, 'firefightersData']);
        Route::get('firefighters-delete/{id}', [RestControlller::class, 'firefightersDelete']);
        Route::get('/{id}/firefighters-edit', [RestControlller::class, 'firefightersEdit'])->name('firefightersEdit');
        Route::post('firefighters-edit-execute', [RestControlller::class, 'firefightersEditExecute']);
        Route::get('/{id}/firefighters-detail', [RestControlller::class, 'firefightersDetail'])->name('firefightersDetail');
        Route::get('/{uid}/employee-edit', [RestControlller::class, 'employeeFirefightersEdit']);
        Route::post('/{uid}/employee-edit', [RestControlller::class, 'employeeFirefightersEdit']);
        Route::get('employee-delete/{uid}', [RestControlller::class, 'employeeFirefightersDelete']);
        // Add Pegawai Hospital
        Route::get('/{id}/firefighters-add-pegawai', [RestControlller::class, 'firefightersAddPegawai'])->name('hospitalAddPegawai');
        Route::post('/{id}/firefighters-add-pegawai', [RestControlller::class, 'firefightersAddPegawai']);
        Route::get('pegawai-firefighters-datatable/{rest_id}', [RestControlller::class, 'pegawaiFirefightersDatatable']);
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

    // SETTINGS
    Route::prefix('settings')->group(function(){
        Route::get('employee',[SettingsController::class, 'employee'])->name('employee');
        Route::post('employee',[SettingsController::class, 'employee']);
        Route::get('employee-datatable', [SettingsController::class, 'employeeDatatable'])->name('employee-datatable');
        Route::get('employee-delete/{id}', [SettingsController::class, 'employeeDelete']);
        Route::get('/{id}/employee-edit', [SettingsController::class, 'employeeEdit'])->name('employeeEdit');
        Route::post('employee-edit-execute', [SettingsController::class, 'employeeEditExecute']);
    });
});