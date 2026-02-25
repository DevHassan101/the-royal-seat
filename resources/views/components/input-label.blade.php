@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-semibold text-white uppercase tracking-widest mb-2']) }}>
    {{ $value ?? $slot }}
</label>