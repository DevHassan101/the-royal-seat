@extends('driver.layouts.app')
@section('content')
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">My Bookings</h2>
            <p class="text-gray-500 text-sm">Manage your trip bookings</p>
        </div>
        <a href="{{ route('driver.booking.create') }}"
            class="flex items-center gap-2 rounded-xl px-5 py-3 bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white transition-all duration-300 shadow-md hover:shadow-lg font-medium"
            style="color: #c9982b">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14" />
            </svg>
            New Booking
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">Booking List</h3>
        </div>
        <div class="p-6">
            @if($bookings->isEmpty())
                <p class="text-gray-500 text-center py-8">No bookings yet. Create your first booking!</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 font-medium">Trip Details</th>
                                <th class="pb-3 font-medium">Customer</th>
                                <th class="pb-3 font-medium">Pickup</th>
                                <th class="pb-3 font-medium">Vehicle</th>
                                <th class="pb-3 font-medium">Fare</th>
                                <th class="pb-3 font-medium">ITC Status</th>
                                <th class="pb-3 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr class="border-b last:border-0 hover:bg-gray-50">
                                    <td class="py-3">
                                        <p class="font-medium text-gray-800">{{ $booking->trip_id }}</p>
                                        <p class="text-xs text-gray-500">{{ $booking->trip_type }}</p>
                                    </td>
                                    <td class="py-3">
                                        <p class="text-gray-700">{{ $booking->customer_name ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-400">{{ $booking->customer_mobile_number ?? '' }}</p>
                                    </td>
                                    <td class="py-3">
                                        <p class="text-gray-700">{{ $booking->pickup_time ? $booking->pickup_time->format('d M Y H:i') : 'N/A' }}</p>
                                        <p class="text-xs text-gray-400 truncate max-w-[150px]">{{ $booking->pickup_location_description ?? '' }}</p>
                                    </td>
                                    <td class="py-3">
                                        <p class="text-gray-700">{{ $booking->vehicle->name ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-400">{{ $booking->vehicle->plate_number ?? '' }}</p>
                                    </td>
                                    <td class="py-3">
                                        <p class="font-medium text-gray-800">AED {{ number_format($booking->total_amount, 2) }}</p>
                                        <p class="text-xs text-gray-400">{{ $booking->payment_mode }}</p>
                                    </td>
                                    <td class="py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium
                                            {{ $booking->itc_sync_status === 'synced' ? 'bg-green-100 text-green-700' : ($booking->itc_sync_status === 'failed' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                            {{ ucfirst($booking->itc_sync_status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 text-right">
                                        <form action="{{ route('driver.booking.destroy', $booking) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM9 17h2V8H9zm4 0h2V8h-2z"/>
                                                </svg>
                                            </button>
                                        </form>
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
