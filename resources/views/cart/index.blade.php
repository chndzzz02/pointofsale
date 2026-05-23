@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')

<style>
    .cart-wrapper {
        padding-top: 40px;
        padding-bottom: 80px;
    }

    /* HEADER */

    .cart-header {
        margin-bottom: 35px;
    }

    .cart-title {
        font-size: 42px;
        font-weight: 800;
        color: #111827;
        letter-spacing: -1px;
        margin-bottom: 8px;
    }

    .cart-subtitle {
        color: #6b7280;
        font-size: 15px;
    }

    /* CART CARD */

    .cart-card {
        background: #fff;
        border-radius: 30px;
        border: 1px solid #eef2f7;
        padding: 22px;
        margin-bottom: 22px;
        transition: .35s;
        box-shadow:
            0 8px 30px rgba(15, 23, 42, .05);
    }

    .cart-card:hover {
        transform: translateY(-4px);
        box-shadow:
            0 18px 45px rgba(15, 23, 42, .08);
    }

    /* IMAGE */

    .cart-image {
        width: 120px;
        height: 120px;
        border-radius: 24px;
        object-fit: cover;
        transition: .4s;
    }

    .cart-card:hover .cart-image {
        transform: scale(1.03);
    }

    /* PRODUCT */

    .cart-product-title {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .cart-product-price {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 14px;
    }

    .cart-meta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .meta-badge {
        background: #f4f7fb;
        color: #6b7280;
        border-radius: 999px;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 600;
    }

    /* QUANTITY */

    .qty-box {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .qty-input {
        width: 90px;
        height: 52px;
        border: none;
        background: #f4f7fb;
        border-radius: 16px;
        text-align: center;
        font-size: 16px;
        font-weight: 700;
        transition: .3s;
    }

    .qty-input:focus {
        outline: none;
        background: #fff;
        box-shadow:
            0 0 0 4px rgba(99, 102, 241, .12);
    }

    /* DELETE */

    .delete-btn {
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 16px;
        background: #fff0f0;
        color: #ef4444;
        transition: .3s;
    }

    .delete-btn:hover {
        background: #ef4444;
        color: white;
        transform: translateY(-2px);
    }

    /* SUMMARY */

    .summary-card {
        background: #fff;
        border-radius: 32px;
        border: 1px solid #eef2f7;
        padding: 32px;
        position: sticky;
        top: 120px;
        box-shadow:
            0 10px 40px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .summary-card::before {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(99, 102, 241, .04);
        top: -120px;
        right: -120px;
    }

    .summary-title {
        font-size: 24px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 25px;
    }

    /* SUMMARY ROW */

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 18px;
        font-size: 15px;
        color: #6b7280;
    }

    .summary-total {
        padding-top: 20px;
        margin-top: 20px;
        border-top: 1px solid #eef2f7;
    }

    .summary-total .price {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
    }

    /* CHECKOUT */

    .checkout-btn {
        width: 100%;
        height: 60px;
        border: none;
        border-radius: 20px;
        background: #111827;
        color: #fff !important;
        font-size: 16px;
        font-weight: 700;
        transition: .35s;
        margin-top: 25px;
        position: relative;
        overflow: hidden;

        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .checkout-btn:hover {
        transform: translateY(-4px);
        box-shadow:
            0 18px 40px rgba(17, 24, 39, .18);
    }

    .checkout-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, .18),
                transparent);
        transition: .6s;
    }

    .checkout-btn:hover::before {
        left: 100%;
    }

    /* EMPTY */

    .empty-cart {
        background: #fff;
        border-radius: 36px;
        padding: 80px 30px;
        text-align: center;
        border: 1px solid #eef2f7;
        box-shadow:
            0 10px 40px rgba(15, 23, 42, .05);
    }

    .empty-icon {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #f4f7fb;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        margin-bottom: 25px;
    }

    .empty-icon i {
        font-size: 50px;
        color: #111827;
    }

    .empty-title {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
    }

    .empty-subtitle {
        color: #6b7280;
        margin-bottom: 35px;
    }

    .shop-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #111827;
        color: white;
        text-decoration: none;
        border-radius: 18px;
        padding: 16px 30px;
        font-weight: 700;
        transition: .35s;
    }

    .shop-btn:hover {
        background: #1f2937;
        transform: translateY(-4px);
        color: white;
    }

    /* ANIMATION */

    .fade-up {
        animation: fadeUp .7s ease;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* MOBILE */

    @media(max-width:768px) {

        .cart-title {
            font-size: 32px;
        }

        .cart-image {
            width: 90px;
            height: 90px;
        }

        .summary-card {
            margin-top: 20px;
        }

    }
</style>

<div class="container cart-wrapper fade-up">

    {{-- HEADER --}}
    <div class="cart-header">

        <h1 class="cart-title">
            Keranjang Belanja
        </h1>

        <p class="cart-subtitle">
            Kelola produk yang ingin kamu checkout
        </p>

    </div>

    @if(!empty($cart))

    <div class="row g-4">

        {{-- LEFT --}}
        <div class="col-lg-8">

            @foreach($cart as $id => $item)

            <div class="cart-card">

                <div class="row align-items-center g-4">

                    {{-- IMAGE --}}
                    <div class="col-md-3">

                        <img
                            src="{{ asset('storage/'.$item['image']) }}"
                            class="cart-image w-100"
                            alt="{{ $item['name'] }}">

                    </div>

                    {{-- INFO --}}
                    <div class="col-md-5">

                        <div class="cart-product-title">
                            {{ $item['name'] }}
                        </div>

                        <div class="cart-product-price">
                            Rp {{ number_format($item['price'],0,',','.') }}
                        </div>

                        <div class="cart-meta">

                            <div class="meta-badge">
                                <i class="bi bi-patch-check-fill me-1"></i>
                                Produk Original
                            </div>

                            <div class="meta-badge">
                                <i class="bi bi-truck me-1"></i>
                                Ready Stock
                            </div>

                        </div>

                    </div>

                    {{-- ACTION --}}
                    <div class="col-md-4">

                        <div class="d-flex justify-content-md-end align-items-center gap-3">

                            {{-- QTY --}}
                            <form action="{{ route('cart.update', $id) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="form-control qty-input"
                                    onchange="this.form.submit()">

                            </form>

                            {{-- DELETE --}}
                            <form action="{{ route('cart.remove', $id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="delete-btn">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        {{-- SUMMARY --}}
        <div class="col-lg-4">

            <div class="summary-card">

                <h4 class="summary-title">
                    Ringkasan Belanja
                </h4>

                <div class="summary-row">
                    <span>Total Produk</span>
                    <strong>{{ count($cart) }}</strong>
                </div>

                <div class="summary-row">
                    <span>Pengiriman</span>
                    <strong>Gratis</strong>
                </div>

                <div class="summary-row summary-total">

                    <span>Total Pembayaran</span>

                    <div class="price">
                        Rp {{ number_format(array_sum(array_map(function($item){ return $item['price'] * $item['quantity']; }, $cart)),0,',','.') }}
                    </div>

                </div>

                <a href="{{ route('checkout.index') }}"
                    class="checkout-btn">

                    <i class="bi bi-credit-card-fill me-2"></i>

                    <span>Lanjut Checkout</span>

                </a>

            </div>

        </div>

    </div>

    @else

    {{-- EMPTY --}}
    <div class="empty-cart fade-up">

        <div class="empty-icon">

            <i class="bi bi-cart-x"></i>

        </div>

        <h2 class="empty-title">
            Keranjang Masih Kosong
        </h2>

        <p class="empty-subtitle">
            Yuk mulai belanja produk favoritmu sekarang juga
        </p>

        <a href="{{ route('products.index') }}"
            class="shop-btn">

            <i class="bi bi-bag-heart-fill"></i>

            Belanja Sekarang

        </a>

    </div>

    @endif

</div>

@endsection