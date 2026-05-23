@extends(Auth::user()->role == 'admin' ? 'layouts.admin' : (Auth::user()->role == 'seller' ? 'layouts.seller' : 'layouts.app'))

@section('title', 'Detail Pesanan #'.$order->id)

@section('content')

<style>

/* GLASS EFFECT */

.modern-card,
.side-info-card{
    backdrop-filter:blur(12px);
    -webkit-backdrop-filter:blur(12px);
}

/* HOVER EFFECT */

.meta-box,
.status-update-card{
    transition:.35s;
}

.meta-box:hover,
.status-update-card:hover{
    transform:translateY(-3px);
    box-shadow:
        0 12px 30px rgba(15,23,42,.06);
}

/* SMOOTH TABLE */

.table-modern tbody tr{
    animation:fadeTable .4s ease;
}

@keyframes fadeTable{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* BUTTON EFFECT */

.update-btn:active,
.shop-btn:active,
.back-btn:active{
    transform:scale(.98);
}

/* MOBILE FIX */

@media(max-width:992px){

    .side-info-card{
        position:relative;
        top:0;
    }

    .order-detail-wrapper{
        padding-top:95px;
    }

}

/* EXTRA PREMIUM */

.order-detail-wrapper::before{
    content:'';
    position:fixed;
    width:420px;
    height:420px;
    border-radius:50%;
    background:rgba(99,102,241,.04);
    top:-120px;
    right:-120px;
    z-index:-1;
    filter:blur(20px);
}

.order-detail-wrapper::after{
    content:'';
    position:fixed;
    width:320px;
    height:320px;
    border-radius:50%;
    background:rgba(17,24,39,.03);
    bottom:-100px;
    left:-100px;
    z-index:-1;
    filter:blur(20px);
}

.order-detail-wrapper{
    padding-top:110px;
    padding-bottom:50px;
}

/* HEADER */

.order-header{
    margin-bottom:28px;
}

.order-title{
    font-size:38px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:6px;
}

.order-subtitle{
    color:#6b7280;
    font-size:15px;
}

/* CARD */

.modern-card{
    background:white;
    border-radius:32px;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
    overflow:hidden;
    transition:.4s;
}

.modern-card:hover{
    transform:translateY(-4px);
    box-shadow:
        0 18px 50px rgba(15,23,42,.08);
}

.card-padding{
    padding:35px;
}

/* TOP INFO */

.order-meta{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    margin-bottom:28px;
}

.meta-box{
    background:#f8fafc;
    border-radius:22px;
    padding:18px 22px;
    min-width:180px;
    flex:1;
}

.meta-label{
    font-size:13px;
    color:#6b7280;
    margin-bottom:6px;
}

.meta-value{
    font-weight:700;
    color:#111827;
    font-size:16px;
}

/* STATUS */

.status-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 18px;
    border-radius:999px;
    font-weight:700;
    font-size:13px;
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

/* SECTION */

.section-title{
    font-size:20px;
    font-weight:800;
    color:#111827;
    margin-bottom:22px;
}

/* TABLE */

.table-modern{
    width:100%;
    border-collapse:separate;
    border-spacing:0 12px;
}

.table-modern thead th{
    border:none;
    color:#6b7280;
    font-size:13px;
    font-weight:700;
    padding-bottom:10px;
}

.table-modern tbody tr{
    background:#f8fafc;
    transition:.3s;
}

.table-modern tbody tr:hover{
    transform:scale(1.01);
    background:white;
    box-shadow:
        0 10px 30px rgba(15,23,42,.05);
}

.table-modern td{
    padding:18px;
    border:none;
    vertical-align:middle;
}

.table-modern tbody tr td:first-child{
    border-radius:18px 0 0 18px;
}

.table-modern tbody tr td:last-child{
    border-radius:0 18px 18px 0;
}

.product-name{
    font-weight:700;
    color:#111827;
}

/* TOTAL */

.total-box{
    margin-top:25px;
    background:#111827;
    border-radius:28px;
    padding:28px;
    color:white;
}

.total-label{
    font-size:14px;
    opacity:.7;
}

.total-price{
    font-size:34px;
    font-weight:800;
}

/* UPDATE STATUS */

.status-update-card{
    margin-top:35px;
    background:#f8fafc;
    border-radius:28px;
    padding:28px;
}

.modern-select{
    height:58px;
    border:none;
    border-radius:18px;
    background:white;
    padding:0 18px;
    box-shadow:none !important;
}

.modern-select:focus{
    box-shadow:
        0 0 0 4px rgba(17,24,39,.05) !important;
}

.update-btn{
    width:100%;
    height:58px;
    border:none;
    border-radius:18px;
    background:#111827;
    color:white;
    font-weight:700;
    transition:.35s;
}

.update-btn:hover{
    transform:translateY(-3px);
    box-shadow:
        0 15px 35px rgba(17,24,39,.15);
}

/* SIDEBAR */

.side-info-card{
    background:white;
    border-radius:32px;
    padding:35px 30px;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
    position:sticky;
    top:100px;
}

.delivery-icon{
    width:95px;
    height:95px;
    border-radius:28px;
    background:#111827;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    color:white;
    font-size:38px;
    margin-bottom:22px;
}

.side-text{
    color:#6b7280;
    line-height:1.7;
    font-size:14px;
}

.shop-btn{
    width:100%;
    height:58px;
    border:none;
    border-radius:18px;
    background:linear-gradient(135deg,#111827,#1f2937);
    color:white;
    font-weight:700;
    transition:.35s;
    margin-top:22px;

    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
}

.shop-btn:hover{
    transform:translateY(-3px);
    box-shadow:
        0 18px 40px rgba(17,24,39,.16);
    color:white;
}

/* BACK BTN */

.back-btn{
    height:52px;
    padding:0 22px;
    border-radius:18px;
    border:none;
    background:white;
    color:#111827;
    font-weight:700;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:10px;
    box-shadow:
        0 8px 25px rgba(15,23,42,.05);
    transition:.35s;
}

.back-btn:hover{
    transform:translateY(-3px);
    color:#111827;
}

/* ALERT */

.modern-alert{
    background:#eff6ff;
    border:none;
    border-radius:22px;
    padding:18px 22px;
    color:#1e40af;
    font-weight:500;
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

/* MOBILE */

@media(max-width:768px){

    .order-title{
        font-size:28px;
    }

    .card-padding{
        padding:24px;
    }

    .meta-box{
        min-width:100%;
    }

}

</style>

<div class="container order-detail-wrapper fade-up mt-5">

    {{-- HEADER --}}
    <div class="order-header">

        <h1 class="order-title">
            Detail Pesanan
        </h1>

        <p class="order-subtitle">
            Informasi lengkap pesanan customer
        </p>

    </div>

    <div class="row g-4">

        {{-- LEFT --}}
        <div class="col-lg-8">

            {{-- BACK BUTTON --}}
            <div class="mb-4">

                @if(Auth::user()->role == 'admin')

                    <a href="{{ route('admin.transactions.index') }}"
                       class="back-btn">

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Transaksi

                    </a>

                @elseif(Auth::user()->role == 'seller')

                    <a href="{{ route('seller.orders.index') }}"
                       class="back-btn">

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Pesanan

                    </a>

                @endif

            </div>

            {{-- MAIN CARD --}}
            <div class="modern-card">

                <div class="card-padding">

                    {{-- META --}}
                    <div class="order-meta">

                        <div class="meta-box">

                            <div class="meta-label">
                                Order ID
                            </div>

                            <div class="meta-value">
                                #{{ $order->id }}
                            </div>

                        </div>

                        <div class="meta-box">

                            <div class="meta-label">
                                Tanggal
                            </div>

                            <div class="meta-value">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </div>

                        </div>

                        <div class="meta-box">

                            <div class="meta-label">
                                Pembayaran
                            </div>

                            <div class="meta-value">

                                @if($order->payment_method == 'cod')
                                    COD
                                @else
                                    Transfer Bank
                                @endif

                            </div>

                        </div>

                    </div>

                    {{-- STATUS --}}
                    <div class="mb-4">

                        <span class="status-badge
                            {{ $order->status == 'completed' ? 'status-completed' :
                               ($order->status == 'processing' ? 'status-processing' :
                               ($order->status == 'pending' ? 'status-pending' : 'status-cancelled')) }}">

                            <i class="bi
                                {{ $order->status == 'completed' ? 'bi-check-circle-fill' :
                                   ($order->status == 'processing' ? 'bi-arrow-repeat' :
                                   ($order->status == 'pending' ? 'bi-clock-fill' : 'bi-x-circle-fill')) }}"></i>

                            {{ ucfirst($order->status) }}

                        </span>

                    </div>

                    {{-- ADDRESS --}}
                    <div class="mb-4">

                        <div class="section-title">
                            Alamat Pengiriman
                        </div>

                        <p class="text-muted mb-0 lh-lg">
                            {{ $order->address }}
                        </p>

                    </div>

                    {{-- PRODUCTS --}}
                    <div>

                        <div class="section-title">
                            Produk yang Dibeli
                        </div>

                        <div class="table-responsive">

                            <table class="table-modern">

                                <thead>

                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($order->items as $item)

                                    <tr>

                                        <td>

                                            <div class="product-name">
                                                {{ $item->product->name }}
                                            </div>

                                        </td>

                                        <td>
                                            {{ $item->quantity }}
                                        </td>

                                        <td>
                                            Rp {{ number_format($item->price,0,',','.') }}
                                        </td>

                                        <td class="fw-bold">

                                            Rp {{ number_format($item->quantity * $item->price,0,',','.') }}

                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                    {{-- TOTAL --}}
                    <div class="total-box">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="total-label">
                                    Total Pembayaran
                                </div>

                                <div class="total-price">

                                    Rp {{ number_format($order->total_price,0,',','.') }}

                                </div>

                            </div>

                            <i class="bi bi-wallet2 fs-1 opacity-75"></i>

                        </div>

                    </div>

                    {{-- COD ALERT --}}
                    @if($order->payment_method == 'cod' && $order->status == 'pending')

                        <div class="modern-alert mt-4">

                            <i class="bi bi-info-circle-fill me-2"></i>

                            Pesanan COD akan diproses oleh seller dan dibayar saat barang diterima customer.

                        </div>

                    @endif

                    {{-- UPDATE STATUS --}}
                    @if(in_array(Auth::user()->role, ['admin', 'seller']))

                    <div class="status-update-card">

                        <div class="section-title mb-3">
                            Update Status Pesanan
                        </div>

                        <form action="{{ route('orders.updateStatus', $order) }}"
                              method="POST">

                            @csrf
                            @method('PATCH')

                            <div class="row g-3">

                                <div class="col-md-7">

                                    <select name="status"
                                            class="form-select modern-select">

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

                                </div>

                                <div class="col-md-5">

                                    <button type="submit"
                                            class="update-btn">

                                        <i class="bi bi-check2-circle me-2"></i>

                                        Update Status

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                    @endif

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4">

            <div class="side-info-card text-center">

                <div class="delivery-icon">

                    <i class="bi bi-truck"></i>

                </div>

                <h4 class="fw-bold mb-3">
                    Informasi Pengiriman
                </h4>

                <p class="side-text">

                    Pesanan akan segera diproses setelah pembayaran
                    berhasil diverifikasi oleh sistem atau seller.

                </p>

                <a href="{{ route('products.index') }}"
                   class="shop-btn">

                    <i class="bi bi-bag me-2"></i>

                    Belanja Lagi

                </a>

            </div>

        </div>

    </div>

</div>

@endsection