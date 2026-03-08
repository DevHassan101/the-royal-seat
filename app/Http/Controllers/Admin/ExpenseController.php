<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['user', 'vehicle'])->latest()->get();
        return view('admin.pages.expense.index', compact('expenses'));
    }

    public function create()
    {
        $drivers = User::role('driver')->get();
        $vehicles = Vehicle::get();
        return view('admin.pages.expense.create', compact('drivers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'category' => 'required|in:fuel,maintenance,insurance,toll,parking,fine,other',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
            'expense_date' => 'required|date',
            'receipt' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'user_id' => $request->user_id,
            'vehicle_id' => $request->vehicle_id,
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
            'expense_date' => $request->expense_date,
        ];

        if ($request->hasFile('receipt')) {
            $image = $request->file('receipt');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('expense-receipts/', $name_gen);
            $data['receipt'] = 'expense-receipts/' . $name_gen;
        }

        Expense::create($data);

        return redirect()->route('expense.index')->with('success', 'Expense added successfully');
    }

    public function destroy(Expense $expense)
    {
        if ($expense->receipt && file_exists($expense->receipt)) {
            unlink($expense->receipt);
        }
        $expense->delete();

        return redirect()->route('expense.index')->with('success', 'Expense deleted successfully');
    }
}
