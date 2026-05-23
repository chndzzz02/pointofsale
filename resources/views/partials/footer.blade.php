<footer class="premium-footer">
    <div class="container">
        <div class="row g-4">
            <!-- Kolom 1: Brand & Sosmed -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand">
                    <i class="fas fa-store me-2"></i> UMKM Tulungagung
                </div>
                <p class="footer-desc">
                    Platform belanja produk lokal berkualitas dari Tulungagung. 
                    Dukung UMKM Indonesia dan temukan produk terbaik dari pengrajin & pelaku usaha lokal.
                </p>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Informasi -->
            <div class="col-lg-2 col-md-6">
                <h5 class="footer-title">Informasi</h5>
                <ul class="footer-links">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Karir</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Layanan Pelanggan -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">Layanan Pelanggan</h5>
                <ul class="footer-links">
                    <li><a href="#">Cara Berbelanja</a></li>
                    <li><a href="#">Pengembalian Barang</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak & Newsletter dengan efek glass -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">Tetap Terhubung</h5>
                <div class="footer-contact">
                    <p><i class="fas fa-envelope"></i> support@umkm-tulungagung.com</p>
                    <p><i class="fas fa-phone-alt"></i> +62 812 3456 7890</p>
                    <p><i class="fas fa-map-marker-alt"></i> Tulungagung, Jawa Timur, Indonesia</p>
                </div>
                <div class="newsletter">
                    <p class="mb-2">Dapatkan promo & update terbaru</p>
                    <div class="input-group">
                        <input type="email" class="form-control newsletter-input" placeholder="Email Anda">
                        <button class="btn newsletter-btn" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <span>© {{ date('Y') }} UMKM Tulungagung. All rights reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="badge-footer">Made with <i class="fas fa-heart text-danger"></i> for UMKM</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer dengan Gradasi Menarik */
    .premium-footer {
        background: linear-gradient(135deg, #0a0a0a 0%, #1e1e2a 50%, #2a2a35 100%);
        color: #e0e0e0;
        margin-top: 5rem;
        padding: 4rem 0 1.5rem;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        position: relative;
        overflow: hidden;
    }
    /* Efek garis gradasi animasi di atas footer */
    .premium-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #6c6c6c, #e0e0e0, #6c6c6c);
        animation: gradientShift 3s infinite linear;
    }
    @keyframes gradientShift {
        0% { left: -100%; }
        100% { left: 100%; }
    }
    /* Efek partikel kecil (opsional) */
    .premium-footer::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.03) 0%, transparent 60%);
        pointer-events: none;
    }
    .footer-brand {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #ffffff, #b0b0c0);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
        transition: 0.3s;
    }
    .footer-brand:hover {
        transform: scale(1.02);
        background: linear-gradient(135deg, #fff, #ddd);
        -webkit-background-clip: text;
        background-clip: text;
    }
    .footer-desc {
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        color: #c0c0c0;
    }
    .social-icons {
        display: flex;
        gap: 1rem;
    }
    .social-icon {
        width: 42px;
        height: 42px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        color: #e0e0e0;
        text-decoration: none;
        font-size: 1.2rem;
        backdrop-filter: blur(4px);
    }
    .social-icon:hover {
        background: linear-gradient(135deg, #4a4a5a, #2a2a35);
        transform: translateY(-6px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        color: white;
    }
    .footer-title {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        position: relative;
        display: inline-block;
        letter-spacing: 1px;
        color: #f0f0f0;
    }
    .footer-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 45px;
        height: 3px;
        background: linear-gradient(90deg, #a0a0b0, #606070);
        border-radius: 3px;
        transition: width 0.3s;
    }
    .footer-title:hover::after {
        width: 70px;
    }
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-links li {
        margin-bottom: 0.7rem;
    }
    .footer-links a {
        color: #c0c0c0;
        text-decoration: none;
        transition: 0.2s;
        font-size: 0.9rem;
        display: inline-block;
    }
    .footer-links a:hover {
        color: white;
        transform: translateX(5px);
    }
    .footer-contact p {
        margin-bottom: 0.7rem;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: 0.2s;
    }
    .footer-contact p:hover {
        transform: translateX(3px);
        color: white;
    }
    .footer-contact i {
        width: 28px;
        color: #a0a0b0;
        font-size: 1rem;
    }
    /* Newsletter dengan efek glassmorphism */
    .newsletter {
        background: rgba(255,255,255,0.03);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 1rem;
        margin-top: 0.5rem;
        border: 1px solid rgba(255,255,255,0.05);
        transition: 0.3s;
    }
    .newsletter:hover {
        background: rgba(255,255,255,0.06);
        border-color: rgba(255,255,255,0.1);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .newsletter-input {
        background: rgba(0,0,0,0.3);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 50px 0 0 50px;
        color: white;
        padding: 0.6rem 1rem;
    }
    .newsletter-input:focus {
        background: rgba(0,0,0,0.5);
        border-color: #aaa;
        box-shadow: none;
        color: white;
    }
    .newsletter-input::placeholder {
        color: #aaa;
    }
    .newsletter-btn {
        background: linear-gradient(135deg, #4a4a5a, #2a2a35);
        border: none;
        border-radius: 0 50px 50px 0;
        color: white;
        padding: 0.6rem 1.2rem;
        transition: 0.2s;
    }
    .newsletter-btn:hover {
        background: linear-gradient(135deg, #6a6a7a, #3a3a45);
        transform: scale(1.02);
    }
    .footer-bottom {
        margin-top: 3rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255,255,255,0.08);
        font-size: 0.85rem;
    }
    .badge-footer {
        background: rgba(100,100,120,0.3);
        backdrop-filter: blur(4px);
        padding: 0.3rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        transition: 0.2s;
    }
    .badge-footer:hover {
        background: rgba(120,120,140,0.5);
    }
    @media (max-width: 768px) {
        .premium-footer {
            padding: 2rem 0 1rem;
        }
        .footer-brand {
            font-size: 1.5rem;
        }
        .social-icons {
            justify-content: center;
        }
        .footer-title {
            margin-top: 1rem;
        }
        .footer-bottom {
            text-align: center;
        }
    }
</style>