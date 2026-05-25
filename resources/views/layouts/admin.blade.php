<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Admin Panel - @yield('title')
    </title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

:root{

    --primary:#2563eb;
    --primary-soft:#eff6ff;

    --bg:#f5f7fb;
    --white:#ffffff;

    --text:#0f172a;
    --text-light:#64748b;

    --border:#e2e8f0;

    --shadow:
        0 10px 30px rgba(15,23,42,.05);

    --shadow-hover:
        0 16px 40px rgba(15,23,42,.08);
}

/* =========================
    GLOBAL
========================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

body{

    background:
        linear-gradient(
            180deg,
            #f8fafc 0%,
            #eef2f7 100%
        );

    color:var(--text);

    overflow-x:hidden;
}

/* =========================
    SIDEBAR
========================= */

.sidebar{

    width:285px;

    min-height:100vh;

    position:fixed;

    top:0;
    left:0;

    background:rgba(255,255,255,.95);

    backdrop-filter:blur(18px);

    border-right:1px solid rgba(226,232,240,.8);

    padding:24px 18px;

    z-index:1000;

    display:flex;
    flex-direction:column;

    transition:.35s ease;
}

/* =========================
    LOGO
========================= */

.logo-box{

    display:flex;
    align-items:center;
    gap:16px;

    margin-bottom:42px;

    padding:0 8px;
}

.logo-icon{

    width:62px;
    height:62px;

    border-radius:20px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #3b82f6
        );

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;

    font-size:26px;

    box-shadow:
        0 12px 30px rgba(37,99,235,.22);
}

.logo-text h3{

    margin:0;

    font-size:20px;

    font-weight:800;

    color:#0f172a;
}

.logo-text p{

    margin:4px 0 0;

    font-size:13px;

    color:#64748b;
}

/* =========================
    MENU
========================= */

.sidebar-menu{

    display:flex;

    flex-direction:column;

    gap:10px;

    flex:1;
}

.sidebar-link{

    height:58px;

    border-radius:18px;

    display:flex;

    align-items:center;

    gap:15px;

    padding:0 18px;

    text-decoration:none;

    color:#64748b;

    font-size:15px;

    font-weight:600;

    transition:.28s ease;

    position:relative;
}

.sidebar-link i{

    font-size:20px;

    transition:.25s;
}

.sidebar-link:hover{

    background:#f8fafc;

    color:#0f172a;

    transform:translateX(3px);
}

.sidebar-link.active{

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #3b82f6
        );

    color:white;

    box-shadow:
        0 12px 28px rgba(37,99,235,.20);
}

.sidebar-link.active i{

    transform:scale(1.08);
}

/* =========================
    LOGOUT
========================= */

.logout-wrapper{

    margin-top:auto;

    padding-top:20px;
}

.logout-btn{

    width:100%;

    height:58px;

    border:none;

    border-radius:18px;

    background:#f8fafc;

    color:#0f172a;

    font-weight:700;

    transition:.28s ease;
}

.logout-btn:hover{

    background:#ef4444;

    color:white;

    transform:translateY(-2px);

    box-shadow:
        0 12px 24px rgba(239,68,68,.18);
}

/* =========================
    MAIN CONTENT
========================= */

.main-content{

    margin-left:285px;

    min-height:100vh;

    padding:30px;
}

/* =========================
    TOPBAR
========================= */

.topbar{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

    gap:20px;

    flex-wrap:wrap;
}

.topbar-left h1{

    font-size:38px;

    font-weight:800;

    letter-spacing:-1px;

    margin-bottom:6px;

    color:#0f172a;
}

.topbar-left p{

    margin:0;

    font-size:15px;

    color:#64748b;
}

.topbar-right{

    display:flex;

    align-items:center;

    gap:16px;
}

/* =========================
    MOBILE BUTTON
========================= */

.mobile-toggle{

    width:50px;
    height:50px;

    border:none;

    border-radius:16px;

    background:white;

    box-shadow:var(--shadow);

    display:none;

    align-items:center;
    justify-content:center;

    transition:.25s ease;
}

.mobile-toggle:hover{

    transform:translateY(-2px);
}

/* =========================
    USER PROFILE
========================= */

.user-profile{

    background:white;

    border:1px solid #edf2f7;

    border-radius:22px;

    padding:10px 18px;

    display:flex;

    align-items:center;

    gap:14px;

    box-shadow:var(--shadow);

    transition:.28s ease;
}

