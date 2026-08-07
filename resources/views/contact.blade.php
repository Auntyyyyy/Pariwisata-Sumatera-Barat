<?php
date_default_timezone_set('Asia/Jakarta');

$namaDaerah  = 'Sumatera Barat';
$jamSekarang = (int) date('H');

if ($jamSekarang < 10) {
    $ucapan = 'Selamat pagi';
} elseif ($jamSekarang < 15) {
    $ucapan = 'Selamat siang';
} elseif ($jamSekarang < 18) {
    $ucapan = 'Selamat sore';
} else {
    $ucapan = 'Selamat malam';
}

// Jam operasional destinasi: 06.00 - 17.00
$statusBuka = ($jamSekarang >= 6 && $jamSekarang < 17);
?>

@extends('layouts.app')

@section('title', 'Hubungi Kami - KanjaBuzz')

@section('content')

{{-- CSS Khusus untuk Seksyen Ucapan Terima Kasih --}}
<style>
    .thankyou-nature-section {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(20, 83, 45, 0.9) 0%, rgba(6, 78, 59, 0.85) 100%),
                    url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
        color: #ffffff;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .thankyou-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.875rem;
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .thankyou-media-box {
        position: relative;
        border-radius: 1.25rem;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .thankyou-media-box img, 
    .thankyou-media-box video {
        width: 100%;
        height: 280px;
        object-fit: cover;
        display: block;
    }
</style>

{{-- ============================= HERO: STACKED CARD ============================= --}}
<section class="stackhero">
    <div class="stackhero-glow"></div>

    <div class="container position-relative">
        <div class="stackhero-copy text-center">
            <span class="stackhero-eyebrow">{{ $ucapan }} &middot; Koleksi Destinasi Pilihan</span>
            <h1 class="stackhero-title">
                Keindahan <em>Indonesia</em><br>Satu Langkah Lebih Dekat
            </h1>
            <p class="stackhero-desc">
                Dari ngarai yang menjulang hingga danau yang tenang — {{ $namaDaerah }} menyimpan cerita
                yang layak dijelajahi. Ada pertanyaan sebelum berangkat? Tim kami siap membantu.
            </p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('destinations') }}" class="stackhero-cta">
                    Jelajahi Sekarang <i class="bi bi-arrow-right"></i>
                </a>
                <a href="#pesan-form" class="stackhero-cta-ghost">
                    Kirim Pesan ke Kami
                </a>
            </div>
        </div>

        <div class="stackhero-stage">
            <div class="stackhero-card stackhero-card-left">
                <img src="{{ asset('images/Mentawaikontak.jpg') }}" alt="Pulau Mentawai">
                <div class="stackhero-card-label">
                    <span>Ngarai Sianok</span>
                </div>
            </div>

            <div class="stackhero-card stackhero-card-center">
                <img src="{{ asset('images/Maninjaukontak.jpg') }}" alt="Danau Maninjau">
                <div class="stackhero-card-label stackhero-card-label-lg">
                    <span class="stackhero-card-title">Danau Maninjau</span>
                </div>
            </div>

            <div class="stackhero-card stackhero-card-right">
                <img src="{{ asset('images/jamgadang.jpg') }}" alt="Jam Gadang">
                <div class="stackhero-card-label">
                    <span>Jam Gadang</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .stackhero {
        --sh-bg-1: #0B1710;
        --sh-bg-2: #142A1D;
        --sh-gold: #C9A24B;
        --sh-cream: #F3EEE2;
        --sh-sage: #93A896;

        position: relative;
        overflow: hidden;
        background: linear-gradient(160deg, var(--sh-bg-1) 0%, var(--sh-bg-2) 100%);
        padding: 5.5rem 0 6.5rem;
    }

    .stackhero-glow {
        position: absolute;
        top: 8%;
        left: 50%;
        width: 620px;
        height: 620px;
        transform: translateX(-50%);
        background: radial-gradient(circle, rgba(201, 162, 75, 0.22) 0%, rgba(201, 162, 75, 0) 65%);
        pointer-events: none;
    }

    .stackhero-eyebrow {
        display: inline-block;
        font-size: 0.78rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--sh-sage);
        margin-bottom: 1.25rem;
        font-weight: 500;
    }

    .stackhero-title {
        font-family: 'Fraunces', serif;
        font-weight: 900;
        text-transform: uppercase;
        color: var(--sh-cream);
        font-size: clamp(2rem, 5vw, 3.4rem);
        line-height: 1.15;
        letter-spacing: 0.01em;
        margin-bottom: 1.25rem;
    }

    .stackhero-title em {
        font-style: italic;
        font-weight: 500;
        color: var(--sh-gold);
        text-transform: none;
    }

    .stackhero-desc {
        color: rgba(243, 238, 226, 0.72);
        font-size: 1.02rem;
        max-width: 560px;
        margin: 0 auto 2.25rem;
        line-height: 1.7;
    }

    .stackhero-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--sh-gold);
        color: #1a1305;
        font-weight: 600;
        padding: 0.85rem 1.75rem;
        border-radius: 50px;
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stackhero-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(201, 162, 75, 0.35);
        color: #1a1305;
    }

    .stackhero-cta-ghost {
        display: inline-flex;
        align-items: center;
        color: var(--sh-cream);
        font-weight: 500;
        padding: 0.85rem 1rem;
        text-decoration: none;
        border-bottom: 1px solid rgba(243, 238, 226, 0.3);
        transition: border-color 0.3s ease, color 0.3s ease;
    }

    .stackhero-cta-ghost:hover {
        color: var(--sh-gold);
        border-color: var(--sh-gold);
    }

    .stackhero-stage {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 4rem;
        min-height: 420px;
    }

    .stackhero-card {
        position: absolute;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.6s ease;
    }

    .stackhero-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .stackhero-card-center {
        position: relative;
        width: 340px;
        height: 460px;
        z-index: 3;
    }

    .stackhero-card-left,
    .stackhero-card-right {
        width: 250px;
        height: 380px;
        z-index: 1;
        filter: brightness(0.7);
    }

    .stackhero-card-left {
        transform: translateX(-140px) rotate(-8deg);
    }

    .stackhero-card-right {
        transform: translateX(140px) rotate(8deg);
    }

    .stackhero-stage:hover .stackhero-card-left {
        transform: translateX(-175px) rotate(-4deg);
        filter: brightness(0.85);
    }

    .stackhero-stage:hover .stackhero-card-right {
        transform: translateX(175px) rotate(4deg);
        filter: brightness(0.85);
    }

    .stackhero-stage:hover .stackhero-card-center {
        transform: translateY(-6px);
        box-shadow: 0 35px 70px rgba(0, 0, 0, 0.55);
    }

    .stackhero-card-label {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1rem;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, transparent 100%);
        color: var(--sh-cream);
        font-size: 0.85rem;
        font-weight: 500;
        letter-spacing: 0.03em;
    }

    .stackhero-card-label-lg {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }

    .stackhero-card-tag {
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--sh-gold);
        font-weight: 600;
    }

    .stackhero-card-title {
        font-family: 'Fraunces', serif;
        font-size: 1.4rem;
        font-weight: 600;
    }

    @media (max-width: 767px) {
        .stackhero { padding: 4rem 0 4.5rem; }
        .stackhero-stage { min-height: 340px; margin-top: 3rem; }
        .stackhero-card-center { width: 220px; height: 320px; }
        .stackhero-card-left,
        .stackhero-card-right { width: 150px; height: 240px; }
        .stackhero-card-left { transform: translateX(-70px) rotate(-6deg); }
        .stackhero-card-right { transform: translateX(70px) rotate(6deg); }
        .stackhero-title { letter-spacing: 0; }
    }
