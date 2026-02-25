<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center justify-center w-full px-6 py-3 rounded-xl
                text-sm font-bold tracking-wide text-[#0f1117]
                bg-gradient-to-r from-[#c9982b] to-[#a67d23]
                shadow-[0_4px_20px_rgba(201,152,43,0.38)]
                hover:from-[#dba830] hover:to-[#c9982b]
                hover:shadow-[0_6px_28px_rgba(201,152,43,0.52)]
                hover:-translate-y-px
                active:translate-y-0
                transition-all duration-200
                focus:outline-none focus:ring-2 focus:ring-[#c9982b] focus:ring-offset-2 focus:ring-offset-[#1a1d27]
                disabled:opacity-60 disabled:cursor-not-allowed disabled:transform-none'
]) }}>
    {{ $slot }}
</button>