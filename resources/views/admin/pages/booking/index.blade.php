<x-app-layout>
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Bookings Management
            </h2>
            <p class="text-gray-500 text-sm">View and manage all registered bookings</p>
        </div>
        <a href="{{ route('booking.create') }}"
            class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Booking
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">
                Bookings List
            </h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50 border-b-2 border-gray-200">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Booking Details
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Pickup Details
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Driver Details
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Vehicle Details
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            ITC Status
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($bookings as $booking)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap"><b>Trip ID:</b> {{ $booking->trip_id }}</p>
                                <p class="text-gray-700 whitespace-nowrap"><b>Trip Type:</b> {{ $booking->trip_type }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 flex flex-wrap gap-x-3 gap-y-1">
                                    <span class="whitespace-nowrap">
                                        <b>Pickup Time:</b> {{ $booking->pickup_time }}
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <b>Pickup Location:</b> {{ $booking->pickup_location }}
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <b>DropOff Location:</b> {{ $booking->drop_off_location }}
                                    </span>
                                </p>
                                <p class="text-gray-700 flex flex-wrap gap-x-3 gap-y-1 mt-1">
                                    <span class="whitespace-nowrap">
                                        <b>Duration:</b> {{ $booking->duration }}
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <b>Distance:</b> {{ $booking->distance }}
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <b>Base Fare:</b>
                                        {{ $booking->base_fare }}
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <b>Discount Amount:</b>
                                        {{ $booking->discount_amount }}
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <b>Total Amount:</b> {{ $booking->total_amount }}
                                    </span>
                                </p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c9982b] to-[#a67d23] flex items-center justify-center text-white font-bold text-sm">
                                        {{ substr($booking->driver?->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-gray-900 font-medium whitespace-nowrap">
                                            {{ $booking->driver?->name }}</p>
                                        <a href="mailto:{{ $booking->driver?->email }}"
                                            class="text-gray-700 whitespace-nowrap">{{ $booking->driver?->email }}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset($booking->vehicle?->picture) }}"
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c9982b] to-[#a67d23] flex items-center justify-center text-white font-bold text-sm" />
                                    <div>
                                        <p class="text-gray-900 font-medium whitespace-nowrap">
                                            {{ $booking->vehicle?->name }}</p>
                                        <p class="text-gray-700 whitespace-nowrap">
                                            {{ $booking->vehicle?->itc_permit_number }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if ($booking->itc_sync_status)
                                    @switch($booking->itc_sync_status)
                                        @case('pending')
                                            <span
                                                class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{ $booking->itc_sync_status }}
                                            </span>
                                        @break

                                        @case('approved')
                                            <span
                                                class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ $booking->itc_sync_status }}
                                            </span>
                                        @break

                                        @default
                                            <span
                                                class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                {{ $booking->itc_sync_status }}
                                            </span>
                                    @endswitch
                                @else
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        N/A
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Sync ITC Button -->
                                    {{-- @if ($booking->bookingInfo)
                                        <form action="{{ route('itc.sync-booking', $booking->bookingInfo) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                class="group px-2 py-2 bg-white rounded-lg hover:!bg-green-500 !text-green-500 hover:!text-white transition-all duration-300 font-medium text-xs"
                                                title="Sync ITC Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" class="transition-all duration-300">
                                                    <path
                                                        d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif --}}

                                    <!-- Info Button -->
                                    <a href="{{ route('booking.show', ['booking' => $booking]) }}"
                                        class="group px-2 py-2 bg-white rounded-lg hover:!bg-blue-500 !text-blue-500 hover:!text-white transition-all duration-300 font-medium text-xs"
                                        title="View Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" class="transition-all duration-300">
                                            <g fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" stroke="currentColor"
                                                class="group-hover:stroke-white stroke-blue-500 transition-all duration-300">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M12 16v-4m0-4h.01" />
                                            </g>
                                        </svg>
                                    </a>

                                    <!-- Edit Button -->
                                    {{-- <a href="{{ route('booking.edit', ['booking' => $booking]) }}"
                                        class="group px-2 py-2 bg-white rounded-lg transition-all duration-300 font-medium text-xs hover:!bg-[#c9982b] !text-[#c9982b] hover:!text-white"
                                        title="Edit Booking">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" class="transition-all duration-300">
                                            <g fill="none" stroke-linecap="round" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path
                                                    d="M19.09 14.441v4.44a2.37 2.37 0 0 1-2.369 2.369H5.12a2.37 2.37 0 0 1-2.369-2.383V7.279a2.356 2.356 0 0 1 2.37-2.37H9.56" />
                                                <path
                                                    d="M6.835 15.803v-2.165c.002-.357.144-.7.395-.953l9.532-9.532a1.36 1.36 0 0 1 1.934 0l2.151 2.151a1.36 1.36 0 0 1 0 1.934l-9.532 9.532a1.36 1.36 0 0 1-.953.395H8.197a1.36 1.36 0 0 1-1.362-1.362M19.09 8.995l-4.085-4.086" />
                                            </g>
                                        </svg>
                                    </a> --}}

                                    <!-- Delete Button -->
                                    <form action="{{ route('booking.destroy', ['booking' => $booking]) }}"
                                        method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="group px-2 py-2 bg-white rounded-lg hover:!bg-red-500 !text-red-600 hover:!text-white transition-all duration-300 font-medium text-xs"
                                            title="Delete Booking">


                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24">
                                                <path fill="none" fill-rule="evenodd"
                                                    d="m6.774 6.4l.812 13.648a.8.8 0 0 0 .798.752h7.232a.8.8 0 0 0 .798-.752L17.226 6.4zm11.655 0l-.817 13.719A2 2 0 0 1 15.616 22H8.384a2 2 0 0 1-1.996-1.881L5.571 6.4H3.5v-.7a.5.5 0 0 1 .5-.5h16a.5.5 0 0 1 .5.5v.7zM14 3a.5.5 0 0 1 .5.5v.7h-5v-.7A.5.5 0 0 1 10 3zM9.5 9h1.2l.5 9H10zm3.8 0h1.2l-.5 9h-1.2z"
                                                    stroke-width="0.8" stroke="currentColor" />
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 24 24" class="transition-all duration-300 scale-110">
                                            <path fill="currentColor"
                                                d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z">
                                            </path>
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="mt-4 text-lg font-medium text-gray-500">No bookings found</p>
                                        <p class="mt-1 text-sm text-gray-400">Get started by adding a new booking</p>
                                        <a href="{{ route('booking.create') }}"
                                            class="mt-4 px-4 py-2 text-white rounded-lg font-medium text-sm hover:shadow-md transition-all duration-200"
                                            style="background-color: #c9982b">
                                            Add Your First Booking
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>
