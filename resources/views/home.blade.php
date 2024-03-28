<x-guest-layout >

    <header
        class="fixed top-0 z-50 w-screen h-20 max-h-20 border-b dark:border-gray-500
            flex items-center justify-between px-4 bg-white dark:bg-gray-900"
    >
        <x-application.logo class="h-12" />

        <x-application.guest.navigation />

        <x-application.dropdown />
    </header >

    <main
        id="main"
        class="pt-20"
    >
        <x-application.home.sections />
    </main >

    <footer
        class="flex flex-col md:flex-row justify-center items-center gap-8 py-8 bg-gradient-to-r
            from-[#7DB563cc] to-[#02A6A5cc] text-white font-medium"
    >
        <x-application.footer />
    </footer >

</x-guest-layout >
