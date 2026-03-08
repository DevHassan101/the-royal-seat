<x-app-layout>
    <div class="flex justify-between items-center w-full mb-6">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">Expenses</h2>
            <p class="text-gray-500 text-sm">Track all operational expenses</p>
        </div>
        <a href="{{ route('expense.create') }}"
            class="flex items-center gap-2 rounded-xl px-5 py-3 bg-white !border !border-[#c9982b] !text-[#c9982b] hover:!bg-[#c9982b] hover:!text-white transition-all duration-300 shadow-md hover:shadow-lg font-medium"
            style="color: #c9982b">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14" />
            </svg>
            Add Expense
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
            <h3 class="text-xl font-semibold text-white">Expense Records</h3>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="pb-3 font-medium">Date</th>
                            <th class="pb-3 font-medium">Driver</th>
                            <th class="pb-3 font-medium">Vehicle</th>
                            <th class="pb-3 font-medium">Category</th>
                            <th class="pb-3 font-medium">Amount</th>
                            <th class="pb-3 font-medium">Description</th>
                            <th class="pb-3 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($expenses as $expense)
                            <tr class="border-b last:border-0 hover:bg-gray-50">
                                <td class="py-3 text-gray-700">{{ $expense->expense_date->format('d M Y') }}</td>
                                <td class="py-3 text-gray-700">{{ $expense->user->name ?? 'N/A' }}</td>
                                <td class="py-3 text-gray-600">{{ $expense->vehicle->name ?? '-' }}</td>
                                <td class="py-3">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 capitalize">{{ $expense->category }}</span>
                                </td>
                                <td class="py-3 font-semibold text-red-600">AED {{ number_format($expense->amount, 2) }}
                                </td>
                                <td class="py-3 text-gray-500 truncate max-w-[200px]">{{ $expense->description ?? '-' }}
                                </td>
                                <td class="py-3 text-right">
                                    @if ($expense->receipt)
                                        <a href="{{ asset($expense->receipt) }}" target="_blank"
                                            class="inline-block p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-all"
                                            title="View Receipt">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3" />
                                            </svg>
                                        </a>
                                    @endif
                                    <form action="{{ route('expense.destroy', $expense) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all"
                                            title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM9 17h2V8H9zm4 0h2V8h-2z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 24 24"
                                            class="transition-all duration-300 group-hover:scale-110">
                                            <path fill="currentColor"
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87c1.96 0 2.4-.98 2.4-1.59c0-.83-.44-1.61-2.67-2.14c-2.48-.6-4.18-1.62-4.18-3.67c0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87c-1.5 0-2.4.68-2.4 1.64c0 .84.65 1.39 2.67 1.94s4.18 1.36 4.18 3.85c0 1.89-1.44 2.98-3.12 3.19">
                                            </path>
                                        </svg>
                                        <p class="mt-4 text-lg font-medium text-gray-500">No expenses found</p>
                                        <p class="mt-1 text-sm text-gray-400">Get started by adding a new expense</p>
                                        <a href="{{ route('vehicle.create') }}"
                                            class="mt-4 px-4 py-2 text-white rounded-lg font-medium text-sm hover:shadow-md transition-all duration-200"
                                            style="background-color: #c9982b">
                                            Add Your First Expense
                                        </a>
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
