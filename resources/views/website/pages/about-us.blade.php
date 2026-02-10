@extends('website.app')
@section('content')
    <section class="relative h-[110vh] flex items-center justify-center overflow-hidden bg-black">

        <!-- Background image -->
        <div
            class="absolute inset-0 bg-[url('./assets/image/automotive3.jpg')] bg-cover bg-center scale-110 animate-zoomSlow">
        </div>

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/90"></div>

        <!-- Animated light line -->
        <span
            class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent animate-lineMove"></span>

        <!-- Content -->
        <div class="relative z-10 max-w-6xl px-6 text-center">

            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-wide animate-slideUp">
                Welcome to our <span class="text-yellow-500">Car Rental</span> Service
            </h1>

            <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn delay-200">
                We provide premium and affordable vehicles across Pakistan, tailored for your travel needs.
                Our fleet is maintained with care, ensuring safety, comfort, and a smooth driving experience.
            </p>

            <div class="mt-10 flex justify-center gap-6 animate-fadeIn delay-400">
                <a href="./cars.html#car" id="viewCarsBtn"
                    class="px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
         hover:scale-105 active:scale-95 transition-all duration-300
         shadow-lg hover:shadow-yellow-500/40">
                    View Cars
                </a>
            </div>

        </div>

    </section>
    <div class="bg-gradient-to-br from-black to-gray-800 text-gray-200">

        <!-- HERO -->
        <section class="relative overflow-hidden border-t-2 border-yellow-500">
            <div class="absolute inset-0 bg-[url('car.jpg')] bg-cover bg-center opacity-20"></div>
            <div class="relative max-w-7xl mx-auto px-6 py-20 text-center overflow-hidden">
                <div class="whitespace-nowrap overflow-hidden">
                    <h1 class="text-2xl sm:text-4xl md:text-6xl font-bold py-4">
                        • About Our <span class="text-yellow-500">Company</span>
                    </h1>
                </div>
                <p class="max-w-2xl mx-auto text-gray-300 text-lg mt-6">
                    Premium car rental experience built on trust, comfort, and style.
                </p>
            </div>
        </section>

        <!-- ABOUT -->
        <section class="pb-20">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Text -->
                <div>
                    <h3 class="text-2xl font-bold mb-4 text-white animated-text">
                        <span class="word white">
                            <span>W</span><span>h</span><span>o</span>
                        </span>
                        <span class="word yellow">
                            <span>A</span><span>r</span><span>e</span> <span>Y</span><span>o</span><span>u</span>
                        </span>
                    </h3>
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        <span class="font-semibold text-white">THE ROYAL <span class="text-yellow-500">SEAT</span></span>
                        Rent a Car provides reliable, luxury, and budget-friendly vehicles designed for
                        business trips, family journeys, and everyday travel.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Our mission is to deliver a smooth, secure, and premium rental
                        experience with modern vehicles and professional customer service.
                    </p>
                </div>

                <!-- Card -->
                <div class="relative rounded-2xl p-6 overflow-hidden bg-gray-100/5 border-rotate">
                    <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 100 100"
                        preserveAspectRatio="none">
                        <rect x="1" y="1" width="98" height="98" rx="6" ry="6" fill="none"
                            stroke="#eab308" stroke-width="1.5" stroke-dasharray="20 180" class="animated-border" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-6 text-white">Why Choose Us</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li>✔ Modern & well-maintained vehicles</li>
                        <li>✔ Transparent pricing, no hidden charges</li>
                        <li>✔ Flexible rental packages</li>
                        <li>✔ 24/7 customer assistance</li>
                        <li>✔ Quick & easy booking</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- STATS -->
        <section id="stats" class="py-16 bg-gradient-to-r from-gray-900 to-black">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="10">0</span><span class="text-yellow-500">+</span>
                    </h3>
                    <p class="mt-2 text-gray-400">Years Experience</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="500">0</span><span class="text-yellow-500">+</span>
                    </h3>
                    <p class="mt-2 text-gray-400">Happy Clients</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="120">0</span><span class="text-yellow-500">+</span>
                    </h3>
                    <p class="mt-2 text-gray-400">Vehicles</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-white">
                        <span class="counter" data-target="24">0</span>/7
                    </h3>
                    <p class="mt-2 text-gray-400">Support</p>
                </div>
            </div>
        </section>

        <!-- MISSION / VISION -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="relative rounded-2xl p-6 cursor-pointer overflow-hidden bg-gray-100/5 card-dynamic-border">
                    <span
                        class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span
                        class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span
                        class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>
                    <h3 class="text-2xl font-bold mb-4 text-white animated-text">
                        <span class="word white">
                            <span>O</span><span>u</span><span>r</span>
                        </span>
                        <span class="word yellow">
                            <span>M</span><span>i</span><span>s</span><span>s</span><span>i</span><span>o</span><span>n</span>
                        </span>
                    </h3>
                    <p class="text-gray-400 leading-relaxed">
                        To provide premium-quality car rentals with exceptional service,
                        safety, and reliability.
                    </p>
                </div>
                <div class="relative rounded-2xl p-6 cursor-pointer overflow-hidden bg-gray-100/5 card-dynamic-border">
                    <span
                        class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span
                        class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span
                        class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>
                    <h3 class="text-2xl font-bold mb-4 text-white animated-text">
                        <span class="word white">
                            <span>O</span><span>u</span><span>r</span>
                        </span>
                        <span class="word yellow">
                            <span>V</span><span>i</span><span>s</span><span>i</span><span>o</span><span>n</span>
                        </span>
                    </h3>
                    <p class="text-gray-400 leading-relaxed">
                        To be a trusted and leading name in the car rental industry,
                        delivering excellence in every journey.
                    </p>
                </div>
            </div>
        </section>

        <!-- TEAM / EXPERTS -->
        <section class="py-20 border-y-2 border-yellow-500">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-12 animate-slideUp">
                    • Meet Our <span class="text-yellow-500">Experts</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
                    <div class="bg-gray-900/90 p-6 rounded-2xl hover:scale-105 transition-transform duration-300">
                        <img src="assets/image/professional.jpg" class="w-22 h-22 mx-auto mb-4 rounded-full">
                        <h3 class="text-white font-semibold">Hassan Khan</h3>
                        <p class="text-gray-400">Fleet Manager</p>
                    </div>
                    <div class="bg-gray-900/90 p-6 rounded-2xl hover:scale-105 transition-transform duration-300">
                        <img src="assets/image/professional.jpg" class="w-22 h-22 mx-auto mb-4 rounded-full">
                        <h3 class="text-white font-semibold">MD Shaikh</h3>
                        <p class="text-gray-400">Operations Lead</p>
                    </div>
                    <div class="bg-gray-900/90 p-6 rounded-2xl hover:scale-105 transition-transform duration-300">
                        <img src="assets/image/professional.jpg" class="w-22 h-22 mx-auto mb-4 rounded-full">
                        <h3 class="text-white font-semibold">Zain Malik</h3>
                        <p class="text-gray-400">Customer Relations</p>
                    </div>
                    <div class="bg-gray-900/90 p-6 rounded-2xl hover:scale-105 transition-transform duration-300">
                        <img src="assets/image/professional.jpg" class="w-22 h-22 mx-auto mb-4 rounded-full">
                        <h3 class="text-white font-semibold">Ayzaz Bhatti</h3>
                        <p class="text-gray-400">Service Coordinator</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS -->
        <section class="py-20 bg-gray-900/50">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-12 animate-slideUp">
                    • What Our <span class="text-yellow-500">Clients Say</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-yellow-500/40 transition-shadow duration-300">
                        <p class="text-gray-300 mb-4">
                            "Excellent service and well-maintained cars. Highly recommended for all kinds of trips!"
                        </p>
                        <h3 class="text-white font-semibold">Ahmed R.</h3>
                        <p class="text-yellow-500 text-sm">Verified Customer</p>
                    </div>
                    <div
                        class="bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-yellow-500/40 transition-shadow duration-300">
                        <p class="text-gray-300 mb-4">
                            "Smooth booking process, great support team, and affordable luxury cars."
                        </p>
                        <h3 class="text-white font-semibold">Fatima S.</h3>
                        <p class="text-yellow-500 text-sm">Verified Customer</p>
                    </div>
                    <div
                        class="bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-yellow-500/40 transition-shadow duration-300">
                        <p class="text-gray-300 mb-4">
                            "Reliable, professional, and premium rental experience. Will use again!"
                        </p>
                        <h3 class="text-white font-semibold">Omar K.</h3>
                        <p class="text-yellow-500 text-sm">Verified Customer</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
