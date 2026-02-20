<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Vehicle Details
            </h2>
            <p class="text-gray-500 text-sm">View complete vehicle information and ITC permit data</p>
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

    {{-- Vehicle Image --}}
    @if ($vehicle->picture)
        <div class="mb-6 bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="p-6 flex justify-center">
                <img src="{{ asset($vehicle->picture) }}" alt="{{ $vehicle->name }}" class="max-h-64 rounded-xl object-contain">
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Basic Info Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Basic Information</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Name</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->name }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Model</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->model ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Type</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->type ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Seats</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->seats ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Transmission</span>
                    <span class="text-sm font-medium text-gray-900 capitalize">{{ $vehicle->transmission ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Per Day Charges</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->per_day_charges ? $vehicle->per_day_charges . ' AED' : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Plate Number</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->plate_number ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Plate Code</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->plate_code ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Status</span>
                    @if ($vehicle->itc_status)
                        @switch($vehicle->itc_status)
                            @case('pending')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">{{ $vehicle->itc_status }}</span>
                                @break
                            @case('approved')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">{{ $vehicle->itc_status }}</span>
                                @break
                            @default
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">{{ $vehicle->itc_status }}</span>
                        @endswitch
                    @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">N/A</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- ITC Permit Data Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">ITC Permit Data</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">ITC Status</span>
                    @if ($vehicle->itc_status)
                        @switch($vehicle->itc_status)
                            @case('pending')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">{{ $vehicle->itc_status }}</span>
                                @break
                            @case('approved')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">{{ $vehicle->itc_status }}</span>
                                @break
                            @default
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">{{ $vehicle->itc_status }}</span>
                        @endswitch
                    @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">N/A</span>
                    @endif
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Permit Number</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_permit_number ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Permit Expiry</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_permit_expiry_date?->format('d M Y') ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Plate Source</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_plate_source ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Insurance Type</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_insurance_type ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Insurance Provider</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_insurance_provider ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Insurance Policy Number</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_insurance_policy_number ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Registration Expiry</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_registration_expiry_date?->format('d M Y') ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Operator Type</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_operator_type ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Vehicle Brand</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_vehicle_brand ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Vehicle Year</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_vehicle_year ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Vehicle Model</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_vehicle_model ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Chassis Number</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_chassis_number ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Eligible for Trip</span>
                    @if ($vehicle->itc_is_eligible_for_trip === true)
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>
                    @elseif ($vehicle->itc_is_eligible_for_trip === false)
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">No</span>
                    @else
                        <span class="text-sm font-medium text-gray-900">N/A</span>
                    @endif
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Last Synced</span>
                    <span class="text-sm font-medium text-gray-900">{{ $vehicle->itc_last_synced_at?->format('d M Y H:i:s') ?? 'Never' }}</span>
                </div>
                <div class="flex justify-between items-start py-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Remarks</span>
                    <span class="text-sm font-medium text-gray-900 text-right max-w-xs">{{ $vehicle->itc_remarks ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="mt-6 flex items-center gap-4">
        <form action="{{ route('itc.sync-vehicle', $vehicle) }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
                </svg>
                Sync ITC Data
            </button>
        </form>

        <a href="{{ route('vehicle.edit', ['vehicle' => $vehicle]) }}"
            class="flex items-center gap-2 px-6 py-3 font-semibold bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19.09 14.441v4.44a2.37 2.37 0 0 1-2.369 2.369H5.12a2.37 2.37 0 0 1-2.369-2.383V7.279a2.356 2.356 0 0 1 2.37-2.37H9.56" />
                <path d="M6.835 15.803v-2.165c.002-.357.144-.7.395-.953l9.532-9.532a1.36 1.36 0 0 1 1.934 0l2.151 2.151a1.36 1.36 0 0 1 0 1.934l-9.532 9.532a1.36 1.36 0 0 1-.953.395H8.197a1.36 1.36 0 0 1-1.362-1.362M19.09 8.995l-4.085-4.086" />
            </svg>
            Edit Vehicle
        </a>
    </div>
</x-app-layout>
