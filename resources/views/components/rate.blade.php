<div class="flex justify-center gap-2">
    @if($getState)
        @for($i=1; $i<=$getState(); $i++)
            <x-filament::icon
                style="--c-400:var(--warning-400);--c-600:var(--warning-600);"
                class="w-6 h-6 text-custom-400"
                icon="heroicon-s-star"
            />
        @endfor
            @for($i=1; $i<=(5-$getState()); $i++)
                <x-filament::icon
                    class="w-6 h-6 text-gray-500"
                    icon="heroicon-s-star"
                />
            @endfor
    @endif
</div>
