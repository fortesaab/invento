@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center rounded-lg px-3 py-2 text-sm font-medium text-white bg-slate-700/70 transition'
            : 'inline-flex items-center rounded-lg px-3 py-2 text-sm font-medium text-slate-300 transition hover:bg-slate-700/50 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
