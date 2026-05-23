<?php
namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $sellerId = Auth::id();

        // Total produk seller
        $totalProducts = Product::where('user_id', $sellerId)->count();

        // Total pesanan (item) dari produk seller
        $totalOrders = OrderItem::whereHas('product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->count();

        // Total pendapatan dari pesanan yang sudah completed
        $totalRevenue = OrderItem::whereHas('product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->whereHas('order', function ($query) {
            $query->where('status', 'completed');
        })->sum(DB::raw('quantity * price'));

        // Produk terbaru
        $recentProducts = Product::where('user_id', $sellerId)->latest()->take(5)->get();

        return view('seller.dashboard', compact('totalProducts', 'totalOrders', 'totalRevenue', 'recentProducts'));
    }
}