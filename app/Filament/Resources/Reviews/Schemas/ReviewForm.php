<?php

namespace App\Filament\Resources\Reviews\Schemas;

use CodeWithDennis\SimpleAlert\Components\SimpleAlert;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        $isEdit = $schema->getOperation() == 'edit';
        $components = [
            TextInput::make('name')
                ->label('الإسم الكامل')
                ->required(),
            TextInput::make('rate')
                ->helperText('بإمكانك استخدام كسور عشرية')
                ->minValue(0)
                ->maxValue(5)
                ->label('التقييم')
                ->numeric()
                ->required()
                ->default(5),
            Textarea::make('comment_en')
                ->label('التعليق بالإنجليزية')
                ->columnSpanFull()
                ->rows(2)
                ->requiredWithout('comment_ar'),
            Textarea::make('comment_ar')
                ->label('التعليق بالعربية')
                ->columnSpanFull()
                ->rows(2)
                ->requiredWithout('comment_en'),
        ];

        $otherTranslations = [];

        if($isEdit){
            collect(getAppLangNames(['en','ar']))->each(function ($langName) use (&$otherTranslations) {
                $otherTranslations[] = Textarea::make("comment_$langName")
                    ->label(getLangLabel($langName))
                    ->columnSpanFull()
                    ->rows(2)
                    ->required();
            });
        }

        return $schema
            ->components([
                SimpleAlert::make('example')
                    ->visible(!$isEdit)
                    ->color('purple')
                    ->description(new HtmlString('<ul class="list-disc mr-4">
<li>بإمكانك إدخال إحدى اللغتين الإنجليزية أو العربية أو كلاهما.</li>
<li>سيتم ترجمة التعليق إلى اللغات الأخرى بواسطة الذكاء الإصطناعي.</li>
<li>بإمكانك التعديل على الترجمات بعد الإنتهاء من الإضافة.</li>
<li>الإضافة ستحتاج الى وقت حتى تتم الترجمة من خلال الذكاء الإصطناعي.</li>
</ul>'))
                    ->info()
                    ->columnSpanFull(),
                Section::make()->schema($components)->columns(['default' => 1, 'sm' => 2]),
                Section::make()
                    ->label('الترجمة للغات أخرى')
                    ->visible($isEdit)
                    ->schema($otherTranslations)->columns(1),
            ])->columns(1);
    }
}
