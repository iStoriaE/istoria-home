<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    class="m-0 size-full p-0">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('./assets/istoria/fonts.css') }}" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    @endif

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>

<body class="m-0 flex size-full min-h-screen flex-col items-center md:p-5 lg:justify-center">
    <div class="container relative size-full md:max-w-lg">
        <div class="min-h-1/3 relative overflow-hidden md:rounded-t-2xl">
            <img src="https://istoria.sa/wp-content/uploads/2023/08/1.jpg" class="absolute bottom-0 w-full"
                alt="" decoding="async" fetchpriority="high"
                srcset="https://istoria.sa/wp-content/uploads/2023/08/1.jpg 512w, https://istoria.sa/wp-content/uploads/2023/08/1-298x300.jpg 298w, https://istoria.sa/wp-content/uploads/2023/08/1-150x150.jpg 150w"
                sizes="(max-width: 512px) 100vw, 512px">
            <div class="absolute bottom-0 h-2/3 w-full bg-gradient-to-t from-white via-white/80 to-transparent"></div>
        </div>
        <div class="absolute bottom-4 mt-6 w-full space-y-6">
            <div class="space-y-4 px-4">
                <x-logo />
                <h1 class="text-lg font-bold">{{ __('header') }}</h1>
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-gray-600">{{ __("iStoria Users' Reviews") }} ({{ number_format(\App\Models\Review::query()->count())}})</h2>
                    <div
                        class="flex h-8 items-center gap-1 rounded-full border-2 border-amber-100 bg-amber-50 px-2 text-sm">
                        <span class="font-bold rtl:mt-1.5">{{ \App\Models\Review::query()->avg('rate') }}</span>
                        <x-star class="size-5 text-amber-400" />
                    </div>
                </div>
            </div>


            <div class="swiper">
                <div class="swiper-wrapper">
                    @php $reviews = \App\Models\Review::query()->limit(10)->get() @endphp
                    @foreach ($reviews as $review)
                        <div class="swiper-slide px-4">
                            <div class="bg-light-gray rounded-2xl">
                                <p class="flex-1 p-4 md:p-6">{{ $review->comment }}</p>
                                <div class="flex items-center justify-center gap-4 border-t-2 border-t-white p-2">
                                    <label class="text-sm font-bold text-gray-500">{{ $review->name }}</label>
                                    <x-rating :stars="$review->rate" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="px-4">
                <a href="https://app.adjust.com/3ivmqnj"
                    class="bg-primary flex h-12 items-center justify-center rounded-xl border-none text-lg font-bold text-white">
                    {{ __('Download Now') }}
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
        });
    </script>
</body>

</html>
