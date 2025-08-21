<?php

use Illuminate\Support\Facades\File;

if (!function_exists('isArabicText')) {
    function isArabicText(?string $text = ''): bool
    {
        return preg_match('/[\x{0600}-\x{06FF}]/u', $text);
    }
}

if (!function_exists('getAppLangNames')) {
    function getAppLangNames(?array $except = []): array
    {
        return collect(File::directories(lang_path()))
            ->map(fn ($path) => basename($path))
            ->filter(fn($folderName) => strlen($folderName) === 2 && !in_array($folderName,$except))
            ->values()
            ->all();
    }
}

if (!function_exists('getLangLabel')) {
    function getLangLabel(string $lang): string
    {
        return \Illuminate\Support\Arr::get([
            'en' => 'التعليق بالإنجليزية',
            'ar' => 'التعليق بالعربية',
            'fr' => 'التعليق بالفرنسية',
            'es' => 'التعليق بالإسبانية',
            'de' => 'التعليق بالألمانية',
            'ru' => 'التعليق بالروسية',
            'zh' => 'التعليق بالصينية',
            'ja' => 'التعليق باليابانية',
            'ko' => 'التعليق بالكورية',
            'it' => 'التعليق بالإيطالية',
            'pt' => 'التعليق بالبرتغالية',
            'nl' => 'التعليق بالهولندية',
            'tr' => 'التعليق بالتركية',
            'sv' => 'التعليق بالسويدية',
            'he' => 'التعليق بالعبرية',
            'hi' => 'التعليق بالهندية',
            'ur' => 'التعليق بالأردية',
            'fa' => 'التعليق بالفارسية',
            'el' => 'التعليق باليونانية',
            'pl' => 'التعليق بالبولندية',
            'uk' => 'التعليق بالأوكرانية',
            'ro' => 'التعليق بالرومانية',
            'id' => 'التعليق بالإندونيسية',
            'ms' => 'التعليق بالماليزية',
            'th' => 'التعليق بالتايلاندية',
            'vi' => 'التعليق بالفيتنامية',
            'da' => 'التعليق بالدنماركية',
            'fi' => 'التعليق بالفنلندية',
            'no' => 'التعليق بالنرويجية',
            'cs' => 'التعليق بالتشيكية',
            'hu' => 'التعليق بالمجرية',
        ],$lang,'');
    }
}
