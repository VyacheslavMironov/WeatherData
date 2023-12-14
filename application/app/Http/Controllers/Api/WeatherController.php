<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\WeatherService;

class WeatherController extends Controller
{
    private WeatherService $_weatherService;
    public function __construct(WeatherService $weatherService)
    {
        $this->_weatherService = $weatherService;
    }

    public function index()
    {
        return $this->_weatherService->get_data();
    }
}
