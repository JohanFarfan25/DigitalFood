<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Uses;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCustomers = Customer::count();
        $totalSupliers = Supplier::count();
        $totalProducts = Product::count();
        $totalWarehouses = Warehouse::count();
        $totalBaches = Batch::count();
        $transactions = Transaction::where('status', 1)->get();
        $currentYear = date('Y');

        $salesByMonth = Transaction::selectRaw('MONTH(created_at) as month, SUM(price) as total')
        ->where('status', 1)
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

        $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $salesData = array_fill(0, 12, 0);

        foreach ($salesByMonth as $month => $total) {
            $salesData[$month - 1] = $total;
        }
    

        $completed = 0;
        $pending = 0;
        $failed = 0;
        $declined = 0;

        foreach ($transactions as  $transaction) {
            if ($transaction->transaction_status == 'completed') {
                $completed += $transaction->price;
            } elseif ($transaction->transaction_status == 'pending') {
                $pending += $transaction->price;
            } elseif ($transaction->transaction_status == 'failed') {
                $failed += $transaction->price;
            } elseif ($transaction->transaction_status == 'declined') {
                $failed += $transaction->price;
            }
        }

        $completed = number_format($completed, 0, ',', '.');
        $pending = number_format($pending, 0, ',', '.');
        $failed = number_format($failed, 0, ',', '.');
        $declined = number_format($declined, 0, ',', '.');
        $grantTotal = $completed + $pending + $failed + $declined;

        return view(
            'dashboard',
            compact(
                'transactions',
                'totalUsers',
                'totalCustomers',
                'totalSupliers',
                'totalProducts',
                'totalWarehouses',
                'totalBaches',
                'completed',
                'pending',
                'failed',
                'declined',
                'grantTotal',
                'salesData',
                'months',
                'currentYear'
            )
        )->with(['success' => 'Bienvenido.']);
    }
}
