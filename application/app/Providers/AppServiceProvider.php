<?php

namespace App\Providers;

use App\Jobs\WeatherReaderJob;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        // $this->app->bindMethod([WeatherReaderJob::class, 'handle'], function ($job, $app) {
        //     return $job->handle($app->make(WeatherReaderJob::class));
        // });
    }
}
