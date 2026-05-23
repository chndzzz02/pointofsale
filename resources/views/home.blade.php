@extends('layouts.app')
@section('title', 'UMKM Store - Pusat Produk Lokal')
@section('content')

<style>
    /* ========== MONOCHROME SOFT THEME ========== */
    :root {
        --primary: #3a3a3a;
        --primary-light: #6c6c6c;
        --bg-light: #f8f8f8;
        --text-dark: #2c2c2c;
        --text-muted: #6b6b6b;
        --border: #e0e0e0;
        --white: #ffffff;
        --black: #1a1a1a;
    }

    /* Hero Section dengan Background Image (UMKM / produk lokal) */
    .hero-premium {
        position: relative;
        background: linear-gradient(135deg, #1a1a1a 0%, #2c2c2c 100%);
        background-image: url('https://images.unsplash.com/photo-1556742393-d75f468bfcb0?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center 40%;
        background-blend-mode: overlay;
        border-radius: 0 0 50px 50px;
        overflow: hidden;
        margin-bottom: 4rem;
        padding: 80px 0;
    }
    .hero-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.55);
        pointer-events: none;
        z-index: 1;
    }
    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        color: white;
    }
    .hero-badge {
        display: inline-block;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(6px);
        padding: 6px 18px;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 1px;
        margin-bottom: 20px;
        border: 1px solid rgba(255,255,255,0.2);
        animation: fadeInUp 0.7s ease;
    }
    .hero-title {
        font-size: 3.8rem;
        font-weight: 700;
        margin-bottom: 12px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        animation: fadeInUp 0.7s ease 0.1s both;
    }
    .hero-title span {
        font-weight: 800;
        color: #f0f0f0;
    }
    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.9;
        animation: fadeInUp 0.7s ease 0.2s both;
    }
    .hero-buttons {
        display: flex;
        gap: 18px;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.7s ease 0.3s both;
    }
    .btn-primary-premium {
        background: #3a3a3a;
        border: none;
        padding: 11px 28px;
        border-radius: 40px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }
    .btn-primary-premium:hover {
        background: #1a1a1a;
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        color: white;
    }
    .btn-outline-premium-light {
        background: transparent;
        border: 1.5px solid white;
        padding: 11px 28px;
        border-radius: 40px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }
    .btn-outline-premium-light:hover {
        background: white;
        color: #2c2c2c;
        transform: translateY(-3px);
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(35px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Kategori Populer */
    .category-populer {
        margin-bottom: 3rem;
    }
    .section-title {
        font-size: 1.9rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 0.8rem;
        color: #2c2c2c;
    }
    .section-subtitle {
        text-align: center;
        color: #6b6b6b;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }
    .category-card-populer {
        background: var(--white);
        border-radius: 28px;
        padding: 22px 12px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 14px rgba(0,0,0,0.03);
        cursor: pointer;
        border: 1px solid #ebebeb;
    }
    .category-card-populer:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 30px rgba(0,0,0,0.08);
        border-color: #c0c0c0;
    }
    .category-icon {
        font-size: 2.6rem;
        margin-bottom: 12px;
        display: inline-block;
        transition: 0.2s;
        color: #4a4a4a;
    }
    .category-card-populer:hover .category-icon {
        transform: scale(1.05);
        color: #1a1a1a;
    }
    .category-card-populer h6 {
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 4px;
        color: #2c2c2c;
    }
    .category-count {
        font-size: 0.75rem;
        color: #8a8a8a;
    }

    /* Product Card */
    .product-card-premium {
        background: white;
        border-radius: 22px;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        border: 1px solid #ececec;
    }
    .product-card-premium:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 28px rgba(0,0,0,0.08);
        border-color: #d0d0d0;
    }
    .product-img {
        height: 210px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .product-card-premium:hover .product-img {
        transform: scale(1.03);
    }
    .product-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #4a4a4a;
        color: white;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        z-index: 2;
    }
    .product-info {
        padding: 1rem;
    }
    .product-title-premium {
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #2c2c2c;
    }
    .product-price-premium {
        color: #3a3a3a;
        font-weight: 700;
        font-size: 1.1rem;
    }
    .btn-add-premium {
        background: #3a3a3a;
        border: none;
        border-radius: 36px;
        padding: 7px 10px;
        font-weight: 500;
        width: 100%;
        transition: 0.25s;
        color: white;
        font-size: 0.85rem;
    }
    .btn-add-premium:hover {
        background: #1e1e1e;
        transform: scale(0.98);
    }

    /* Stats Section */
    .stats-section {
        background: #f5f5f5;
        border-radius: 45px;
        padding: 50px 0;
        margin: 50px 0;
        text-align: center;
    }
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c2c2c;
        margin-bottom: 5px;
    }
    .stat-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: #5a5a5a;
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.95rem; }
        .hero-premium { padding: 45px 0; }
        .category-icon { font-size: 2rem; }
        .product-img { height: 150px; }
    }
