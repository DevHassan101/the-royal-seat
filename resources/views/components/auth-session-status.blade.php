@props(['status'])

@if ($status)
    <div {{ $attributes->merge([
        'class' => 'flex items-center gap-2.5 px-4 py-3 rounded-xl text-sm
                    bg-[rgba(201,152,43,0.08)] border border-[rgba(201,152,43,0.25)]
                    text-[#c9982b] font-medium'
    ]) }}>
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ $status }}
    </div>
@endif