<x-app-layout>
    <div
        class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Pricings Management
            </h2>
            <p class="text-gray-500 text-sm">View and manage all registered pricings</p>
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

            @foreach ($categories as $category)
                <div class="border-b border-gray-200 last:border-b-0">

                    <!-- Header -->
                    <button type="button"
                        class="accordion-btn flex items-center justify-between w-full px-5 py-4 text-left font-medium hover:bg-gray-50 transition">
                        <span>{{ $category->name . '-' . $category->pricings->count() }}</span>

                        <svg class="accordion-icon w-5 h-5 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Content -->
                    <div class="accordion-content hidden px-5 pb-4">
                        <p class="text-gray-600">
                            @forelse ($category->pricings as $item)
                                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                    <span>{{ $item->locationFrom->name }} to {{ $item->locationTo->name }}</span>
                                    <span class="font-bold">${{ number_format($item->price, 2) }}</span>
                                </div>
                            @empty
                                <p class="text-gray-500">No pricings available for this category.</p>
                            @endforelse
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

    <!-- CREATE MODAL -->
    <div id="createModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

        <div id="createModalBox"
            class="bg-white rounded-2xl shadow-2xl w-[90%] max-w-lg p-8 scale-95 opacity-0 transition-all duration-300">

            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    Add Pricing
                </h3>

                <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <form action="{{ route('pricing.store') }}" method="POST">
                @csrf

                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Pricing Name
                        </label>

                        <input type="text" name="name"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            placeholder="Enter pricing name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Longitude
                        </label>

                        <input type="text" name="longitude"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            placeholder="Enter longitude" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Latitude
                        </label>

                        <input type="text" name="latitude"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            placeholder="Enter latitude" required>
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="button" onclick="closeCreateModal()"
                            class="flex-1 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-100">
                            Cancel
                        </button>

                        <button type="submit"
                            class="flex-1 py-3 rounded-xl bg-[#c9982b] hover:bg-[#a67d23] text-white font-semibold">
                            Save Pricing
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

        <div id="editModalBox"
            class="bg-white rounded-2xl shadow-2xl w-[90%] max-w-lg p-8 scale-95 opacity-0 transition-all duration-300">

            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    Edit Pricing
                </h3>

                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Pricing Name
                        </label>

                        <input type="text" name="name" id="edit_name"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Longitude
                        </label>

                        <input type="text" name="longitude" id="edit_longitude"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Latitude
                        </label>

                        <input type="text" name="latitude" id="edit_latitude"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            required>
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="button" onclick="closeEditModal()"
                            class="flex-1 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-100">
                            Cancel
                        </button>

                        <button type="submit"
                            class="flex-1 py-3 rounded-xl bg-blue-500 hover:bg-blue-600 text-white font-semibold">
                            Update Pricing
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        // CREATE MODAL
        function openCreateModal() {
            const modal = document.getElementById('createModal');
            const box = document.getElementById('createModalBox');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeCreateModal() {
            const modal = document.getElementById('createModal');
            const box = document.getElementById('createModalBox');

            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // EDIT MODAL
        function openEditModal(url, name, longitude, latitude) {

            document.getElementById('editForm').action = url;

            document.getElementById('edit_name').value = name;
            document.getElementById('edit_longitude').value = longitude;
            document.getElementById('edit_latitude').value = latitude;

            const modal = document.getElementById('editModal');
            const box = document.getElementById('editModalBox');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            const box = document.getElementById('editModalBox');

            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }
    </script>
    @push('body')
        <script>
            document.querySelectorAll('.accordion-btn').forEach(button => {
                button.addEventListener('click', () => {

                    const content = button.nextElementSibling;
                    const icon = button.querySelector('.accordion-icon');

                    // Agar sirf ek accordion open rakhna ho
                    document.querySelectorAll('.accordion-content').forEach(item => {
                        if (item !== content) {
                            item.classList.add('hidden');
                        }
                    });

                    document.querySelectorAll('.accordion-icon').forEach(item => {
                        if (item !== icon) {
                            item.classList.remove('rotate-180');
                        }
                    });

                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        </script>
    @endpush
</x-app-layout>