</style>

<!-- Hero Section -->
<div class="hero-premium">
    <div class="container hero-content">
        <div class="hero-badge">
            <i class="fas fa-store me-1"></i> UMKM INDONESIA
        </div>
        <h1 class="hero-title">UMKM <span>Store</span></h1>
        <p class="hero-subtitle">Belanja Produk Lokal Dengan Experience Premium</p>
        <div class="hero-buttons">
            <a href="{{ route('products.index') }}" class="btn btn-primary-premium">
                Mulai Belanja <i class="fas fa-arrow-right ms-1"></i>
            </a>
            <a href="{{ route('products.index') }}?sort=terlaris" class="btn btn-outline-premium-light">
                Explore Product <i class="fas fa-search ms-1"></i>
            </a>
        </div>
    </div>
</div>

<!-- Kategori Populer (tanpa onclick inline) -->
<div class="container category-populer">
    <div class="section-title">Kategori Populer</div>
    <div class="section-subtitle">Temukan produk favoritmu dari berbagai kategori</div>
    <div class="row g-4 justify-content-center">
        <div class="col-md-2 col-6">
            <div class="category-card-populer" data-url="{{ route('products.index', ['category' => 'Makanan']) }}">
                <div class="category-icon"><i class="fas fa-utensils"></i></div>
                <h6>Makanan</h6>
                <div class="category-count">120+ produk</div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="category-card-populer" data-url="{{ route('products.index', ['category' => 'Minuman']) }}">
                <div class="category-icon"><i class="fas fa-mug-hot"></i></div>
                <h6>Minuman</h6>
                <div class="category-count">85+ produk</div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="category-card-populer" data-url="{{ route('products.index', ['category' => 'Kerajinan']) }}">
                <div class="category-icon"><i class="fas fa-palette"></i></div>
                <h6>Kerajinan</h6>
                <div class="category-count">64+ produk</div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="category-card-populer" data-url="{{ route('products.index', ['category' => 'Pakaian']) }}">
                <div class="category-icon"><i class="fas fa-tshirt"></i></div>
                <h6>Pakaian</h6>
                <div class="category-count">200+ produk</div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="category-card-populer" data-url="{{ route('products.index', ['category' => 'Elektronik']) }}">
                <div class="category-icon"><i class="fas fa-microchip"></i></div>
                <h6>Elektronik</h6>
                <div class="category-count">45+ produk</div>
            </div>
        </div>
    </div>
</div>

<!-- Produk Terbaru -->
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h3 class="fw-bold"><i class="fas fa-clock me-2"></i>Produk Terbaru</h3>
            <p class="text-muted">Koleksi produk terbaru dari UMKM Tulungagung</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
    </div>
    <div class="row g-4">
        @forelse($latestProducts as $product)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card-premium">
                <div class="product-badge"><i class="fas fa-star me-1"></i> Baru</div>
                <a href="{{ route('products.show', $product) }}">
                    <img src="{{ asset('storage/'.$product->image) }}" class="product-img w-100" alt="{{ $product->name }}">
                </a>
                <div class="product-info">
                    <div class="product-title-premium">{{ Str::limit($product->name, 25) }}</div>
                    <div class="product-price-premium">Rp {{ number_format($product->price,0,',','.') }}</div>
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-add-premium mt-2">
                            <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-box-open fs-1 text-muted"></i>
            <p class="mt-2">Belum ada produk. Silakan tambahkan produk dari dashboard seller.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Statistik UMKM -->
<div class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="stat-number">100+</div>
                <div class="stat-label"><i class="fas fa-tag me-1"></i> Produk Lokal</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-number">50+</div>
                <div class="stat-label"><i class="fas fa-store me-1"></i> UMKM Bergabung</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-number">1.000+</div>
                <div class="stat-label"><i class="fas fa-smile me-1"></i> Pelanggan Puas</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener untuk kategori cards (menghindari error onclick)
    document.addEventListener('DOMContentLoaded', function() {
        var cards = document.querySelectorAll('.category-card-populer');
        cards.forEach(function(card) {
            card.addEventListener('click', function() {
                var url = this.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>

@endsection