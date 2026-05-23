@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

<style>

.products-page{
    padding:40px 0 80px;
    background:
        linear-gradient(
            to bottom,
            #f8fafc,
            #ffffff
        );
}

/* =====================================================
   HEADER
===================================================== */

.products-header{
    margin-bottom:35px;
}

.products-title{
    font-size:42px;
    font-weight:800;
    letter-spacing:-1px;
    color:#111827;
    margin-bottom:6px;
}

.products-subtitle{
    color:#6b7280;
    font-size:15px;
}

/* =====================================================
   SIDEBAR
===================================================== */

.filter-sidebar{

    background:rgba(255,255,255,.9);

    backdrop-filter:blur(18px);

    border-radius:30px;

    padding:28px;

    border:1px solid #eef2f7;

    box-shadow:
        0 10px 40px rgba(15,23,42,.05);

    position:sticky;

    top:100px;
}

.filter-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:22px;
    color:#111827;
}

.category-link{

    display:flex;

    align-items:center;

    justify-content:space-between;

    padding:14px 16px;

    border-radius:18px;

    color:#374151;

    font-weight:600;

    transition:.3s;

    margin-bottom:10px;

    background:#f8fafc;
}

.category-link:hover{

    background:#111827;

    color:white;

    transform:translateX(4px);
}

.category-link.active{

    background:#111827;

    color:white;

    box-shadow:
        0 10px 25px rgba(17,24,39,.15);
}

/* =====================================================
   TOPBAR
===================================================== */

.products-topbar{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

    background:white;

    border-radius:24px;

    padding:18px 24px;

    border:1px solid #eef2f7;

    box-shadow:
        0 8px 30px rgba(15,23,42,.04);
}

.products-count{

    color:#6b7280;

    font-weight:500;
}

.sort-btn{

    background:#f8fafc;

    border:none;

    border-radius:16px;

    padding:12px 18px;

    font-weight:600;

    color:#111827;

    transition:.3s;
}

.sort-btn:hover{

    background:#111827;

    color:white;
}

.dropdown-menu{

    border:none;

    border-radius:20px;

    padding:12px;

    box-shadow:
        0 15px 40px rgba(0,0,0,.08);
}

.dropdown-item{

    border-radius:12px;

    padding:10px 14px;

    font-weight:500;
}

.dropdown-item:hover{

    background:#111827;

    color:white;
}

/* =====================================================
   PRODUCT CARD
===================================================== */

.product-modern-card{

    background:white;

    border-radius:30px;

    overflow:hidden;

    position:relative;

    transition:.4s;

    border:1px solid #eef2f7;

    box-shadow:
        0 10px 35px rgba(15,23,42,.04);

    height:100%;
}

.product-modern-card:hover{

    transform:
        translateY(-10px);

    box-shadow:
        0 25px 60px rgba(15,23,42,.12);
}

.product-image-wrapper{

    position:relative;

    overflow:hidden;

    background:#f8fafc;
}

.product-modern-card img{

    width:100%;

    height:250px;

    object-fit:cover;

    transition:.5s;
}

.product-modern-card:hover img{

    transform:scale(1.05);
}

.product-overlay{

    position:absolute;

    inset:0;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,.2),
            transparent
        );

    opacity:0;

    transition:.4s;
}

.product-modern-card:hover .product-overlay{

    opacity:1;
}

.product-info{

    padding:22px;
}

.product-name{

    font-size:16px;

    font-weight:700;

    color:#111827;

    margin-bottom:10px;

    overflow:hidden;

    text-overflow:ellipsis;

    white-space:nowrap;
}

.product-price{

    color:#10b981;

    font-size:22px;

    font-weight:800;

    margin-bottom:18px;
}

.btn-cart-modern{

    width:100%;

    border:none;

    background:#111827;

    color:white;

    border-radius:18px;

    padding:14px;

    font-weight:600;

    transition:.35s;
}

.btn-cart-modern:hover{

    transform:translateY(-2px);

    background:#1f2937;

    box-shadow:
        0 12px 25px rgba(17,24,39,.15);
}

/* =====================================================
   EMPTY STATE
===================================================== */

.empty-state{

    background:white;

    border-radius:32px;

    padding:70px 20px;

    text-align:center;

    border:1px solid #eef2f7;

    box-shadow:
        0 10px 40px rgba(15,23,42,.04);
}

