@props([
    'variant' => 'primary',
    'type' => 'button',
    'href' => null,
])

@php
    $classes =
        'inline-flex items-center justify-center rounded-xl px-4 py-2.5 text-sm font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';

    if ($variant === 'secondary') {
        $classes .= ' border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 focus:ring-slate-300';
    } elseif ($variant === 'danger') {
        $classes .= ' bg-red-600 text-white hover:bg-red-700 focus:ring-red-300';
    } else {
        $classes .= ' bg-sky-600 text-white hover:bg-sky-700 focus:ring-sky-300';
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
