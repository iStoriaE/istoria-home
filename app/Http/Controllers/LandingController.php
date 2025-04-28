<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Arr;

class LandingController extends Controller
{
    public function index(Request $request, $locale = null){
        $locale = $locale ?? $this->getLocale($request);
        app()->setLocale($locale);
        return view('landing');
    }

    private function getLocale(Request $request){
        $locationInfo = Location::get($this->getIP($request));
        $countryCode = $locationInfo->isoCode;
        $countryLocales = [
            'US' => 'en',
            'GB' => 'en',
            'FR' => 'en',
            'DE' => 'en',
            'AE' => 'ar',
            'SA' => 'ar',
            'EG' => 'ar',
        ];

        return Arr::get($countryLocales,$countryCode,'en');
    }

    private function getIP(Request $request): string
    {
        $testIp = '143.92.128.0';
        $ip = $request->ip() ?? $testIp;
        return $ip == '127.0.0.1' ? $testIp : $ip;
    }
}
