<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                ITC Integration
            </h2>
            <p class="text-gray-500 text-sm">Manage and monitor Intelligent Transport Centre sync operations</p>
        </div>
        <a href="{{ route('itc.logs') }}"
            class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                <polyline points="14 2 14 8 20 8" />
                <line x1="16" y1="13" x2="8" y2="13" />
                <line x1="16" y1="17" x2="8" y2="17" />
                <polyline points="10 9 9 9 8 9" />
            </svg>
            View All Logs
        </a>
    </div>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div id="flash-success"
            class="mb-6 flex items-center justify-between bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl shadow-sm">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" class="text-green-600">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button onclick="document.getElementById('flash-success').remove()"
                class="text-green-600 hover:text-green-800 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div id="flash-error"
            class="mb-6 flex items-center justify-between bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl shadow-sm">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" class="text-red-600">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="15" y1="9" x2="9" y2="15" />
                    <line x1="9" y1="9" x2="15" y2="15" />
                </svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            <button onclick="document.getElementById('flash-error').remove()"
                class="text-red-600 hover:text-red-800 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    @endif

    {{-- Vehicles Stats --}}
    <div class="mb-4">
        <h3 class="text-lg font-semibold text-gray-700 mb-3 ml-1">Vehicles</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Total Vehicles --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Total Vehicles</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['total_vehicles'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Registered in system</p>
                </div>
            </div>

            {{-- Synced Vehicles --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Synced Vehicles</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['synced_vehicles'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Synced with ITC</p>
                </div>
            </div>

            {{-- Approved Vehicles --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Approved Vehicles</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['approved_vehicles'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Approved by ITC</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Drivers Stats --}}
    <div class="mb-4">
        <h3 class="text-lg font-semibold text-gray-700 mb-3 ml-1">Drivers</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Total Drivers --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Total Drivers</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['total_drivers'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Registered in system</p>
                </div>
            </div>

            {{-- Synced Drivers --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Synced Drivers</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['synced_drivers'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Synced with ITC</p>
                </div>
            </div>

            {{-- Approved Drivers --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Approved Drivers</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['approved_drivers'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Approved by ITC</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Trips Stats --}}
    <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-700 mb-3 ml-1">Trips</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Total Leads --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Total Leads</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['total_leads'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Total booking leads</p>
                </div>
            </div>

            {{-- Synced Trips --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Synced Trips</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-gray-800">{{ $stats['synced_trips'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Synced with ITC</p>
                </div>
            </div>

            {{-- Failed Trips --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Failed Trips</h4>
                </div>
                <div class="px-6 py-5">
                    <p class="text-4xl font-bold text-red-600">{{ $stats['failed_trips'] ?? 0 }}</p>
                    <p class="text-sm text-gray-500 mt-1">Failed to sync</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-700 mb-3 ml-1">Sync Actions</h3>
        <div class="flex flex-wrap gap-4">
            <form action="{{ route('itc.sync-all-vehicles') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#c9982b] to-[#a67d23] text-white px-6 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                    onclick="return confirm('Are you sure you want to sync all vehicles with ITC?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10" />
                        <polyline points="1 20 1 14 7 14" />
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
                    </svg>
                    Sync All Vehicles
                </button>
            </form>

            <form action="{{ route('itc.sync-all-drivers') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#c9982b] to-[#a67d23] text-white px-6 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                    onclick="return confirm('Are you sure you want to sync all drivers with ITC?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10" />
                        <polyline points="1 20 1 14 7 14" />
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
                    </svg>
                    Sync All Drivers
                </button>
            </form>
        </div>
    </div>

    {{-- Recent Sync Logs --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-semibold text-white">
                Recent Sync Logs
            </h3>
            <a href="{{ route('itc.logs') }}"
                class="text-white text-sm font-medium hover:underline transition-all duration-200">
                View All &rarr;
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50 border-b-2 border-gray-200">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Type
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Status
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Entity
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Triggered By
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Time
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Error
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($recentLogs as $log)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 uppercase">
                                    {{ str_replace('_', ' ', $log->sync_type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if ($log->status === 'success')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">
                                        {{ $log->status }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">
                                        {{ $log->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">
                                    {{ $log->entity_type }} #{{ $log->entity_id }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 capitalize">
                                    {{ $log->triggered_by }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">
                                    {{ $log->created_at->diffForHumans() }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if ($log->error_message)
                                    <p class="text-red-600 text-xs max-w-xs truncate" title="{{ $log->error_message }}">
                                        {{ $log->error_message }}
                                    </p>
                                @else
                                    <span class="text-gray-400 text-xs">&mdash;</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <polyline points="14 2 14 8 20 8" />
                                        <line x1="16" y1="13" x2="8" y2="13" />
                                        <line x1="16" y1="17" x2="8" y2="17" />
                                    </svg>
                                    <p class="mt-4 text-lg font-medium text-gray-500">No sync logs yet</p>
                                    <p class="mt-1 text-sm text-gray-400">Sync operations will appear here once performed</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
