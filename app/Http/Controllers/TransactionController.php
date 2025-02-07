<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Product;
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
        $products = Product::all();
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        return view('transactions.create', compact('batches', 'products', 'warehouses', 'suppliers', 'customers'));
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
        if (!is_null($transaction->reson_rejection) && json_decode($transaction->reson_rejection)) {
            $reson_rejection = json_decode($transaction->reson_rejection);
            $transaction->reson_rejection = isset($reson_rejection[0]->errorMessage) ? '¡'. $reson_rejection[0]->errorMessage.' !' : $transaction->reson_rejection . '!';
        }
        $items = $transaction->items;
        $paymentmethod = $transaction->paymentmethod;
        return view('transactions.view', compact('transaction', 'items', 'paymentmethod'));
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

    public function payment($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $items = $transaction->items;
        return view('transactions.payment', compact('transactionId', 'transaction', 'items'));
    }


    public function paymentTransaction(Request $request)
    {


        $card = $request->card;
        $dataPayer = $request->dataPayer;
        $transactionId = $request->transactionId;
        $description = 'Compra de productos: ';
        $ip = $request->ip();

        $transaction = Transaction::find($transactionId);

        $items = $transaction->items;
        foreach ($items as $item) {
            if (isset($item->product->id)) {
                $description = $description .= ', (' . $item->product->name . ')-Cantidad: ' . $item->quantity . '-V/u: ' . $item->price;
            } else {
                $description = $description .= ', (' . $item->batch->product->name . ')-Valor del lote: ' . $item->batch->total_quantity;
            }
        }

        $payment = (new EpaycoController)->payment($card, $dataPayer, $transaction, $description, $transaction->customer, $ip);

        if (isset($payment->data->transaction->data->cod_respuesta) && $payment->data->transaction->data->cod_respuesta == 1) {

            $transaction->external_ref = $payment->data->transaction->data->ref_payco ?? '';
            $transaction->fact = $payment->data->transaction->data->factura ?? '';
            $transaction->franchise = $payment->data->transaction->data->franquicia ?? '';
            $transaction->transaction_status = 'completed';

            $paymentmethod = PaymentMethod::create(
                [
                    'customer_id' => $transaction->customer_id,
                    'account_type' => $payment->data->transaction->data->franquicia ?? '',
                    'account_number' => '******' . substr($card['number'], -4) ?? '',
                    'expiration_date' => $card['exp_month'] . '/' . $card['exp_year'],
                    'status' => 'active',
                ]
            );

            $transaction->payment_method_id =  $paymentmethod->id;
        } else {
            $message = 'Error en la transacción validar los datos';
            if (isset($payment->data->transaction->data->cc_network_response->message)) {
                $message = $payment->data->transaction->data->cc_network_response->message;
            } elseif (!$payment->success) {
                $message = isset($payment->data->error->errors) ? json_encode($payment->data->error->errors) : 'Error en la transacción validar los datos';
            }
            $transaction->transaction_status = 'failed';
            $transaction->reson_rejection = $message;
        }

        $transaction->save();
        $transaction = Transaction::find($transactionId);
        $items = $transaction->items;
        $compact = compact('transaction', 'items');
        if ($transaction->transaction_status == 'completed') {
            $compact = compact('transaction', 'items', 'paymentmethod');
        }

        return view('transactions.view', $compact);
    }
}
