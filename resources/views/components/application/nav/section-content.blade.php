@props([
    'ref',
    'title'
])

<div
    x-ref="{{ $ref }}"
    id="{{ $ref }}"
    class="py-24 px-0 sm:px-14 md:px-20 lg:px-32 h-80"
>

    <div >

        <h2 class="text-4xl sm:text-5xl font-bold bg-gradient-to-r from-[#7DB563] to-[#02A6A5] text-transparent bg-clip-text text-center mb-8" >
            {{ $title }}
        </h2 >

        <div class="flex-1" >
            {{ $slot }}
        </div >

    </div >

</div >

