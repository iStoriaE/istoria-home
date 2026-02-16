<?php

namespace App\Filament\Resources\Settings\Api;

use App\Filament\Resources\Settings\Api\Handlers\PaginationHandler;
use App\Filament\Resources\Settings\SettingResource;
use Rupadana\ApiService\ApiService;

class SettingApiService extends ApiService
{
    protected static string|null $resource = SettingResource::class;

    public static function handlers(): array
    {
        return [
            PaginationHandler::class,
        ];
    }
}
