<nav
    class="h-20 w-full bg-white dark:bg-gray-900 dark:border-b fixed top-0
            shadow-sm flex items-center justify-between py-1 px-6
            border-b dark:border-gray-600 z-50"

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

    <x-application.nav.sections />

    <x-application.dropdown />
</nav >
