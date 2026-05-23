@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')

<style>

.orders-wrapper{
    padding-top:120px;
    padding-bottom:60px;
    position:relative;
    overflow:hidden;
}

/* BACKGROUND EFFECT */

.orders-wrapper::before{
    content:'';
    position:absolute;
    width:420px;
    height:420px;
    border-radius:50%;
    background:rgba(99,102,241,.05);
    top:-180px;
    right:-120px;
    filter:blur(20px);
}

.orders-wrapper::after{
    content:'';
    position:absolute;
    width:320px;
    height:320px;
    border-radius:50%;
    background:rgba(17,24,39,.04);
    bottom:-120px;
    left:-120px;
    filter:blur(20px);
}

/* HEADER */

.orders-header{
    margin-bottom:35px;
    position:relative;
    z-index:2;
}

.orders-title{
    font-size:40px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:8px;
}

.orders-subtitle{
    color:#6b7280;
    font-size:15px;
}

/* CARD */

.order-card{
    background:white;
    border-radius:32px;
    border:1px solid #eef2f7;
    overflow:hidden;
    position:relative;
    transition:.4s;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
    height:100%;
}

.order-card:hover{
    transform:translateY(-8px);
    box-shadow:
        0 20px 50px rgba(15,23,42,.08);
}

.order-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:5px;
    background:linear-gradient(90deg,#111827,#374151);
}

/* CARD BODY */

.order-card-body{
    padding:28px;
}

/* TOP */

.order-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:22px;
}

.order-id{
    color:#9ca3af;
    font-size:13px;
    font-weight:600;
}

.order-date{
    font-size:18px;
    font-weight:800;
    color:#111827;
    margin-top:5px;
}

/* BADGE */

.status-badge{
    padding:10px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:7px;
}

.status-pending{
    background:#fff7ed;
    color:#ea580c;
}

.status-processing{
    background:#eff6ff;
    color:#2563eb;
}

.status-completed{
    background:#ecfdf5;
    color:#059669;
}

.status-cancelled{
    background:#f3f4f6;
    color:#6b7280;
}

/* DIVIDER */

.order-divider{
    height:1px;
    background:#eef2f7;
    margin:20px 0;
}

/* INFO */

.order-info{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:14px;
}

.info-label{
    color:#6b7280;
    font-size:14px;
}

.info-value{
    font-weight:700;
    color:#111827;
}

.payment-method{
    display:flex;
    align-items:center;
    gap:8px;
}

/* TOTAL */

.total-price{
    font-size:24px;
    font-weight:800;
    color:#111827;
}

/* BUTTON */

.detail-btn{
    width:100%;
    height:58px;
    border:none;
    border-radius:20px;
    background:#111827;
    color:white !important;
    font-weight:700;
    margin-top:25px;
    transition:.35s;
    text-decoration:none;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    position:relative;
    overflow:hidden;
}

.detail-btn::before{
    content:'';
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:rgba(255,255,255,.12);
    transition:.5s;
}

.detail-btn:hover::before{
    left:100%;
}

.detail-btn:hover{
    transform:translateY(-4px);
    box-shadow:
        0 18px 40px rgba(17,24,39,.15);
}

/* EMPTY */

.empty-state{
    background:white;
    border-radius:36px;
    padding:70px 40px;
    text-align:center;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
}

.empty-icon{
    width:110px;
    height:110px;
    border-radius:32px;
    background:#f8fafc;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    margin-bottom:28px;
    font-size:48px;
    color:#111827;
}

.empty-title{
    font-size:28px;
    font-weight:800;
    color:#111827;
    margin-bottom:10px;
}

.empty-text{
    color:#6b7280;
    margin-bottom:30px;
}

/* SHOP BTN */

.shop-btn{
    height:58px;
    padding:0 32px;
    border:none;
    border-radius:20px;
    background:linear-gradient(135deg,#111827,#1f2937);
    color:white !important;
    font-weight:700;
    transition:.35s;
    text-decoration:none;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
}

.shop-btn:hover{
    transform:translateY(-4px);
    box-shadow:
        0 18px 40px rgba(17,24,39,.15);
}

/* ANIMATION */

.fade-up{
    animation:fadeUp .7s ease;
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(25px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* MOBILE */

@media(max-width:768px){

    .orders-title{
        font-size:30px;
    }

    .order-card-body{
        padding:22px;
    }

    .order-top{
        flex-direction:column;
        gap:15px;
    }

}

</style>

<div class="container orders-wrapper fade-up">

    {{-- HEADER --}}
    <div class="orders-header">

        <h1 class="orders-title">
            Pesanan Saya
        </h1>

        <p class="orders-subtitle">
            Pantau seluruh transaksi dan status pesanan Anda
        </p>

    </div>

    @if($orders->count())

        <div class="row g-4">

            @foreach($orders as $order)

            <div class="col-lg-6">

                <div class="order-card">

                    <div class="order-card-body">

                        {{-- TOP --}}
                        <div class="order-top">

                            <div>

                                <div class="order-id">
                                    ORDER #{{ $order->id }}
                                </div>

                                <div class="order-date">
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </div>

                            </div>

                            <div>

                                <span class="status-badge
                                    {{ $order->status == 'completed' ? 'status-completed' :
                                       ($order->status == 'processing' ? 'status-processing' :
                                       ($order->status == 'pending' ? 'status-pending' : 'status-cancelled')) }}">

                                    <i class="bi
                                        {{ $order->status == 'completed' ? 'bi-check-circle-fill' :
                                           ($order->status == 'processing' ? 'bi-arrow-repeat' :
                                           ($order->status == 'pending' ? 'bi-clock-fill' : 'bi-x-circle-fill')) }}"></i>

                                    @if($order->status == 'pending')
                                        Menunggu
                                    @elseif($order->status == 'processing')
                                        Diproses
                                    @elseif($order->status == 'completed')
                                        Selesai
                                    @elseif($order->status == 'cancelled')
                                        Dibatalkan
                                    @else
                                        {{ ucfirst($order->status) }}
                                    @endif

                                </span>

                            </div>

                        </div>

                        <div class="order-divider"></div>

                        {{-- PAYMENT --}}
                        <div class="order-info">

                            <div class="info-label">
                                Metode Pembayaran
                            </div>

                            <div class="info-value payment-method">

                                @if($order->payment_method == 'cod')

                                    <i class="bi bi-cash-stack"></i>

                                    COD

                                @elseif($order->payment_method == 'transfer')

                                    <i class="bi bi-bank2"></i>

                                    Transfer

                                @else

                                    {{ $order->payment_method }}

                                @endif

                            </div>

                        </div>

                        {{-- TOTAL --}}
                        <div class="order-info">

                            <div class="info-label">
                                Total Pembayaran
                            </div>

                            <div class="total-price">

                                Rp {{ number_format($order->total_price,0,',','.') }}

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <a href="{{ route('orders.show', $order) }}"
                           class="detail-btn">

                            <i class="bi bi-receipt"></i>

                            Lihat Detail Pesanan

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    @else

        <div class="empty-state fade-up">

            <div class="empty-icon">

                <i class="bi bi-bag-x"></i>

            </div>

            <h2 class="empty-title">
                Belum Ada Pesanan
            </h2>

            <p class="empty-text">
                Kamu belum memiliki transaksi apapun.
                Yuk mulai belanja sekarang 🚀
            </p>

            <a href="{{ route('products.index') }}"
               class="shop-btn">

                <i class="bi bi-bag"></i>

                Mulai Belanja

            </a>

        </div>

    @endif

</div>

@endsection