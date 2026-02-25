@extends('website.app')
@section('content')
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black">

        {{-- Background image --}}
        <div
            class="absolute inset-0 bg-[url('./assets/image/automotive3.jpg')] bg-cover bg-center scale-110 animate-zoomSlow">
        </div>

        {{-- Dark overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/85"></div>

        {{-- Animated light line --}}
        <span
            class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent animate-lineMove"></span>

        {{-- Content wrapper --}}
        <div class="relative z-10 w-full px-7 lg:px-28">
            <div class="flex flex-col md:flex-row items-center gap-0">

                {{-- Text Section --}}
                <div class="flex-1 flex flex-col justify-center mt-14 py-12 md:py-14">

                    {{-- Animated Headline --}}
                    <div class="relative h-[90px] lg:h-[110px] overflow-hidden">

                        <h1
                            class="hero-headline absolute top-0 left-0 text-4xl md:text-5xl lg:text-[52px] font-extrabold text-white leading-tight opacity-0 translate-y-6 transition-all duration-700 ease-in-out">
                            Looking for a <span class="text-yellow-400">Vehicle?</span><br>
                            You're in the <span class="text-yellow-400">perfect spot.</span>
                        </h1>

                        <h1
                            class="hero-headline absolute top-0 left-0 text-4xl md:text-5xl lg:text-[52px]  font-extrabold text-white leading-tight opacity-0 translate-y-6 transition-all duration-700 ease-in-out">
                            Drive your <span class="text-yellow-400">dream car</span><br>
                            at the <span class="text-yellow-400">best price.</span>
                        </h1>

                        <h1
                            class="hero-headline absolute top-0 left-0 text-4xl md:text-5xl lg:text-[52px]  font-extrabold text-white leading-tight opacity-0 translate-y-6 transition-all duration-700 ease-in-out">
                            Premium rides,<br>
                            <span class="text-yellow-400">unbeatable</span> experience.
                        </h1>

                    </div>

                    {{-- Divider line --}}
                    <div class="mt-5 w-16 h-[3px] bg-yellow-400 rounded-full"></div>

                    {{-- Paragraph --}}
                    <p class="mt-4 text-white/75 text-sm md:text-base leading-relaxed max-w-lg tracking-wide">
                        Browse our premium fleet of vehicles — from sleek sports cars to spacious SUVs.
                        Whether you're booking a ride or finding your next dream car, we've got you covered
                        with the best deals and a seamless experience.
                    </p>

                    {{-- Stats row --}}
                    <div class="mt-6 flex gap-6 text-white">
                        <div>
                            <span class="text-yellow-400 text-2xl font-extrabold">500+</span>
                            <p class="text-white/60 text-xs mt-0.5 tracking-wider uppercase">Vehicles</p>
                        </div>
                        <div class="w-px bg-white/20"></div>
                        <div>
                            <span class="text-yellow-400 text-2xl font-extrabold">10k+</span>
                            <p class="text-white/60 text-xs mt-0.5 tracking-wider uppercase">Happy Clients</p>
                        </div>
                        <div class="w-px bg-white/20"></div>
                        <div>
                            <span class="text-yellow-400 text-2xl font-extrabold">24/7</span>
                            <p class="text-white/60 text-xs mt-0.5 tracking-wider uppercase">Support</p>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="mt-8 flex flex-wrap gap-4">

                        {{-- Primary CTA - Book Now --}}
                        <a href="#bookingSection" id="bookNowBtn"
                            class="group relative inline-flex items-center gap-2 px-8 py-4 bg-yellow-400 text-black font-bold text-sm tracking-wide rounded-full
                   overflow-hidden shadow-lg shadow-yellow-400/30
                   hover:shadow-yellow-400/60 hover:scale-105 transition-all duration-300">
                            {{-- Shine sweep effect --}}
                            <span
                                class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] bg-white/20 skew-x-12 transition-transform duration-500"></span>
                            {{-- Calendar icon --}}
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Book Now
                        </a>

                        {{-- Secondary CTA - View Car --}}
                        <a href="{{ url('vehicles') }}"
                            class="group inline-flex items-center gap-2 px-8 py-4 border-2 border-white/60 text-white font-bold text-sm tracking-wide rounded-full
                   hover:border-white hover:bg-white/10 hover:scale-105 hover:shadow-lg hover:shadow-white/20
                   backdrop-blur-sm transition-all duration-300">
                            {{-- Car icon --}}
                            <svg class="w-4 h-4 shrink-0 group-hover:translate-x-1 transition-transform duration-300"
                                fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0zm-1-5H6l1.5-5h9L20 12z" />
                            </svg>
                            View Cars
                            {{-- Arrow --}}
                            <svg class="w-4 h-4 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                    </div>
                </div>

                {{-- Car Image --}}
                <div data-aos="fade-left" data-aos-duration="1200"
                    class="relative w-full md:w-[42%] lg:w-[48%] h-[120%] flex items-center justify-center py-8 md:py-0">

                    {{-- Subtle glow behind car --}}
                    <div class="absolute w-[70%] h-[50%] bg-yellow-400/10 rounded-full blur-3xl"></div>

                    {{-- Car image --}}
                    <img src="assets/image/aston-martin.png" alt="Aston Martin"
                        class="relative w-full object-contain
               hover:scale-[1.03] drop-shadow-[0_20px_40px_rgba(250,204,21,0.2)]
               transition-all duration-500 ease-in-out">

                </div>

            </div>
        </div>

    </section>

    <section class="bg-white pb-0 pt-0">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white border border-gray-700/50 rounded-2xl p-7 -mt-8 relative z-20 shadow-2xl shadow-black/60">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-yellow-500/60" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Pickup Location"
                            class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-300 placeholder-gray-500
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all">
                    </div>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-yellow-500/60" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date"
                            class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-400
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all [color-scheme:dark]">
                    </div>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-yellow-500/60" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date"
                            class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-400
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all [color-scheme:dark]">
                    </div>

                    <button
                        class="group relative overflow-hidden bg-yellow-400 text-black font-bold text-sm rounded-xl py-3.5 px-6
                               hover:bg-yellow-300 hover:scale-[1.02] hover:shadow-lg hover:shadow-yellow-400/30
                               transition-all duration-300 flex items-center justify-center gap-2">
                        <span
                            class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] bg-white/20 skew-x-12 transition-transform duration-500"></span>
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z" />
                        </svg>
                        Search Car
                    </button>

                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-20">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">
                <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">Our
                    Collection</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-black">
                    Featured <span class="text-yellow-400">Cars</span>
                </h2>
                <p class="mt-4 text-gray-400 text-base max-w-xl mx-auto">
                    Explore our handpicked selection of premium vehicles available for rent — style, comfort, and
                    performance guaranteed.
                </p>
                <div class="mt-5 flex justify-center">
                    <div class="w-12 h-1 bg-yellow-400 rounded-full"></div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse ($vehicles as $vehicle)
                    <div
                        class="group relative bg-gray-900 rounded-2xl overflow-hidden border border-gray-700/50
                        hover:border-yellow-500/40 hover:shadow-xl hover:shadow-yellow-500/10
                        transition-all duration-400 cursor-pointer card-dynamic-border">

                        {{-- Animated Border Elements --}}
                        <span
                            class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                        <span
                            class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                        <span
                            class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                        {{-- Image area --}}
                        <div class="relative bg-gray-800/60 px-6 pt-8 pb-4 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-yellow-400/0 group-hover:bg-yellow-400/5 transition-all duration-500">
                            </div>
                            <div
                                class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-6 bg-yellow-400/0 group-hover:bg-yellow-400/10 blur-2xl transition-all duration-500 rounded-full">
                            </div>
                            <img src="./assets/image/{{ $vehicle->picture ?? 'aston-martin.png' }}"
                                alt="{{ $vehicle->name }}"
                                class="w-full h-44 object-contain group-hover:scale-105 transition-transform duration-500 drop-shadow-2xl">
                        </div>

                        {{-- Card Body --}}
                        <div class="px-6 py-5">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-white text-lg font-bold leading-tight">{{ $vehicle->name }}</h3>
                                <div class="text-right shrink-0">
                                    <span class="text-yellow-400 font-extrabold text-lg">AED
                                        {{ $vehicle->per_day_charges }}</span>
                                    <p class="text-gray-500 text-xs">/day</p>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center gap-3 text-xs text-gray-400 flex-wrap">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z" />
                                    </svg>
                                    {{ $vehicle->seats }} Seats
                                </span>
                                <span class="w-px h-3 bg-gray-600"></span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6V4m0 16v-2m8-6h2M2 12H4m13.657-5.657l1.414-1.414M4.929 19.071l1.414-1.414M19.071 19.071l-1.414-1.414M6.343 6.343L4.929 4.929" />
                                    </svg>
                                    {{ $vehicle->transmission }}
                                </span>
                                <span class="w-px h-3 bg-gray-600"></span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    {{ $vehicle->type }}
                                </span>
                            </div>

                            <div class="mt-5 border-t border-gray-700/50"></div>

                            <button
                                onclick='openModal({
                            name: @json($vehicle->name),
                            price: "AED {{ $vehicle->per_day_charges }} / day",
                            image: @json($vehicle->picture),
                            seats: "{{ $vehicle->seats }} Seats",
                            transmission: "{{ $vehicle->transmission }}",
                            fuel: "{{ $vehicle->type }}",
                            vehicleId: "{{ $vehicle->id }}"
                        })'
                                class="mt-4 w-full bg-gray-800 hover:bg-yellow-400 text-gray-300 hover:text-black
                               border border-gray-700 hover:border-yellow-400
                               rounded-xl py-3 px-6 font-semibold text-sm
                               hover:shadow-lg hover:shadow-yellow-400/20 hover:scale-[1.02]
                               transition-all duration-300 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0zm-1-5H6l1.5-5h9L20 12z" />
                                </svg>
                                Rent Now
                            </button>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>

            <div class="flex justify-center mt-14">
                <a href="{{ url('vehicles') }}"
                    class="group inline-flex items-center gap-2 bg-yellow-400 text-black font-bold text-sm
                       px-10 py-4 rounded-full hover:bg-yellow-300 hover:scale-105
                       hover:shadow-xl hover:shadow-yellow-400/30 transition-all duration-300">
                    Explore All Cars
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                        stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <section class="bg-gray-950 text-gray-200">

        {{-- About Hero --}}
        <section class="relative overflow-hidden border-t-2 border-yellow-500">
            <div class="absolute inset-0 bg-[url('car.jpg')] bg-cover bg-center opacity-10"></div>
            <div class="absolute inset-0 bg-gray-950"></div>
            <div class="relative max-w-7xl mx-auto px-6 py-20 text-center overflow-hidden">
                <div class="whitespace-nowrap overflow-hidden">
                    <h1 class="text-2xl sm:text-4xl md:text-6xl text-white font-bold py-4 animate-contact">
                        • About Our <span class="text-yellow-500">Company</span>
                    </h1>
                </div>
                <p class="max-w-2xl mx-auto text-gray-300 text-lg mt-6">
                    Premium car rental experience built on trust, comfort, and style.
                </p>
            </div>
        </section>

        {{-- About Content --}}
        <section class="pb-20 pt-16">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                {{-- Text --}}
                <div>
                    <h3 class="text-2xl font-bold mb-4 text-white animated-text">
                        <span class="word white">
                            <span>W</span><span>h</span><span>o</span>
                        </span>
                        <span class="word yellow">
                            <span>A</span><span>r</span><span>e</span>&nbsp;<span>W</span><span>e</span>
                        </span>
                    </h3>
                    <div class="w-10 h-1 bg-yellow-400 rounded-full mb-5"></div>
                    <p class="text-gray-400 mb-4 leading-relaxed">
                        <span class="font-semibold text-white">THE ROYAL <span class="text-yellow-500">SEAT</span></span>
                        Rent a Car provides reliable, luxury, and budget-friendly vehicles designed for
                        business trips, family journeys, and everyday travel.
                    </p>
                    <p class="text-gray-100 leading-relaxed">
                        Our mission is to deliver a smooth, secure, and premium rental experience with
                        modern vehicles and professional customer service.
                    </p>
                </div>

                {{-- Why Choose Us Card with rotating SVG border --}}
                <div class="relative rounded-2xl p-6 overflow-hidden bg-gray-900 border-rotate">
                    <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 100 100"
                        preserveAspectRatio="none">
                        <rect x="1" y="1" width="98" height="98" rx="6" ry="6" fill="none"
                            stroke="#eab308" stroke-width="1.5" stroke-dasharray="20 180" class="animated-border" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-6 text-white">Why Choose Us</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-center gap-3">
                            <span
                                class="w-5 h-5 rounded-full bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            Modern & well-maintained vehicles
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="w-5 h-5 rounded-full bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            Transparent pricing, no hidden charges
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="w-5 h-5 rounded-full bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            Flexible rental packages
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="w-5 h-5 rounded-full bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            24/7 customer assistance
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="w-5 h-5 rounded-full bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            Quick & easy booking
                        </li>
                    </ul>
                </div>

            </div>
        </section>

        {{-- Stats --}}
        <section id="stats" class="py-16 bg-gray-950 ">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="bg-gray-900 py-10 rounded-xl">
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="10">0</span><span class="text-yellow-500">+</span>
                    </h3>
                    <p class="mt-2 text-gray-400">Years Experience</p>
                </div>
                <div class="bg-gray-900 py-10 rounded-xl">
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="500">0</span><span class="text-yellow-500">+</span>
                    </h3>
                    <p class="mt-2 text-gray-400">Happy Clients</p>
                </div>
                <div class="bg-gray-900 py-10 rounded-xl">
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="120">0</span><span class="text-yellow-500">+</span>
                    </h3>
                    <p class="mt-2 text-gray-400">Vehicles</p>
                </div>
                <div class="bg-gray-900 py-10 rounded-xl">
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="24">0</span>/7
                    </h3>
                    <p class="mt-2 text-gray-400">Support</p>
                </div>
            </div>
        </section>

        {{-- Mission / Vision --}}
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">What
                        Drives Us</span>
                    <h2 class="text-3xl font-extrabold text-white">Mission & <span class="text-yellow-400">Vision</span>
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    <div
                        class="relative rounded-2xl p-8 cursor-pointer overflow-hidden bg-white card-dynamic-border">
                        <span
                            class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                        <span
                            class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                        <span
                            class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                        <h3 class="text-2xl font-bold mb-4 text-black animated-text">
                            <span class="word black"><span>O</span><span>u</span><span>r</span></span>
                            <span
                                class="word yellow"><span>M</span><span>i</span><span>s</span><span>s</span><span>i</span><span>o</span><span>n</span></span>
                        </h3>
                        <p class="text-gray-800 leading-relaxed">
                            To provide premium-quality car rentals with exceptional service, safety, and reliability —
                            making every journey memorable.
                        </p>
                    </div>

                    <div
                        class="relative rounded-2xl p-8 cursor-pointer overflow-hidden bg-white card-dynamic-border">
                        <span
                            class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                        <span
                            class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                        <span
                            class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                        <h3 class="text-2xl font-bold mb-4 text-black animated-text">
                            <span class="word black"><span>O</span><span>u</span><span>r</span></span>
                            <span
                                class="word yellow"><span>V</span><span>i</span><span>s</span><span>i</span><span>o</span><span>n</span></span>
                        </h3>
                        <p class="text-gray-800 leading-relaxed">
                            To be a trusted and leading name in the car rental industry, delivering excellence and
                            innovation in every journey.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <div id="bookingSection" class="bg-white ">

            <section class="py-24 text-center border-t-2 border-yellow-500 overflow-hidden">
                <h1 class="text-3xl md:text-6xl font-bold text-black inline-block animate-contact">
                    • Contact <span class="text-yellow-500">Us</span>
                </h1>
                <p class="max-w-2xl mx-auto text-gray-700 text-lg mt-6">
                    Have a question or need help? We're here to assist you anytime.
                </p>
            </section>

            <section class="pb-24">
                <div class="max-w-4xl mx-auto px-6">
                    <form
                        class="bg-gray-900 border border-gray-700/50 rounded-2xl p-8 md:p-10 shadow-2xl shadow-black/40 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block mb-2 text-sm text-gray-400 font-medium">Full Name</label>
                            <input type="text" placeholder="Your name" required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                                   focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm text-gray-400 font-medium">Email Address</label>
                            <input type="email" placeholder="you@email.com" required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                                   focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm text-gray-400 font-medium">Phone Number</label>
                            <input type="tel" placeholder="+971 xx xxx xxxx"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                                   focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm text-gray-400 font-medium">Subject</label>
                            <input type="text" placeholder="How can we help?"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                                   focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm text-gray-400 font-medium">Message</label>
                            <textarea rows="5" required placeholder="Tell us about your rental needs..."
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                                   focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all resize-none"></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit"
                                class="group relative overflow-hidden w-full bg-yellow-400 hover:bg-yellow-300 text-black font-bold
                                   rounded-xl py-4 px-6 text-sm hover:shadow-xl hover:shadow-yellow-400/20
                                   hover:scale-[1.01] transition-all duration-300 flex items-center justify-center gap-2">
                                <span
                                    class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] bg-white/20 skew-x-12 transition-transform duration-500"></span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Send Message
                            </button>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </section>

    <!-- MODAL -->
    <div id="rentModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm transition-opacity duration-500">

        <div id="modalBox"
            class="relative bg-gradient-to-br from-gray-900 to-black rounded-2xl w-[95%] max-w-5xl overflow-hidden transform scale-95 opacity-0 transition-all duration-500">

            <!-- Close Button -->
            <button onclick="closeModal()"
                class="absolute top-4 right-4 text-white text-2xl hover:text-yellow-500 transition-all duration-300">&times;</button>

            <div class="grid md:grid-cols-2">

                <!-- LEFT IMAGE -->
                <div class="bg-black flex items-center justify-center p-6">
                    <img id="carImage" class="w-full max-w-sm object-contain">
                </div>

                <!-- RIGHT CONTENT -->
                <div class="p-8">
                    <h2 id="carName" class="text-2xl font-bold text-white mb-1"></h2>
                    <p id="carPrice" class="text-yellow-500 font-semibold mb-4"></p>

                    <!-- DETAILS -->
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats">
                        </div>
                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                        </div>
                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel">
                        </div>
                    </div>

                    <!-- FORM -->
                    <form action="{{ route('lead.store') }}" class="space-y-4" method="POST">
                        @csrf
                        <input type="hidden" id="vehicle-id" name="id">
                        <input type="text" placeholder="Full Name" required name="name"
                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                        <input type="email" placeholder="Email Address" required name="email"
                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                        <input type="date" required name="booking_date"
                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                        <button type="submit"
                            class="w-full mt-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold py-3 rounded-xl transition-all duration-300">
                            Confirm Booking
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const headlines = document.querySelectorAll('.hero-headline');
            let current = 0;

            function showHeadline(index) {
                headlines.forEach((el, i) => {
                    if (i === index) {
                        el.classList.remove('opacity-0', 'translate-y-6');
                        el.classList.add('opacity-100', 'translate-y-0');
                    } else {
                        el.classList.remove('opacity-100', 'translate-y-0');
                        el.classList.add('opacity-0', 'translate-y-6');
                    }
                });
            }

            showHeadline(0);

            setInterval(function() {
                current = (current + 1) % headlines.length;
                showHeadline(current);
            }, 3500);
        });
    </script>
@endsection
