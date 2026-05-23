@extends('layouts.seller')

@section('title', 'Tambah Produk')

@section('content')

<style>

.create-product-wrapper{
    max-width:1200px;
    margin:auto;
}

/* HEADER */

.page-header{
    margin-bottom:35px;
    animation:fadeUp .7s ease;
}

.page-title{
    font-size:42px;
    font-weight:800;
    letter-spacing:-2px;
    color:var(--text);
    margin-bottom:8px;
}

.page-subtitle{
    color:var(--muted);
    font-size:15px;
    max-width:500px;
}

/* GRID */

.create-grid{
    display:grid;
    grid-template-columns:1.1fr .9fr;
    gap:28px;
}

@media(max-width:992px){

    .create-grid{
        grid-template-columns:1fr;
    }

}

/* CARD */

.modern-card{
    background:var(--card);

    border-radius:34px;

    padding:35px;

    box-shadow:var(--shadow);

    position:relative;

    overflow:hidden;

    border:
        1px solid rgba(255,255,255,.7);

    animation:fadeUp .7s ease;
}

.modern-card::before{
    content:'';
    position:absolute;

    width:300px;
    height:300px;

    border-radius:50%;

    background:
        radial-gradient(
            rgba(16,185,129,.08),
            transparent
        );

    top:-120px;
    right:-120px;
}

/* SECTION TITLE */

.section-title{
    font-size:18px;
    font-weight:700;
    color:var(--text);
    margin-bottom:25px;
}

/* LABEL */

.form-label-custom{
    font-size:14px;
    font-weight:700;
    color:var(--text);
    margin-bottom:12px;
    display:block;
}

/* INPUT */

.modern-input,
.modern-select,
.modern-textarea{

    width:100%;

    border:none;

    background:#f8fafc;

    border-radius:20px;

    padding:17px 20px;

    color:var(--text);

    transition:.3s ease;

    font-size:14px;

    box-shadow:
        inset 0 0 0 1px transparent;
}

.dark-mode .modern-input,
.dark-mode .modern-select,
.dark-mode .modern-textarea{
    background:#1f2937;
    color:white;
}

.modern-input:focus,
.modern-select:focus,
.modern-textarea:focus{

    background:white;

    outline:none;

    box-shadow:
        0 0 0 4px rgba(16,185,129,.12);
}

.dark-mode .modern-input:focus,
.dark-mode .modern-select:focus,
.dark-mode .modern-textarea:focus{
    background:#111827;
}

.modern-input::placeholder,
.modern-textarea::placeholder{
    color:#94a3b8;
}

/* ICON INPUT */

.input-modern{
    position:relative;
}

.input-modern i{
    position:absolute;
    top:50%;
    left:18px;

    transform:translateY(-50%);

    color:#9ca3af;

    font-size:16px;
}

.input-modern .modern-input,
.input-modern .modern-select{
    padding-left:52px;
}

/* TEXTAREA */

.modern-textarea{
    min-height:170px;
    resize:none;
}

/* UPLOAD AREA */

.upload-box{

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.05),
            rgba(20,184,166,.04)
        );

    border:2px dashed #d1fae5;

    border-radius:30px;

    padding:45px 25px;

    text-align:center;

    transition:.35s ease;

    position:relative;

    overflow:hidden;

    cursor:pointer;
}

.upload-box:hover{

    border-color:#10b981;

    transform:translateY(-3px);

    box-shadow:
        0 15px 35px rgba(16,185,129,.08);
}

.upload-box::before{

    content:'';

    position:absolute;

    width:250px;
    height:250px;

    border-radius:50%;

    background:
        radial-gradient(
            rgba(16,185,129,.08),
            transparent
        );

    top:-100px;
    right:-100px;
}

.upload-box i{

    font-size:55px;

    color:#10b981;

    margin-bottom:15px;

    position:relative;
}

.upload-title{

    font-size:18px;

    font-weight:700;

    color:var(--text);

    margin-bottom:8px;

    position:relative;
}

.upload-subtitle{

    color:var(--muted);

    font-size:14px;

    position:relative;
}

.upload-box input{

    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;
}

/* PREVIEW */

.image-preview{

    width:100%;

    height:250px;

    border-radius:28px;

    object-fit:cover;

    display:none;

    margin-top:20px;

    animation:fadeUp .5s ease;
}

