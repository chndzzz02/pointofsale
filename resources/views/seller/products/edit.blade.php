@extends('layouts.seller')

@section('title', 'Edit Produk')

@section('content')

<style>

/* PAGE */

.edit-product-page{
    padding:10px 5px 30px;
    animation:fadeUp .7s ease;
}

/* HEADER */

.edit-header{
    margin-bottom:35px;
}

.edit-title{

    font-size:42px;

    font-weight:800;

    letter-spacing:-2px;

    color:var(--text);

    margin-bottom:8px;
}

.edit-subtitle{

    color:var(--muted);

    font-size:15px;

    max-width:550px;
}

/* GRID */

.edit-grid{

    display:grid;

    grid-template-columns:1.1fr .9fr;

    gap:28px;
}

@media(max-width:992px){

    .edit-grid{
        grid-template-columns:1fr;
    }

}

/* CARD */

.edit-card{

    background:var(--card);

    border-radius:34px;

    padding:35px;

    border:1px solid rgba(255,255,255,.08);

    box-shadow:var(--shadow);

    position:relative;

    overflow:hidden;
}

.edit-card::before{

    content:'';

    position:absolute;

    width:320px;
    height:320px;

    border-radius:50%;

    background:
        radial-gradient(
            rgba(16,185,129,.08),
            transparent
        );

    top:-140px;
    right:-140px;
}

/* SECTION TITLE */

.section-title{

    font-size:19px;

    font-weight:700;

    color:var(--text);

    margin-bottom:28px;
}

/* LABEL */

.form-label-modern{

    font-size:14px;

    font-weight:700;

    color:var(--text);

    margin-bottom:12px;

    display:block;
}

/* INPUT */

.input-modern{
    position:relative;
}

.input-modern i{

    position:absolute;

    left:18px;
    top:50%;

    transform:translateY(-50%);

    color:#94a3b8;

    font-size:15px;
}

.form-modern,
.select-modern,
.textarea-modern{

    width:100%;

    border:none;

    background:rgba(248,250,252,.9);

    border-radius:22px;

    padding:17px 20px 17px 52px;

    font-size:14px;

    color:#111827;

    transition:.3s ease;
}

.textarea-modern{

    padding-left:20px;

    min-height:170px;

    resize:none;
}

.form-modern:focus,
.select-modern:focus,
.textarea-modern:focus{

    outline:none;

    background:white;

    box-shadow:
        0 0 0 4px rgba(16,185,129,.12);
}

/* CURRENT IMAGE */

.current-image-wrapper{

    position:relative;

    overflow:hidden;

    border-radius:28px;

    margin-bottom:22px;
}

.current-image{

    width:100%;

    height:280px;

    object-fit:cover;

    border-radius:28px;

    transition:.4s ease;
}

.current-image:hover{

    transform:scale(1.04);
}

.image-badge{

    position:absolute;

    top:18px;
    left:18px;

    background:rgba(0,0,0,.6);

    color:white;

    padding:8px 14px;

    border-radius:14px;

    font-size:12px;

    backdrop-filter:blur(10px);
}

/* FILE UPLOAD */

.upload-box{

    border:2px dashed rgba(16,185,129,.2);

    border-radius:28px;

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.05),
            rgba(20,184,166,.03)
        );

    padding:40px 25px;

    text-align:center;

    cursor:pointer;

    transition:.35s ease;

    position:relative;

    overflow:hidden;
}

.upload-box:hover{

    border-color:#10b981;

    transform:translateY(-4px);

    box-shadow:
        0 18px 35px rgba(16,185,129,.08);
}

.upload-box i{

    font-size:54px;

    color:#10b981;

    margin-bottom:16px;
}

.upload-title{

    font-size:18px;

    font-weight:700;

    color:var(--text);

    margin-bottom:8px;
}

.upload-subtitle{

    font-size:14px;

    color:var(--muted);
}

.upload-box input{

    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;
}

/* PREVIEW */

.preview-image{

    width:100%;

    height:250px;

    object-fit:cover;

    border-radius:24px;

    margin-top:22px;

    display:none;

    animation:fadeUp .4s ease;
}

/* ALERT */

.alert-modern{

    background:
        rgba(59,130,246,.08);

    border:none;

    border-radius:20px;

    padding:18px;

    color:#2563eb;

    font-size:14px;

    margin-top:22px;
}

/* BUTTONS */

.action-wrapper{

    display:flex;

    gap:16px;

    margin-top:28px;
}

.btn-save{

    flex:1;

    height:62px;

    border:none;

    border-radius:22px;

    background:
        linear-gradient(
            135deg,
            #10b981,
            #14b8a6
        );

    color:white;

    font-weight:700;

    transition:.35s ease;

    box-shadow:
        0 16px 35px rgba(16,185,129,.18);
}

