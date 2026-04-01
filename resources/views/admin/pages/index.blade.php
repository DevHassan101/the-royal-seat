<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Dashboard</h2>
            <p class="text-gray-500 text-sm">Business overview and analytics</p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:!grid-cols-3 lg:!grid-cols-3 xl:!grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Revenue</p>
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="#16a34a"
                            d="M5 20V7l7-5l7 5v13H5m7-8q.825 0 1.413-.587T14 10t-.587-1.412T12 8t-1.412.588T10 10t.588 1.413T12 12m-4 6h8v-.575q0-.6-.325-1.088T14.8 15.7q-.5-.2-1.012-.3t-1.038-.1h-1.5q-.525 0-1.037.1t-1.013.3q-.55.15-.875.638T8 17.425z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">AED {{ number_format($totalRevenue, 2) }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase">Expenses</p>
                <div class="p-2 bg-red-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.2" viewBox="0 0 1000 870" width="20"
                        height="20">
                        <script xmlns="" id="eppiocemhmnlbhjplcgkofciiegomcon" />
                        <script xmlns="" />
                        <script xmlns="" />
                        <title>Layer copy</title>
                        <style>
                            .s0 {
                                fill: #dc2626
                            }
                        </style>
                        <path id="Layer copy" class="s0"
                            d="m88.3 1c0.4 0.6 2.6 3.3 4.7 5.9 15.3 18.2 26.8 47.8 33 85.1 4.1 24.5 4.3 32.2 4.3 125.6v87h-41.8c-38.2 0-42.6-0.2-50.1-1.7-11.8-2.5-24-9.2-32.2-17.8-6.5-6.9-6.3-7.3-5.9 13.6 0.5 17.3 0.7 19.2 3.2 28.6 4 14.9 9.5 26 17.8 35.9 11.3 13.6 22.8 21.2 39.2 26.3 3.5 1 10.9 1.4 37.1 1.6l32.7 0.5v43.3 43.4l-46.1-0.3-46.3-0.3-8-3.2c-9.5-3.8-13.8-6.6-23.1-14.9l-6.8-6.1 0.4 19.1c0.5 17.7 0.6 19.7 3.1 28.7 8.7 31.8 29.7 54.5 57.4 61.9 6.9 1.9 9.6 2 38.5 2.4l30.9 0.4v89.6c0 54.1-0.3 94-0.8 100.8-0.5 6.2-2.1 17.8-3.5 25.9-6.5 37.3-18.2 65.4-35 83.6l-3.4 3.7h169.1c101.1 0 176.7-0.4 187.8-0.9 19.5-1 63-5.3 72.8-7.4 3.1-0.6 8.9-1.5 12.7-2.1 8.1-1.2 21.5-4 40.8-8.9 27.2-6.8 52-15.3 76.3-26.1 7.6-3.4 29.4-14.5 35.2-18 3.1-1.8 6.8-4 8.2-4.7 3.9-2.1 10.4-6.3 19.9-13.1 4.7-3.4 9.4-6.7 10.4-7.4 4.2-2.8 18.7-14.9 25.3-21 25.1-23.1 46.1-48.8 62.4-76.3 2.3-4 5.3-9 6.6-11.1 3.3-5.6 16.9-33.6 18.2-37.8 0.6-1.9 1.4-3.9 1.8-4.3 2.6-3.4 17.6-50.6 19.4-60.9 0.6-3.3 0.9-3.8 3.4-4.3 1.6-0.3 24.9-0.3 51.8-0.1 53.8 0.4 53.8 0.4 65.7 5.9 6.7 3.1 8.7 4.5 16.1 11.2 9.7 8.7 8.8 10.1 8.2-11.7-0.4-12.8-0.9-20.7-1.8-23.9-3.4-12.3-4.2-14.9-7.2-21.1-9.8-21.4-26.2-36.7-47.2-44l-8.2-3-33.4-0.4-33.3-0.5 0.4-11.7c0.4-15.4 0.4-45.9-0.1-61.6l-0.4-12.6 44.6-0.2c38.2-0.2 45.3 0 49.5 1.1 12.6 3.5 21.1 8.3 31.5 17.8l5.8 5.4v-14.8c0-17.6-0.9-25.4-4.5-37-7.1-23.5-21.1-41-41.1-51.8-13-7-13.8-7.2-58.5-7.5-26.2-0.2-39.9-0.6-40.6-1.2-0.6-0.6-1.1-1.6-1.1-2.4 0-0.8-1.5-7.1-3.5-13.9-23.4-82.7-67.1-148.4-131-197.1-8.7-6.7-30-20.8-38.6-25.6-3.3-1.9-6.9-3.9-7.8-4.5-4.2-2.3-28.3-14.1-34.3-16.6-3.6-1.6-8.3-3.6-10.4-4.4-35.3-15.3-94.5-29.8-139.7-34.3-7.4-0.7-17.2-1.8-21.7-2.2-20.4-2.3-48.7-2.6-209.4-2.6-135.8 0-169.9 0.3-169.4 1zm330.7 43.3c33.8 2 54.6 4.6 78.9 10.5 74.2 17.6 126.4 54.8 164.3 117 3.5 5.8 18.3 36 20.5 42.1 10.5 28.3 15.6 45.1 20.1 67.3 1.1 5.4 2.6 12.6 3.3 16 0.7 3.3 1 6.4 0.7 6.7-0.5 0.4-100.9 0.6-223.3 0.5l-222.5-0.2-0.3-128.5c-0.1-70.6 0-129.3 0.3-130.4l0.4-1.9h71.1c39 0 78 0.4 86.5 0.9zm297.5 350.3c0.7 4.3 0.7 77.3 0 80.9l-0.6 2.7-227.5-0.2-227.4-0.3-0.2-42.4c-0.2-23.3 0-42.7 0.2-43.1 0.3-0.5 97.2-0.8 227.7-0.8h227.2zm-10.2 171.7c0.5 1.5-1.9 13.8-6.8 33.8-5.6 22.5-13.2 45.2-20.9 62-3.8 8.6-13.3 27.2-15.6 30.7-1.1 1.6-4.3 6.7-7.1 11.2-18 28.2-43.7 53.9-73 72.9-10.7 6.8-32.7 18.4-38.6 20.2-1.2 0.3-2.5 0.9-3 1.3-0.7 0.6-9.8 4-20.4 7.8-19.5 6.9-56.6 14.4-86.4 17.5-19.3 1.9-22.4 2-96.7 2h-76.9v-129.7-129.8l220.9-0.4c121.5-0.2 221.6-0.5 222.4-0.7 0.9-0.1 1.8 0.5 2.1 1.2z" />
                        </svg>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#dc2626" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87c1.96 0 2.4-.98 2.4-1.59c0-.83-.44-1.61-2.67-2.14c-2.48-.6-4.18-1.62-4.18-3.67c0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87c-1.5 0-2.4.68-2.4 1.64c0 .84.65 1.39 2.67 1.94s4.18 1.36 4.18 3.85c0 1.89-1.44 2.98-3.12 3.19"/></svg> --}}
                        </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800">AED {{ number_format($totalExpenses, 2) }}</p>
                        </div>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-xs font-medium text-gray-500 uppercase">Net Profit</p>
                                <div class="p-2 {{ $netProfit >= 0 ? 'bg-green-100' : 'bg-red-100' }} rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="{{ $netProfit >= 0 ? '#16a34a' : '#dc2626' }}"
                                            d="M3.5 18.49l6-6.01l4 4L22 6.92l-1.41-1.41l-7.09 7.97l-4-4L2 16.99z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-2xl font-bold {{ $netProfit >= 0 ? 'text-green-600' : 'text-red-600' }}">AED
                                {{ number_format($netProfit, 2) }}</p>
                        </div>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-xs font-medium text-gray-500 uppercase">Bookings</p>
                                <div class="p-2 bg-[#c9982b]/10 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#c9982b"
                                            d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z" />
                                        <path fill="#c9982b" fill-rule="evenodd"
                                            d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalBookings }}</p>
                        </div>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-xs font-medium text-gray-500 uppercase">Drivers</p>
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#2563eb"
                                            d="M12 3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5m-4 9.5A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517c4.278.699 8.642.699 12.92 0a1.54 1.54 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34q-.28.001-.544.086l-.866.283a7.25 7.25 0 0 1-4.5 0l-.866-.283a1.8 1.8 0 0 0-.543-.086z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalDrivers }}</p>
                        </div>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-xs font-medium text-gray-500 uppercase">Vehicles</p>
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#9333ea"
                                            d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalVehicles }}</p>
                        </div>
                        </div>

                        {{-- Charts Row --}}
                        <div class="grid grid-cols-1 md:!grid-cols-2 gap-6 mb-8">
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

                        <div class="grid grid-cols-1 md:!grid-cols-2 gap-6 mb-8">
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
                        <div class="grid grid-cols-1 md:!grid-cols-2 gap-6 mb-8">
                            {{-- Top Drivers --}}
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                                    <h3 class="text-lg font-semibold text-white">Top Drivers by Revenue</h3>
                                </div>
                                <div class="p-6">
                                    @if ($topDrivers->isEmpty())
                                    <p class="text-gray-500 text-center py-4">No data yet.</p>
                                    @else
                                    <div class="space-y-4">
                                        @foreach ($topDrivers as $i => $td)
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <span
                                                    class="w-8 h-8 flex items-center justify-center rounded-full {{ $i === 0 ? 'bg-[#c9982b] text-white' : 'bg-gray-100 text-gray-600' }} text-sm font-bold">{{ $i + 1 }}</span>
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
                                    @if ($recentBookings->isEmpty())
                                    <p class="text-gray-500 text-center py-4">No bookings yet.</p>
                                    @else
                                    <div class="space-y-3">
                                        @foreach ($recentBookings as $booking)
                                        <div class="flex items-center justify-between py-2 border-b last:border-0">
                                            <div>
                                                <p class="font-medium text-gray-800 text-sm">{{ $booking->trip_id }}</p>
                                                <p class="text-xs text-gray-500">{{ $booking->driver->name ?? 'N/A' }} &bull;
                                                    {{ $booking->created_at->format('d M Y') }}</p>
                                            </div>
                                            <span class="font-semibold text-gray-800 text-sm">AED
                                                {{ number_format($booking->total_amount, 2) }}</span>
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
                                    datasets: [{
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
                                    plugins: {
                                        legend: {
                                            position: 'top'
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                callback: v => 'AED ' + v.toLocaleString()
                                            }
                                        }
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
                                        backgroundColor: ['#c9982b', '#ef4444', '#3b82f6', '#8b5cf6', '#f59e0b', '#10b981',
                                            '#6366f1'
                                        ]
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'bottom'
                                        }
                                    }
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
                                    plugins: {
                                        legend: {
                                            position: 'bottom'
                                        }
                                    }
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
                                    plugins: {
                                        legend: {
                                            position: 'bottom'
                                        }
                                    }
                                }
                            });
                        </script>
</x-app-layout>
