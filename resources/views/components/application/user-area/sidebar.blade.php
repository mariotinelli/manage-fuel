<aside
    class="h-[calc(100vh-80px)] bg-gray-50 dark:bg-gray-800 pt-3
        overflow-y-auto overflow-x-hidden transition-all duration-300 ease-in-out"
    :class="{ 'w-64': sidebarOpen, 'w-20': !sidebarOpen }"
>

    <nav >
        <ul class="flex flex-col gap-1 " >

            <x-application.user-area.sidebar-item
                icon="chart-bar"
                route="dashboard"
                title="{{ __('Dashboard') }}"
            />

            <x-application.user-area.sidebar-item
                title="Minha Conta"
                icon="cog"
                route="profile.edit"
            />

        </ul >
    </nav >

</aside >
