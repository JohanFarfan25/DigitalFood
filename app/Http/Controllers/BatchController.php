<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{

    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    public function viewCreate()
    {
        $products = Product::all();
        return view('batches.create', compact('products'));
    }

    public function create(Request $request)
    {

        $attributes = $request->validate([
            'product_id' => 'required|exists:products,id',
            'production_date' => 'required|date',
            'expiration_date' => 'required|date|after:production_date',
            'total_quantity' => 'required|integer|min:1',
            'location' => 'nullable|string|max:255'
        ]);
        $attributes['status'] = 'active';
        $attributes['registered_by'] = Auth::user()->id;
        Batch::create($attributes);

        return redirect()->route('batches-index');
    }


    public function view($id)
    {

        $batch = Batch::find($id);
        $products = Product::all();
        return view('batches.view', compact('batch', 'products'));
    }

    public function update($id, Request $request)
    {

        $batch = Batch::find($id);
        $products = Product::all();
        $attributes = $request->validate([
            'product_id' => 'required|exists:products,id',
            'production_date' => 'required|date',
            'expiration_date' => 'required|date|after:production_date',
            'total_quantity' => 'required|integer|min:1',
            'location' => 'nullable|string|max:255'
        ]);

        $batch->update($attributes);
        return view('batches.view', compact('batch', 'products'));
    }


    public function destroy($id)
    {
        $batches = Batch::find($id);
        $batches->delete();
        return redirect()->route('batches-index');
    }
}
