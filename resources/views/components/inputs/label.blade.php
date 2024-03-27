@props([
    'label',
    'model',
    'required' => false,
])

@php
    $class = "
        flex flex-col gap-1 w-full"
            . ($errors->has($model) ? ' text-red-600 dark:text-red-400 ' : ' text-gray-950 dark:text-white ')
            . $attributes->get('class');
@endphp

<label
    for="{{ $model }}"
    class="{{ $class }}"
>

    <span class="text-sm font-medium leading-6" >
        {{ $label }}
        @if($required)
            <sup class="text-red-600 dark:text-red-400 font-medium" >*</sup >
        @endif
    </span >

    {{ $slot }}

</label >
