<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'weather_id',
        'temp',
        'feels_like',
        'temp_min',
        'temp_max',
        'pressure',
        'humidity',
        'sea_level',
        'grnd_level'
    ];
}
