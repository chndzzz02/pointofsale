@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')

<style>

:root{
    --primary:#2563eb;
    --primary-dark:#1d4ed8;
    --primary-soft:#dbeafe;

    --success:#16a34a;
    --success-soft:#dcfce7;

    --dark:#0f172a;
    --text:#1e293b;
    --muted:#64748b;

    --border:#e2e8f0;
    --bg:#f8fafc;

    --danger:#dc2626;
}

/* =======================
   GLOBAL
======================= */

body{
    background:var(--bg);
}

/* =======================
   WRAPPER
======================= */

.create-product-wrapper{
    padding:8px 4px 40px;
    animation:fadeUp .45s ease;
}

/* =======================
   HEADER
======================= */

.page-header{
    margin-bottom:24px;
}

.page-title{
    font-size:30px;
    font-weight:800;
    color:var(--dark);
    letter-spacing:-1px;
    margin-bottom:6px;
}

.page-subtitle{
    color:var(--muted);
    font-size:14px;
    margin:0;
}

/* =======================
   CARD
======================= */

.modern-card{
    background:white;
    border:1px solid var(--border);
    border-radius:28px;
    overflow:hidden;
    box-shadow:
        0 10px 35px rgba(15,23,42,.05);
}

/* =======================
   TOP BAR
======================= */

.card-topbar{
    padding:22px 28px;
    border-bottom:1px solid #f1f5f9;
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:15px;
}

.topbar-title{
    font-size:18px;
    font-weight:700;
    color:var(--dark);
    margin-bottom:4px;
}

.topbar-subtitle{
    font-size:13px;
    color:var(--muted);
}

/* =======================
   BODY
======================= */

.modern-card-body{
    padding:32px;
}

/* =======================
   FORM GROUP
======================= */

.form-section{
    margin-bottom:4px;
}

.form-label{
    font-size:13px;
    font-weight:700;
    color:var(--text);
    margin-bottom:10px;
    display:flex;
    align-items:center;
    gap:8px;
}

/* =======================
   INPUT
======================= */

.form-control,
.form-select{
    border:1px solid #e5e7eb;
    background:#f8fafc;
    border-radius:16px;
    padding:14px 16px;
    min-height:54px;
    transition:.25s ease;
    box-shadow:none !important;
    font-size:14px;
    color:var(--dark);
}

.form-control::placeholder{
    color:#94a3b8;
}

textarea.form-control{
    min-height:140px;
    resize:none;
    padding-top:16px;
}

.form-control:focus,
.form-select:focus{
    background:white;
    border-color:var(--primary);
    box-shadow:
        0 0 0 4px rgba(37,99,235,.10) !important;
}

/* =======================
   FILE INPUT
======================= */

input[type="file"]{
    padding:12px;
    background:white;
}

/* =======================
   INVALID
======================= */

.invalid-feedback{
    display:block;
    margin-top:8px;
    font-size:13px;
    color:var(--danger);
}

/* =======================
   INFO BOX
======================= */

.info-box{
    background:linear-gradient(
        135deg,
        rgba(37,99,235,.08),
        rgba(37,99,235,.03)
    );
    border:1px solid rgba(37,99,235,.10);
    border-radius:18px;
    padding:18px;
    margin-bottom:26px;
}

.info-box-title{
    font-size:14px;
    font-weight:700;
    color:var(--primary-dark);
    margin-bottom:6px;
}

.info-box-text{
    font-size:13px;
    color:#475569;
    line-height:1.6;
}

/* =======================
   BUTTON
======================= */

.btn-modern-primary{
    height:50px;
    padding:0 24px;
    border:none;
    border-radius:16px;
    background:linear-gradient(
        135deg,
        var(--primary),
        var(--primary-dark)
    );
    color:white;
    font-size:14px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition:.3s ease;
    box-shadow:
        0 10px 25px rgba(37,99,235,.18);
}

.btn-modern-primary:hover{
    transform:translateY(-2px);
    color:white;
    box-shadow:
        0 16px 35px rgba(37,99,235,.22);
}

