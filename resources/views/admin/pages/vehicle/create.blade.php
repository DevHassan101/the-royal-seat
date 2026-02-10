<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Add New Vehicle
            </h2>
            <p class="text-gray-500 text-sm">Fill in the details to register a new vehicle</p>
        </div>
        <a href="{{ route('vehicle.index') }}"
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
                Vehicle Information
            </h3>
        </div>

        <!-- Form Body -->
        <form action="{{ route('vehicle.store') }}" method="post" class="p-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="name" id="name"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Vehicle Name" value="{{ old('name') }}">
                    </div>
                    @error('name')
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
                    <label for="picture" class="block text-sm font-semibold text-gray-700 mb-2">
                        Vehicle Picture <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" name="picture" id="picture" accept="image/*"
                            class="block w-full !pl-3 !pr-4 py-3 !border-1 !border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Vehicle Name" value="{{ old('picture') }}">
                    </div>
                    @error('picture')
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
                <!-- Driver -->
                <div>
                    <label for="driver" class="block text-sm font-semibold text-gray-700 mb-2">
                        Driver <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                        name="driver" id="driver">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
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

                <!-- Model -->
                <div>
                    <label for="model" class="block text-sm font-semibold text-gray-700 mb-2">
                        Model
                    </label>
                    <div class="relative">
                        <input type="text" name="model" id="model"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="ex:  Mercedes-Maybach S-Class, Rolls-Royce Phantom EWB"
                            value="{{ old('model') }}">
                    </div>
                    @error('model')
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

                <!-- Seats -->
                <div>
                    <label for="seats" class="block text-sm font-semibold text-gray-700 mb-2">
                        Seats
                    </label>
                    <div class="relative">
                        <input type="number" name="seats" id="seats"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter seats" value="{{ old('seats') }}">
                    </div>
                    @error('seats')
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

                <!-- Type -->
                <div>
                    <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Type
                    </label>
                    <div class="relative">
                        <input type="text" name="type" id="type"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="ex: Fuel, Gas" value="{{ old('type') }}">
                    </div>
                    @error('type')
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

                <!-- Per day charges -->
                <div>
                    <label for="per_day_charges" class="block text-sm font-semibold text-gray-700 mb-2">
                        Per day charges
                    </label>
                    <div class="relative">
                        <input type="number" step="any" name="per_day_charges" id="per_day_charges"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter Per day charges" value="{{ old('per_day_charges') }}">
                    </div>
                    @error('per_day_charges')
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

                <!-- transmission -->
                <div>
                    <label for="transmission" class="block text-sm font-semibold text-gray-700 mb-2">
                        Transmission
                    </label>
                    <select
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                        name="transmission" id="transmission">
                        <option value="automatic">Automatic</option>
                        <option value="manual">Manual</option>
                    </select>
                    @error('transmission')
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
                    <label for="plate_number" class="block text-sm font-semibold text-gray-700 mb-2">
                        Plate number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="plate_number" id="plate_number"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter plate number" value="{{ old('plate_number') }}">
                    </div>
                    @error('plate_number')
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
                    <label for="plate_code" class="block text-sm font-semibold text-gray-700 mb-2">
                        Plate code <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="plate_code" id="plate_code"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter plate code" value="{{ old('plate_code') }}">
                    </div>
                    @error('plate_code')
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

                <!-- Permit Details -->
                <div class="col-span-2">
                    <label for="permit_details" class="block text-sm font-semibold text-gray-700 mb-2">
                        Permit Details
                    </label>
                    <div class="relative">
                        <textarea name="permit_details" id="permit_details" rows="5"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                            placeholder="Enter permit details, restrictions, or special notes...">{{ old('permit_details') }}</textarea>
                    </div>
                    @error('permit_details')
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
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('vehicle.index') }}"
                    class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                    Submit Vehicle
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
