<?php

use Illuminate\Support\Facades\File;

if(!function_exists('settings')){
    /**
     * Get the value of a setting by its key.
     *
     * @param string $key
     * @param bool $collection
     * @return mixed
     */
    function settings(string $key, bool $collection=false): mixed
    {
        $setting = \App\Models\Setting::query()->where('key', $key)->first();

        if (!$setting) {
            return $collection ? collect([]) : null;
        }

        $value = $setting->value;

        if ($collection) {
            return collect($value);
        }

        // If value is an array with language keys, get the current locale translation
        if (is_array($value) && array_keys($value) !== range(0, count($value) - 1)) {
            $currentLocale = app()->getLocale();
            $translatedValue = $value[$currentLocale] ?? $value['en'] ?? $value['ar'] ?? null;

            // For keywords, the value is already a comma-separated string, so return it directly
            if ($key === 'seo_keywords') {
                return $translatedValue;
            }

            // If the translated value is an array, convert to comma-separated string
            if (is_array($translatedValue)) {
                return implode(', ', $translatedValue);
            }

            return $translatedValue;
        }

        // If value is a simple array, return first element
        if (is_array($value)) {
            return $value[0] ?? null;
        }

        return $value;
    }
}


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
