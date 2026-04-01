@extends('driver.layouts.app')
@section('content')
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Add Expense</h2>
            <p class="text-gray-500 text-sm">Record a new expense</p>
        </div>
        <a href="{{ route('driver.expense.index') }}"
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
            <h3 class="text-xl font-semibold text-white">Expense Details</h3>
        </div>
        <form action="{{ route('driver.expense.store') }}" method="post" class="p-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="vehicle_id" class="block text-sm font-semibold text-gray-700 mb-2">Vehicle</label>
                    <select name="vehicle_id" id="vehicle_id" class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">Select Vehicle (Optional)</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" @selected(old('vehicle_id') == $vehicle->id)>{{ $vehicle->name }} ({{ $vehicle->plate_number }})</option>
                        @endforeach
                    </select>
                    @error('vehicle_id') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category" id="category" required class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">Select Category</option>
                        <option value="fuel" @selected(old('category') == 'fuel')>Fuel</option>
                        <option value="maintenance" @selected(old('category') == 'maintenance')>Maintenance</option>
                        <option value="insurance" @selected(old('category') == 'insurance')>Insurance</option>
                        <option value="toll" @selected(old('category') == 'toll')>Toll</option>
                        <option value="parking" @selected(old('category') == 'parking')>Parking</option>
                        <option value="fine" @selected(old('category') == 'fine')>Fine</option>
                        <option value="other" @selected(old('category') == 'other')>Other</option>
                    </select>
                    @error('category') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount (AED) <span class="text-red-500">*</span></label>
                    <input type="number" step="0.01" name="amount" id="amount" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                        placeholder="0.00" value="{{ old('amount') }}">
                    @error('amount') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="expense_date" class="block text-sm font-semibold text-gray-700 mb-2">Date <span class="text-red-500">*</span></label>
                    <input type="date" name="expense_date" id="expense_date" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200"
                        value="{{ old('expense_date', date('Y-m-d')) }}">
                    @error('expense_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="receipt" class="block text-sm font-semibold text-gray-700 mb-2">Receipt Image</label>
                    <input type="file" name="receipt" id="receipt" accept="image/*"
                        class="block w-full !pl-3 !pr-4 py-3 !border-1 !border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                    @error('receipt') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200 resize-none"
                        placeholder="Enter expense details...">{{ old('description') }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('driver.expense.index') }}" class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">Cancel</a>
                <button type="submit" class="px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">Submit Expense</button>
            </div>
        </form>
    </div>
@endsection
