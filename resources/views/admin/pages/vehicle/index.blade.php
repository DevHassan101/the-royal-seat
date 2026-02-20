<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Vehicles Management
            </h2>
            <p class="text-gray-500 text-sm">View and manage all registered vehicles</p>
        </div>
        <div class="flex items-center gap-3">
            <form action="{{ route('itc.sync-all-vehicles') }}" method="POST" class="inline-block">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 rounded-xl bg-white !border !border-blue-500 !text-blue-500 hover:!bg-blue-500 hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"/>
                    </svg>
                    Sync All ITC
                </button>
            </form>
            <a href="{{ route('vehicle.create') }}"
                class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Vehicle
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">
                Vehicles List
            </h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50 border-b-2 border-gray-200">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Name
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Details
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Charges
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
                    @forelse ($vehicles as $vehicle)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <img class="w-10 h-10 rounded-full"  src="{{ asset($vehicle->picture) }}"
                                        alt="" srcset="">
                                    <p class="text-gray-900 font-medium whitespace-nowrap">{{ $vehicle->name }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">
                                    <b>Model: </b> {{ $vehicle->model }}
                                    <br>
                                    <b>Seats: </b> {{ $vehicle->seats }}
                                    <br>
                                    <b>Type: </b> {{ $vehicle->type }}

                                </p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span>{{ $vehicle->per_day_charges }}AED /day</span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if ($vehicle->itc_status)
                                    @switch($vehicle->itc_status)
                                        @case('pending')
                                            <span
                                                class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{ $vehicle->itc_status }}
                                            </span>
                                        @break

                                        @case('approved')
                                            <span
                                                class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ $vehicle->itc_status }}
                                            </span>
                                        @break

                                        @default
                                            <span
                                                class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                {{ $vehicle->itc_status }}
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
                                    <form action="{{ route('itc.sync-vehicle', $vehicle) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="group px-2 py-2 bg-white rounded-lg hover:!bg-green-500 !text-green-500 hover:!text-white transition-all duration-300 font-medium text-xs"
                                            title="Sync ITC Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transition-all duration-300">
                                                <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"/>
                                            </svg>
                                        </button>
                                    </form>

                                    <!-- Info Button -->
                                    <a href="{{ route('vehicle.show', ['vehicle' => $vehicle]) }}"
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
                                    <a href="{{ route('vehicle.edit', ['vehicle' => $vehicle]) }}"
                                        class="group px-2 py-2 bg-white rounded-lg transition-all duration-300 font-medium text-xs hover:!bg-[#c9982b] !text-[#c9982b] hover:!text-white"
                                        title="Edit Vehicle">
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
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('vehicle.destroy', ['vehicle' => $vehicle]) }}"
                                        method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this vehicle?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="group px-2 py-2 bg-white rounded-lg hover:!bg-red-500 !text-red-600 hover:!text-white transition-all duration-300 font-medium text-xs"
                                            title="Delete Vehicle">


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
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 48 48" id="a">
                                            <defs>
                                                <style>
                                                    .b {
                                                        fill: none;
                                                        stroke: currentColor;
                                                        stroke-linecap: round;
                                                        stroke-linejoin: round;
                                                    }
                                                </style>
                                            </defs>
                                            <path class="b"
                                                d="M8.4,36.1457s-.1939,1.511,0,2.2286c.1347,.4981,.264,1.3371,.78,1.3371h2.8971c.516,0,.6453-.8391,.78-1.3371,.1939-.7172,0-2.2286,0-2.2286" />
                                            <rect class="b" x="4.5" y="21.66" width="39" height="14.4857"
                                                rx="4.4571" ry="4.4571" />
                                            <path class="b"
                                                d="M35.1429,36.1457s-.1939,1.511,0,2.2286c.1347,.4981,.264,1.3371,.78,1.3371h2.8971c.516,0,.6453-.8391,.78-1.3371,.1939-.7172,0-2.2286,0-2.2286" />
                                            <circle class="b" cx="10.6286" cy="29.46" r="2.2286" />
                                            <path class="b"
                                                d="M8.9571,21.66l2.5629-10.0286c.438-1.7138,2.3534-3.3429,4.1229-3.3429h16.7143c1.7695,0,3.6849,1.6291,4.1229,3.3429l2.5629,10.0286" />
                                            <circle class="b" cx="37.3714" cy="29.46" r="2.2286" />
                                        </svg>
                                        <p class="mt-4 text-lg font-medium text-gray-500">No vehicles found</p>
                                        <p class="mt-1 text-sm text-gray-400">Get started by adding a new vehicle</p>
                                        <a href="{{ route('vehicle.create') }}"
                                            class="mt-4 px-4 py-2 text-white rounded-lg font-medium text-sm hover:shadow-md transition-all duration-200"
                                            style="background-color: #c9982b">
                                            Add Your First Vehicle
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
