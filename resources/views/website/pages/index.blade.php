@extends('website.app')
@section('content')
    <!-- hero-section-starts -->
    <section class="hero-section">
        <!-- hero-image-and-overlay -->
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <!-- hero-image-and-overlay -->

        <div class="hero-inner">
            <!-- hero-left-section -->
            <div class="hero-left">
                <div class="badge-pill">
                    <i class="bi bi-star-fill" style="font-size: 10px"></i>
                    Trusted by 10,000+ passengers nationwide
                </div>
                <h1>
                    Enhance your<br />
                    experience by&nbsp;<span class="cycle-wrap">
                        <span class="cycle-text" id="cycleWord">CITY TOUR</span>
                    </span>
                </h1>
                <p>
                    Where every ride is yours to command. Whether you need ondemand
                    rides, hourly booking, or a city tour we've got you covered. Ride in
                    comfort, explore with ease, and travel your way in peace.
                </p>
                <div class="hero-buttons">
                    <a href="{{ url('book-now') }}" class="get-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10m.47-13.53a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H8a.75.75 0 0 1 0-1.5h6.19l-1.72-1.72a.75.75 0 0 1 0-1.06"
                                clip-rule="evenodd" />
                        </svg>
                        &nbsp; Book Now
                    </a>
                    <a href="{{ url('contact-us') }}" class="watch-btn">
                        <div class="play-icon">
                            <svg width="1.4em" height="1.4em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 9H17M10 13H17M7 9H7.01M7 13H7.01M21 20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20Z"
                                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        Contact us
                    </a>
                </div>
            </div>
            <!-- hero-left-section -->
            <!-- hero-right-section -->
            <div class="hero-right">
                <div class="booking-card">
                    <div class="bk-tabs">
                        <button class="bk-tab active" onclick="switchTab(this, 'rides')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" viewBox="0 0 48 48">
                                <path d="M0 0h48v48H0z" fill="none" />
                                <path fill="currentColor"
                                    d="M36.207 34.101c-3.447 3.891-7.305 6.554-9.113 7.7a5.77 5.77 0 0 1-6.188 0c-1.808-1.146-5.666-3.809-9.113-7.7a34 34 0 0 1-1.877-2.31q-.04 0-.08.004c-1.711.096-3.298 1.043-4.103 2.643a35 35 0 0 0-2.533 6.67c-.703 2.651 1.276 5.038 3.875 5.144c2.893.118 8.088.248 16.926.248s14.033-.13 16.925-.248c2.6-.106 4.579-2.493 3.875-5.143a35 35 0 0 0-2.532-6.671c-.806-1.6-2.392-2.547-4.104-2.643l-.081-.005a34 34 0 0 1-1.877 2.311" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M8 18.07C8 9.2 15.16 2 24 2s16 7.2 16 16.07c0 5.66-2.858 10.453-6.038 14.041c-3.186 3.597-6.785 6.086-8.474 7.157a2.77 2.77 0 0 1-2.975 0c-1.69-1.071-5.288-3.56-8.475-7.157C10.858 28.523 8 23.73 8 18.07M24 24a6 6 0 1 0 0-12a6 6 0 0 0 0 12"
                                    clip-rule="evenodd" />
                            </svg>
                            Rides
                        </button>
                        <button class="bk-tab" onclick="switchTab(this, 'hourly')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <g fill="none" fill-rule="evenodd">
                                    <path
                                        d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                    <path fill="currentColor"
                                        d="M17.03 14.758a1 1 0 0 1 1.962.37l-.022.115L18.28 18H19v-1a1 1 0 0 1 1.993-.116L21 17v1a1 1 0 0 1 .117 1.993L21 20v1a1 1 0 0 1-1.993.117L19 21v-1h-2a1 1 0 0 1-.993-1.113l.023-.13zM13.5 14a2.5 2.5 0 0 1 2.5 2.5v.325c0 .675-.241 1.327-.68 1.839L14.174 20H15a1 1 0 0 1 0 2h-3a1 1 0 0 1-.76-1.65l2.561-2.988a.83.83 0 0 0 .199-.537V16.5a.5.5 0 1 0-1 0a1 1 0 1 1-2 0a2.5 2.5 0 0 1 2.5-2.5M12 3a9 9 0 0 1 8.796 10.913a3 3 0 0 0-2.068-1.823a3 3 0 0 0-2.724.67A4.5 4.5 0 0 0 9 16.5c0 .886.384 1.682.994 2.23l-.272.318a3 3 0 0 0-.68 1.455A9 9 0 0 1 12 3m-1 3a1 1 0 0 0-1 1v3H9a1 1 0 1 0 0 2h2a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1" />
                                </g>
                            </svg>
                            Book Hourly
                        </button>
                        <button class="bk-tab" onclick="switchTab(this, 'city')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48">
                                <path d="M0 0h48v48H0z" fill="none" />
                                <defs>
                                    <mask id="SVGYReMxexd">
                                        <g fill="none" stroke-linejoin="round" stroke-width="4">
                                            <path stroke="#fff" stroke-linecap="round" d="M4 42h40" />
                                            <rect width="12" height="20" x="8" y="22" fill="#fff" stroke="#fff"
                                                rx="2" />
                                            <rect width="20" height="38" x="20" y="4" fill="#fff" stroke="#fff"
                                                rx="2" />
                                            <path stroke="#000" stroke-linecap="round"
                                                d="M28 32.008h4m-20 0h4m12-9h4m-4-9h4" />
                                        </g>
                                    </mask>
                                </defs>
                                <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#SVGYReMxexd)" />
                            </svg>
                            City Tour
                        </button>
                    </div>

                    <!-- ── RIDES ── -->
                    <form action="{{route('booking.start')}}" method="POST" class="bk-body" id="tab-rides">
                        @csrf
                        <div class="bk-field" style="position: relative;">
                            <div class="bk-field-icon pickup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48">
                                    <path d="M0 0h48v48H0z" fill="none" />
                                    <path fill="currentColor" stroke="currentColor" stroke-width="4"
                                        d="M24 33a9 9 0 1 0 0-18a9 9 0 0 0 0 18Z" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Enter Pick Up Location" class="bk-input"
                                id="r-pickup-input" autocomplete="off" />
                            <input type="hidden" id="r-pickup-id" name="pickup_location" />
                            <div class="bk-suggestions" id="r-pickup-suggestions"></div>
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon dropoff">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M5.672 4.095a9.017 9.017 0 0 1 12.627-.03h.002l.032.03c3.545 3.487 3.552 9.088.042 12.54l-5.671 5.578a1 1 0 0 1-1.403 0L5.63 16.635a8.74 8.74 0 0 1 0-12.499zM12 6.5a3 3 0 1 0 0 6a3 3 0 0 0 0-6"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <select class="bk-input bk-select" id="r-dropoff" disabled name="dropoff_location" >
                                <option value="">Select pick up first</option>
                            </select>
                        </div>
                        <button class="bk-add-stop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path fill="currentColor"
                                    d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z" />
                            </svg>
                            Add Stop
                        </button>
                        <div class="bk-row-2">
                            <div class="bk-field bk-half">
                                <div class="bk-field-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                        viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <g fill="none">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M2 12c0-3.771 0-5.657 1.172-6.828S6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172S22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14z" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                                d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                                            <path fill="currentColor"
                                                d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                        </g>
                                    </svg>
                                </div>
                                <input type="date" class="bk-input" id="r-date" name="date" />
                            </div>
                            <div class="bk-field bk-half">
                                <div class="bk-field-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                        viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0m9 0l3-2m-3-3v5" />
                                    </svg>
                                </div>
                                <input type="time" class="bk-input" id="r-time" name="time" />
                            </div>
                        </div>
                        {{-- <div class="bk-promo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path fill="currentColor"
                                    d="M11.172 2a3 3 0 0 1 2.121.879l7.71 7.71a3.41 3.41 0 0 1 0 4.822l-5.592 5.592a3.41 3.41 0 0 1-4.822 0l-7.71-7.71A3 3 0 0 1 2 11.172V6a4 4 0 0 1 4-4zM7.5 5.5a2 2 0 0 0-1.995 1.85L5.5 7.5a2 2 0 1 0 2-2" />
                            </svg>
                            <span>GET <strong>35% OFF</strong> ON RETURN RIDE!</span>
                            <button class="bk-promo-add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="0.9em" height="0.9em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                                        <path
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12m10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16" />
                                        <path
                                            d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4z" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                    viewBox="0 0 16 16">
                                    <path d="M0 0h16v16H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M8.5 4.5a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0m2.4 7.506c.11.542-.348.994-.9.994H2c-.553 0-1.01-.452-.902-.994a5.002 5.002 0 0 1 9.803 0M14.002 12h-1.59a3 3 0 0 0-.04-.29a6.5 6.5 0 0 0-1.167-2.603a3 3 0 0 1 3.633 1.911c.18.522-.283.982-.836.982M12 8a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                </svg>
                            </div>
                            <select class="bk-input bk-select" id="r-passengers">
                                <option value="1">1 Passenger</option>
                                <option value="2">2 Passengers</option>
                                <option value="3">3 Passengers</option>
                                <option value="4">4 Passengers</option>
                            </select>
                        </div> --}}
                        <button type="submit" class="bk-submit">
                            <i class="bi bi-search"></i> Check Fare
                        </button>
                    </form>

                    <!-- ── BOOK HOURLY ── -->
                    <div class="bk-body" id="tab-hourly" style="display: none">
                        <div class="bk-field">
                            <div class="bk-field-icon pickup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M5.672 4.095a9.017 9.017 0 0 1 12.627-.03h.002l.032.03c3.545 3.487 3.552 9.088.042 12.54l-5.671 5.578a1 1 0 0 1-1.403 0L5.63 16.635a8.74 8.74 0 0 1 0-12.499zM12 6.5a3 3 0 1 0 0 6a3 3 0 0 0 0-6"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Enter Pick Up Location" class="bk-input" />
                        </div>
                        <div class="bk-label-row">
                            <div class="bk-label-col">
                                <label>Pickup Date</label>
                                <div class="bk-field">
                                    <div class="bk-field-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                            viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <g fill="none">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M2 12c0-3.771 0-5.657 1.172-6.828S6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172S22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14z" />
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                                    d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                                                <path fill="currentColor"
                                                    d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                            </g>
                                        </svg>
                                    </div>
                                    <input type="date" class="bk-input" id="h-date" />
                                </div>
                            </div>
                            <div class="bk-label-col">
                                <label>Pickup Time</label>
                                <div class="bk-field">
                                    <div class="bk-field-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                            viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0m9 0l3-2m-3-3v5" />
                                        </svg>
                                    </div>
                                    <input type="time" class="bk-input" id="h-time" />
                                </div>
                            </div>
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                    viewBox="0 0 512 512">
                                    <path d="M0 0h512v512H0z" fill="none" />
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="32"
                                        d="M145.61 464h220.78c19.8 0 35.55-16.29 33.42-35.06C386.06 308 304 310 304 256s83.11-51 95.8-172.94c2-18.78-13.61-35.06-33.41-35.06H145.61c-19.8 0-35.37 16.28-33.41 35.06C124.89 205 208 201 208 256s-82.06 52-95.8 172.94c-2.14 18.77 13.61 35.06 33.41 35.06" />
                                    <path fill="currentColor"
                                        d="M343.3 432H169.13c-15.6 0-20-18-9.06-29.16C186.55 376 240 356.78 240 326V224c0-19.85-38-35-61.51-67.2c-3.88-5.31-3.49-12.8 6.37-12.8h142.73c8.41 0 10.23 7.43 6.4 12.75C310.82 189 272 204.05 272 224v102c0 30.53 55.71 47 80.4 76.87c9.95 12.04 6.47 29.13-9.1 29.13" />
                                </svg>
                            </div>
                            <select class="bk-input bk-select">
                                <option value="">Select Duration</option>
                                <option>1 Hour</option>
                                <option>2 Hours</option>
                                <option>3 Hours</option>
                                <option>4 Hours</option>
                                <option>6 Hours</option>
                                <option>8 Hours</option>
                            </select>
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                    viewBox="0 0 16 16">
                                    <path d="M0 0h16v16H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M8.5 4.5a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0m2.4 7.506c.11.542-.348.994-.9.994H2c-.553 0-1.01-.452-.902-.994a5.002 5.002 0 0 1 9.803 0M14.002 12h-1.59a3 3 0 0 0-.04-.29a6.5 6.5 0 0 0-1.167-2.603a3 3 0 0 1 3.633 1.911c.18.522-.283.982-.836.982M12 8a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                </svg>
                            </div>
                            <select class="bk-input bk-select">
                                <option value="">Select Passengers</option>
                                <option>1 Passenger</option>
                                <option>2 Passengers</option>
                                <option>3 Passengers</option>
                                <option>4 Passengers</option>
                            </select>
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="m12 17l1-2V9.858c1.721-.447 3-2 3-3.858c0-2.206-1.794-4-4-4S8 3.794 8 6c0 1.858 1.279 3.411 3 3.858V15z" />
                                    <path fill="currentColor"
                                        d="m16.267 10.563l-.533 1.928C18.325 13.207 20 14.584 20 16c0 1.892-3.285 4-8 4s-8-2.108-8-4c0-1.416 1.675-2.793 4.267-3.51l-.533-1.928C4.197 11.54 2 13.623 2 16c0 3.364 4.393 6 10 6s10-2.636 10-6c0-2.377-2.197-4.46-5.733-5.437" />
                                </svg>
                            </div>
                            <select class="bk-input bk-select">
                                <option value="">Select City (Optional)</option>
                                <option>Karachi</option>
                                <option>Lahore</option>
                                <option>Islamabad</option>
                            </select>
                        </div>
                        <button class="bk-submit">
                            <i class="bi bi-search"></i> Check Fare
                        </button>
                    </div>

                    <!-- ── CITY TOUR ── -->
                    <div class="bk-body" id="tab-city" style="display: none">
                        <div class="bk-field">
                            <div class="bk-field-icon pickup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 48 48">
                                    <path d="M0 0h48v48H0z" fill="none" />
                                    <path fill="currentColor" stroke="currentColor" stroke-width="4"
                                        d="M24 33a9 9 0 1 0 0-18a9 9 0 0 0 0 18Z" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Enter Pick Up Location" class="bk-input" />
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon dropoff">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M5.672 4.095a9.017 9.017 0 0 1 12.627-.03h.002l.032.03c3.545 3.487 3.552 9.088.042 12.54l-5.671 5.578a1 1 0 0 1-1.403 0L5.63 16.635a8.74 8.74 0 0 1 0-12.499zM12 6.5a3 3 0 1 0 0 6a3 3 0 0 0 0-6"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Enter drop off location" class="bk-input" />
                        </div>
                        <div class="bk-label-row">
                            <div class="bk-label-col">
                                <label>Pickup Date</label>
                                <div class="bk-field">
                                    <div class="bk-field-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <g fill="none">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M2 12c0-3.771 0-5.657 1.172-6.828S6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172S22 8.229 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14z" />
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                                    d="M7 4V2.5M17 4V2.5M2.5 9h19" />
                                                <path fill="currentColor"
                                                    d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                            </g>
                                        </svg>
                                    </div>
                                    <input type="date" class="bk-input" id="t-date" />
                                </div>
                            </div>
                            <div class="bk-label-col">
                                <label>Pickup Time</label>
                                <div class="bk-field">
                                    <div class="bk-field-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0m9 0l3-2m-3-3v5" />
                                        </svg>
                                    </div>
                                    <input type="time" class="bk-input" id="t-time" />
                                </div>
                            </div>
                        </div>
                        <div class="bk-field">
                            <div class="bk-field-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                    viewBox="0 0 16 16">
                                    <path d="M0 0h16v16H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M8.5 4.5a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0m2.4 7.506c.11.542-.348.994-.9.994H2c-.553 0-1.01-.452-.902-.994a5.002 5.002 0 0 1 9.803 0M14.002 12h-1.59a3 3 0 0 0-.04-.29a6.5 6.5 0 0 0-1.167-2.603a3 3 0 0 1 3.633 1.911c.18.522-.283.982-.836.982M12 8a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                </svg>
                            </div>
                            <select class="bk-input bk-select">
                                <option value="">Select Passengers</option>
                                <option>1 Passenger</option>
                                <option>2 Passengers</option>
                                <option>3 Passengers</option>
                                <option>4 Passengers</option>
                            </select>
                        </div>
                        <div class="bk-row-2">
                            <div class="bk-field bk-half">
                                <div class="bk-field-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                        viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <path fill="currentColor"
                                            d="m12 17l1-2V9.858c1.721-.447 3-2 3-3.858c0-2.206-1.794-4-4-4S8 3.794 8 6c0 1.858 1.279 3.411 3 3.858V15z" />
                                        <path fill="currentColor"
                                            d="m16.267 10.563l-.533 1.928C18.325 13.207 20 14.584 20 16c0 1.892-3.285 4-8 4s-8-2.108-8-4c0-1.416 1.675-2.793 4.267-3.51l-.533-1.928C4.197 11.54 2 13.623 2 16c0 3.364 4.393 6 10 6s10-2.636 10-6c0-2.377-2.197-4.46-5.733-5.437" />
                                    </svg>
                                </div>
                                <select class="bk-input bk-select" style="font-size: 11.5px">
                                    <option value="">Select City</option>
                                    <option>Karachi</option>
                                    <option>Lahore</option>
                                    <option>Islamabad</option>
                                </select>
                            </div>
                            <div class="bk-field bk-half">
                                <div class="bk-field-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em"
                                        viewBox="0 0 512 512">
                                        <path d="M0 0h512v512H0z" fill="none" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32"
                                            d="M145.61 464h220.78c19.8 0 35.55-16.29 33.42-35.06C386.06 308 304 310 304 256s83.11-51 95.8-172.94c2-18.78-13.61-35.06-33.41-35.06H145.61c-19.8 0-35.37 16.28-33.41 35.06C124.89 205 208 201 208 256s-82.06 52-95.8 172.94c-2.14 18.77 13.61 35.06 33.41 35.06" />
                                        <path fill="currentColor"
                                            d="M343.3 432H169.13c-15.6 0-20-18-9.06-29.16C186.55 376 240 356.78 240 326V224c0-19.85-38-35-61.51-67.2c-3.88-5.31-3.49-12.8 6.37-12.8h142.73c8.41 0 10.23 7.43 6.4 12.75C310.82 189 272 204.05 272 224v102c0 30.53 55.71 47 80.4 76.87c9.95 12.04 6.47 29.13-9.1 29.13" />
                                    </svg>
                                </div>
                                <select class="bk-input bk-select" style="font-size: 11.5px">
                                    <option value="">Select Hours</option>
                                    <option>2 Hours</option>
                                    <option>4 Hours</option>
                                    <option>6 Hours</option>
                                    <option>8 Hours</option>
                                </select>
                            </div>
                        </div>
                        <button class="bk-submit">
                            <i class="bi bi-search"></i> Check Fare
                        </button>
                    </div>
                </div>
            </div>
            <!-- hero-right-section -->
        </div>
    </section>
    <!-- hero-section-ends -->

    <!-- services-section-starts -->
    <section class="relative py-20 px-20 bg-white overflow-hidden">
        <div class="relative text-center mb-12" style="animation-delay: 0s">
            <p class="inline-flex items-center gap-2 mb-3 font-semibold uppercase tracking-[.22em]"
                style="font-size: 0.7rem; color: #e6b800">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                    <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                </svg>
                Go Anywhere with RoyalSeatLuxury
                <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                    <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                </svg>
            </p>
            <h2 class="font-bold leading-none text-black !text-[45px]" style="letter-spacing: -0.01em">
                Explore Our&nbsp;<span class="text-[#e6b800]">Services</span>
            </h2>
        </div>

        <div class="relative grid grid-cols-1 lg:grid-cols-12 gap-4">
            <!-- ── Left Section ── -->
            <div class="lg:col-span-8">
                <!-- Cards Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 items-start">
                    <!-- Card 1 · Rides -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img1.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Rides
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Comfortable and reliable transportation at your fingertips.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 2 · Airport Rides -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img2.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Airport Rides
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Comfortable and reliable transportation at your fingertips.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 3 · City Tour -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img3.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            City Tour
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Comfortable and reliable transportation at your fingertips.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 4 · Rides for Business -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img4.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Rides for Business
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Executive rides designed for efficiency and professionalism.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 5 · Luxury Car Rentals -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img5.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Luxury Car Rentals
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Travel in style and comfort with our premium fleet.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 6 · Full Day Chauffeur -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img6.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Full Day Chauffeur
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Dedicated drivers for your entire day, any occasion.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 7 · Courier Service -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img7.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Courier Service
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Swift and secure delivery with real-time is the ace desert
                            tracking.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                    <!-- Card 8 · Desert Safari -->
                    <div class="svc-card fu rounded-2xl flex flex-col items-center text-center p-4 cursor-pointer"
                        style="animation-delay: 0.08s">
                        <div class="icon-bg w-20 h-20 rounded-xl flex items-center justify-center mb-3 p-2"
                            style="background: #2a2200">
                            <img src="{{ asset('assets/images/services/ourService_img8.png') }}" alt="" />
                        </div>
                        <h3 class="hf font-bold uppercase text-gray-900 mb-1"
                            style="font-size: 1rem; letter-spacing: 0.03em">
                            Desert Safari
                        </h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: rgba(0, 0, 0, 0.55)">
                            Unforgettable adventures in the majestic of the Arabian desert.
                        </p>
                        <a href="{{ url('book-now') }}" class="book-btn">Book Now</a>
                    </div>
                </div>
                <!-- /cards grid -->
            </div>
            <!-- /left section -->

            <!-- ── Right Section ── -->
            <div class="lg:col-span-4">
                <div class="promo-card fu rounded-2xl overflow-hidden relative flex flex-col h-full min-h-[300px]"
                    style="animation-delay: 0.06s">
                    <!-- TOP: photo -->
                    <div class="relative flex-none" style="height: 44%">
                        <img src="https://www.cnet.com/a/img/resize/c1a64e3b684ff410a1ddf790db043b3c3ff46a1a/hub/2018/11/08/8d5d245a-7f16-43e2-a885-d376734fbc95/uberpool-pr-photo.jpg?auto=webp&fit=crop&height=675&width=1200"
                            alt="Luxury ride interior" class="w-full h-full object-cover object-center"
                            style="filter: brightness(0.75)" />
                        <!-- gradient fade into black -->
                        <div class="absolute inset-0"
                            style="
                  background: linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.05) 30%,
                    #0d0d0d 100%
                  );
                ">
                        </div>
                        <!-- Limited Offer pill -->
                        <div class="absolute top-4 left-4">
                            <span class="promo-pill">Limited Offer</span>
                        </div>
                        <!-- 30% OFF badge -->
                        <div class="absolute bottom-5 right-5">
                            <div class="promo-discount-badge ">
                                <span class="promo-percent text-white">30%</span>
                                <span class="promo-off text-white">OFF</span>
                            </div>
                        </div>
                    </div>

                    <!-- BOTTOM: black content -->
                    <div class="relative flex-1 flex flex-col px-6 pt-5 pb-6" style="background: #0d0d0d">
                        <!-- glow -->
                        <div class="pointer-events-none absolute top-0 right-0 w-40 h-40 rounded-full"
                            style="
                  background: radial-gradient(
                    circle,
                    rgba(230, 184, 0, 0.12) 0%,
                    transparent 70%
                  );
                  transform: translate(30%, -30%);
                ">
                        </div>

                        <!-- gold accent bar -->
                        <div
                            style="
                  width: 38px;
                  height: 3px;
                  background: linear-gradient(90deg, #e6b800, transparent);
                  border-radius: 2px;
                  margin-bottom: 14px;
                ">
                        </div>

                        <h3
                            style="
                  font-size: 1.80rem;
                  font-weight: 900;
                  letter-spacing: -0.02em;
                  line-height: 1.05;
                  color: #fff;
                  text-transform: uppercase;
                  margin-bottom: 8px;
                ">
                            Arrive In <span class="shimmer">Style</span>
                        </h3>
                        <p
                            style="
                  font-size: 12px;
                  line-height: 1.7;
                  color: rgba(255, 255, 255, 0.45);
                  margin-bottom: 15px;
                ">
                            We turn every trip into a memorable adventure. Premium
                            experience at the best price, every ride.
                        </p>

                        <!-- stats row -->
                        <div class="promo-stats">
                            <div class="promo-stat">
                                <span class="promo-stat-val">10K+</span>
                                <span class="promo-stat-lbl">Happy Rides</span>
                            </div>
                            <div class="promo-stat-sep"></div>
                            <div class="promo-stat">
                                <span class="promo-stat-val">4.9 ★</span>
                                <span class="promo-stat-lbl">Avg Rating</span>
                            </div>
                            <div class="promo-stat-sep"></div>
                            <div class="promo-stat">
                                <span class="promo-stat-val">24/7</span>
                                <span class="promo-stat-lbl">Available</span>
                            </div>
                        </div>

                        <a href="{{ url('book-now') }}" class="pulse-btn promo-book-btn">Book Now →</a>
                    </div>
                </div>
                <!-- /promo card -->
            </div>
            <!-- /right section -->
        </div>
        <!-- /grid -->
    </section>
    <!-- services-section-ends -->

    <!-- fleet-section-starts -->
    <section class="fleet-section pt-20 pb-20 px-20">
        <div class="fleet-wrapper">
            <div class="grid lg:grid-cols-2 gap-8 xl:gap-10 items-center">
                <!-- LEFT -->
                <div>
                    <!-- COMFORT -->
                    <div class="fleet-show active" id="comfort">
                        <div class="main-car bg-white rounded-[20px] overflow-hidden shadow-xl">
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?q=80&w=1400&auto=format&fit=crop"
                                    class="main-image w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover" />
                            </div>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl lg:text-[30px] font-bold text-slate-900">
                                            Comfort Class
                                        </h2>

                                        <p class="text-slate-500 mt-1 text-sm">
                                            Smooth daily rides
                                        </p>
                                    </div>

                                    <div
                                        class="bg-[var(--brand)] text-black px-3 py-1.5 rounded-full text-[11px] font-semibold">
                                        Comfort
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-3">
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Sonata</h4>

                                        <p class="text-[11px] text-slate-500">Comfort Sedan</p>
                                    </div>

                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Altima</h4>

                                        <p class="text-[11px] text-slate-500">Smooth Drive</p>
                                    </div>

                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1502161254066-6c74afbf07aa?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Maxima</h4>

                                        <p class="text-[11px] text-slate-500">Premium Comfort</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BUSINESS -->
                    <div class="fleet-show" id="business">
                        <div class="main-car bg-white rounded-[20px] overflow-hidden shadow-xl">
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?q=80&w=1400&auto=format&fit=crop"
                                    class="main-image w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover" />
                            </div>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl lg:text-[30px] font-bold text-slate-900">
                                            Business Class
                                        </h2>

                                        <p class="text-slate-500 mt-1 text-sm">
                                            Executive luxury rides
                                        </p>
                                    </div>

                                    <div
                                        class="bg-[var(--brand)] text-black px-3 py-1.5 rounded-full text-[11px] font-semibold">
                                        Business
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-3">
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">BMW</h4>

                                        <p class="text-[11px] text-slate-500">Executive Sedan</p>
                                    </div>

                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Lexus</h4>

                                        <p class="text-[11px] text-slate-500">Luxury Ride</p>
                                    </div>

                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Mercedes</h4>

                                        <p class="text-[11px] text-slate-500">Premium Class</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SUV -->
                    <div class="fleet-show" id="suv">
                        <div class="main-car bg-white rounded-[20px] overflow-hidden shadow-xl">
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?q=80&w=1400&auto=format&fit=crop"
                                    class="main-image w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover" />
                            </div>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl lg:text-[30px] font-bold text-slate-900">
                                            SUV Collection
                                        </h2>

                                        <p class="text-slate-500 mt-1 text-sm">
                                            Spacious luxury SUVs
                                        </p>
                                    </div>

                                    <div
                                        class="bg-[var(--brand)] text-black px-3 py-1.5 rounded-full text-[11px] font-semibold">
                                        SUV
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-3">
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c?q=80&w=500&auto=format&fit=crop"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">Luxury SUV</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1555353540-64580b51c258?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGNhciUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">Luxury SUV</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1612544448445-b8232cff3b6c?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">Luxury SUV</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- VIP -->
                    <div class="fleet-show" id="vip">
                        <div class="main-car bg-white rounded-[20px] overflow-hidden shadow-xl">
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y2FyfGVufDB8fDB8fHww"
                                    class="main-image w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover" />
                            </div>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl lg:text-[30px] font-bold text-slate-900">
                                            VIP Collection
                                        </h2>

                                        <p class="text-slate-500 mt-1 text-sm">VIP luxury</p>
                                    </div>

                                    <div
                                        class="bg-[var(--brand)] text-black px-3 py-1.5 rounded-full text-[11px] font-semibold">
                                        VIP
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-3">
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1542362567-b07e54358753?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2FyfGVufDB8fDB8fHww"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">VIP</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://plus.unsplash.com/premium_photo-1686730540277-c7e3a5571553?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Y2FyfGVufDB8fDB8fHww"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">VIP</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGNhcnxlbnwwfHwwfHx8MA%3D%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">VIP</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EX SUV -->
                    <div class="fleet-show" id="exsuv">
                        <div class="main-car bg-white rounded-[20px] overflow-hidden shadow-xl">
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?q=80&w=1400&auto=format&fit=crop"
                                    class="main-image w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover" />
                            </div>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl lg:text-[30px] font-bold text-slate-900">
                                            EX-SUV
                                        </h2>

                                        <p class="text-slate-500 mt-1 text-sm">
                                            Extra luxury SUVs
                                        </p>
                                    </div>

                                    <div
                                        class="bg-[var(--brand)] text-black px-3 py-1.5 rounded-full text-[11px] font-semibold">
                                        EX-SUV
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1758411898226-5b91498e87e0?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8Y2FyJTIwZXglMkZzdXZ8ZW58MHx8MHx8fDA%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">Luxury EX/SUV</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1738139997601-5d610c8252bd?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGNhciUyMGV4JTJGc3V2fGVufDB8fDB8fHww"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">Luxury EX/SUV</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1588407102159-f835f6c13ef0?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y2FyJTIwZXglMkZzdXZ8ZW58MHx8MHx8fDA%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">Luxury EX/SUV</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MINI VAN -->
                    <div class="fleet-show" id="minivan">
                        <div class="main-car bg-white rounded-[20px] overflow-hidden shadow-xl">
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1653978681856-ab2f1feb221b?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzV8fG1pbmklMjB2YW4lMjBjYXJ8ZW58MHx8MHx8fDA%3D"
                                    class="main-image w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover" />
                            </div>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl lg:text-[30px] font-bold text-slate-900">
                                            MINI VAN
                                        </h2>

                                        <p class="text-slate-500 mt-1 text-sm">
                                            Extra luxury MINI VAN
                                        </p>
                                    </div>

                                    <div
                                        class="bg-[var(--brand)] text-black px-3 py-1.5 rounded-full text-[11px] font-semibold">
                                        MINI VAN
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1640091775947-4da06f426114?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fG1pbmklMjB2YW4lMjBjYXJ8ZW58MHx8MHx8fDA%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">MINI VAN Luxury</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1724479839764-65981526641d?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fG1pbmklMjB2YW4lMjBjYXJ8ZW58MHx8MHx8fDA%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">MINI VAN Luxury</p>
                                    </div>
                                    <div class="mini-card bg-[rgba(230,184,0,.08)] rounded-[22px] p-3">
                                        <img src="https://images.unsplash.com/photo-1774013842615-807f5eb16d90?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fG1pbmklMjB2YW4lMjBjYXJ8ZW58MHx8MHx8fDA%3D"
                                            class="w-full h-20 object-cover rounded-xl mb-2" />

                                        <h4 class="font-semibold text-sm">Range Rover</h4>

                                        <p class="text-[11px] text-slate-500">MINI VAN Luxury</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RIGHT -->
                <div>
                    <div class="relative" data-reveal>
                        <p class="inline-flex items-center gap-2 mb-3 font-semibold uppercase tracking-[.22em]"
                            style="font-size: 0.7rem; color: #e6b800">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                                <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                            </svg>
                            Discover Your Perfect Ride
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                                <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                            </svg>
                        </p>
                        <h2 class="font-bold leading-none text-black !text-[46px]" style="letter-spacing: -0.01em">
                            Explore Our&nbsp;<span style="color: #e6b800">Fleet</span>
                        </h2>
                        <p class="text-gray-700 font-medium text-sm lg:text-[15px] leading-7 mt-3 max-w-lg">
                            Experience premium chauffeur services with luxury vehicles built
                            for comfort, business, airport transfers and VIP journeys.
                        </p>
                    </div>

                    <!-- BUTTONS -->
                    <div class="grid grid-cols-2 gap-3 mt-8">
                        <!-- COMFORT -->
                        <button class="thumb-btn active rounded-[16px] p-3" data-target="comfort">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?q=80&w=400&auto=format&fit=crop"
                                    class="w-16 h-14 object-cover rounded-xl" />

                                <div class="text-left">
                                    <h3 class="text-sm lg:text-base font-bold">Comfort</h3>

                                    <span class="text-[11px] text-slate-500">
                                        View Vehicles
                                    </span>
                                </div>
                            </div>
                        </button>

                        <!-- BUSINESS -->
                        <button class="thumb-btn rounded-[16px] p-3" data-target="business">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=400&auto=format&fit=crop"
                                    class="w-16 h-14 object-cover rounded-xl" />

                                <div class="text-left">
                                    <h3 class="text-sm lg:text-base font-bold">Business</h3>

                                    <span class="text-[11px] text-slate-500">
                                        View Vehicles
                                    </span>
                                </div>
                            </div>
                        </button>

                        <!-- SUV -->
                        <button class="thumb-btn rounded-[16px] p-3" data-target="suv">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c?q=80&w=400&auto=format&fit=crop"
                                    class="w-16 h-14 object-cover rounded-xl" />

                                <div class="text-left">
                                    <h3 class="text-sm lg:text-base font-bold">SUV</h3>

                                    <span class="text-[11px] text-slate-500">
                                        View Vehicles
                                    </span>
                                </div>
                            </div>
                        </button>

                        <!-- VIP -->
                        <button class="thumb-btn rounded-[16px] p-3" data-target="vip">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=400&auto=format&fit=crop"
                                    class="w-16 h-14 object-cover rounded-xl" />

                                <div class="text-left">
                                    <h3 class="text-sm lg:text-base font-bold">VIP</h3>

                                    <span class="text-[11px] text-slate-500">
                                        View Vehicles
                                    </span>
                                </div>
                            </div>
                        </button>

                        <!-- EX SUV -->
                        <button class="thumb-btn rounded-[16px] p-3" data-target="exsuv">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?q=80&w=400&auto=format&fit=crop"
                                    class="w-16 h-14 object-cover rounded-xl" />

                                <div class="text-left">
                                    <h3 class="text-sm lg:text-base font-bold">EX-SUV</h3>

                                    <span class="text-[11px] text-slate-500">
                                        View Vehicles
                                    </span>
                                </div>
                            </div>
                        </button>

                        <!-- MINI VAN -->
                        <button class="thumb-btn rounded-[16px] p-3" data-target="minivan">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1705558333321-7674072a235f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjB8fG1pbmklMjB2YW4lMjBjYXJ8ZW58MHx8MHx8fDA%3D"
                                    class="w-16 h-14 object-cover rounded-xl" />

                                <div class="text-left">
                                    <h3 class="text-sm lg:text-base font-bold">Mini Van</h3>

                                    <span class="text-[11px] text-slate-500">
                                        View Vehicles
                                    </span>
                                </div>
                            </div>
                        </button>
                    </div>

                    <!-- BUTTON -->
                    <a href="{{ url('book-now') }}" class="promo-book-btn mt-4"
                        style="width: 250px !important; padding: 15px 0 !important;">
                        Book Now →
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- fleet-section-ends -->

    <!-- destination-section-starts -->
    <section class="destination-section">
        <div class="relative text-center mb-12" style="animation-delay: 0s">
            <p class="inline-flex items-center gap-2 mb-3 font-semibold uppercase tracking-[.22em]"
                style="font-size: 0.7rem; color: #e6b800">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                    <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                </svg>
                Premium UAE Destinations
                <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                    <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                </svg>
            </p>
            <h2 class="font-bold leading-none text-black !text-[46px]" style="letter-spacing: -0.01em">
                Discover Iconic&nbsp;<span style="color: #e6b800">Destinations</span>
            </h2>
            <p class="text-gray-700 font-medium text-sm lg:text-[15px] leading-7 mt-3">
                Luxury rides, city tours and unforgettable travel experiences.
            </p>
        </div>

        <!-- BUTTONS -->

        <button class="nav-btn prev-btn flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2.5" d="m14 7l-5 5m0 0l5 5" />
            </svg>
        </button>

        <button class="nav-btn next-btn flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2.5" d="m10 17l5-5m0 0l-5-5" />
            </svg>
        </button>

        <!-- SLIDER -->

        <div class="destination-wrapper">
            <div class="destination-slider pb-4" id="destinationSlider">
                <!-- CARD -->

                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Ajman</h3>

                            <p class="short-text">
                                Premium city rides and beachside comfort.
                            </p>

                            <div class="hover-content">
                                <p>Experience Ajman’s blend of tradition and luxury.</p>

                                <ul>
                                    <li>Luxury Tours</li>
                                    <li>Private Chauffeur</li>
                                    <li>Beach Resorts</li>
                                </ul>

                                <span class="price"> Starting: AED 699 </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Ajman</h3>

                            <p class="short-text">
                                Premium city rides and beachside comfort.
                            </p>

                            <div class="hover-content">
                                <p>Experience Ajman’s blend of tradition and luxury.</p>

                                <ul>
                                    <li>Luxury Tours</li>
                                    <li>Private Chauffeur</li>
                                    <li>Beach Resorts</li>
                                </ul>

                                <span class="price"> Starting: AED 699 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Ajman</h3>

                            <p class="short-text">
                                Premium city rides and beachside comfort.
                            </p>

                            <div class="hover-content">
                                <p>Experience Ajman’s blend of tradition and luxury.</p>

                                <ul>
                                    <li>Luxury Tours</li>
                                    <li>Private Chauffeur</li>
                                    <li>Beach Resorts</li>
                                </ul>

                                <span class="price"> Starting: AED 699 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Ajman</h3>

                            <p class="short-text">
                                Premium city rides and beachside comfort.
                            </p>

                            <div class="hover-content">
                                <p>Experience Ajman’s blend of tradition and luxury.</p>

                                <ul>
                                    <li>Luxury Tours</li>
                                    <li>Private Chauffeur</li>
                                    <li>Beach Resorts</li>
                                </ul>

                                <span class="price"> Starting: AED 699 </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD -->

                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Dubai</h3>

                            <p class="short-text">Luxury rides and skyline adventures.</p>

                            <div class="hover-content">
                                <p>Explore Dubai with VIP luxury transportation.</p>

                                <ul>
                                    <li>Desert Safari</li>
                                    <li>Luxury Cars</li>
                                    <li>VIP Tours</li>
                                </ul>

                                <span class="price"> Starting: AED 899 </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD -->

                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1518684079-3c830dcef090?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Ras Al Khaimah</h3>

                            <p class="short-text">Mountains, beaches and elite travel.</p>

                            <div class="hover-content">
                                <p>Enjoy breathtaking mountain roads and luxury stays.</p>

                                <ul>
                                    <li>Mountain Tours</li>
                                    <li>Beach Resorts</li>
                                    <li>VIP Transfers</li>
                                </ul>

                                <span class="price"> Starting: AED 999 </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD -->

                <div class="destination-card">
                    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200" />

                    <div class="card-overlay">
                        <div class="card-content">
                            <h3>Fujairah</h3>

                            <p class="short-text">Eastern coast luxury experience.</p>

                            <div class="hover-content">
                                <p>Relax with premium coastal rides and resorts.</p>

                                <ul>
                                    <li>Beach Tours</li>
                                    <li>Luxury Resorts</li>
                                    <li>Airport Transfers</li>
                                </ul>

                                <span class="price"> Starting: AED 799 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- destination-section-ends -->

    <!-- why-section-starts -->
    <section class="why-section">
        <div class="why-wrapper">
            <div class="why-grid">
                <!-- LEFT -->
                <div>
                    <div class="relative" data-reveal>
                        <p class="inline-flex items-center gap-2 mb-3 font-semibold uppercase tracking-[.22em]"
                            style="font-size: 0.7rem; color: #e6b800">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                                <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                            </svg>
                            WHY CHOOSE RoyalSeatLuxury
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                                <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                            </svg>
                        </p>
                        <h2 class="font-bold leading-none text-black !text-[47px]" style="letter-spacing: -0.01em">
                            WHY&nbsp;<span style="color: #e6b800">RoyalSeatLuxury?</span>
                        </h2>
                        <p class="text-gray-700 font-medium text-sm lg:text-[15px] leading-7 mt-2 max-w-xl">
                            Experience luxury chauffeur services designed for comfort,
                            professionalism and unforgettable premium journeys with first
                            class rides every single time.
                        </p>
                    </div>
                    <!-- FEATURES -->
                    <div class="feature-grid">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="m16.137 4.728l1.83 1.83C20.656 9.248 22 10.592 22 12.262c0 1.671-1.344 3.015-4.033 5.704c-2.69 2.69-4.034 4.034-5.705 4.034c-1.67 0-3.015-1.344-5.704-4.033l-1.83-1.83c-1.545-1.546-2.318-2.318-2.605-3.321c-.288-1.003-.042-2.068.45-4.197l.283-1.228c.413-1.792.62-2.688 1.233-3.302s1.51-.82 3.302-1.233l1.228-.284c2.13-.491 3.194-.737 4.197-.45c1.003.288 1.775 1.061 3.32 2.606m-4.99 9.6c-.673-.672-.668-1.638-.265-2.403a.75.75 0 0 1 1.04-1.046c.34-.18.713-.276 1.085-.272a.75.75 0 0 1-.014 1.5a.88.88 0 0 0-.609.277c-.387.387-.286.775-.177.884c.11.109.497.21.884-.177c.784-.784 2.138-1.044 3.005-.177c.673.673.668 1.639.265 2.404a.75.75 0 0 1-1.04 1.045a2.2 2.2 0 0 1-1.472.232a.75.75 0 1 1 .302-1.47c.177.037.463-.021.708-.266c.387-.388.286-.775.177-.884c-.11-.109-.497-.21-.884.177c-.784.784-2.138 1.044-3.005.176m-1.126-4.035a2 2 0 1 0-2.829-2.828a2 2 0 0 0 2.829 2.828"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <h3>Transparent Pricing</h3>

                            <p>
                                Premium rides with no hidden charges and luxury-level comfort.
                            </p>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 512 512">
                                    <path d="M0 0h512v512H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M404.7 79.78h-2.8c-7.5.26-15.8 1.73-24.8 4.3c-18 5.16-38.4 14.56-59.3 25.78c-41.9 22.4-85.8 52-121.5 68.6c-26.4 12.4-59.3 20.4-89.8 27.5s-58.95 13.4-74.36 20.6c-7.13 3.4-10.9 6.9-12.71 9.9c-1.8 2.9-2.1 5.2-1.44 8.4c1.32 6.4 8.57 15.4 18.49 21.9l3.29 2.1c162.63-2.3 289.43-13.7 387.73-52.6c2.1-17.6 6.7-34.7 16.5-48.5v-.1l.1-.1c24.5-32.2 8.9-72.58-22.4-84.89c-5-1.95-10.7-2.91-17-2.93zm21.9 185.12c-44.2 25.1-103.8 37-169.2 41.2c-68.7 4.4-143.7.1-213.52-7.8l1.89 14c31.19 3.2 98.53 11.8 172.83 11.5c77.2-.3 159.6-11.3 208.6-46.2c-.2-4.1-.4-8.3-.6-12.7m7.1 30.2c-46.9 31.5-113.8 42.9-179.9 45.8c44.7 39 89.3 55.1 127.3 59.1c45.2 4.8 81.5-8.7 94.8-19.8c13-10.8 17.5-19.5 18.3-26.2c.7-6.8-2-13.3-8.2-20.5c-11.3-13.4-33.5-26.4-52.3-38.4" />
                                </svg>
                            </div>

                            <h3>Reliable Drivers</h3>

                            <p>
                                Professional chauffeurs ensuring smooth and safe journeys.
                            </p>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M19.941 7.5L12.001 3L4.058 7.5v4.154l2.647-1.5l2.647 1.5V10.5L15.441 7l4.5 2.587zm0 9l-4.673 2.649l-4.327-2.524v-5.25l4.5-2.625l4.5 2.625zm-6.208 3.518L12 21l-3.75-2.125l1.76-.997zm-6.94-1.968l2.56-1.493v-3.088l-2.647-1.544l-2.647 1.544v3.03z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <h3>Luxury Comfort</h3>

                            <p>
                                Ride in premium class vehicles built for elegance and comfort.
                            </p>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M12 2C6.486 2 2 6.486 2 12v4.143C2 17.167 2.897 18 4 18h1a1 1 0 0 0 1-1v-5.143a1 1 0 0 0-1-1h-.908C4.648 6.987 7.978 4 12 4s7.352 2.987 7.908 6.857H19a1 1 0 0 0-1 1V18c0 1.103-.897 2-2 2h-2v-1h-4v3h6c2.206 0 4-1.794 4-4c1.103 0 2-.833 2-1.857V12c0-5.514-4.486-10-10-10" />
                                </svg>
                            </div>

                            <h3>24/7 Support</h3>

                            <p>
                                Dedicated customer service available anytime for your needs.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- RIGHT -->
                <div class="visual">
                    <!-- RINGS -->
                    <div class="ring ring1"></div>
                    <div class="ring ring2"></div>

                    <!-- CENTER IMAGE -->
                    <div class="center-image">
                        <img src="https://static3.bigstockphoto.com/9/4/3/large1500/349491118.jpg" alt="" />
                    </div>

                    <!-- FLOAT ICONS -->
                    <div class="float-icon icon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#e6b800"
                                d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.96 9.96 0 0 1-4.644-1.142l-4.29 1.117a.85.85 0 0 1-1.037-1.036l1.116-4.289A9.96 9.96 0 0 1 2 12C2 6.477 6.477 2 12 2m1.252 11H8.75l-.102.007a.75.75 0 0 0 0 1.486l.102.007h4.502l.101-.007a.75.75 0 0 0 0-1.486zm1.998-3.5h-6.5l-.102.007a.75.75 0 0 0 0 1.486L8.75 11h6.5l.102-.007a.75.75 0 0 0 0-1.486z" />
                        </svg>
                    </div>

                    <div class="float-icon icon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 256 256">
                            <path d="M0 0h256v256H0z" fill="none" />
                            <path fill="#e6b800"
                                d="M208 80H32a8 8 0 0 0-8 8v48a96.3 96.3 0 0 0 32.54 72H32a8 8 0 0 0 0 16h176a8 8 0 0 0 0-16h-24.54a96.6 96.6 0 0 0 27-40.09A40 40 0 0 0 248 128v-8a40 40 0 0 0-40-40m24 48a24 24 0 0 1-17.2 23a96 96 0 0 0 1.2-15V97.38A24 24 0 0 1 232 120ZM112 56V24a8 8 0 0 1 16 0v32a8 8 0 0 1-16 0m32 0V24a8 8 0 0 1 16 0v32a8 8 0 0 1-16 0m-64 0V24a8 8 0 0 1 16 0v32a8 8 0 0 1-16 0" />
                        </svg>
                    </div>

                    <div class="float-icon icon3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 48 48">
                            <path d="M0 0h48v48H0z" fill="none" />
                            <path fill="#e6b800" stroke="#e6b800" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="4"
                                d="M9 29a5 5 0 0 0 5-5a5 5 0 0 0 10 0a5 5 0 0 0 10 0a5 5 0 0 0 10 0c0 11.046-8.954 20-20 20S4 35.046 4 24a5 5 0 0 0 5 5m19-16a4 4 0 0 1-8 0c0-2.21 4-9 4-9s4 6.79 4 9" />
                        </svg>
                    </div>

                    <div class="float-icon icon4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#e6b800"
                                d="M10.225 20.275Q9.5 19.55 9.5 18.5t.725-1.775T12 16t1.775.725t.725 1.775t-.725 1.775T12 21t-1.775-.725m5.338-9.675q1.687.6 3.062 1.65q.5.375.513.988T18.7 14.3q-.425.425-1.05.438t-1.125-.338q-.95-.65-2.1-1.025T12 13t-2.425.375t-2.1 1.025q-.5.35-1.125.325t-1.05-.45q-.425-.45-.425-1.062t.5-.988q1.375-1.05 3.063-1.638T12 10t3.563.6m2.324-5.575q2.763 1.025 4.963 2.9q.5.425.525 1.05t-.425 1.075q-.425.425-1.05.438t-1.125-.388q-1.8-1.475-4.037-2.287T12 7t-4.737.813T3.225 10.1q-.5.4-1.125.388t-1.05-.438Q.6 9.6.625 8.975t.525-1.05q2.2-1.875 4.963-2.9T12 4t5.888 1.025" />
                        </svg>
                    </div>

                    <div class="float-icon icon5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 48 48">
                            <path d="M0 0h48v48H0z" fill="none" />
                            <path fill="#e6b800" fill-rule="evenodd"
                                d="M19.411.532a19 19 0 0 1 1.651-.075c.583 0 1.145.031 1.652.075a3.4 3.4 0 0 1 2.289 1.156c8.725 1.609 15.907 8.94 16.27 17.903l4.108 5.23a4.94 4.94 0 0 1 1.056 3.053c0 1.945-1.15 3.77-3.037 4.51c-.732.288-1.634.626-2.542.92l-.917 6.131a4.44 4.44 0 0 1-5.02 3.744l-2.15-.308v2.59a2 2 0 0 1-4 0v-4.897a2 2 0 0 1 2.283-1.98l4.435.636a.44.44 0 0 0 .496-.376l1.105-7.388a2 2 0 0 1 1.463-1.637c1.068-.284 2.347-.75 3.384-1.158c.278-.109.5-.4.5-.787a.94.94 0 0 0-.2-.583l-4.523-5.755a2 2 0 0 1-.428-1.235c0-6.554-4.847-12.359-11.334-14.279c.016.925.027 2.011.027 3.268c0 .933-.006 2.448-.015 3.442a8.837 8.837 0 0 1-1.71 15.59c2.481 2.156 5.631 3.469 8.559 3.469a2 2 0 1 1 0 4c-4.989 0-10.029-2.685-13.287-6.595a2 2 0 0 1-.292-.47a8.837 8.837 0 0 1-3.072-15.994a411 411 0 0 1-.016-3.442q.002-1.749.024-3.067C9.922 8.377 5.437 14.303 5.437 21.27c0 6.043 3.357 11.736 8.197 14.427a2 2 0 0 1 1.028 1.748v8.015a2 2 0 0 1-4 0v-6.884C5.075 34.963 1.437 28.277 1.437 21.27c0-9.5 6.658-17.44 15.561-19.433A3.4 3.4 0 0 1 19.411.532"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="float-icon icon6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#e6b800"
                                d="M10.5 15.5h3V13H16v-3h-2.5V7.5h-3V10H8v3h2.5zM12 22q-3.475-.875-5.738-3.988T4 11.1V5l8-3l8 3v6.1q0 3.8-2.262 6.913T12 22" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why-section-ends -->

    <!-- review-section-starts -->
    <section class="review-section">
        <!-- Heading -->
        <div class="relative text-center mb-14">
            <p class="inline-flex items-center gap-2 mb-4 font-semibold uppercase tracking-[.22em]"
                style="font-size: 0.7rem; color: #e6b800">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                    <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                </svg>
                Verified Client Reviews
                <svg width="10" height="10" viewBox="0 0 10 10" fill="#e6b800">
                    <polygon points="5,0 6.5,3.5 10,3.8 7.5,6.2 8.1,10 5,8.3 1.9,10 2.5,6.2 0,3.8 3.5,3.5" />
                </svg>
            </p>
            <h2 class="font-bold leading-none text-black !text-[45px]" style="letter-spacing: -0.01em">
                Real Stories,&nbsp;<span style="color: #e6b800">Real Experiences</span>
            </h2>
            <p class="text-gray-700 font-medium text-sm lg:text-[15px] leading-7 mt-3">
                Thousands of satisfied clients across the UAE trust RoyalSeatLuxury for
                premium travel.
            </p>
        </div>

        <!-- NAV BUTTONS -->
        <button class="rev-nav-btn rev-prev-btn flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2.5" d="m14 7l-5 5m0 0l5 5" />
            </svg>
        </button>
        <button class="rev-nav-btn rev-next-btn flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2.5" d="m10 17l5-5m0 0l-5-5" />
            </svg>
        </button>

        <!-- SLIDER -->
        <div class="review-wrapper">
            <div class="review-slider pb-4" id="reviewSlider">
                <!-- CARD 1 -->
                <div class="rev-card-outer">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="reviewer-avatar"
                        alt="Ahmed Al Rashid" />
                    <div class="review-card">
                        <span class="quote-icon">&#8220;</span>
                        <h4 class="reviewer-name">Ahmed Al Rashid</h4>
                        <span class="reviewer-role">Business Executive &mdash; Dubai</span>
                        <p class="review-text">
                            The best luxury transport service I have experienced in Dubai.
                            Professional, punctual, and absolutely world-class in every
                            detail.
                        </p>
                        <div class="review-stars">
                            &#9733;&#9733;&#9733;&#9733;&#9733;
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="rev-card-outer">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="reviewer-avatar"
                        alt="Sara Mohammed" />
                    <div class="review-card">
                        <span class="quote-icon">&#8220;</span>
                        <h4 class="reviewer-name">Sara Mohammed</h4>
                        <span class="reviewer-role">Travel Enthusiast &mdash; Abu Dhabi</span>
                        <p class="review-text">
                            RoyalSeatLuxury made our family trip across the UAE so comfortable and
                            stress-free. Courteous drivers and spotlessly clean vehicles
                            every time.
                        </p>
                        <div class="review-stars">
                            &#9733;&#9733;&#9733;&#9733;&#9733;
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="rev-card-outer">
                    <img src="https://randomuser.me/api/portraits/men/15.jpg" class="reviewer-avatar"
                        alt="James Mitchell" />
                    <div class="review-card">
                        <span class="quote-icon">&#8220;</span>
                        <h4 class="reviewer-name">James Mitchell</h4>
                        <span class="reviewer-role">Senior Consultant &mdash; London</span>
                        <p class="review-text">
                            As a frequent business traveler, I rely on RoyalSeatLuxury for every
                            UAE visit. The service is consistently outstanding &mdash;
                            simply unmatched.
                        </p>
                        <div class="review-stars">
                            &#9733;&#9733;&#9733;&#9733;&#9733;
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="rev-card-outer">
                    <img src="https://randomuser.me/api/portraits/women/28.jpg" class="reviewer-avatar"
                        alt="Fatima Al Zaabi" />
                    <div class="review-card">
                        <span class="quote-icon">&#8220;</span>
                        <h4 class="reviewer-name">Fatima Al Zaabi</h4>
                        <span class="reviewer-role">Corporate Client &mdash; Sharjah</span>
                        <p class="review-text">
                            Booked a scenic tour through Ras Al Khaimah and it was
                            extraordinary. The chauffeur was knowledgeable, polite, and made
                            every moment memorable.
                        </p>
                        <div class="review-stars">
                            &#9733;&#9733;&#9733;&#9733;&#9733;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- review-section-ends -->
@endsection

@push('head')
    <style>
        /* pickup typeahead dropdown */
        .bk-suggestions {
            position: absolute;
            top: calc(100% + 4px);
            left: 0;
            right: 0;
            background: #fff;
            border: 1.5px solid #e8e8e8;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            max-height: 220px;
            overflow-y: auto;
            z-index: 50;
            display: none;
        }

        .bk-suggestions.show {
            display: block;
        }

        .bk-suggestion-item {
            padding: 10px 14px;
            font-size: 13.5px;
            color: #1a1a1a;
            cursor: pointer;
            transition: background 0.15s ease;
        }

        .bk-suggestion-item:hover,
        .bk-suggestion-item.active {
            background: var(--brand-light, #fff8e1);
        }

        .bk-suggestion-empty {
            padding: 10px 14px;
            font-size: 12.5px;
            color: #b0b0b0;
        }
    </style>
@endpush

@push('body')
    <script>
        (function () {
            const pickupInput = document.getElementById('r-pickup-input');
            const pickupId = document.getElementById('r-pickup-id');
            const suggestionBox = document.getElementById('r-pickup-suggestions');
            const dropoff = document.getElementById('r-dropoff');

            if (!pickupInput || !dropoff) return;

            const searchUrl = "{{ route('locations.search') }}";
            const dropoffUrl = "{{ route('locations.dropoffs') }}";
            const bookUrl = "{{ url('book-a-ride') }}";
            const checkFareBtn = document.getElementById('r-check-fare');
            let debounce;

            function resetDropoff(message) {
                dropoff.innerHTML = '<option value="">' + message + '</option>';
                dropoff.disabled = true;
            }

            function hideSuggestions() {
                suggestionBox.classList.remove('show');
                suggestionBox.innerHTML = '';
            }

            function renderSuggestions(items) {
                suggestionBox.innerHTML = '';
                if (!items.length) {
                    suggestionBox.innerHTML = '<div class="bk-suggestion-empty">No locations found</div>';
                    suggestionBox.classList.add('show');
                    return;
                }
                items.forEach((loc) => {
                    const el = document.createElement('div');
                    el.className = 'bk-suggestion-item';
                    el.textContent = loc.name;
                    el.addEventListener('mousedown', (e) => {
                        e.preventDefault();
                        selectPickup(loc);
                    });
                    suggestionBox.appendChild(el);
                });
                suggestionBox.classList.add('show');
            }

            function selectPickup(loc) {
                pickupInput.value = loc.name;
                pickupId.value = loc.id;
                hideSuggestions();
                loadDropoffs(loc.id);
            }

            function loadDropoffs(id) {
                resetDropoff('Loading…');
                fetch(dropoffUrl + '?pickup_id=' + encodeURIComponent(id))
                    .then((r) => r.json())
                    .then((items) => {
                        if (!items.length) {
                            resetDropoff('No drop off available');
                            return;
                        }
                        dropoff.innerHTML = '<option value="">Select drop off location</option>';
                        items.forEach((loc) => {
                            const opt = document.createElement('option');
                            opt.value = loc.id;
                            opt.textContent = loc.name;
                            dropoff.appendChild(opt);
                        });
                        dropoff.disabled = false;
                    })
                    .catch(() => resetDropoff('Select pick up first'));
            }

            pickupInput.addEventListener('input', function () {
                // clear any previous selection while the user edits
                pickupId.value = '';
                resetDropoff('Select pick up first');

                const term = pickupInput.value.trim();
                clearTimeout(debounce);
                debounce = setTimeout(() => {
                    fetch(searchUrl + '?q=' + encodeURIComponent(term))
                        .then((r) => r.json())
                        .then(renderSuggestions)
                        .catch(hideSuggestions);
                }, 200);
            });

            pickupInput.addEventListener('focus', function () {
                if (pickupInput.value.trim() === '' && !pickupId.value) {
                    pickupInput.dispatchEvent(new Event('input'));
                }
            });

            document.addEventListener('click', function (e) {
                if (!suggestionBox.contains(e.target) && e.target !== pickupInput) {
                    hideSuggestions();
                }
            });

            // Check Fare → carry the selected route into the booking flow
            if (checkFareBtn) {
                checkFareBtn.addEventListener('click', function () {
                    const fromId = pickupId.value;
                    const toId = dropoff.value;
                    if (!fromId) {
                        pickupInput.focus();
                        alert('Please select a pick up location.');
                        return;
                    }
                    if (!toId) {
                        dropoff.focus();
                        alert('Please select a drop off location.');
                        return;
                    }
                    const params = new URLSearchParams({
                        from_id: fromId,
                        to_id: toId,
                        date: (document.getElementById('r-date') || {}).value || '',
                        time: (document.getElementById('r-time') || {}).value || '',
                        passengers: (document.getElementById('r-passengers') || {}).value || '1',
                    });
                    window.location.href = bookUrl + '?' + params.toString();
                });
            }
        })();
    </script>
@endpush
