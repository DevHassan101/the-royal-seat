@extends('driver.layouts.app')
@section('content')
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">My Vehicles</h2>
            <p class="text-gray-500 text-sm">Manage your registered vehicles</p>
        </div>
        <a href="{{ route('driver.vehicle.create') }}"
            class="flex items-center gap-2 rounded-xl px-5 py-3 bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white transition-all duration-300 shadow-md hover:shadow-lg font-medium"
            style="color: #c9982b">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14" />
            </svg>
            Add Vehicle
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">Vehicle List</h3>
        </div>
        <div class="p-6">
            @if($vehicles->isEmpty())
                <p class="text-gray-500 text-center py-8">No vehicles added yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 font-medium">Vehicle</th>
                                <th class="pb-3 font-medium">Details</th>
                                <th class="pb-3 font-medium">Plate</th>
                                <th class="pb-3 font-medium">ITC Status</th>
                                <th class="pb-3 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $vehicle)
                                <tr class="border-b last:border-0 hover:bg-gray-50">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            @if($vehicle->picture)
                                                <img src="{{ asset($vehicle->picture) }}" class="w-12 h-12 rounded-lg object-cover" alt="">
                                            @else
                                                <div class="w-12 h-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#999" viewBox="0 0 24 24"><path d="M15.764 4a3 3 0 0 1 2.683 1.658l1.386 2.771q.366-.15.72-.324a1 1 0 0 1 .894 1.79a32 32 0 0 1-.725.312l.961 1.923A3 3 0 0 1 22 13.473V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.953-1.908q-.362-.152-.715-.327a1.01 1.01 0 0 1-.45-1.343a1 1 0 0 1 1.342-.448q.355.175.72.324l1.386-2.77A3 3 0 0 1 8.236 4z"/></svg>
                                                </div>
                                            @endif
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $vehicle->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $vehicle->model ?? '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 text-gray-600">
                                        <p>{{ $vehicle->seats ?? '-' }} Seats | {{ ucfirst($vehicle->transmission) }}</p>
                                        <p class="text-xs text-gray-400">{{ $vehicle->type ?? '' }}</p>
                                    </td>
                                    <td class="py-3">
                                        <span class="font-mono font-medium text-gray-800">{{ $vehicle->plate_number }}</span>
                                        <span class="text-xs text-gray-500">({{ $vehicle->plate_code }})</span>
                                    </td>
                                    <td class="py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium
                                            {{ $vehicle->itc_status === 'approved' ? 'bg-green-100 text-green-700' : ($vehicle->itc_status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                            {{ ucfirst($vehicle->itc_status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 text-right">
                                        <form action="{{ route('driver.vehicle.destroy', $vehicle) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
