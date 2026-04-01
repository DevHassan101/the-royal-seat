@extends('driver.layouts.app')
@section('content')
    <div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
        <div class="ml-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">My Expenses</h2>
            <p class="text-gray-500 text-sm">Track your operational expenses</p>
        </div>
        <a href="{{ route('driver.expense.create') }}"
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
            @if($expenses->isEmpty())
                <p class="text-gray-500 text-center py-8">No expenses recorded yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 font-medium">Date</th>
                                <th class="pb-3 font-medium">Vehicle</th>
                                <th class="pb-3 font-medium">Category</th>
                                <th class="pb-3 font-medium">Amount</th>
                                <th class="pb-3 font-medium">Description</th>
                                <th class="pb-3 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                                <tr class="border-b last:border-0 hover:bg-gray-50">
                                    <td class="py-3 text-gray-700">{{ $expense->expense_date->format('d M Y') }}</td>
                                    <td class="py-3 text-gray-600">{{ $expense->vehicle->name ?? '-' }}</td>
                                    <td class="py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 capitalize">{{ $expense->category }}</span>
                                    </td>
                                    <td class="py-3 font-semibold text-red-600">AED {{ number_format($expense->amount, 2) }}</td>
                                    <td class="py-3 text-gray-500 truncate max-w-[200px]">{{ $expense->description ?? '-' }}</td>
                                    <td class="py-3 text-right">
                                        <form action="{{ route('driver.expense.destroy', $expense) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM9 17h2V8H9zm4 0h2V8h-2z"/></svg>
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
