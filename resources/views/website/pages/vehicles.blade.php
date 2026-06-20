@extends('website.app')
@section('content')

    <!-- vehicles-card-section-starts -->
    <section class="vehicle-section mt-16 py-20 px-5">
      <div class="w-full mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-14">
          <p
            class="inline-flex items-center gap-2 mb-3 font-semibold uppercase tracking-[.22em]"
            style="font-size: 12px; color: #e6b800"
          >
            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
              <polygon
                points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
              />
            </svg>
            Premium Fleet
            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
              <polygon
                points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5"
              />
            </svg>
          </p>
          <h2 class="section-title lg:text-5xl font-bold text-black">
            Featured <span class="text-[#e6b800]">Cars</span>
          </h2>
          <p
            class="text-gray-700 font-medium mt-3 max-w-lg mx-auto text-sm leading-relaxed"
          >
            Explore our handpicked selection of premium vehicles available for
            rent — style, comfort, and performance guaranteed.
          </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Card 1: Mercedes Viano -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">PHC</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=700&q=80"
                alt="Mercedes Viano"
              />
            </div>
            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★★</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    MERCEDES<br />VIANO
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                  >
                    AED 1,200<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    >
                  </span>
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  8 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="12" r="3" />
                    <path
                      d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"
                    />
                  </svg>
                  Auto
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"
                    />
                    <path
                      d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"
                    />
                    <path
                      d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"
                    />
                    <path
                      d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"
                    />
                    <path
                      d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"
                    />
                    <path d="M15.5 9H20" />
                    <path d="M14 9.5V14" />
                    <path
                      d="M10 9.5c0-.83-.67-1.5-1.5-1.5h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"
                    />
                    <path d="M8.5 15H4" />
                    <path d="M10 14.5V10" />
                  </svg>
                  Luxury
                </div>
              </div>
              <button class="rent-btn">
                <svg
                  width="16"
                  height="16"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Rent Now
              </button>
            </div>
          </div>
          <!-- Card 2: GMC Yukon XL — Featured -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">PHC</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=700&q=80"
                alt="GMC Yukon XL"
              />
            </div>

            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★★</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    GMC<br />YUKON XL
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                  >
                    AED 1,500<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    ></span
                  >
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  8 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <rect x="3" y="11" width="18" height="11" rx="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                  </svg>
                  Manual
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                  </svg>
                  420 HP
                </div>
              </div>
              <button class="rent-btn">
                <svg
                  width="16"
                  height="16"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Rent Now
              </button>
            </div>
          </div>
          <!-- Card 3: Mercedes S-Class -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">VIP</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=700&q=80"
                alt="Mercedes S-Class"
              />
            </div>
            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★★</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    MERCEDES<br />S-CLASS
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                    >AED 1,800<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    ></span
                  >
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  5 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="12" r="3" />
                    <path
                      d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"
                    />
                  </svg>
                  Auto
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                  </svg>
                  503 HP
                </div>
              </div>
              <button class="rent-btn">
                <svg
                  width="16"
                  height="16"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Rent Now
              </button>
            </div>
          </div>
          <!-- Card 4: Range Rover -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">UAE NAT</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=700&q=80"
                alt="Range Rover"
              />
            </div>
            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★☆</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    RANGE<br />ROVER
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                    >AED 900<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    >
                  </span>
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  7 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="12" r="3" />
                    <path
                      d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"
                    />
                  </svg>
                  Auto
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                  </svg>
                  4x4
                </div>
              </div>
              <button class="rent-btn">
                Rent Now
                <svg
                  width="15"
                  height="15"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
          <!-- Card 1: Mercedes Viano -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">PHC</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=700&q=80"
                alt="Mercedes Viano"
              />
            </div>
            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★★</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    MERCEDES<br />VIANO
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                  >
                    AED 1,200<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    >
                  </span>
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  8 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="12" r="3" />
                    <path
                      d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"
                    />
                  </svg>
                  Auto
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"
                    />
                    <path
                      d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"
                    />
                    <path
                      d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"
                    />
                    <path
                      d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"
                    />
                    <path
                      d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"
                    />
                    <path d="M15.5 9H20" />
                    <path d="M14 9.5V14" />
                    <path
                      d="M10 9.5c0-.83-.67-1.5-1.5-1.5h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"
                    />
                    <path d="M8.5 15H4" />
                    <path d="M10 14.5V10" />
                  </svg>
                  Luxury
                </div>
              </div>
              <button class="rent-btn">
                <svg
                  width="16"
                  height="16"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Rent Now
              </button>
            </div>
          </div>
          <!-- Card 2: GMC Yukon XL — Featured -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">PHC</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=700&q=80"
                alt="GMC Yukon XL"
              />
            </div>

            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★★</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    GMC<br />YUKON XL
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                  >
                    AED 1,500<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    ></span
                  >
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  8 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <rect x="3" y="11" width="18" height="11" rx="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                  </svg>
                  Manual
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                  </svg>
                  420 HP
                </div>
              </div>
              <button class="rent-btn">
                <svg
                  width="16"
                  height="16"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Rent Now
              </button>
            </div>
          </div>
          <!-- Card 3: Mercedes S-Class -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">VIP</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=700&q=80"
                alt="Mercedes S-Class"
              />
            </div>
            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★★</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    MERCEDES<br />S-CLASS
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                    >AED 1,800<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    ></span
                  >
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  5 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="12" r="3" />
                    <path
                      d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"
                    />
                  </svg>
                  Auto
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                  </svg>
                  503 HP
                </div>
              </div>
              <button class="rent-btn">
                <svg
                  width="16"
                  height="16"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Rent Now
              </button>
            </div>
          </div>
          <!-- Card 4: Range Rover -->
          <div class="car-card">
            <div class="card-img-zone noise-bg">
              <div class="avail-dot"></div>
              <span class="category-badge">UAE NAT</span>
              <img
                class="car-img"
                src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=700&q=80"
                alt="Range Rover"
              />
            </div>
            <div class="card-body">
              <div class="flex items-start justify-between">
                <div>
                  <p class="stars">★★★★☆</p>
                  <h3
                    class="font-heading text-black text-xl font-bold tracking-wide leading-tight mt-1"
                  >
                    RANGE<br />ROVER
                  </h3>
                  <div class="name-divider"></div>
                </div>
                <div class="text-right pt-1">
                  <span
                    class="price-tag text-[26px] text-[#e6b800] leading-tighter font-bold"
                    >AED 900<span
                      class="price-unit text-[11px] text-[#00000066] font-semibold ml-[2px] leading-tight"
                      >/day</span
                    >
                  </span>
                </div>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  </svg>
                  7 Seats
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="12" r="3" />
                    <path
                      d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"
                    />
                  </svg>
                  Auto
                </div>
                <div class="spec-pill">
                  <svg
                    class="spec-icon w-3.5 h-3.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                  </svg>
                  4x4
                </div>
              </div>
              <button class="rent-btn">
                Rent Now
                <svg
                  width="15"
                  height="15"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.5"
                  viewBox="0 0 24 24"
                >
                  <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <!-- /grid -->

        <!-- Bottom CTA -->
        <div class="flex justify-center mt-12">
          <button class="cta-btn">
            <span>View All Vehicles</span>
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </button>
        </div>
      </div>
    </section>
    <!-- vehicles-card-section-ends -->
@endsection
