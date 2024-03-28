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

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.bunny.net" >
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/css/app.css')
    @livewireStyles
</head >
<body
    class="font-sans antialiased"
    x-data="{ sidebarOpen: true }"
>

<div class="min-h-screen bg-gray-100 dark:bg-gray-900" >

    <x-application.user-area.header />

    <!-- Page Content -->
    <div class="pt-20 flex h-[calc(100vh-80px)]" >
        <x-application.user-area.sidebar />

        <main class="h-full w-full p-6" >
            {{ $slot }}
        </main >
    </div >
</div >

@vite('resources/js/app.js')
@livewireScriptConfig
</body >
</html >