/* BUTTON */

.submit-btn{

    width:100%;

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

    font-size:15px;

    font-weight:700;

    transition:.35s ease;

    box-shadow:
        0 15px 30px rgba(16,185,129,.18);
}

.submit-btn:hover{

    transform:
        translateY(-4px)
        scale(1.01);

    box-shadow:
        0 20px 40px rgba(16,185,129,.25);
}

/* SMALL CARD */

.mini-info-card{

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.06),
            rgba(20,184,166,.04)
        );

    border-radius:24px;

    padding:22px;

    margin-top:25px;
}

.mini-info-card h6{

    font-size:16px;

    font-weight:700;

    color:var(--text);

    margin-bottom:10px;
}

.mini-info-card p{

    color:var(--muted);

    font-size:14px;

    margin:0;
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

<div class="create-product-wrapper">

    {{-- HEADER --}}
    <div class="page-header">

        <h1 class="page-title">
            Tambah Produk
        </h1>

        <p class="page-subtitle">
            Upload produk terbaikmu dan buat toko terlihat lebih profesional serta menarik.
        </p>

    </div>

    {{-- GRID --}}
    <div class="create-grid">

        {{-- LEFT FORM --}}
        <div class="modern-card">

            <h5 class="section-title">
                Informasi Produk
            </h5>

            <form action="{{ route('seller.products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- NAMA --}}
                    <div class="col-12">

                        <label class="form-label-custom">
                            Nama Produk
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-box"></i>

                            <input
                                type="text"
                                name="name"
                                class="modern-input"
                                placeholder="Masukkan nama produk"
                                required
                            >

                        </div>

                    </div>

                    {{-- KATEGORI --}}
                    <div class="col-md-6">

                        <label class="form-label-custom">
                            Kategori
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-grid"></i>

                            <select
                                name="category_id"
                                class="modern-select"
                                required
                            >

                                @foreach($categories as $cat)

                                    <option value="{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    {{-- STOK --}}
                    <div class="col-md-6">

                        <label class="form-label-custom">
                            Stok Produk
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-boxes"></i>

                            <input
                                type="number"
                                name="stock"
                                class="modern-input"
                                placeholder="Jumlah stok"
                                required
                            >

                        </div>

                    </div>

                    {{-- HARGA --}}
                    <div class="col-12">

                        <label class="form-label-custom">
                            Harga Produk
                        </label>

                        <div class="input-modern">

                            <i class="bi bi-cash-stack"></i>

                            <input
                                type="number"
                                name="price"
                                class="modern-input"
                                placeholder="Masukkan harga produk"
                                required
                            >

                        </div>

                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="col-12">

                        <label class="form-label-custom">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            class="modern-textarea"
                            placeholder="Tulis deskripsi produk dengan detail dan menarik..."
                        ></textarea>

                    </div>

                </div>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="modern-card">

            <h5 class="section-title">
                Upload Gambar
            </h5>

            {{-- UPLOAD --}}
            <label class="upload-box">

                <i class="bi bi-cloud-arrow-up"></i>

                <div class="upload-title">
                    Upload Gambar Produk
                </div>

                <div class="upload-subtitle">
                    PNG, JPG atau JPEG maksimal 5MB
                </div>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    required
                    id="imageInput"
                >

            </label>

            {{-- PREVIEW --}}
            <img id="previewImage"
                 class="image-preview">

            {{-- INFO --}}
            <div class="mini-info-card">

                <h6>
                    Tips Produk Menarik 🚀
                </h6>

                <p>
                    Gunakan foto berkualitas tinggi dan deskripsi yang jelas agar produk lebih dipercaya pembeli.
                </p>

            </div>

            {{-- BUTTON --}}
            <div class="mt-4">

                <button type="submit"
                        class="submit-btn">

                    <i class="bi bi-plus-circle me-2"></i>

                    Simpan Produk

                </button>

            </div>

            </form>

        </div>

    </div>

</div>

<script>

/* IMAGE PREVIEW */

const imageInput =
document.getElementById('imageInput');

const previewImage =
document.getElementById('previewImage');

imageInput?.addEventListener('change',function(e){

    const file = e.target.files[0];

    if(file){

        previewImage.src =
            URL.createObjectURL(file);

        previewImage.style.display = 'block';
    }

});

</script>

@endsection