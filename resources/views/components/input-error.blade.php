@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-xs text-[#e06060] space-y-1 mt-1.5 pl-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center gap-1.5 text-red-500" style="gap: 5px; justify-items: center">
                <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>
                    {{ $message }}
                </span>
            </li>
        @endforeach
    </ul>
@endif
