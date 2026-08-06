@extends('layouts.app')

@section('title', $destinasi->nama . ' - Destinations Details')

@section('content')

<?php
date_default_timezone_set("Asia/Jakarta");
$jamsekarang = date("H");

if ($jamsekarang >= (int) $destinasi->jam_buka && $jamsekarang < (int) $destinasi->jam_tutup) {
    $statusSekarang = "Buka";
} else {
    $statusSekarang = "Tutup";
}
?>

{{-- CSS Tambahan untuk Efek 3D, Caption, dan Kartu Galeri Atraksi --}}
<style>
    /* Container untuk perspektif 3D */
    .image-3d-wrapper {
        perspective: 1000px;
        position: relative;
    }

    /* Card Gambar Utama 3D */
    .image-3d-card {
        border-radius: 1.25rem;
        overflow: hidden;
        position: relative;
        transform-style: preserve-3d;
        transform: rotateX(2deg) rotateY(-3deg);
        transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.5s ease;
        /* Layered Shadow untuk efek melayang 3D */
        box-shadow: 
            0 10px 20px rgba(0, 0, 0, 0.12),
            0 20px 35px rgba(0, 0, 0, 0.15),
            -10px 15px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    /* Efek Hover 3D */
    .image-3d-wrapper:hover .image-3d-card {
        transform: rotateX(0deg) rotateY(0deg) translateZ(10px) translateY(-8px);
        box-shadow: 
            0 20px 30px rgba(0, 0, 0, 0.18),
            0 30px 50px rgba(0, 0, 0, 0.22),
            0 0 25px rgba(40, 167, 69, 0.25); /* Glow hijau halus */
    }

    /* Efek Zoom Gambar */
    .image-3d-card img {
        transition: transform 0.6s ease;
    }
    .image-3d-wrapper:hover .image-3d-card img {
        transform: scale(1.05);
    }

    /* Overlay Caption Gambar Utama */
    .image-caption-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.4) 60%, transparent 100%);
        color: #ffffff;
        padding: 1.5rem 1.25rem 1rem 1.25rem;
        transform: translateZ(20px);
    }

    .image-caption-title {
        font-family: var(--font-heading);
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.2rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .image-caption-sub {
        font-size: 0.825rem;
        color: rgba(255, 255, 255, 0.85);
        margin: 0;
    }

    /* Styling Card Galeri Atraksi & Hiburan */
    .attraction-card {
        border-radius: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.08);
        background: #ffffff;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .attraction-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        border-color: rgba(40, 167, 69, 0.3);
    }

    .attraction-img-wrapper {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .attraction-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .attraction-card:hover .attraction-img-wrapper img {
        transform: scale(1.08);
    }

    .attraction-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(4px);
        color: #fff;
        font-size: 0.75rem;
        padding: 0.25rem 0.6rem;
        border-radius: 20px;
        font-weight: 500;
    }
</style>

