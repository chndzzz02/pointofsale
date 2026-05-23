@extends('layouts.seller')

@section('title', 'Pesanan Masuk')

@section('content')

<style>

.orders-page{
    animation:fadeUp .7s ease;
}

/* HEADER */

.orders-header{
    margin-bottom:32px;
}

.orders-title{

    font-size:42px;

    font-weight:800;

    letter-spacing:-2px;

    color:var(--text);

    margin-bottom:8px;
}

.orders-subtitle{

    color:var(--muted);

    font-size:15px;
}

/* CARD */

.orders-card{

    background:var(--card);

    border-radius:34px;

    overflow:hidden;

    box-shadow:var(--shadow);

    border:1px solid rgba(255,255,255,.08);
}

/* TABLE */

.orders-table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 16px;
}

.orders-table thead th{

    border:none;

    padding:0 28px 14px;

    font-size:13px;

    font-weight:700;

    color:var(--muted);
}

.orders-table tbody tr{

    background:var(--card);

    transition:.35s ease;

    box-shadow:
        0 10px 25px rgba(15,23,42,.04);

    border-radius:24px;
}

.orders-table tbody tr:hover{

    transform:translateY(-4px);

    box-shadow:
        0 18px 40px rgba(15,23,42,.08);
}

.orders-table tbody td{

    padding:22px 28px;

    border:none;

    vertical-align:middle;
}

/* ORDER ID */

.order-id{

    font-weight:800;

    color:var(--text);

    font-size:15px;
}

.order-small{

    font-size:12px;

    color:var(--muted);
}

/* CUSTOMER */

.customer-box{

    display:flex;

    align-items:center;

    gap:14px;
}

.customer-avatar{

    width:48px;
    height:48px;

    border-radius:16px;

    background:
        linear-gradient(
            135deg,
            #10b981,
            #14b8a6
        );

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:800;

    box-shadow:
        0 10px 20px rgba(16,185,129,.2);
}

.customer-name{

    font-weight:700;

    color:var(--text);
}

/* PRICE */

.total-price{

    font-weight:800;

    color:#10b981;

    font-size:15px;
}

/* STATUS */

.status-badge{

    border-radius:16px;

    padding:12px 18px;

    font-size:13px;

    font-weight:700;

    display:inline-flex;

    align-items:center;

    gap:8px;
}

.status-completed{

    background:rgba(16,185,129,.12);

    color:#10b981;
}

.status-processing{

    background:rgba(59,130,246,.12);

    color:#3b82f6;
}

.status-pending{

    background:rgba(245,158,11,.12);

    color:#f59e0b;
}

.status-cancelled{

    background:rgba(239,68,68,.12);

    color:#ef4444;
}

/* PAYMENT */

.payment-badge{

    padding:12px 18px;

    border-radius:16px;

    background:#f8fafc;

    font-weight:700;

    font-size:13px;

    color:#334155;
}

/* SELECT */

.status-select{

    border:none;

    background:#f8fafc;

    border-radius:18px;

    padding:14px 18px;

    min-width:180px;

    font-weight:600;

    transition:.3s ease;
}

.status-select:focus{

    outline:none;

    background:white;

    box-shadow:
        0 0 0 4px rgba(16,185,129,.12);
}

/* EMPTY */

.empty-state{

    text-align:center;

    padding:90px 30px;
}

.empty-icon{

    width:110px;
    height:110px;

    margin:auto auto 25px;

    border-radius:32px;

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.08),
            rgba(20,184,166,.05)
        );

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

    color:#10b981;
}

.empty-title{

    font-size:24px;

    font-weight:800;

    color:var(--text);

    margin-bottom:8px;
}

.empty-subtitle{

    color:var(--muted);
}

/* ALERT */

.alert-modern{

    border:none;

    border-radius:24px;

    padding:18px 24px;

    background:
        rgba(16,185,129,.08);

    color:#10b981;

    font-weight:600;

    margin-bottom:25px;
}

/* MOBILE */

@media(max-width:992px){

    .orders-card{
        overflow-x:auto;
    }

    .orders-title{
        font-size:32px;
    }

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

<div class="orders-page">

    {{-- HEADER --}}
    <div class="orders-header">

        <h1 class="orders-title">
            Pesanan Masuk
        </h1>

        <p class="orders-subtitle">
            Kelola pesanan customer dengan tampilan modern dan profesional.
        </p>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert-modern">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif

    {{-- CARD --}}
    <div class="orders-card">

        @if($orders->count())

        <div class="table-responsive">

            <table class="orders-table">

                <thead>

                    <tr>

                        <th>Order</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Metode</th>
                        <th class="text-end">
                            Update Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($orders as $order)

                    <tr>

                        {{-- ORDER ID --}}
                        <td>

                            <div class="order-id">
                                #{{ $order->id }}
                            </div>

                            <div class="order-small">
                                Order Pesanan
                            </div>

                        </td>

                        {{-- CUSTOMER --}}
                        <td>

                            <div class="customer-box">

                                <div class="customer-avatar">

                                    {{ strtoupper(substr($order->user->name ?? 'G',0,1)) }}

                                </div>

                                <div>

                                    <div class="customer-name">
                                        {{ $order->user->name ?? 'Guest' }}
                                    </div>

                                </div>

                            </div>

                        </td>

                        {{-- TOTAL --}}
                        <td>

                            <div class="total-price">

                                Rp {{ number_format($order->total_price,0,',','.') }}

                            </div>

                        </td>

                        {{-- STATUS --}}
                        <td>

                            <span class="status-badge
                                {{ $order->status == 'completed' ? 'status-completed' :
                                ($order->status == 'processing' ? 'status-processing' :
                                ($order->status == 'pending' ? 'status-pending' :
                                'status-cancelled')) }}">

                                <i class="bi
                                {{ $order->status == 'completed' ? 'bi-check-circle-fill' :
                                ($order->status == 'processing' ? 'bi-arrow-repeat' :
                                ($order->status == 'pending' ? 'bi-clock-fill' :
                                'bi-x-circle-fill')) }}"></i>

                                {{ ucfirst($order->status) }}

                            </span>

                        </td>

                        {{-- PAYMENT --}}
                        <td>

                            <span class="payment-badge">

                                {{ $order->payment_method == 'cod'
                                ? 'Cash on Delivery'
                                : 'Transfer Bank' }}

                            </span>

                        </td>

                        {{-- ACTION --}}
                        <td class="text-end">

                            <form action="{{ route('seller.orders.updateStatus', $order) }}"
                                  method="POST">

                                @csrf
                                @method('PATCH')

                                <select
                                    name="status"
                                    class="status-select"
                                    onchange="this.form.submit()">

                                    <option value="pending"
                                        {{ $order->status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="processing"
                                        {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Processing
                                    </option>

                                    <option value="completed"
                                        {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>

                                    <option value="cancelled"
                                        {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>

                                </select>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        {{-- EMPTY --}}
        <div class="empty-state">

            <div class="empty-icon">

                <i class="bi bi-inbox"></i>

            </div>

            <h3 class="empty-title">
                Belum Ada Pesanan
            </h3>

            <p class="empty-subtitle">
                Pesanan customer akan muncul setelah checkout berhasil.
            </p>

        </div>

        @endif

    </div>

</div>

@endsection