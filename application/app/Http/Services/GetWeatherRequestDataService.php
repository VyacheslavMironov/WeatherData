<?php
namespace App\Http\Services;

final class GetWeatherRequestDataService
{
    public function call_current()
    {
        $ch = curl_init();

        $endpoint = config('weather.open_weather_map_url');
        $params = [
            'lat' => 44.34,
            'lon' => 10.99,
            'appid' => config('weather.open_weather_map_api_key'),
            'lang' => 'ru'
        ];
        $url = $endpoint . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
