@extends('website.app')
@section('content')

{{-- ============================================
   HERO SECTION
============================================ --}}
<section class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-black">

    {{-- Background image --}}
    <div class="absolute inset-0 bg-[url('./assets/image/automotive3.jpg')] bg-cover bg-center scale-110 animate-zoomSlow"></div>

    {{-- Dark overlay --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/90"></div>

    {{-- Animated top line --}}
    <span class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent animate-lineMove"></span>

    {{-- Content --}}
    <div class="relative z-10 max-w-6xl px-6 text-center mt-14">

        <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-4 animate-fadeIn">
            Who We Are
        </span>

        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-wide animate-slideUp">
            About Our <span class="text-yellow-500">Company</span>
        </h1>

        <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn">
            Premium car rental experience built on trust, comfort, and style.
            We deliver modern vehicles and professional service for every journey.
        </p>

        <div class="mt-10 flex justify-center gap-4 animate-fadeIn">
            <a href="#about-content"
                class="px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
                       hover:scale-105 active:scale-95 transition-all duration-300
                       shadow-lg hover:shadow-yellow-500/40">
                Learn More
            </a>
            <a href="#bookingSection"
                class="px-8 py-4 border-2 border-white/40 text-white font-semibold rounded-full
                       hover:border-yellow-500 hover:text-yellow-400 hover:scale-105
                       active:scale-95 transition-all duration-300 backdrop-blur-sm">
                Contact Us
            </a>
        </div>

    </div>

    {{-- Bottom fade line --}}
    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500/40 to-transparent"></span>

</section>

{{-- ============================================
   ABOUT CONTENT
============================================ --}}
<div class="bg-gray-950 text-gray-200">

    {{-- Who Are We --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-14 items-center">

            {{-- Text --}}
            <div>
                <h3 class="text-3xl font-bold mb-2 text-white animated-text">
                    <span class="word white"><span>W</span><span>h</span><span>o</span></span>
                    <span class="word yellow"><span>A</span><span>r</span><span>e</span>&nbsp;<span>W</span><span>e</span></span>
                </h3>
                <div class="w-10 h-1 bg-yellow-400 rounded-full mb-6"></div>
                <p class="text-gray-300 mb-5 leading-relaxed text-base">
                    <span class="font-bold text-white">THE ROYAL <span class="text-yellow-500">SEAT</span></span>
                    Rent a Car provides reliable, luxury, and budget-friendly vehicles designed for
                    business trips, family journeys, and everyday travel.
                </p>
                <p class="text-gray-400 leading-relaxed text-base">
                    Our mission is to deliver a smooth, secure, and premium rental
                    experience with modern vehicles and professional customer service.
                </p>
            </div>

            {{-- Why Choose Us — rotating border card --}}
            <div class="relative rounded-2xl p-8 overflow-hidden bg-gray-900 border-rotate">
                <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <rect x="1" y="1" width="98" height="98" rx="6" ry="6" fill="none"
                        stroke="#eab308" stroke-width="1.5" stroke-dasharray="20 180" class="animated-border"/>
                </svg>
                <h3 class="text-xl font-bold mb-6 text-white">Why Choose Us</h3>
                <ul class="space-y-4 text-gray-300">
                    @foreach(['Modern & well-maintained vehicles','Transparent pricing, no hidden charges','Flexible rental packages','24/7 customer assistance','Quick & easy booking'] as $item)
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>


    {{-- Stats --}}
    <section id="stats" class="py-16 bg-gradient-to-r from-gray-900 to-black border-y border-gray-800">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="group">
                <h3 class="text-4xl font-bold text-white"><span class="counter" data-target="10">0</span><span class="text-yellow-500">+</span></h3>
                <p class="mt-2 text-gray-400 text-sm">Years Experience</p>
                <div class="mx-auto mt-3 w-8 h-0.5 bg-yellow-400/0 group-hover:bg-yellow-400 transition-all duration-300 rounded-full"></div>
            </div>
            <div class="group">
                <h3 class="text-4xl font-bold text-white"><span class="counter" data-target="500">0</span><span class="text-yellow-500">+</span></h3>
                <p class="mt-2 text-gray-400 text-sm">Happy Clients</p>
                <div class="mx-auto mt-3 w-8 h-0.5 bg-yellow-400/0 group-hover:bg-yellow-400 transition-all duration-300 rounded-full"></div>
            </div>
            <div class="group">
                <h3 class="text-4xl font-bold text-white"><span class="counter" data-target="120">0</span><span class="text-yellow-500">+</span></h3>
                <p class="mt-2 text-gray-400 text-sm">Vehicles</p>
                <div class="mx-auto mt-3 w-8 h-0.5 bg-yellow-400/0 group-hover:bg-yellow-400 transition-all duration-300 rounded-full"></div>
            </div>
            <div class="group">
                <h3 class="text-4xl font-bold text-white"><span class="counter" data-target="24">0</span>/7</h3>
                <p class="mt-2 text-gray-400 text-sm">Support</p>
                <div class="mx-auto mt-3 w-8 h-0.5 bg-yellow-400/0 group-hover:bg-yellow-400 transition-all duration-300 rounded-full"></div>
            </div>
        </div>
    </section>


    {{-- Mission / Vision --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">What Drives Us</span>
                <h2 class="text-4xl font-extrabold text-white">Mission & <span class="text-yellow-400">Vision</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div class="relative rounded-2xl p-8 cursor-pointer overflow-hidden bg-gray-900 card-dynamic-border">
                    <span class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>
                    <div class="w-10 h-10 rounded-xl bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-white animated-text">
                        <span class="word white"><span>O</span><span>u</span><span>r</span></span>
                        <span class="word yellow"><span>M</span><span>i</span><span>s</span><span>s</span><span>i</span><span>o</span><span>n</span></span>
                    </h3>
                    <p class="text-gray-400 leading-relaxed">To provide premium-quality car rentals with exceptional service, safety, and reliability — making every journey memorable.</p>
                </div>

                <div class="relative rounded-2xl p-8 cursor-pointer overflow-hidden bg-gray-900 card-dynamic-border">
                    <span class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>
                    <div class="w-10 h-10 rounded-xl bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-white animated-text">
                        <span class="word white"><span>O</span><span>u</span><span>r</span></span>
                        <span class="word yellow"><span>V</span><span>i</span><span>s</span><span>i</span><span>o</span><span>n</span></span>
                    </h3>
                    <p class="text-gray-400 leading-relaxed">To be a trusted and leading name in the car rental industry, delivering excellence and innovation in every journey.</p>
                </div>

            </div>
        </div>
    </section>


    {{-- Meet Our Experts --}}
    <section class="py-24 border-y border-yellow-500/20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">The Team</span>
            <h2 class="text-4xl font-extrabold text-white mb-3 animate-slideUp">
                Meet Our <span class="text-yellow-400">Experts</span>
            </h2>
            <div class="flex justify-center mb-14">
                <div class="w-12 h-1 bg-yellow-400 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach([
                    ['Hassan Khan',   'Fleet Manager',        'assets/image/professional.jpg'],
                    ['MD Shaikh',     'Operations Lead',      'assets/image/professional.jpg'],
                    ['Zain Malik',    'Customer Relations',   'assets/image/professional.jpg'],
                    ['Ayzaz Bhatti',  'Service Coordinator',  'assets/image/professional.jpg'],
                ] as $member)
                <div class="group bg-gray-900 border border-gray-700/50 hover:border-yellow-500/40 p-7 rounded-2xl
                            hover:shadow-xl hover:shadow-yellow-500/10 hover:scale-105
                            transition-all duration-300 cursor-pointer">
                    <div class="relative w-20 h-20 mx-auto mb-5">
                        <div class="absolute inset-0 rounded-full bg-yellow-400/20 scale-110 opacity-0 group-hover:opacity-100 transition-all duration-300 blur-sm"></div>
                        <img src="{{ $member[2] }}" alt="{{ $member[0] }}"
                            class="relative w-20 h-20 mx-auto rounded-full object-cover border-2 border-gray-700 group-hover:border-yellow-500 transition-all duration-300">
                    </div>
                    <h3 class="text-white font-bold text-base">{{ $member[0] }}</h3>
                    <p class="text-yellow-500/80 text-sm mt-1">{{ $member[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- Testimonials --}}
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">Reviews</span>
            <h2 class="text-4xl font-extrabold text-white mb-3 animate-slideUp">
                What Our <span class="text-yellow-400">Clients Say</span>
            </h2>
            <div class="flex justify-center mb-14">
                <div class="w-12 h-1 bg-yellow-400 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['"Excellent service and well-maintained cars. Highly recommended for all kinds of trips!"', 'Ahmed R.'],
                    ['"Smooth booking process, great support team, and affordable luxury cars."', 'Fatima S.'],
                    ['"Reliable, professional, and premium rental experience. Will use again!"', 'Omar K.'],
                ] as $review)
                <div class="group relative bg-gray-900 border border-gray-700/50 hover:border-yellow-500/30 p-8 rounded-2xl
                            hover:shadow-xl hover:shadow-yellow-500/10 transition-all duration-300 text-left">
                    {{-- Quote icon --}}
                    <div class="text-yellow-400/20 text-6xl font-serif leading-none mb-4 select-none">"</div>
                    {{-- Stars --}}
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6 text-sm">{{ $review[0] }}</p>
                    <div class="flex items-center gap-3 border-t border-gray-700/50 pt-5">
                        <div class="w-8 h-8 rounded-full bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center text-yellow-400 font-bold text-xs">
                            {{ substr($review[1], 0, 1) }}
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-sm">{{ $review[1] }}</h3>
                            <p class="text-yellow-500/70 text-xs">Verified Customer</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

@endsection