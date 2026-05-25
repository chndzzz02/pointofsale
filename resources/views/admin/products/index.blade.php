@extends('layouts.admin')

@section('title', 'Semua Produk')

@section('content')

<style>

:root{
    --primary:#2563eb;
    --primary-soft:#dbeafe;
    --dark:#0f172a;
    --text:#1e293b;
    --muted:#64748b;
    --border:#e2e8f0;
    --bg:#f8fafc;
    --success:#16a34a;
    --success-soft:#dcfce7;
    --danger:#dc2626;
    --danger-soft:#fee2e2;
    --warning:#f59e0b;
    --warning-soft:#fef3c7;
}

body{
    background:var(--bg);
}

/* =======================
   PAGE WRAPPER
======================= */

.products-page{
    animation:fadeUp .5s ease;
}

/* =======================
   HEADER
======================= */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:20px;
    margin-bottom:28px;
}

.page-title{
    font-size:30px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:6px;
    letter-spacing:-1px;
}

.page-subtitle{
    color:var(--muted);
    font-size:14px;
    margin:0;
}

/* =======================
   BUTTON
======================= */

.modern-btn{
    border:none;
    height:48px;
    padding:0 22px;
    border-radius:16px;
    background:linear-gradient(135deg,var(--primary),#1d4ed8);
    color:white !important;
    font-weight:700;
    font-size:14px;
    text-decoration:none !important;
    display:inline-flex;
    align-items:center;
    gap:10px;
    transition:.3s ease;
    box-shadow:
        0 10px 25px rgba(37,99,235,.18);
}

.modern-btn:hover{
    transform:translateY(-2px);
    color:white !important;
    box-shadow:
        0 14px 30px rgba(37,99,235,.25);
}

/* =======================
   CARD
======================= */

.product-wrapper{
    background:white;
    border-radius:26px;
    border:1px solid var(--border);
    overflow:hidden;
    box-shadow:
        0 10px 35px rgba(15,23,42,.05);
}

/* =======================
   TABLE
======================= */

.table{
    margin-bottom:0;
}

.table thead{
    background:#f8fafc;
}

.table thead th{
    border:none;
    padding:18px 20px;
    color:var(--muted);
    font-size:12px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.5px;
    white-space:nowrap;
}

.table tbody td{
    padding:18px 20px;
    vertical-align:middle;
    border-color:#f1f5f9;
}

.table tbody tr{
    transition:.25s ease;
}

.table tbody tr:hover{
    background:#fafcff;
}

/* =======================
   PRODUCT
======================= */

.product-box{
    display:flex;
    align-items:center;
    gap:14px;
}

.product-image{
    width:64px;
    height:64px;
    border-radius:18px;
    object-fit:cover;
    border:2px solid #eef2ff;
    background:white;
    transition:.3s;
}

.table tbody tr:hover .product-image{
    transform:scale(1.04);
}

.product-name{
    font-size:15px;
    font-weight:700;
    color:var(--text);
    margin-bottom:3px;
}

.product-category{
    font-size:13px;
    color:var(--muted);
}

/* =======================
   BADGE
======================= */

.price-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:9px 14px;
    border-radius:999px;
    background:var(--primary-soft);
    color:var(--primary);
    font-size:13px;
    font-weight:700;
}

.stock-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:9px 14px;
    border-radius:999px;
    background:var(--success-soft);
    color:var(--success);
    font-size:13px;
    font-weight:700;
}

.seller-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 14px;
    border-radius:14px;
    background:#f8fafc;
    color:var(--text);
    font-weight:600;
    font-size:13px;
}

/* =======================
   ACTION
======================= */

.action-group{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
}

.btn-edit{
    border:none;
    height:42px;
    padding:0 16px;
    border-radius:14px;
    background:var(--warning-soft);
    color:#92400e;
    font-size:13px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    transition:.25s;
}

.btn-edit:hover{
    background:var(--warning);
    color:white;
    transform:translateY(-1px);
}

.btn-delete{
    border:none;
    height:42px;
    padding:0 16px;
    border-radius:14px;
    background:var(--danger-soft);
    color:var(--danger);
    font-size:13px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:8px;
    transition:.25s;
}

.btn-delete:hover{
    background:var(--danger);
    color:white;
    transform:translateY(-1px);
}

/* =======================
   ALERT
======================= */

.alert-modern{
    border:none;
    border-radius:18px;
    background:#ecfdf5;
    color:#166534;
    padding:16px 20px;
    font-weight:600;
    margin-bottom:24px;
}

/* =======================
   EMPTY
======================= */

.empty-state{
    padding:80px 20px;
    text-align:center;
}

.empty-icon{
    width:90px;
    height:90px;
    border-radius:28px;
    background:#f1f5f9;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto auto 20px;
    font-size:38px;
    color:#94a3b8;
}

.empty-title{
    font-size:22px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:8px;
}

.empty-text{
    color:var(--muted);
    font-size:14px;
}

/* =======================
   PAGINATION
======================= */

.pagination{
    justify-content:center;
    gap:6px;
}

.page-item .page-link{
    border:none;
    width:42px;
    height:42px;
    border-radius:14px !important;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--text);
    font-weight:700;
    background:white;
    box-shadow:none;
}

.page-item .page-link:hover{
    background:#eff6ff;
    color:var(--primary);
}

.page-item.active .page-link{
    background:var(--primary);
    color:white;
}

/* =======================
   ANIMATION
======================= */

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* =======================
   MOBILE
======================= */

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .modern-btn{
        width:100%;
        justify-content:center;
    }

    .table{
        min-width:900px;
    }

}

</style>

<div class="container-fluid px-3 px-md-4 py-4 products-page">

        <a href="{{ route('admin.products.create') }}"
           class="modern-btn">

            <i class="bi bi-plus-lg"></i>

            Tambah Produk

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert-modern">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif

    {{-- TABLE CARD --}}
    <div class="product-wrapper">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Seller</th>
                        <th class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)

                    <tr>

                        <td>

                            <strong class="text-dark">
                                #{{ $product->id }}
                            </strong>

                        </td>

                        <td>

                            <div class="product-box">

                                <img
                                    src="{{ $product->image
                                        ? asset('storage/'.$product->image)
                                        : asset('images/no-image.png') }}"
                                    class="product-image"
                                >

                                <div>

                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>

                                    <div class="product-category">
                                        {{ $product->category->name ?? 'Tanpa Kategori' }}
                                    </div>

                                </div>

                            </div>

                        </td>

                        <td>

                            <span class="price-badge">

                                Rp {{ number_format($product->price ?? 0,0,',','.') }}

                            </span>

                        </td>

                        <td>

                            <span class="stock-badge">

                                {{ $product->stock ?? 0 }} Stok

                            </span>

                        </td>

                        <td>

                            <div class="seller-badge">

                                <i class="bi bi-person-circle"></i>

                                {{ $product->user->name ?? 'Tidak diketahui' }}

                            </div>

                        </td>

                        <td>

                            <div class="action-group">

                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="btn-edit">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                    >

                                        <i class="bi bi-trash"></i>

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6">

                            <div class="empty-state">

                                <div class="empty-icon">

                                    <i class="bi bi-bag-x"></i>

                                </div>

                                <div class="empty-title">

                                    Belum Ada Produk

                                </div>

                                <div class="empty-text">

                                    Produk seller akan muncul di halaman ini

                                </div>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">

        {{ $products->links() }}

    </div>

</div>

@endsection