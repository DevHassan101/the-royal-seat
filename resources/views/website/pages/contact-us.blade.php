@extends('website.app')
@section('content')


    <!-- contact-section-starts -->
    <section class="min-h-screen py-20 px-4 sm:px-6 lg:px-8 mt-16">
      <!-- Header -->
      <div class="max-w-6xl mx-auto text-center mb-14 fade-up">
        <span
          class="text-gold font-display text-sm tracking-widest uppercase mb-3 block"
          >Get In Touch</span
        >
        <h1
          class="font-display text-4xl sm:text-6xl font-bold text-black leading-tight"
        >
          Contact <span class="text-[#e6b800]">Us</span>
        </h1>
        <div class="gold-line mx-auto mt-4 mb-4"></div>
        <p class="text-gray-400 text-base max-w-md mx-auto">
          We love to respond to your queries. Reach out and we'll get back to
          you swiftly.
        </p>
      </div>

      <!-- Main Card -->
      <div
        class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-0 rounded-2xl overflow-hidden border border-[#2a2a2a] shadow-2xl"
      >
        <!-- LEFT – Form (3/5) -->
        <div class="lg:col-span-3 bg-[#111111] p-8 sm:p-10 fade-up delay-1">
          <h2 class="font-display text-2xl font-700 text-white mb-1">
            Ask us anything here,
          </h2>
          <p class="text-gray-500 text-sm mb-7">
            Fill out the form and our team will get back to you within 24 hours.
          </p>

          <div class="space-y-4">
            <!-- Name + Email Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label
                  class="text-xs text-gray-500 mb-1.5 block uppercase tracking-wider"
                  >Full Name</label
                >
                <div class="relative">
                  <span
                    class="absolute left-3 top-1/2 -translate-y-1/2 text-[#e6b800]"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <circle cx="12" cy="8" r="4" />
                      <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                    </svg>
                  </span>
                  <input
                    type="text"
                    placeholder="John Doe"
                    class="input-field pl-9"
                  />
                </div>
              </div>
              <div>
                <label
                  class="text-xs text-gray-500 mb-1.5 block uppercase tracking-wider"
                  >Email</label
                >
                <div class="relative">
                  <span
                    class="absolute left-3 top-1/2 -translate-y-1/2 text-[#e6b800]"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <rect x="2" y="4" width="20" height="16" rx="2" />
                      <path d="m2 7 10 7 10-7" />
                    </svg>
                  </span>
                  <input
                    type="email"
                    placeholder="john@example.com"
                    class="input-field pl-9"
                  />
                </div>
              </div>
            </div>

            <!-- Phone -->
            <div>
              <label
                class="text-xs text-gray-500 mb-1.5 block uppercase tracking-wider"
                >Phone</label
              >
              <div class="relative">
                <span
                  class="absolute left-3 top-1/2 -translate-y-1/2 text-[#e6b800]"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <rect x="5" y="2" width="14" height="20" rx="2" />
                    <circle cx="12" cy="17" r="1" />
                  </svg>
                </span>
                <input
                  type="tel"
                  placeholder="+971 58 560 3086"
                  class="input-field pl-9"
                />
              </div>
            </div>

            <!-- Subject -->
            <div>
              <label
                class="text-xs text-gray-500 mb-1.5 block uppercase tracking-wider"
                >Subject</label
              >
              <div class="relative">
                <span
                  class="absolute left-3 top-1/2 -translate-y-1/2 text-[#e6b800]"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"
                    />
                    <polyline points="14 2 14 8 20 8" />
                  </svg>
                </span>
                <input
                  type="text"
                  placeholder="Booking inquiry, feedback..."
                  class="input-field pl-9"
                />
              </div>
            </div>

            <!-- Message -->
            <div>
              <label
                class="text-xs text-gray-500 mb-1.5 block uppercase tracking-wider"
                >Message</label
              >
              <textarea
                rows="5"
                placeholder="Write your message here..."
                class="input-field resize-none"
              ></textarea>
            </div>

            <!-- Submit -->
            <button
              class="gold-btn w-full py-3.5 text-sm tracking-widest uppercase mt-1 flex items-center justify-center gap-2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.5"
              >
                <line x1="22" y1="2" x2="11" y2="13" />
                <polygon points="22 2 15 22 11 13 2 9 22 2" />
              </svg>
              Send Message
            </button>
          </div>
        </div>

        <!-- RIGHT – Info (2/5) -->
        <div
          class="lg:col-span-2 bg-[#0e0e0e] p-8 sm:p-10 flex flex-col gap-6 border-t lg:border-t-0 lg:border-l border-[#2a2a2a] fade-up delay-2"
        >
          <div>
            <h2 class="font-display text-2xl font-700 text-white mb-1">
              Contact Info,
            </h2>
            <p class="text-gray-500 text-sm">
              Reach us through any channel below.
            </p>
          </div>

          <!-- Info Cards -->
          <div class="space-y-3">
            <div class="info-card">
              <div class="bg-[#e6b800]/10 rounded-lg p-2 mt-0.5 flex-shrink-0">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-[#e6b800]"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z" />
                  <circle cx="12" cy="10" r="3" />
                </svg>
              </div>
              <div>
                <p class="text-white font-display font-600 text-sm">Location</p>
                <p class="text-gray-400 text-xs mt-0.5 leading-relaxed">
                  Silicon Oasis Dubai,<br />United Arab Emirates
                </p>
              </div>
            </div>

            <div class="info-card">
              <div class="bg-[#e6b800]/10 rounded-lg p-2 mt-0.5 flex-shrink-0">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-[#e6b800]"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <rect x="5" y="2" width="14" height="20" rx="2" />
                  <circle cx="12" cy="17" r="1" />
                </svg>
              </div>
              <div>
                <p class="text-white font-display font-600 text-sm">Phone</p>
                <p class="text-gray-400 text-xs mt-0.5">+971 58 560 3086</p>
              </div>
            </div>

            <div class="info-card">
              <div class="bg-[#e6b800]/10 rounded-lg p-2 mt-0.5 flex-shrink-0">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-[#e6b800]"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <rect x="2" y="4" width="20" height="16" rx="2" />
                  <path d="m2 7 10 7 10-7" />
                </svg>
              </div>
              <div>
                <p class="text-white font-display font-600 text-sm">Email</p>
                <p class="text-gray-400 text-xs mt-0.5">info@rideease.com</p>
              </div>
            </div>

            <div class="info-card">
              <div class="bg-[#e6b800]/10 rounded-lg p-2 mt-0.5 flex-shrink-0">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-[#e6b800]"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <circle cx="12" cy="12" r="10" />
                  <polyline points="12 6 12 12 16 14" />
                </svg>
              </div>
              <div>
                <p class="text-white font-display font-600 text-sm">
                  Working Hours
                </p>
                <p class="text-gray-400 text-xs mt-0.5">
                  Mon–Sat: 8:00 AM – 10:00 PM<br />Sun: 10:00 AM – 6:00 PM
                </p>
              </div>
            </div>
          </div>

          <!-- Social -->
          <div>
            <p class="text-xs text-gray-500 uppercase tracking-widest mb-3">
              Follow Us
            </p>
            <div class="flex gap-2">
              <!-- Facebook -->
              <a href="#" class="social-btn" title="Facebook">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                  />
                </svg>
              </a>
              <!-- X (Twitter) -->
              <a href="#" class="social-btn" title="X">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                  />
                </svg>
              </a>
              <!-- Instagram -->
              <a href="#" class="social-btn" title="Instagram">
                <svg
                  class="w-4 h-4"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <rect x="2" y="2" width="20" height="20" rx="5" />
                  <circle cx="12" cy="12" r="4" />
                  <circle
                    cx="17.5"
                    cy="6.5"
                    r="0.5"
                    fill="currentColor"
                    stroke="none"
                  />
                </svg>
              </a>
              <!-- YouTube -->
              <a href="#" class="social-btn" title="YouTube">
                <svg
                  class="w-4 h-4"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"
                  />
                  <polygon
                    points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"
                    fill="currentColor"
                    stroke="none"
                  />
                </svg>
              </a>
            </div>
          </div>

          <!-- Quick Badge -->
          <div
            class="mt-auto bg-[#e6b800]/10 border-2 border-amber-400 rounded-xl p-4 flex items-center gap-3"
          >
            <div class="text-[#e6b800]">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <div>
              <p class="text-white text-sm font-600 font-display">
                Quick Response
              </p>
              <p class="text-gray-400 text-xs">
                We reply within 2–4 hours on average
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- /main card -->

      <!-- ─── MAP SECTION ───────────────────────────────── -->
      <div class="max-w-6xl mx-auto mt-6 fade-up delay-3">
        <div class="map-wrapper relative">
          <!-- Map Label Overlay -->
          <!-- <div
            class="absolute top-4 left-4 z-10 backdrop-blur-sm border border-[#2a2a2a] rounded-xl px-4 py-3 flex items-center gap-3 shadow-xl"
          >
            <div class="bg-[#e6b800]/15 rounded-lg p-1.5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-[#e6b800]"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
            </div>
            <div>
              <p class="text-white font-display font-600 text-sm">Our Office</p>
              <p class="text-gray-400 text-xs">Silicon Oasis, Dubai, UAE</p>
            </div>
          </div> -->
          <!-- Embedded Google Map -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3611.2435!2d55.3781!3d25.1179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5f4e1b9b9b9b%3A0x1b9b9b9b9b9b9b9b!2sDubai+Silicon+Oasis%2C+Dubai%2C+UAE!5e0!3m2!1sen!2s!4v1620000000000!5m2!1sen!2s"
            width="100%"
            height="340"
            style="
              border: 0;
              filter: hue-rotate(180deg) brightness(0.85)
                contrast(1.1);
            "
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="RideEase Office Location"
          >
          </iframe>
        </div>
      </div>

      <!-- ─── BOTTOM FAQ STRIP ──────────────────────────── -->
      <div
        class="max-w-6xl mx-auto mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4 fade-up delay-4"
      >
        <div
          class="bg-[#111] border border-[#222] rounded-xl p-5 flex gap-3 items-start hover:border-[#e6b800]/30 transition-colors"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 text-[#e6b800] mt-0.5 flex-shrink-0"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
            />
          </svg>
          <div>
            <p class="text-white font-display font-600 text-sm">Live Chat</p>
            <p class="text-gray-500 text-xs mt-1">
              Chat with our agents in real-time for instant support.
            </p>
          </div>
        </div>
        <div
          class="bg-[#111] border border-[#222] rounded-xl p-5 flex gap-3 items-start hover:border-[#e6b800]/30 transition-colors"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 text-[#e6b800] mt-0.5 flex-shrink-0"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <circle cx="12" cy="12" r="10" />
            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
            <line x1="12" y1="17" x2="12.01" y2="17" />
          </svg>
          <div>
            <p class="text-white font-display font-600 text-sm">FAQ Center</p>
            <p class="text-gray-500 text-xs mt-1">
              Browse common questions about rides, bookings, and billing.
            </p>
          </div>
        </div>
        <div
          class="bg-[#111] border border-[#222] rounded-xl p-5 flex gap-3 items-start hover:border-[#e6b800]/30 transition-colors"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 text-[#e6b800] mt-0.5 flex-shrink-0"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 10.6a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"
            />
          </svg>
          <div>
            <p class="text-white font-display font-600 text-sm">Call Support</p>
            <p class="text-gray-500 text-xs mt-1">
              Speak directly with our team for urgent queries or complaints.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- contact-section-ends -->

@endsection