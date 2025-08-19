<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\Setting;
use Carbon\Traits\Localization;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Arr;

class LandingController extends Controller
{
    /**
     * @param Request $request
     * @param $locale
     * @return Factory|View|Application|\Illuminate\View\View|object
     */
    public function index(Request $request,string $locale = null){
        $locale = $locale ?? $this->getLocale($request);
        app()->setLocale($locale);
        $reviews = ReviewResource::collection(Review::all());
        $generalRating = Setting::generalRating();
        return view('landing',compact('reviews', 'generalRating'));
    }

    /**
     * @param Request $request
     * @return string
     */
    private function getLocale(Request $request): string
    {
        $preferredLanguage = $request->getPreferredLanguage(getAppLangNames());

        if($preferredLanguage)
            return $preferredLanguage;

        $locationInfo = Location::get($this->getIP($request));
        $countryCode = $locationInfo->countryCode;
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

    /**
     * @param Request $request
     * @return string
     */
    private function getIP(Request $request): string
    {
        $testIp = '143.92.128.0';
        $ip = $request->ip() ?? $testIp;
        return $ip == '127.0.0.1' ? $testIp : $ip;
    }
}
