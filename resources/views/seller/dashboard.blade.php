@extends('layouts.seller')

@section('title', 'Dashboard')

@section('content')

<style>

body{
    background:#f4f7fb;
}

.dashboard-wrapper{
    padding:25px;
}

/* HEADER */

.dashboard-header{
    margin-bottom:40px;
}

.dashboard-title{
    font-size:38px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:6px;
}

.dashboard-subtitle{
    color:#6b7280;
    font-size:15px;
}

/* STAT CARD */

.stat-card{
    background:white;
    border-radius:30px;
    padding:32px;
    position:relative;
    overflow:hidden;
    transition:.4s ease;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.04);
}

.stat-card:hover{
    transform:translateY(-10px);
    box-shadow:
        0 20px 60px rgba(15,23,42,.08);
}

.stat-card::before{
    content:'';
    position:absolute;
    width:200px;
    height:200px;
    border-radius:50%;
    background:rgba(99,102,241,.05);
    top:-100px;
    right:-100px;
}

/* ICON */

.icon-wrapper{
    width:75px;
    height:75px;
    border-radius:24px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    color:white;
    margin-bottom:25px;
    transition:.4s;
}

.stat-card:hover .icon-wrapper{
    transform:scale(1.08) rotate(4deg);
}

.bg-blue{
    background:linear-gradient(135deg,#6366f1,#818cf8);
}

.bg-green{
    background:linear-gradient(135deg,#10b981,#34d399);
}

.bg-orange{
    background:linear-gradient(135deg,#f59e0b,#fbbf24);
}

/* TEXT */

.stat-value{
    font-size:36px;
    font-weight:800;
    color:#111827;
    margin-bottom:5px;
}

.stat-label{
    color:#6b7280;
    font-size:14px;
}

/* CONTENT CARD */

.content-card{
    background:white;
    border-radius:30px;
    padding:28px;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.04);
    transition:.35s;
    height:100%;
}

.content-card:hover{
    transform:translateY(-5px);
    box-shadow:
        0 20px 60px rgba(15,23,42,.07);
}

.section-title{
    font-size:20px;
    font-weight:700;
    color:#111827;
    margin-bottom:25px;
    display:flex;
    align-items:center;
    gap:10px;
}

/* ORDER */

.order-item{
    padding:18px;
    border-radius:22px;
    transition:.35s;
    border:1px solid transparent;
}

.order-item:hover{
    background:#f8fafc;
    transform:translateX(6px);
    border-color:#e5e7eb;
}

.order-id{
    font-weight:700;
    color:#111827;
}

.order-user{
    font-size:13px;
    color:#6b7280;
}

.order-price{
    margin-top:6px;
    font-weight:700;
    color:#111827;
}

/* STATUS */

.status-badge{
    padding:8px 15px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.completed{
    background:#dcfce7;
    color:#16a34a;
}

.processing{
    background:#dbeafe;
    color:#2563eb;
}

.pending{
    background:#f3f4f6;
    color:#6b7280;
}

/* PRODUCT */

.product-card{
    padding:14px;
    border-radius:22px;
    transition:.35s;
}

.product-card:hover{
    background:#f8fafc;
    transform:translateY(-5px);
}

.product-image{
    width:60px;
    height:60px;
    object-fit:cover;
    border-radius:18px;
    transition:.4s;
}

.product-card:hover .product-image{
    transform:scale(1.08);
}

.product-name{
    font-weight:700;
    color:#111827;
    font-size:14px;
}

.product-stock{
    font-size:12px;
    color:#6b7280;
}

/* EMPTY */

.empty-state{
    text-align:center;
    padding:60px 20px;
    color:#6b7280;
}

.empty-state i{
    font-size:60px;
    margin-bottom:15px;
    color:#cbd5e1;
}

/* BUTTON */

.modern-btn{
    background:#111827;
    color:white;
    border:none;
    border-radius:999px;
    padding:12px 26px;
    font-weight:600;
    transition:.35s;
}

.modern-btn:hover{
    background:#1f2937;
    transform:translateY(-3px);
    box-shadow:
        0 10px 25px rgba(17,24,39,.15);
    color:white;
}

/* ANIMATION */

.fade-up{
    animation:fadeUp .7s ease;
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

</style>

<div class="dashboard-wrapper fade-up">

    {{-- HEADER --}}
    <div class="dashboard-header">
        <h1 class="dashboard-title">
            Seller Dashboard
        </h1>

        <p class="dashboard-subtitle">
            Monitor aktivitas tokomu secara realtime
        </p>
    </div>

    {{-- STATS --}}
    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="stat-card">

                <div class="icon-wrapper bg-green">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="stat-value">
                    {{ $totalProducts ?? 0 }}
                </div>

                <div class="stat-label">
                    Total Produk
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">

                <div class="icon-wrapper bg-blue">
                    <i class="bi bi-cart-check"></i>
                </div>

                <div class="stat-value">
                    {{ $totalOrders ?? 0 }}
                </div>

                <div class="stat-label">
                    Pesanan Masuk
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">

                <div class="icon-wrapper bg-orange">
                    <i class="bi bi-cash-stack"></i>
                </div>

                <div class="stat-value">
                    Rp {{ number_format($totalRevenue ?? 0,0,',','.') }}
                </div>

                <div class="stat-label">
                    Pendapatan
                </div>

            </div>
        </div>

    </div>

    {{-- CONTENT --}}
    <div class="row g-4">

        {{-- ORDERS --}}
        <div class="col-lg-6">

            <div class="content-card">

                <div class="section-title">
                    <i class="bi bi-clock-history"></i>
                    Pesanan Terbaru
                </div>

                @php
                    $recentOrders = \App\Models\OrderItem::whereHas('product', function($q) {
                        $q->where('user_id', auth()->id());
                    })->with('order.user')->latest()->take(5)->get();
                @endphp

                @if($recentOrders->count())

                    @foreach($recentOrders as $item)

                    <div class="order-item d-flex justify-content-between align-items-center mb-3">

                        <div>
                            <div class="order-id">
                                #{{ $item->order->id }}
                            </div>

                            <div class="order-user">
                                {{ $item->order->user->name ?? 'Guest' }}
                            </div>
                        </div>

                        <div class="text-end">

                            <span class="status-badge
                                {{ $item->order->status == 'completed'
                                    ? 'completed'
                                    : ($item->order->status == 'processing'
                                    ? 'processing'
                                    : 'pending') }}">
                                {{ ucfirst($item->order->status) }}
                            </span>

                            <div class="order-price">
                                Rp {{ number_format($item->price * $item->quantity,0,',','.') }}
                            </div>

                        </div>

                    </div>

                    @endforeach

                @else

                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <div>Belum ada pesanan</div>
                    </div>

                @endif

            </div>

        </div>

        {{-- PRODUCTS --}}
        <div class="col-lg-6">

            <div class="content-card">

                <div class="section-title">
                    <i class="bi bi-box"></i>
                    Produk Terbaru
                </div>

                <div class="row g-3">

                    @forelse(($recentProducts ?? []) as $product)

                    <div class="col-6">

                        <div class="product-card">

                            <div class="d-flex align-items-center gap-3">

                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    class="product-image"
                                >

                                <div>

                                    <div class="product-name">
                                        {{ Str::limit($product->name, 18) }}
                                    </div>

                                    <div class="product-stock">
                                        Stok : {{ $product->stock }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="col-12">

                        <div class="empty-state">

                            <i class="bi bi-bag-x"></i>

                            <div>Belum ada produk</div>

                            <a href="{{ route('seller.products.create') }}"
                               class="btn modern-btn mt-4">
                                Tambah Produk
                            </a>

                        </div>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection