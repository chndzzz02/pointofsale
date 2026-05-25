@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')

<style>

:root{
    --primary:#2563eb;
    --primary-soft:#dbeafe;
    --success:#16a34a;
    --success-soft:#dcfce7;
    --warning:#d97706;
    --warning-soft:#fef3c7;
    --danger:#dc2626;
    --dark:#0f172a;
    --gray:#64748b;
    --border:#e2e8f0;
    --bg:#f8fafc;
    --card:#ffffff;
}

body{
    background:linear-gradient(to bottom,#f8fafc,#f1f5f9);
}

/* =========================
   WRAPPER
========================= */

.transaction-page{
    padding:10px 5px 40px;
    animation:fadeUp .5s ease;
}

/* =========================
   HEADER
========================= */

.transaction-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:28px;
    flex-wrap:wrap;
}

.header-left{
    display:flex;
    align-items:flex-start;
    gap:18px;
}

.header-icon{
    width:64px;
    height:64px;
    border-radius:22px;
    background:linear-gradient(135deg,var(--primary),#1d4ed8);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:26px;
    box-shadow:
        0 15px 35px rgba(37,99,235,.20);
}

.transaction-title{
    font-size:32px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:5px;
    letter-spacing:-1px;
}

.transaction-subtitle{
    color:var(--gray);
    font-size:14px;
    line-height:1.7;
}

/* =========================
   ALERT
========================= */

.alert-modern{
    border:none;
    background:var(--success-soft);
    color:#166534;
    border-radius:18px;
    padding:15px 18px;
    font-weight:600;
    margin-bottom:24px;
    box-shadow:
        0 10px 25px rgba(22,101,52,.08);
}

/* =========================
   CARD
========================= */

.transaction-card{
    background:rgba(255,255,255,.92);
    backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,.7);
    border-radius:30px;
    overflow:hidden;
    box-shadow:
        0 20px 50px rgba(15,23,42,.06);
}

/* =========================
   TABLE
========================= */

.table{
    margin-bottom:0;
}

.table thead{
    background:#f8fafc;
}

.table thead th{
    border:none;
    padding:22px 20px;
    color:#64748b;
    font-size:12px;
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:.8px;
    white-space:nowrap;
}

.table tbody td{
    border-color:#f1f5f9;
    padding:22px 20px;
    vertical-align:middle;
}

.table tbody tr{
    transition:.25s ease;
}

.table tbody tr:hover{
    background:#fbfdff;
}

/* =========================
   ID BADGE
========================= */

.id-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:58px;
    height:38px;
    padding:0 14px;
    border-radius:14px;
    background:#eff6ff;
    color:var(--primary);
    font-weight:800;
    font-size:13px;
}

/* =========================
   CUSTOMER
========================= */

.customer-wrapper{
    display:flex;
    align-items:center;
    gap:14px;
}

