<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan yang berisi produk milik seller yang login
     */
    public function index()
    {
        $sellerId = Auth::id();

        // Ambil semua order_id yang item produknya dimiliki seller ini
        $orderIds = \App\Models\OrderItem::whereHas('product', function ($q) use ($sellerId) {
            $q->where('user_id', $sellerId);
        })->pluck('order_id')->unique();

        // Ambil data order berdasarkan id tersebut, diurutkan terbaru
        $orders = Order::whereIn('id', $orderIds)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('seller.orders.index', compact('orders'));
    }

    /**
     * Update status pesanan (oleh seller)
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        // Opsional: pastikan order ini mengandung produk milik seller yang login
        $sellerId = Auth::id();
        $hasSellerProduct = $order->items()->whereHas('product', function ($q) use ($sellerId) {
            $q->where('user_id', $sellerId);
        })->exists();

        if (!$hasSellerProduct) {
            abort(403, 'Anda tidak berhak mengubah status pesanan ini.');
        }

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

}