.btn-modern-secondary{
    height:50px;
    padding:0 22px;
    border:none;
    border-radius:16px;
    background:#f1f5f9;
    color:var(--text);
    font-size:14px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition:.25s;
    text-decoration:none;
}

.btn-modern-secondary:hover{
    background:#e2e8f0;
    color:var(--text);
    transform:translateY(-1px);
}

/* =======================
   FOOTER ACTION
======================= */

.form-footer{
    border-top:1px solid #f1f5f9;
    margin-top:28px;
    padding-top:28px;
}

/* =======================
   ANIMATION
======================= */

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

/* =======================
   MOBILE
======================= */

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .modern-card-body{
        padding:22px;
    }

    .card-topbar{
        padding:18px 20px;
    }

    .btn-modern-primary,
    .btn-modern-secondary{
        width:100%;
    }

}

</style>

<div class="container-fluid px-3 px-md-4 create-product-wrapper">

    {{-- CARD --}}
    <div class="modern-card">

        {{-- TOPBAR --}}
        <div class="card-topbar">

            <div>

                <div class="topbar-title">
                    Form Produk
                </div>

                <div class="topbar-subtitle">
                    Lengkapi data produk di bawah ini
                </div>

            </div>

            <div class="d-none d-md-flex align-items-center gap-2 text-muted small">

                <i class="bi bi-shield-check"></i>

                Data tersimpan aman

            </div>

        </div>

        {{-- BODY --}}
        <div class="modern-card-body">

            {{-- INFO --}}
            <div class="info-box">

                <div class="info-box-title">

                    <i class="bi bi-lightbulb"></i>

                    Tips Produk

                </div>

                <div class="info-box-text">

                    Gunakan nama produk yang jelas, deskripsi menarik,
                    dan upload gambar berkualitas agar produk lebih menarik
                    bagi customer.

                </div>

            </div>

            <form
                action="{{ route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row g-4">

                    {{-- NAMA --}}
                    <div class="col-md-6">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-box-seam"></i>

                                Nama Produk

                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Keripik Pisang Premium"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- KATEGORI --}}
                    <div class="col-md-6">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-grid"></i>

                                Kategori

                            </label>

                            <select
                                name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Pilih kategori
                                </option>

                                @foreach($categories as $cat)

                                    <option
                                        value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}
                                    >
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- HARGA --}}
                    <div class="col-md-6">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-cash-stack"></i>

                                Harga Produk

                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}"
                                placeholder="Masukkan harga"
                                required
                            >

                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- STOK --}}
                    <div class="col-md-6">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-boxes"></i>

                                Stok Produk

                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control @error('stock') is-invalid @enderror"
                                value="{{ old('stock') }}"
                                placeholder="Jumlah stok tersedia"
                                required
                            >

                            @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- SELLER --}}
                    <div class="col-12">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-person-badge"></i>

                                Seller

                            </label>

                            <select
                                name="user_id"
                                class="form-select @error('user_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Pilih seller
                                </option>

                                @foreach($sellers as $seller)

                                    <option
                                        value="{{ $seller->id }}"
                                        {{ old('user_id') == $seller->id ? 'selected' : '' }}
                                    >
                                        {{ $seller->name }} ({{ $seller->email }})
                                    </option>

                                @endforeach

                            </select>

                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="col-12">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-card-text"></i>

                                Deskripsi Produk

                            </label>

                            <textarea
                                name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Masukkan deskripsi produk..."
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-12">

                        <div class="form-section">

                            <label class="form-label">

                                <i class="bi bi-image"></i>

                                Gambar Produk

                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept="image/*"
                                required
                            >

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="form-footer">

                    <div class="d-flex gap-3 flex-wrap">

                        <button
                            type="submit"
                            class="btn-modern-primary"
                        >

                            <i class="bi bi-check-circle-fill"></i>

                            Simpan Produk

                        </button>

                        <a
                            href="{{ route('admin.products.index') }}"
                            class="btn-modern-secondary"
                        >

                            <i class="bi bi-arrow-left"></i>

                            Kembali

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection