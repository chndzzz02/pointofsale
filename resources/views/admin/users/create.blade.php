@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')

<style>

/* =========================
   CREATE USER PAGE
========================= */

.create-user-page{
    animation:fadeUp .5s ease;
}

/* HEADER */

.page-header{
    margin-bottom:24px;
}

.page-title{
    font-size:30px;
    font-weight:800;
    color:#0f172a;
    letter-spacing:-1px;
    margin-bottom:6px;
}

.page-subtitle{
    color:#64748b;
    font-size:14px;
    line-height:1.6;
}

/* CARD */

.form-card{
    background:white;

    border-radius:28px;

    border:1px solid #e9eef5;

    overflow:hidden;

    box-shadow:
        0 10px 30px rgba(15,23,42,.05);
}

/* CARD HEADER */

.form-card-header{
    padding:26px 28px;

    border-bottom:1px solid #eef2f7;

    background:
        linear-gradient(
            135deg,
            #eff6ff,
            #f8fafc
        );
}

.form-card-title{
    font-size:20px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:4px;
}

.form-card-subtitle{
    font-size:13px;
    color:#64748b;
}

/* BODY */

.form-card-body{
    padding:28px;
}

/* FORM */

.form-group-modern{
    margin-bottom:22px;
}

.form-label-modern{
    font-size:13px;
    font-weight:700;
    color:#334155;
    margin-bottom:10px;
    display:block;
}

.input-modern,
.select-modern{
    width:100%;

    height:54px;

    border-radius:16px;

    border:1px solid #dbe4f0;

    background:#f8fafc;

    padding:0 18px;

    font-size:14px;

    color:#0f172a;

    transition:.25s;
}

.input-modern:focus,
.select-modern:focus{
    outline:none;

    border-color:#2563eb;

    background:white;

    box-shadow:
        0 0 0 4px rgba(37,99,235,.08);
}

/* ICON INPUT */

.input-wrapper{
    position:relative;
}

.input-icon{
    position:absolute;

    top:50%;
    left:16px;

    transform:translateY(-50%);

    color:#94a3b8;

    font-size:15px;
}

.input-wrapper .input-modern{
    padding-left:46px;
}

/* BUTTONS */

.form-actions{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    margin-top:8px;
}

.btn-save-modern{
    height:48px;

    padding:0 22px;

    border:none;

    border-radius:14px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #4f46e5
        );

    color:white;

    font-size:14px;
    font-weight:700;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;

    transition:.3s;

    box-shadow:
        0 10px 22px rgba(37,99,235,.18);
}

.btn-save-modern:hover{
    transform:translateY(-2px);

    box-shadow:
        0 16px 28px rgba(37,99,235,.25);
}

.btn-cancel-modern{
    height:48px;

    padding:0 22px;

    border-radius:14px;

    border:1px solid #dbe4f0;

    background:white;

    color:#334155;

    font-size:14px;
    font-weight:700;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;

    text-decoration:none;

    transition:.25s;
}

.btn-cancel-modern:hover{
    background:#f8fafc;
    color:#0f172a;
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

/* MOBILE */

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .form-card-body{
        padding:22px;
    }

    .form-card-header{
        padding:22px;
    }

}

</style>

<div class="container-fluid create-user-page">

    {{-- CARD --}}
    <div class="form-card">

        {{-- HEADER --}}
        <div class="form-card-header">

            <div class="form-card-title">
                Form Tambah User
            </div>

            <div class="form-card-subtitle">
                Lengkapi seluruh data pengguna dengan benar
            </div>

        </div>

        {{-- BODY --}}
        <div class="form-card-body">

            <form action="{{ route('admin.users.store') }}"
                  method="POST">

                @csrf

                {{-- NAMA --}}
                <div class="form-group-modern">

                    <label class="form-label-modern">
                        Nama Lengkap
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-person input-icon"></i>

                        <input type="text"
                               name="name"
                               class="input-modern"
                               placeholder="Masukkan nama lengkap"
                               required>

                    </div>

                </div>

                {{-- EMAIL --}}
                <div class="form-group-modern">

                    <label class="form-label-modern">
                        Email
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input type="email"
                               name="email"
                               class="input-modern"
                               placeholder="Masukkan email"
                               required>

                    </div>

                </div>

                {{-- PASSWORD --}}
                <div class="form-group-modern">

                    <label class="form-label-modern">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input type="password"
                               name="password"
                               class="input-modern"
                               placeholder="Masukkan password"
                               required>

                    </div>

                </div>

                {{-- ROLE --}}
                <div class="form-group-modern">

                    <label class="form-label-modern">
                        Role User
                    </label>

                    <select name="role"
                            class="select-modern">

                        <option value="customer">
                            Customer
                        </option>

                        <option value="seller">
                            Seller
                        </option>

                        <option value="admin">
                            Admin
                        </option>

                    </select>

                </div>

                {{-- BUTTON --}}
                <div class="form-actions">

                    <button type="submit"
                            class="btn-save-modern">

                        <i class="bi bi-check-circle"></i>

                        Simpan User

                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="btn-cancel-modern">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection