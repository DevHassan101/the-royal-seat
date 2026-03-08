<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Dashboard</h2>
            <p class="text-gray-500 text-sm">Business overview and analytics</p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:!grid-cols-2 lg:!grid-cols-3 xl:!grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Revenue</p>
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#16a34a" d="M5 20V7l7-5l7 5v13H5m7-8q.825 0 1.413-.587T14 10t-.587-1.412T12 8t-1.412.588T10 10t.588 1.413T12 12m-4 6h8v-.575q0-.6-.325-1.088T14.8 15.7q-.5-.2-1.012-.3t-1.038-.1h-1.5q-.525 0-1.037.1t-1.013.3q-.55.15-.875.638T8 17.425z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">AED {{ number_format($totalRevenue, 2) }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Expenses</p>
                <div class="p-2 bg-red-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#dc2626" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87c1.96 0 2.4-.98 2.4-1.59c0-.83-.44-1.61-2.67-2.14c-2.48-.6-4.18-1.62-4.18-3.67c0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87c-1.5 0-2.4.68-2.4 1.64c0 .84.65 1.39 2.67 1.94s4.18 1.36 4.18 3.85c0 1.89-1.44 2.98-3.12 3.19"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">AED {{ number_format($totalExpenses, 2) }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Net Profit</p>
                <div class="p-2 {{ $netProfit >= 0 ? 'bg-green-100' : 'bg-red-100' }} rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="{{ $netProfit >= 0 ? '#16a34a' : '#dc2626' }}" d="M3.5 18.49l6-6.01l4 4L22 6.92l-1.41-1.41l-7.09 7.97l-4-4L2 16.99z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold {{ $netProfit >= 0 ? 'text-green-600' : 'text-red-600' }}">AED {{ number_format($netProfit, 2) }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Bookings</p>
                <div class="p-2 bg-[#c9982b]/10 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#c9982b" d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z"/><path fill="#c9982b" fill-rule="evenodd" d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14z" clip-rule="evenodd"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Drivers</p>
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#2563eb" d="M12 3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5m-4 9.5A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517c4.278.699 8.642.699 12.92 0a1.54 1.54 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34q-.28.001-.544.086l-.866.283a7.25 7.25 0 0 1-4.5 0l-.866-.283a1.8 1.8 0 0 0-.543-.086z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $totalDrivers }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Vehicles</p>
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#9333ea" d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $totalVehicles }}</p>
        </div>
    </div>

    {{-- Charts Row --}}
    <div class="grid grid-cols-1 lg:!grid-cols-2 gap-6 mb-8">
        {{-- Revenue vs Expenses Chart --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Revenue vs Expenses</h3>
            </div>
            <div class="p-6">
                <canvas id="revenueExpenseChart" height="280"></canvas>
            </div>
        </div>

        {{-- Expense by Category --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Expenses by Category</h3>
            </div>
            <div class="p-6 flex items-center justify-center">
                <canvas id="expenseCategoryChart" height="280"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:!grid-cols-2 gap-6 mb-8">
        {{-- Trip Type Chart --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Bookings by Trip Type</h3>
            </div>
            <div class="p-6 flex items-center justify-center">
                <canvas id="tripTypeChart" height="280"></canvas>
            </div>
        </div>

        {{-- Payment Mode Chart --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Payment Mode Distribution</h3>
            </div>
            <div class="p-6 flex items-center justify-center">
                <canvas id="paymentModeChart" height="280"></canvas>
            </div>
        </div>
    </div>

    {{-- Top Drivers & Recent Activity --}}
    <div class="grid grid-cols-1 lg:!grid-cols-2 gap-6 mb-8">
        {{-- Top Drivers --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Top Drivers by Revenue</h3>
            </div>
            <div class="p-6">
                @if($topDrivers->isEmpty())
                    <p class="text-gray-500 text-center py-4">No data yet.</p>
                @else
                    <div class="space-y-4">
                        @foreach($topDrivers as $i => $td)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="w-8 h-8 flex items-center justify-center rounded-full {{ $i === 0 ? 'bg-[#c9982b] text-white' : 'bg-gray-100 text-gray-600' }} text-sm font-bold">{{ $i + 1 }}</span>
                                    <span class="font-medium text-gray-800">{{ $td->driver->name ?? 'N/A' }}</span>
                                </div>
                                <span class="font-semibold text-green-600">AED {{ number_format($td->revenue, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        {{-- Recent Bookings --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-white">Recent Bookings</h3>
                <a href="{{ route('booking.index') }}" class="text-white/80 hover:text-white text-sm">View All &rarr;</a>
            </div>
            <div class="p-6">
                @if($recentBookings->isEmpty())
                    <p class="text-gray-500 text-center py-4">No bookings yet.</p>
                @else
                    <div class="space-y-3">
                        @foreach($recentBookings as $booking)
                            <div class="flex items-center justify-between py-2 border-b last:border-0">
                                <div>
                                    <p class="font-medium text-gray-800 text-sm">{{ $booking->trip_id }}</p>
                                    <p class="text-xs text-gray-500">{{ $booking->driver->name ?? 'N/A' }} &bull; {{ $booking->created_at->format('d M Y') }}</p>
                                </div>
                                <span class="font-semibold text-gray-800 text-sm">AED {{ number_format($booking->total_amount, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        // Revenue vs Expenses Bar Chart
        new Chart(document.getElementById('revenueExpenseChart'), {
            type: 'bar',
            data: {
                labels: @json($monthLabels),
                datasets: [
                    {
                        label: 'Revenue (AED)',
                        data: @json($monthlyRevenue),
                        backgroundColor: 'rgba(34, 197, 94, 0.7)',
                        borderColor: 'rgb(34, 197, 94)',
                        borderWidth: 1,
                        borderRadius: 4
                    },
                    {
                        label: 'Expenses (AED)',
                        data: @json($monthlyExpenses),
                        backgroundColor: 'rgba(239, 68, 68, 0.7)',
                        borderColor: 'rgb(239, 68, 68)',
                        borderWidth: 1,
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'top' } },
                scales: {
                    y: { beginAtZero: true, ticks: { callback: v => 'AED ' + v.toLocaleString() } }
                }
            }
        });

        // Expense by Category Doughnut
        new Chart(document.getElementById('expenseCategoryChart'), {
            type: 'doughnut',
            data: {
                labels: @json($expenseCategories->keys()),
                datasets: [{
                    data: @json($expenseCategories->values()),
                    backgroundColor: ['#c9982b', '#ef4444', '#3b82f6', '#8b5cf6', '#f59e0b', '#10b981', '#6366f1']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Trip Type Doughnut
        new Chart(document.getElementById('tripTypeChart'), {
            type: 'doughnut',
            data: {
                labels: @json($tripTypes->keys()),
                datasets: [{
                    data: @json($tripTypes->values()),
                    backgroundColor: ['#c9982b', '#3b82f6', '#ef4444', '#10b981', '#8b5cf6', '#f59e0b']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Payment Mode Pie
        new Chart(document.getElementById('paymentModeChart'), {
            type: 'pie',
            data: {
                labels: @json($paymentModes->keys()),
                datasets: [{
                    data: @json($paymentModes->values()),
                    backgroundColor: ['#c9982b', '#3b82f6', '#10b981', '#ef4444']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
</x-app-layout>
