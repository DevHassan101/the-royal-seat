<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Edit Driver
            </h2>
            <p class="text-gray-500 text-sm">Update the driver information</p>
        </div>
        <a href="{{ route('driver.index') }}"
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
            <h3 class="text-xl font-semibold text-white">
                Driver Information
            </h3>
        </div>

        <!-- Form Body -->
        <form action="{{ route('driver.update', ['driver' => $driver]) }}" method="post" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div class="col-span-2">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="name" id="name"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Driver Full Name" value="{{ old('name', $driver->name) }}">
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="driver@example.com" value="{{ old('email', $driver->email) }}">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password <span class="text-gray-400 text-xs">(Leave blank to keep current)</span>
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter New Password" value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Emirates ID -->
                <div>
                    <label for="emirates_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Emirates ID <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="emirates_id" id="emirates_id"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="784-XXXX-XXXXXXX-X"
                            value="{{ old('emirates_id', $driver->driverInfo?->emirates_id) }}">
                    </div>
                    @error('emirates_id')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- License Number -->
                <div>
                    <label for="license_number" class="block text-sm font-semibold text-gray-700 mb-2">
                        License Number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="license_number" id="license_number"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter License Number"
                            value="{{ old('license_number', $driver->driverInfo?->license_number) }}">
                    </div>
                    @error('license_number')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Permit Details -->
                <div class="col-span-2">
                    <label for="permit_details" class="block text-sm font-semibold text-gray-700 mb-2">
                        Permit Details
                    </label>
                    <div class="relative">
                        <textarea name="permit_details" id="permit_details" rows="5"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                            placeholder="Enter permit details, restrictions, or special notes...">{{ old('permit_details', $driver->driverInfo?->permit_details) }}</textarea>
                    </div>
                    @error('permit_details')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('driver.index') }}"
                    class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit" 
                    class="px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                    Update Driver
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