.user-profile:hover{

    transform:translateY(-2px);

    box-shadow:var(--shadow-hover);
}

.user-avatar{

    width:48px;
    height:48px;

    border-radius:16px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #3b82f6
        );

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    font-size:18px;

    box-shadow:
        0 10px 20px rgba(37,99,235,.18);
}

.user-info h6{

    margin:0;

    font-size:14px;

    font-weight:700;

    color:#0f172a;
}

.user-info p{

    margin:2px 0 0;

    font-size:12px;

    color:#64748b;
}

/* =========================
    CONTENT WRAPPER
========================= */

.content-wrapper{

    background:rgba(255,255,255,.72);

    backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,.7);

    border-radius:32px;

    padding:28px;

    box-shadow:
        0 12px 40px rgba(15,23,42,.05);
}

/* =========================
    ALERT
========================= */

.alert{

    border:none;

    border-radius:18px;

    padding:16px 20px;

    font-weight:600;

    box-shadow:var(--shadow);
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
    SCROLLBAR
========================= */

::-webkit-scrollbar{

    width:7px;
}

::-webkit-scrollbar-thumb{

    background:#cbd5e1;

    border-radius:999px;
}

/* =========================
    ANIMATION
========================= */

.fade-up{

    animation:fadeUp .45s ease;
}

@keyframes fadeUp{

    from{

        opacity:0;

        transform:translateY(18px);
    }

    to{

        opacity:1;

        transform:translateY(0);
    }
}

/* =========================
    MOBILE
========================= */

@media(max-width:992px){

    .sidebar{

        transform:translateX(-100%);
    }

    .sidebar.show{

        transform:translateX(0);
    }

    .main-content{

        margin-left:0;

        padding:20px;
    }

    .mobile-toggle{

        display:flex;
    }

    .topbar-left h1{

        font-size:30px;
    }

    .content-wrapper{

        padding:22px;
    }

}

</style>

@stack('styles')

</head>

<body>

{{-- SIDEBAR --}}
<div class="sidebar"
     id="sidebar">

    {{-- LOGO --}}
    <div class="logo-box">

        <div class="logo-icon">

            <i class="bi bi-shop"></i>

        </div>

        <div class="logo-text">

            <h3>
                UMKM Panel
            </h3>

            <p>
                Modern Admin Dashboard
            </p>

        </div>

    </div>

    {{-- MENU --}}
    <div class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>

        <a href="{{ route('admin.users.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

            <i class="bi bi-people-fill"></i>

            Users

        </a>

        <a href="{{ route('admin.products.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

            <i class="bi bi-box-seam-fill"></i>

            Produk

        </a>

        <a href="{{ route('admin.transactions.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">

            <i class="bi bi-receipt-cutoff"></i>

            Transaksi

        </a>

        <a href="{{ route('admin.report.pdf') }}"
           target="_blank"
           class="sidebar-link">

            <i class="bi bi-file-earmark-pdf-fill"></i>

            Laporan PDF

        </a>

    </div>

    {{-- LOGOUT --}}
    <div class="logout-wrapper">

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>

{{-- MAIN CONTENT --}}
<div class="main-content fade-up">

    {{-- TOPBAR --}}
    <div class="topbar">

        <div class="topbar-left">

            <h1>
                @yield('title')
            </h1>

            <p>
                Monitor aktivitas sistem UMKM secara realtime
            </p>

        </div>

        <div class="topbar-right">

            {{-- MOBILE MENU --}}
            <button class="mobile-toggle"
                    id="menuToggle">

                <i class="bi bi-list fs-4"></i>

            </button>

            {{-- USER --}}
            <div class="user-profile">

                <div class="user-avatar">

                    <i class="bi bi-person-fill"></i>

                </div>

                <div class="user-info">

                    <h6>
                        {{ Auth::user()->name }}
                    </h6>

                    <p>
                        Administrator
                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show mb-4">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show mb-4">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    {{-- CONTENT --}}
    <div class="content-wrapper">

        @yield('content')

    </div>

</div>

{{-- BOOTSTRAP --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.getElementById('menuToggle')?.addEventListener('click', function(){

    document.getElementById('sidebar').classList.toggle('show');

});

</script>

@stack('scripts')

</body>

</html>