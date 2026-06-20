@extends('website.app')
@section('content')

    <section class="about-section" style="margin-top: 80px !important">
      <div class="about-bg"></div>
      <div class="about-overlay"></div>

      <!-- corner-svg-decorations -->
      <svg
        class="corner-tl"
        width="56"
        height="56"
        fill="none"
        viewBox="0 0 56 56"
      >
        <path
          d="M2 54 L2 2 L54 2"
          stroke="#e6b800"
          stroke-width="2.5"
          stroke-linecap="round"
        />
      </svg>
      <svg
        class="corner-br"
        width="56"
        height="56"
        fill="none"
        viewBox="0 0 56 56"
      >
        <path
          d="M2 54 L2 2 L54 2"
          stroke="#e6b800"
          stroke-width="2.5"
          stroke-linecap="round"
        />
      </svg>

      <!-- Content -->
      <div class="about-content">
        <!-- Label -->
        <p class="about-label">Who We Are</p>

        <!-- Heading -->
        <h2 class="about-heading">About Our <span>Company</span></h2>

        <!-- Description -->
        <p class="about-desc">
          Premium car rental experience built on trust, comfort, and style. We
          deliver modern vehicles and professional chauffeur service for every
          journey from airport transfers to city tours across the UAE.
        </p>

        <!-- Buttons -->
        <div class="btn-group mb-10">
          <a href="#" class="btn-primary">
            Book a Ride
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1.6em"
              height="1.6em"
              viewBox="0 0 24 24"
            >
              <path d="M0 0h24v24H0z" fill="none" />
              <path
                fill="currentColor"
                fill-rule="evenodd"
                d="M18.5 12.214a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h12.5a1 1 0 0 0 1-1"
                clip-rule="evenodd"
              />
              <path
                fill="currentColor"
                fill-rule="evenodd"
                d="M20 12.214a1 1 0 0 0-.293-.707l-4.5-4.5a1 1 0 1 0-1.414 1.414l3.793 3.793l-3.793 3.793a1 1 0 0 0 1.414 1.415l4.5-4.5a1 1 0 0 0 .293-.708"
                clip-rule="evenodd"
              />
            </svg>
          </a>
          <a href="#" class="btn-secondary">
            Contact Us
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1.3em"
              height="1.3em"
              viewBox="0 0 24 24"
            >
              <path d="M0 0h24v24H0z" fill="none" />
              <path
                fill="currentColor"
                d="m19.23 15.26l-2.54-.29a1.99 1.99 0 0 0-1.64.57l-1.84 1.84a15.05 15.05 0 0 1-6.59-6.59l1.85-1.85c.43-.43.64-1.03.57-1.64l-.29-2.52a2 2 0 0 0-1.99-1.77H5.03c-1.13 0-2.07.94-2 2.07c.53 8.54 7.36 15.36 15.89 15.89c1.13.07 2.07-.87 2.07-2v-1.73c.01-1.01-.75-1.86-1.76-1.98"
              />
            </svg>
          </a>
        </div>

        <!-- Floating stat chips -->
        <div class="flex flex-wrap items-center justify-center gap-3">
          <div class="stat-chip">
            <span class="stat-chip-dot"></span>
            50,000+ Happy Customers
          </div>
          <div class="stat-chip">
            <span class="stat-chip-dot"></span>
            420k+ Rides Completed
          </div>
          <div class="stat-chip">
            <span class="stat-chip-dot"></span>
            4.9 ★ Avg Rating
          </div>
        </div>
      </div>
    </section>

    <!-- about-section-starts -->
    <section class="bg-white" style="padding: 80px 24px 90px">
      <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center gap-14">
          <!-- LEFT: Floating cards + image collage -->
          <div
            class="relative flex-shrink-0"
            style="width: 100%; max-width: 480px"
          >
            <!-- Main image -->
            <div
              style="
                border-radius: 24px;
                overflow: hidden;
                box-shadow: 0 24px 60px rgba(0, 0, 0, 0.14);
              "
            >
              <img
                src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80"
                alt="Luxury chauffeur service"
                style="
                  width: 100%;
                  height: 320px;
                  object-fit: cover;
                  display: block;
                "
                onerror="
                  this.src =
                    'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=800&q=80'
                "
              />
            </div>

            <!-- Stat card top-left -->
            <div
              class="float-badge"
              style="top: -24px; left: -20px; min-width: 180px"
            >
              <div
                style="
                  width: 44px;
                  height: 44px;
                  border-radius: 12px;
                  background: var(--brand-bg);
                  display: flex;
                  align-items: center;
                  justify-content: center;
                "
              >
                <svg
                  width="22"
                  height="22"
                  fill="none"
                  stroke="var(--brand)"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path
                    d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"
                  />
                </svg>
              </div>
              <div>
                <p style="font-size: 11px; color: #999; margin-bottom: 1px">
                  Over
                </p>
                <p class="counter-num" style="font-size: 30px; color: #111">
                  50k<span style="color: var(--brand)">+</span>
                </p>
                <p style="font-size: 11px; color: #777">Happy Customers</p>
              </div>
            </div>

            <!-- Stat card bottom-right -->
            <div
              class="float-badge"
              style="bottom: -22px; right: -16px; min-width: 200px"
            >
              <div
                style="
                  background: var(--brand);
                  border-radius: 12px;
                  width: 44px;
                  height: 44px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  flex-shrink: 0;
                "
              >
                <svg
                  width="22"
                  height="22"
                  fill="none"
                  stroke="#fff"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"
                  />
                </svg>
              </div>
              <div>
                <p
                  style="
                    font-size: 26px;
                    font-weight: 800;
                    color: #111;
                    line-height: 1;
                  "
                >
                  4.9 <span style="font-size: 14px; color: #f59e0b">★★★★★</span>
                </p>
                <p style="font-size: 11px; color: #777">Avg. Customer Rating</p>
                <p style="font-size: 10px; color: #aaa">
                  Based on 12,400+ reviews
                </p>
              </div>
            </div>

            <!-- Decorative dot grid -->
            <div
              style="
                position: absolute;
                bottom: -40px;
                left: -30px;
                width: 90px;
                height: 90px;
                opacity: 0.4;
                pointer-events: none;
              "
            >
              <svg viewBox="0 0 90 90" fill="none">
                <pattern
                  id="dot"
                  x="0"
                  y="0"
                  width="12"
                  height="12"
                  patternUnits="userSpaceOnUse"
                >
                  <circle cx="2" cy="2" r="2" fill="var(--brand)" />
                </pattern>
                <rect width="90" height="90" fill="url(#dot)" />
              </svg>
            </div>
          </div>
          <!-- RIGHT: Text -->
          <div class="flex-1">
            <p
              class="inline-flex items-center gap-2 mb-4 font-semibold uppercase tracking-[.22em]"
              style="font-size: 12px; color: #e6b800"
            >
              <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                <polygon
                  points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
                />
              </svg>
              About Us
              <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                <polygon
                  points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
                />
              </svg>
            </p>
            <h1
              class="font-bold leading-none text-black !text-[45px] mb-4"
              style="letter-spacing: -0.01em"
            >
              Driving Premium,<br />
              Comfort, and <span class="text-[#e6b800]">Reliability</span>
            </h1>
            <p
              class="text-gray-700 font-medium text-sm lg:text-[15px] leading-7 mb-4 max-w-lg"
            >
              At RoyalSeatLuxury, we're more than a ride service we're your travel
              partner. From city rides and tours to luxury car rentals, we make
              every journey smooth, stylish, and hassle free.
            </p>

            <!-- Contact chips -->
            <div class="flex flex-wrap gap-3 mb-8">
              <a
                href="#"
                class="flex items-center gap-2 px-4 py-2.5 rounded-full text-sm font-semibold"
                style="
                  background: var(--brand-bg);
                  color: var(--brand);
                  border: 1.5px solid var(--brand-border);
                  text-decoration: none;
                  transition: background 0.2s;
                "
                onmouseover="this.style.background = 'rgba(212,160,23,0.2)'"
                onmouseout="this.style.background = 'var(--brand-bg)'"
              >
                <svg
                  width="14"
                  height="14"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <rect x="3" y="4" width="18" height="18" rx="2" />
                  <path d="M16 2v4M8 2v4M3 10h18" />
                </svg>
                Schedule a Call
              </a>
              <a
                href="mailto:info@RoyalSeatLuxury.com"
                class="flex items-center gap-2 px-4 py-2.5 rounded-full text-sm font-semibold"
                style="
                  background: #f3f4f6;
                  color: #444;
                  border: 1.5px solid #e5e7eb;
                  text-decoration: none;
                "
              >
                <svg
                  width="14"
                  height="14"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                  />
                  <polyline points="22,6 12,13 2,6" />
                </svg>
                info@RoyalSeatLuxury.com
              </a>
            </div>

            <div class="flex flex-wrap gap-3 items-center">
              <a href="#" class="btn-brand">Book a Ride Now</a>
              <div style="display: flex; align-items: center; gap: 6px">
                <p style="font-size: 13px; color: #999">Have any questions?</p>
                <a
                  href="#"
                  class="btn-outline"
                  style="padding: 9px 18px; font-size: 13px"
                  >Contact Us</a
                >
              </div>
            </div>

            <!-- Mini stats row -->
            <div
              class="flex flex-wrap gap-6 mt-10 pt-8"
              style="border-top: 1px solid #e5e7eb"
            >
              <div>
                <p
                  class="counter-num"
                  style="font-size: 28px; color: var(--brand)"
                >
                  12+
                </p>
                <p style="font-size: 12px; color: #888; margin-top: 2px">
                  Years of Service
                </p>
              </div>
              <div style="width: 1px; background: #e5e7eb"></div>
              <div>
                <p
                  class="counter-num"
                  style="font-size: 28px; color: var(--brand)"
                >
                  420k+
                </p>
                <p style="font-size: 12px; color: #888; margin-top: 2px">
                  Rides Completed
                </p>
              </div>
              <div style="width: 1px; background: #e5e7eb"></div>
              <div>
                <p
                  class="counter-num"
                  style="font-size: 28px; color: var(--brand)"
                >
                  35+
                </p>
                <p style="font-size: 12px; color: #888; margin-top: 2px">
                  Premium Vehicles
                </p>
              </div>
              <div style="width: 1px; background: #e5e7eb"></div>
              <div>
                <p
                  class="counter-num"
                  style="font-size: 28px; color: var(--brand)"
                >
                  24/7
                </p>
                <p style="font-size: 12px; color: #888; margin-top: 2px">
                  Support Available
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about-section-ends -->

    <!-- who-we-are-section-starts -->
    <section class="who-section bg-[#fffbea]" style="padding: 80px 24px">
      <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center gap-14">
          <!-- Left text -->
          <div class="flex-1">
            <p
              class="inline-flex items-center gap-2 mb-4 font-semibold uppercase tracking-[.22em]"
              style="font-size: 12px; color: #e6b800"
              ;
            >
              <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                <polygon
                  points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
                />
              </svg>
              Who We Are
              <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                <polygon
                  points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
                />
              </svg>
            </p>
            <h2
              style="
                font-size: clamp(34px, 5vw, 50px);
                font-weight: 800;
                color: #000000;
                line-height: 1.1;
                margin-bottom: 22px;
              "
            >
              About <span style="color: var(--brand)">RoyalSeatLuxury</span>
            </h2>

            <div style="display: flex; flex-direction: column; gap: 20px">
              <div class="timeline-item">
                <p
                  style="
                    font-size: 15px;
                    color: rgba(0, 0, 0, 0.75);
                    line-height: 1.75;
                  "
                >
                  RoyalSeatLuxury is a premium transportation platform designed to
                  elevate your travel experience. Whether it's a family
                  adventure, a business meeting, or an airport transfer, our
                  goal is to deliver unmatched quality, comfort, and convenience
                  across the UAE.
                </p>
              </div>
              <div class="timeline-item">
                <p
                  style="
                    font-size: 15px;
                    color: rgba(0, 0, 0, 0.75);
                    line-height: 1.75;
                  "
                >
                  With a range of luxury cars, experienced chauffeurs, and a
                  commitment to reliability, we make every ride memorable — from
                  the moment you book to the second you arrive at your
                  destination.
                </p>
              </div>
              <div class="timeline-item">
                <p
                  style="
                    font-size: 15px;
                    color: rgba(0, 0, 0, 0.75);
                    line-height: 1.75;
                  "
                >
                  Rooted in innovation and customer satisfaction, we've created
                  a seamless booking platform to cater to your diverse travel
                  needs. Let RoyalSeatLuxury redefine how you move — one ride at a
                  time.
                </p>
              </div>
            </div>

            <div class="flex flex-wrap gap-4 mt-8">
              <div
                style="
                  display: flex;
                  align-items: center;
                  gap: 10px;
                  background: rgba(212, 158, 23, 0.15);
                  border: 1px solid rgba(212, 158, 23, 0.25);
                  border-radius: 12px;
                  padding: 12px 18px;
                "
              >
                <svg
                  width="18"
                  height="18"
                  fill="none"
                  stroke="var(--brand)"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
                <span style="color: #d4a017; font-size: 13px; font-weight: 600"
                  >Licensed &amp; Insured</span
                >
              </div>
              <div
                style="
                  display: flex;
                  align-items: center;
                  gap: 10px;
                  background: rgba(212, 158, 23, 0.15);
                  border: 1px solid rgba(212, 158, 23, 0.25);
                  border-radius: 12px;
                  padding: 12px 18px;
                "
              >
                <svg
                  width="18"
                  height="18"
                  fill="none"
                  stroke="var(--brand)"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <circle cx="12" cy="12" r="10" />
                  <path d="M12 8v4l3 3" />
                </svg>
                <span style="color: #d4a017; font-size: 13px; font-weight: 600"
                  >Real-Time Tracking</span
                >
              </div>
              <div
                style="
                  display: flex;
                  align-items: center;
                  gap: 10px;
                  background: rgba(212, 158, 23, 0.15);
                  border: 1px solid rgba(212, 158, 23, 0.25);
                  border-radius: 12px;
                  padding: 12px 18px;
                "
              >
                <svg
                  width="18"
                  height="18"
                  fill="none"
                  stroke="var(--brand)"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                </svg>
                <span style="color: #d4a017; font-size: 13px; font-weight: 600"
                  >Certified Chauffeurs</span
                >
              </div>
            </div>
          </div>

          <!-- Right image -->
          <div
            class="relative flex-shrink-0"
            style="width: 100%; max-width: 460px"
          >
            <div
              style="
                border-radius: 24px;
                overflow: hidden;
                box-shadow: 0 24px 60px #d49e1744;
              "
            >
              <img
                src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80"
                alt="RoyalSeatLuxury Team"
                style="
                  width: 100%;
                  height: 380px;
                  object-fit: cover;
                  display: block;
                "
                onerror="
                  this.src =
                    'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80'
                "
              />
            </div>
            <!-- Gold corner accent -->
            <div
              style="
                position: absolute;
                bottom: -12px;
                right: -12px;
                width: 90px;
                height: 90px;
                border: 3px solid var(--brand);
                border-radius: 18px;
                opacity: 0.4;
                pointer-events: none;
              "
            ></div>
            <div
              style="
                position: absolute;
                top: -12px;
                left: -12px;
                width: 60px;
                height: 60px;
                border: 3px solid var(--brand);
                border-radius: 14px;
                opacity: 0.25;
                pointer-events: none;
              "
            ></div>

            <!-- Experience badge -->
            <div
              style="
                position: absolute;
                bottom: 24px;
                left: -28px;
                background: #fff;
                border-radius: 14px;
                padding: 14px 18px;
                box-shadow: 0 8px 28px rgba(0, 0, 0, 0.2);
                display: flex;
                align-items: center;
                gap: 12px;
              "
            >
              <div
                style="
                  width: 44px;
                  height: 44px;
                  border-radius: 12px;
                  background: var(--brand);
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  flex-shrink: 0;
                "
              >
                <svg
                  width="20"
                  height="20"
                  fill="none"
                  stroke="#fff"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"
                  />
                </svg>
              </div>
              <div>
                <p
                  style="
                    font-size: 22px;
                    font-weight: 800;
                    color: #111;
                    line-height: 1;
                  "
                >
                  12+ Years
                </p>
                <p style="font-size: 11px; color: #777">of Premium Service</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- who-we-are-section-ends -->

    <!-- our-value-section-starts -->
    <section style="padding: 80px 24px; background: var(--page-bg)">
      <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div style="text-align: center; max-width: 640px; margin: 0 auto 56px">
          <p
            class="inline-flex items-center gap-2 mb-4 font-semibold uppercase tracking-[.22em]"
            style="font-size: 12px; color: #e6b800"
          >
            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
              <polygon
                points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
              />
            </svg>
            Our Values
            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
              <polygon
                points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
              />
            </svg>
          </p>
          <h2 class="sec-title mb-4">
            At RoyalSeatLuxury, <span>Our Values</span> Define Serve You
          </h2>
          <p style="color: #777; font-size: 15px; line-height: 1.7">
            Every ride is a reflection of our promise to provide comfort, trust,
            and excellence — ensuring you travel with confidence and style every
            time.
          </p>
        </div>

        <!-- Values grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
          <div class="value-card">
            <div class="value-icon">
              <svg
                width="26"
                height="26"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
            </div>
            <h3
              style="
                font-size: 22px;
                font-weight: 700;
                color: #111;
                margin-bottom: 10px;
              "
            >
              Customer-Centric Service
            </h3>
            <p style="font-size: 14px; color: #666; line-height: 1.7">
              We prioritize your needs, ensuring every ride meets your
              expectations for comfort and style. Your satisfaction drives every
              decision we make.
            </p>
            <div
              style="
                width: 36px;
                height: 3px;
                background: var(--brand);
                border-radius: 2px;
                margin: 18px auto 0;
                opacity: 0.6;
              "
            ></div>
          </div>

          <div
            class="value-card"
            style="
              border-color: var(--brand-border);
              box-shadow: 0 8px 30px rgba(212, 160, 23, 0.12);
            "
          >
            <div
              class="value-icon"
              style="background: var(--brand); color: #fff"
            >
              <svg
                width="26"
                height="26"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
            </div>
            <h3
              style="
                font-size: 22px;
                font-weight: 700;
                color: #111;
                margin-bottom: 10px;
              "
            >
              Reliability and Trust
            </h3>
            <p style="font-size: 14px; color: #666; line-height: 1.7">
              Our rides are punctual, dependable, and tailored to fit your
              schedule — because your time matters and we never take it for
              granted.
            </p>
            <div
              style="
                width: 36px;
                height: 3px;
                background: var(--brand);
                border-radius: 2px;
                margin: 18px auto 0;
              "
            ></div>
          </div>

          <div class="value-card">
            <div class="value-icon">
              <svg
                width="26"
                height="26"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
              </svg>
            </div>
            <h3
              style="
                font-size: 22px;
                font-weight: 700;
                color: #111;
                margin-bottom: 10px;
              "
            >
              Innovation and Excellence
            </h3>
            <p style="font-size: 14px; color: #666; line-height: 1.7">
              We blend technology with luxury to create a seamless experience —
              from real-time booking to live tracking and instant confirmation.
            </p>
            <div
              style="
                width: 36px;
                height: 3px;
                background: var(--brand);
                border-radius: 2px;
                margin: 18px auto 0;
                opacity: 0.6;
              "
            ></div>
          </div>
        </div>

        <!-- Extra values row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div
            style="
              background: #fff;
              border-radius: 14px;
              padding: 20px;
              border: 1.5px solid #efefef;
              text-align: center;
              transition: box-shadow 0.2s;
            "
            onmouseover="
              this.style.boxShadow = '0 6px 20px rgba(212,160,23,0.12)'
            "
            onmouseout="this.style.boxShadow = 'none'"
          >
            <svg
              style="color: var(--brand); margin: 0 auto 10px; display: block"
              width="24"
              height="24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <circle cx="12" cy="12" r="10" />
              <path d="M12 8v4l3 3" />
            </svg>
            <p
              style="
                font-size: 13px;
                font-weight: 700;
                color: #111;
                margin-bottom: 4px;
              "
            >
              On-Time Every Time
            </p>
            <p style="font-size: 12px; color: #888">
              Punctuality is our promise
            </p>
          </div>
          <div
            style="
              background: #fff;
              border-radius: 14px;
              padding: 20px;
              border: 1.5px solid #efefef;
              text-align: center;
              transition: box-shadow 0.2s;
            "
            onmouseover="
              this.style.boxShadow = '0 6px 20px rgba(212,160,23,0.12)'
            "
            onmouseout="this.style.boxShadow = 'none'"
          >
            <svg
              style="color: var(--brand); margin: 0 auto 10px; display: block"
              width="24"
              height="24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <rect x="3" y="11" width="18" height="11" rx="2" />
              <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </svg>
            <p
              style="
                font-size: 13px;
                font-weight: 700;
                color: #111;
                margin-bottom: 4px;
              "
            >
              Secure &amp; Safe
            </p>
            <p style="font-size: 12px; color: #888">SSL-encrypted bookings</p>
          </div>
          <div
            style="
              background: #fff;
              border-radius: 14px;
              padding: 20px;
              border: 1.5px solid #efefef;
              text-align: center;
              transition: box-shadow 0.2s;
            "
            onmouseover="
              this.style.boxShadow = '0 6px 20px rgba(212,160,23,0.12)'
            "
            onmouseout="this.style.boxShadow = 'none'"
          >
            <svg
              style="color: var(--brand); margin: 0 auto 10px; display: block"
              width="24"
              height="24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"
              />
            </svg>
            <p
              style="
                font-size: 13px;
                font-weight: 700;
                color: #111;
                margin-bottom: 4px;
              "
            >
              5-Star Fleet
            </p>
            <p style="font-size: 12px; color: #888">Premium luxury vehicles</p>
          </div>
          <div
            style="
              background: #fff;
              border-radius: 14px;
              padding: 20px;
              border: 1.5px solid #efefef;
              text-align: center;
              transition: box-shadow 0.2s;
            "
            onmouseover="
              this.style.boxShadow = '0 6px 20px rgba(212,160,23,0.12)'
            "
            onmouseout="this.style.boxShadow = 'none'"
          >
            <svg
              style="color: var(--brand); margin: 0 auto 10px; display: block"
              width="24"
              height="24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07"
              />
              <path
                d="M1.61 3.42A2 2 0 0 1 3.58 1.25h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.71 2.81a2 2 0 0 1-.45 2.11L7.91 8.1"
              />
            </svg>
            <p
              style="
                font-size: 13px;
                font-weight: 700;
                color: #111;
                margin-bottom: 4px;
              "
            >
              24/7 Support
            </p>
            <p style="font-size: 12px; color: #888">Always here for you</p>
          </div>
        </div>
      </div>
    </section>
    <!-- our-value-section-ends -->

@endsection