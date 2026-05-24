@extends('layouts.admin')

@section('title', 'Semua Produk')

@section('content')

<style>

body{
    background:#f4f7fb;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:15px;
}

.page-title{
    font-size:32px;
    font-weight:800;
    color:#111827;
    margin:0;
    letter-spacing:-1px;
}

.page-subtitle{
    color:#6b7280;
    margin-top:6px;
    font-size:14px;
}

/* BUTTON */

.modern-btn{
    border:none;
    padding:13px 24px;
    border-radius:999px;
    font-weight:600;
    background:linear-gradient(135deg,#111827,#1f2937);
    color:white !important;
    transition:.25s ease;
    box-shadow:
        0 10px 25px rgba(17,24,39,.15);
    text-decoration:none !important;
    display:inline-flex;
    align-items:center;
    gap:10px;
}

.modern-btn:hover{
    transform:translateY(-1px);
    color:white !important;
    text-decoration:none !important;
    box-shadow:
        0 14px 30px rgba(17,24,39,.22);
}

/* CARD */

.product-wrapper{
    background:white;
    border-radius:28px;
    overflow:hidden;
    border:1px solid #eef2f7;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
}

/* TABLE */

.table{
    margin-bottom:0;
}

.table thead{
    background:#f8fafc;
}

.table thead th{
    border:none;
    padding:20px;
    font-size:13px;
    font-weight:700;
    color:#6b7280;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.table tbody td{
    padding:20px;
    vertical-align:middle;
    border-color:#f1f5f9;
}

.table tbody tr{
    transition:.2s ease;
}

.table tbody tr:hover{
    background:#fafafa;
}

/* IMAGE */

.product-image{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:20px;
    border:2px solid #eef2f7;
    transition:.25s ease;
}

.table tbody tr:hover .product-image{
    transform:scale(1.03);
}

/* PRODUCT */

.product-name{
    font-weight:700;
    color:#111827;
    margin-bottom:4px;
    font-size:15px;
}

.product-category{
    font-size:13px;
    color:#6b7280;
}

/* BADGES */

.price-badge{
    background:#f3f4f6;
    color:#111827;
    padding:10px 15px;
    border-radius:999px;
    font-weight:700;
    font-size:13px;
    display:inline-block;
}

.stock-badge{
    background:#ecfdf5;
    color:#16a34a;
    padding:10px 15px;
    border-radius:999px;
    font-weight:700;
    font-size:13px;
    display:inline-block;
}

/* SELLER */

.seller-name{
    font-weight:600;
    color:#374151;
}

/* ACTION */

.action-group{
    display:flex;
    justify-content:center;
    gap:10px;
}

.btn-edit{
    border:none;
    background:#facc15;
    color:#111827;
    padding:10px 18px;
    border-radius:999px;
    font-weight:600;
    transition:.2s;
    text-decoration:none;
}

.btn-edit:hover{
    background:#eab308;
    transform:translateY(-1px);
    color:#111827;
}

.btn-delete{
    border:none;
    background:#ef4444;
    color:white;
    padding:10px 18px;
    border-radius:999px;
    font-weight:600;
    transition:.2s;
}

.btn-delete:hover{
    background:#dc2626;
    transform:translateY(-1px);
}

/* EMPTY */

.empty-state{
    padding:80px 20px;
    text-align:center;
}

.empty-state i{
    font-size:70px;
    color:#cbd5e1;
    margin-bottom:15px;
}

.empty-state h5{
    font-weight:700;
    color:#111827;
}

.empty-state p{
    color:#6b7280;
}

/* PAGINATION */

.pagination{
    justify-content:center;
    margin-top:30px;
}

.page-item .page-link{
    border:none;
    margin:0 5px;
    border-radius:14px !important;
    color:#111827;
    font-weight:600;
    background:white;
    box-shadow:none;
}

.page-item .page-link:hover{
    background:#f3f4f6;
    color:#111827;
}

.page-item.active .page-link{
    background:#111827;
    color:white;
}

</style>

<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="page-header">

        <div>

            <h1 class="page-title">
                Semua Produk
            </h1>

            <div class="page-subtitle">
                Kelola seluruh produk seller dengan tampilan modern dan elegan
            </div>

        </div>

        <a href="{{ route('admin.products.create') }}"
           class="modern-btn">
            <i class="bi bi-plus-lg"></i>
            Tambah Produk
        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success border-0 rounded-4 shadow-sm">
            {{ session('success') }}
        </div>

    @endif

    {{-- TABLE --}}
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
                            <strong>#{{ $product->id }}</strong>
                        </td>

                        <td>

                            <div class="d-flex align-items-center gap-3">

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

                            <div class="seller-name">
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

                                <i class="bi bi-bag-x"></i>

                                <h5>
                                    Belum Ada Produk
                                </h5>

                                <p>
                                    Produk seller akan muncul di sini
                                </p>

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