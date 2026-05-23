@extends('layouts.app')
@section('title', 'Checkout')

@section('content')

<style>

.checkout-wrapper{
    padding-top:40px;
    padding-bottom:60px;
}

/* HEADER */

.checkout-header{
    margin-bottom:35px;
}

.checkout-title{
    font-size:42px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:8px;
}

.checkout-subtitle{
    color:#6b7280;
    font-size:15px;
}

/* CARD */

.checkout-card{
    background:white;
    border-radius:32px;
    border:1px solid #eef2f7;
    padding:35px;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
    transition:.4s;
    position:relative;
    overflow:hidden;
}

.checkout-card::before{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    border-radius:50%;
    background:rgba(17,24,39,.03);
    top:-120px;
    right:-120px;
}

.checkout-card:hover{
    transform:translateY(-4px);
    box-shadow:
        0 20px 60px rgba(15,23,42,.08);
}

/* LABEL */

.checkout-label{
    font-size:14px;
    font-weight:700;
    color:#374151;
    margin-bottom:12px;
}

/* INPUT */

.checkout-input{
    border:none;
    background:#f8fafc;
    border-radius:20px;
    padding:18px 20px;
    font-size:14px;
    transition:.35s;
    resize:none;
}

.checkout-input:focus{
    background:white;
    box-shadow:
        0 0 0 4px rgba(17,24,39,.06);
    outline:none;
}

/* PAYMENT */

.payment-card{
    background:#f9fafb;
    border:1px solid transparent;
    border-radius:22px;
    padding:18px;
    cursor:pointer;
    transition:.35s;
    position:relative;
}

.payment-card:hover{
    background:white;
    border-color:#dbe4ee;
    transform:translateY(-3px);
}

.payment-card.active{
    background:white;
    border-color:#111827;
    box-shadow:
        0 10px 30px rgba(17,24,39,.06);
}

.payment-card input{
    position:absolute;
    opacity:0;
}

.payment-icon{
    width:52px;
    height:52px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#111827;
    color:white;
    font-size:20px;
}

.payment-title{
    font-weight:700;
    color:#111827;
    margin-bottom:2px;
}

.payment-desc{
    color:#6b7280;
    font-size:13px;
}

/* SUMMARY */

.summary-card{
    background:white;
    border-radius:32px;
    border:1px solid #eef2f7;
    padding:35px;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
    position:sticky;
    top:100px;
}

.summary-title{
    font-size:22px;
    font-weight:800;
    color:#111827;
    margin-bottom:25px;
}

.summary-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
    padding-bottom:18px;
    border-bottom:1px solid #f1f5f9;
}

.summary-product{
    font-weight:600;
    color:#111827;
    font-size:14px;
}

.summary-price{
    color:#6b7280;
    font-size:14px;
}

.total-box{
    background:#111827;
    border-radius:24px;
    padding:22px;
    margin-top:25px;
    color:white;
}

.total-label{
    font-size:14px;
    opacity:.8;
}

.total-price{
    font-size:30px;
    font-weight:800;
}

/* BUTTON */

.checkout-btn{
    width:100%;
    height:62px;
    border:none;
    border-radius:22px;
    background:linear-gradient(135deg,#111827,#1f2937);
    color:white;
    font-size:15px;
    font-weight:700;
    margin-top:28px;
    transition:.4s;
    position:relative;
    overflow:hidden;
}

.checkout-btn::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.2),
        transparent
    );
    transform:translateX(-100%);
    transition:.7s;
}

.checkout-btn:hover::before{
    transform:translateX(100%);
}

.checkout-btn:hover{
    transform:translateY(-4px);
    box-shadow:
        0 20px 40px rgba(17,24,39,.18);
}

/* ALERT */

.alert{
    border:none;
    border-radius:20px;
    padding:18px;
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

    .checkout-title{
        font-size:30px;
    }

    .checkout-card,
    .summary-card{
        padding:25px;
        border-radius:26px;
    }

}

</style>

<div class="container checkout-wrapper fade-up">

    {{-- HEADER --}}
    <div class="checkout-header">

        <h1 class="checkout-title">
            Checkout
        </h1>

        <p class="checkout-subtitle">
            Lengkapi pembayaran dan selesaikan pesananmu
        </p>

    </div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mb-4">
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif

    <div class="row g-4">

        {{-- LEFT --}}
        <div class="col-lg-7">

            <div class="checkout-card">

                <form action="{{ route('checkout.process') }}" method="POST">

                    @csrf

                    {{-- ADDRESS --}}
                    <div class="mb-4">

                        <label class="checkout-label">
                            Alamat Pengiriman
                        </label>

                        <textarea
                            name="address"
                            rows="5"
                            class="form-control checkout-input @error('address') is-invalid @enderror"
                            placeholder="Masukkan alamat lengkap..."
                            required
                        >{{ old('address') }}</textarea>

                        @error('address')
                            <div class="invalid-feedback d-block mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- PAYMENT --}}
                    <div>

                        <label class="checkout-label mb-3">
                            Metode Pembayaran
                        </label>

                        <div class="d-grid gap-3">

                            {{-- COD --}}
                            <label class="payment-card active">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="cod"
                                    checked
                                >

                                <div class="d-flex align-items-center gap-3">

                                    <div class="payment-icon">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>

                                    <div>

                                        <div class="payment-title">
                                            Cash On Delivery
                                        </div>

                                        <div class="payment-desc">
                                            Bayar ketika pesanan tiba
                                        </div>

                                    </div>

                                </div>

                            </label>

                            {{-- TRANSFER --}}
                            <label class="payment-card">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="transfer"
                                >

                                <div class="d-flex align-items-center gap-3">

                                    <div class="payment-icon">
                                        <i class="bi bi-bank2"></i>
                                    </div>

                                    <div>

                                        <div class="payment-title">
                                            Transfer Bank
                                        </div>

                                        <div class="payment-desc">
                                            Pembayaran manual via rekening
                                        </div>

                                    </div>

                                </div>

                            </label>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="checkout-btn">

                        <i class="bi bi-shield-check me-2"></i>

                        Pesan Sekarang

                    </button>

                </form>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-5">

            <div class="summary-card">

                <h4 class="summary-title">
                    Ringkasan Pesanan
                </h4>

                @php $total = 0; @endphp

                @foreach($cart as $item)

                    <div class="summary-item">

                        <div>

                            <div class="summary-product">
                                {{ $item['name'] }}
                            </div>

                            <small class="text-muted">
                                Qty: {{ $item['quantity'] }}
                            </small>

                        </div>

                        <div class="summary-price">

                            Rp {{ number_format($item['price'] * $item['quantity'],0,',','.') }}

                        </div>

                    </div>

                    @php
                        $total += $item['price'] * $item['quantity'];
                    @endphp

                @endforeach

                <div class="total-box">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <div class="total-label">
                                Total Pembayaran
                            </div>

                            <div class="total-price">

                                Rp {{ number_format($total,0,',','.') }}

                            </div>

                        </div>

                        <i class="bi bi-bag-check fs-1 opacity-75"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

document.querySelectorAll('.payment-card').forEach(card=>{

    card.addEventListener('click',()=>{

        document.querySelectorAll('.payment-card')
            .forEach(c=>c.classList.remove('active'));

        card.classList.add('active');

    });

});

</script>

@endsection