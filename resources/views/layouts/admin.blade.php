<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

*{
    font-family:'Inter',sans-serif;
}

body{
    background:
        radial-gradient(circle at top left,#f5f7fa 0%,#eef2f7 45%,#f8fafc 100%);
    margin:0;
    padding:0;
    color:#111827;
    overflow-x:hidden;
}

/* =========================
   SIDEBAR
========================= */

.premium-sidebar{
    width:290px;
    min-height:100vh;
    position:fixed;
    left:0;
    top:0;
    z-index:1000;
    overflow:hidden;

    background:
        linear-gradient(
            180deg,
            #0f172a 0%,
            #111827 35%,
            #1e293b 100%
        );

    border-right:1px solid rgba(255,255,255,.06);

    box-shadow:
        20px 0 60px rgba(15,23,42,.18);

    transition:.4s;
}

.premium-sidebar::before{
    content:'';
    position:absolute;
    width:260px;
    height:260px;
    border-radius:50%;
    background:rgba(255,255,255,.05);
    top:-100px;
    right:-100px;
}

.premium-sidebar::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.03);
    bottom:-70px;
    left:-70px;
}

/* =========================
   SIDEBAR HEADER
========================= */

.sidebar-header{
    position:relative;
    z-index:2;

    padding:32px 28px 24px;

    border-bottom:
        1px solid rgba(255,255,255,.06);
}

.sidebar-header h4{
    color:white;
    font-weight:800;
    font-size:28px;
    letter-spacing:-1px;
    margin-bottom:8px;
}

.sidebar-header p{
    color:rgba(255,255,255,.6);
    font-size:13px;
    margin:0;
    line-height:1.6;
}

/* =========================
   NAVIGATION
========================= */

.premium-sidebar .nav{
    padding:20px 16px;
    position:relative;
    z-index:2;
}

.premium-sidebar .nav-link{
    position:relative;

    display:flex;
    align-items:center;
    gap:14px;

    padding:16px 18px;
    margin-bottom:10px;

    border-radius:18px;

    color:rgba(255,255,255,.72) !important;

    font-size:15px;
    font-weight:600;

    transition:.35s;
}

.premium-sidebar .nav-link i{
    width:22px;
    font-size:18px;
    transition:.35s;
}

.premium-sidebar .nav-link:hover{

    background:
        rgba(255,255,255,.08);

    color:white !important;

    transform:translateX(6px);
}

.premium-sidebar .nav-link:hover i{
    transform:scale(1.1);
}

.premium-sidebar .nav-link.active{

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.16),
            rgba(255,255,255,.08)
        );

    color:white !important;

    box-shadow:
        inset 0 0 0 1px rgba(255,255,255,.08),
        0 10px 25px rgba(0,0,0,.12);
}

.premium-sidebar .nav-link.active::before{
    content:'';
    position:absolute;
    left:0;
    top:50%;
    transform:translateY(-50%);
    width:4px;
    height:60%;
    border-radius:20px;
    background:white;
}

/* =========================
   LOGOUT
========================= */

.sidebar-footer{
    position:absolute;
    bottom:0;
    width:100%;
    padding:24px;
    z-index:2;
}

.logout-btn{
    width:100%;
    height:54px;

    border:none;

    border-radius:18px;

    background:
        rgba(255,255,255,.08);

    color:white;

    font-weight:700;

    transition:.35s;

    backdrop-filter:blur(10px);
}

.logout-btn:hover{

    background:white;

    color:#111827;

    transform:translateY(-3px);

    box-shadow:
        0 15px 35px rgba(0,0,0,.2);
}

/* =========================
   MAIN CONTENT
========================= */

.main-content{

    margin-left:290px;

    padding:28px;

    min-height:100vh;

    transition:.4s;
}

/* =========================
   TOPBAR
========================= */

.topbar-modern{

    background:
        rgba(255,255,255,.7);

    backdrop-filter:blur(14px);

    border:
        1px solid rgba(255,255,255,.4);

    border-radius:24px;

    padding:16px 22px;

    margin-bottom:28px;

    box-shadow:
        0 10px 35px rgba(15,23,42,.05);
}

