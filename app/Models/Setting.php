<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $casts = [
        'value' => 'json'
    ];

    public static function generalRating(): float{
        $rating = static::query()->where('key', 'general_rating')->pluck('value')->firstOrFail();
        return $rating[0];
    }
}
