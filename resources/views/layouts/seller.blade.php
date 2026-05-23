<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Seller Panel - @yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

:root{
    --primary:#10b981;
    --primary-soft:#d1fae5;

    --sidebar:#ffffff;
    --sidebar-border:#edf2f7;

    --bg:#f7f9fc;
    --card:#ffffff;

    --text:#0f172a;
    --muted:#64748b;

    --shadow:
        0 10px 40px rgba(15,23,42,.05);
}


*{
    font-family:'Inter',sans-serif;
}

body{
    margin:0;
    padding:0;

    background:var(--bg);

    color:var(--text);

    overflow-x:hidden;

    transition:
        background .3s ease,
        color .3s ease;
}

/* SIDEBAR */

.seller-sidebar{
    width:280px;
    height:100vh;

    position:fixed;
    left:0;
    top:0;

    background:var(--sidebar);

    border-right:
        1px solid var(--sidebar-border);

    padding:26px 18px;

    z-index:999;

    transition:.3s ease;
}

/* BRAND */

.sidebar-brand{
    display:flex;
    align-items:center;
    gap:14px;

    margin-bottom:50px;
}

.brand-icon{
    width:58px;
    height:58px;

    border-radius:20px;

    background:
        linear-gradient(
            135deg,
            #10b981,
            #14b8a6
        );

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;
    font-size:24px;

    box-shadow:
        0 10px 25px rgba(16,185,129,.25);
}

.brand-title{
    font-size:24px;
    font-weight:800;

    letter-spacing:-1px;

    color:var(--text);
}

.brand-subtitle{
    font-size:12px;

    color:var(--muted);
}

/* NAVIGATION */

.sidebar-nav{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.sidebar-nav .nav-link{
    height:58px;

    border-radius:18px;

    display:flex;
    align-items:center;
    gap:14px;

    padding:0 18px;

    color:var(--muted) !important;

    font-weight:600;

    transition:.3s ease;
}

.sidebar-nav .nav-link i{
    font-size:20px;
}

.sidebar-nav .nav-link:hover{

    background:#f1f5f9;

    color:var(--text) !important;

    transform:translateX(5px);
}


.sidebar-nav .nav-link.active{

    background:
        linear-gradient(
            135deg,
            #10b981,
            #14b8a6
        );

    color:white !important;

    box-shadow:
        0 10px 25px rgba(16,185,129,.2);
}

/* MAIN */

.main-content-seller{
    margin-left:280px;

    padding:30px;

    min-height:100vh;

    transition:.3s ease;
}

/* GLASS CARD */

.glass-card{
    background:var(--card);

    border-radius:30px;

    padding:28px;

    box-shadow:var(--shadow);

    border:
        1px solid rgba(255,255,255,.5);

    transition:.3s ease;
}

.glass-card:hover{
    transform:translateY(-5px);
}

/* ALERT */

.custom-alert{
    border:none;

    border-radius:20px;

    padding:16px 20px;

    box-shadow:var(--shadow);
}

/* FLOAT BUTTON */

.floating-action{
    position:fixed;

    right:25px;
    bottom:25px;

    z-index:999;
}

/* SCROLLBAR */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:20px;
}

/* ANIMATION */

.motion-fade{
    animation:motionFade .7s ease;
}

@keyframes motionFade{

    from{
        opacity:0;
        transform:
            translateY(20px);
    }

    to{
        opacity:1;
        transform:
            translateY(0);
    }
}

/* MOBILE */

@media(max-width:992px){

    .seller-sidebar{
        width:100%;
        height:auto;

        position:relative;

        border-right:none;
        border-bottom:
            1px solid var(--sidebar-border);
    }

    .main-content-seller{
        margin-left:0;
        padding:20px;
    }

}

</style>

@stack('styles')

</head>

<body>

{{-- SIDEBAR --}}
<div class="seller-sidebar motion-fade">

    {{-- BRAND --}}
    <div class="sidebar-brand">

        <div class="brand-icon">
            <i class="bi bi-shop"></i>
        </div>

        <div>

            <div class="brand-title">
                UMKM
            </div>

            <div class="brand-subtitle">
                Seller Dashboard
            </div>

        </div>

    </div>

    {{-- NAVIGATION --}}
    <div class="sidebar-nav">

        <a class="nav-link {{ request()->routeIs('seller.dashboard') ? 'active' : '' }}"
           href="{{ route('seller.dashboard') }}">

            <i class="bi bi-grid"></i>

            Dashboard

        </a>

        <a class="nav-link {{ request()->routeIs('seller.products.*') ? 'active' : '' }}"
           href="{{ route('seller.products.index') }}">

            <i class="bi bi-box-seam"></i>

            Produk

        </a>

        <a class="nav-link {{ request()->routeIs('seller.orders.*') ? 'active' : '' }}"
           href="{{ route('seller.orders.index') }}">

            <i class="bi bi-cart-check"></i>

            Pesanan

        </a>

    </div>

    {{-- LOGOUT --}}
    <div class="position-absolute bottom-0 start-0 w-100 p-3">

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="btn btn-light w-100 rounded-4 py-3 fw-semibold">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>

{{-- MAIN --}}
<div class="main-content-seller motion-fade">

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success custom-alert alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger custom-alert alert-dismissible fade show">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    {{-- CONTENT --}}
    @yield('content')

</div>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>