<?php

namespace App\Filament\Resources\Reviews\Pages;

use App\Filament\Resources\Reviews\ReviewResource;
use App\Models\Review;
use App\Services\OpenAiService;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

    /**
     * @throws Halt
     */
    protected function handleRecordCreation(array $data): Model
    {
        $openAI = new OpenAiService;
        $translations = [];
        $except = [];

        $enText = Arr::get($data, 'comment_en');
        $arText = Arr::get($data, 'comment_ar');

        if($enText) {
            $except[] = 'en';
            $translations['en'] = $enText;
        }
        if ($arText) {
            $except[] = 'ar';
            $translations['ar'] = $arText;
        }

        if(isArabicText($enText)){
            Notification::make()
                ->title('ترجمة التعليقات')
                ->body('التعليق بالإنجليزية يجب ألا يحتوي على حروف عربية')
                ->danger()
                ->send();

            throw new Halt();
        }

        $text = $enText ?? $arText;
        $langArray = getAppLangNames($except);
        $aiTranslations = $openAI->translate($text,$langArray);

        if(!$aiTranslations){
            Notification::make()
                ->title('ترجمة التعليقات')
                ->body('حدثت مشكلة في ترجمةالتعليقات')
                ->danger()
                ->send();

            throw new Halt();
        }

        $data = Arr::only($data, ['name','rate']);
        $data['comment'] = [...$translations,...$aiTranslations];

        return Review::query()->create($data);
    }
}
