<div class="w-full max-w-[70rem] border border-gray-300 rounded-2xl p-8 md:p-16 shadow-sm dark:bg-gray-800" >

    <h1 class="text-4xl text-center text-gray-900 dark:text-zinc-200 mb-16" >
        Newsletter
    </h1 >

    <form wire:submit="subscribe" >

        <x-flex-container >
            <x-inputs.text
                wire:model="form.name"
                type="text"
                label="Nome"
                placeholder="Seu nome"
                :required="true"
            />

            <x-inputs.text
                wire:model="form.email"
                type="email"
                label="E-mail"
                placeholder="Seu e-mail"
                :required="true"
            />

        </x-flex-container >

        <x-gradient-primary-button class="mt-6 w-full" >
            Inscrever-se
        </x-gradient-primary-button >

    </form >

</div >
