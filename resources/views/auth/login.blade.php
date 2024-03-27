<x-guest-layout >
    <!-- Session Status -->
    <x-auth-session-status class="mb-4"
                           :status="session('status')" />

    <form
        method="POST"
        action="{{ route('login') }}"
    >
        @csrf

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
            class="mt-5"
            :required="true"
            autocomplete="current-password"
        />

        <!-- Remember Me -->
        <div class="block mt-4" >
            <label for="remember_me"
                   class="inline-flex items-center" >
                <input id="remember_me"
                       type="checkbox"
                       class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                       name="remember" >
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400" >{{ __('Remember me') }}</span >
            </label >
        </div >

        <div class="flex items-center justify-end mt-4" >
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('password.request') }}" >
                    {{ __('Forgot your password?') }}
                </a >
            @endif

            <x-gradient-primary-button class="ms-3 w-32" >
                {{ __('Log in') }}
            </x-gradient-primary-button >
        </div >
    </form >
</x-guest-layout >
