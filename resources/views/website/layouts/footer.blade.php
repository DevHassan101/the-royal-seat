
<footer class="bg-gray-950 border-t border-yellow-500/40 text-gray-400">

    {{-- Top accent line --}}
    <div class="h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>

    {{-- Main Footer Grid --}}
    <div class=" px-24 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Brand --}}
        <div class="md:col-span-1 ">
            <img src="./assets/image/royalseat_logo.png" alt="The Royal Seat" class="w-40 -ml-1 mb-5">
            <p class="text-md leading-relaxed text-gray-500">
                Premium car rental services delivering comfort, safety, and reliability for every journey.
            </p>
            {{-- Social Icons --}}
            <div class="flex gap-3 mt-6">
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 border border-gray-700
                           hover:border-yellow-500 hover:bg-yellow-500/10 hover:text-yellow-400
                           text-gray-400 transition-all duration-300">
                    <i class="fa-brands fa-facebook-f text-xs"></i>
                </a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 border border-gray-700
                           hover:border-yellow-500 hover:bg-yellow-500/10 hover:text-yellow-400
                           text-gray-400 transition-all duration-300">
                    <i class="fa-brands fa-instagram text-xs"></i>
                </a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 border border-gray-700
                           hover:border-yellow-500 hover:bg-yellow-500/10 hover:text-yellow-400
                           text-gray-400 transition-all duration-300">
                    <i class="fa-brands fa-whatsapp text-xs"></i>
                </a>
            </div>
        </div>

        {{-- Quick Links --}}
        <div>
            <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-5">Quick Links</h3>
            <ul class="space-y-3">
                @foreach([['Home', '#'], ['About Us', '#'], ['Vehicles', '#'], ['Contact', '#bookingSection']] as $link)
                <li>
                    <a href="{{ $link[1] }}"
                        class="group flex items-center gap-2 text-sm text-gray-500 hover:text-yellow-400 transition-all duration-200">
                        <span class="w-0 group-hover:w-3 h-px bg-yellow-400 transition-all duration-300"></span>
                        {{ $link[0] }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Services --}}
        <div>
            <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-5">Our Services</h3>
            <ul class="space-y-3">
                @foreach(['Daily Car Rental', 'Luxury Cars', 'Corporate Rentals', '24/7 Support'] as $service)
                <li class="group flex items-center gap-2 text-sm text-gray-500">
                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500/40 group-hover:bg-yellow-400 transition-all duration-200 shrink-0"></span>
                    {{ $service }}
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-5">Contact Us</h3>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start gap-3 text-gray-500 hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-4 h-4 text-yellow-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Karachi, Pakistan
                </li>
                <li class="flex items-center gap-3 text-gray-500 hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-4 h-4 text-yellow-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    +92 12345678
                </li>
                <li class="flex items-center gap-3 text-gray-500 hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-4 h-4 text-yellow-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    info@yourcar.com
                </li>
            </ul>
        </div>

    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col md:flex-row items-center justify-between gap-3">
            <p class="text-xs text-gray-600">
                © 2026 <span class="text-white font-semibold">THE ROYAL</span><span class="text-yellow-500 font-semibold"> SEAT</span>.
                All rights reserved.
            </p>
            <p class="text-xs text-gray-700">Designed with ♥ for premium experiences</p>
        </div>
    </div>

</footer>