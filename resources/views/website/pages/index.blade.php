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
        <div class="relative z-10 max-w-6xl text-center flex gap-20 px-4">
            <!-- Text Section -->
            <div class="relative overflow-hidden">
                <!-- Sliding Headline -->
                <div class="absolute top-0 left-0 w-full">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight whitespace-nowrap animate-slideText text-white">
                        Looking for a &nbsp; <span class="text-[#FFD700]">Vehical ?</span> <br> You’re in the &nbsp;
                        <span class="text-[#FFD700]">perfect spot.</span>
                    </h1>
                </div>

                <!-- Static Paragraph and Buttons -->
                <div class="mt-32 md:mt-40 relative z-10">
                    <p class="text-gray-300 text-lg text-center">
                        Rent luxury and budget-friendly cars at unbeatable prices. Smooth ride, trusted service, instant
                        booking.
                    </p>
                    <div class="mt-8 flex gap-2 sm:gap-4 justify-center text-center pb-4">
                        <a href="#bookingSection" id="bookNowBtn"
                            class="px-8 py-4 border border-yellow-500 hover:scale-105 hover:shadow-md hover:shadow-white text-yellow-500 rounded-full
          hover:bg-yellow-500 hover:text-black transition-all duration-300">
                            Book Now
                        </a>
                        <a href="{{ url('vehicles') }}"
                            class="px-8 py-4 border hover:border-white hover:scale-105 hover:shadow-md hover:shadow-yellow-500 text-white rounded-full
          hover:bg-white hover:text-black transition-all duration-300">
                            View Car
                        </a>
                    </div>
                </div>
            </div>
            <!-- Image / Card -->
            <div data-aos="fade-left" data-aos-duration="1200" class="hidden md:flex justify-center">
                <img src="assets/image/bugatti-chiron.png" class="w-full max-w-lg drop-shadow-2xl">
            </div>

        </div>
    </section>
    <section class="bg-white py-16">
        <div
            class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-6 shadow-xl rounded-2xl p-8 -mt-24 bg-white relative z-20">

            <input type="text" placeholder="Pickup Location" class="border p-4 rounded-xl w-full">

            <input type="date" class="border p-4 rounded-xl w-full">

            <input type="date" class="border p-4 rounded-xl w-full">

            <button
                class="bg-[#FFD700] py-2 lg:py-0 text-black rounded-xl font-semibold hover:scale-105 transition hover:shadow-md hover:shadow-black">
                Search Car
            </button>
        </div>
    </section>
    <section class="bg-gradient-to-bl from-black to-gray-800 py-24">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl lg:text-6xl font-bold text-white text-center">
                • Featured <span class="text-[#FFD700]">Cars</span>
            </h2>

            <div class="grid md:grid-cols-3 gap-10 mt-16">

                @forelse ($vehicles as $vehicle)
                    <div class="relative rounded-2xl p-6 cursor-pointer overflow-hidden bg-gray-100/5 card-dynamic-border">
                        <!-- Border Elements -->
                        <span
                            class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                        <span
                            class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                        <span
                            class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                        <!-- Card Content -->
                        <img src="./assets/image/aston-martin.png" class="mb-6">
                        <h3 class="text-white text-xl font-semibold">{{ $vehicle->name }}</h3>
                        <p class="text-gray-400 mt-2">AED{{ $vehicle->per_day_charges }} / day</p>


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
                            class="mt-4 w-full bg-gray-500 hover:bg-gray-200 rounded-xl py-3 px-6 font-semibold text-black shadow-lg hover:shadow-[#FFD700]/50 transition-all duration-500">
                            Rent Now
                        </button>

                    </div>
                @empty
                @endforelse

                <!-- Card -->
                {{-- <div class="relative rounded-2xl p-6 cursor-pointer overflow-hidden bg-gray-100/5 card-dynamic-border">
                    <!-- Border Elements -->
                    <span
                        class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span
                        class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span
                        class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                    <!-- Card Content -->
                    <img src="./assets/image/aston-martin.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">ASTON MARTIN</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
                                name:'ASTON MARTIN',
                                price:'$100 / day',
                                image:'./assets/image/aston-martin.png',
                                seats:'4 Seats',
                                transmission:'Automatic',
                                fuel:'Petrol'
                            })"
                        class="mt-4 w-full bg-gray-500 hover:bg-gray-200 rounded-xl py-3 px-6 font-semibold text-black shadow-lg hover:shadow-[#FFD700]/50 transition-all duration-500">
                        Rent Now
                    </button>
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
                                    <form class="space-y-4">
                                        <input type="text" placeholder="Full Name"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <input type="email" placeholder="Email Address"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <input type="date"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <button
                                            class="w-full mt-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold py-3 rounded-xl transition-all duration-300">
                                            Confirm Booking
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative rounded-2xl p-6 cursor-pointer overflow-hidden bg-gray-100/5 card-dynamic-border">
                    <!-- Border Elements -->
                    <span
                        class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span
                        class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span
                        class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                    <!-- Card Content -->
                    <img src="./assets/image/bugatti-chiron.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">BUGATTI CHIRON</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
                                    name:'BUGATTI CHIRON',
                                    price:'$100 / day',
                                    image:'./assets/image/bugatti-chiron.png',
                                    seats:'2 Seats',
                                    transmission:'Automatic',
                                    fuel:'Petrol'
                                })"
                        class="mt-4 w-full bg-gray-500 hover:bg-gray-200 rounded-xl py-3 px-6 font-semibold text-black shadow-lg hover:shadow-[#FFD700]/50 transition-all duration-500">
                        Rent Now
                    </button>
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
                                    <form class="space-y-4">
                                        <input type="text" placeholder="Full Name"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <input type="email" placeholder="Email Address"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <input type="date"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <button
                                            class="w-full mt-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold py-3 rounded-xl transition-all duration-300">
                                            Confirm Booking
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-2xl p-6 cursor-pointer overflow-hidden bg-gray-100/5 card-dynamic-border">
                    <!-- Border Elements -->
                    <span
                        class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                    <span
                        class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                    <span
                        class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                    <!-- Card Content -->
                    <img src="./assets/image/bugatti-mistral.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">BUGATTI MISTRAL</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
                                name:'BUGATTI MISTRAL',
                                price:'$100 / day',
                                image:'./assets/image/bugatti-mistral.png',
                                seats:'2 Seats',
                                transmission:'Automatic',
                                fuel:'Petrol'
                            })"
                        class="mt-4 w-full bg-gray-500 hover:bg-gray-200 rounded-xl py-3 px-6 font-semibold text-black shadow-lg hover:shadow-[#FFD700]/50 transition-all duration-500">
                        Rent Now
                    </button>
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
                                    <form class="space-y-4">
                                        <input type="text" placeholder="Full Name"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <input type="email" placeholder="Email Address"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <input type="date"
                                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                                        <button
                                            class="w-full mt-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold py-3 rounded-xl transition-all duration-300">
                                            Confirm Booking
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="flex justify-center pt-16">
                <a href="./cars.html#car">
                    <button
                        class="bg-[#FFD700] px-10 py-3 rounded-full hover:scale-105 transition text-black font-medium hover:shadow-md hover:shadow-[#fff]">
                        SEE MORE
                    </button></a>
            </div>
    </section>

    <div class="bg-gradient-to-br from-black to-gray-800 text-gray-200">
        <!-- hero  -->

        <section class="relative overflow-hidden border-t-2 border-yellow-500">
            <div class="absolute inset-0 bg-[url('car.jpg')] bg-cover bg-center opacity-20"></div>

            <div class="relative max-w-7xl mx-auto px-6 py-20 text-center overflow-hidden">

                <!-- About our Company  -->
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
                        Rent a Car
                        provides reliable, luxury, and budget-friendly vehicles designed for
                        business trips, family journeys, and everyday travel.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Our mission is to deliver a smooth, secure, and premium rental
                        experience with modern vehicles and professional customer service.
                    </p>
                </div>

                <!-- Card -->
                <div class="relative rounded-2xl p-6 overflow-hidden bg-gray-100/5 border-rotate">

                    <!-- SVG Border -->
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

        <section id="stats" class="py-16 bg-gradient-to-r from-gray-900 to-black ">

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
                    <!-- Border Elements -->
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
                    <!-- Border Elements -->
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
        <!-- Contact Us -->

        <div class="bg-gradient-to-br from-black via-gray-900 to-gray-800 text-gray-200" id="bookingSection">

            <!-- HERO -->
            <section class="py-24 text-center border-t-2 border-yellow-500 overflow-hidden">
                <h1 class="text-3xl md:text-6xl font-bold inline-block animate-contact">
                    • Contact <span class="text-yellow-500">Us</span>
                </h1>

                <p class="max-w-2xl mx-auto text-gray-300 text-lg mt-6">
                    Have a question or need help? We’re here to assist you anytime.
                </p>
            </section>

            <!-- CONTACT FORM -->
            <section class="pb-20">
                <div class="max-w-5xl mx-auto px-6">

                    <form
                        class="bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-700 rounded-2xl p-10 shadow-2xl grid grid-cols-1 md:grid-cols-2 gap-8">

                        <!-- Name -->
                        <div>
                            <label class="block mb-2 text-sm">Full Name</label>
                            <input type="text" required
                                class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block mb-2 text-sm">Email Address</label>
                            <input type="email" required
                                class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block mb-2 text-sm">Phone Number</label>
                            <input type="tel"
                                class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block mb-2 text-sm">Subject</label>
                            <input type="text"
                                class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        </div>

                        <!-- Message -->
                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm">Message</label>
                            <textarea rows="5" required
                                class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="md:col-span-2 text-center">
                            <button type="submit"
                                class="mt-4 w-full bg-gray-500 hover:bg-gray-200 rounded-xl py-3 px-6 font-semibold text-black shadow-lg shadow-black/30 hover:shadow-xl hover:shadow-[#FFD700]/50 transition-all duration-500">
                                Send Message
                            </button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>



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
                    <form action="{{route('lead.store')}}" class="space-y-4" method="POST">
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
@endsection
