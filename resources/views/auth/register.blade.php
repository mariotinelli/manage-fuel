<x-auth-layout >
    <form
        method="POST"
        action="{{ route('register') }}"
        class="flex flex-col gap-3"
    >
        @csrf

        <!-- Name -->
        <x-inputs.text
            label="Nome"
            placeholder="Seu nome"
            name="name"
            :value="old('name')"
            :required="true"
            autofocus
            autocomplete="name"
        />

        <!-- Email Address -->
        <x-inputs.email
            label="E-mail"
            placeholder="Seu e-mail"
            name="email"
            :value="old('email')"
            :required="true"
            autofocus
            autocomplete="username"
        />

        <!-- Password -->
        <x-inputs.password
            label="Senha"
            placeholder="Sua senha"
            name="password"
            :required="true"
            autocomplete="new-password"
        />

        <!-- Confirm Password -->
        <x-inputs.password
            label="Confirme a senha"
            placeholder="Confirme a senha"
            name="password_confirmation"
            :required="true"
            autocomplete="new-password"
        />

        <div class="flex items-center justify-end mt-4 gap-3" >
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}" >
                {{ __('Já possui registro?') }}
            </a >

            <x-gradient-primary-button class="w-fit mt-0" >
                {{ __('Inscrever-me') }}
            </x-gradient-primary-button >
        </div >

    </form >

</x-auth-layout >
