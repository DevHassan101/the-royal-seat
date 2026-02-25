@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-semibold text-[#6a7090] uppercase tracking-widest mb-1']) }}>
    {{ $value ?? $slot }}
</label>