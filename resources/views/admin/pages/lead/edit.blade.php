<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Edit Lead
            </h2>
            <p class="text-gray-500 text-sm">Update the lead information</p>
        </div>
        <a href="{{ route('lead.show', ['lead' => $lead]) }}"
            class="flex items-center gap-2 rounded-xl px-5 py-3 bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white transition-all duration-300 shadow-md hover:shadow-lg font-medium"
            style="color: #c9982b">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
            Go Back
        </a>
    </div>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="mb-6 px-6 py-4 bg-green-50 border border-green-200 rounded-2xl flex items-center justify-between" id="flash-success">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-green-600">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
                <p class="text-green-800 font-medium text-sm">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('flash-success').remove()" class="text-green-600 hover:text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 px-6 py-4 bg-red-50 border border-red-200 rounded-2xl flex items-center justify-between" id="flash-error">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-red-600">
                    <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                </svg>
                <p class="text-red-800 font-medium text-sm">{{ session('error') }}</p>
            </div>
            <button onclick="document.getElementById('flash-error').remove()" class="text-red-600 hover:text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    @endif

    <form action="{{ route('lead.update', $lead) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Section 1: Customer Info --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Customer Information</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter customer name" value="{{ old('name', $lead->name) }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" name="email" id="email"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="customer@example.com" value="{{ old('email', $lead->email) }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            Phone
                        </label>
                        <input type="text" name="phone" id="phone"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="+971 XX XXX XXXX" value="{{ old('phone', $lead->phone) }}">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 2: Booking & Trip --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Booking & Trip</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Vehicle --}}
                    <div>
                        <label for="vehicle_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            Vehicle
                        </label>
                        <select name="vehicle_id" id="vehicle_id"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="">Select Vehicle</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" @selected(old('vehicle_id', $lead->vehicle_id) == $vehicle->id)>
                                    {{ $vehicle->name }} {{ $vehicle->plate_number ? '(' . $vehicle->plate_number . ')' : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehicle_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Driver --}}
                    <div>
                        <label for="driver_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            Driver
                        </label>
                        <select name="driver_id" id="driver_id"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="">Select Driver</option>
                            @foreach ($drivers as $driverUser)
                                <option value="{{ $driverUser->id }}" @selected(old('driver_id', $lead->driver_id) == $driverUser->id)>
                                    {{ $driverUser->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('driver_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Booking Date --}}
                    <div>
                        <label for="booking_date" class="block text-sm font-semibold text-gray-700 mb-2">
                            Booking Date
                        </label>
                        <input type="date" name="booking_date" id="booking_date"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            value="{{ old('booking_date', $lead->booking_date?->format('Y-m-d')) }}">
                        @error('booking_date')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Trip Type --}}
                    <div>
                        <label for="trip_type" class="block text-sm font-semibold text-gray-700 mb-2">
                            Trip Type
                        </label>
                        <select name="trip_type" id="trip_type"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="">Select Trip Type</option>
                            <option value="TRANSFER" @selected(old('trip_type', $lead->trip_type) == 'TRANSFER')>TRANSFER</option>
                            <option value="CHAUFFEUR" @selected(old('trip_type', $lead->trip_type) == 'CHAUFFEUR')>CHAUFFEUR</option>
                            <option value="WALKIN" @selected(old('trip_type', $lead->trip_type) == 'WALKIN')>WALKIN</option>
                        </select>
                        @error('trip_type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Lead Status --}}
                    <div>
                        <label for="lead_status" class="block text-sm font-semibold text-gray-700 mb-2">
                            Lead Status
                        </label>
                        <select name="lead_status" id="lead_status"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="new" @selected(old('lead_status', $lead->lead_status) == 'new')>New</option>
                            <option value="contacted" @selected(old('lead_status', $lead->lead_status) == 'contacted')>Contacted</option>
                            <option value="qualified" @selected(old('lead_status', $lead->lead_status) == 'qualified')>Qualified</option>
                            <option value="converted" @selected(old('lead_status', $lead->lead_status) == 'converted')>Converted</option>
                            <option value="lost" @selected(old('lead_status', $lead->lead_status) == 'lost')>Lost</option>
                        </select>
                        @error('lead_status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 3: Locations --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Locations</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Pickup Location GPS --}}
                    <div>
                        <label for="pickup_location_gps" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pickup Location GPS
                        </label>
                        <input type="text" name="pickup_location_gps" id="pickup_location_gps"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="e.g. 25.2048,55.2708" value="{{ old('pickup_location_gps', $lead->pickup_location_gps) }}">
                        @error('pickup_location_gps')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Dropoff Location GPS --}}
                    <div>
                        <label for="dropoff_location_gps" class="block text-sm font-semibold text-gray-700 mb-2">
                            Dropoff Location GPS
                        </label>
                        <input type="text" name="dropoff_location_gps" id="dropoff_location_gps"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="e.g. 25.2048,55.2708" value="{{ old('dropoff_location_gps', $lead->dropoff_location_gps) }}">
                        @error('dropoff_location_gps')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Pickup Location Description --}}
                    <div>
                        <label for="pickup_location_description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pickup Location Description
                        </label>
                        <input type="text" name="pickup_location_description" id="pickup_location_description"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="e.g. Dubai Mall Entrance" value="{{ old('pickup_location_description', $lead->pickup_location_description) }}">
                        @error('pickup_location_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Dropoff Location Description --}}
                    <div>
                        <label for="dropoff_location_description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Dropoff Location Description
                        </label>
                        <input type="text" name="dropoff_location_description" id="dropoff_location_description"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="e.g. Dubai Airport Terminal 3" value="{{ old('dropoff_location_description', $lead->dropoff_location_description) }}">
                        @error('dropoff_location_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Pickup Time --}}
                    <div>
                        <label for="pickup_time" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pickup Time
                        </label>
                        <input type="datetime-local" name="pickup_time" id="pickup_time"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            value="{{ old('pickup_time', $lead->pickup_time?->format('Y-m-d\TH:i')) }}">
                        @error('pickup_time')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 4: Fare Details --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Fare Details</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Base Fare --}}
                    <div>
                        <label for="base_fare" class="block text-sm font-semibold text-gray-700 mb-2">
                            Base Fare (AED)
                        </label>
                        <input type="number" step="0.01" name="base_fare" id="base_fare"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="0.00" value="{{ old('base_fare', $lead->base_fare) }}">
                        @error('base_fare')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Discount Amount --}}
                    <div>
                        <label for="discount_amount" class="block text-sm font-semibold text-gray-700 mb-2">
                            Discount Amount (AED)
                        </label>
                        <input type="number" step="0.01" name="discount_amount" id="discount_amount"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="0.00" value="{{ old('discount_amount', $lead->discount_amount) }}">
                        @error('discount_amount')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Total Amount --}}
                    <div>
                        <label for="total_amount" class="block text-sm font-semibold text-gray-700 mb-2">
                            Total Amount (AED)
                        </label>
                        <input type="number" step="0.01" name="total_amount" id="total_amount"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="0.00" value="{{ old('total_amount', $lead->total_amount) }}">
                        @error('total_amount')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tips Amount --}}
                    <div>
                        <label for="tips_amount" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tips Amount (AED)
                        </label>
                        <input type="number" step="0.01" name="tips_amount" id="tips_amount"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="0.00" value="{{ old('tips_amount', $lead->tips_amount) }}">
                        @error('tips_amount')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Toll Fee --}}
                    <div>
                        <label for="toll_fee" class="block text-sm font-semibold text-gray-700 mb-2">
                            Toll Fee (AED)
                        </label>
                        <input type="number" step="0.01" name="toll_fee" id="toll_fee"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="0.00" value="{{ old('toll_fee', $lead->toll_fee) }}">
                        @error('toll_fee')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Extras --}}
                    <div>
                        <label for="extras" class="block text-sm font-semibold text-gray-700 mb-2">
                            Extras (AED)
                        </label>
                        <input type="number" step="0.01" name="extras" id="extras"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="0.00" value="{{ old('extras', $lead->extras) }}">
                        @error('extras')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 5: Trip Metrics & Payment --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Trip Metrics & Payment</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Duration --}}
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">
                            Duration (minutes)
                        </label>
                        <input type="number" name="duration" id="duration"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="e.g. 45" value="{{ old('duration', $lead->duration) }}">
                        @error('duration')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Distance --}}
                    <div>
                        <label for="distance" class="block text-sm font-semibold text-gray-700 mb-2">
                            Distance (km)
                        </label>
                        <input type="number" step="0.01" name="distance" id="distance"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="e.g. 25.5" value="{{ old('distance', $lead->distance) }}">
                        @error('distance')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- On Contract --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            On Contract
                        </label>
                        <div class="flex items-center mt-2">
                            <input type="hidden" name="on_contract" value="0">
                            <input type="checkbox" name="on_contract" id="on_contract" value="1"
                                class="w-5 h-5 rounded border-2 border-gray-300 text-[#c9982b] focus:ring-[#c9982b] transition-all duration-200"
                                {{ old('on_contract', $lead->on_contract) ? 'checked' : '' }}>
                            <label for="on_contract" class="ml-3 text-sm text-gray-700">This lead is on contract</label>
                        </div>
                        @error('on_contract')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Contract Provider Name --}}
                    <div>
                        <label for="contract_provider_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Contract Provider Name
                        </label>
                        <input type="text" name="contract_provider_name" id="contract_provider_name"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter contract provider" value="{{ old('contract_provider_name', $lead->contract_provider_name) }}">
                        @error('contract_provider_name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Payment Mode --}}
                    <div>
                        <label for="payment_mode" class="block text-sm font-semibold text-gray-700 mb-2">
                            Payment Mode
                        </label>
                        <select name="payment_mode" id="payment_mode"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="">Select Payment Mode</option>
                            <option value="Cash" @selected(old('payment_mode', $lead->payment_mode) == 'Cash')>Cash</option>
                            <option value="Card" @selected(old('payment_mode', $lead->payment_mode) == 'Card')>Card</option>
                            <option value="Bank Transfer" @selected(old('payment_mode', $lead->payment_mode) == 'Bank Transfer')>Bank Transfer</option>
                            <option value="Online" @selected(old('payment_mode', $lead->payment_mode) == 'Online')>Online</option>
                        </select>
                        @error('payment_mode')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Actions --}}
        <div class="flex items-center justify-end gap-4 mb-6">
            <a href="{{ route('lead.show', ['lead' => $lead]) }}"
                class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                Cancel
            </a>
            <button type="submit"
                class="px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                Update Lead
            </button>
        </div>
    </form>
</x-app-layout>
