@extends('driver.layouts.app')
@section('content')
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Add New Booking</h2>
            <p class="text-gray-500 text-sm">Fill in the details to create a new booking</p>
        </div>
        <a href="{{ route('driver.booking.index') }}"
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
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                    <path d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z"/>
                    <path fill="white" fill-rule="evenodd" d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14z" clip-rule="evenodd"/>
                </svg>
                Booking Information
            </h3>
        </div>

        <form action="{{ route('driver.booking.store') }}" method="post" class="p-6">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Vehicle --}}
                <div class="col-span-1">
                    <label for="vehicle" class="block text-sm font-semibold text-gray-700 mb-2">
                        Vehicle <span class="text-red-500">*</span>
                    </label>
                    <select name="vehicle" id="vehicle" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">Select Vehicle</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" @selected(old('vehicle') == $vehicle->id)>
                                {{ $vehicle->name }} ({{ $vehicle->plate_number }})
                            </option>
                        @endforeach
                    </select>
                    @error('vehicle')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Customer Info --}}
                    <div>
                        <label for="customer_name" class="block text-sm font-semibold text-gray-700 mb-2">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Customer Name" value="{{ old('customer_name') }}">
                        @error('customer_name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="customer_mobile_number" class="block text-sm font-semibold text-gray-700 mb-2">Customer Mobile</label>
                        <input type="text" name="customer_mobile_number" id="customer_mobile_number"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Mobile Number" value="{{ old('customer_mobile_number') }}">
                        @error('customer_mobile_number')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="customer_email" class="block text-sm font-semibold text-gray-700 mb-2">Customer Email</label>
                        <input type="email" name="customer_email" id="customer_email"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Email" value="{{ old('customer_email') }}">
                        @error('customer_email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                {{-- Trip Details --}}
                <div class="col-span-1 sm:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="trip_type" class="block text-sm font-semibold text-gray-700 mb-2">
                            Trip Type <span class="text-red-500">*</span>
                        </label>
                        <select name="trip_type" id="trip_type" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="">Select Trip Type</option>
                            <option value="TRANSFER" @selected(old('trip_type') == 'TRANSFER')>Transfer</option>
                            <option value="CHAUFFEUR" @selected(old('trip_type') == 'CHAUFFEUR')>Chauffeur</option>
                            <option value="WALKIN" @selected(old('trip_type') == 'WALKIN')>Walkin</option>
                            <option value="any other" @selected(old('trip_type') == 'any other')>Any Other</option>
                        </select>
                        @error('trip_type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="pickup_time" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pickup Time <span class="text-red-500">*</span>
                        </label>
                        <input type="time" name="pickup_time" id="pickup_time" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            value="{{ old('pickup_time') }}">
                        @error('pickup_time')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Location GPS --}}
                <div>
                    <label for="pickup_location" class="block text-sm font-semibold text-gray-700 mb-2">
                        Pickup Location GPS <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="pickup_location" id="pickup_location" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                        placeholder="e.g. 25.2732083,55.3694757" value="{{ old('pickup_location') }}">
                    @error('pickup_location')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="drop_off_location" class="block text-sm font-semibold text-gray-700 mb-2">
                        Drop Off Location GPS <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="drop_off_location" id="drop_off_location" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                        placeholder="e.g. 25.2048493,55.2708047" value="{{ old('drop_off_location') }}">
                    @error('drop_off_location')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Location Descriptions --}}
                <div>
                    <label for="pickup_location_description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Pickup Location Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="pickup_location_description" id="pickup_location_description" rows="4" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                        placeholder="Enter Pickup Location Description">{{ old('pickup_location_description') }}</textarea>
                    @error('pickup_location_description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="drop_off_location_description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Drop Off Location Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="drop_off_location_description" id="drop_off_location_description" rows="4" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                        placeholder="Enter Drop Off Location Description">{{ old('drop_off_location_description') }}</textarea>
                    @error('drop_off_location_description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Fare Details --}}
                <div class="col-span-1 sm:col-span-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">
                            Duration <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="duration" id="duration" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Value in minutes" value="{{ old('duration') }}">
                        @error('duration')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="distance" class="block text-sm font-semibold text-gray-700 mb-2">
                            Distance <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="distance" id="distance" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Value in kilometer" value="{{ old('distance') }}">
                        @error('distance')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="base_fare" class="block text-sm font-semibold text-gray-700 mb-2">
                            Base Fare <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="base_fare" id="base_fare" step="any" min="1" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Fare amount" value="{{ old('base_fare') }}">
                        @error('base_fare')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="discount_amount" class="block text-sm font-semibold text-gray-700 mb-2">
                            Discount <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="discount_amount" id="discount_amount" step="any" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Discount amount" value="{{ old('discount_amount') }}">
                        @error('discount_amount')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Payment & Contract --}}
                <div class="col-span-1">
                    <label for="payment_mode" class="block text-sm font-semibold text-gray-700 mb-2">
                        Payment Mode <span class="text-red-500">*</span>
                    </label>
                    <select name="payment_mode" id="payment_mode" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">Select Payment Mode</option>
                        <option value="Cash" @selected(old('payment_mode') == 'Cash')>Cash</option>
                        <option value="Card" @selected(old('payment_mode') == 'Card')>Card</option>
                    </select>
                    @error('payment_mode')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <div>
                        <label for="on_contract" class="block text-sm font-semibold text-gray-700 mb-2">
                            On Contract <span class="text-red-500">*</span>
                        </label>
                        <select name="on_contract" id="on_contract" required
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                            <option value="">Select</option>
                            <option value="1" @selected(old('on_contract') == '1')>Yes</option>
                            <option value="0" @selected(old('on_contract') == '0')>No</option>
                        </select>
                        @error('on_contract')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2" id="contract_provider_wrapper" style="display: none;">
                        <label for="contract_provider_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Contract Provider Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="contract_provider_name" id="contract_provider_name"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Provider Name" value="{{ old('contract_provider_name') }}">
                        @error('contract_provider_name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('driver.booking.index') }}"
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

        window.addEventListener('DOMContentLoaded', function() {
            if (onContractSelect.value === '1') {
                contractProviderWrapper.style.display = 'block';
                contractProviderInput.setAttribute('required', 'required');
            }
        });
    </script>
@endsection
