@props([
    'title' => '',
    'icon' => '',
    'route' => '',
])

@php

    $activeClasses = request()->routeIs($route)
        ? 'text-gray-600 bg-gray-200 dark:text-white dark:bg-gray-700'
        : 'text-gray-700 dark:text-gray-400 hover:text-gray-600 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-gray-700';

@endphp

<div >

    <div class="flex items-center justify-between transition-all duration-300 ease-in-out" >
        <a
            href="{{ route($route) }}"
            class="flex items-center w-full pl-5 mx-2 py-1.5 rounded-md {{ $activeClasses }} min-h-[2.5rem]"
        >
            <div class="min-w-[1.75rem] mr-3" >
                <x-dynamic-component
                    :component="'icons.'.$icon"
                    class="w-4 h-4"
                />
            </div >
            <span
                x-show="sidebarOpen"
                class="text-md font-medium w-full min-w-[9.3125rem]" >
                {{ $title }}
            </span >
        </a >
    </div >

</div >
