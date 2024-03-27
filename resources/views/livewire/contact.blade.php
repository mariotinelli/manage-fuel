<div class="w-full max-w-[70rem] border rounded-2xl p-8 md:p-16 shadow-sm dark:bg-gray-800" >

    <h1
        class="text-4xl text-center text-gray-900 dark:text-zinc-200 mb-16"
    >
        Contato
    </h1 >

    <form wire:submit="send"
          class="flex flex-col gap-3" >

        <x-flex-container >

            <!-- Nome -->
            <x-inputs.text
                :required="true"
                label="Nome"
                placeholder="Digite seu nome"
                wire:model="form.name"
            />

            <!-- Email -->
            <x-inputs.text
                :required="true"
                label="Email"
                placeholder="Digite seu email"
                wire:model="form.email"
            />

        </x-flex-container >

        <!-- Assunto -->
        <x-inputs.text
            :required="true"
            label="Assunto"
            placeholder="Digite o assunto do contato"
            wire:model="form.subject"
        />

        <!-- Mensagem -->
        <x-inputs.textarea
            :required="true"
            label="Mensagem"
            placeholder="Digite sua mensagem"
            wire:model="form.message"
        />

        <x-gradient-primary-button
            type="submit"
            class="w-full mt-6"
        >
            Enviar
        </x-gradient-primary-button >

    </form >

</div >
