<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Lead Details
            </h2>
            <p class="text-gray-500 text-sm">View complete lead information, trip details, and ITC sync status</p>
        </div>
        <a href="{{ route('lead.index') }}"
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

    {{-- Customer Info, Trip Details, Fare & Payment --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        {{-- Customer Info Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Customer Info</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Name</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->name }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Email</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->email ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Phone</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->phone ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Booking Date</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->booking_date?->format('d M Y') ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Lead Status</span>
                    @switch($lead->lead_status)
                        @case('new')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 uppercase">{{ $lead->lead_status }}</span>
                            @break
                        @case('contacted')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">{{ $lead->lead_status }}</span>
                            @break
                        @case('qualified')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 uppercase">{{ $lead->lead_status }}</span>
                            @break
                        @case('converted')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">{{ $lead->lead_status }}</span>
                            @break
                        @case('lost')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">{{ $lead->lead_status }}</span>
                            @break
                        @default
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 uppercase">{{ $lead->lead_status ?? 'N/A' }}</span>
                    @endswitch
                </div>
            </div>
        </div>

        {{-- Trip Details Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Trip Details</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Vehicle</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->vehicle?->name ?? 'N/A' }} {{ $lead->vehicle?->plate_number ? '(' . $lead->vehicle->plate_number . ')' : '' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Driver</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->assignedDriver?->name ?? 'Not Assigned' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Trip Type</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->trip_type ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pickup GPS</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-[180px] truncate" title="{{ $lead->pickup_location_gps }}">{{ $lead->pickup_location_gps ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Dropoff GPS</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-[180px] truncate" title="{{ $lead->dropoff_location_gps }}">{{ $lead->dropoff_location_gps ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-start py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pickup Desc.</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-[180px]">{{ $lead->pickup_location_description ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-start py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Dropoff Desc.</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-[180px]">{{ $lead->dropoff_location_description ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pickup Time</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->pickup_time?->format('d M Y H:i') ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Duration</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->duration ? $lead->duration . ' min' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Distance</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->distance ? $lead->distance . ' km' : 'N/A' }}</span>
                </div>
            </div>
        </div>

        {{-- Fare & Payment Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Fare & Payment</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Base Fare</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->base_fare ? number_format($lead->base_fare, 2) . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Discount</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->discount_amount ? number_format($lead->discount_amount, 2) . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Amount</span>
                    <span class="text-sm font-bold text-gray-900">{{ $lead->total_amount ? number_format($lead->total_amount, 2) . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Tips</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->tips_amount ? number_format($lead->tips_amount, 2) . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Toll Fee</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->toll_fee ? number_format($lead->toll_fee, 2) . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Extras</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->extras ? number_format($lead->extras, 2) . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">On Contract</span>
                    @if ($lead->on_contract)
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>
                    @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">No</span>
                    @endif
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Contract Provider</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->contract_provider_name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Payment Mode</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->payment_mode ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ITC Sync Status Card --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">ITC Sync Status</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">ITC Sync Status</span>
                    @switch($lead->itc_sync_status)
                        @case('pending')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">{{ $lead->itc_sync_status }}</span>
                            @break
                        @case('synced')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">{{ $lead->itc_sync_status }}</span>
                            @break
                        @case('failed')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">{{ $lead->itc_sync_status }}</span>
                            @break
                        @default
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 uppercase">{{ $lead->itc_sync_status ?? 'N/A' }}</span>
                    @endswitch
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Trip ID</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_trip_id ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Booking ID</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_booking_id ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Batch ID</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_batch_id ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Transaction Type</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_transaction_type ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Status Code</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_status_code ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Status Message</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_status_message ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Synced At</span>
                    <span class="text-sm font-medium text-gray-900">{{ $lead->itc_synced_at?->format('d M Y H:i:s') ?? 'Never' }}</span>
                </div>
                <div class="flex justify-between items-start py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Error Log</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $lead->itc_error_log ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center gap-4">
        <a href="{{ route('lead.edit', ['lead' => $lead]) }}"
            class="flex items-center gap-2 px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19.09 14.441v4.44a2.37 2.37 0 0 1-2.369 2.369H5.12a2.37 2.37 0 0 1-2.369-2.383V7.279a2.356 2.356 0 0 1 2.37-2.37H9.56" />
                <path d="M6.835 15.803v-2.165c.002-.357.144-.7.395-.953l9.532-9.532a1.36 1.36 0 0 1 1.934 0l2.151 2.151a1.36 1.36 0 0 1 0 1.934l-9.532 9.532a1.36 1.36 0 0 1-.953.395H8.197a1.36 1.36 0 0 1-1.362-1.362M19.09 8.995l-4.085-4.086" />
            </svg>
            Edit Lead
        </a>

        <form action="{{ route('itc.submit-trip', $lead) }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
                </svg>
                Submit to ITC
            </button>
        </form>
    </div>
</x-app-layout>
