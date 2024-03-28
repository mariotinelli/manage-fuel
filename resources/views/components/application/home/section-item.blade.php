@props([
    'id',
    'ref',
    'title' => null,
])

<article
    id="{{ $id }}"
    x-ref="{{ $ref }}"
    {{ $attributes->merge(['class' => ' w-full flex flex-col justify-center items-center pt-24 pb-12 px-4 md:px-3'])}}
>

    @if($title)
        <h2 class="text-4xl sm:text-5xl font-bold bg-gradient-to-r from-[#7DB563] to-[#02A6A5]
                text-transparent bg-clip-text text-center mb-8"
        >
            {{ $title }}
        </h2 >
    @endif

    {{ $slot }}

</article >
