<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{

    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouses.index', compact('warehouses'));
    }


    public function viewCreate()
    {
        return view('warehouses.create');
    }


    public function create(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'temperature_controlled' => 'required|boolean'
        ]);
        $attributes['status'] = 'active';
        $attributes['registered_by'] = Auth::user()->id;
        Warehouse::create($attributes);

        return redirect()->route('warehouses-index');
    }


    public function view($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouses.view', compact('warehouse'));
    }

    public function update($id, Request $request)
    {
        $warehouse = Warehouse::find($id);
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'temperature_controlled' => 'required|boolean'
        ]);

        $warehouse->update($attributes);
        return view('warehouses.view', compact('warehouse'));
    }


    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        return redirect()->route('warehouses-index');
    }
}
