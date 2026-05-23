@extends('layouts.admin')
@section('title', 'Transaksi')
@section('content')
<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">📋 Semua Transaksi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle bg-white rounded-4 overflow-hidden shadow-sm">
            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Metode</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>Rp {{ number_format($order->total_price,0,',','.') }}</td>
                    <td><span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'processing' ? 'primary' : ($order->status == 'pending' ? 'warning' : 'secondary')) }} rounded-pill">{{ ucfirst($order->status) }}</span></td>
                    <td>@if($order->payment_method == 'cod') COD @else Transfer @endif</td>
                    <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td><a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary rounded-pill">Detail</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">Belum ada transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $orders->links() }}</div>
</div>
@endsection