<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasTranslations;

    public array $translatable = ['comment'];

    protected $fillable = ['name', 'comment', 'rate'];

    protected $casts = [
        'comment' => 'array',
    ];
}
