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

{{-- ============================= HERO ============================= --}}
<section class="hero-nature-sm">
    <div class="container">
        <span class="section-eyebrow"><i class="bi bi-headset"></i> {{ $ucapan }}</span>
        <h1>Hubungi Kami</h1>
        <p>Ada pertanyaan seputar destinasi di {{ $namaDaerah }}? Cek FAQ singkat di bawah, atau langsung kirim pesan ke tim kami.</p>
    </div>
</section>

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

    </div>
</section>
@endsection