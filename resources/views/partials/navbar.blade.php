<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-store me-2"></i> UMKM Tulungagung
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">PRODUK</a></li>
                <li class="nav-item"><a class="nav-link" href="#">PROMO</a></li>
                <li class="nav-item"><a class="nav-link" href="#">BRANDS</a></li>
            </ul>
            <form class="d-flex search-form me-3" action="{{ route('products.index') }}" method="GET">
                <input class="form-control search-input" type="search" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
                <button class="btn search-btn" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav">
                @auth
                    @if(auth()->user()->role == 'seller')
                        <li class="nav-item"><a class="nav-link" href="{{ route('seller.dashboard') }}"><i class="bi bi-graph-up"></i> Seller</a></li>
                    @elseif(auth()->user()->role == 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield-lock"></i> Admin</a></li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link nav-icon position-relative" href="{{ route('cart.index') }}">
                            <i class="bi bi-bag"></i>
                            @php $cartCount = is_array(session('cart')) ? count(session('cart')) : 0; @endphp
                            @if($cartCount > 0)
                                <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('orders.index') }}"><i class="bi bi-receipt"></i> Pesanan Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="btn btn-outline-premium me-2" href="{{ route('login') }}">Masuk</a></li>
                    <li class="nav-item"><a class="btn btn-premium" href="{{ route('register') }}">Daftar</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Navbar White dengan efek Glassmorphism saat scroll */
    .navbar {
        background: #ffffff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        border-bottom: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    /* Efek Glassmorphism saat discroll */
    .navbar.scrolled {
        background: rgba(255, 255, 255, 0.85) !important;
        backdrop-filter: blur(12px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }
    
    .navbar-brand {
        font-weight: 800;
        font-size: 1.4rem;
        background: linear-gradient(135deg, #2c2c2c, #6c6c6c);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .nav-link {
        font-weight: 500;
        color: #333333 !important;
        transition: 0.2s;
    }
    
    .nav-link:hover {
        color: #000000 !important;
    }
    
    .btn-outline-premium {
        border: 1.5px solid #2c2c2c;
        background: transparent;
        color: #2c2c2c;
        border-radius: 40px;
        padding: 0.4rem 1.2rem;
        font-weight: 600;
        transition: 0.2s;
    }
    
    .btn-outline-premium:hover {
        background: #2c2c2c;
        color: white;
        border-color: #2c2c2c;
    }
    
    .btn-premium {
        background: #2c2c2c;
        border: none;
        color: white;
        border-radius: 40px;
        padding: 0.4rem 1.2rem;
        font-weight: 600;
        transition: 0.2s;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    
    .btn-premium:hover {
        background: #111111;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        color: white;
    }
    
    .search-input {
        border-radius: 40px 0 0 40px;
        border: 1px solid #ddd;
        border-right: none;
        background: #fafafa;
        color: #333;
    }
    
    .search-input:focus {
        background: white;
        border-color: #aaa;
        box-shadow: none;
    }
    
    .search-btn {
        border-radius: 0 40px 40px 0;
        background: #2c2c2c;
        border: none;
        color: white;
    }
    
    .search-btn:hover {
        background: #111;
    }
    
    /* Dropdown menu white theme */
    .dropdown-menu {
        border-radius: 16px;
        border: none;
        background: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-top: 8px;
    }
    
    .dropdown-item {
        color: #333;
    }
    
    .dropdown-item:hover {
        background: #f5f5f5;
        color: #000;
    }
    
    .dropdown-divider {
        border-top-color: #eee;
    }
    
    /* Cart badge */
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -12px;
        background: #2c2c2c;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 0.7rem;
        font-weight: bold;
    }
    
    /* Navbar toggler icon untuk mobile */
    .navbar-toggler {
        border: none;
    }
    
    .navbar-toggler:focus {
        box-shadow: none;
    }
</style>

<script>
    // Navbar scroll effect - menambah class scrolled saat scroll > 50px
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>