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

    <section class="bg-gray-100 pb-0 pt-0">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white border border-gray-700/50 rounded-2xl p-7 -mt-14 relative z-20 shadow-2xl shadow-black/60">
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
                        <input type="text" placeholder="ex: Aston martin, Ferrari" name="name" value="{{ old('name', request('name')) }}"
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
                        <input type="number" name="seats" placeholder="Passenger seats" value="{{ old('seats', request('seats')) }}"
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
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
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
                            <option value="">Select Vehicle Type</option>
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
                            <img src="{{ asset($vehicle->picture) }}" alt="{{ $vehicle->name }}"
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

                    <div class="relative rounded-2xl p-8 cursor-pointer overflow-hidden bg-white card-dynamic-border">
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

                    <div class="relative rounded-2xl p-8 cursor-pointer overflow-hidden bg-white card-dynamic-border">
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
                    <form action="{{ route('lead.save') }}" class="space-y-4" method="POST">
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
