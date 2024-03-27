<div
    @click="
        document.getElementById('main').scrollTo({ top: 0, behavior: 'smooth' });
        var novaURL = window.location.protocol + '//' + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, novaURL);
    "
    x-show="showScrollTop"
    {{ $attributes->class(['absolute rounded-full bottom-3 right-4 bg-primary-blue border p-2 hover:cursor-pointer']) }}
>

    <x-icons.x-mark class="w-6 h-6 text-gray-700 dark:text-zinc-200" />

</div >