.menu-btn{

    width:48px;
    height:48px;

    border:none;

    border-radius:16px;

    background:white;

    transition:.3s;
}

.menu-btn:hover{
    transform:translateY(-2px);
}

.user-badge{

    height:48px;

    padding:0 18px;

    border-radius:18px;

    background:white;

    display:flex;
    align-items:center;
    gap:10px;

    font-weight:600;

    color:#111827;

    box-shadow:
        0 5px 18px rgba(15,23,42,.05);
}

/* =========================
   ALERT
========================= */

.alert{
    border:none;
    border-radius:22px;
    padding:18px 22px;
    font-weight:500;
    box-shadow:
        0 10px 25px rgba(15,23,42,.04);
}

.alert-success{
    background:#ecfdf5;
    color:#047857;
}

.alert-danger{
    background:#fef2f2;
    color:#b91c1c;
}

/* =========================
   CARD MODERN
========================= */

.stat-card-premium,
.glass-card-premium{

    background:
        rgba(255,255,255,.78);

    backdrop-filter:blur(16px);

    border:
        1px solid rgba(255,255,255,.5);

    border-radius:30px;

    box-shadow:
        0 15px 45px rgba(15,23,42,.05);

    transition:.35s;
}

.stat-card-premium:hover,
.glass-card-premium:hover{

    transform:translateY(-6px);

    box-shadow:
        0 25px 50px rgba(15,23,42,.08);
}

/* =========================
   BADGE
========================= */

.badge-status{
    padding:10px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

/* =========================
   SCROLLBAR
========================= */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:20px;
}

/* =========================
   MOBILE
========================= */

@media(max-width:992px){

    .premium-sidebar{
        transform:translateX(-100%);
    }

    .premium-sidebar.mobile-open{
        transform:translateX(0);
    }

    .main-content{
        margin-left:0;
        padding:18px;
    }

    .sidebar-header h4{
        font-size:24px;
    }

}

</style>

@stack('styles')

</head>

<body>

    <!-- SIDEBAR -->
    <div class="premium-sidebar" id="sidebar">

        <div class="sidebar-header">

            <h4>
                🛍️ UMKM Admin
            </h4>

            <p>
                Panel kontrol modern UMKM Tulungagung
            </p>

        </div>

        <div class="nav flex-column">

            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">

                <i class="bi bi-speedometer2"></i>

                Dashboard

            </a>

            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
               href="{{ route('admin.users.index') }}">

                <i class="bi bi-people"></i>

                Users

            </a>

            <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
               href="{{ route('admin.products.index') }}">

                <i class="bi bi-box-seam"></i>

                Produk

            </a>

            <a class="nav-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}"
               href="{{ route('admin.transactions.index') }}">

                <i class="bi bi-credit-card"></i>

                Transaksi

            </a>

            <a class="nav-link"
               href="{{ route('admin.report.pdf') }}"
               target="_blank">

                <i class="bi bi-file-earmark-pdf"></i>

                Laporan PDF

            </a>

        </div>

        <!-- FOOTER -->
        <div class="sidebar-footer">

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button class="logout-btn"
                        type="submit">

                    <i class="bi bi-box-arrow-right me-2"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

    <!-- MAIN -->
    <div class="main-content">

        <!-- TOPBAR -->
        <nav class="navbar topbar-modern justify-content-between">

            <button class="menu-btn d-lg-none"
                    id="menuToggle">

                <i class="bi bi-list fs-5"></i>

            </button>

            <div class="d-flex align-items-center ms-auto">

                <span class="user-badge">

                    <i class="bi bi-person-circle fs-5"></i>

                    {{ Auth::user()->name }}

                </span>

            </div>

        </nav>

        <!-- ALERT -->
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        <!-- CONTENT -->
        @yield('content')

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.getElementById('menuToggle')?.addEventListener('click', function () {

    document.getElementById('sidebar').classList.toggle('mobile-open');

});

</script>

@stack('scripts')

</body>
</html>