</style>

{{-- ============================= INFO + FAQ (Gallery) ============================= --}}
<section class="about-section" id="kontak-section">
    <div class="container">

        <div class="row g-4">

            {{-- Kolom kiri: info operasional & kontak --}}
            <div class="col-lg-5">
                <div class="row g-4">
                    <div class="col-12" data-reveal>
                        <div class="info-card-nature">
                            <h3><i class="bi bi-clock"></i> Jam Operasional</h3>

                            <span class="live-status-badge {{ $statusBuka ? 'is-buka' : 'is-tutup' }}">
                                {{ $statusBuka ? 'Sedang Buka Sekarang' : 'Sedang Tutup Sekarang' }}
                            </span>

                            <ul class="jam-list mt-3">
                                <li><span>Senin - Jumat</span><span>06.00 - 17.00 WIB</span></li>
                                <li><span>Sabtu - Minggu</span><span>06.00 - 18.00 WIB</span></li>
                                <li><span>Hari Libur Nasional</span><span>06.00 - 18.00 WIB</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12" data-reveal style="transition-delay: 0.08s;">
                        <div class="info-card-nature">
                            <h3><i class="bi bi-envelope"></i> Kontak</h3>
                            <ul class="kontak-list">
                                <li><i class="bi bi-envelope-fill"></i> info@KanjaBuzz.id</li>
                                <li><i class="bi bi-telephone-fill"></i> +62 812-3456-7890</li>
                                <li><i class="bi bi-geo-alt-fill"></i> {{ $namaDaerah }}, Indonesia</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 text-center" data-reveal style="transition-delay: 0.16s;">
                        <a href="#pesan-form" class="btn-nature">
                            Kirim Pesan ke Kami <i class="bi bi-send"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Kolom kanan: FAQ --}}
            <div class="col-lg-7" data-reveal style="transition-delay: 0.1s;">
                <span class="section-eyebrow"><i class="bi bi-question-circle"></i> FAQ</span>
                <h2 class="section-title mb-4">Pertanyaan yang Sering Diajukan</h2>

                <details class="faq-item-nature" open>
                    <summary>Apakah destinasi buka setiap hari?</summary>
                    <p>Ya, hampir semua destinasi buka setiap hari sesuai jam operasional di atas, kecuali ada pemberitahuan khusus.</p>
                </details>

                <details class="faq-item-nature">
                    <summary>Apakah perlu reservasi sebelum berkunjung?</summary>
                    <p>Untuk rombongan besar, disarankan menghubungi kami terlebih dahulu agar pelayanan lebih maksimal.</p>
                </details>

                <details class="faq-item-nature">
                    <summary>Apakah tersedia pemandu wisata?</summary>
                    <p>Tersedia pemandu lokal di beberapa destinasi utama. Silakan hubungi kami untuk info lebih lanjut.</p>
                </details>

                <details class="faq-item-nature">
                    <summary>Bagaimana cara mengirim kritik & saran?</summary>
                    <p>Tekan tombol "Kirim Pesan ke Kami", isi formulir di bawah, dan tim kami akan segera merespons.</p>
                </details>
            </div>

        </div>

        {{-- ============================= FORM PESAN ============================= --}}
        <div class="row justify-content-center mt-5 pt-4" id="pesan-form">
            <div class="col-lg-7">
                <div class="text-center mb-4" data-reveal>
                    <span class="section-eyebrow"><i class="bi bi-chat-dots"></i> Kirim Pesan</span>
                    <h2 class="section-title">Punya Kritik atau Saran?</h2>
                    <p class="section-subtitle mx-auto">Isi formulir singkat di bawah, tim kami akan merespons secepatnya.</p>
                </div>

                <div class="kontak-form-card" data-reveal>
                    <form>
                        <div class="form-group-nature">
                            <label for="nama" class="form-label-nature">Nama</label>
                            <input type="text" class="form-control form-control-nature" id="nama" name="nama" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group-nature">
                            <label for="email" class="form-label-nature">Email</label>
                            <input type="email" class="form-control form-control-nature" id="email" name="email" placeholder="Masukkan email Anda">
                        </div>
                        <div class="form-group-nature">
                            <label for="pesan" class="form-label-nature">Pesan</label>
                            <textarea class="form-control form-control-nature" id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn-nature w-100 justify-content-center">
                            Kirim Pesan <i class="bi bi-send"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- ============================= SEKSYEN UCAPAN TERIMA KASIH (SEBELUM FOOTER) ============================= --}}
