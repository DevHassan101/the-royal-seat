
                        @forelse ($pricing as $index => $price)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-sm">
                                    <span>{{ $index + 1 }}</span>
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    <span>{{ $price->locationFrom?->name }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span>{{ $price->locationTo?->name }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <input type="number" step="0.01" value="{{ $price->price }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#c9982b]/50 focus:border-[#c9982b]/50 transition duration-200"
                                        data-price-id="{{ $price->id }}" />
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <!-- Edit Button -->
                                    <a href="{{ route('vehicle-category.save-price', ['priceId' => $price->id]) }}"
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