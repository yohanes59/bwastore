<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // whereHas u/ cek apakah productnya milik penjual yang sedang login
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('users_id', Auth::user()->id);
            });

        // reduce u/ menghitung penghasilan dari penjual tsb (drpd pakai foreach)
        $revenue = $transactions->get()->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });

        $customer = User::count();
        return view('pages.dashboard', [
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'revenue' => $revenue,
            'customer' => $customer,
        ]);
    }
}
