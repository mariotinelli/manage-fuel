<x-auth-layout >
    <form method="POST"
          action="{{ route('password.store') }}" >
        @csrf

        <!-- Password Reset Token -->
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

        <!-- Email Address -->
        <x-inputs.text
            label="E-mail"
            placeholder="Seu e-mail"
            id="email"
            type="email"
            name="email"
            :value="old('email', $request->email)"
            :required="true"
            autofocus
            autocomplete="username"
        />

        <!-- Password -->
        <x-inputs.text
            id="password"
            placeholder="Sua senha"
            label="Senha"
            class="mt-4"
            type="password"
            name="password"
            :required="true"
            autocomplete="new-password"
        />

        <!-- Confirm Password -->
        <x-inputs.text
            placeholder="Confirme a senha"
            id="password_confirmation"
            label="Confirme a senha"
            class="mt-4"
            type="password"
            name="password_confirmation"
            :required="true"
            autocomplete="new-password"
        />

        <div class="flex items-center justify-end mt-4" >
            <x-gradient-primary-button >
                {{ __('Reset Password') }}
            </x-gradient-primary-button >
        </div >
    </form >
</x-auth-layout >
