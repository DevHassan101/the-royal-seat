<x-app-layout>
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Add New Booking
            </h2>
            <p class="text-gray-500 text-sm">Fill in the details to register a new booking</p>
        </div>
        <a href="{{ route('booking.index') }}"
            class="flex items-center gap-2 rounded-xl px-5 py-3 bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white transition-all duration-300 shadow-md hover:shadow-lg font-medium"
            style="color: #c9982b">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
            Go Back
        </a>
    </div>
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="white">
                    <path
                        d="M12 3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5m-4 9.5A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517c4.278.699 8.642.699 12.92 0a1.54 1.54 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34q-.28.001-.544.086l-.866.283a7.25 7.25 0 0 1-4.5 0l-.866-.283a1.8 1.8 0 0 0-.543-.086z" />
                </svg>
                Booking Information
            </h3>
        </div>

        <!-- Form Body -->
        <form action="{{ route('booking.store') }}" method="post" class="p-6">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Driver -->
                <div class="col-span-1">
                    <label for="driver" class="block text-sm font-semibold text-gray-700 mb-2">
                        Driver <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="driver" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            id="driver">
                            <option value="">Select Driver</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}" data-driverVehicleId="{{ $driver->vehicle?->id }}"
                                    @selected(old('driver') == $driver->id)>
                                    {{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('driver')
                        <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <!-- Vehicle -->
                <div class="col-span-1">
                    <label for="vehicle" class="block text-sm font-semibold text-gray-700 mb-2">
                        Vehicle <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="vehicle" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            id="vehicle">
                            <option value="">Select Vehicle</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" @selected(old('vehicle') == $vehicle->id)>{{ $vehicle->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('vehicle')
                        <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Customer Mobile -->
                <div class="col-span-1 sm:col-span-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    <!-- Customer name -->
                    <div>
                        <label for="customer_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Customer Name
                        </label>
                        <div class="relative">
                            <input type="text" name="customer_name" id="customer_name"
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Enter Customer Name" value="{{ old('customer_name') }}">
                        </div>
                        @error('customer_name')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="customer_mobile_number" class="block text-sm font-semibold text-gray-700 mb-2">
                            Customer Mobile Number
                        </label>
                        <div class="relative">
                            <input type="text" name="customer_mobile_number" id="customer_mobile_number"
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Enter Customer Mobile Number" value="{{ old('customer_mobile_number') }}">
                        </div>
                        @error('customer_mobile_number')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="customer_email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Customer Email
                        </label>
                        <div class="relative">
                            <input type="text" name="customer_email" id="customer_email"
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Enter Customer Mobile Number" value="{{ old('customer_email') }}">
                        </div>
                        @error('customer_email')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Trip Type -->
                <div class="col-span-1">
                    <label for="trip_type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Trip Type <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="trip_type" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            id="trip_type">
                            <option value="">Select Trip Type</option>
                            <option value="TRANSFER" @selected(old('trip_type') == 'TRANSFER')>Transfer</option>
                            <option value="CHAUFFEUR" @selected(old('trip_type') == 'CHAUFFEUR')>Chauffeur</option>
                            <option value="WALKIN" @selected(old('trip_type') == 'WALKIN')>Walkin</option>
                            <option value="any other" @selected(old('trip_type') == 'any other')>Any Other</option>
                        </select>
                    </div>
                    @error('trip_type')
                        <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                    <div>
                        <label for="pickup_time" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pickup Time <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="time" name="pickup_time" id="pickup_time" required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Enter Customer Name" value="{{ old('pickup_time') }}">
                        </div>
                        @error('pickup_time')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="pickup_location" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pickup Location GPS <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="pickup_location" id="pickup_location" required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="e.g. 25.2732083,55.3694757" value="{{ old('pickup_location') }}">
                        </div>
                        @error('pickup_location')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="drop_off_location" class="block text-sm font-semibold text-gray-700 mb-2">
                            Drop Off Location GPS <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="drop_off_location" id="drop_off_location" required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="e.g. 25.2048493,55.2708047" value="{{ old('drop_off_location') }}">
                        </div>
                        @error('drop_off_location')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                
                <div class="">
                    <label for="pickup_location_description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Pickup Location Description <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <textarea name="pickup_location_description" id="pickup_location_description" rows="5"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                            placeholder="Enter Pickup Location Description" required>{{ old('pickup_location_description') }}</textarea>
                    </div>
                    @error('pickup_location_description')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="">
                    <label for="drop_off_location_description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Drop Off Location Description <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <textarea name="drop_off_location_description" id="drop_off_location_description" rows="5"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                            placeholder="Enter Drop Off Location Description" required>{{ old('drop_off_location_description') }}</textarea>
                    </div>
                    @error('drop_off_location_description')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="col-span-1 sm:col-span-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">
                            Duration <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="duration" id="duration" required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Value in minutes" value="{{ old('duration') }}">
                        </div>
                        @error('duration')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="distance" class="block text-sm font-semibold text-gray-700 mb-2">
                            Distance <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="distance" id="distance" required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Value in kilometer" value="{{ old('distance') }}">
                        </div>
                        @error('distance')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="base_fare" class="block text-sm font-semibold text-gray-700 mb-2">
                            Base Fare <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="base_fare" id="base_fare" step="any" required min="1"
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Fare without other additions (like toll tips etc.)"
                                value="{{ old('base_fare') }}">
                        </div>
                        @error('base_fare')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="discount_amount" class="block text-sm font-semibold text-gray-700 mb-2">
                            Discount Amount <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="discount_amount" id="discount_amount" step="any"
                                required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Fare without other additions (like toll tips etc.)"
                                value="{{ old('discount_amount') }}">
                        </div>
                        @error('discount_amount')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-1">
                    <label for="payment_mode" class="block text-sm font-semibold text-gray-700 mb-2">
                        Payment Mode <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="payment_mode" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            id="payment_mode">
                            <option value="">Select payment mode</option>
                            <option value="Cash" @selected(old('payment_mode') == 'Cash')>Cash</option>
                            <option value="Card" @selected(old('payment_mode') == 'Card')>Card</option>
                        </select>
                    </div>
                    @error('payment_mode')
                        <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <div>
                        <label for="on_contract" class="block text-sm font-semibold text-gray-700 mb-2">
                            On Contract <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="on_contract" required
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                id="on_contract">
                                <option value="">Select On Contract</option>
                                <option value="1" @selected(old('on_contract') == '1')>Yes</option>
                                <option value="0" @selected(old('on_contract') == '0')>No</option>
                            </select>
                        </div>
                        @error('on_contract')
                            <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-2" id="contract_provider_wrapper" style="display: none;">
                        <label for="contract_provider_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Contract Provider Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="contract_provider_name" id="contract_provider_name"
                                class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                                placeholder="Enter Customer Name" value="{{ old('contract_provider_name') }}">
                        </div>
                        @error('contract_provider_name')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>


            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('booking.index') }}"
                    class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                    Submit Booking
                </button>
            </div>
        </form>
    </div>

    <script>
        // Auto-select vehicle when driver is selected
        const driverSelect = document.getElementById('driver');
        const vehicleSelect = document.getElementById('vehicle');

        driverSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const vehicleId = selectedOption.getAttribute('data-driverVehicleId');

            if (vehicleId) {
                vehicleSelect.value = vehicleId;
            } else {
                vehicleSelect.value = '';
            }
        });

        // Show/hide contract provider name based on on_contract dropdown
        const onContractSelect = document.getElementById('on_contract');
        const contractProviderWrapper = document.getElementById('contract_provider_wrapper');
        const contractProviderInput = document.getElementById('contract_provider_name');

        onContractSelect.addEventListener('change', function() {
            if (this.value === '1') {
                contractProviderWrapper.style.display = 'block';
                contractProviderInput.setAttribute('required', 'required');
            } else {
                contractProviderWrapper.style.display = 'none';
                contractProviderInput.removeAttribute('required');
                contractProviderInput.value = '';
            }
        });

        // On page load, check if old value was yes (for validation re-render)
        window.addEventListener('DOMContentLoaded', function() {
            if (onContractSelect.value === '1') {
                contractProviderWrapper.style.display = 'block';
                contractProviderInput.setAttribute('required', 'required');
            }
        });
    </script>
</x-app-layout>
