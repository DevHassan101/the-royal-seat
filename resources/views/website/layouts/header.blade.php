<nav id="navbar"
    class="fixed top-0 left-0 w-full z-50 bg-transparent backdrop-blur-md border-b border-yellow-500 transition-all duration-500">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center">
            <img src="./assets/image/logo1.png" alt="" class="h-12 w-16">
            <h1 class="text-xl sm:text-2xl font-bold text-white transition-colors duration-500 mt-2">
                THE ROYAL<span class="text-[#FFD700]"> SEAT</span>
            </h1>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex gap-10 items-center">

            <!-- item -->
            <a href="{{ url('/') }}"
                class="nav-link text-white hover:text-[#FFD700] transition-colors duration-300 font-['Inter'] group text-sm sm:text-base">
                <span class="relative">
                    Home
                    <span
                        class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-[#FFD700] group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>

            <a href="{{ url('about-us') }}"
                class="nav-link text-white hover:text-[#FFD700] transition-colors duration-300 group">
                <span class="relative">About Us
                    <span
                        class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-[#FFD700] group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>

            <a href="{{ url('vehicles') }}"
                class="nav-link text-white hover:text-[#FFD700] transition-colors duration-300 group">
                <span class="relative">Vehicles
                    <span
                        class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-[#FFD700] group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>

            <a href="{{ url('contact-us') }}"
                class="nav-link text-white hover:text-[#FFD700] transition-colors duration-300 group">
                <span class="relative">Contact
                    <span
                        class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-[#FFD700] group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
        </div>

        <!-- Button -->
        <a href="#bookingSection">
            <button
                class="hidden lg:flex bg-[#FFD700] px-8 py-3 rounded-full hover:shadow-md hover:shadow-white hover:scale-105 transition duration-300 text-black font-medium">
                Book Now
            </button>
        </a>

        <!-- Mobile Icon -->
        <div id="menuBtn" class="lg:hidden text-white text-3xl cursor-pointer transition-colors duration-500">
            ☰
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="lg:hidden overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out bg-black/80 backdrop-blur-md">
        <div class="px-6 py-6 space-y-4">
            <a href="{{ url('/') }}" class="block text-white">Home</a>
            <a href="{{ url('about-us') }}" class="block text-white">About Us</a>
            <a href="{{ url('vehicle') }}" class="block text-white">Cars</a>
            <a href="{{ url('contact-us') }}" class="block text-white">Contact</a>
            <a href="{{ url('contact-us') }}">
                <button class="w-full bg-[#FFD700] py-2 rounded-full text-black font-medium mt-6">Book Now</button>
            </a>
        </div>
    </div>

</nav>
