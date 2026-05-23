@extends('layouts.seller')

@section('title', 'Produk Saya')

@section('content')

<style>

/* PAGE */

.products-page{
    animation:fadeUp .7s ease;
}

/* HEADER */

.products-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:32px;
    gap:20px;
    flex-wrap:wrap;
}

.page-title{
    font-size:38px;
    font-weight:800;
    letter-spacing:-1.5px;
    color:var(--text);
    margin-bottom:6px;
}

.page-subtitle{
    color:var(--muted);
    font-size:15px;
}

/* BUTTON */

.add-product-btn{

    height:56px;

    border:none;

    border-radius:18px;

    padding:0 26px;

    background:
        linear-gradient(
            135deg,
            #10b981,
            #14b8a6
        );

    color:white;

    font-weight:700;

    display:flex;
    align-items:center;
    gap:10px;

    transition:.35s ease;

    box-shadow:
        0 12px 28px rgba(16,185,129,.18);

    text-decoration:none;
}

.add-product-btn:hover{

    transform:
        translateY(-4px)
        scale(1.02);

    box-shadow:
        0 18px 35px rgba(16,185,129,.28);

    color:white;
}

/* CARD */

.products-card{

    background:var(--card);

    border-radius:34px;

    padding:28px;

    box-shadow:var(--shadow);

    overflow:hidden;

    animation:fadeUp .8s ease;
}

/* TABLE */

.table-modern{
    width:100%;
    border-collapse:separate;
    border-spacing:0 14px;
}

.table-modern thead tr th{

    border:none;

    color:var(--muted);

    font-size:13px;

    font-weight:700;

    padding:0 18px 10px;
}

.table-modern tbody tr{

    background:var(--card);

    transition:.35s ease;

    box-shadow:
        0 8px 24px rgba(15,23,42,.04);

    border-radius:24px;
}

.table-modern tbody tr:hover{

    transform:translateY(-3px);

    box-shadow:
        0 16px 35px rgba(15,23,42,.08);
}

.table-modern tbody td{

    padding:18px;

    vertical-align:middle;

    border:none;
}

/* PRODUCT IMAGE */

.product-image{

    width:72px;
    height:72px;

    border-radius:22px;

    object-fit:cover;

    box-shadow:
        0 10px 20px rgba(15,23,42,.08);

    transition:.35s ease;
}

.product-image:hover{

    transform:
        scale(1.08)
        rotate(2deg);
}

/* PRODUCT NAME */

.product-name{

    font-weight:700;

    color:var(--text);

    margin-bottom:5px;

    font-size:15px;
}

.product-id{

    font-size:12px;

    color:var(--muted);
}

/* PRICE */

.price-badge{

    background:
        rgba(16,185,129,.1);

    color:#10b981;

    padding:10px 16px;

    border-radius:14px;

    font-weight:700;

    display:inline-block;
}

/* STOCK */

.stock-badge{

    background:
        rgba(59,130,246,.1);

    color:#3b82f6;

    padding:10px 14px;

    border-radius:14px;

    font-weight:700;

    font-size:13px;
}

/* ACTIONS */

.action-buttons{
    display:flex;
    gap:10px;
}

.btn-action{

    width:42px;
    height:42px;

    border:none;

    border-radius:14px;

    display:flex;
    align-items:center;
    justify-content:center;

    transition:.3s ease;

    font-size:15px;
}

.btn-edit{

    background:
        rgba(245,158,11,.12);

    color:#f59e0b;
}

.btn-delete{

    background:
        rgba(239,68,68,.12);

    color:#ef4444;
}

.btn-action:hover{

    transform:
        translateY(-3px)
        scale(1.08);
}

/* EMPTY */

.empty-state{

    text-align:center;

    padding:80px 20px;
}

.empty-icon{

    width:110px;
    height:110px;

    border-radius:30px;

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.1),
            rgba(20,184,166,.08)
        );

    display:flex;
    align-items:center;
    justify-content:center;

    margin:auto auto 25px;

    font-size:42px;

    color:#10b981;
}

.empty-title{

    font-size:24px;

    font-weight:800;

    color:var(--text);

    margin-bottom:10px;
}

.empty-subtitle{

    color:var(--muted);

    margin-bottom:25px;
}

/* PAGINATION */

.pagination{
    gap:10px;
}

.page-link{

    border:none !important;

    width:42px;
    height:42px;

    border-radius:14px !important;

    display:flex;
    align-items:center;
    justify-content:center;

    color:var(--text);

    background:var(--card);

    box-shadow:
        0 6px 18px rgba(15,23,42,.05);
}

.page-item.active .page-link{

    background:
        linear-gradient(
            135deg,
            #10b981,
            #14b8a6
        );

    color:white;
}

/* MOBILE */

@media(max-width:768px){

    .products-card{
        overflow-x:auto;
    }

    .page-title{
        font-size:30px;
    }

}

/* ANIMATION */

@keyframes fadeUp{

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

</style>

<div class="products-page">

    {{-- HEADER --}}
    <div class="products-header">

        <div>

            <h1 class="page-title">
                Produk Saya
            </h1>

            <p class="page-subtitle">
                Kelola produk toko dengan tampilan modern dan profesional
            </p>

        </div>

        <a href="{{ route('seller.products.create') }}"
           class="add-product-btn">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah Produk

        </a>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">

            {{ session('success') }}

        </div>

    @endif

    {{-- PRODUCT TABLE --}}
    <div class="products-card">

        @if($products->count() > 0)

            <table class="table-modern">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Produk</th>

                        <th>Harga</th>

                        <th>Stok</th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($products as $product)

                    <tr>

                        {{-- NUMBER --}}
                        <td width="70">

                            <strong>
                                {{ $loop->iteration }}
                            </strong>

                        </td>

                        {{-- PRODUCT --}}
                        <td>

                            <div class="d-flex align-items-center gap-3">

                                <img
                                    src="{{ Storage::url($product->image) }}"
                                    class="product-image"
                                >

                                <div>

                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>

                                    <div class="product-id">
                                        ID Produk:
                                        #{{ $product->id }}
                                    </div>

                                </div>

                            </div>

                        </td>

                        {{-- PRICE --}}
                        <td>

                            <span class="price-badge">

                                Rp {{ number_format($product->price,0,',','.') }}

                            </span>

                        </td>

                        {{-- STOCK --}}
                        <td>

                            <span class="stock-badge">

                                {{ $product->stock }} Stok

                            </span>

                        </td>

                        {{-- ACTIONS --}}
                        <td>

                            <div class="action-buttons justify-content-center">

                                {{-- EDIT --}}
                                <a href="{{ route('seller.products.edit', $product) }}"
                                   class="btn-action btn-edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('seller.products.destroy', $product) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-action btn-delete"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                        <i class="bi bi-trash3-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-center">

                {{ $products->links() }}

            </div>

        @else

            {{-- EMPTY STATE --}}
            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-box-seam"></i>

                </div>

                <h3 class="empty-title">
                    Belum Ada Produk
                </h3>

                <p class="empty-subtitle">
                    Mulai tambahkan produk pertamamu agar toko terlihat profesional.
                </p>

                <a href="{{ route('seller.products.create') }}"
                   class="add-product-btn d-inline-flex">

                    <i class="bi bi-plus-circle-fill"></i>

                    Tambah Produk

                </a>

            </div>

        @endif

    </div>

</div>

@endsection