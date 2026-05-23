@extends('layouts.app')
@section('title', 'Masuk ke Akun')
@section('content')

<style>
    /* Monochrome Soft Theme untuk Halaman Login */
    .login-wrapper {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    .login-card {
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(12px);
        border: none;
        border-radius: 2rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeInUp 0.6s ease-out;
    }
    .login-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 28px 48px rgba(0, 0, 0, 0.12);
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .gradient-text {
        background: linear-gradient(135deg, #2c2c2c, #6c6c6c);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 800;
    }
    .btn-premium-login {
        background: #2c2c2c;
        border: none;
        border-radius: 2rem;
        font-weight: 600;
        padding: 0.75rem 1rem;
        transition: all 0.25s ease;
        color: white;
        font-size: 1rem;
        letter-spacing: 0.3px;
    }
    .btn-premium-login:hover {
        background: #111111;
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }
    .text-premium {
        color: #3a3a3a;
        text-decoration: none;
        font-weight: 600;
        transition: 0.2s;
    }
    .text-premium:hover {
        color: #000000;
        text-decoration: underline;
    }
    .form-control-login {
        border-radius: 2rem;
        padding: 0.75rem 1.2rem;
        border: 1px solid #e2e2e2;
        background: #fefefe;
        transition: all 0.2s;
    }
    .form-control-login:focus {
        border-color: #8a8a8a;
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.05);
        background: #ffffff;
    }
    .form-check-input:checked {
        background-color: #3a3a3a;
        border-color: #3a3a3a;
    }
    .form-check-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background: transparent;
        border-bottom: none;
        padding-top: 2rem !important;
    }
    .invalid-feedback {
        font-size: 0.8rem;
        margin-left: 1rem;
    }
    /* Efek glass pada card container */
    .glass-bg {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 2rem;
    }
    @media (max-width: 576px) {
        .login-card {
            margin: 0 1rem;
        }
    }
</style>

<div class="container login-wrapper">
    <div class="row justify-content-center w-100">
        <div class="col-md-5">
            <div class="card login-card">
                <div class="card-header bg-transparent text-center pt-4 border-0">
                    <h3 class="fw-bold gradient-text mb-2">Selamat Datang Kembali</h3>
                    <p class="text-muted">Silakan masuk ke akun Anda</p>
                </div>
                <div class="card-body p-4 pt-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control form-control-login @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="contoh@email.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control form-control-login @error('password') is-invalid @enderror" required placeholder="********">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        <button type="submit" class="btn btn-premium-login w-100 py-2">Masuk</button>
                        <div class="text-center mt-4">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-premium">Daftar sekarang</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection