<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $translation = $this->getTranslations('comment');
        $lang = Arr::has($translation,app()->getLocale()) ? app()->getLocale() : 'en';

        return [
            'id' => $this->id,
            'name' => $this->name,
            'rate' => $this->rate,
            'comment' => Str::substr(Arr::get($translation,$lang),0,120).'...',
        ];
    }
}
