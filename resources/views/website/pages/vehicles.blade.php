@extends('website.app')
@section('content')
    {{-- ============================================
   HERO SECTION
============================================ --}}
    <section class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-black">

        <div
            class="absolute inset-0 bg-[url('./assets/image/automotive3.jpg')] bg-cover bg-center scale-110 animate-zoomSlow">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/90"></div>
        <span
            class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent animate-lineMove"></span>

        <div class="relative z-10 max-w-6xl px-6 text-center mt-14">
            <span
                class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-4 animate-fadeIn">Premium
                Fleet</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-wide animate-slideUp">
                Explore Our <span class="text-yellow-500">Luxury Cars</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn">
                Choose from premium, performance and comfort vehicles crafted for your perfect journey.
            </p>
            {{-- <div class="mt-10 flex justify-center gap-4 animate-fadeIn">
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
            </div> --}}
        </div>

        <span
            class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500/30 to-transparent"></span>
    </section>


    {{-- ============================================
   SEARCH BAR
============================================ --}}
    <section class="bg-gray-950 pb-0 pt-0">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white border border-gray-700/50 rounded-2xl p-7 -mt-8 relative z-20 shadow-2xl shadow-black/60">
                <form action="{{ url('vehicles') }}" class="grid grid-cols-1 md:grid-cols-4 gap-3" method="GET">

                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-500/60" viewBox="0 0 24 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path
                                        d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z">
                                    </path>
                                    <path fill="#c9982b"
                                        d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4zM7.5 13a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m9 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m-.736-7H8.236a1 1 0 0 0-.832.445l-.062.108l-1.27 2.538C7.62 9.555 9.706 10 12 10c2.142 0 4.101-.388 5.61-.817l.317-.092l-1.269-2.538a1 1 0 0 0-.77-.545L15.765 6Z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" placeholder="ex: Aston martin, Ferrari" name="name"
                            value="{{ old('name', request('name')) }}"
                            class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-300 placeholder-gray-500
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all">
                    </div>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-yellow-500/60" fill="currentColor" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 353.926 353.926" xml:space="preserve">
                                <path d="M210.286,344.926c0,4.971-4.029,9-9,9h-48.65c-4.971,0-9-4.029-9-9s4.029-9,9-9h48.65
                                            C206.257,335.926,210.286,339.955,210.286,344.926z M289.677,258.958v25.928c0,19.259-15.67,34.928-34.931,34.928H99.177
                                            c-19.259,0-34.928-15.668-34.928-34.928v-25.928c0-4.971,4.029-9,9-9h2.394c-0.021-0.258-0.033-0.52-0.033-0.784v-24.118
                                            c-0.013-0.535,0.023-1.066,0.105-1.588c0.204-1.329,0.699-2.561,1.418-3.631c0.705-1.055,1.639-1.969,2.767-2.659
                                            c0.457-0.281,0.94-0.522,1.446-0.719c3.564-1.483,7.107-3.016,10.605-4.586V101.909c0-17.877,11.375-33.581,27.599-39.623
                                            c-0.019-0.492-0.028-0.984-0.028-1.48V38.578C119.521,17.306,136.827,0,158.098,0h37.725C217.095,0,234.4,17.306,234.4,38.578
                                            v22.229c0,0.495-0.01,0.988-0.028,1.478c6.395,2.378,12.129,6.28,16.702,11.351c0.16-0.3,0.318-0.599,0.478-0.899
                                            c2.318-4.396,7.761-6.081,12.16-3.76c4.396,2.319,6.079,7.764,3.76,12.16c-16.845,31.926-41.307,61.508-72.707,87.923
                                            c-25.063,21.083-53.512,39.294-84.813,54.313v26.586h134.02V141.64c0-4.971,4.029-9,9-9s9,4.029,9,9v108.318h18.706
                                            C285.647,249.958,289.677,253.987,289.677,258.958z M137.521,60.807c0,1.842,0.243,3.629,0.699,5.33
                                            c0.073,0.22,0.138,0.444,0.193,0.672c2.574,8.428,10.424,14.576,19.684,14.576h37.725c9.259,0,17.109-6.146,19.685-14.573
                                            c0.057-0.231,0.122-0.458,0.195-0.68c0.455-1.699,0.698-3.484,0.698-5.325V38.578C216.4,27.231,207.169,18,195.822,18h-37.725
                                            c-11.346,0-20.576,9.231-20.576,20.578V60.807z M109.951,203.272c56.184-28.521,102.335-68.15,131.162-112.739
                                            c-2.612-4.871-6.75-8.658-11.666-10.83c-6.622,11.738-19.213,19.681-33.625,19.681h-37.725c-14.411,0-27.002-7.944-33.624-19.682
                                            c-8.604,3.8-14.522,12.438-14.522,22.207V203.272z M271.677,267.958h-18.57c-0.046,0-0.091,0.001-0.136,0.001h-152.02
                                            c-0.045,0-0.09,0-0.136-0.001H82.249v16.928c0,9.334,7.594,16.928,16.928,16.928h155.569c9.336,0,16.931-7.594,16.931-16.928
                                            V267.958z" />
                            </svg>
                        </div>
                        <input type="number" name="seats" placeholder="Passenger seats"
                            value="{{ old('seats', request('seats')) }}"
                            class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-400
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all [color-scheme:dark]">
                    </div>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-yellow-500/60" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-linejoin="round" />
                                <path d="M12 3C12 3 8.5 6 8.5 12C8.5 18 12 21 12 21" stroke="currentColor"
                                    stroke-linejoin="round" />
                                <path d="M12 3C12 3 15.5 6 15.5 12C15.5 18 12 21 12 21" stroke="currentColor"
                                    stroke-linejoin="round" />
                                <path d="M3 12H21" stroke="currentColor" stroke-linejoin="round" />
                                <path d="M19.5 7.5H4.5" stroke="currentColor" stroke-linejoin="round" />
                                <g filter="url(#filter0_d_15_556)">
                                    <path d="M19.5 16.5H4.5" stroke="currentColor" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_15_556" x="3.5" y="16" width="17" height="3"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="1" />
                                        <feGaussianBlur stdDeviation="0.5" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_15_556" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_15_556"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                        <select name="type" id=""
                            class="bg-gray-800 border border-gray-700 pl-10 pr-4 py-3.5 rounded-xl w-full text-sm text-gray-400
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/30 transition-all [color-scheme:dark]">
                            <option value="">All</option>
                            <option value="AV" @selected(old('type', request('type')) == 'AV')>AV</option>
                            <option value="UAENATIONAL" @selected(old('type', request('type')) == 'UAENATIONAL')>UAENATIONAL</option>
                            <option value="PHC" @selected(old('type', request('type')) == 'PHC')>PHC</option>
                        </select>
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

                </form>
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
                <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-3">Our
                    Fleet</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-white">
                    Explore All <span class="text-yellow-400">Cars</span>
                </h2>
                <div class="mt-5 flex justify-center">
                    <div class="w-12 h-1 bg-yellow-400 rounded-full"></div>
                </div>
            </div>

            {{-- Cars Grid --}}
            <div class="grid md:grid-cols-3 gap-8">

                @foreach ($vehicles as $vehicle)
                    <div
                        class="group relative bg-gray-900 rounded-2xl overflow-hidden border border-gray-700/50
                        hover:border-yellow-500/40 hover:shadow-xl hover:shadow-yellow-500/10
                        transition-all duration-400 cursor-pointer card-dynamic-border">

                        {{-- Animated border spans --}}
                        <span
                            class="absolute top-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-top"></span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-500 transition-all duration-200 border-bottom"></span>
                        <span
                            class="absolute top-0 left-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-left"></span>
                        <span
                            class="absolute top-0 right-0 w-0.5 h-full bg-yellow-500 transition-all duration-200 border-right"></span>

                        {{-- Image --}}
                        <div class="relative bg-gray-800/60 px-6 pt-8 pb-4 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-yellow-400/0 group-hover:bg-yellow-400/5 transition-all duration-500">
                            </div>
                            <div
                                class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-6 bg-yellow-400/0 group-hover:bg-yellow-400/10 blur-2xl transition-all duration-500 rounded-full">
                            </div>
                            <img src="{{ asset($vehicle->picture) }}" alt="{{ $vehicle->name }}"
                                class="w-full h-44 object-contain group-hover:scale-105 transition-transform duration-500 drop-shadow-2xl">
                        </div>

                        {{-- Card body --}}
                        <div class="px-6 py-5">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-white text-lg font-bold leading-tight">{{ $vehicle->name }}</h3>
                                <div class="text-right shrink-0">
                                    <span
                                        class="text-yellow-400 font-extrabold text-lg">{{ $vehicle->per_day_charges }}</span>
                                    <p class="text-gray-500 text-xs">/day</p>
                                </div>
                            </div>

                            {{-- Specs --}}
                            <div class="mt-4 flex items-center gap-3 text-xs text-gray-400 flex-wrap">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z" />
                                    </svg>
                                    {{ $vehicle->seats }}
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
                @endforeach

            </div>
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
                    <img id="carImage" class="w-full max-w-sm max-h-[300px] object-contain">
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
                    <form action="{{ route('lead.save') }}" class="space-y-4" method="POST">
                        @csrf
                        <input type="hidden" id="vehicle-id" name="id">
                        <input type="text" placeholder="Full Name" required name="name"
                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                        <input type="email" placeholder="Email Address" required name="email"
                            class="w-full bg-gray-800 text-white rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-500">

                        <input type="tel" placeholder="Mobile Number" required name="phone"
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
                               rounded-xl py-4 text-sm hover:shadow-xl hover:shadow-yellow-400/20
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
@endsection
