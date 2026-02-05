{{-- Sidebar Overlay --}}
<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
</div>

{{-- Sidebar --}}
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-75 transition duration-300 transform bg-gradient-to-b from-gray-900 via-gray-900 to-black overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 border-r border-[#c9982b]/20">

    {{-- Logo Section --}}
    <div class="flex items-start pl-6 mt-6 mb-8">
        <div class="flex items-center">
            <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                    fill="#c9982b" stroke="#c9982b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                    fill="white" />
            </svg>
            <span class="text-white text-2xl mx-1 font-bold tracking-wide">Dashboard</span>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="mt-5 px-5" x-data="{ isMultiLevelMenuOpen: false }">
        {{-- Dashboard Link --}}
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('dashboard') 
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]' 
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('dashboard') 
                        ? 'bg-[#c9982b]/30' 
                        : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" 
                        class="transition-all duration-300 {{ request()->routeIs('dashboard') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="{{ request()->routeIs('dashboard') ? '#c9982b' : '#c9982b' }}"
                            d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1m-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1" />
                    </svg>
                </span>
                <span class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('dashboard') 
                        ? 'text-[#c9982b]' 
                        : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Dashboard') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Drivers Link --}}
        <x-nav-link href="{{ route('driver.index') }}" :active="request()->routeIs('driver.index')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('driver.index') 
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]' 
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('driver.index') 
                        ? 'bg-[#c9982b]/30' 
                        : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('driver.index') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="{{ request()->routeIs('driver.index') ? '#c9982b' : '#c9982b' }}"
                            d="M12 3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5m-4 9.5A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517c4.278.699 8.642.699 12.92 0a1.54 1.54 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34q-.28.001-.544.086l-.866.283a7.25 7.25 0 0 1-4.5 0l-.866-.283a1.8 1.8 0 0 0-.543-.086z" />
                    </svg>
                </span>
                <span class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('driver.index') 
                        ? 'text-[#c9982b]' 
                        : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Drivers') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Vehicles Link --}}
        <x-nav-link href="{{ route('driver.index') }}" :active="request()->routeIs('driver.index')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('driver.index') 
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]' 
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('driver.index') 
                        ? 'bg-[#c9982b]/30' 
                        : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('driver.index') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <g fill="none" fill-rule="evenodd">
                            <path
                                d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                            <path fill="#c9982b"
                                d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4zM7.5 13a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m9 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m-.736-7H8.236a1 1 0 0 0-.832.445l-.062.108l-1.27 2.538C7.62 9.555 9.706 10 12 10c2.142 0 4.101-.388 5.61-.817l.317-.092l-1.269-2.538a1 1 0 0 0-.77-.545L15.765 6Z" />
                        </g>
                    </svg>
                </span>
                <span class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('driver.index') 
                        ? 'text-[#c9982b]' 
                        : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Vehicles') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Bookings Link --}}
        <x-nav-link href="{{ route('driver.index') }}" :active="request()->routeIs('driver.index')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('driver.index') 
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]' 
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('driver.index') 
                        ? 'bg-[#c9982b]/30' 
                        : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('driver.index') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="#c9982b"
                            d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z" />
                        <path fill="#c9982b" fill-rule="evenodd"
                            d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('driver.index') 
                        ? 'text-[#c9982b]' 
                        : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Bookings') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Leads Link --}}
        <x-nav-link href="{{ route('driver.index') }}" :active="request()->routeIs('driver.index')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('lead.index') 
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]' 
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('lead.index') 
                        ? 'bg-[#c9982b]/30' 
                        : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('lead.index') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="#c9982b" d="M22 5a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                        <path fill="#c9982b" fill-rule="evenodd"
                            d="M15.612 2.038C14.59 2 13.399 2 12 2C7.286 2 4.929 2 3.464 3.464C2 4.93 2 7.286 2 12s0 7.071 1.464 8.535C4.93 22 7.286 22 12 22s7.071 0 8.535-1.465C22 19.072 22 16.714 22 12c0-1.399 0-2.59-.038-3.612a4.5 4.5 0 0 1-6.35-6.35m1.868 7.386a.75.75 0 0 1 .096 1.056l-1.829 2.195c-.328.394-.624.75-.9 1c-.302.27-.68.513-1.18.513s-.879-.242-1.18-.514c-.276-.25-.572-.605-.901-1l-.292-.35c-.371-.445-.599-.716-.787-.885a.8.8 0 0 0-.163-.122l-.01-.005l-.005.002l-.007.003a.8.8 0 0 0-.163.122c-.187.17-.415.44-.786.885L7.576 14.48a.75.75 0 0 1-1.152-.96l1.829-2.195c.328-.394.624-.75.9-1c.302-.27.68-.513 1.18-.513s.879.242 1.18.514c.276.25.572.605.901 1l.292.35c.371.445.599.716.787.885c.086.078.138.11.163.122l.003.001l.008.004l.01-.005a.8.8 0 0 0 .164-.122c.187-.17.415-.44.786-.885l1.797-2.156a.75.75 0 0 1 1.056-.096"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('lead.index') 
                        ? 'text-[#c9982b]' 
                        : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Leads') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Queries Link --}}
        <x-nav-link href="{{ route('driver.index') }}" :active="request()->routeIs('driver.index')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('query.index') 
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]' 
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('query.index') 
                        ? 'bg-[#c9982b]/30' 
                        : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('query.index') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <g fill="none">
                            <path
                                d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="#c9982b"
                                d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 14a1 1 0 1 0 0 2a1 1 0 0 0 0-2m0-9.5a3.625 3.625 0 0 0-3.625 3.625a1 1 0 1 0 2 0a1.625 1.625 0 1 1 2.23 1.51c-.676.27-1.605.962-1.605 2.115V14a1 1 0 1 0 2 0c0-.244.05-.366.261-.47l.087-.04A3.626 3.626 0 0 0 12 6.5" />
                        </g>
                    </svg>
                </span>
                <span class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('query.index') 
                        ? 'text-[#c9982b]' 
                        : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Queries') }}
                </span>
            </div>
        </x-nav-link>
    </nav>

    {{-- Bottom Accent --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#c9982b] to-transparent">
    </div>
</div>