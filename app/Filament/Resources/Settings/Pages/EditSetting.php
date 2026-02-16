<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use App\Services\GitHubWebhookService;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $value = $data['value'];

        match ($data['key']) {
            'general_rating' => $data['rating_value'] = $value[0] ?? null,
            'seo_image' => $data['image_value'] = $value[0] ?? null,
            'seo_title', 'seo_description', 'seo_keywords' => $data['translation_value'] = $value,
            'adjust_links' => $data['links_value'] = $value,
            default => null,
        };

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $key = $this->record->key;

        $data['value'] = match ($key) {
            'general_rating' => [(float) $data['rating_value']],
            'seo_image' => [$data['image_value']],
            'seo_title', 'seo_description', 'seo_keywords' => $data['translation_value'],
            'adjust_links' => $data['links_value'],
            default => $data['value'] ?? [],
        };

        unset($data['rating_value'], $data['image_value'], $data['translation_value'], $data['links_value']);

        return $data;
    }

    protected function afterSave(): void
    {
        if (GitHubWebhookService::triggerDeploy()) {
            Notification::make()->title('تم بدء النشر!')->success()->send();
        } else {
            Notification::make()->title('فشل النشر')->danger()->send();
        }
    }
}
