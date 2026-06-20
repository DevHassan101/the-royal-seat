<x-app-layout>
    <div
        class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Vehicle Categories
            </h2>
            <p class="text-gray-500 text-sm">View and manage all registered vehicle categories</p>
        </div>

        <form action="{{ route('pricing.sync') }}" method="post">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Sync Pricing
            </button>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-50 border-b-2 border-gray-200">
                            <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                                S.no
                            </th>
                            <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                                Name
                            </th>
                            <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                                Vehicles
                            </th>
                            <th class="px-6 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white" id="tbody">
                        @forelse ($categories as $index => $category)
                        
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-sm">
                                    <span>{{ $index + 1 }}</span>
                                </td>
                                
                                <td class="px-6 py-4 text-sm">
                                    <span>{{ $category->name }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span>{{ $category->vehicles->count() }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex items-center justify-center gap-2">                                        
                                        <!-- Info Button -->
                                        <a href="{{ route('vehicle-category.show', ['category' => $category]) }}"
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
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
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
                                            <p class="mt-4 text-lg font-medium text-gray-500">No categories found</p>
                                            <p class="mt-1 text-sm text-gray-400">Get started by adding a new category</p>                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </x-app-layout>
