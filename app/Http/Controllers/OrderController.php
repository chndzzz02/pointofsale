<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Daftar pesanan milik customer yang login
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                       ->orderBy('created_at', 'desc')
                       ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Detail pesanan (bisa diakses oleh pemilik, admin, atau seller)
     */
    public function show(Order $order)
    {
        // Cek akses: pemilik order, admin, atau seller
        if ($order->user_id !== Auth::id() && !in_array(Auth::user()->role, ['admin', 'seller'])) {
            abort(403, 'Unauthorized access.');
        }
        return view('orders.show', compact('order'));
    }

    /**
     * Update status pesanan (untuk admin atau seller)
     */
    public function updateStatus(Request $request, Order $order)
    {
        // Hanya admin atau seller
        if (!in_array(Auth::user()->role, ['admin', 'seller'])) {
            abort(403, 'Unauthorized action.');
        }

        // Opsional: jika seller, pastikan order mengandung produknya
        if (Auth::user()->role === 'seller') {
            $hasSellerProduct = $order->items()->whereHas('product', function ($q) {
                $q->where('user_id', Auth::id());
            })->exists();
            if (!$hasSellerProduct) {
                abort(403, 'Anda tidak berhak mengubah pesanan ini.');
            }
        }

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan diperbarui.');
    }

    /**
     * Upload bukti transfer (untuk customer dengan metode transfer)
     */
    public function uploadProof(Request $request, Order $order)
    {
        // Hanya pemilik order yang bisa upload
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Hapus bukti lama jika ada
        if ($order->payment_proof && Storage::disk('public')->exists($order->payment_proof)) {
            Storage::disk('public')->delete($order->payment_proof);
        }

        $path = $request->file('payment_proof')->store('proofs', 'public');
        $order->update(['payment_proof' => $path]);

        return back()->with('success', 'Bukti pembayaran diupload, menunggu konfirmasi admin.');
    }
}