<div class="mt-5 pt-4" data-reveal>
    <div class="thankyou-nature-section p-4 p-md-5">
        {{-- Pastikan class "row" membungkus kedua kolom di bawah ini --}}
        <div class="row align-items-center g-4">
            
            {{-- Kolom Kiri: Teks & Tombol --}}
            <div class="col-lg-7 text-center text-lg-start">
                <div class="thankyou-badge mb-3">
                    <i class="bi bi-heart-fill text-danger"></i>
                    <span>Terima Kasih Telah Berkunjung</span>
                </div>
                <h2 class="fw-bold mb-3" style="font-family: var(--font-heading); font-size: clamp(1.6rem, 2.5vw, 2.2rem);">
                    Salam Hangat dari <span class="text-warning">KanjaBuzz</span>!
                </h2>
                <p class="mb-4 text-white-50 fs-6">
                    Terima kasih telah menjelajahi keindahan pesona pariwisata {{ $namaDaerah }}. Dukungan dan masukan Anda sangat berharga bagi kami dalam terus memberikan panduan petualangan alam terbaik.
                </p>
                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start">
                    <a href="{{ route('destinations') }}" class="btn-nature">
                        <i class="bi bi-compass"></i> Jelajahi Destinasi Lain
                    </a>
                    <a href="{{ route('beranda') }}" class="btn-nature-outline-soft text-black border-white">
                        <i class="bi bi-house"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>

            {{-- Kolom Kanan: Gambar --}}
            <div class="col-lg-5 text-center">
                <div class="thankyou-media-box">
                    <img src="{{ asset('images/terimakasih.jpg') }}" 
                         alt="Terima Kasih KanjaBuzz - Wisata Alam" 
                         class="img-fluid rounded-3">
                </div>
            </div>
        </div> 
    </div>
  </div>
    </div>
</section>
@endsection