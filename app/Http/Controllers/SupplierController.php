<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }


    public function viewCreate()
    {
        return view('suppliers.create');
    }


    public function create(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100'
        ]);
        $attributes['status'] = 'active';
        $attributes['registered_by'] = Auth::user()->id;
        Supplier::create($attributes);

        return redirect()->route('suppliers-index');
    }


    public function view($id)
    {

        $supplier = Supplier::find($id);
        return view('suppliers.view', compact('supplier'));
    }

    public function update($id, Request $request)
    {
        
        $supplier = Supplier::find($id);
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'status' => 'required|in:active,inactive'
        ]);

        $supplier->update($attributes);
        return view('suppliers.view', compact('supplier'));
    }


    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('suppliers-index');
    }
}
