@extends('layouts.app')
@section('title', $product->name)

@section('content')

<style>

.product-detail-wrapper{
    padding-top:40px;
    padding-bottom:70px;
}

/* IMAGE SECTION */

.product-image-card{
    background:#fff;
    border-radius:32px;
    padding:24px;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.06);
    overflow:hidden;
    position:sticky;
    top:110px;
    transition:.4s;
}

.product-image-card:hover{
    transform:translateY(-4px);
    box-shadow:
        0 20px 60px rgba(15,23,42,.10);
}

.product-main-image{
    width:100%;
    height:520px;
    object-fit:cover;
    border-radius:24px;
    transition:.5s;
}

.product-image-card:hover .product-main-image{
    transform:scale(1.03);
}

/* INFO */

.product-info-card{
    background:#fff;
    border-radius:32px;
    padding:38px;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
    position:relative;
    overflow:hidden;
}

.product-info-card::before{
    content:'';
    position:absolute;
    width:280px;
    height:280px;
    border-radius:50%;
    background:rgba(99,102,241,.04);
    top:-120px;
    right:-120px;
}

/* CATEGORY */

.category-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#f4f7fb;
    color:#6b7280;
    padding:10px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    margin-bottom:18px;
}

/* TITLE */

.product-title{
    font-size:42px;
    font-weight:800;
    line-height:1.15;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:18px;
}

/* PRICE */

.product-price{
    font-size:42px;
    font-weight:800;
    color:#111827;
    margin-bottom:25px;
}

/* STOCK */

.stock-box{
    display:flex;
    align-items:center;
    gap:12px;
    background:#f9fafb;
    border:1px solid #eef2f7;
    padding:14px 18px;
    border-radius:18px;
    margin-bottom:25px;
}

.stock-icon{
    width:46px;
    height:46px;
    border-radius:14px;
    background:#111827;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.stock-text{
    font-size:14px;
    color:#6b7280;
}

.stock-text strong{
    color:#111827;
    font-size:16px;
}

/* DESCRIPTION */

.description-box{
    background:#fafafa;
    border-radius:24px;
    padding:24px;
    border:1px solid #f1f5f9;
    margin-bottom:30px;
}

.description-title{
    font-size:15px;
    font-weight:700;
    color:#111827;
    margin-bottom:12px;
}

.description-content{
    color:#6b7280;
    line-height:1.9;
    font-size:15px;
}

/* FORM */

.qty-label{
    font-size:14px;
    font-weight:700;
    color:#111827;
    margin-bottom:12px;
}

.quantity-wrapper{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:25px;
}

.qty-input{
    width:120px;
    height:56px;
    border:none;
    background:#f4f7fb;
    border-radius:18px;
    text-align:center;
    font-size:18px;
    font-weight:700;
    transition:.3s;
}

.qty-input:focus{
    outline:none;
    background:#fff;
    box-shadow:
        0 0 0 4px rgba(99,102,241,.12);
}

/* BUTTON */

.add-cart-btn{
    width:100%;
    height:62px;
    border:none;
    border-radius:22px;
    background:#111827;
    color:#fff;
    font-size:16px;
    font-weight:700;
    transition:.35s;
    position:relative;
    overflow:hidden;
}

.add-cart-btn:hover{
    transform:translateY(-4px);
    box-shadow:
        0 18px 40px rgba(17,24,39,.20);
}

.add-cart-btn::before{
    content:'';
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.2),
        transparent
    );
    transition:.6s;
}

.add-cart-btn:hover::before{
    left:100%;
}

/* EXTRA INFO */

.product-extra{
    display:flex;
    gap:16px;
    margin-top:28px;
    flex-wrap:wrap;
}

.extra-item{
    flex:1;
    min-width:150px;
    background:#fff;
    border:1px solid #eef2f7;
    border-radius:20px;
    padding:18px;
    text-align:center;
    transition:.3s;
}

.extra-item:hover{
    transform:translateY(-4px);
    box-shadow:
        0 12px 30px rgba(15,23,42,.08);
}

.extra-item i{
    font-size:22px;
    color:#111827;
    margin-bottom:10px;
}

.extra-item h6{
    margin:0;
    font-size:14px;
    font-weight:700;
    color:#111827;
}

.extra-item p{
    margin:4px 0 0;
    font-size:13px;
    color:#6b7280;
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

@media(max-width:992px){

    .product-main-image{
        height:380px;
    }

    .product-title{
        font-size:32px;
    }

    .product-price{
        font-size:34px;
    }

}

@media(max-width:576px){

    .product-info-card{
        padding:24px;
    }

    .product-title{
        font-size:28px;
    }

    .product-price{
        font-size:28px;
    }

    .product-main-image{
        height:300px;
    }

}

</style>

<div class="container product-detail-wrapper fade-up">

    <div class="row g-4 align-items-start">

        {{-- IMAGE --}}
        <div class="col-lg-6">

            <div class="product-image-card">

                <img
                    src="{{ asset('storage/'.$product->image) }}"
                    class="product-main-image"
                    alt="{{ $product->name }}"
                >

            </div>

        </div>

        {{-- INFO --}}
        <div class="col-lg-6">

            <div class="product-info-card">

                {{-- CATEGORY --}}
                <div class="category-badge">
                    <i class="bi bi-grid"></i>
                    {{ $product->category->name ?? 'Umum' }}
                </div>

                {{-- TITLE --}}
                <h1 class="product-title">
                    {{ $product->name }}
                </h1>

                {{-- PRICE --}}
                <div class="product-price">
                    Rp {{ number_format($product->price,0,',','.') }}
                </div>

                {{-- STOCK --}}
                <div class="stock-box">

                    <div class="stock-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="stock-text">
                        Stok tersedia :
                        <br>
                        <strong>{{ $product->stock }} Produk</strong>
                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <div class="description-box">

                    <div class="description-title">
                        Deskripsi Produk
                    </div>

                    <div class="description-content">
                        {{ $product->description }}
                    </div>

                </div>

                {{-- FORM --}}
                <form action="{{ route('cart.add', $product) }}" method="POST">

                    @csrf

                    <div class="qty-label">
                        Jumlah Pembelian
                    </div>

                    <div class="quantity-wrapper">

                        <input
                            type="number"
                            name="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            class="form-control qty-input"
                        >

                    </div>

                    <button class="add-cart-btn" type="submit">

                        <i class="bi bi-bag-plus-fill me-2"></i>

                        Tambah ke Keranjang

                    </button>

                </form>

                {{-- EXTRA --}}
                <div class="product-extra">

                    <div class="extra-item">
                        <i class="bi bi-truck"></i>
                        <h6>Pengiriman Cepat</h6>
                        <p>Estimasi 1-2 Hari</p>
                    </div>

                    <div class="extra-item">
                        <i class="bi bi-shield-check"></i>
                        <h6>Produk Aman</h6>
                        <p>Kualitas Terjamin</p>
                    </div>

                    <div class="extra-item">
                        <i class="bi bi-patch-check"></i>
                        <h6>Trusted Seller</h6>
                        <p>Penjual Terverifikasi</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection