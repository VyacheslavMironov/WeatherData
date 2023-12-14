<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Services\GetWeatherRequestDataService;
use App\Http\Services\WeatherService;

class WeatherReaderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:weather-reader-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
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
