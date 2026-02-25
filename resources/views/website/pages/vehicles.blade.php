@extends('website.app')
@section('content')

{{-- ============================================
   HERO SECTION
============================================ --}}
<section class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-black">

    <div class="absolute inset-0 bg-[url('./assets/image/automotive3.jpg')] bg-cover bg-center scale-110 animate-zoomSlow"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/90"></div>
    <span class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent animate-lineMove"></span>

    <div class="relative z-10 max-w-6xl px-6 text-center mt-14">
        <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-4 animate-fadeIn">Premium Fleet</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-wide animate-slideUp">
            Explore Our <span class="text-yellow-500">Luxury Cars</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn">
            Choose from premium, performance and comfort vehicles crafted for your perfect journey.
        </p>
        <div class="mt-10 flex justify-center gap-4 animate-fadeIn">
            <a href="#car"
                class="px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
                       hover:scale-105 active:scale-95 transition-all duration-300
                       shadow-lg hover:shadow-yellow-500/40">
                View Cars
            </a>
            <a href="#bookingSection"
                class="px-8 py-4 border-2 border-white/40 text-white font-semibold rounded-full
                       hover:border-yellow-500 hover:text-yellow-400 hover:scale-105
                       active:scale-95 transition-all duration-300 backdrop-blur-sm">
                Book Now
            </a>
        </div>
    </div>

    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500/30 to-transparent"></span>
</section>


{{-- ============================================
   SEARCH BAR
============================================ --}}
<section class="bg-gray-950 pb-0 pt-0">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white border border-gray-700/50 rounded-2xl p-7 -mt-8 relative z-20 shadow-2xl shadow-black/60">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

                <div class="relative">
                    <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-yellow-500/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <input type="text" placeholder="Pickup Location"
                        class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-300 placeholder-gray-500
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all">
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-yellow-500/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input type="date" class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-400
                                              focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all [color-scheme:dark]">
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-yellow-500/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input type="date" class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-400
                                              focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all [color-scheme:dark]">
                </div>

                <button class="group relative overflow-hidden bg-yellow-400 text-black font-bold text-sm rounded-xl py-3.5 px-6
                               hover:bg-yellow-300 hover:scale-[1.02] hover:shadow-lg hover:shadow-yellow-400/30
                               transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] bg-white/20 skew-x-12 transition-transform duration-500"></span>
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
                    </svg>
                    Search Car
                </button>

            </div>
        </div>
    </div>
</section>


