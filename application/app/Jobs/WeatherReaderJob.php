<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Services\WeatherService;
use App\Http\Services\GetWeatherRequestDataService;

class WeatherReaderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $_context;
    /**
     * Create a new job instance.
     */
    public function __construct($context)
    {
        $this->_context = $context;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // Получение данных с api.openweathermap.org
        $weather_data = new GetWeatherRequestDataService();
        $weather = new WeatherService();
        $weather->set_data(
            $weather_data->call_current()
        );
    }
}
