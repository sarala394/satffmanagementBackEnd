<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\StaffManagement\app\Repositaries\EmployeeInterface;
use Modules\StaffManagement\app\Repositaries\EmployeeImplementation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeInterface::class, EmployeeImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
