<?php

namespace App\Filament\Resources\Reviews\Pages;

use App\Filament\Resources\Reviews\ReviewResource;
use App\Models\Review;
use App\Services\GitHubWebhookService;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class EditReview extends EditRecord
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        collect($data['comment'])->each(function ($comment,$key) use (&$data) {
            $data["comment_$key"] = $comment;
        });

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $mutatedData = [];

        collect($data)->each(function ($item,$key) use (&$mutatedData){
            if(Str::startsWith($key,'comment_'))
                $mutatedData['comment'][Str::after($key,'comment_')] = $item;
            else
                $mutatedData[$key] = $item;
        });

        return parent::mutateFormDataBeforeSave($mutatedData);
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
