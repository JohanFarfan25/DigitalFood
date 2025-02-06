<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BillingController extends Controller
{

    public function index()
    {
        $batches = Batch::with('product')->get();
        $products = Product::all();
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        return view('transactions.billing', compact('batches', 'products', 'warehouses', 'suppliers', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:purchase,sale,adjustment',
            'date' => 'required|date',
            'warehouse_id' => 'required|exists:warehouses,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'customer_id' => 'nullable|exists:customers,id',
            'items' => 'required|array', // Recibe como JSON string
        ]);


        // Crear la transacción
        $transaction = Transaction::create([
            'type' => $request->type,
            'date' => $request->date,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'customer_id' => $request->customer_id,
            'quantity' =>  $request->quantity,
            'price' => $request->price,
            'status' => 'active',
            'transaction_status' => 'pending',
            'registered_by' => Auth::user()->id,
        ]);

        if (isset($transaction->id)) {
            // Guardar los productos/lotes asociados a la transacción
            foreach ($request->items as $item) {
                $productId = $item['productId'] ?? null;
                $batchId = null;
                if (isset($item['type-product']) == 'batch') {
                    $batch =  Batch::find($item['productId']);
                    $batchId = $item['productId'] ?? null;
                    $productId = $batch->product->id ?? null;
                }

                Item::create([
                    'transaction_id' => $transaction->id,
                    'batch_id' => $batchId,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['subtotal'],
                    'registered_by' => Auth::user()->id,
                ]);
            }
        }
        return response()->json(["success" => true, "message" => "Transacción creada correctamente."]);
    }


    public function generateInvoice($id)
    {
        $transaction = Transaction::findOrFail($id);
        $pdf = Pdf::loadView('invoice', compact('transaction'));
        return $pdf->download('factura-' . $transaction->id . '.pdf');
    }
}
