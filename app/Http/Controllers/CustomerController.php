<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }


    public function viewCreate()
    {
        return view('customers.create');
    }


    public function create(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100'
        ]);
        $attributes['status'] = 'active';
        $attributes['registered_by'] = Auth::user()->id;
        Customer::create($attributes);

        return redirect()->route('customers-index');
    }


    public function view($id)
    {
        $customer = Customer::find($id);
        return view('customers.view', compact('customer'));
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100'
        ]);

        $customer->update($attributes);
        return view('customers.view', compact('customer'));
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers-index');
    }
}
