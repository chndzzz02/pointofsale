@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')

<style>

body{
    background:#f4f7fb;
}

/* WRAPPER */

.edit-product-wrapper{
    padding:10px 5px 40px;
}

/* HEADER */

.page-header{
    margin-bottom:30px;
}

.page-title{
    font-size:34px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:6px;
}

.page-subtitle{
    color:#6b7280;
    font-size:14px;
}

/* CARD */

.modern-card{
    background:white;
    border:none;
    border-radius:32px;
    overflow:hidden;
    box-shadow:
        0 10px 40px rgba(15,23,42,.05);
}

/* BODY */

.modern-card-body{
    padding:40px;
}

/* LABEL */

.form-label{
    font-size:14px;
    font-weight:700;
    color:#374151;
    margin-bottom:10px;
}

/* INPUT */

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

textarea.form-control{
    min-height:140px;
    resize:none;
}

.form-control:focus,
.form-select:focus{
    background:white;
    border:none;
    box-shadow:
        0 0 0 4px rgba(17,24,39,.06) !important;
}

/* FILE */

input[type="file"]{
    padding:14px;
}

/* IMAGE */

.preview-wrapper{
    background:#f8fafc;
    border-radius:24px;
    padding:20px;
    border:1px solid #eef2f7;
    display:inline-block;
}

.product-preview{
    width:180px;
    height:180px;
    object-fit:cover;
    border-radius:24px;
    transition:.25s ease;
}

.product-preview:hover{
    transform:scale(1.02);
}

/* INVALID */

.invalid-feedback{
    margin-top:8px;
    font-size:13px;
}

/* BUTTON PRIMARY */

.btn-modern-primary{
    background:linear-gradient(135deg,#111827,#1f2937);
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
        0 10px 25px rgba(17,24,39,.15);
}

.btn-modern-primary:hover{
    transform:translateY(-1px);
    color:white;
    box-shadow:
        0 14px 30px rgba(17,24,39,.22);
}

/* BUTTON SECONDARY */

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

/* SECTION */

.form-section{
    margin-bottom:10px;
}

/* ANIMATION */

.fade-up{
    animation:fadeUp .5s ease;
}

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

</style>

<div class="container-fluid px-4 edit-product-wrapper fade-up">

    {{-- HEADER --}}
    <div class="page-header">

        <h1 class="page-title">
            Edit Produk
        </h1>

        <div class="page-subtitle">
            Perbarui informasi produk dengan tampilan modern dan elegan
        </div>

    </div>

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

                    {{-- NAMA --}}
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
                                placeholder="Masukkan jumlah stok"
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

                                <option value="">
                                    Pilih seller
                                </option>

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
                                Gambar Saat Ini
                            </label>

                            <div class="preview-wrapper mb-4">

                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    class="product-preview"
                                >

                            </div>

                            <label class="form-label">
                                Ganti Gambar (Opsional)
                            </label>

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
                                <i class="bi bi-check-circle"></i>
                                Simpan Perubahan
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