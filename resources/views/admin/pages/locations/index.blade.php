<x-app-layout>
    <div
        class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                Locations Management
            </h2>
            <p class="text-gray-500 text-sm">View and manage all registered locations</p>
        </div>

        <!-- Add Location Button -->
        <button onclick="openCreateModal()"
            class="flex items-center gap-2 rounded-xl bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white px-5 py-3 font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Location
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">
                Locations List
            </h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50 border-b-2 border-gray-200">
                        <th
                            class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Sr. No.
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Location
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase">
                            Longitude & Latitude
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @forelse ($locations as $location)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-700 font-medium">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700 font-medium">
                                {{ $location->name }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                <p class="text-gray-700 whitespace-nowrap">
                                    <b>Longitude:</b> {{ $location->longitude }}
                                </p>

                                <p class="text-gray-700 whitespace-nowrap">
                                    <b>Latitude:</b> {{ $location->latitude }}
                                </p>
                            </td>

                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center justify-center gap-2">

                                    <!-- Edit -->
                                    <button
                                        onclick="openEditModal(
                                            '{{ route('location.update', $location) }}',
                                            '{{ $location->name }}',
                                            '{{ $location->longitude }}',
                                            '{{ $location->latitude }}'
                                        )"
                                        class="group px-2 py-2 bg-white rounded-lg hover:!bg-blue-500 !text-blue-500 hover:!text-white transition-all duration-300 font-medium text-xs"
                                        title="Edit Location">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M12 20h9" />
                                            <path
                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                        </svg>
                                    </button>

                                    <!-- Delete -->
                                    <form
                                        action="{{ route('location.destroy', ['location' => $location]) }}"
                                        method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this location?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="group px-2 py-2 bg-white rounded-lg hover:!bg-red-500 !text-red-600 hover:!text-white transition-all duration-300 font-medium text-xs"
                                            title="Delete Location">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewBox="0 0 24 24">
                                                <path fill="none" fill-rule="evenodd"
                                                    d="m6.774 6.4l.812 13.648a.8.8 0 0 0 .798.752h7.232a.8.8 0 0 0 .798-.752L17.226 6.4zm11.655 0l-.817 13.719A2 2 0 0 1 15.616 22H8.384a2 2 0 0 1-1.996-1.881L5.571 6.4H3.5v-.7a.5.5 0 0 1 .5-.5h16a.5.5 0 0 1 .5.5v.7zM14 3a.5.5 0 0 1 .5.5v.7h-5v-.7A.5.5 0 0 1 10 3zM9.5 9h1.2l.5 9H10zm3.8 0h1.2l-.5 9h-1.2z"
                                                    stroke-width="0.8"
                                                    stroke="currentColor" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <p class="text-gray-500 text-lg font-medium">
                                    No locations found
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- CREATE MODAL -->
    <div id="createModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

        <div id="createModalBox"
            class="bg-white rounded-2xl shadow-2xl w-[90%] max-w-lg p-8 scale-95 opacity-0 transition-all duration-300">

            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    Add Location
                </h3>

                <button onclick="closeCreateModal()"
                    class="text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <form action="{{ route('location.store') }}" method="POST">
                @csrf

                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Location Name
                        </label>

                        <input type="text" name="name"
                            class="w-full rounded-xl border-gray-300 focus:border-[#c9982b] focus:ring-[#c9982b]"
                            placeholder="Enter location name" required>
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
                            Save Location
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div id="editModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

        <div id="editModalBox"
            class="bg-white rounded-2xl shadow-2xl w-[90%] max-w-lg p-8 scale-95 opacity-0 transition-all duration-300">

            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    Edit Location
                </h3>

                <button onclick="closeEditModal()"
                    class="text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Location Name
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
                            Update Location
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
</x-app-layout>