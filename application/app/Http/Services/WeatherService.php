<?php
namespace App\Http\Services;

use App\Jobs\WeatherReaderJob;
use Illuminate\Support\Facades\DB;

final class WeatherService
{
    public function set_coords(mixed $context, int $base_weather_id)
    {
        DB::table('coords')->insert([
            'base_weather_id' => $base_weather_id,
            'lon' => $context['coord']['lon'],
            'lat' => $context['coord']['lat'],
        ]);
    }

    public function set_weather(mixed $context, int $base_weather_id)
    {
        for ($i = 0; $i < count($context['weather']); $i++)
        {
            DB::table('weather')->insert([
                'base_weather_id' => $base_weather_id,
                'openweathermap_id' => $context['weather'][$i]['id'],
                'main' => $context['weather'][$i]['main'],
                'description' => $context['weather'][$i]['description'],
                'icon' => $context['weather'][$i]['icon'],
            ]);
        }
    }

    public function set_mains(mixed $context, int $base_weather_id)
    {
        DB::table('mains')->insert([
            'base_weather_id' => $base_weather_id,
            'temp' => $context['main']['temp'],
            'feels_like' => $context['main']['feels_like'],
            'temp_min' => $context['main']['temp_min'],
            'temp_max' => $context['main']['temp_max'],
            'pressure' => $context['main']['pressure'],
            'humidity' => $context['main']['humidity'],
            'sea_level' => $context['main']['sea_level'],
            'grnd_level' => $context['main']['grnd_level'],
        ]);
    }

    public function set_winds(mixed $context, int $base_weather_id)
    {
        DB::table('winds')->insert([
            'base_weather_id' => $base_weather_id,
            'speed' => $context['wind']['speed'],
            'deg' => $context['wind']['deg'],
            'gust' => $context['wind']['gust'],
        ]);
    }

    public function set_clouds(mixed $context, int $base_weather_id)
    {
        DB::table('clouds')->insert([
            'base_weather_id' => $base_weather_id,
            'all' => $context['clouds']['all'],
        ]);
    }

    public function set_sys(mixed $context, int $base_weather_id)
    {
        DB::table('sys')->insert([
            'base_weather_id' => $base_weather_id,
            'type' => $context['sys']['type'],
            'openweathermap_id' => $context['sys']['od'],
            'country' => $context['sys']['country'],
            'sunrise' => $context['sys']['sunrise'],
            'sunset' => $context['sys']['sunset'],
        ]);
    }

    public function set_data(mixed $context)
    {
        return DB::transaction(function () use($context) {

            $base_weather_id = DB::table('base_weather')->insertGetId([
                    'openweathermap_id' => $context['id'],
                    'name' => $context['name'],
                    'cod' => $context['cod'],
                    'timezone' => $context['timezone'],
                    'dt' => $context['dt'],
                    'visibility' => $context['visibility'],
                    'base' => $context['base'],
            ]);

            $this->set_coords($context, $base_weather_id);
            $this->set_weather($context, $base_weather_id);
            $this->set_mains($context, $base_weather_id);
            $this->set_clouds($context, $base_weather_id);
            $this->set_sys($context, $base_weather_id);
        });
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
