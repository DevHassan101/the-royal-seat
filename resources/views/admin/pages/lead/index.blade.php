<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Leads
            </h2>
            <p class="text-gray-500 text-sm">View and manage all registered leads</p>
        </div>
        {{-- <a href="{{ route('lead.create') }}"
            class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Lead
        </a> --}}
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">
                Leads List
            </h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50 border-b-2 border-gray-200">
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            #
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Vehicle
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Name
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Email
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Booking Date
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Status
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($leads as $lead)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">{{ $lead->id }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('vehicle.show', ['vehicle' => $lead->vehicle]) }}"
                                    class="flex items-center gap-3">
                                    <img src="{{ asset($lead->vehicle?->picture) }}"
                                        class="w-16 p-2 h-10 rounded-xl bg-gradient-to-br from-[#c9982b] to-[#a67d23] flex items-center justify-center text-white font-bold text-sm" />
                                    <div>
                                        <p class="text-gray-900 font-medium whitespace-nowrap">
                                            {{ $lead->vehicle?->name }}</p>
                                        <p class="text-gray-900 font-medium whitespace-nowrap">
                                            {{ $lead->vehicle?->model }}</p>

                                    </div>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">{{ $lead->name }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a class="text-gray-700 hover:!text-[#c3942a] hover:underline whitespace-nowrap"
                                    href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">
                                    {{ $lead->booking_date ? date('d M Y', strtotime($lead->booking_date)) : 'N/A' }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @php
                                    $s = $lead->status ?? 'pending';
                                    $badgeClass = match ($s) {
                                        'success' => 'bg-green-100 text-green-800',
                                        'failed' => 'bg-red-100 text-red-800',
                                        default => 'bg-yellow-100 text-yellow-800',
                                    };
                                @endphp
                                <span
                                    class="uppercase px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeClass }}">
                                    {{ $s }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center justify-center gap-2">

                                    @if (($lead->status ?? 'pending') === 'pending')
                                        <!-- Mark Success -->
                                        <form action="{{ route('lead.update-status', $lead) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="success">
                                            <button type="submit"
                                                class="group px-2 py-2 bg-white rounded-lg hover:!bg-green-500 !text-green-600 hover:!text-white transition-all duration-300"
                                                title="Mark as Success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 6L9 17l-5-5" />
                                                </svg>
                                            </button>
                                        </form>

                                        <!-- Mark Failed -->
                                        <form action="{{ route('lead.update-status', $lead) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Mark this lead as failed?')">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="failed">
                                            <button type="submit"
                                                class="group px-2 py-2 bg-white rounded-lg hover:!bg-red-500 !text-red-600 hover:!text-white transition-all duration-300"
                                                title="Mark as Failed">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Delete Button -->
                                    <form action="{{ route('lead.destroy', ['lead' => $lead]) }}" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this lead?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="group px-2 py-2 bg-white rounded-lg hover:!bg-red-500 !text-red-600 hover:!text-white transition-all duration-300 font-medium text-xs"
                                            title="Delete Lead">


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
                                        <path fill="currentColor" d="M22 5a3 3 0 1 1-6 0a3 3 0 0 1 6 0"></path>
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M15.612 2.038C14.59 2 13.399 2 12 2C7.286 2 4.929 2 3.464 3.464C2 4.93 2 7.286 2 12s0 7.071 1.464 8.535C4.93 22 7.286 22 12 22s7.071 0 8.535-1.465C22 19.072 22 16.714 22 12c0-1.399 0-2.59-.038-3.612a4.5 4.5 0 0 1-6.35-6.35m1.868 7.386a.75.75 0 0 1 .096 1.056l-1.829 2.195c-.328.394-.624.75-.9 1c-.302.27-.68.513-1.18.513s-.879-.242-1.18-.514c-.276-.25-.572-.605-.901-1l-.292-.35c-.371-.445-.599-.716-.787-.885a.8.8 0 0 0-.163-.122l-.01-.005l-.005.002l-.007.003a.8.8 0 0 0-.163.122c-.187.17-.415.44-.786.885L7.576 14.48a.75.75 0 0 1-1.152-.96l1.829-2.195c.328-.394.624-.75.9-1c.302-.27.68-.513 1.18-.513s.879.242 1.18.514c.276.25.572.605.901 1l.292.35c.371.445.599.716.787.885c.086.078.138.11.163.122l.003.001l.008.004l.01-.005a.8.8 0 0 0 .164-.122c.187-.17.415-.44.786-.885l1.797-2.156a.75.75 0 0 1 1.056-.096"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="mt-4 text-lg font-medium text-gray-500">No leads found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
