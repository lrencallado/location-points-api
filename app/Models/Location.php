<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latitude', 'longitude'];

    protected function getLatitudeAttribute($value)
    {
        return floatval($value);
    }

    protected function getLongitudeAttribute($value)
    {
        return floatval($value);
    }
}
