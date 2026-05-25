@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')

<style>

body{
    background:#f4f7fb;
}

/* =========================
   WRAPPER
========================= */

.edit-product-wrapper{
    padding:10px 5px 40px;
    animation:fadeUp .5s ease;
}

/* =========================
   HEADER
========================= */

.page-header{
    position:relative;
    overflow:hidden;
    background:
        linear-gradient(135deg,#ffffff 0%,#f8fafc 100%);
    border:1px solid #e2e8f0;
    border-radius:30px;
    padding:34px 36px;
    margin-bottom:30px;
    box-shadow:
        0 12px 40px rgba(15,23,42,.05);
}

.page-header::before{
    content:'';
    position:absolute;
    width:260px;
    height:260px;
    border-radius:50%;
    background:
        radial-gradient(circle,
        rgba(99,102,241,.12) 0%,
        rgba(99,102,241,0) 70%);
    top:-120px;
    right:-80px;
}

.header-content{
    position:relative;
    z-index:2;
}

.header-badge{
    width:max-content;
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px 18px;
    border-radius:999px;
    background:rgba(99,102,241,.10);
    color:#4f46e5;
    font-size:13px;
    font-weight:700;
    margin-bottom:18px;
}

.page-title{
    font-size:38px;
    font-weight:800;
    color:#0f172a;
    letter-spacing:-1.5px;
    margin-bottom:10px;
    line-height:1.1;
}

.page-subtitle{
    color:#64748b;
    font-size:15px;
    line-height:1.7;
    max-width:680px;
}

/* =========================
   CARD
========================= */

.modern-card{
    background:white;
    border:none;
    border-radius:30px;
    overflow:hidden;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
}

.modern-card-body{
    padding:40px;
}

/* =========================
   FORM
========================= */

.form-section{
    margin-bottom:10px;
}

.form-label{
    font-size:14px;
    font-weight:700;
    color:#374151;
    margin-bottom:10px;
}

.form-control,
.form-select{
    border:none;
    background:#f8fafc;
    border-radius:18px;
    padding:15px 18px;
    min-height:56px;
    transition:.25s ease;
    box-shadow:none !important;
    font-size:14px;
    color:#111827;
}

.form-control:focus,
.form-select:focus{
    background:white;
    box-shadow:
        0 0 0 4px rgba(99,102,241,.10) !important;
}

textarea.form-control{
    min-height:140px;
    resize:none;
}

.invalid-feedback{
    margin-top:8px;
    font-size:13px;
}

/* =========================
   IMAGE PREVIEW
========================= */

.image-preview-wrapper{
    display:flex;
    align-items:center;
    gap:18px;
    flex-wrap:wrap;
}

.preview-image{
    width:110px;
    height:110px;
    border-radius:24px;
    object-fit:cover;
    border:3px solid #eef2ff;
    box-shadow:
        0 8px 24px rgba(99,102,241,.10);
}

.preview-placeholder{
    width:110px;
    height:110px;
    border-radius:24px;
    background:#f8fafc;
    border:2px dashed #cbd5e1;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#94a3b8;
    font-size:32px;
}

/* =========================
   BUTTON
========================= */

.btn-modern-primary{
    background:linear-gradient(135deg,#4f46e5,#6366f1);
    color:white;
    border:none;
    padding:14px 30px;
    border-radius:999px;
    font-weight:600;
    transition:.25s ease;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:10px;
    box-shadow:
        0 10px 25px rgba(79,70,229,.18);
}

.btn-modern-primary:hover{
    transform:translateY(-1px);
    color:white;
    box-shadow:
        0 14px 30px rgba(79,70,229,.25);
}

.btn-modern-secondary{
    background:#f3f4f6;
    color:#111827;
    border:none;
    padding:14px 30px;
    border-radius:999px;
    font-weight:600;
    transition:.25s ease;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:10px;
}

.btn-modern-secondary:hover{
    background:#e5e7eb;
    color:#111827;
    transform:translateY(-1px);
}

/* =========================
   ANIMATION
========================= */

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

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .page-header{
        padding:26px 22px;
        border-radius:24px;
    }

    .page-title{
        font-size:30px;
    }

    .page-subtitle{
        font-size:14px;
    }

    .modern-card-body{
        padding:24px;
    }

}

</style>

<div class="container-fluid px-4 edit-product-wrapper">

    {{-- CARD --}}
    <div class="modern-card">

        <div class="modern-card-body">

            <form
                action="{{ route('admin.products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- NAMA PRODUK --}}
                    <div class="col-md-6">

                        <div class="form-section">

                            <label class="form-label">
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $product->name) }}"
                                placeholder="Masukkan nama produk"
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
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror"
                                required
                            >

                                @foreach($categories as $cat)

                                    <option
                                        value="{{ $cat->id }}"
                                        {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}
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
                                Harga Produk
                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', $product->price) }}"
                                placeholder="Masukkan harga produk"
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
                                Stok Produk
                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control @error('stock') is-invalid @enderror"
                                value="{{ old('stock', $product->stock) }}"
                                placeholder="Masukkan stok produk"
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
                                Pilih Seller
                            </label>

                            <select
                                name="user_id"
                                class="form-select @error('user_id') is-invalid @enderror"
                                required
                            >

                                @foreach($sellers as $seller)

                                    <option
                                        value="{{ $seller->id }}"
                                        {{ old('user_id', $product->user_id) == $seller->id ? 'selected' : '' }}
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
                                Deskripsi Produk
                            </label>

                            <textarea
                                name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Masukkan deskripsi produk"
                            >{{ old('description', $product->description) }}</textarea>

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
                                Gambar Produk
                            </label>

                            <div class="image-preview-wrapper mb-3">

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/'.$product->image) }}"
                                        class="preview-image"
                                    >

                                @else

                                    <div class="preview-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif

                            </div>

                            <input
                                type="file"
                                name="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept="image/*"
                            >

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-12 mt-3">

                        <div class="d-flex gap-3 flex-wrap">

                            <button
                                type="submit"
                                class="btn-modern-primary"
                            >
                                <i class="bi bi-check-circle-fill"></i>
                                Update Produk
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

                </div>

            </form>

        </div>

    </div>

</div>

@endsection