<?php

if(!function_exists('settings')){
    /**
     * Get the value of a setting by its key.
     *
     * @param string $key
     * @return mixed
     */
    function settings(string $key): mixed
    {
        return \App\Models\Setting::query()->where('key', $key)->pluck('value')->first()[0]??null;
    }
}
