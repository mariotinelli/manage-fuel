<button
    type="submit"
    {{ $attributes->merge([
        'class' => "relative grid-flow-col items-center justify-center font-semibold
           outline-none transition duration-75 focus-visible:ring-2 rounded-lg
           gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm text-white
           h-fit bg-gradient-to-r from-[#7DB563] to-[#02A6A5] text-white
           hover:from-[#02A6A5] hover:to-[#7DB563] transition duration-150 ease-in-out"
    ]) }}
>
    {{ $slot }}
</button >
