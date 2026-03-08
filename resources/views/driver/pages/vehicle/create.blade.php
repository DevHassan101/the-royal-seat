@extends('driver.layouts.app')
@section('content')
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Add New Vehicle</h2>
            <p class="text-gray-500 text-sm">Fill in the details to register a new vehicle</p>
        </div>
        <a href="{{ route('driver.vehicle.index') }}"
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
                    <path d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4z"/>
                </svg>
                Vehicle Information
            </h3>
        </div>

        <form action="{{ route('driver.vehicle.store') }}" method="post" class="p-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="picture" class="block text-sm font-semibold text-gray-700 mb-2">
                        Vehicle Picture <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" name="picture" id="picture" accept="image/*"
                            class="block w-full !pl-3 !pr-4 py-3 !border-1 !border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                    </div>
                    @error('picture')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="model" class="block text-sm font-semibold text-gray-700 mb-2">Model</label>
                    <div class="relative">
                        <input type="text" name="model" id="model"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="ex: Mercedes-Maybach S-Class" value="{{ old('model') }}">
                    </div>
                    @error('model')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="seats" class="block text-sm font-semibold text-gray-700 mb-2">Seats</label>
                    <div class="relative">
                        <input type="number" name="seats" id="seats"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter seats" value="{{ old('seats') }}">
                    </div>
                    @error('seats')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Vehicle Type <span class="text-red-500">*</span>
                    </label>
                    <select class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                        name="type" id="type" required>
                        <option value="">Select Vehicle Type</option>
                        <option value="AV" @selected(old('type') == 'AV')>AV</option>
                        <option value="UAENATIONAL" @selected(old('type') == 'UAENATIONAL')>UAENATIONAL</option>
                        <option value="PHC" @selected(old('type') == 'PHC')>PHC</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="per_day_charges" class="block text-sm font-semibold text-gray-700 mb-2">Per Day Charges</label>
                    <div class="relative">
                        <input type="number" step="any" name="per_day_charges" id="per_day_charges"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter per day charges" value="{{ old('per_day_charges') }}">
                    </div>
                    @error('per_day_charges')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="transmission" class="block text-sm font-semibold text-gray-700 mb-2">Transmission</label>
                    <select class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                        name="transmission" id="transmission">
                        <option value="automatic" @selected(old('transmission') == 'automatic')>Automatic</option>
                        <option value="manual" @selected(old('transmission') == 'manual')>Manual</option>
                    </select>
                    @error('transmission')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="plate_number" class="block text-sm font-semibold text-gray-700 mb-2">
                        Plate Number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="plate_number" id="plate_number"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter plate number" value="{{ old('plate_number') }}">
                    </div>
                    @error('plate_number')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="plate_code" class="block text-sm font-semibold text-gray-700 mb-2">
                        Plate Code <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="plate_code" id="plate_code"
                            class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                            placeholder="Enter plate code" value="{{ old('plate_code') }}">
                    </div>
                    @error('plate_code')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="permit_details" class="block text-sm font-semibold text-gray-700 mb-2">Permit Details</label>
                    <div class="relative">
                        <textarea name="permit_details" id="permit_details" rows="4"
                            class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                            placeholder="Enter permit details...">{{ old('permit_details') }}</textarea>
                    </div>
                    @error('permit_details')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('driver.vehicle.index') }}"
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
@endsection
