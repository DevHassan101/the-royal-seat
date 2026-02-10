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
                Explore Our <span class="text-yellow-500">Luxury Cars</span>
            </h1>

            <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn delay-200">
                Choose from premium, performance and comfort vehicles crafted for your perfect journey.
            </p>

            <div class="mt-10 flex justify-center gap-6 animate-fadeIn delay-400">
                <a href="#car" id="viewCarsBtn"
                    class="px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
  hover:scale-105 active:scale-95 transition-all duration-300
  shadow-md hover:shadow-white">
                    View Cars
                </a>
                <a href="#bookingSection" id="bookNowBtn"
                    class="px-8 py-4 border border-yellow-500 text-yellow-500 rounded-full font-semibold
          hover:bg-yellow-500 hover:text-black transition-all duration-300 hover:scale-105 active:scale-95 shadow-md hover:shadow-white">
                    Book Now
                </a>
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

    <section class="bg-gradient-to-bl from-black to-gray-800 py-24 scroll-mt-20" id="car">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl lg:text-6xl font-bold text-white text-center">
                • Explore All <span class="text-[#FFD700]">Cars</span>
            </h2>

            <div class="grid md:grid-cols-3 gap-10 mt-16">

                <!-- KIA car KIA car KIA car KIA car KIA car  KIA car KIA car KIA car KIA car KIA car    -->

                <!-- Card -->
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
                    <h3 class="text-white text-xl font-semibold">ASTON MARTIN</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'ASTON MARTIN',
    price:'$100 / day',
    image:'./assets/image/aston-martin.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- ELANTRA car ELANTRA car ELANTRA car ELANTRA car ELANTRA car ELANTRA car ELANTRA car ELANTRA car -->

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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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

                <!-- HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car HAVAl car    -->
                <!-- Card -->
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- LAND CRUISER LAND CRUISER LAND CRUISER LAND CRUISER LAND CRUISER LAND CRUISER   -->
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
                    <img src="./assets/image/ferrari.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">FERRARI</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'FERRARI',
    price:'$100 / day',
    image:'./assets/image/ferrari.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- HYUNDA-SONATA HYUNDA-SONATA HYUNDA-SONATA HYUNDA-SONATA HYUNDA-SONATA HYUNDA-SONATA -->
                <!-- Card -->
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
                    <img src="./assets/image/koenigsegg-jesko.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">KOENIGSEGG JESKO</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'KOENIGSEGG JESKO',
    price:'$100 / day',
    image:'./assets/image/koenigsegg-jesko.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- AUDI A3 AUDI A3 AUDI A3 AUDI A3 AUDI A3 AUDI A3 AUDI A3 AUDI A3 AUDI A3 AUDI A3  -->
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
                    <img src="./assets/image/audi-a3.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">AUDI A3</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'AUDI A3',
    price:'$100 / day',
    image:'./assets/image/audi-a3.png',
    seats:'5 Seats',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- HONDA CITY HONDA CITY  HONDA CITY HONDA CITY  HONDA CITY HONDA CITY  HONDA CITY HONDA CITY  HONDA CITY HONDA CITY   -->
                <!-- Card -->
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
                    <img src="./assets/image/supra-mk5.png" class="mb-16">
                    <h3 class="text-white text-xl font-semibold">SUPRA MK5</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'SUPRA MK5',
    price:'$100 / day',
    image:'./assets/image/supra-mk5.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO PRADO  -->
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
                    <img src="./assets/image/images-removebg-preview.png" class="mb-16">
                    <h3 class="text-white text-xl font-semibold">MCLAREN</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'MCLAREN',
    price:'$100 / day',
    image:'./assets/image/images-removebg-preview.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- MG HS MG HS MG HS MG HS MG HS MG HS MG HS MG HS MG HS MG HS MG HS MG HS MG HS  MG HS -->
                <!-- Card -->
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
                    <img src="./assets/image/koenigsegg-agera.png" class="mb-16">
                    <h3 class="text-white text-xl font-semibold">KOENIGSEGG AGERA</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'KOENIGSEGG AGERA',
    price:'$100 / day',
    image:'./assets/image/koenigsegg-agera.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- BMW BMW BMW BMW BMW BMW BMW  BMW BMW BMW BMW BMW BMW BMW BMW BMW BMW BMW BMW BMW BMW BMW  -->
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
                    <img src="./assets/image/bmw.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">BMW</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'BMW',
    price:'$100 / day',
    image:'./assets/image/bmw.png',
    seats:'5 Seats',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY TOYOTA CARMY -->
                <!-- Card -->
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
                    <img src="./assets/image/rolls-royce.png" class="mb-10">
                    <h3 class="text-white text-xl font-semibold">TOYOTA CARMY</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'TOYOTA CARMY',
    price:'$100 / day',
    image:'./assets/image/rolls-royce.png',
    seats:'4                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Seats',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER FORTUNER -->
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
                    <img src="./assets/image/lexus-lc-500.png" class="mb-10">
                    <h3 class="text-white text-xl font-semibold">LEXUS LC 500</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'LEXUS LC 500',
    price:'$100 / day',
    image:'./assets/image/lexus-lc-500.png',
    seats:'8 Seats',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- TOYOTA ALTIS TOYOTA ALTIS TOYOTA ALTIS TOYOTA ALTIS TOYOTA ALTIS TOYOTA ALTIS TOYOTA ALTIS TOYOTA ALTIS -->
                <!-- Card -->
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
                    <img src="./assets/image/pagani.png" class="mb-14">
                    <h3 class="text-white text-xl font-semibold">PAGANI</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'PAGANI',
    price:'$100 / day',
    image:'./assets/image/pagani.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC HONDA CIVIC -->
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
                    <img src="./assets/image/porsche-taycan.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">PORSCHE TAYCAN</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'PORSCHE TAYCAN',
    price:'$100 / day',
    image:'./assets/image/porsche-taycan.png',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
                <!-- TOYOTA YARIS TOYOTA YARIS  TOYOTA YARIS TOYOTA YARIS TOYOTA YARIS TOYOTA YARIS TOYOTA YARIS TOYOTA YARIS -->
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
                    <img src="./assets/image/Lamborghini.png" class="mb-6">
                    <h3 class="text-white text-xl font-semibold">LAMBORGHINI</h3>
                    <p class="text-gray-400 mt-2">$100 / day</p>

                    <!-- Button (untouched) -->
                    <button
                        onclick="openModal({
    name:'LAMBORGHINI',
    price:'$100 / day',
    image:'./assets/image/Lamborghini.png',
    seats:'5 Seats',
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
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carSeats"></div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carTransmission">
                                        </div>
                                        <div class="bg-gray-800 rounded-lg py-3 text-sm text-white" id="carFuel"></div>
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
            </div>
    </section>
    <!-- Contact Us -->

    <div class="bg-gradient-to-br from-black via-gray-900 to-gray-800 text-gray-200" id="bookingSection">

        <!-- HERO -->
        <section class="py-20 text-center border-t-2 border-yellow-500 overflow-hidden">
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
@endsection
