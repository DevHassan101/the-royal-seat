@extends('website.app')
@section('content')
    <section class="pt-16">


        <!-- ╔══════════════════════════════════════╗ -->
        <!-- ║          MAIN CONTENT START          ║ -->
        <!-- ╚══════════════════════════════════════╝ -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- ── LEFT COLUMN START ── -->
                <div class="flex-1 min-w-0">
                    <!-- ── STEPPER START ── -->
                    <div class="flex items-center bg-white rounded-2xl px-7 py-4 mb-7 border border-gray-100">
                        <div class="flex-1 flex items-center">
                            <div class="step-circle" id="sc1">1</div>
                            <div class="ml-2.5">
                                <div class="text-sm font-bold" id="sl1">Vehicle</div>
                                <div class="text-xs text-gray-400">Choose your ride</div>
                            </div>
                        </div>
                        <div class="step-connector" id="conn1"></div>
                        <div class="flex-1 flex items-center">
                            <div class="step-circle" id="sc2">2</div>
                            <div class="ml-2.5">
                                <div class="text-sm font-bold" id="sl2">Details</div>
                                <div class="text-xs text-gray-400">Passenger info</div>
                            </div>
                        </div>
                        <div class="step-connector" id="conn2"></div>
                        <div class="flex-1 flex items-center">
                            <div class="step-circle" id="sc3">3</div>
                            <div class="ml-2.5">
                                <div class="text-sm font-bold" id="sl3">Payment</div>
                                <div class="text-xs text-gray-400">Confirm & pay</div>
                            </div>
                        </div>
                    </div>
                    <!-- ── STEPPER END ── -->

                    <!-- ════════════════════════════════════ -->
                    <!-- ══  STEP 1: VEHICLE PANEL START  ══ -->
                    <!-- ════════════════════════════════════ -->
                    <div id="panel1" class="step-panel active">
                        <h2 class="  text-xl font-bold mb-4">Select Your Vehicle</h2>

                        <!-- ── Vehicle Card 1: Comfort ── -->
                        <div class="vehicle-card selected"
                            onclick=" selectVehicle(this, 'Chevrolet Malibu', 'AED 113.14', 'Comfort', '4', 'Sedan', 'Automatic',
                'https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80',)">
                            <div class="flex flex-col md:flex-row gap-4">

                                <!-- <div class="flex-shrink-0 text-center bg-red-500" style="width: 150px">
                      <img class="w-[150px] h-[95px] rounded-[10px]" src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80"
                        style="object-fit: cover;" />
                      <p class="text-xs text-gray-400 mt-1.5 font-medium">
                        Chevrolet Malibu
                      </p>
                    </div> -->

                                <!-- cars-category-slider -->
                                <div class="slider-wrapper">
                                    <div class="slides-container">
                                        <div class="slide active">
                                            <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80"
                                                alt="Chevrolet Malibu" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=300&q=80"
                                                alt="BMW 3 Series" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?auto=format&fit=crop&w=300&q=80"
                                                alt="Audi A4" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=300&q=80"
                                                alt="Porsche 911" />
                                        </div>
                                    </div>

                                    <div class="car-name" id="carName">Chevrolet Malibu</div>

                                    <div class="dots">
                                        <div class="dot active" onclick="goTo(0)"></div>
                                        <div class="dot" onclick="goTo(1)"></div>
                                        <div class="dot" onclick="goTo(2)"></div>
                                        <div class="dot" onclick="goTo(3)"></div>
                                    </div>
                                </div>
                                <!-- cars-category-slider -->

                                <div class="flex-1">
                                    <h3 class="  font-bold text-lg mb-3">Comfort</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                            </svg>
                                            4 Seats
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                                <path d="M8 21h8M12 17v4" />
                                            </svg>
                                            Sedan
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M12 8v4l3 3" />
                                            </svg>Automatic
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
                                    style="min-width: 140px">
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 mb-0.5">Total price</p>
                                        <p class="  text-2xl font-bold" style="color: var(--brand)">
                                            AED 113.14
                                        </p>
                                        <p class="text-xs text-gray-400">Includes VAT & fees</p>
                                    </div>
                                    <button class="btn-select selected-btn"
                                        onclick=" event.stopPropagation(); goStep(2);">
                                        Selected ✓
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- ── Vehicle Card 1 END ── -->

                        <!-- ── Vehicle Card 2: Executive ── -->
                        <div class="vehicle-card"
                            onclick=" selectVehicle( this, 'Nissan Maxima', 'AED 141.20', 'Executive', '4', 'Sedan', 'Automatic',
                'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=300&q=80', )">
                            <div class="flex flex-col md:flex-row gap-4">

                                <!-- <div class="flex-shrink-0 text-center" style="width: 150px">
                      <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=300&q=80"
                        style=" width: 150px; height: 95px; object-fit: cover; border-radius: 10px;" />
                      <p class="text-xs text-gray-400 mt-1.5 font-medium">
                        Nissan Maxima
                      </p>
                    </div> -->

                                <!-- cars-category-slider -->
                                <div class="slider-wrapper">
                                    <div class="slides-container">
                                        <div class="slide active">
                                            <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=300&q=80"
                                                alt="Chevrolet Malibu" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=300&q=80"
                                                alt="BMW 3 Series" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?auto=format&fit=crop&w=300&q=80"
                                                alt="Audi A4" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=300&q=80"
                                                alt="Porsche 911" />
                                        </div>
                                    </div>

                                    <div class="car-name" id="carName">Nissan Maxima</div>

                                    <div class="dots">
                                        <div class="dot active" onclick="goTo(0)"></div>
                                        <div class="dot" onclick="goTo(1)"></div>
                                        <div class="dot" onclick="goTo(2)"></div>
                                        <div class="dot" onclick="goTo(3)"></div>
                                    </div>
                                </div>
                                <!-- cars-category-slider -->

                                <div class="flex-1">
                                    <h3 class="  font-bold text-lg mb-3">Executive</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                            </svg>
                                            4 Seats
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                                <path d="M8 21h8M12 17v4" />
                                            </svg>
                                            Sedan
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M12 8v4l3 3" />
                                            </svg>
                                            Automatic
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
                                    style="min-width: 140px">
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 mb-0.5">Total price</p>
                                        <p class="text-2xl font-bold" style="color: var(--brand)">
                                            AED 141.20
                                        </p>
                                        <p class="text-xs text-gray-400">Includes VAT & fees</p>
                                    </div>
                                    <button class="btn-select">Select</button>
                                </div>
                            </div>
                        </div>
                        <!-- ── Vehicle Card 2 END ── -->

                        <!-- ── Vehicle Card 3: SUV ── -->
                        <div class="vehicle-card"
                            onclick="cselectVehicle( this, 'Toyota Land Cruiser', 'AED 137.44', 'SUV', '6', 'SUV', 'Automatic',
                'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=300&q=80',)">

                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-shrink-0 text-center" style="width: 150px">
                                    <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=300&q=80"
                                        style="width: 150px; height: 95px; object-fit: cover; border-radius: 10px;" />
                                    <p class="text-xs text-gray-400 mt-1.5 font-medium">
                                        Toyota Land Cruiser
                                    </p>
                                </div>
                                <div class="flex-1">
                                    <h3 class="  font-bold text-lg mb-3">SUV</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                            </svg>
                                            6 Seats
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                                <path d="M8 21h8M12 17v4" />
                                            </svg>SUV
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M12 8v4l3 3" />
                                            </svg>
                                            Automatic
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
                                    style="min-width: 140px">
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 mb-0.5">Total price</p>
                                        <p class="text-2xl font-bold" style="color: var(--brand)">
                                            AED 137.44
                                        </p>
                                        <p class="text-xs text-gray-400">Includes VAT & fees</p>
                                    </div>
                                    <button class="btn-select">Select</button>
                                </div>
                            </div>
                        </div>
                        <!-- ── Vehicle Card 3 END ── -->

                        <!-- ── Vehicle Card 4: Executive SUV ── -->
                        <div class="vehicle-card"
                            onclick=" selectVehicle( this, 'Mercedes Viano', 'AED 357.28', 'Executive SUV', '7', 'Van', 'Automatic',
                  'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&w=300&q=80', )">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-shrink-0 text-center" style="width: 150px">
                                    <img src="https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&w=300&q=80"
                                        style="width: 150px; height: 95px; object-fit: cover; border-radius: 10px;" />
                                    <p class="text-xs text-gray-400 mt-1.5 font-medium">
                                        Mercedes Viano
                                    </p>
                                </div>
                                <div class="flex-1">
                                    <h3 class="  font-bold text-lg mb-3">Executive SUV</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                            </svg>
                                            7 Seats
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                                <path d="M8 21h8M12 17v4" />
                                            </svg>
                                            Van
                                        </span>
                                        <span class="badge-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M12 8v4l3 3" />
                                            </svg>
                                            Automatic
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end justify-between gap-3 flex-shrink-0"
                                    style="min-width: 140px">
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 mb-0.5">Total price</p>
                                        <p class="text-2xl font-bold" style="color: var(--brand)">
                                            AED 357.28
                                        </p>
                                        <p class="text-xs text-gray-400">Includes VAT & fees</p>
                                    </div>
                                    <button class="btn-select">Select</button>
                                </div>
                            </div>
                        </div>
                        <!-- ── Vehicle Card 4 END ── -->
                    </div>
                    <!-- ════════════════════════════════════ -->
                    <!-- ══   STEP 1: VEHICLE PANEL END   ══ -->
                    <!-- ════════════════════════════════════ -->

                    <!-- ════════════════════════════════════ -->
                    <!-- ══  STEP 2: DETAILS PANEL START  ══ -->
                    <!-- ════════════════════════════════════ -->
                    <div id="panel2" class="step-panel">
                        <!-- ── Selected Vehicle Banner START ── -->
                        <div class="selected-banner mb-0">
                            <div class="flex flex-col md:flex-row gap-4 items-center">

                                <!-- <div class="flex-shrink-0">
                      <img id="detail-car-img" src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80"
                        style="width: 130px; height: 80px; object-fit: cover; border-radius: 10px;" />
                      <p class="text-xs text-gray-400 mt-1 text-center" id="detail-car-model">
                        Chevrolet Malibu
                      </p>
                    </div> -->

                                <!-- cars-category-slider -->
                                <div class="slider-wrapper">
                                    <div class="slides-container">
                                        <div class="slide active">
                                            <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80"
                                                alt="Chevrolet Malibu" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=300&q=80"
                                                alt="BMW 3 Series" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?auto=format&fit=crop&w=300&q=80"
                                                alt="Audi A4" />
                                        </div>
                                        <div class="slide">
                                            <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=300&q=80"
                                                alt="Porsche 911" />
                                        </div>
                                    </div>
                                    <div class="car-name" id="carName">Chevrolet Malibu</div>
                                    <div class="dots">
                                        <div class="dot active" onclick="goTo(0)"></div>
                                        <div class="dot" onclick="goTo(1)"></div>
                                        <div class="dot" onclick="goTo(2)"></div>
                                        <div class="dot" onclick="goTo(3)"></div>
                                    </div>
                                </div>
                                <!-- cars-category-slider -->

                                <div class="flex-1">
                                    <h3 class="  font-bold text-lg" id="detail-car-name">
                                        Comfort
                                    </h3>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        <span class="badge-chip" id="detail-seats-badge">
                                            <svg width="11" height="11" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                            </svg>
                                            4 Seats
                                        </span>
                                        <span class="badge-chip" id="detail-type-badge">Sedan</span>
                                        <span class="badge-chip" id="detail-trans-badge">Automatic</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-xs text-gray-400">Total price</p>
                                    <p class="text-xl font-bold" style="color: var(--brand)" id="detail-price">
                                        AED 113.14
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="change-bar mb-6" onclick="goStep(1)">
                            ↑ CHANGE VEHICLE
                        </div>
                        <!-- ── Selected Vehicle Banner END ── -->

                        <!-- ── Passenger Details Form START ── -->
                        <h2 class="  text-lg font-bold mb-4">Passenger Detail</h2>
                        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-1.5">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" id="inp-name" class="form-input"
                                        placeholder="Enter your full name" />
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" id="inp-email" class="form-input"
                                        placeholder="your@email.com" />
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="form-label">Mobile Number *</label>
                                    <div class="phone-wrap">
                                        <div class="phone-flag">🇦🇪 +971 ▾</div>
                                        <input type="tel" id="inp-phone" placeholder="50 123 4567" />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="form-label">WhatsApp Number</label>
                                    <div class="phone-wrap">
                                        <div class="phone-flag">🇦🇪 +971 ▾</div>
                                        <input type="tel" id="inp-whatsapp" placeholder="50 123 4567" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ── Passenger Details Form END ── -->

                        <!-- ── Passengers & Extras START ── -->
                        <h2 class="text-lg font-bold mb-4">Passengers & Extras</h2>
                        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6 space-y-4">
                            <!-- Adults -->
                            <div class="pax-card">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                        style="background: var(--brand-bg)">
                                        <svg width="17" height="17" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold">Adults</p>
                                        <p class="text-xs text-gray-400">Age 12 and above</p>
                                    </div>
                                </div>
                                <div class="counter">
                                    <button class="counter-btn" onclick="changeCount('adults', -1)">
                                        −
                                    </button>
                                    <span class="counter-val" id="adults-count">1</span>
                                    <button class="counter-btn" onclick="changeCount('adults', 1)">
                                        +
                                    </button>
                                </div>
                            </div>
                            <!-- Children -->
                            <div class="pax-card">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                        style="background: var(--brand-bg)">
                                        <svg width="17" height="17" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                            <circle cx="12" cy="6" r="3" />
                                            <path d="M12 9v5M9 14h6" />
                                            <path d="M5 21v-1a7 7 0 0 1 14 0v1" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold">Children</p>
                                        <p class="text-xs text-gray-400">Age 2 – 11</p>
                                    </div>
                                </div>
                                <div class="counter">
                                    <button class="counter-btn" onclick="changeCount('children', -1)">
                                        −
                                    </button>
                                    <span class="counter-val" id="children-count">0</span>
                                    <button class="counter-btn" onclick="changeCount('children', 1)">
                                        +
                                    </button>
                                </div>
                            </div>
                            <!-- Chauffeur Tip -->
                            <div class="pax-card tip-card">
                                <div class="flex items-center gap-3 w-full">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                        style="background: var(--brand-bg)">
                                        <svg width="17" height="17" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                            <line x1="12" y1="1" x2="12" y2="23" />
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold">Chauffeur Tip</p>
                                        <p class="text-xs text-gray-400">
                                            Optional — your driver will appreciate it
                                        </p>
                                    </div>
                                </div>
                                <input type="number" id="inp-tip" class="form-input text-[13px]"
                                    placeholder="Enter tip amount (AED)" min="0" />
                            </div>
                        </div>
                        <!-- ── Passengers & Extras END ── -->

                        <button class="btn-main" onclick="goStep(3)">
                            NEXT — PROCEED TO PAYMENT →
                        </button>
                    </div>
                    <!-- ════════════════════════════════════ -->
                    <!-- ══   STEP 2: DETAILS PANEL END   ══ -->
                    <!-- ════════════════════════════════════ -->

                    <!-- ════════════════════════════════════ -->
                    <!-- ══  STEP 3: PAYMENT PANEL START  ══ -->
                    <!-- ════════════════════════════════════ -->
                    <div id="panel3" class="step-panel">
                        <!-- ── Selected Vehicle Banner START ── -->
                        <div class="selected-banner mb-0">
                            <div class="flex flex-col md:flex-row gap-4 items-center">
                                <img class="w-[120px] h-[70px] rounded-[10px]" id="pay-car-img"
                                    src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=200&q=80"
                                    style="object-fit: cover; flex-shrink: 0;" />
                                <div class="flex-1">
                                    <h3 class="font-bold" id="pay-car-label" style="font-size: 16px">
                                        Comfort — Chevrolet Malibu
                                    </h3>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        <span class="badge-chip" id="pay-seats-badge" style="font-size: 10px">
                                            4 Seats
                                        </span>
                                        <span class="badge-chip" id="pay-type-badge" style="font-size: 10px">
                                            Sedan
                                        </span>
                                        <span class="badge-chip" id="pay-trans-badge" style="font-size: 10px">
                                            Automatic
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-xs text-gray-400">Total price</p>
                                    <p class="text-xl font-bold" id="pay-price" style="color: var(--brand)">
                                        AED 113.14
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="change-bar mb-5" onclick="goStep(1)">
                            ↑ CHANGE VEHICLE
                        </div>
                        <!-- ── Selected Vehicle Banner END ── -->

                        <!-- ── Passenger Summary START ── -->
                        <div class="bg-white rounded-2xl border border-gray-100 p-5 mb-5">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex-1">
                                    <h3 class="font-bold text-base mb-1">
                                        Passenger Summary
                                    </h3>
                                    <p class="text-sm font-semibold text-gray-700" id="pay-name-line">
                                        —
                                    </p>
                                    <p class="text-sm text-gray-500 mt-0.5" id="pay-contact-line">
                                        —
                                    </p>
                                    <div class="flex gap-2 mt-2 flex-wrap">
                                        <span class="badge-chip" style="font-size: 11px" id="pay-adults-badge">
                                            1 Adult
                                        </span>
                                        <span class="badge-chip" style="font-size: 11px; display: none"
                                            id="pay-children-badge">
                                            0 Children
                                        </span>
                                    </div>
                                </div>
                                <button
                                    class="text-xs font-bold px-4 py-2 rounded-full border-2 flex items-center gap-1 flex-shrink-0"
                                    style="border-color: var(--brand); color: var(--brand)" onclick="goStep(2)">
                                    <svg width="12" height="12" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </div>
                        <!-- ── Passenger Summary END ── -->

                        <!-- ── Payment Card START ── -->
                        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6">
                            <!-- Price Breakdown START -->
                            <h3 class="  font-bold text-base mb-4">Price Breakdown</h3>
                            <div class="mb-6">
                                <div class="price-row border-b border-gray-50">
                                    <span class="text-gray-600">Base Fare</span>
                                    <span class="font-semibold" id="pay-base-fare">
                                        AED 113.14
                                    </span>
                                </div>
                                <div class="price-row border-b border-gray-50" id="tip-row" style="display: none">
                                    <span class="text-gray-600">Chauffeur Tip</span>
                                    <span class="font-semibold" id="pay-tip-amount">
                                        AED 0.00
                                    </span>
                                </div>
                                <div class="price-row total">
                                    <span>Total</span>
                                    <span style="color: var(--brand)" id="pay-total">
                                        AED 113.14
                                    </span>
                                </div>
                            </div>
                            <!-- Price Breakdown END -->

                            <!-- Payment Method START -->
                            <h3 class="  font-bold text-base mb-4">Payment Method</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                                <div class="pay-option active" onclick="selectPay(this)">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                        style="background: var(--brand-bg)">
                                        <!-- sajdeen -->
                                        <svg width="16" height="16" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <rect x="1" y="4" width="22" height="16" rx="2" />
                                            <line x1="1" y1="10" x2="23" y2="10" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold">Pay With Card</p>
                                        <div class="flex gap-2 mt-1 flex-wrap items-center">
                                            <span
                                                class="text-[11px] text-[#1a1f71] font-bold bg-[#e8eeff] py-[2px] px-[7px] rounded-[3px]"
                                                style="letter-spacing: 0.5px;">
                                                VISA
                                            </span>
                                            <svg width="24" height="15" viewBox="0 0 38 24">
                                                <rect width="38" height="24" rx="3" fill="#f5f5f5" />
                                                <circle cx="15" cy="12" r="7" fill="#EB001B" />
                                                <circle cx="23" cy="12" r="7" fill="#F79E1B" />
                                                <path d="M19 6.8a7 7 0 0 1 0 10.4A7 7 0 0 1 19 6.8z" fill="#FF5F00" />
                                            </svg>
                                            <span class="text-xs text-gray-400">
                                                Apple Pay · Google Pay
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-4 h-4 rounded-full border-2 flex items-center justify-center"
                                        style="border-color: var(--brand)">
                                        <div class="w-2 h-2 rounded-full" style="background: var(--brand)"></div>
                                    </div>
                                </div>
                                <div class="pay-option" onclick="selectPay(this)">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-[#f0fdf4]">
                                        <svg width="16" height="16" fill="none" stroke="#16a34a"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <rect x="2" y="6" width="20" height="12" rx="2" />
                                            <circle cx="12" cy="12" r="3" />
                                            <path d="M6 12h.01M18 12h.01" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold">Cash on Arrival</p>
                                        <p class="text-xs text-gray-400">
                                            Pay driver directly in AED
                                        </p>
                                    </div>
                                    <div class="w-4 h-4 rounded-full border-2 flex items-center justify-center"
                                        style="border-color: var(--brand)">
                                        <div class="w-2 h-2 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Payment Method END -->

                            <!-- Terms START -->
                            <div class="space-y-3">
                                <label class="custom-check"><input type="checkbox" />
                                    <span>I accept the <a href="#">Terms & Conditions</a>,
                                        <a href="#">Booking Conditions</a> and
                                        <a href="#">Privacy Policy</a>.
                                    </span>
                                </label>
                                <label class="custom-check">
                                    <input type="checkbox" />
                                    <span>I want to subscribe to RideEase newsletter (Tour Tips and Special Deals)
                                    </span>
                                </label>
                            </div>
                            <!-- Terms END -->
                        </div>
                        <!-- ── Payment Card END ── -->

                        <button class="btn-main" onclick="showConfirm()">
                            CONFIRM BOOKING
                        </button>
                    </div>
                    <!-- ════════════════════════════════════ -->
                    <!-- ══   STEP 3: PAYMENT PANEL END   ══ -->
                    <!-- ════════════════════════════════════ -->
                </div>
                <!-- ── LEFT COLUMN END ── -->

                <!-- ── RIGHT SIDEBAR START ── -->
                <div class="w-full lg:w-80 flex-shrink-0">
                    <!-- ── SIDEBAR: JOURNEY SUMMARY START ── -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="  font-bold text-sm tracking-wide">
                                OUTWARD JOURNEY
                            </h3>
                            <span class="text-xs px-2 py-0.5 rounded-full text-white font-semibold"
                                style="background: var(--brand)">
                                One-Way
                            </span>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-start gap-2">
                                <svg class="flex-shrink-0 mt-0.5" width="14" height="14" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    style="color: var(--brand)">
                                    <circle cx="12" cy="10" r="3" />
                                    <path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z" />
                                </svg>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-0.5">
                                        From
                                    </p>
                                    <p class="text-sm font-semibold text-gray-800">
                                        Dubai Int'l Airport – Dubai, UAE
                                    </p>
                                </div>
                            </div>
                            <div class="w-px h-4 bg-gray-200 ml-7"></div>
                            <div class="flex items-start gap-2">
                                <svg class="flex-shrink-0 mt-0.5" width="14" height="14" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: #6b7280">
                                    <circle cx="12" cy="10" r="3" />
                                    <path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z" />
                                </svg>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-0.5">
                                        To
                                    </p>
                                    <p class="text-sm font-semibold text-gray-800">
                                        Burj Khalifa – Dubai, UAE
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 p-3 mb-3 rounded-xl" style="background: var(--brand-bg)">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" style="color: var(--brand)">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <path d="M16 2v4M8 2v4M3 10h18" />
                            </svg>
                            <span class="text-sm font-semibold">
                                Wed, 20 May 2026 · 05:00 PM
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-center">
                            <div class="p-2 rounded-lg bg-gray-50">
                                <svg class="mx-auto mb-1" width="16" height="16" fill="none"
                                    stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                                    style="color: var(--brand)">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>
                                <p class="text-xs font-bold">22 min</p>
                                <p class="text-xs text-gray-400">Est. time</p>
                            </div>
                            <div class="p-2 rounded-lg bg-gray-50">
                                <svg class="mx-auto mb-1" width="16" height="16" fill="none"
                                    stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                                    style="color: var(--brand)">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                </svg>
                                <p class="text-xs font-bold" id="sb-pax">1</p>
                                <p class="text-xs text-gray-400">Passengers</p>
                            </div>
                            <div class="p-2 rounded-lg bg-gray-50">
                                <svg class="mx-auto mb-1" width="16" height="16" fill="none"
                                    stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                                    style="color: var(--brand)">
                                    <path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <p class="text-xs font-bold">19.1 km</p>
                                <p class="text-xs text-gray-400">Distance</p>
                            </div>
                        </div>
                    </div>
                    <!-- ── SIDEBAR: JOURNEY SUMMARY END ── -->

                    <!-- ── SIDEBAR: INFORMATION START ── -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 mb-4">
                        <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-3">
                            Information
                        </h3>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <span style="color: var(--brand)">•</span>420,000+ Passengers
                                transported
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <span style="color: var(--brand)">•</span>Instant Confirmation
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <span style="color: var(--brand)">•</span>All-inclusive Pricing
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <span style="color: var(--brand)">•</span>Secure Payment via
                                Card or Cash
                            </li>
                        </ul>
                        <div class="mt-3 pt-3 border-t border-gray-100">
                            <p class="text-xs text-gray-400 mb-2">Accepted Payments</p>
                            <div class="flex gap-2 flex-wrap items-center">
                                <span
                                    class="text-[11px] text-[#1a1f71] font-bold bg-[#e8eeff] py-[2px] px-[7px] rounded-[3px]"
                                    style="letter-spacing: 0.5px;">
                                    VISA
                                </span>
                                <svg width="30" height="19" viewBox="0 0 38 24">
                                    <rect width="38" height="24" rx="3" fill="#f5f5f5" />
                                    <circle cx="15" cy="12" r="7" fill="#EB001B" />
                                    <circle cx="23" cy="12" r="7" fill="#F79E1B" />
                                    <path d="M19 6.8a7 7 0 0 1 0 10.4A7 7 0 0 1 19 6.8z" fill="#FF5F00" />
                                </svg>
                                <span class="text-xs text-gray-400">
                                    Apple Pay · Google Pay · Cash
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- ── SIDEBAR: INFORMATION END ── -->

                    <!-- ── SIDEBAR: NEED HELP START ── -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 mb-4">
                        <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-3">
                            Need Help?
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 cursor-pointer hover:text-yellow-600 transition-colors">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center"
                                    style="background: var(--brand-bg)">
                                    <svg width="14" height="14" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3M12 17h.01" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold">Chat with Us</p>
                                    <p class="text-xs text-gray-400">Here for You Anytime</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 cursor-pointer hover:text-yellow-600 transition-colors">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center"
                                    style="background: var(--brand-bg)">
                                    <svg width="14" height="14" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24" style="color: var(--brand)">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.37 2 2 0 0 1 3.59 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 8.91A16 16 0 0 0 14 14.91l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold">Call Us 24/7</p>
                                    <p class="text-xs text-gray-400">+971 50 123 4567</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ── SIDEBAR: NEED HELP END ── -->

                    <!-- ── SIDEBAR: DATA PROTECTION START ── -->
                    <div class="rounded-2xl p-5 border border-[#3d3d6e]"
                        style="background: linear-gradient(135deg, #1a1a2e, #2d2d4e);">
                        <div class="flex items-center gap-2 mb-3">
                            <svg width="16" height="16" fill="none" stroke="#d4a017" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                            <h3 class="text-sm font-bold text-white">Data Protection</h3>
                        </div>
                        <p class="text-xs text-gray-400 leading-relaxed mb-3">
                            Your information is secure with us. All data is encrypted using
                            SSL protocol. We never share or sell your details.
                        </p>
                        <div class="space-y-1">
                            <p class="text-xs text-gray-400 flex items-center gap-1">
                                <span style="color: var(--brand)">✓</span>Free cancellations up
                                to 24hrs before pickup
                            </p>
                            <p class="text-xs text-gray-400 flex items-center gap-1">
                                <span style="color: var(--brand)">✓</span>Prices include VAT and
                                local taxes
                            </p>
                        </div>
                    </div>
                    <!-- ── SIDEBAR: DATA PROTECTION END ── -->
                </div>
                <!-- ── RIGHT SIDEBAR END ── -->
            </div>
        </div>
        <!-- ╔══════════════════════════════════════╗ -->
        <!-- ║           MAIN CONTENT END           ║ -->
        <!-- ╚══════════════════════════════════════╝ -->

        <!-- ╔══════════════════════════════════════╗ -->
        <!-- ║          SUCCESS MODAL START         ║ -->
        <!-- ╚══════════════════════════════════════╝ -->
        <div id="successModal" class="fixed inset-0 bg-[#00000099] z-200 items-center justify-center"
            style="display: none !important;">
            <div class="bg-white text-center rounded-[24px] p-[40px] max-w-[420px] w-[90%]">
                <div class="w-[72px] h-[72px] bg-[#f0c040] rounded-[50%] text-[30px]"
                    style="display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    ✓
                </div>
                <h2 class="text-[26px] font-bold mb-[8px]">
                    Booking Confirmed!
                </h2>
                <p class="text-[14px] text-[#6b7280] mb-[20px]">
                    Your ride has been booked successfully. You'll receive a confirmation
                    shortly.
                </p>
                <div class="bg-[#fafaf2] rounded-[12px] p-[16px] mb-[20px] text-left">
                    <div class="mb-[8px]" style="display: flex; justify-content: space-between;">
                        <span class="text-[13px] text-[#888]">Booking ID</span>
                        <span class="text-[13px] font-semibold">#RS-2026-0043</span>
                    </div>
                    <div class="mb-[8px]" style="display: flex; justify-content: space-between;">
                        <span class="text-[13px] text-[#888]">
                            Vehicle
                        </span>
                        <span class="text-[13px] font-semibold" id="modal-vehicle">
                            Comfort · Chevrolet Malibu
                        </span>
                    </div>
                    <div class="mb-[8px]" style="display: flex; justify-content: space-between;">
                        <span class="text-[13px] text-[#888]">
                            Passengers
                        </span>
                        <span class="text-[13px] font-semibold" id="modal-pax">
                            1 Adult
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between">
                        <span class="text-[13px] text-[#888]">Total</span>
                        <span class="text-[14px] text-[#e6b800] font-semibold" id="modal-total">
                            AED 113.14
                        </span>
                    </div>
                </div>
                <button onclick="document.getElementById('successModal').style.display = 'none'"
                    class="w-full p-[14px] bg-[#1a1500] text-white border-0 rounded-[12px] text-[15px] font-semibold"
                    style="letter-spacing: 1px; cursor: pointer;">
                    VIEW MY BOOKINGS
                </button>
            </div>
        </div>
        <!-- ╔══════════════════════════════════════╗ -->
        <!-- ║           SUCCESS MODAL END          ║ -->
        <!-- ╚══════════════════════════════════════╝ -->
    </section>
@endsection

@push('head')
    <link rel="stylesheet" href="{{ asset('assets/css/book-ride.css') }}" />
@endpush

@push('body')
    <script src="{{ asset('assets/js/book-ride.js') }}"></script>
@endpush
