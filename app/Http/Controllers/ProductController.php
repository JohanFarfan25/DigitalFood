<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('products.index', compact('products','suppliers'));
    }


    public function viewCreate()
    {
        $suppliers = Supplier::all();
        return view('products.create',compact('suppliers'));
    }


    public function create(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'unit_of_measure' => 'nullable|string|max:50',
            'expiration_date' => 'nullable|date',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);
        $attributes['status'] = 'active';
        $attributes['registered_by'] = Auth::user()->id;
        Product::create($attributes);

        return redirect()->route('products-index');
    }


    public function view($id)
    {
        $product = Product::find($id);
        $suppliers = Supplier::all();
        return view('products.view', compact('product','suppliers'));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $suppliers = Supplier::all();
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'unit_of_measure' => 'nullable|string|max:50',
            'expiration_date' => 'nullable|date',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $product->update($attributes);
        return view('products.view', compact('product','suppliers'));
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products-index');
    }
}
