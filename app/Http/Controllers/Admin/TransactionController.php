<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.transactions.index', compact('orders'));
    }

    // Method lain (create, store, show, edit, update, destroy) bisa dikosongkan atau dihapus jika tidak diperlukan
}