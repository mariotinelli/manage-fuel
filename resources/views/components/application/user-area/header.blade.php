<header
    class="fixed top-0 z-50 w-screen h-20 max-h-20 border-b dark:border-gray-500
            flex items-center justify-between px-4 bg-gray-100 dark:bg-gray-900"
>
    <div class="flex items-center gap-3" >
        <div
            @click="sidebarOpen = !sidebarOpen"
            class="p-2 rounded-lg hover:cursor-pointer hover:bg-gray-200 text-gray-600 dark:text-white dark:hover:text-gray-600"
        >
            <x-icons.bars-3
                class="w-5 h-5"
            />
        </div >

        <x-application.logo class="h-12" />
    </div >

    <x-application.dropdown />
</header >
