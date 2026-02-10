@extends('website.app')
@section('content')
    <!-- Contact Hero Section -->
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
                Get in Touch with <span class="text-yellow-500">Us</span>
            </h1>

            <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn delay-200">
                Have questions or need assistance? Reach out to our team anytime, and we'll help you with your inquiries,
                bookings, or any other support you need. We are committed to providing fast and friendly service.
            </p>

            <div class="mt-10 flex justify-center gap-6 animate-fadeIn delay-400">
                <a href="mailto:info@yourcompany.com"
                    class="px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
         hover:scale-105 active:scale-95 transition-all duration-300
         shadow-lg hover:shadow-yellow-500/40">
                    Email Us
                </a>

                <a href="tel:+923001234567"
                    class="px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
         hover:scale-105 active:scale-95 transition-all duration-300
         shadow-lg hover:shadow-yellow-500/40">
                    Call Us
                </a>
            </div>

        </div>
    </section>

    <!-- Existing Contact Form Section -->
    <div class="bg-gradient-to-br from-black via-gray-900 to-gray-800 text-gray-200" id="bookingSection">

        <!-- HERO -->
        <section class="py-20 text-center border-t-2 border-yellow-500 overflow-hidden">
            <h1 class="text-3xl md:text-6xl font-bold inline-block animate-contact">
                • Contact <span class="text-yellow-500"> Us</span>
            </h1>

            <p class="max-w-2xl mx-auto text-gray-300 text-lg mt-6">
                Have a question or need help? We’re here to assist you anytime.
            </p>
        </section>

        <!-- CONTACT FORM -->
        <section class="pb-20">
            <div class="max-w-5xl mx-auto px-6">

                <form action="{{ route('query.store') }}" method="POST"
                    class="bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-700 rounded-2xl p-10 shadow-2xl grid grid-cols-1 md:grid-cols-2 gap-8">
                    @csrf
                    <!-- Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm">Full Name <span class="text-red-500">*</span> </label>
                        <input type="text" required name="name" id="name"
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        @error('name')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" required name="email" id="email"
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        @error('email')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block mb-2 text-sm">Phone Number <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" id="phone" required
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        @error('phone')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block mb-2 text-sm">Subject <span class="text-red-500">*</span></label>
                        <input type="text" name="subject" id="subject" required
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500">
                        @error('subject')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div class="md:col-span-2">
                        <label for="message" class="block mb-2 text-sm">Message <span class="text-red-500">*</span></label>
                        <textarea rows="5" required name="message" id="message"
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg focus:outline-none focus:border-yellow-500"></textarea>
                        @error('message')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror

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
