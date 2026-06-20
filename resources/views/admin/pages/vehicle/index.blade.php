<x-app-layout>
    <div
        class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2" />
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
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4 sm:flex justify-between items-center">
            <h3 class="text-xl font-semibold text-white">
                Vehicles List
            </h3>

            <div class="flex items-center justify-between gap-2">
                <select id="type"
                    class="w-full sm:w-auto rounded  bg-white text-gray-700 placeholder:text-gray-500 border border-gray-300 focus:outline-none focus:ring-2 focus:!border-[#c9982b] focus:!ring-[#c9982b]">
                    <option value="name">Name</option>
                    <option value="plate_number">Vehicle Number</option>
                    <option value="model">Model</option>
                    <option value="seats">Seat</option>
                    <option value="type">Type</option>
                </select>
                <input type="text" placeholder="Search here..." id="search"
                    class="w-full sm:w-auto rounded  bg-white text-gray-700 placeholder:text-gray-500 border border-gray-300 focus:outline-none focus:ring-2 focus:!border-[#c9982b] focus:!ring-[#c9982b]">
            </div>
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
                            Driver/Owner
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Charges
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Bookings
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            ITC Status
                        </th>
                        <th class="px-6 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white" id="tbody">
                    @include('admin.pages.vehicle.list')
                </tbody>
            </table>
        </div>
    </div>



    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush

    @push('body')
        <script>
            let timeout = null;

            function getVehicles(search) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('vehicle.index') }}",
                    data: {
                        type: $('#type').val(),
                        search: search
                    },
                    success: function(response) {

                        if (response.error) {
                            return;
                        }

                        $('#tbody').html(response.html);
                    }
                });
            }

            $('#search').on('input', function(e) {

                clearTimeout(timeout);

                timeout = setTimeout(() => {
                    getVehicles(e.target.value);
                }, 400); // 400ms delay
            });

            $('#type').on('change', function() {
                getVehicles($('#search').val());
            });
        </script>
    @endpush
</x-app-layout>
