<x-guest-layout >
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" >
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div >

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form
        method="POST"
        action="{{ route('password.email') }}"
    >
        @csrf

        <!-- Email Address -->
        <x-inputs.text
            label="E-mail"
            placeholder="Seu e-mail"
            id="email"
            type="email"
            name="email"
            :value="old('email')"
            :required="true"
            autofocus
        />

        <div class="flex items-center justify-end mt-4" >
            <x-gradient-primary-button >
                {{ __('Email Password Reset Link') }}
            </x-gradient-primary-button >
        </div >
    </form >
</x-guest-layout >
