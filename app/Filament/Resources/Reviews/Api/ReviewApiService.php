<?php

namespace App\Filament\Resources\Reviews\Api;

use App\Filament\Resources\Reviews\ReviewResource;
use App\Filament\Resources\Reviews\Api\Handlers\PaginationHandler;
use Rupadana\ApiService\ApiService;

class ReviewApiService extends ApiService
{
    protected static string|null $resource = ReviewResource::class;

    public static function handlers(): array
    {
        return [
            PaginationHandler::class,
        ];
    }
}
