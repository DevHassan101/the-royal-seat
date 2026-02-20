<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                ITC Sync Logs
            </h2>
            <p class="text-gray-500 text-sm">Full history of all ITC synchronization operations</p>
        </div>
        <a href="{{ route('itc.index') }}"
            class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Back to Dashboard
        </a>
    </div>

    {{-- Filter Form --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-3">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Filters</h3>
        </div>
        <div class="px-6 py-4">
            <form action="{{ route('itc.logs') }}" method="GET" class="flex flex-wrap items-end gap-4">
                {{-- Sync Type --}}
                <div class="flex-1 min-w-[180px]">
                    <label for="sync_type" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Sync Type</label>
                    <select name="sync_type" id="sync_type"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-colors duration-200">
                        <option value="">All Types</option>
                        <option value="token" {{ request('sync_type') === 'token' ? 'selected' : '' }}>Token</option>
                        <option value="vehicle_permit" {{ request('sync_type') === 'vehicle_permit' ? 'selected' : '' }}>Vehicle Permit</option>
                        <option value="driver_permit" {{ request('sync_type') === 'driver_permit' ? 'selected' : '' }}>Driver Permit</option>
                        <option value="trip" {{ request('sync_type') === 'trip' ? 'selected' : '' }}>Trip</option>
                    </select>
                </div>

                {{-- Status --}}
                <div class="flex-1 min-w-[180px]">
                    <label for="status" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-colors duration-200">
                        <option value="">All Statuses</option>
                        <option value="success" {{ request('status') === 'success' ? 'selected' : '' }}>Success</option>
                        <option value="failed" {{ request('status') === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                {{-- Triggered By --}}
                <div class="flex-1 min-w-[180px]">
                    <label for="triggered_by" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Triggered By</label>
                    <select name="triggered_by" id="triggered_by"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#c9982b] focus:border-[#c9982b] transition-colors duration-200">
                        <option value="">All Sources</option>
                        <option value="manual" {{ request('triggered_by') === 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="scheduler" {{ request('triggered_by') === 'scheduler' ? 'selected' : '' }}>Scheduler</option>
                        <option value="system" {{ request('triggered_by') === 'system' ? 'selected' : '' }}>System</option>
                    </select>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-2">
                    <button type="submit"
                        class="rounded-lg bg-gradient-to-r from-[#c9982b] to-[#a67d23] text-white px-5 py-2.5 text-sm font-semibold hover:shadow-lg transition-all duration-300">
                        Apply Filters
                    </button>
                    <a href="{{ route('itc.logs') }}"
                        class="rounded-lg bg-gray-100 text-gray-700 px-5 py-2.5 text-sm font-semibold hover:bg-gray-200 transition-all duration-300">
                        Clear
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Logs Table --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">
                Sync Logs
            </h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50 border-b-2 border-gray-200">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            ID
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Sync Type
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Status
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Entity
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Error Message
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Triggered By
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($logs as $log)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 font-medium">#{{ $log->id }}</p>
                            </td>
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
                                @if ($log->error_message)
                                    <p class="text-red-600 text-xs max-w-[200px] truncate" title="{{ $log->error_message }}">
                                        {{ $log->error_message }}
                                    </p>
                                @else
                                    <span class="text-gray-400 text-xs">&mdash;</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 capitalize">
                                    {{ $log->triggered_by }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">
                                    {{ $log->created_at->format('d M Y, H:i') }}
                                </p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <polyline points="14 2 14 8 20 8" />
                                        <line x1="16" y1="13" x2="8" y2="13" />
                                        <line x1="16" y1="17" x2="8" y2="17" />
                                    </svg>
                                    <p class="mt-4 text-lg font-medium text-gray-500">No sync logs found</p>
                                    <p class="mt-1 text-sm text-gray-400">Try adjusting your filters or perform a sync operation</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($logs->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $logs->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
