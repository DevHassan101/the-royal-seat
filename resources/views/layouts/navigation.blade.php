<style>
    /* Sidebar scrollbar hide */
    .sidebar-nav::-webkit-scrollbar {
        display: none;
    }

    .sidebar-nav {
        -ms-overflow-style: none;
        /* IE/Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

{{-- Sidebar Overlay --}}
<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
</div>

{{-- Sidebar --}}
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed h-screen z-30 inset-y-0 left-0 w-75 transition duration-300 transform bg-gradient-to-b from-gray-900 via-gray-900 to-black overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 border-r border-[#c9982b]/20">

    {{-- Logo Section --}}
    <div class="flex items-start mt-6 mb-8">
        <a href="{{url('/')}}" class="flex items-center mx-auto">
            <img src="{{ asset('assets/image/royalseat_logo.png') }}" alt="" class="w-42 mx-auto">           
        </a>
    </div>

    {{-- Navigation --}}
    <nav class="mt-5 px-5 h-screen overflow-auto" x-data="{ isMultiLevelMenuOpen: false }">
        {{-- Dashboard Link --}}
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('dashboard')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('dashboard') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('dashboard') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="{{ request()->routeIs('dashboard') ? '#c9982b' : '#c9982b' }}"
                            d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1m-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('dashboard') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Dashboard') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Drivers Link --}}
        <x-nav-link href="{{ route('driver.index') }}" :active="request()->routeIs('driver.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('driver.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('driver.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('driver.*') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="{{ request()->routeIs('driver.*') ? '#c9982b' : '#c9982b' }}"
                            d="M12 3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5m-4 9.5A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517c4.278.699 8.642.699 12.92 0a1.54 1.54 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34q-.28.001-.544.086l-.866.283a7.25 7.25 0 0 1-4.5 0l-.866-.283a1.8 1.8 0 0 0-.543-.086z" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('driver.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Drivers') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Vehicles Link --}}
        <x-nav-link href="{{ route('vehicle.index') }}" :active="request()->routeIs('vehicle.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('vehicle.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('vehicle.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('vehicle.*') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <g fill="none" fill-rule="evenodd">
                            <path
                                d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                            <path fill="#c9982b"
                                d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4zM7.5 13a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m9 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m-.736-7H8.236a1 1 0 0 0-.832.445l-.062.108l-1.27 2.538C7.62 9.555 9.706 10 12 10c2.142 0 4.101-.388 5.61-.817l.317-.092l-1.269-2.538a1 1 0 0 0-.77-.545L15.765 6Z" />
                        </g>
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('vehicle.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Vehicles') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Bookings Link --}}
        <x-nav-link href="{{ route('booking.index') }}" :active="request()->routeIs('booking.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('booking.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('booking.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('booking.*') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="#c9982b"
                            d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z" />
                        <path fill="#c9982b" fill-rule="evenodd"
                            d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('booking.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Bookings') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Expenses Link --}}
        <x-nav-link href="{{ route('expense.index') }}" :active="request()->routeIs('expense.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('expense.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('expense.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.2" viewBox="0 0 1000 870" width="22"
                        class="transition-all duration-300 {{ request()->routeIs('expense.*') ? 'scale-110' : 'group-hover:scale-110' }}"
                        height="22">
                        <path id="Layer copy" fill="#c9982b"
                            d="m88.3 1c0.4 0.6 2.6 3.3 4.7 5.9 15.3 18.2 26.8 47.8 33 85.1 4.1 24.5 4.3 32.2 4.3 125.6v87h-41.8c-38.2 0-42.6-0.2-50.1-1.7-11.8-2.5-24-9.2-32.2-17.8-6.5-6.9-6.3-7.3-5.9 13.6 0.5 17.3 0.7 19.2 3.2 28.6 4 14.9 9.5 26 17.8 35.9 11.3 13.6 22.8 21.2 39.2 26.3 3.5 1 10.9 1.4 37.1 1.6l32.7 0.5v43.3 43.4l-46.1-0.3-46.3-0.3-8-3.2c-9.5-3.8-13.8-6.6-23.1-14.9l-6.8-6.1 0.4 19.1c0.5 17.7 0.6 19.7 3.1 28.7 8.7 31.8 29.7 54.5 57.4 61.9 6.9 1.9 9.6 2 38.5 2.4l30.9 0.4v89.6c0 54.1-0.3 94-0.8 100.8-0.5 6.2-2.1 17.8-3.5 25.9-6.5 37.3-18.2 65.4-35 83.6l-3.4 3.7h169.1c101.1 0 176.7-0.4 187.8-0.9 19.5-1 63-5.3 72.8-7.4 3.1-0.6 8.9-1.5 12.7-2.1 8.1-1.2 21.5-4 40.8-8.9 27.2-6.8 52-15.3 76.3-26.1 7.6-3.4 29.4-14.5 35.2-18 3.1-1.8 6.8-4 8.2-4.7 3.9-2.1 10.4-6.3 19.9-13.1 4.7-3.4 9.4-6.7 10.4-7.4 4.2-2.8 18.7-14.9 25.3-21 25.1-23.1 46.1-48.8 62.4-76.3 2.3-4 5.3-9 6.6-11.1 3.3-5.6 16.9-33.6 18.2-37.8 0.6-1.9 1.4-3.9 1.8-4.3 2.6-3.4 17.6-50.6 19.4-60.9 0.6-3.3 0.9-3.8 3.4-4.3 1.6-0.3 24.9-0.3 51.8-0.1 53.8 0.4 53.8 0.4 65.7 5.9 6.7 3.1 8.7 4.5 16.1 11.2 9.7 8.7 8.8 10.1 8.2-11.7-0.4-12.8-0.9-20.7-1.8-23.9-3.4-12.3-4.2-14.9-7.2-21.1-9.8-21.4-26.2-36.7-47.2-44l-8.2-3-33.4-0.4-33.3-0.5 0.4-11.7c0.4-15.4 0.4-45.9-0.1-61.6l-0.4-12.6 44.6-0.2c38.2-0.2 45.3 0 49.5 1.1 12.6 3.5 21.1 8.3 31.5 17.8l5.8 5.4v-14.8c0-17.6-0.9-25.4-4.5-37-7.1-23.5-21.1-41-41.1-51.8-13-7-13.8-7.2-58.5-7.5-26.2-0.2-39.9-0.6-40.6-1.2-0.6-0.6-1.1-1.6-1.1-2.4 0-0.8-1.5-7.1-3.5-13.9-23.4-82.7-67.1-148.4-131-197.1-8.7-6.7-30-20.8-38.6-25.6-3.3-1.9-6.9-3.9-7.8-4.5-4.2-2.3-28.3-14.1-34.3-16.6-3.6-1.6-8.3-3.6-10.4-4.4-35.3-15.3-94.5-29.8-139.7-34.3-7.4-0.7-17.2-1.8-21.7-2.2-20.4-2.3-48.7-2.6-209.4-2.6-135.8 0-169.9 0.3-169.4 1zm330.7 43.3c33.8 2 54.6 4.6 78.9 10.5 74.2 17.6 126.4 54.8 164.3 117 3.5 5.8 18.3 36 20.5 42.1 10.5 28.3 15.6 45.1 20.1 67.3 1.1 5.4 2.6 12.6 3.3 16 0.7 3.3 1 6.4 0.7 6.7-0.5 0.4-100.9 0.6-223.3 0.5l-222.5-0.2-0.3-128.5c-0.1-70.6 0-129.3 0.3-130.4l0.4-1.9h71.1c39 0 78 0.4 86.5 0.9zm297.5 350.3c0.7 4.3 0.7 77.3 0 80.9l-0.6 2.7-227.5-0.2-227.4-0.3-0.2-42.4c-0.2-23.3 0-42.7 0.2-43.1 0.3-0.5 97.2-0.8 227.7-0.8h227.2zm-10.2 171.7c0.5 1.5-1.9 13.8-6.8 33.8-5.6 22.5-13.2 45.2-20.9 62-3.8 8.6-13.3 27.2-15.6 30.7-1.1 1.6-4.3 6.7-7.1 11.2-18 28.2-43.7 53.9-73 72.9-10.7 6.8-32.7 18.4-38.6 20.2-1.2 0.3-2.5 0.9-3 1.3-0.7 0.6-9.8 4-20.4 7.8-19.5 6.9-56.6 14.4-86.4 17.5-19.3 1.9-22.4 2-96.7 2h-76.9v-129.7-129.8l220.9-0.4c121.5-0.2 221.6-0.5 222.4-0.7 0.9-0.1 1.8 0.5 2.1 1.2z" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('expense.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Expenses') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Reports Link --}}
        <x-nav-link href="{{ route('report.index') }}" :active="request()->routeIs('report.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('report.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('report.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('report.*') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="#c9982b"
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2M9 17H7v-7h2zm4 0h-2V7h2zm4 0h-2v-4h2z" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('report.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Reports') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Leads Link --}}
        <x-nav-link href="{{ route('lead.index') }}" :active="request()->routeIs('lead.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('lead.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('lead.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('lead.index') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="#c9982b" d="M22 5a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                        <path fill="#c9982b" fill-rule="evenodd"
                            d="M15.612 2.038C14.59 2 13.399 2 12 2C7.286 2 4.929 2 3.464 3.464C2 4.93 2 7.286 2 12s0 7.071 1.464 8.535C4.93 22 7.286 22 12 22s7.071 0 8.535-1.465C22 19.072 22 16.714 22 12c0-1.399 0-2.59-.038-3.612a4.5 4.5 0 0 1-6.35-6.35m1.868 7.386a.75.75 0 0 1 .096 1.056l-1.829 2.195c-.328.394-.624.75-.9 1c-.302.27-.68.513-1.18.513s-.879-.242-1.18-.514c-.276-.25-.572-.605-.901-1l-.292-.35c-.371-.445-.599-.716-.787-.885a.8.8 0 0 0-.163-.122l-.01-.005l-.005.002l-.007.003a.8.8 0 0 0-.163.122c-.187.17-.415.44-.786.885L7.576 14.48a.75.75 0 0 1-1.152-.96l1.829-2.195c.328-.394.624-.75.9-1c.302-.27.68-.513 1.18-.513s.879.242 1.18.514c.276.25.572.605.901 1l.292.35c.371.445.599.716.787.885c.086.078.138.11.163.122l.003.001l.008.004l.01-.005a.8.8 0 0 0 .164-.122c.187-.17.415-.44.786-.885l1.797-2.156a.75.75 0 0 1 1.056-.096"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('lead.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Leads') }}
                </span>
            </div>
        </x-nav-link>

        {{-- ITC Integration Link --}}
        <x-nav-link href="{{ route('itc.index') }}" :active="request()->routeIs('itc.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('itc.*')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('itc.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('itc.*') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <path fill="#c9982b"
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m-1 17.93c-3.95-.49-7-3.85-7-7.93c0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41c0 2.08-.8 3.97-2.1 5.39" />
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('itc.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('ITC Integration') }}
                </span>
            </div>
        </x-nav-link>

        {{-- Queries Link --}}
        <x-nav-link href="{{ route('query.index') }}" :active="request()->routeIs('query.*')"
            class="flex items-center px-4 py-2 mb-2 rounded-lg transition-all duration-300 group
            {{ request()->routeIs('query.index')
                ? 'bg-[#c9982b]/20 border-l-4 border-[#c9982b]'
                : 'hover:bg-black hover:border-l-4 hover:border-[#c9982b]/40' }}">
            <div class="flex justify-between items-center -ml-6.5 w-full">
                <span
                    class="p-2.5 rounded-lg transition-all duration-300
                    {{ request()->routeIs('query.*') ? 'bg-[#c9982b]/30' : 'bg-black/10 group-hover:bg-[#c9982b]/20' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        class="transition-all duration-300 {{ request()->routeIs('query.*') ? 'scale-110' : 'group-hover:scale-110' }}">
                        <g fill="none">
                            <path
                                d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="#c9982b"
                                d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 14a1 1 0 1 0 0 2a1 1 0 0 0 0-2m0-9.5a3.625 3.625 0 0 0-3.625 3.625a1 1 0 1 0 2 0a1.625 1.625 0 1 1 2.23 1.51c-.676.27-1.605.962-1.605 2.115V14a1 1 0 1 0 2 0c0-.244.05-.366.261-.47l.087-.04A3.626 3.626 0 0 0 12 6.5" />
                        </g>
                    </svg>
                </span>
                <span
                    class="block font-medium text-lg ml-2 transition-colors duration-300
                    {{ request()->routeIs('query.*') ? 'text-[#c9982b]' : 'text-white group-hover:text-[#c9982b]' }}">
                    {{ __('Queries') }}
                </span>
            </div>
        </x-nav-link>
    </nav>

</div>