<section class="page-section">
    <div class="container">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb breadcrumb-nature">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('destinations') }}">Destinations</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $destinasi->nama }}</li>
            </ol>
        </nav>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="alert-nature-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            {{-- Gambar destinasi bergaya 3D --}}
            <div class="col-lg-6" data-reveal>
                <div class="image-3d-wrapper">
                    <div class="image-3d-card">
                        <img src="{{ asset('images/' . $destinasi->gambar) }}"
                             class="img-fluid w-100 detail-gambar-utama"
                             style="object-fit: cover; max-height: 480px;"
                             alt="{{ $destinasi->nama }}">

                        {{-- Badge Status Buka/Tutup --}}
                        <span class="status-badge {{ $statusSekarang == 'Buka' ? 'status-buka' : 'status-tutup' }}" style="top: 16px; left: 16px; transform: translateZ(25px);">
                            <i class="bi {{ $statusSekarang == 'Buka' ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                            {{ $statusSekarang == 'Buka' ? 'Sedang Buka' : 'Sedang Tutup' }}
                        </span>

                        {{-- Overlay Keterangan / Caption Gambar Utama --}}
                        <div class="image-caption-overlay">
                            <div class="image-caption-title">
                                {{ $destinasi->nama }}
                            </div>
                            <p class="image-caption-sub">
                                {{ $destinasi->caption_gambar ?? 'Pemandangan utama dari atraksi wisata ' . $destinasi->nama . ' di ' . $destinasi->lokasi }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <a href="https://wa.me/?text={{ urlencode('Lihat destinasi ' . $destinasi->nama . ' di sini: ' . request()->url()) }}"
                       target="_blank" class="btn-nature btn-nature-sm">
                        <i class="bi bi-whatsapp"></i> Bagikan
                    </a>
                    <button type="button" class="btn-nature-outline-soft btn-nature-sm"
                            onclick="navigator.clipboard.writeText('{{ request()->url() }}'); this.innerText='Tersalin!'">
                        <i class="bi bi-link-45deg"></i> Salin Link
                    </button>
                </div>
            </div>

            {{-- Info destinasi --}}
            <div class="col-lg-6" data-reveal>
                <span class="section-eyebrow"><i class="bi bi-geo-alt-fill"></i> Destinasi Wisata</span>
                <h1 class="fw-bold mb-3" style="font-family: var(--font-heading); font-size: clamp(1.8rem, 3vw, 2.4rem);">{{ $destinasi->nama }}</h1>

                <p class="text-secondary fs-6">
                    {{ $destinasi->deskripsi }}
                </p>

                <ul class="list-group list-group-flush detail-info-list mb-4">
                    {{-- Harga Tiket Masuk --}}
                    <li class="list-group-item d-flex align-items-center gap-2">
                        <i class="bi bi-ticket-perforated fs-5 text-success"></i>
                        <div>
                            <div class="fw-semibold" style="font-family: var(--font-heading);">Harga Tiket Masuk</div>
                            <div class="text-secondary small">
                                @if (isset($destinasi->harga) && $destinasi->harga > 0)
                                    <span class="fw-bold text-success fs-6">Rp {{ number_format($destinasi->harga, 0, ',', '.') }}</span> / orang
                                @else
                                    <span class="badge bg-success-subtle text-success fw-bold">Gratis</span>
                                @endif
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item d-flex align-items-center gap-2">
                        <i class="bi bi-clock fs-5"></i>
                        <div>
                            <div class="fw-semibold" style="font-family: var(--font-heading);">Jam Operasional</div>
                            <div class="text-secondary small">{{ $destinasi->jam_buka }}.00 - {{ $destinasi->jam_tutup }}.00</div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center gap-2">
                        <i class="bi bi-geo-alt fs-5"></i>
                        <div>
                            <div class="fw-semibold" style="font-family: var(--font-heading);">Lokasi</div>
                            <div class="text-secondary small">{{ $destinasi->lokasi }}</div>
                        </div>
                    </li>
                </ul>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('destinations') }}" class="btn-nature-outline-soft">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('beranda') }}#kontak" class="btn-nature">
                        <i class="bi bi-envelope"></i> Hubungi Kami
                    </a>

                    {{-- Tombol admin: Edit & Hapus hanya tampil jika login --}}
                    @auth
                        <div class="ms-auto d-flex gap-2">
                            <a href="{{ route('destinations.edit', $destinasi->id) }}" class="btn-nature-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('destinations.destroy', $destinasi->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-nature-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- SEKSYEN BARU: GALERI ATRAKSI & HIBURAN PADA DESTINASI INI --}}
        {{-- ========================================================= --}}
        <div class="mt-5 pt-3" data-reveal>
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="section-eyebrow"><i class="bi bi-controller"></i> Aktivitas & Hiburan</span>
                    <h3 class="fw-bold m-0" style="font-family: var(--font-heading);">Atraksi & Hiburan Tersedia</h3>
                </div>
                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill d-none d-md-inline-block">
                    <i class="bi bi-sparkles me-1"></i> Pengalaman Seru
                </span>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                {{-- Opsi 1: Jika Ada Data Atraksi/Galeri dari Database --}}
                @if(isset($destinasi->atraksi) && count($destinasi->atraksi) > 0)
                    @foreach($destinasi->atraksi as $item)
                        <div class="col">
                            <div class="attraction-card">
                                <div class="attraction-img-wrapper">
                                    <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}">
                                    <span class="attraction-badge">{{ $item->kategori ?? 'Atraksi Wisata' }}</span>
                                </div>
                                <div class="p-3 d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold mb-1" style="font-family: var(--font-heading);">{{ $item->nama }}</h6>
                                    <p class="text-secondary small mb-0 flex-grow-1">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                {{-- Opsi 2: Fallback Sampel Atraksi (Apabila belum ada tabel relasi atraksi) --}}
                @else
                    <div class="col">
                        <div class="attraction-card">
                            <div class="attraction-img-wrapper">
                                <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="Spot Foto Panorama">
                                <span class="attraction-badge"><i class="bi bi-camera"></i> Spot Foto</span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h6 class="fw-bold mb-1" style="font-family: var(--font-heading);">Spot Foto Panorama 360°</h6>
                                <p class="text-secondary small mb-0 flex-grow-1">
                                    Nikmati sudut pemandangan keindahan alam {{ $destinasi->nama }} terbaik dari gardu pandang favorit pengunjung.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="attraction-card">
                            <div class="attraction-img-wrapper">
                                <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="Wahana Rekreasi">
                                <span class="attraction-badge"><i class="bi bi-compass"></i> Petualangan</span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h6 class="fw-bold mb-1" style="font-family: var(--font-heading);">Jelajah Area & Outbound</h6>
                                <p class="text-secondary small mb-0 flex-grow-1">
                                    Kegiatan luar ruangan seru seperti trekking santai dan area outbond yang aman untuk keluarga dan grup.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="attraction-card">
                            <div class="attraction-img-wrapper">
                                <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="Area Santai">
                                <span class="attraction-badge"><i class="bi bi-cup-hot"></i> Hiburan Santai</span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h6 class="fw-bold mb-1" style="font-family: var(--font-heading);">Area Santai & Kuliner Local</h6>
                                <p class="text-secondary small mb-0 flex-grow-1">
                                    Nikmati suguhan kuliner khas daerah sekitar lokasi {{ $destinasi->nama }} sambil bersantai di gazebo.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Peta lokasi --}}
        <div class="mt-5" data-reveal>
            <h5 class="mb-3 fw-bold" style="font-family: var(--font-heading);"><i class="bi bi-map text-primary" style="color: var(--sea-blue) !important;"></i> Lokasi di Peta</h5>
            <div class="ratio ratio-21x9 overflow-hidden map-frame-nature">
                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($destinasi->lokasi) }}&output=embed"
                    style="border:0;" allowfullscreen loading="lazy">
                </iframe>
            </div>
        </div>

        {{-- Fasilitas --}}
        <div class="card-nature mt-5" data-reveal>
            <div class="card-nature-body">
                <h5 class="fw-bold mb-3" style="font-family: var(--font-heading);"><i class="bi bi-stars" style="color: var(--leaf-green);"></i> Fasilitas Tersedia</h5>
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col text-center p-3 facility-chip">
                        <i class="bi bi-p-circle fs-3 d-block mb-2"></i> Area Parkir
                    </div>
                    <div class="col text-center p-3 facility-chip">
                        <i class="bi bi-house-door fs-3 d-block mb-2"></i> Toilet Umum
                    </div>
                    <div class="col text-center p-3 facility-chip">
                        <i class="bi bi-shop fs-3 d-block mb-2"></i> Warung/Kios
                    </div>
                    <div class="col text-center p-3 facility-chip">
                        <i class="bi bi-camera fs-3 d-block mb-2"></i> Spot Foto
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection