<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_price');

        // Data chart 7 hari terakhir (hanya order completed)
        $revenueData = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('status', 'completed')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get()
            ->reverse()
            ->values();

        $chartLabels = $revenueData->map(fn($item) => date('d M', strtotime($item->date)))->toArray();
        $chartData = $revenueData->pluck('total')->toArray();

        if (empty($chartLabels)) {
            $chartLabels = ['Tidak ada data'];
            $chartData = [0];
        }

        // Statistik pesanan per status
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // Produk terbaru
        $recentProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue',
            'chartLabels', 'chartData',
            'pendingOrders', 'processingOrders', 'completedOrders', 'cancelledOrders',
            'recentProducts'
        ));
    }
}