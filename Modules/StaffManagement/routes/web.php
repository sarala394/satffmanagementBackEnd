<?php

use Illuminate\Support\Facades\Route;
use Modules\StaffManagement\Http\Controllers\StaffManagementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('staffmanagements', StaffManagementController::class)->names('staffmanagement');
});
