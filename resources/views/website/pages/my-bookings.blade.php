@extends('website.app')
@section('content')

    <style>
      :root {
        --brand: #d4a017;
        --brand-light: #f0c040;
        --brand-bg: rgba(212, 160, 23, 0.1);
        --page-bg: #fafaf2;
      }
      body {
        font-family: "Outfit", sans-serif;
        background: var(--page-bg);
        color: #1a1a1a;
      }

      /* NAV */
      .nav-link {
        font-size: 14px;
        color: #444;
        transition: color 0.2s;
      }
      .nav-link:hover,
      .nav-link.active {
        color: var(--brand);
      }
      .nav-link.active {
        border-bottom: 2px solid var(--brand);
        padding-bottom: 2px;
      }

      /* TABS */
      .tab-btn {
        padding: 9px 20px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s;
        border: 1.5px solid transparent;
        color: #666;
        background: transparent;
        white-space: nowrap;
      }
      .tab-btn.active {
        background: var(--brand);
        color: #fff;
        border-color: var(--brand);
        box-shadow: 0 4px 14px rgba(212, 160, 23, 0.35);
      }
      .tab-btn:not(.active):hover {
        border-color: var(--brand);
        color: var(--brand);
      }

      /* BOOKING CARD */
      .booking-card {
        background: #fff;
        border-radius: 16px;
        border: 1.5px solid #efefef;
        overflow: hidden;
        transition:
          box-shadow 0.25s,
          transform 0.25s;
      }
      .booking-card:hover {
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
      }

      /* STATUS BADGES */
      .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
      }
      .badge-active {
        background: #dcfce7;
        color: #15803d;
      }
      .badge-upcoming {
        background: #dbeafe;
        color: #1d4ed8;
      }
      .badge-completed {
        background: #f3f4f6;
        color: #374151;
      }
      .badge-cancelled {
        background: #fee2e2;
        color: #dc2626;
      }

      .badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        flex-shrink: 0;
      }
      .badge-active .badge-dot {
        background: #15803d;
        animation: pulse-green 1.5s infinite;
      }
      .badge-upcoming .badge-dot {
        background: #1d4ed8;
      }
      .badge-completed .badge-dot {
        background: #6b7280;
      }
      .badge-cancelled .badge-dot {
        background: #dc2626;
      }

      @keyframes pulse-green {
        0%,
        100% {
          box-shadow: 0 0 0 0 rgba(21, 128, 61, 0.4);
        }
        50% {
          box-shadow: 0 0 0 4px rgba(21, 128, 61, 0);
        }
      }

      /* ACTION BUTTONS */
      .btn-brand {
        background: var(--brand);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 9px 18px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition:
          background 0.2s,
          transform 0.15s;
        font-family: "Outfit", sans-serif;
      }
      .btn-brand:hover {
        background: #b8890f;
        transform: translateY(-1px);
      }

      .btn-outline {
        background: transparent;
        color: #555;
        border: 1.5px solid #ddd;
        border-radius: 8px;
        padding: 8px 18px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition:
          border-color 0.2s,
          color 0.2s;
        font-family: "Outfit", sans-serif;
      }
      .btn-outline:hover {
        border-color: var(--brand);
        color: var(--brand);
      }

      .btn-danger {
        background: transparent;
        color: #dc2626;
        border: 1.5px solid #fca5a5;
        border-radius: 8px;
        padding: 8px 18px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        font-family: "Outfit", sans-serif;
      }
      .btn-danger:hover {
        background: #fee2e2;
      }

      /* STAT CARD */
      .stat-card {
        background: #fff;
        border-radius: 14px;
        border: 1.5px solid #efefef;
        padding: 20px 24px;
      }
      .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--brand-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--brand);
      }

      /* STEP TRACKER */
      .step {
        position: relative;
        text-align: center;
        flex: 1;
      }
      .step-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        margin: 0 auto 6px;
        position: relative;
        z-index: 1;
      }
      .step-done .step-circle {
        background: var(--brand);
        color: #fff;
      }
      .step-active .step-circle {
        background: #fff;
        border: 2.5px solid var(--brand);
        color: var(--brand);
      }
      .step-todo .step-circle {
        background: #f3f4f6;
        border: 2px solid #e5e7eb;
        color: #9ca3af;
      }
      .step-line {
        position: absolute;
        top: 16px;
        left: calc(50% + 16px);
        right: calc(-50% + 16px);
        height: 2px;
        background: #e5e7eb;
        z-index: 0;
      }
      .step-line.done {
        background: var(--brand);
      }
      .step:last-child .step-line {
        display: none;
      }

      /* RATING STARS */
      .star {
        cursor: pointer;
        font-size: 20px;
        color: #d1d5db;
        transition: color 0.15s;
      }
      .star.filled,
      .star:hover {
        color: var(--brand);
      }

      /* EMPTY STATE */
      .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #9ca3af;
      }

      /* TABS PANEL */
      .tab-panel {
        display: none;
      }
      .tab-panel.active {
        display: block;
      }

      /* Modal */
      .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 100;
        align-items: center;
        justify-content: center;
      }
      .modal-overlay.open {
        display: flex;
      }
      .modal-box {
        background: #fff;
        border-radius: 20px;
        padding: 32px;
        max-width: 480px;
        width: 90%;
        position: relative;
      }

      /* Tooltip */
      .info-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: #6b7280;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 3px 9px;
      }
      .info-chip svg {
        color: var(--brand);
      }

      .section-divider {
        height: 1px;
        background: linear-gradient(
          to right,
          transparent,
          #e5e7eb,
          transparent
        );
        margin: 0;
      }
    </style>

    <!-- ═══════════════════ PAGE HEADER ═══════════════════ -->
    <section
      class="pt-10 pb-6 px-6 mt-20"
      style="background: linear-gradient(135deg, #fafaf2 0%, #fffbe8 100%)"
    >
      <div class="max-w-7xl mx-auto">
        <div
          class="flex flex-col md:flex-row md:items-end justify-between gap-6"
        >
          <div>
            <p
              class="text-xs font-bold tracking-widest uppercase mb-2"
              style="color: var(--brand)"
            >
              ✦ Passenger Dashboard
            </p>
            <h1
              class="text-3xl font-bold text-gray-900"
              style="
                font-family: &quot;Rajdhani&quot;, sans-serif;
                letter-spacing: 0.5px;
              "
            >
              My <span style="color: var(--brand)">Bookings</span>
            </h1>
            <p class="text-sm text-gray-500 mt-1">
              Track, manage and review all your rides in one place.
            </p>
          </div>
          <!-- Quick Stats -->
          <div class="flex gap-3 flex-wrap">
            <div class="stat-card flex items-center gap-3 py-3 px-4">
              <div class="stat-icon">
                <svg
                  width="18"
                  height="18"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <rect x="3" y="4" width="18" height="18" rx="2" />
                  <path d="M16 2v4M8 2v4M3 10h18" />
                </svg>
              </div>
              <div>
                <div class="text-xl font-bold text-gray-900">12</div>
                <div class="text-xs text-gray-400">Total Rides</div>
              </div>
            </div>
            <div class="stat-card flex items-center gap-3 py-3 px-4">
              <div class="stat-icon">
                <svg
                  width="18"
                  height="18"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"
                  />
                </svg>
              </div>
              <div>
                <div class="text-xl font-bold text-gray-900">4.9</div>
                <div class="text-xs text-gray-400">Avg Rating</div>
              </div>
            </div>
            <div class="stat-card flex items-center gap-3 py-3 px-4">
              <div class="stat-icon">
                <svg
                  width="18"
                  height="18"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <line x1="12" y1="1" x2="12" y2="23" />
                  <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                </svg>
              </div>
              <div>
                <div class="text-xl font-bold text-gray-900">AED 14.2K</div>
                <div class="text-xs text-gray-400">Total Spent</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════ MAIN CONTENT ═══════════════════ -->
    <section class="py-8 px-6">
      <div class="max-w-7xl mx-auto">
        <!-- Filters + Search Bar -->
        <div
          class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between mb-6"
        >
          <!-- Tabs -->
          <div class="flex gap-2 flex-wrap">
            <button class="tab-btn active" onclick="switchTab('all', this)">
              All <span class="ml-1 text-xs opacity-70">(12)</span>
            </button>
            <button class="tab-btn" onclick="switchTab('active', this)">
              <span
                class="inline-block w-2 h-2 rounded-full bg-green-500 mr-1 align-middle"
              ></span
              >Active <span class="ml-1 text-xs opacity-70">(1)</span>
            </button>
            <button class="tab-btn" onclick="switchTab('upcoming', this)">
              Upcoming <span class="ml-1 text-xs opacity-70">(3)</span>
            </button>
            <button class="tab-btn" onclick="switchTab('completed', this)">
              Completed <span class="ml-1 text-xs opacity-70">(6)</span>
            </button>
            <button class="tab-btn" onclick="switchTab('cancelled', this)">
              Cancelled <span class="ml-1 text-xs opacity-70">(2)</span>
            </button>
          </div>
          <!-- Search -->
          <div class="relative">
            <svg
              class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.35-4.35" />
            </svg>
            <input
              type="text"
              placeholder="Search by ID or vehicle…"
              class="pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-full bg-white focus:outline-none focus:border-yellow-400 w-56"
            />
          </div>
        </div>

        <!-- ─── ALL / ACTIVE Booking ─────────────────────── -->
        <!-- ACTIVE CARD -->
        <div
          class="booking-card mb-4"
          style="
            border-color: rgba(212, 160, 23, 0.4);
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.08);
          "
        >
          <!-- Top bar -->
          <div
            class="flex items-center justify-between px-5 py-3"
            style="background: linear-gradient(135deg, #fffbe8, #fdf3cc)"
          >
            <div class="flex items-center gap-3">
              <span class="badge badge-active"
                ><span class="badge-dot"></span>Live Now</span
              >
              <span class="text-xs text-gray-500 font-mono">#RS-2026-0042</span>
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-500">
              <svg
                class="w-3.5 h-3.5"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
                <circle cx="12" cy="12" r="10" />
                <path d="M12 6v6l4 2" />
              </svg>
              Booked: Today, 2:15 PM
            </div>
          </div>
          <div class="section-divider"></div>

          <!-- Card Body -->
          <div class="p-5">
            <div class="flex flex-col lg:flex-row gap-5">
              <!-- Car Image -->
              <div class="relative flex-shrink-0">
                <img
                  src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80"
                  alt="Mercedes S-Class"
                  class="w-full lg:w-48 h-32 object-cover rounded-12"
                  style="border-radius: 12px"
                  onerror="
                    this.src =
                      'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&w=300&q=80'
                  "
                />
                <span
                  class="absolute top-2 right-2 badge"
                  style="
                    background: rgba(0, 0, 0, 0.6);
                    color: #fff;
                    font-size: 10px;
                  "
                  >VIP</span
                >
              </div>

              <!-- Details -->
              <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                  <p class="text-xs text-gray-400 mb-1">Vehicle</p>
                  <p
                    class="font-bold text-gray-900 text-base"
                    style="font-family: &quot;Rajdhani&quot;, sans-serif"
                  >
                    Mercedes S-Class
                  </p>
                  <div class="flex gap-2 mt-2 flex-wrap">
                    <span class="info-chip"
                      ><svg
                        class="w-3 h-3"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                      >
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        </svg>5 Seats</span
                    >
                    <span class="info-chip">Auto</span>
                  </div>
                  <p class="text-xs text-gray-400 mt-2">
                    Plate:
                    <span class="font-semibold text-gray-700">DXB-A 12345</span>
                  </p>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Route</p>
                  <div class="space-y-1.5">
                    <div class="flex items-start gap-2">
                      <div
                        class="w-2 h-2 rounded-full mt-1 flex-shrink-0"
                        style="background: var(--brand)"
                      ></div>
                      <p class="text-sm text-gray-700 font-medium">
                        Dubai International Airport, T3
                      </p>
                    </div>
                    <div class="w-px h-3 bg-gray-300 ml-1"></div>
                    <div class="flex items-start gap-2">
                      <div
                        class="w-2 h-2 rounded-full mt-1 flex-shrink-0 bg-gray-400"
                      ></div>
                      <p class="text-sm text-gray-700 font-medium">
                        Jumeirah Beach Hotel, Dubai
                      </p>
                    </div>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Driver</p>
                  <div class="flex items-center gap-2">
                    <div
                      class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center font-bold text-sm"
                      style="color: var(--brand)"
                    >
                      AK
                    </div>
                    <div>
                      <p class="text-sm font-semibold text-gray-800">
                        Ahmed K.
                      </p>
                      <p class="text-xs text-gray-400 flex items-center gap-1">
                        ⭐ 4.96 · 340 rides
                      </p>
                    </div>
                  </div>
                  <p class="text-xs text-gray-500 mt-2">
                    📞
                    <a href="#" class="underline" style="color: var(--brand)"
                      >+971 50 *** 4521</a
                    >
                  </p>
                </div>
              </div>

              <!-- Price + Actions -->
              <div
                class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
              >
                <div class="text-right">
                  <p class="text-xs text-gray-400">Total Fare</p>
                  <p
                    class="text-2xl font-bold"
                    style="
                      font-family: &quot;Rajdhani&quot;, sans-serif;
                      color: var(--brand);
                    "
                  >
                    AED 1,800
                  </p>
                  <p class="text-xs text-gray-400">/day · Paid</p>
                </div>
                <div class="flex flex-col gap-2 w-full sm:w-auto">
                  <button
                    class="btn-brand text-sm flex items-center gap-2 justify-center px-4 py-2 rounded-lg"
                  >
                    <svg
                      width="13"
                      height="13"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2.5"
                      viewBox="0 0 24 24"
                    >
                      <circle cx="12" cy="12" r="10" />
                      <path d="M12 8v4l3 3" />
                    </svg>
                    Live Track
                  </button>
                  <button class="btn-outline text-sm px-4 py-2">
                    View Details
                  </button>
                </div>
              </div>
            </div>

            <!-- Journey Progress Bar -->
            <div
              class="mt-5 p-4 rounded-12 bg-gray-50"
              style="border-radius: 12px; border: 1px solid #f0f0f0"
            >
              <p
                class="text-xs text-gray-500 font-semibold mb-3 uppercase tracking-wide"
              >
                Journey Progress
              </p>
              <div class="flex items-start">
                <div class="step step-done">
                  <div class="step-circle">✓</div>
                  <div class="step-line done"></div>
                  <p class="text-xs text-gray-600 font-semibold">Confirmed</p>
                  <p class="text-xs text-gray-400">2:15 PM</p>
                </div>
                <div class="step step-done">
                  <div class="step-circle">✓</div>
                  <div class="step-line done"></div>
                  <p class="text-xs text-gray-600 font-semibold">
                    Driver Assigned
                  </p>
                  <p class="text-xs text-gray-400">2:18 PM</p>
                </div>
                <div class="step step-active">
                  <div class="step-circle">●</div>
                  <div class="step-line"></div>
                  <p class="text-xs font-semibold" style="color: var(--brand)">
                    En Route
                  </p>
                  <p class="text-xs text-gray-400">Now</p>
                </div>
                <div class="step step-todo">
                  <div class="step-circle">4</div>
                  <div class="step-line"></div>
                  <p class="text-xs text-gray-400">Arrived</p>
                  <p class="text-xs text-gray-300">~3:20 PM</p>
                </div>
                <div class="step step-todo">
                  <div class="step-circle">5</div>
                  <p class="text-xs text-gray-400">Completed</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- UPCOMING CARD -->
        <div class="booking-card mb-4">
          <div class="flex items-center justify-between px-5 py-3 bg-blue-50">
            <div class="flex items-center gap-3">
              <span class="badge badge-upcoming"
                ><span class="badge-dot"></span>Upcoming</span
              >
              <span class="text-xs text-gray-500 font-mono">#RS-2026-0041</span>
            </div>
            <div class="text-xs text-gray-500 flex items-center gap-1">
              <svg
                class="w-3.5 h-3.5"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
                <rect x="3" y="4" width="18" height="18" rx="2" />
                <path d="M16 2v4M8 2v4M3 10h18" />
              </svg>
              Tomorrow, 22 May · 09:00 AM
            </div>
          </div>
          <div class="section-divider"></div>
          <div class="p-5">
            <div class="flex flex-col lg:flex-row gap-5">
              <img
                src="https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&w=300&q=80"
                alt="Mercedes Viano"
                class="w-full lg:w-48 h-32 object-cover flex-shrink-0"
                style="border-radius: 12px"
                onerror="
                  this.src =
                    'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&w=300&q=80'
                "
              />
              <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                  <p class="text-xs text-gray-400 mb-1">Vehicle</p>
                  <p
                    class="font-bold text-gray-900"
                    style="
                      font-family: &quot;Rajdhani&quot;, sans-serif;
                      font-size: 17px;
                    "
                  >
                    Mercedes Viano
                  </p>
                  <div class="flex gap-2 mt-2">
                    <span class="info-chip">8 Seats</span
                    ><span class="info-chip">PHC</span>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Route</p>
                  <div class="space-y-1.5">
                    <div class="flex items-start gap-2">
                      <div
                        class="w-2 h-2 rounded-full mt-1 flex-shrink-0"
                        style="background: var(--brand)"
                      ></div>
                      <p class="text-sm text-gray-700">
                        Burj Khalifa, Downtown Dubai
                      </p>
                    </div>
                    <div class="w-px h-3 bg-gray-300 ml-1"></div>
                    <div class="flex items-start gap-2">
                      <div
                        class="w-2 h-2 rounded-full mt-1 flex-shrink-0 bg-gray-400"
                      ></div>
                      <p class="text-sm text-gray-700">Mall of the Emirates</p>
                    </div>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Service Type</p>
                  <p class="text-sm font-semibold text-gray-800">
                    Hourly Booking
                  </p>
                  <p class="text-xs text-gray-500 mt-1">Duration: 4 hours</p>
                  <p class="text-xs text-gray-500">Passengers: 6</p>
                </div>
              </div>
              <div
                class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
              >
                <div class="text-right">
                  <p class="text-xs text-gray-400">Total Fare</p>
                  <p
                    class="text-2xl font-bold"
                    style="
                      font-family: &quot;Rajdhani&quot;, sans-serif;
                      color: var(--brand);
                    "
                  >
                    AED 1,200
                  </p>
                  <p class="text-xs text-gray-400">Pending Payment</p>
                </div>
                <div class="flex flex-col gap-2 w-full sm:w-auto">
                  <button class="btn-brand text-sm px-4 py-2 rounded-lg">
                    Modify Booking
                  </button>
                  <button
                    class="btn-danger text-sm px-4 py-2"
                    onclick="openCancelModal()"
                  >
                    Cancel Ride
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- COMPLETED CARD -->
        <div class="booking-card mb-4">
          <div class="flex items-center justify-between px-5 py-3 bg-gray-50">
            <div class="flex items-center gap-3">
              <span class="badge badge-completed"
                ><span class="badge-dot"></span>Completed</span
              >
              <span class="text-xs text-gray-500 font-mono">#RS-2026-0039</span>
            </div>
            <div class="text-xs text-gray-400">17 May 2026 · 11:30 AM</div>
          </div>
          <div class="section-divider"></div>
          <div class="p-5">
            <div class="flex flex-col lg:flex-row gap-5">
              <img
                src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=300&q=80"
                alt="Range Rover"
                class="w-full lg:w-48 h-32 object-cover flex-shrink-0"
                style="border-radius: 12px; opacity: 0.9"
                onerror="
                  this.src =
                    'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&w=300&q=80'
                "
              />
              <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                  <p class="text-xs text-gray-400 mb-1">Vehicle</p>
                  <p
                    class="font-bold text-gray-900"
                    style="
                      font-family: &quot;Rajdhani&quot;, sans-serif;
                      font-size: 17px;
                    "
                  >
                    Range Rover
                  </p>
                  <div class="flex gap-2 mt-2">
                    <span class="info-chip">7 Seats</span
                    ><span class="info-chip">4x4</span>
                  </div>
                  <p class="text-xs text-gray-400 mt-2">Plate: DXB-C 77821</p>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Route</p>
                  <div class="space-y-1.5">
                    <div class="flex items-start gap-2">
                      <div
                        class="w-2 h-2 rounded-full mt-1 flex-shrink-0"
                        style="background: var(--brand)"
                      ></div>
                      <p class="text-sm text-gray-700">Dubai Marina Walk</p>
                    </div>
                    <div class="w-px h-3 bg-gray-300 ml-1"></div>
                    <div class="flex items-start gap-2">
                      <div
                        class="w-2 h-2 rounded-full mt-1 flex-shrink-0 bg-gray-400"
                      ></div>
                      <p class="text-sm text-gray-700">Abu Dhabi, ADNEC</p>
                    </div>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Your Rating</p>
                  <!-- Already rated -->
                  <div class="flex gap-1">
                    <span class="star filled">★</span
                    ><span class="star filled">★</span
                    ><span class="star filled">★</span
                    ><span class="star filled">★</span
                    ><span class="star filled">★</span>
                  </div>
                  <p class="text-xs text-gray-500 mt-1">
                    "Excellent service, very punctual!"
                  </p>
                </div>
              </div>
              <div
                class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
              >
                <div class="text-right">
                  <p class="text-xs text-gray-400">Total Paid</p>
                  <p
                    class="text-2xl font-bold"
                    style="
                      font-family: &quot;Rajdhani&quot;, sans-serif;
                      color: var(--brand);
                    "
                  >
                    AED 900
                  </p>
                  <p class="text-xs text-green-600 font-semibold">
                    ✓ Paid · Receipt
                  </p>
                </div>
                <div class="flex flex-col gap-2 w-full sm:w-auto">
                  <button class="btn-brand text-sm px-4 py-2 rounded-lg">
                    Rebook Same
                  </button>
                  <button class="btn-outline text-sm px-4 py-2">
                    Download Receipt
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CANCELLED CARD -->
        <div class="booking-card mb-4 opacity-80">
          <div class="flex items-center justify-between px-5 py-3 bg-red-50">
            <div class="flex items-center gap-3">
              <span class="badge badge-cancelled"
                ><span class="badge-dot"></span>Cancelled</span
              >
              <span class="text-xs text-gray-500 font-mono">#RS-2026-0037</span>
            </div>
            <div class="text-xs text-gray-400">
              15 May 2026 · Cancelled by you
            </div>
          </div>
          <div class="section-divider"></div>
          <div class="p-5">
            <div class="flex flex-col lg:flex-row gap-5">
              <img
                src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=300&q=80"
                alt="GMC Yukon"
                class="w-full lg:w-48 h-32 object-cover flex-shrink-0 grayscale"
                style="border-radius: 12px"
              />
              <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                  <p class="text-xs text-gray-400 mb-1">Vehicle</p>
                  <p
                    class="font-bold text-gray-600"
                    style="
                      font-family: &quot;Rajdhani&quot;, sans-serif;
                      font-size: 17px;
                    "
                  >
                    GMC Yukon XL
                  </p>
                  <div class="flex gap-2 mt-2">
                    <span class="info-chip">8 Seats</span
                    ><span class="info-chip">PHC</span>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Was Scheduled</p>
                  <p class="text-sm text-gray-600">16 May 2026 · 8:00 AM</p>
                  <p class="text-xs text-gray-400 mt-1">Airport Transfer</p>
                </div>
                <div>
                  <p class="text-xs text-gray-400 mb-1">Cancellation</p>
                  <p class="text-sm text-gray-600 font-medium">
                    Refund: AED 1,500
                  </p>
                  <p class="text-xs text-gray-400 mt-1">
                    Processed in 3–5 days
                  </p>
                </div>
              </div>
              <div
                class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
              >
                <div class="text-right">
                  <p class="text-xs text-gray-400">Original Fare</p>
                  <p
                    class="text-2xl font-bold text-gray-400"
                    style="font-family: &quot;Rajdhani&quot;, sans-serif"
                  >
                    AED 1,500
                  </p>
                  <p class="text-xs text-red-400">Refund Pending</p>
                </div>
                <button class="btn-brand text-sm px-4 py-2 rounded-lg">
                  Rebook This Car
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Pagination hint -->
        <div class="flex items-center justify-center gap-3 mt-8">
          <button
            class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-yellow-400"
          >
            <svg
              width="14"
              height="14"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path d="M15 18l-6-6 6-6" />
            </svg>
          </button>
          <button
            class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold text-white"
            style="background: var(--brand)"
          >
            1
          </button>
          <button
            class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-sm text-gray-600 hover:border-yellow-400"
          >
            2
          </button>
          <button
            class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-sm text-gray-600 hover:border-yellow-400"
          >
            3
          </button>
          <button
            class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-yellow-400"
          >
            <svg
              width="14"
              height="14"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path d="M9 18l6-6-6-6" />
            </svg>
          </button>
        </div>
      </div>
    </section>
@endsection