<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ darkMode: false }"
    @toggle-theme.window="darkMode = $event.detail"
    x-cloak
    x-bind:class="{'dark' : darkMode === true}"
    x-init="
        if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            localStorage.setItem('darkMode', JSON.stringify(true));
        }
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
    "
>
<head >
    <meta charset="utf-8" >
    <meta name="viewport"
          content="width=device-width, initial-scale=1" >
    <meta name="csrf-token"
          content="{{ csrf_token() }}" >

    <title >{{ config('app.name', 'Laravel') }}</title >

    <style >
        [x-cloak] {
            display: none !important;
        }
    </style >

    <!-- Assets -->
    <link rel="icon"
          type="image/x-icon"
          href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" >

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.bunny.net" >
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head >
<body class="font-sans text-gray-900 antialiased" >

<nav
    class="h-20 w-full bg-white dark:bg-gray-900 dark:border-b fixed top-0
            shadow-sm flex items-center justify-between py-1 px-6
            border-b dark:border-gray-600"

    x-data="{
        activeSection: null,
        showScrollTop: true,
    }"
    x-init="

        const main = document.getElementById('main');

        main.addEventListener('scroll', () => {
            $dispatch('scroll');
        });

        activeSection = decodeURIComponent(window.location.hash.substring(1));
        if (activeSection) {
            setTimeout(() => {
                $refs[activeSection].scrollIntoView({ top: $refs[activeSection].scrollHeight, behavior: 'smooth' });
            }, 100);
        }

        showScrollTop = main.scrollTop > 50 || activeSection ? true : false;
    "
    @scroll.window="showScrollTop = (document.getElementById('main').scrollTop > 100) ? true : false"
>
    <x-application.logo />

    <x-application.sections />

    <x-application.dropdown />
</nav >

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" >
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" >
        {{ $slot }}
    </div >
</div >

<x-application.footer />

<x-application.scroll-to-top />

@livewireScriptConfig
</body >
</html >