.btn-save:hover{

    transform:
        translateY(-4px);

    box-shadow:
        0 22px 45px rgba(16,185,129,.28);
}

.btn-cancel{

    height:62px;

    padding:0 28px;

    border:none;

    border-radius:22px;

    background:#f1f5f9;

    color:#334155;

    font-weight:700;

    transition:.3s ease;

    text-decoration:none;

    display:flex;
    align-items:center;
    justify-content:center;
}

.btn-cancel:hover{

    background:#e2e8f0;

    transform:translateY(-3px);

    color:#111827;
}

/* ERROR */

.invalid-feedback{

    display:block;

    margin-top:8px;

    font-size:13px;
}

/* ANIMATION */

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

<div class="edit-product-page">

    {{-- HEADER --}}
    <div class="edit-header">

        <h1 class="edit-title">
            Edit Produk
        </h1>

        <p class="edit-subtitle">
            Perbarui detail produk agar toko tetap terlihat profesional dan menarik.
        </p>

    </div>

    {{-- GRID --}}
    <div class="edit-grid">

        {{-- LEFT --}}
        <div class="edit-card">

            <h5 class="section-title">
                Informasi Produk
            </h5>

            <form action="{{ route('seller.products.update', $product) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- NAME --}}
                    <div class="col-12">

                        <label class="form-label-modern">
                            Nama Produk
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-box"></i>

                            <input
                                type="text"
                                name="name"
                                class="form-modern @error('name') is-invalid @enderror"
                                value="{{ old('name', $product->name) }}"
                                placeholder="Masukkan nama produk"
                                required
                            >

                        </div>

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- CATEGORY --}}
                    <div class="col-md-6">

                        <label class="form-label-modern">
                            Kategori
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-grid"></i>

                            <select
                                name="category_id"
                                class="select-modern @error('category_id') is-invalid @enderror"
                                required
                            >

                                @foreach($categories as $cat)

                                <option value="{{ $cat->id }}"
                                    {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>

                                    {{ $cat->name }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    {{-- STOCK --}}
                    <div class="col-md-6">

                        <label class="form-label-modern">
                            Stok
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-boxes"></i>

                            <input
                                type="number"
                                name="stock"
                                class="form-modern"
                                value="{{ old('stock', $product->stock) }}"
                                placeholder="Jumlah stok"
                                required
                            >

                        </div>

                    </div>

                    {{-- PRICE --}}
                    <div class="col-12">

                        <label class="form-label-modern">
                            Harga Produk
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-cash-stack"></i>

                            <input
                                type="number"
                                name="price"
                                class="form-modern"
                                value="{{ old('price', $product->price) }}"
                                placeholder="Masukkan harga produk"
                                required
                            >

                        </div>

                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="col-12">

                        <label class="form-label-modern">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            class="textarea-modern"
                            placeholder="Deskripsi produk..."
                        >{{ old('description', $product->description) }}</textarea>

                    </div>

                </div>

        </div>

        {{-- RIGHT --}}
        <div class="edit-card">

            <h5 class="section-title">
                Gambar Produk
            </h5>

            {{-- CURRENT IMAGE --}}
            <div class="current-image-wrapper">

                <span class="image-badge">
                    Gambar Saat Ini
                </span>

                <img
                    src="{{ Storage::url($product->image) }}"
                    class="current-image"
                >

            </div>

            {{-- UPLOAD --}}
            <label class="upload-box">

                <i class="bi bi-cloud-arrow-up-fill"></i>

                <div class="upload-title">
                    Ganti Gambar Produk
                </div>

                <div class="upload-subtitle">
                    PNG, JPG atau JPEG maksimal 5MB
                </div>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    id="imageInput"
                >

            </label>

            {{-- PREVIEW --}}
            <img id="previewImage"
                 class="preview-image">

            {{-- INFO --}}
            <div class="alert-modern">

                <i class="bi bi-info-circle me-2"></i>

                Kosongkan upload jika tidak ingin mengganti gambar produk.

            </div>

            {{-- BUTTONS --}}
            <div class="action-wrapper">

                <button type="submit"
                        class="btn-save">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Simpan Perubahan

                </button>

                <a href="{{ route('seller.products.index') }}"
                   class="btn-cancel">

                    Batal

                </a>

            </div>

            </form>

        </div>

    </div>

</div>

<script>

/* PREVIEW IMAGE */

const imageInput =
document.getElementById('imageInput');

const previewImage =
document.getElementById('previewImage');

imageInput?.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        previewImage.src =
            URL.createObjectURL(file);

        previewImage.style.display = 'block';

    }

});

</script>

@endsection