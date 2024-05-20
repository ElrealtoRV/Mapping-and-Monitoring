<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Set the default timezone to Asia/Manila
        date_default_timezone_set('Asia/Manila');

        // Set the default date format to MDY
        \Carbon\Carbon::setToStringFormat('M d, Y h:i A');

        // Adjust the default string length for MariaDB
        Schema::defaultStringLength(191);
    }
}