{{-- ============================================
   CARS GRID
============================================ --}}
<section class="bg-gray-950 py-24 scroll-mt-20" id="car">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Section Header --}}
        <div class="text-center mb-14">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">Our Fleet</span>
            <h2 class="text-4xl lg:text-5xl font-extrabold text-white">
                Explore All <span class="text-yellow-400">Cars</span>
            </h2>
            <div class="mt-5 flex justify-center">
                <div class="w-12 h-1 bg-yellow-400 rounded-full"></div>
            </div>
        </div>

        {{-- Cars Grid --}}
        <div class="grid md:grid-cols-3 gap-8">

            @php
            $cars = [
                ['ASTON MARTIN',      'aston-martin.png',              '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['BUGATTI CHIRON',    'bugatti-chiron.png',            '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['BUGATTI MISTRAL',   'bugatti-mistral.png',           '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['FERRARI',           'ferrari.png',                   '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['KOENIGSEGG JESKO',  'koenigsegg-jesko.png',          '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['AUDI A3',           'audi-a3.png',                   '5 Seats', 'Automatic', 'Petrol', '$100'],
                ['SUPRA MK5',         'supra-mk5.png',                 '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['MCLAREN',           'images-removebg-preview.png',   '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['KOENIGSEGG AGERA',  'koenigsegg-agera.png',          '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['BMW',               'bmw.png',                       '5 Seats', 'Automatic', 'Petrol', '$100'],
                ['ROLLS ROYCE',       'rolls-royce.png',               '4 Seats', 'Automatic', 'Petrol', '$100'],
                ['LEXUS LC 500',      'lexus-lc-500.png',              '4 Seats', 'Automatic', 'Petrol', '$100'],
                ['PAGANI',            'pagani.png',                    '2 Seats', 'Automatic', 'Petrol', '$100'],
                ['PORSCHE TAYCAN',    'porsche-taycan.png',            '4 Seats', 'Automatic', 'Electric','$100'],
                ['LAMBORGHINI',       'Lamborghini.png',               '2 Seats', 'Automatic', 'Petrol', '$100'],
            ];
            @endphp

            @foreach($cars as $car)
            <div class="group relative bg-gray-900 rounded-2xl overflow-hidden border border-gray-700/50
                        hover:border-yellow-500/40 hover:shadow-xl hover:shadow-yellow-500/10
                        transition-all duration-400 cursor-pointer card-dynamic-border">

                {{-- Animated border spans --}}
                <span class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                <span class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                <span class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                {{-- Image --}}
                <div class="relative bg-gray-800/60 px-6 pt-8 pb-4 overflow-hidden">
                    <div class="absolute inset-0 bg-yellow-400/0 group-hover:bg-yellow-400/5 transition-all duration-500"></div>
                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-6 bg-yellow-400/0 group-hover:bg-yellow-400/10 blur-2xl transition-all duration-500 rounded-full"></div>
                    <img src="./assets/image/{{ $car[1] }}" alt="{{ $car[0] }}"
                        class="w-full h-44 object-contain group-hover:scale-105 transition-transform duration-500 drop-shadow-2xl">
                </div>

                {{-- Card body --}}
                <div class="px-6 py-5">
                    <div class="flex items-start justify-between gap-2">
                        <h3 class="text-white text-lg font-bold leading-tight">{{ $car[0] }}</h3>
                        <div class="text-right shrink-0">
                            <span class="text-yellow-400 font-extrabold text-lg">{{ $car[5] }}</span>
                            <p class="text-gray-500 text-xs">/day</p>
                        </div>
                    </div>

                    {{-- Specs --}}
                    <div class="mt-4 flex items-center gap-3 text-xs text-gray-400 flex-wrap">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>
                            {{ $car[2] }}
                        </span>
                        <span class="w-px h-3 bg-gray-600"></span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 16v-2m8-6h2M2 12H4m13.657-5.657l1.414-1.414M4.929 19.071l1.414-1.414M19.071 19.071l-1.414-1.414M6.343 6.343L4.929 4.929"/>
                            </svg>
                            {{ $car[3] }}
                        </span>
                        <span class="w-px h-3 bg-gray-600"></span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            {{ $car[4] }}
                        </span>
                    </div>

                    <div class="mt-5 border-t border-gray-700/50"></div>

                    <button
                        onclick="openModal({
                            name: '{{ $car[0] }}',
                            price: '{{ $car[5] }} / day',
                            image: './assets/image/{{ $car[1] }}',
                            seats: '{{ $car[2] }}',
                            transmission: '{{ $car[3] }}',
                            fuel: '{{ $car[4] }}'
                        })"
                        class="mt-4 w-full bg-gray-800 hover:bg-yellow-400 text-gray-300 hover:text-black
                               border border-gray-700 hover:border-yellow-400
                               rounded-xl py-3 px-6 font-semibold text-sm
                               hover:shadow-lg hover:shadow-yellow-400/20 hover:scale-[1.02]
                               transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0zm-1-5H6l1.5-5h9L20 12z"/>
                        </svg>
                        Rent Now
                    </button>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


{{-- ============================================
   SINGLE SHARED MODAL (only one, not per card!)
============================================ --}}
<div id="rentModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-sm px-4">

    <div id="modalBox"
        class="relative bg-gradient-to-br from-gray-900 to-black border border-gray-700/50 rounded-2xl w-full max-w-4xl overflow-hidden
               transform scale-95 opacity-0 transition-all duration-500 shadow-2xl shadow-black/60">

        {{-- Close --}}
        <button onclick="closeModal()"
            class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 hover:bg-yellow-500 hover:text-black
                   text-white text-xl transition-all duration-300 z-10">&times;</button>

        <div class="grid md:grid-cols-2">

            {{-- Left — Image --}}
            <div class="bg-gray-800/50 flex flex-col items-center justify-center p-8 gap-4">
                <img id="carImage" class="w-full max-w-xs object-contain drop-shadow-2xl">
                {{-- Spec badges --}}
                <div class="flex gap-3 mt-2">
                    <span id="carSeats" class="bg-gray-700 border border-gray-600 text-white text-xs px-3 py-2 rounded-lg"></span>
                    <span id="carTransmission" class="bg-gray-700 border border-gray-600 text-white text-xs px-3 py-2 rounded-lg"></span>
                    <span id="carFuel" class="bg-gray-700 border border-gray-600 text-white text-xs px-3 py-2 rounded-lg"></span>
                </div>
            </div>

            {{-- Right — Form --}}
            <div class="p-8">
                <div class="mb-6">
                    <h2 id="carName" class="text-2xl font-extrabold text-white"></h2>
                    <p id="carPrice" class="text-yellow-400 font-bold text-lg mt-1"></p>
                </div>

                <form class="space-y-4">
                    <div class="relative">
                        <input type="text" placeholder="Full Name"
                            class="w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3 text-sm
                                   outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all placeholder-gray-500">
                    </div>
                    <div class="relative">
                        <input type="email" placeholder="Email Address"
                            class="w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3 text-sm
                                   outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all placeholder-gray-500">
                    </div>
                    <div class="relative">
                        <input type="date"
                            class="w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3 text-sm
                                   outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all [color-scheme:dark]">
                    </div>

                    <button type="submit"
                        class="group relative overflow-hidden w-full bg-yellow-400 hover:bg-yellow-300 text-black font-bold
                               rounded-xl py-3.5 text-sm hover:shadow-xl hover:shadow-yellow-400/20
                               hover:scale-[1.01] transition-all duration-300 flex items-center justify-center gap-2 mt-2">
                        <span class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] bg-white/20 skew-x-12 transition-transform duration-500"></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0zm-1-5H6l1.5-5h9L20 12z"/>
                        </svg>
                        Confirm Booking
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>


{{-- ============================================
   CONTACT SECTION
============================================ --}}
<div class="bg-gray-950 border-t border-gray-800" id="bookingSection">

    <section class="py-20 text-center">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 ">Get In Touch</span>
        <h1 class="text-4xl md:text-6xl mt-5 font-extrabold text-white animate-contact">
            Contact <span class="text-yellow-500">Us</span>
        </h1>
        <p class="max-w-xl mx-auto text-gray-400 text-lg mt-5">
            Have a question or need help? We're here to assist you anytime.
        </p>
    </section>

    <section class="pb-24">
        <div class="max-w-4xl mx-auto px-6">
            <form class="bg-gray-900 border border-gray-700/50 rounded-2xl p-8 md:p-10 shadow-2xl shadow-black/40 grid grid-cols-1 md:grid-cols-2 gap-6">

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
                               rounded-xl py-4 text-sm hover:shadow-xl hover:shadow-yellow-400/20
                               hover:scale-[1.01] transition-all duration-300 flex items-center justify-center gap-2">
                        <span class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] bg-white/20 skew-x-12 transition-transform duration-500"></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Send Message
                    </button>
                </div>

            </form>
        </div>
    </section>
</div>


{{-- ============================================
   MODAL JS
============================================ --}}
<script>
    function openModal(car) {
        document.getElementById('carImage').src        = car.image;
        document.getElementById('carName').textContent  = car.name;
        document.getElementById('carPrice').textContent = car.price;
        document.getElementById('carSeats').textContent = car.seats;
        document.getElementById('carTransmission').textContent = car.transmission;
        document.getElementById('carFuel').textContent  = car.fuel;

        const modal    = document.getElementById('rentModal');
        const modalBox = document.getElementById('modalBox');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);

        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal    = document.getElementById('rentModal');
        const modalBox = document.getElementById('modalBox');

        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 400);
    }

    // Close on backdrop click
    document.getElementById('rentModal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });

    // Close on ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
</script>

@endsection