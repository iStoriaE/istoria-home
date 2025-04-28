<div class="flex items-center rounded-xl bg-white px-2 py-1">
    @for ($i = 1; $i <= $stars; $i++)
        <x-star class="size-5 text-amber-400" />
    @endfor
    @for ($i = 1; $i <= 5 - $stars; $i++)
        <x-star class="size-5 text-slate-300" />
    @endfor
</div>
