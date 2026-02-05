
{{-- Header --}}
<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-[#c9982b] shadow-lg">
    <div class="flex items-center">
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-[#c9982b] ring-2 ring-white"></span>
        </button>

        {{-- User Dropdown --}}
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-100 transition-all duration-200 border-2 border-transparent hover:border-[#c9982b]">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c9982b] to-[#a67d23] flex items-center justify-center text-white font-bold shadow-md">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="text-left hidden md:block">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link href="{{ route('profile.edit') }}" class="hover:bg-[#c9982b]/10 hover:text-[#c9982b]">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link href="{{ route('logout') }}" 
                                     onclick="event.preventDefault(); this.closest('form').submit();"
                                     class="hover:bg-red-50 hover:text-red-600">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        {{ __('Log out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>