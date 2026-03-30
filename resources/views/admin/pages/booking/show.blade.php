<x-app-layout>
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Booking Details
            </h2>
            <p class="text-gray-500 text-sm">View complete booking information</p>
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

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Trip Info Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Trip Information</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Trip ID</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->trip_id ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Trip Type</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->trip_type ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Driver</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->driver?->name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Vehicle</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->vehicle?->name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pickup Time</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->pickup_time ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Duration</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->duration ? $booking->duration . ' mins' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Distance</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->distance ? $booking->distance . ' km' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pickup Location</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $booking->pickup_location ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-start py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pickup Description</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $booking->pickup_location_description ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Drop Off Location</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $booking->drop_off_location ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-start py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Drop Off Description</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $booking->drop_off_location_description ?? 'N/A' }}</span>
                </div>
            </div>
        </div>

        {{-- Customer & Payment Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Customer & Payment</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Customer Name</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->customer_name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Mobile Number</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->customer_mobile_number ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Email</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->customer_email_id ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Base Fare</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->base_fare ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Discount Amount</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->discount_amount ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Amount</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->total_amount ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Tips</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->tips_amount ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Toll Fee</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->toll_fee ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Extras</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->extras ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Payment Mode</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->payment_mode ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">On Contract</span>
                    @if ($booking->on_contract == 1)
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>
                    @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">No</span>
                    @endif
                </div>
                @if ($booking->on_contract == 1)
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Contract Provider</span>
                        <span class="text-sm font-medium text-gray-900">{{ $booking->contract_provider_name ?? 'N/A' }}</span>
                    </div>
                @endif
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Created At</span>
                    <span class="text-sm font-medium text-gray-900">{{ $booking->created_at?->format('d M Y H:i') ?? 'N/A' }}</span>
                </div>
            </div>
        </div>

        {{-- ITC Sync Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden lg:col-span-2">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">ITC Sync Information</h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-12">
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Sync Status</span>
                        @php $syncStatus = $booking->itc_sync_status ?? null; @endphp
                        @if ($syncStatus === 'pending')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">Pending</span>
                        @elseif ($syncStatus === 'synced')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">Synced</span>
                        @elseif ($syncStatus === 'failed')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">Failed</span>
                        @else
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">N/A</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Transaction Type</span>
                        <span class="text-sm font-medium text-gray-900">{{ $booking->itc_transaction_type ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Batch ID</span>
                        <span class="text-sm font-medium text-gray-900">{{ $booking->itc_batch_id ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Status Code</span>
                        <span class="text-sm font-medium text-gray-900">{{ $booking->itc_status_code ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Status ID</span>
                        <span class="text-sm font-medium text-gray-900">{{ $booking->itc_status_id ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Status Message</span>
                        <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $booking->itc_status_message ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Synced At</span>
                        <span class="text-sm font-medium text-gray-900">{{ $booking->itc_synced_at ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Error Log</span>
                        <span class="text-sm font-medium text-gray-900 text-right max-w-xs break-words">{{ $booking->itc_error_log ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Action Buttons --}}
    {{-- <div class="mt-6 flex items-center gap-4">
        <a href="{{ route('booking.edit', ['booking' => $booking]) }}"
            class="flex items-center gap-2 px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19.09 14.441v4.44a2.37 2.37 0 0 1-2.369 2.369H5.12a2.37 2.37 0 0 1-2.369-2.383V7.279a2.356 2.356 0 0 1 2.37-2.37H9.56" />
                <path d="M6.835 15.803v-2.165c.002-.357.144-.7.395-.953l9.532-9.532a1.36 1.36 0 0 1 1.934 0l2.151 2.151a1.36 1.36 0 0 1 0 1.934l-9.532 9.532a1.36 1.36 0 0 1-.953.395H8.197a1.36 1.36 0 0 1-1.362-1.362M19.09 8.995l-4.085-4.086" />
            </svg>
            Edit Booking
        </a>
    </div> --}}
</x-app-layout>