.empty-state i{

    font-size:70px;

    color:#cbd5e1;

    margin-bottom:20px;
}

.empty-state h5{

    font-weight:700;

    color:#111827;
}

.empty-state p{

    color:#6b7280;
}

/* =====================================================
   PAGINATION
===================================================== */

.pagination{

    gap:10px;
}

.page-link{

    border:none;

    border-radius:16px !important;

    padding:12px 18px;

    color:#111827;

    font-weight:600;

    background:white;

    box-shadow:
        0 5px 15px rgba(15,23,42,.04);
}

.page-item.active .page-link{

    background:#111827;

    color:white;
}

/* =====================================================
   ANIMATION
===================================================== */

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

/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:992px){

    .filter-sidebar{
        margin-bottom:25px;
        position:relative;
        top:0;
    }

    .products-topbar{
        flex-direction:column;
        gap:15px;
        align-items:flex-start;
    }
}

@media(max-width:768px){

    .products-title{
        font-size:30px;
    }

    .product-modern-card img{
        height:190px;
    }

    .products-page{
        padding-top:20px;
    }
}

</style>

<div class="products-page">

    <div class="container">

        {{-- HEADER --}}
        <div class="products-header fade-up">

            <h1 class="products-title">
                Katalog Produk
            </h1>

            <p class="products-subtitle">
                Temukan produk UMKM terbaik dengan kualitas premium
            </p>

        </div>

        <div class="row g-4">

            {{-- SIDEBAR --}}
            <div class="col-lg-3">

                <div class="filter-sidebar fade-up">

                    <h5 class="filter-title">
                        <i class="bi bi-grid me-2"></i>
                        Kategori
                    </h5>

                    <a
                        href="{{ route('products.index') }}"
                        class="category-link {{ !request('category') ? 'active' : '' }}"
                    >
                        <span>Semua Produk</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    @foreach($categories as $cat)

                    <a
                        href="{{ route('products.index', ['category' => $cat->id, 'search' => request('search')]) }}"
                        class="category-link {{ request('category') == $cat->id ? 'active' : '' }}"
                    >
                        <span>{{ $cat->name }}</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    @endforeach

                </div>

            </div>

            {{-- PRODUCTS --}}
            <div class="col-lg-9">

                {{-- TOPBAR --}}
                <div class="products-topbar fade-up">

                    <div class="products-count">

                        Menampilkan
                        <strong>{{ $products->total() }}</strong>
                        produk tersedia

                    </div>

                    <div class="dropdown">

                        <button
                            class="sort-btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                        >
                            <i class="bi bi-funnel me-2"></i>
                            Urutkan
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item" href="?sort=latest">
                                    Terbaru
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="?sort=price_asc">
                                    Harga Termurah
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="?sort=price_desc">
                                    Harga Termahal
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>

                {{-- GRID --}}
                <div class="row g-4">

                    @forelse($products as $product)

                    <div class="col-lg-4 col-md-6 col-6 fade-up">

                        <div class="product-modern-card">

                            <a href="{{ route('products.show', $product) }}">

                                <div class="product-image-wrapper">

                                    <img
                                        src="{{ asset('storage/'.$product->image) }}"
                                        alt="{{ $product->name }}"
                                    >

                                    <div class="product-overlay"></div>

                                </div>

                            </a>

                            <div class="product-info">

                                <div class="product-name">
                                    {{ $product->name }}
                                </div>

                                <div class="product-price">
                                    Rp {{ number_format($product->price,0,',','.') }}
                                </div>

                                <form
                                    action="{{ route('cart.add', $product) }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button class="btn-cart-modern">

                                        <i class="bi bi-bag-plus me-2"></i>

                                        Tambah ke Keranjang

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="col-12">

                        <div class="empty-state">

                            <i class="bi bi-search"></i>

                            <h5>
                                Produk Tidak Ditemukan
                            </h5>

                            <p class="mb-0">
                                Coba gunakan kategori atau kata kunci lain
                            </p>

                        </div>

                    </div>

                    @endforelse

                </div>

                {{-- PAGINATION --}}
                <div class="mt-5 d-flex justify-content-center">

                    {{ $products->appends(request()->query())->links() }}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection