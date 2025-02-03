<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function viewCreate()
    {
        $batches = Batch::all();
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        return view('transactions.create', compact('batches', 'warehouses', 'suppliers', 'customers'));
    }

    public function create(Request $request)
    {

        $attributes = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'type' => 'required|in:purchase,sale,adjustment',
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'customer_id' => 'nullable|exists:customers,id'
        ]);
        $attributes['status'] = 'active';
        $attributes['registered_by'] = Auth::user()->id;
        Transaction::create($attributes);

        return redirect()->route('transactions-index');
    }


    public function view($id)
    {
        $transaction = Transaction::find($id);
        $items = $transaction->items;
        return view('transactions.view', compact('transaction','items'));
    }

    public function update($id, Request $request)
    {
        $batches = Batch::all();
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $transaction = Transaction::find($id);

        $attributes = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'type' => 'required|in:purchase,sale,adjustment',
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'customer_id' => 'nullable|exists:customers,id'
        ]);

        $transaction->update($attributes);
        return view('transactions.view', compact('transaction', 'batches', 'warehouses', 'suppliers', 'customers'));
    }


    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transactions-index');
    }
}
