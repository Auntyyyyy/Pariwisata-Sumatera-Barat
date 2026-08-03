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

        {{-- Flash message (opsional, kalau ada alert dari controller) --}}
        @if (session('success'))
            <div class="alert-nature-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            {{-- Gambar destinasi --}}
            <div class="col-lg-6" data-reveal>
                <div class="position-relative">
                    <img src="{{ asset('images/' . $destinasi->gambar) }}"
                         class="img-fluid rounded-4 shadow-sm w-100 detail-gambar-utama"
                         style="object-fit: cover; max-height: 480px;"
                         alt="{{ $destinasi->nama }}">

                    <span class="status-badge {{ $statusSekarang == 'Buka' ? 'status-buka' : 'status-tutup' }}" style="top: 16px; left: 16px;">
                        <i class="bi {{ $statusSekarang == 'Buka' ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                        {{ $statusSekarang == 'Buka' ? 'Sedang Buka' : 'Sedang Tutup' }}
                    </span>
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
                    <form action="{{ route('destinations.destroy', $destinasi->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-nature-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    {{-- Tombol admin: tampil hanya untuk user yang login/berwenang --}}
                    @auth
                        <a href="{{ route('destinations.edit', $destinasi->id) }}" class="btn-nature-warning ms-auto">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                    @endauth
                </div>
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