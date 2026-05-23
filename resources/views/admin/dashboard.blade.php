@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>

/* =========================
   MODERN MONOCHROME DASHBOARD
========================= */

.dashboard-container{
    padding-top:15px;
    padding-bottom:50px;
    background:#f8fafc;
    min-height:100vh;
}

/* HERO */

.dashboard-hero{
    position:relative;
    overflow:hidden;
    border-radius:36px;
    padding:42px;
    background:
        linear-gradient(135deg,#0f172a 0%,#111827 45%,#1e293b 100%);
    color:white;
    margin-bottom:35px;
    box-shadow:
        0 25px 70px rgba(15,23,42,.18);
}

.dashboard-hero::before{
    content:'';
    position:absolute;
    width:340px;
    height:340px;
    border-radius:50%;
    background:rgba(255,255,255,.05);
    top:-160px;
    right:-120px;
}

.dashboard-hero::after{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    border-radius:50%;
    background:rgba(255,255,255,.03);
    bottom:-80px;
    left:-70px;
}

.hero-content{
    position:relative;
    z-index:2;
}

.hero-title{
    font-size:44px;
    font-weight:800;
    margin-bottom:10px;
    letter-spacing:-1.5px;
}

.hero-subtitle{
    color:rgba(255,255,255,.72);
    font-size:15px;
    line-height:1.7;
}

.hero-date{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.06);
    backdrop-filter:blur(14px);
    padding:13px 20px;
    border-radius:18px;
    display:inline-flex;
    align-items:center;
    gap:10px;
    font-weight:600;
    font-size:14px;
}

/* STATS */

.stat-card-modern{
    position:relative;
    overflow:hidden;
    background:white;
    border-radius:30px;
    padding:30px;
    border:1px solid #eef2f7;
    height:100%;
    transition:.4s;
    box-shadow:
        0 12px 40px rgba(15,23,42,.04);
}

.stat-card-modern:hover{
    transform:translateY(-8px);
    box-shadow:
        0 28px 60px rgba(15,23,42,.08);
}

.stat-card-modern::before{
    content:'';
    position:absolute;
    width:140px;
    height:140px;
    border-radius:50%;
    background:rgba(15,23,42,.04);
    top:-60px;
    right:-50px;
}

.stat-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:24px;
}

.stat-label{
    color:#6b7280;
    font-size:14px;
    margin-bottom:8px;
    font-weight:600;
}

.stat-value{
    font-size:36px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    line-height:1;
}

.stat-icon-modern{
    width:72px;
    height:72px;
    border-radius:24px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#111827;
    color:white;
    font-size:28px;
    box-shadow:
        0 12px 25px rgba(17,24,39,.12);
}

.stat-trend{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:9px 14px;
    border-radius:999px;
    background:#f3f4f6;
    color:#374151;
    font-size:12px;
    font-weight:700;
}

/* CARDS */

.dashboard-card{
    background:white;
    border-radius:32px;
    border:1px solid #eef2f7;
    overflow:hidden;
    box-shadow:
        0 12px 40px rgba(15,23,42,.04);
    height:100%;
}

.dashboard-card-header{
    padding:30px 30px 0;
}

.dashboard-card-title{
    font-size:22px;
    font-weight:800;
    color:#111827;
    margin-bottom:5px;
}

.dashboard-card-subtitle{
    color:#6b7280;
    font-size:14px;
}

.dashboard-card-body{
    padding:30px;
}

/* CHART */

.chart-wrapper{
    position:relative;
    height:360px;
}

/* ACTIVITY */

.activity-list{
    display:flex;
    flex-direction:column;
    gap:22px;
}

.activity-item{
    display:flex;
    gap:16px;
    align-items:flex-start;
}

.activity-icon{
    width:52px;
    height:52px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#111827;
    color:white;
    font-size:18px;
    flex-shrink:0;
}

.activity-title{
    font-weight:700;
    color:#111827;
    margin-bottom:4px;
}

.activity-desc{
    color:#6b7280;
    font-size:13px;
    line-height:1.6;
}

.activity-badge{
    margin-top:8px;
    display:inline-flex;
    align-items:center;
    padding:7px 14px;
    border-radius:999px;
    background:#f3f4f6;
    color:#374151;
    font-size:11px;
    font-weight:700;
}

