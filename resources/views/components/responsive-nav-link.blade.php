@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block rounded-lg bg-slate-700/70 px-4 py-2 text-base font-medium text-white transition'
            : 'block rounded-lg px-4 py-2 text-base font-medium text-slate-300 transition hover:bg-slate-700/50 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
