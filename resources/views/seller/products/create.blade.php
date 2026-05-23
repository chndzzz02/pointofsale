@extends('layouts.seller')

@section('title', 'Tambah Produk')

@section('content')

<style>

/* PAGE */

.create-product-page{
    padding:40px 0;
    animation:fadeUp .7s ease;
}

/* HEADER */

.create-header{
    margin-bottom:35px;
}

.create-title{
    font-size:42px;
    font-weight:800;
    letter-spacing:-2px;
    color:#111827;
    margin-bottom:8px;
}

.create-subtitle{
    color:#6b7280;
    font-size:15px;
    max-width:550px;
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

.create-card{

    background:white;

    border-radius:34px;

    padding:35px;

    border:1px solid #eef2f7;

    box-shadow:
        0 12px 35px rgba(15,23,42,.05);

    position:relative;

    overflow:hidden;
}

.create-card::before{

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

/* SECTION */

.section-title{

    font-size:19px;

    font-weight:700;

    color:#111827;

    margin-bottom:28px;
}

/* LABEL */

.form-label-modern{

    font-size:14px;

    font-weight:700;

    color:#374151;

    margin-bottom:12px;

    display:block;
}

/* INPUT */

.input-modern{
    position:relative;
}

.input-modern i{

    position:absolute;

    top:50%;
    left:18px;

    transform:translateY(-50%);

    color:#9ca3af;

    font-size:15px;
}

.form-modern,
.select-modern,
.textarea-modern{

    width:100%;

    border:none;

    background:#f8fafc;

    border-radius:20px;

    padding:17px 20px 17px 50px;

    color:#111827;

    font-size:14px;

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

.form-modern::placeholder,
.textarea-modern::placeholder{
    color:#94a3b8;
}

/* UPLOAD */

.upload-box{

    border:2px dashed #d1fae5;

    border-radius:30px;

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.05),
            rgba(20,184,166,.04)
        );

    padding:50px 25px;

    text-align:center;

    transition:.35s ease;

    cursor:pointer;

    position:relative;

    overflow:hidden;
}

.upload-box:hover{

    border-color:#10b981;

    transform:translateY(-4px);

    box-shadow:
        0 15px 35px rgba(16,185,129,.08);
}

.upload-box::before{

    content:'';

    position:absolute;

    width:260px;
    height:260px;

    border-radius:50%;

    background:
        radial-gradient(
            rgba(16,185,129,.08),
            transparent
        );

    top:-120px;
    right:-120px;
}

.upload-box i{

    font-size:56px;

    color:#10b981;

    margin-bottom:16px;

    position:relative;
}

.upload-title{

    font-size:18px;

    font-weight:700;

    color:#111827;

    margin-bottom:8px;

    position:relative;
}

.upload-subtitle{

    color:#6b7280;

    font-size:14px;

    position:relative;
}

.upload-box input{

    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;
}

/* IMAGE PREVIEW */

.image-preview{

    width:100%;

    height:260px;

    object-fit:cover;

    border-radius:28px;

    display:none;

    margin-top:22px;

    animation:fadeUp .5s ease;
}

/* INFO CARD */

.info-card{

    background:
        linear-gradient(
            135deg,
            rgba(16,185,129,.06),
            rgba(20,184,166,.04)
        );

    border-radius:24px;

    padding:24px;

    margin-top:25px;
}

.info-card h6{

    font-size:16px;

    font-weight:700;

    color:#111827;

    margin-bottom:10px;
}

.info-card p{

    font-size:14px;

    color:#6b7280;

    margin:0;
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

    font-weight:700;

    font-size:15px;

    transition:.35s ease;

    box-shadow:
        0 15px 35px rgba(16,185,129,.18);
}

.submit-btn:hover{

    transform:
        translateY(-4px)
        scale(1.01);

    box-shadow:
        0 22px 45px rgba(16,185,129,.28);
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

<div class="container create-product-page">

    {{-- HEADER --}}
    <div class="create-header">

        <h1 class="create-title">
            Tambah Produk
        </h1>

        <p class="create-subtitle">
            Tambahkan produk terbaikmu dengan tampilan profesional agar toko terlihat lebih menarik.
        </p>

    </div>

    {{-- GRID --}}
    <div class="create-grid">

        {{-- LEFT --}}
        <div class="create-card">

            <h5 class="section-title">
                Informasi Produk
            </h5>

            <form action="{{ route('seller.products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

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
                                class="form-modern"
                                placeholder="Masukkan nama produk"
                                required
                            >

                        </div>

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
                                class="select-modern"
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
                            placeholder="Tulis deskripsi produk yang menarik..."
                        ></textarea>

                    </div>

                </div>

        </div>

        {{-- RIGHT --}}
        <div class="create-card">

            <h5 class="section-title">
                Upload Gambar
            </h5>

            {{-- UPLOAD --}}
            <label class="upload-box">

                <i class="bi bi-cloud-arrow-up-fill"></i>

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
                    id="imageInput"
                    required
                >

            </label>

            {{-- PREVIEW --}}
            <img id="previewImage"
                 class="image-preview">

            {{-- INFO --}}
            <div class="info-card">

                <h6>
                    Tips Produk Menarik 🚀
                </h6>

                <p>
                    Gunakan foto produk yang jelas dan pencahayaan bagus agar pembeli lebih tertarik.
                </p>

            </div>

            {{-- BUTTON --}}
            <div class="mt-4">

                <button type="submit"
                        class="submit-btn">

                    <i class="bi bi-plus-circle-fill me-2"></i>

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