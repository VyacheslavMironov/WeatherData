<?php
namespace App\Http\Services;

use App\Jobs\WeatherReaderJob;
use Illuminate\Support\Facades\DB;

final class WeatherService
{
    public function set_data(mixed $context)
    {
        dispatch(new WeatherReaderJob($context))->delay(now()->addMinutes(1));
    }

    public function get_data()
    {
        return DB::table('base_weather')
            ->join('coords', 'base_weather.id', '=', 'coords.weather_id')
            ->join('weather', 'base_weather.id', '=', 'weather.weather_id')
            ->join('mains', 'base_weather.id', '=', 'mains.weather_id')
            ->join('winds', 'base_weather.id', '=', 'winds.weather_id')
            ->join('clouds', 'base_weather.id', '=', 'clouds.weather_id')
            ->join('sys', 'base_weather.id', '=', 'sys.weather_id')
            ->get();
    }
}
