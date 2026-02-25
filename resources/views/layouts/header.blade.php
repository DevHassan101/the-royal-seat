{{-- Make sure Alpine.js is loaded in your layout --}}
{{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

{{-- Header --}}
<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-[#c9982b] shadow-lg">
    <div class="flex items-center">
        {{-- Mobile Hamburger --}}
        <button @click="sidebarOpen = true" class="text-gray-700 hover:text-[#c9982b] focus:outline-none lg:hidden transition-colors duration-200">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <div class="ml-4 lg:ml-0">
            <h1 class="text-2xl font-black text-gray-800">
                Welcome, <span class="text-[#c9982b]">{{ Auth::user()->name }}</span>
            </h1>
        </div>
    </div>

    <div class="flex items-center space-x-4">

        {{-- Notifications --}}
        <button class="relative p-2 text-gray-600 hover:text-[#c9982b] hover:bg-gray-100 rounded-full transition-all duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-[#c9982b] ring-2 ring-white"></span>
        </button>

        {{-- ✅ Custom Alpine Dropdown (replaces broken <x-dropdown>) --}}
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">

            {{-- Trigger Button --}}
            <button
                @click="open = !open"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-100 transition-all duration-200 border-2 border-transparent hover:border-[#c9982b]"
            >
                {{-- Avatar Circle --}}
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c9982b] to-[#a67d23] flex items-center justify-center text-white font-bold shadow-md flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                {{-- ✅ Name + Email (always visible, not just md+) --}}
                <div class="text-left">
                    <p class="text-sm font-semibold text-gray-800 leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 leading-tight">{{ Auth::user()->email }}</p>
                </div>

                {{-- Chevron - rotates when open --}}
                <svg class="w-4 h-4 text-gray-600 transition-transform duration-200 flex-shrink-0"
                     :class="open ? 'rotate-180' : ''"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            {{-- ✅ Dropdown Menu --}}
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-100 z-50 overflow-hidden"
                style="display: none;"
            >
                {{-- User Info inside dropdown --}}
                <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>

                {{-- Profile Link --}}
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-2 px-4 py-3 text-sm text-gray-700 hover:bg-[#c9982b]/10 hover:text-[#c9982b] transition-colors duration-150">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    {{ __('Profile') }}
                </a>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-2 px-4 py-3 text-sm text-gray-700 hover:bg-red-50! hover:text-red-600! transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

        </div>
        {{-- End Dropdown --}}

    </div>
</header>