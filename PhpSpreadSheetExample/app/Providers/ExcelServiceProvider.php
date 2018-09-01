<?php

namespace App\Providers;

use App\Services\ExcelService;
use Illuminate\Support\ServiceProvider;

class ExcelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ExcelService::class, function ($app) {
            return new ExcelService();
        });
    }
}
