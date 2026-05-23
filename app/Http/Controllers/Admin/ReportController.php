<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller {
    public function exportPdf(Request $request) {
        $orders = Order::with('user')->latest()->get();
        $pdf = Pdf::loadView('admin.report.pdf', compact('orders'));
        return $pdf->download('laporan_transaksi.pdf');
    }
}