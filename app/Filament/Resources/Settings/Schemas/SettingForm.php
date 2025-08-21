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
                    KeyValue::make('value')
                        ->visible(fn($record): bool => $record->key !== 'adjust_links')
                        ->label('القيمة')
                        ->required()
                        ->columns(2),
                        Repeater::make('value')
                        ->visible(fn($record): bool => $record->key === 'adjust_links')
                        ->label('روابط التطبيق')
                        ->schema([
                            TextInput::make('key')
                                ->label('المفتاح')
                                ->required(),
                            TextInput::make('value')
                                ->label('الرابط')
                                ->required(),
                        ])
                ])
            ])->columns(1);
    }
}
