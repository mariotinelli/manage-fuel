@props([
    'gap' => 4,
    'justify' => 'start',
    'align' => 'center',
    'directions' => ['default' => 'col', 'md' => 'row' ],
])

@php
    $directionsClass = "";
    foreach ($directions as $breakpoint => $direction) {
        $directionsClass .= $breakpoint === 'default'
            ? " flex-{$direction}"
            : " {$breakpoint}:flex-{$direction}";
    }

    $classes = "flex gap-{$gap} justify-{$justify} items-{$align} $directionsClass";
@endphp

<div class="{{ $classes }}" >
    {{ $slot }}
</div >
