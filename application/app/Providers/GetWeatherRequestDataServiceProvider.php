<?php

namespace App\Providers;

use App\Http\Services\GetWeatherRequestDataService;
use Illuminate\Support\ServiceProvider;

class GetWeatherRequestDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GetWeatherRequestDataService::class, function ($app) {
            return new GetWeatherRequestDataService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
