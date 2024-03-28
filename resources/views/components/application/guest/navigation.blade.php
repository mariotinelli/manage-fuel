<nav
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
    class="hidden md:block"
>
    <ul class="flex gap-4 text-gray-900 dark:text-white" >
        <x-application.guest.navigation-item
            ref="principal"
            title="Início"
        />
        <x-application.guest.navigation-item
            ref="resources"
            title="Recursos"
        />
        <x-application.guest.navigation-item
            ref="benefits"
            title="Benefícios"
        />
        <x-application.guest.navigation-item
            ref="about"
            title="Quem somos"
        />
        <x-application.guest.navigation-item
            ref="newsletter"
            title="Newsletter"
        />
        <x-application.guest.navigation-item
            ref="contact"
            title="Contato"
        />
    </ul >
</nav >
