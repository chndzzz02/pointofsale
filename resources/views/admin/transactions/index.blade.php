@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')

<style>

body{
    background:#f4f7fb;
}

/* HEADER */

.transaction-header{
    margin-bottom:30px;
}

.transaction-title{
    font-size:34px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:6px;
}

.transaction-subtitle{
    color:#6b7280;
    font-size:14px;
}

/* CARD */

.transaction-wrapper{
    background:white;
    border-radius:30px;
    overflow:hidden;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
}

/* TABLE */

.table{
    margin-bottom:0;
}

.table thead{
    background:#f8fafc;
}

.table thead th{
    border:none;
    padding:22px 20px;
    color:#6b7280;
    font-size:13px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.table tbody td{
    padding:22px 20px;
    vertical-align:middle;
    border-color:#f1f5f9;
}

.table tbody tr{
    transition:.2s ease;
}

.table tbody tr:hover{
    background:#fafafa;
}

/* CUSTOMER */

.customer-name{
    font-weight:700;
    color:#111827;
}

.customer-label{
    font-size:12px;
    color:#9ca3af;
    margin-top:2px;
}

/* PRICE */

.price-badge{
    background:#f3f4f6;
    color:#111827;
    padding:10px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
    display:inline-block;
}

/* STATUS */

.status-badge{
    padding:9px 15px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    display:inline-block;
}

.status-completed{
    background:#dcfce7;
    color:#16a34a;
}

.status-processing{
    background:#dbeafe;
    color:#2563eb;
}

.status-pending{
    background:#fef3c7;
    color:#d97706;
}

.status-default{
    background:#f3f4f6;
    color:#6b7280;
}

/* PAYMENT */

.payment-badge{
    background:#111827;
    color:white;
    padding:9px 15px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
}

/* DATE */

.transaction-date{
    font-size:14px;
    color:#374151;
    font-weight:500;
}

/* BUTTON */

.btn-detail{
    border:none;
    background:#111827;
    color:white;
    padding:10px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
    transition:.2s ease;
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-detail:hover{
    background:#1f2937;
    color:white;
    transform:translateY(-1px);
}

/* EMPTY */

.empty-state{
    padding:90px 20px;
    text-align:center;
}

.empty-state i{
    font-size:70px;
    color:#cbd5e1;
    margin-bottom:15px;
}

.empty-state h5{
    color:#111827;
    font-weight:700;
}

.empty-state p{
    color:#6b7280;
}

/* ALERT */

.alert-modern{
    border:none;
    border-radius:20px;
    padding:16px 20px;
    background:#dcfce7;
    color:#166534;
    font-weight:600;
    margin-bottom:25px;
    box-shadow:
        0 8px 20px rgba(22,101,52,.08);
}

/* PAGINATION */

.pagination{
    justify-content:center;
    margin-top:30px;
}

.page-item .page-link{
    border:none;
    margin:0 5px;
    border-radius:14px !important;
    color:#111827;
    font-weight:600;
    background:white;
}

.page-item .page-link:hover{
    background:#f3f4f6;
    color:#111827;
}

.page-item.active .page-link{
    background:#111827;
    color:white;
}

/* ANIMATION */

.fade-up{
    animation:fadeUp .5s ease;
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

</style>

<div class="container-fluid px-4 py-4 fade-up">

    {{-- HEADER --}}
    <div class="transaction-header">

        <h1 class="transaction-title">
            Semua Transaksi
        </h1>

        <div class="transaction-subtitle">
            Monitor seluruh transaksi customer secara realtime
        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert-modern">
            {{ session('success') }}
        </div>

    @endif

    {{-- TABLE --}}
    <div class="transaction-wrapper">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Metode</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr>

                        {{-- ID --}}
                        <td>
                            <strong>#{{ $order->id }}</strong>
                        </td>

                        {{-- CUSTOMER --}}
                        <td>

                            <div class="customer-name">
                                {{ $order->user->name ?? 'Guest' }}
                            </div>

                            <div class="customer-label">
                                Customer
                            </div>

                        </td>

                        {{-- TOTAL --}}
                        <td>

                            <span class="price-badge">
                                Rp {{ number_format($order->total_price,0,',','.') }}
                            </span>

                        </td>

                        {{-- STATUS --}}
                        <td>

                            <span class="status-badge
                                {{ $order->status == 'completed'
                                    ? 'status-completed'
                                    : ($order->status == 'processing'
                                    ? 'status-processing'
                                    : ($order->status == 'pending'
                                    ? 'status-pending'
                                    : 'status-default')) }}">
                                {{ ucfirst($order->status) }}
                            </span>

                        </td>

                        {{-- PAYMENT --}}
                        <td>

                            <span class="payment-badge">
                                {{ $order->payment_method == 'cod' ? 'COD' : 'Transfer' }}
                            </span>

                        </td>

                        {{-- DATE --}}
                        <td>

                            <div class="transaction-date">
                                {{ $order->created_at->format('d M Y') }}
                            </div>

                            <small class="text-muted">
                                {{ $order->created_at->format('H:i') }}
                            </small>

                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">

                            <a
                                href="{{ route('orders.show', $order) }}"
                                class="btn-detail"
                            >
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7">

                            <div class="empty-state">

                                <i class="bi bi-receipt"></i>

                                <h5>
                                    Belum Ada Transaksi
                                </h5>

                                <p>
                                    Semua transaksi customer akan muncul di sini
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $orders->links() }}
    </div>

</div>

@endsection