<x-application.home.section-item
    id="principal"
    ref="principal"
    class="h-fit lg:h-[calc(100vh-80px)] bg-gradient-to-r from-primary-green to-primary-blue"
>

    <img
        src="{{ asset('assets/images/logo-contorno-512x512.png') }}"
        alt="Logo"
        class="w-48 h-48 block lg:hidden mx-auto"
    />

    <h1
        class="text-center text-white font-bold text-3xl  md:text-5xl mb-3 sm:mb-16 text-shadow-black"
    >
        Controle de Abastecimento e Gestão de Frotas
    </h1 >

    <div class="flex flex-col lg:flex-row items-center gap-4 " >

        <img
            src="{{ asset('assets/images/logo-contorno-512x512.png') }}"
            alt="Logo"
            class="w-64 h-64 hidden lg:block"
        />

        <h2 class="text-xl lg:text-2xl max-w-[70rem] text-center sm:text-start
            text-zinc-200 font-semibold text-shadow-black"
        >
            Apresentamos a solução completa para a eficiente gestão de veículos e controle de
            abastecimento. Nosso sistema é projetado para proporcionar uma abordagem integrada e simplificada,
            capacitando
            empresas a otimizar suas operações e alcançar novos níveis de eficiência.
        </h2 >

    </div >

    <nav >
        <ul
            class="flex flex-col sm:flex-row items-center justify-center gap-5 mt-16 w-full"
        >
            <x-application.home.sections.principal-navigation-button
                title="Inscrever-se"
                href="{{ route('register') }}"
                icon="arrow-right-start-on-rectangle"
            />

            <x-application.home.sections.principal-navigation-button
                title="Entre em contato"
                href="#about"
                @click="$refs.contact.scrollIntoView({ top: $refs.contact.scrollHeight, behavior: 'smooth' });"
                icon="inbox-arrow-down"
            />
        </ul >
    </nav >

</x-application.home.section-item >