/* TABLE */

.table-modern{
    width:100%;
    border-collapse:separate;
    border-spacing:0 14px;
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
    transition:.35s;
}

.table-modern tbody tr:hover{
    transform:scale(1.01);
    background:white;
    box-shadow:
        0 12px 35px rgba(15,23,42,.06);
}

.table-modern td{
    padding:20px;
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

.status-pill{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:8px 15px;
    border-radius:999px;
    background:#111827;
    color:white;
    font-size:12px;
    font-weight:700;
}

/* BUTTON */

.btn-modern{
    height:46px;
    padding:0 20px;
    border:none;
    border-radius:16px;
    background:#111827;
    color:white;
    font-weight:700;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition:.35s;
}

.btn-modern:hover{
    transform:translateY(-3px);
    color:white;
    box-shadow:
        0 18px 35px rgba(17,24,39,.16);
}

.btn-outline-modern{
    height:46px;
    padding:0 20px;
    border-radius:16px;
    border:1px solid #e5e7eb;
    background:white;
    color:#111827;
    font-weight:700;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition:.35s;
}

.btn-outline-modern:hover{
    background:#111827;
    color:white;
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

    .dashboard-hero{
        padding:30px;
    }

    .hero-title{
        font-size:32px;
    }

    .stat-value{
        font-size:28px;
    }

    .dashboard-card-body{
        padding:22px;
    }

}

</style>

<div class="container-fluid dashboard-container fade-up">

    {{-- HERO --}}
    <div class="dashboard-hero">

        <div class="hero-content">

            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                <div>

                    <h1 class="hero-title">
                        Halo, {{ Auth::user()->name }} 👋
                    </h1>

                    <p class="hero-subtitle">
                        Ringkasan performa toko dan aktivitas transaksi terbaru hari ini.
                    </p>

                </div>

                <div class="hero-date">

                    <i class="bi bi-calendar-event"></i>

                    {{ now()->format('d F Y') }}

                </div>

            </div>

        </div>

    </div>

    {{-- STATS --}}
    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3">

            <div class="stat-card-modern">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Pengguna
                        </div>

                        <div class="stat-value">
                            {{ $totalUsers ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon-modern">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>

                <div class="stat-trend">

                    <i class="bi bi-arrow-up"></i>

                    +12% bulan ini

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stat-card-modern">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Produk
                        </div>

                        <div class="stat-value">
                            {{ $totalProducts ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon-modern">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                </div>

                <div class="stat-trend">

                    <i class="bi bi-plus-lg"></i>

                    Produk bertambah

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stat-card-modern">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Pesanan
                        </div>

                        <div class="stat-value">
                            {{ $totalOrders ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon-modern">
                        <i class="bi bi-cart-check-fill"></i>
                    </div>

                </div>

                <div class="stat-trend">

                    <i class="bi bi-graph-up"></i>

                    Order meningkat

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stat-card-modern">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Pendapatan
                        </div>

                        <div class="stat-value" style="font-size:28px;">
                            Rp {{ number_format($totalRevenue ?? 0,0,',','.') }}
                        </div>

                    </div>

                    <div class="stat-icon-modern">
                        <i class="bi bi-cash-stack"></i>
                    </div>

                </div>

                <div class="stat-trend">

                    <i class="bi bi-wallet2"></i>

                    Pendapatan bersih

                </div>

            </div>

        </div>

    </div>

    {{-- CHART + ACTIVITY --}}
    <div class="row g-4 mb-4">

        {{-- CHART --}}
        <div class="col-lg-7">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="dashboard-card-title">
                        Analitik Pendapatan
                    </div>

                    <div class="dashboard-card-subtitle">
                        Grafik pemasukan 7 hari terakhir
                    </div>

                </div>

                <div class="dashboard-card-body">

                    <div class="chart-wrapper">

                        <canvas id="revenueChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        {{-- ACTIVITY --}}
        <div class="col-lg-5">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="dashboard-card-title">
                        Aktivitas Terbaru
                    </div>

                    <div class="dashboard-card-subtitle">
                        Riwayat transaksi terbaru
                    </div>

                </div>

                <div class="dashboard-card-body">

                    @php
                        $recentActivities = \App\Models\Order::with('user')->latest()->take(6)->get();
                    @endphp

                    @if($recentActivities->count())

                    <div class="activity-list">

                        @foreach($recentActivities as $act)

                        <div class="activity-item">

                            <div class="activity-icon">

                                <i class="bi
                                    {{ $act->status == 'completed'
                                        ? 'bi-check-lg'
                                        : ($act->status == 'pending'
                                        ? 'bi-hourglass-split'
                                        : 'bi-box') }}"></i>

                            </div>

                            <div>

                                <div class="activity-title">

                                    Pesanan #{{ $act->id }}

                                </div>

                                <div class="activity-desc">

                                    {{ $act->user->name ?? 'Guest' }}
                                    •
                                    Rp {{ number_format($act->total_price,0,',','.') }}

                                </div>

                                <span class="activity-badge">

                                    {{ ucfirst($act->status) }}

                                </span>

                            </div>

                        </div>

                        @endforeach

                    </div>

                    @else

                    <div class="text-center py-5 text-muted">

                        Belum ada aktivitas

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="dashboard-card">

        <div class="dashboard-card-header d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <div class="dashboard-card-title">
                    Produk Terbaru
                </div>

                <div class="dashboard-card-subtitle">
                    Produk terbaru yang ditambahkan
                </div>

            </div>

            <a href="{{ route('admin.products.index') }}"
               class="btn-outline-modern">

                Lihat Semua

            </a>

        </div>

        <div class="dashboard-card-body">

            <div class="table-responsive">

                <table class="table-modern">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @php
                            $latestProducts = \App\Models\Product::latest()->take(5)->get();
                        @endphp

                        @foreach($latestProducts as $idx => $p)

                        <tr>

                            <td>{{ $idx+1 }}</td>

                            <td>

                                <div class="product-name">
                                    {{ $p->name }}
                                </div>

                            </td>

                            <td>

                                Rp {{ number_format($p->price,0,',','.') }}

                            </td>

                            <td>

                                {{ $p->stock }}

                            </td>

                            <td>

                                <span class="status-pill">
                                    Active
                                </span>

                            </td>

                            <td>

                                <a href="{{ route('admin.products.edit', $p) }}"
                                   class="btn-modern">

                                    Edit

                                </a>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const chartLabels = JSON.parse('@json($chartLabels ?? [])');
    const chartData = JSON.parse('@json($chartData ?? [])');

    if (!chartLabels.length) {
        chartLabels = ['Tidak ada data'];
        chartData = [0];
    }

    const ctx = document.getElementById('revenueChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0,0,0,400);

    gradient.addColorStop(0,'rgba(17,24,39,.28)');
    gradient.addColorStop(.5,'rgba(17,24,39,.10)');
    gradient.addColorStop(1,'rgba(17,24,39,0)');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: chartLabels,

            datasets: [{

                label: 'Pendapatan',

                data: chartData,

                borderColor: '#111827',

                backgroundColor: gradient,

                borderWidth: 4,

                fill: true,

                tension: .45,

                pointRadius: 0,

                pointHoverRadius: 7,

                pointHoverBackgroundColor:'#111827',

                pointHoverBorderColor:'#fff',

                pointHoverBorderWidth:3

            }]

        },

        options: {

            responsive:true,

            maintainAspectRatio:false,

            interaction:{
                intersect:false,
                mode:'index'
            },

            plugins:{

                legend:{
                    display:false
                },

                tooltip:{

                    backgroundColor:'#111827',

                    titleColor:'#fff',

                    bodyColor:'#fff',

                    padding:16,

                    displayColors:false,

                    cornerRadius:16,

                    callbacks:{

                        label:function(context){

                            return 'Rp ' +
                                context.raw.toLocaleString('id-ID');

                        }

                    }

                }

            },

            scales:{

                x:{

                    grid:{
                        display:false
                    },

                    ticks:{
                        color:'#6b7280'
                    }

                },

                y:{

                    beginAtZero:true,

                    border:{
                        display:false
                    },

                    grid:{
                        color:'rgba(17,24,39,.05)'
                    },

                    ticks:{

                        color:'#6b7280',

                        callback:function(value){

                            return value.toLocaleString('id-ID');

                        }

                    }

                }

            }

        }

    });

});

</script>

@endpush

@endsection