@extends('driver.layouts.app')
@section('content')
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Welcome, {{ Auth::user()->name }}</h2>
            <p class="text-gray-500 text-sm">Here's an overview of your activity</p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">My Vehicles</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $vehicleCount }}</p>
                </div>
                <div class="p-3 bg-[#c9982b]/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="#c9982b" d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4zM7.5 13a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m9 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m-.736-7H8.236a1 1 0 0 0-.832.445l-.062.108l-1.27 2.538C7.62 9.555 9.706 10 12 10c2.142 0 4.101-.388 5.61-.817l.317-.092l-1.269-2.538a1 1 0 0 0-.77-.545L15.765 6Z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('driver.vehicle.index') }}" class="inline-block mt-4 text-sm font-medium text-[#c9982b] hover:underline">View all vehicles &rarr;</a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">My Bookings</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $bookingCount }}</p>
                </div>
                <div class="p-3 bg-[#c9982b]/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="#c9982b" d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z"/>
                        <path fill="#c9982b" fill-rule="evenodd" d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('driver.booking.index') }}" class="inline-block mt-4 text-sm font-medium text-[#c9982b] hover:underline">View all bookings &rarr;</a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Expenses</p>
                    <p class="text-3xl font-bold text-red-600 mt-1">AED {{ number_format($totalExpenses, 2) }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="#dc2626" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87c1.96 0 2.4-.98 2.4-1.59c0-.83-.44-1.61-2.67-2.14c-2.48-.6-4.18-1.62-4.18-3.67c0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87c-1.5 0-2.4.68-2.4 1.64c0 .84.65 1.39 2.67 1.94s4.18 1.36 4.18 3.85c0 1.89-1.44 2.98-3.12 3.19"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('driver.expense.index') }}" class="inline-block mt-4 text-sm font-medium text-[#c9982b] hover:underline">View all expenses &rarr;</a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Expense Records</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $expenseCount }}</p>
                </div>
                <div class="p-3 bg-[#c9982b]/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="#c9982b" d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8zm2 14H8v-2h8zm0-4H8v-2h8zm-3-5V3.5L18.5 9z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('driver.expense.create') }}" class="inline-block mt-4 text-sm font-medium text-[#c9982b] hover:underline">Add expense &rarr;</a>
        </div>
    </div>

    {{-- Recent Bookings --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold text-white">Recent Bookings</h3>
            <a href="{{ route('driver.booking.create') }}" class="px-4 py-2 bg-white text-[#c9982b] rounded-lg text-sm font-medium hover:bg-gray-50 transition-all">+ New Booking</a>
        </div>
        <div class="p-6">
            @if($recentBookings->isEmpty())
                <p class="text-gray-500 text-center py-8">No bookings yet. Create your first booking!</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 font-medium">Trip ID</th>
                                <th class="pb-3 font-medium">Type</th>
                                <th class="pb-3 font-medium">Customer</th>
                                <th class="pb-3 font-medium">Pickup Time</th>
                                <th class="pb-3 font-medium">Total</th>
                                <th class="pb-3 font-medium">ITC Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBookings as $booking)
                                <tr class="border-b last:border-0 hover:bg-gray-50">
                                    <td class="py-3 font-medium text-gray-800">{{ $booking->trip_id }}</td>
                                    <td class="py-3 text-gray-600">{{ $booking->trip_type }}</td>
                                    <td class="py-3 text-gray-600">{{ $booking->customer_name ?? 'N/A' }}</td>
                                    <td class="py-3 text-gray-600">{{ $booking->pickup_time ? $booking->pickup_time->format('d M Y H:i') : 'N/A' }}</td>
                                    <td class="py-3 font-medium text-gray-800">AED {{ number_format($booking->total_amount, 2) }}</td>
                                    <td class="py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium
                                            {{ $booking->itc_sync_status === 'synced' ? 'bg-green-100 text-green-700' : ($booking->itc_sync_status === 'failed' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                            {{ ucfirst($booking->itc_sync_status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
