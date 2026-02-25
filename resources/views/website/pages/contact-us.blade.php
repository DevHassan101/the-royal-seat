@extends('website.app')
@section('content')

<section class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-black">

    <div class="absolute inset-0 bg-[url('./assets/image/automotive3.jpg')] bg-cover bg-center scale-110 animate-zoomSlow"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/90"></div>
    <span class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500 to-transparent animate-lineMove"></span>

    <div class="relative z-10 max-w-6xl px-6 text-center mt-14">
        <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-yellow-500 mb-4 animate-fadeIn">We're Here For You</span>

        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-wide animate-slideUp">
            Get in Touch <span class="text-yellow-500">With Us</span>
        </h1>

        <p class="mt-6 max-w-2xl mx-auto text-gray-300 text-lg animate-fadeIn">
            Have questions or need assistance? Reach out to our team anytime — we're committed to providing fast and friendly service.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4 animate-fadeIn">
            <a href="mailto:info@yourcompany.com"
                class="group inline-flex items-center gap-2 px-8 py-4 bg-yellow-500 text-black font-semibold rounded-full
                       hover:scale-105 active:scale-95 hover:shadow-lg hover:shadow-yellow-500/40 transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Email Us
            </a>
            <a href="tel:+923001234567"
                class="group inline-flex items-center gap-2 px-8 py-4 border-2 border-white/40 text-white font-semibold rounded-full
                       hover:border-yellow-500 hover:text-yellow-400 hover:scale-105
                       active:scale-95 transition-all duration-300 backdrop-blur-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                Call Us
            </a>
        </div>
    </div>

    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-yellow-500/30 to-transparent"></span>
</section>


<section class="bg-gray-950 py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Location --}}
            <div class="group bg-gray-900 border border-gray-700/50 hover:border-yellow-500/40 rounded-2xl p-6 text-center
                        hover:shadow-xl hover:shadow-yellow-500/10 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center mx-auto mb-4
                            group-hover:bg-yellow-400/20 transition-all duration-300">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-2">Location</h3>
                <p class="text-gray-400 text-sm">Karachi, Pakistan</p>
            </div>

            {{-- Phone --}}
            <div class="group bg-gray-900 border border-gray-700/50 hover:border-yellow-500/40 rounded-2xl p-6 text-center
                        hover:shadow-xl hover:shadow-yellow-500/10 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center mx-auto mb-4
                            group-hover:bg-yellow-400/20 transition-all duration-300">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-2">Phone</h3>
                <p class="text-gray-400 text-sm">+92 12345678</p>
            </div>

            {{-- Email --}}
            <div class="group bg-gray-900 border border-gray-700/50 hover:border-yellow-500/40 rounded-2xl p-6 text-center
                        hover:shadow-xl hover:shadow-yellow-500/10 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-yellow-400/10 border border-yellow-400/20 flex items-center justify-center mx-auto mb-4
                            group-hover:bg-yellow-400/20 transition-all duration-300">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-2">Email</h3>
                <p class="text-gray-400 text-sm">info@yourcar.com</p>
            </div>

        </div>
    </div>
</section>


<div class="bg-gray-950 border-t border-gray-800" id="bookingSection">

    <section class="py-16 text-center">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yellow-500">Send A Message</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mt-5 animate-contact">
            Contact <span class="text-yellow-500">Us</span>
        </h1>
        <p class="max-w-xl mx-auto text-gray-400 text-base mt-4">
            Have a question or need help? We're here to assist you anytime.
        </p>
    </section>

    <section class="pb-24">
        <div class="max-w-4xl mx-auto px-6">

            {{-- Success message --}}
            @if(session('success'))
            <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl px-5 py-4 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('query.store') }}" method="POST"
                class="bg-gray-900 border border-gray-700/50 rounded-2xl p-8 md:p-10 shadow-2xl shadow-black/40 grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                {{-- Full Name --}}
                <div>
                    <label for="name" class="block mb-2 text-sm text-gray-400 font-medium">
                        Full Name <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="name" id="name" required
                        value="{{ old('name') }}"
                        placeholder="Your full name"
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all
                               @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block mb-2 text-sm text-gray-400 font-medium">
                        Email Address <span class="text-red-400">*</span>
                    </label>
                    <input type="email" name="email" id="email" required
                        value="{{ old('email') }}"
                        placeholder="you@email.com"
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all
                               @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="block mb-2 text-sm text-gray-400 font-medium">
                        Phone Number <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="phone" id="phone" required
                        value="{{ old('phone') }}"
                        placeholder="+92 xxx xxxxxxx"
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all
                               @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Subject --}}
                <div>
                    <label for="subject" class="block mb-2 text-sm text-gray-400 font-medium">
                        Subject <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="subject" id="subject" required
                        value="{{ old('subject') }}"
                        placeholder="How can we help?"
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all
                               @error('subject') border-red-500 @enderror">
                    @error('subject')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="md:col-span-2">
                    <label for="message" class="block mb-2 text-sm text-gray-400 font-medium">
                        Message <span class="text-red-400">*</span>
                    </label>
                    <textarea name="message" id="message" rows="5" required
                        placeholder="Tell us about your rental needs or any questions..."
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-600 text-sm
                               focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500/20 transition-all resize-none
                               @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit --}}
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

@endsection