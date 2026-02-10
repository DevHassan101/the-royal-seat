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
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($leads as $lead)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
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
                                <a class="text-gray-700 hover:!text-[#c3942a] hover:underline whitespace-nowrap" href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">{{ date('d M Y', strtotime($lead->booking_date)) }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center justify-center gap-2">

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
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    <p class="mt-4 text-lg font-medium text-gray-500">No leads found</p>
                                    <p class="mt-1 text-sm text-gray-400">Get started by adding a new lead</p>
                                    <a href="{{ route('lead.create') }}"
                                        class="mt-4 px-4 py-2 text-white rounded-lg font-medium text-sm hover:shadow-md transition-all duration-200"
                                        style="background-color: #c9982b">
                                        Add Your First Lead
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
