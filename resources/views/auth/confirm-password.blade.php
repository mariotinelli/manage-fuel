<x-guest-layout >
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" >
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div >

    <form method="POST"
          action="{{ route('password.confirm') }}" >
        @csrf

        <!-- Password -->
        <x-inputs.text
            label="Senha"
            placeholder="Sua senha"
            id="password"
            name="password"
            type="password"
            :required="true"
            autocomplete="current-password"
        />

        <div class="flex justify-end mt-4" >
            <x-gradient-primary-button >
                {{ __('Confirm') }}
            </x-gradient-primary-button >
        </div >
    </form >
</x-guest-layout >
