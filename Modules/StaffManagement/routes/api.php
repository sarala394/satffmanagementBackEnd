<?php

use Illuminate\Support\Facades\Route;
use Modules\StaffManagement\app\Http\Controllers\StaffManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('staffmanagements', StaffManagementController::class)->names('staffmanagement');
});

Route::prefix('employee')->group(function () {
    // ---- Store Employee ------
    Route::post('storeemployee', [
        StaffManagementController::class,
        'store',
    ]);

    // ---- Update Employee ------
    Route::put('updateemployee/{id}', [
        StaffManagementController::class,
        'update',
    ]);

    // ---- Get Employees ------
    Route::post('getemployees', [
        StaffManagementController::class,
        'index',
    ]);

    // ---- Get All Employees ------
    Route::post('getallemployees', [
        StaffManagementController::class,
        'getallinfo',
    ]);

    // ---- Get Total Employees ------
    Route::get('totemployees', [
        StaffManagementController::class,
        'totalemployees',
    ]);

    // ---- Delete Emploeyee ------
    Route::delete('deleteemployee/{id}',[
        StaffManagementController::class,
            'destroy',
        ]);
});
