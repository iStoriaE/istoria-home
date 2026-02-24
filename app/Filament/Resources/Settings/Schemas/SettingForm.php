<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema(components: [
                    // general_rating: [5] → single numeric value
                    TextInput::make('rating_value')
                        ->visible(fn($record): bool => $record->key === 'general_rating')
                        ->label('القيمة')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(5)
                        ->required(),

                    // seo_image, twitter_image: ["url"] → single URL value
                    TextInput::make('image_value')
                        ->visible(fn($record): bool => in_array($record->key, ['seo_image', 'twitter_image']))
                        ->label('القيمة')
                        ->url()
                        ->required(),

                    // twitter_site, twitter_creator: ["@handle"] → plain text
                    TextInput::make('text_value')
                        ->visible(fn($record): bool => in_array($record->key, ['twitter_site', 'twitter_creator']))
                        ->label('القيمة')
                        ->required(),

                    // seo_title, seo_description, seo_keywords, twitter_title, twitter_description: {"ar": "...", "en": "..."} → translations
                    KeyValue::make('translation_value')
                        ->visible(fn($record): bool => in_array($record->key, ['seo_title', 'seo_description', 'seo_keywords', 'twitter_title', 'twitter_description']))
                        ->label('القيمة')
                        ->required()
                        ->columns(2),

                    // adjust_links: [{"key": "...", "value": "..."}] → repeater
                    Repeater::make('links_value')
                        ->visible(fn($record): bool => $record->key === 'adjust_links')
                        ->label('روابط التطبيق')
                        ->schema([
                            TextInput::make('key')
                                ->label('المفتاح')
                                ->required(),
                            TextInput::make('value')
                                ->label('الرابط')
                                ->required(),
                        ]),
                ])
            ])->columns(1);
    }
}