.customer-avatar{
    width:52px;
    height:52px;
    border-radius:18px;
    background:linear-gradient(135deg,var(--primary),#1d4ed8);
    color:white;
    font-weight:800;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    flex-shrink:0;
    box-shadow:
        0 10px 20px rgba(37,99,235,.15);
}

.customer-name{
    font-weight:700;
    color:var(--dark);
    margin-bottom:3px;
    font-size:14px;
}

.customer-label{
    font-size:12px;
    color:#94a3b8;
}

/* =========================
   TOTAL
========================= */

.price-box{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 15px;
    border-radius:14px;
    background:#f8fafc;
    color:var(--dark);
    font-weight:700;
    font-size:13px;
}

.price-box i{
    color:var(--success);
}

/* =========================
   STATUS
========================= */

.status-pill{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 15px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.status-completed{
    background:var(--success-soft);
    color:var(--success);
}

.status-processing{
    background:var(--primary-soft);
    color:var(--primary);
}

.status-pending{
    background:var(--warning-soft);
    color:var(--warning);
}

.status-default{
    background:#f1f5f9;
    color:#64748b;
}

/* =========================
   PAYMENT
========================= */

.payment-pill{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 14px;
    border-radius:14px;
    background:#eff6ff;
    color:var(--primary);
    font-size:12px;
    font-weight:700;
}

/* =========================
   DATE
========================= */

.date-text{
    font-size:14px;
    font-weight:700;
    color:var(--dark);
    margin-bottom:2px;
}

.time-text{
    color:#94a3b8;
    font-size:12px;
}

/* =========================
   BUTTON
========================= */

.btn-detail{
    height:42px;
    padding:0 18px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,var(--primary),#1d4ed8);
    color:white;
    font-size:13px;
    font-weight:700;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:8px;
    transition:.25s ease;
    box-shadow:
        0 10px 20px rgba(37,99,235,.15);
}

.btn-detail:hover{
    transform:translateY(-2px);
    color:white;
    box-shadow:
        0 15px 30px rgba(37,99,235,.25);
}

/* =========================
   EMPTY STATE
========================= */

.empty-state{
    padding:90px 20px;
    text-align:center;
}

.empty-icon{
    width:100px;
    height:100px;
    border-radius:30px;
    background:#f1f5f9;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    margin-bottom:22px;
    color:#94a3b8;
    font-size:42px;
}

.empty-title{
    font-size:22px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:8px;
}

.empty-text{
    color:var(--gray);
    font-size:14px;
}

/* =========================
   PAGINATION
========================= */

.pagination{
    justify-content:center;
    gap:6px;
}

.page-item .page-link{
    border:none;
    min-width:42px;
    height:42px;
    border-radius:14px !important;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--dark);
    font-weight:700;
    background:white;
    box-shadow:none;
}

.page-item .page-link:hover{
    background:#eff6ff;
    color:var(--primary);
}

.page-item.active .page-link{
    background:linear-gradient(135deg,var(--primary),#1d4ed8);
    color:white;
}

/* =========================
   ANIMATION
========================= */

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(18px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .transaction-title{
        font-size:26px;
    }

    .header-icon{
        width:56px;
        height:56px;
        border-radius:18px;
        font-size:22px;
    }

    .table{
        min-width:900px;
    }

}

</style>

<div class="container-fluid px-4 transaction-page">

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert-modern">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>

    @endif

    {{-- TABLE --}}
    <div class="transaction-card">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr>

                        {{-- ID --}}
                        <td>

                            <span class="id-badge">
                                #{{ $order->id }}
                            </span>

                        </td>

                        {{-- CUSTOMER --}}
                        <td>

                            <div class="customer-wrapper">

                                <div class="customer-avatar">

                                    {{ strtoupper(substr($order->user->name ?? 'G',0,1)) }}

                                </div>

                                <div>

                                    <div class="customer-name">
                                        {{ $order->user->name ?? 'Guest' }}
                                    </div>

                                    <div class="customer-label">
                                        Customer
                                    </div>

                                </div>

                            </div>

                        </td>

                        {{-- TOTAL --}}
                        <td>

                            <div class="price-box">

                                <i class="bi bi-wallet2"></i>

                                Rp {{ number_format($order->total_price,0,',','.') }}

                            </div>

                        </td>

                        {{-- STATUS --}}
                        <td>

                            <span class="status-pill
                                {{ $order->status == 'completed'
                                    ? 'status-completed'
                                    : ($order->status == 'processing'
                                    ? 'status-processing'
                                    : ($order->status == 'pending'
                                    ? 'status-pending'
                                    : 'status-default')) }}">

                                <i class="bi
                                    {{ $order->status == 'completed'
                                        ? 'bi-check-circle-fill'
                                        : ($order->status == 'processing'
                                        ? 'bi-arrow-repeat'
                                        : ($order->status == 'pending'
                                        ? 'bi-hourglass-split'
                                        : 'bi-circle')) }}"></i>

                                {{ ucfirst($order->status) }}

                            </span>

                        </td>

                        {{-- PAYMENT --}}
                        <td>

                            <span class="payment-pill">

                                <i class="bi bi-credit-card-2-front"></i>

                                {{ $order->payment_method == 'cod'
                                    ? 'COD'
                                    : 'Transfer' }}

                            </span>

                        </td>

                        {{-- DATE --}}
                        <td>

                            <div class="date-text">
                                {{ $order->created_at->format('d M Y') }}
                            </div>

                            <div class="time-text">
                                {{ $order->created_at->format('H:i') }}
                            </div>

                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">

                            <a
                                href="{{ route('orders.show', $order) }}"
                                class="btn-detail"
                            >

                                <i class="bi bi-eye-fill"></i>

                                Detail

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    <i class="bi bi-receipt"></i>
                                </div>

                                <div class="empty-title">
                                    Belum Ada Transaksi
                                </div>

                                <div class="empty-text">
                                    Semua transaksi customer akan tampil di halaman ini
                                </div>

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