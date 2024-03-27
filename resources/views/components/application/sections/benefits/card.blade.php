@props([
    'title',
    'description'
])

<div
    class="flex flex-col gap-5 text-gray-900 dark:text-zinc-200 rounded-3xl shadow-sm p-8 bg-white dark:bg-gray-800 dark:border max-w-[28rem]"
>

    <div class="flex items-center gap-3" >
        <x-icons.arrow-trending-up class="text-green-600" />
        <span class="text-2xl font-bold" >
            {{ $title }}
        </span >
    </div >

    <p class="text-gray-500 dark:text-zinc-200" >
        {{ $description }}
    </p >

</div >

