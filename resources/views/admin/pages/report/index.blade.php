<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Reports</h2>
            <p class="text-gray-500 text-sm">Generate, filter and export reports</p>
        </div>
    </div>

    {{-- Report Type Selector & Filters --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-lg font-semibold text-white">Generate Report</h3>
        </div>
        <form action="{{ route('report.generate') }}" method="POST" class="p-6" id="reportForm">
            @csrf
            <div class="grid grid-cols-1 md:!grid-cols-2 lg:!grid-cols-4 gap-4 mb-6">
                {{-- Report Type --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Report Type <span class="text-red-500">*</span></label>
                    <select name="report_type" id="reportType" required
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">Select Report</option>
                        <option value="revenue" {{ ($report_type ?? '') == 'revenue' ? 'selected' : '' }}>Revenue Report</option>
                        <option value="expense" {{ ($report_type ?? '') == 'expense' ? 'selected' : '' }}>Expense Report</option>
                        <option value="booking" {{ ($report_type ?? '') == 'booking' ? 'selected' : '' }}>Booking Report</option>
                        <option value="driver_performance" {{ ($report_type ?? '') == 'driver_performance' ? 'selected' : '' }}>Driver Performance</option>
                        <option value="profit_loss" {{ ($report_type ?? '') == 'profit_loss' ? 'selected' : '' }}>Profit & Loss</option>
                    </select>
                </div>

                {{-- Date From --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date From</label>
                    <input type="date" name="date_from" value="{{ $filters['date_from'] ?? '' }}"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                </div>

                {{-- Date To --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date To</label>
                    <input type="date" name="date_to" value="{{ $filters['date_to'] ?? '' }}"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                </div>

                {{-- Driver Filter --}}
                <div id="filterDriver">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Driver</label>
                    <select name="driver_id"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">All Drivers</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}" {{ ($filters['driver_id'] ?? '') == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Additional Filters Row --}}
            <div class="grid grid-cols-1 md:!grid-cols-2 lg:!grid-cols-4 gap-4 mb-6">
                {{-- Vehicle Filter (expense only) --}}
                <div id="filterVehicle" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Vehicle</label>
                    <select name="vehicle_id"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">All Vehicles</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ ($filters['vehicle_id'] ?? '') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->name }} ({{ $vehicle->plate_number }})</option>
                        @endforeach
                    </select>
                </div>

                {{-- Category Filter (expense only) --}}
                <div id="filterCategory" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                    <select name="category"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">All Categories</option>
                        @foreach(['fuel','maintenance','insurance','toll','parking','fine','other'] as $cat)
                            <option value="{{ $cat }}" {{ ($filters['category'] ?? '') == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Trip Type Filter (revenue/booking) --}}
                <div id="filterTripType" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Trip Type</label>
                    <select name="trip_type"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">All Types</option>
                        @foreach(['Booked','Hailed','Contract'] as $tt)
                            <option value="{{ $tt }}" {{ ($filters['trip_type'] ?? '') == $tt ? 'selected' : '' }}>{{ $tt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Payment Mode Filter (revenue/booking) --}}
                <div id="filterPaymentMode" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Payment Mode</label>
                    <select name="payment_mode"
                        class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-all duration-200">
                        <option value="">All Modes</option>
                        @foreach(['Cash','Card'] as $pm)
                            <option value="{{ $pm }}" {{ ($filters['payment_mode'] ?? '') == $pm ? 'selected' : '' }}>{{ $pm }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline -mt-0.5 mr-1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    Generate Report
                </button>
            </div>
        </form>
    </div>

    {{-- Report Results --}}
    @if(isset($report_type) && isset($rows))
        {{-- Summary Cards --}}
        @if(!empty($summary))
            <div class="grid grid-cols-2 md:!grid-cols-3 lg:!grid-cols-{{ min(count($summary), 6) }} gap-4 mb-6">
                @foreach($summary as $label => $value)
                    <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
                        <p class="text-xs font-medium text-gray-500 uppercase mb-1">{{ $label }}</p>
                        <p class="text-lg font-bold text-gray-800">{{ $value }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Export Buttons --}}
        <div class="flex items-center gap-3 mb-4">
            <form action="{{ route('report.export-csv') }}" method="POST" class="inline">
                @csrf
                <input type="hidden" name="report_type" value="{{ $report_type }}">
                @foreach($filters as $key => $val)
                    @if($val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endif
                @endforeach
                <button type="submit"
                    class="flex items-center gap-2 px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-all duration-200 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    Export CSV / Excel
                </button>
            </form>
            <form action="{{ route('report.print') }}" method="POST" target="_blank" class="inline">
                @csrf
                <input type="hidden" name="report_type" value="{{ $report_type }}">
                @foreach($filters as $key => $val)
                    @if($val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endif
                @endforeach
                <button type="submit"
                    class="flex items-center gap-2 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-all duration-200 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    Export PDF (Print)
                </button>
            </form>
        </div>

        {{-- Data Table --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-white">
                    @php
                        $reportTitles = [
                            'revenue' => 'Revenue Report',
                            'expense' => 'Expense Report',
                            'booking' => 'Booking Report',
                            'driver_performance' => 'Driver Performance Report',
                            'profit_loss' => 'Profit & Loss Report',
                        ];
                    @endphp
                    {{ $reportTitles[$report_type] ?? 'Report' }}
                </h3>
                <span class="text-white/80 text-sm">{{ $rows->count() }} {{ $rows->count() === 1 ? 'record' : 'records' }}</span>
            </div>
            <div class="p-6">
                @if($rows->isEmpty())
                    <p class="text-gray-500 text-center py-8">No data found for the selected filters.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-left text-gray-500 border-b">
                                    @foreach($headers as $header)
                                        <th class="pb-3 font-medium whitespace-nowrap px-2">{{ $header }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $row)
                                    <tr class="border-b last:border-0 hover:bg-gray-50">
                                        @foreach($row as $j => $cell)
                                            <td class="py-3 px-2 text-gray-700 whitespace-nowrap
                                                @if(str_contains($headers[$j] ?? '', 'Amount') || str_contains($headers[$j] ?? '', 'Revenue') || str_contains($headers[$j] ?? '', 'Total') || str_contains($headers[$j] ?? '', 'Net'))
                                                    font-semibold
                                                    @if(is_string($cell) && str_starts_with($cell, '-'))
                                                        text-red-600
                                                    @endif
                                                @endif
                                            ">{{ $cell }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <script>
        const reportType = document.getElementById('reportType');
        const filterDriver = document.getElementById('filterDriver');
        const filterVehicle = document.getElementById('filterVehicle');
        const filterCategory = document.getElementById('filterCategory');
        const filterTripType = document.getElementById('filterTripType');
        const filterPaymentMode = document.getElementById('filterPaymentMode');

        function toggleFilters() {
            const type = reportType.value;

            // Driver filter: show for all except profit_loss
            filterDriver.style.display = type === 'profit_loss' ? 'none' : 'block';

            // Expense-specific filters
            filterVehicle.classList.toggle('hidden', type !== 'expense');
            filterCategory.classList.toggle('hidden', type !== 'expense');

            // Booking/Revenue-specific filters
            const showBookingFilters = ['revenue', 'booking'].includes(type);
            filterTripType.classList.toggle('hidden', !showBookingFilters);
            filterPaymentMode.classList.toggle('hidden', !showBookingFilters);
        }

        reportType.addEventListener('change', toggleFilters);
        toggleFilters();
    </script>
</x-app-layout>
