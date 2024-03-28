@props([
    'title',
    'icon' => null,
])

@php
    $classes = "w-full sm:w-48 h-10 px-3 bg-transparent border text-white font-semibold
            rounded-xl flex justify-center items-center gap-2 hover:cursor-pointer
            hover:bg-gradient-to-r hover:from-primary-green hover:to-primary-blue
            hover:border-black hover:text-gray-900 dark:hover:text-zinc-200";
@endphp

<li class="w-full sm:w-48 flex items-center justify-center" >
    <a
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $title }}

        @if($icon)
            <x-dynamic-component :component="'icons.'.$icon"
                                 class="w-6 h-6" />
        @endif
    </a >
</li >
