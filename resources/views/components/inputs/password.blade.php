@props([
    'label',
    'placeholder' => null,
    'required' => false,
    'disabled' => false
])

@php
    $model = $attributes->get('name') ?? $attributes->wire('model')->value;

   $class = "w-full py-1.5 rounded-lg text-base text-gray-950 dark:text-white
            focus:ring-0 focus:outline-none focus:border-primary-green
            disabled:text-gray-500 sm:text-sm sm:leading-6 ps-3 pe-3
            bg-white dark:bg-white/5 border-gray-300 dark:border-gray-600" .
            ($errors->has($model)
                ? ' border-red-600 dark:border-red-400 placeholder-red-500 dark:placeholder-red-400 '
                : ' placeholder-text-gray-500 dark:placeholder-gray-400 ')
@endphp

<x-inputs.label
    :label="$label"
    :required="$required"
    :model="$model"
    class="{{ $attributes->get('class') }}"
>

    <div
        x-data="{ showPassword: false }"
        class="relative"
    >
        <input
            x-bind:type="showPassword ? 'text' : 'password'"
            @if($attributes->get('name'))
                id="{{ $attributes->get('name') }}"
            @endif
            @if($placeholder)
                placeholder="{{ $placeholder }}"
            @endif
            {{ $attributes->except(['class', 'id'])->merge(['class' => $class])}}
            {{ $disabled ? 'disabled' : '' }}
        />

        <button
            type="button"
            @click="showPassword = !showPassword"
            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 dark:text-gray-500"
        >
            <x-icons.eye
                class="w-5 h-5"
                x-show="!showPassword"
            />
            <x-icons.eye-slash
                class="w-5 h-5"
                x-show="showPassword"
            />
        </button >

    </div >

    <x-inputs.error :model="$model" />

</x-inputs.label >
