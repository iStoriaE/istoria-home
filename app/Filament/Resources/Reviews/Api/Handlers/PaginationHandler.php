<?php

namespace App\Filament\Resources\Reviews\Api\Handlers;

use App\Filament\Resources\Reviews\ReviewResource;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class PaginationHandler extends Handlers
{
    public static string|null $uri = '/';
    public static string|null $resource = ReviewResource::class;
    protected static bool $public = true;

    public function handler()
    {
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for($query)
            ->allowedFields($this->getAllowedFields() ?? [])
            ->allowedSorts($this->getAllowedSorts() ?? [])
            ->allowedFilters($this->getAllowedFilters() ?? [])
            ->allowedIncludes($this->getAllowedIncludes() ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}
