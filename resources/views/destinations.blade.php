<?php
$namaDaerah = "Sumatera Barat";
?>
<?php
date_default_timezone_set("Asia/Jakarta");
?>

@extends('layouts.app')

@section('title', 'Sumatera Barat - destinasi')

@section('content')

<?php
$jamsekarang = date("H");

if ($jamsekarang < 10) {
    $ucapan = "Selamat pagi";
} elseif ($jamsekarang < 15) {
    $ucapan = "Selamat siang";
} elseif ($jamsekarang < 18) {
    $ucapan = "Selamat sore";
} else {
    $ucapan = "Selamat malam";
}
?>

<section class="page-section">
    <div class="container">

        <div class="page-header-nature" data-reveal>
            <span class="section-eyebrow"><i class="bi bi-compass"></i> {{ $ucapan }}</span>
            <h2 class="section-title">Destinations</h2>
            <p class="section-subtitle mx-auto">
                Semua destinasi wisata pilihan di sekitar {{ $namaDaerah }}.
            </p>
        </div>

        <form action="{{ route('destinations') }}" method="GET" class="search-bar-nature" data-reveal>
            <i class="bi bi-search"></i>
            <input type="text" name="cari" placeholder="Cari nama destinasi..." value="{{ $keyword ?? '' }}">
            <button type="submit">
                Cari <i class="bi bi-arrow-right"></i>
            </button>
        </form>

        <div class="row g-4">
            @forelse ($destinasiList as $index => $destinasi)
                <?php
                    // status buka/tutup dihitung per destinasi, dari jam_buka & jam_tutup di database
                    $jamBuka  = (int) $destinasi->jam_buka;
                    $jamTutup = (int) $destinasi->jam_tutup;

                    if ($jamsekarang >= $jamBuka && $jamsekarang < $jamTutup) {
                        $statusDestinasi = "Buka";
                    } else {
                        $statusDestinasi = "Tutup";
                    }
                ?>

                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card kartu" data-reveal style="transition-delay: {{ ($index % 3) * 0.08 }}s;">
                        <div class="gallery-card-img kartu-gambar">
                            <a href="{{ route('destinations.detail', $destinasi->id) }}">
                                <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="Foto {{ $destinasi->nama }}">
                            </a>
                            <span class="status-badge {{ strtolower(trim($statusDestinasi)) == 'buka' ? 'status-buka' : 'status-tutup' }}">
                                {{ $statusDestinasi }}
                            </span>
                        </div>

                        <div class="gallery-card-body">
                            <h3 class="gallery-card-title">{{ strtoupper($destinasi->nama) }}</h3>
                            <p class="gallery-card-desc">{{ Str::limit($destinasi->deskripsi, 100) }}</p>

                            <a href="{{ route('destinations.detail', $destinasi->id) }}" class="btn-nature btn-nature-sm w-100 justify-content-center btn-lihat">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-signpost-split" style="font-size: 2.4rem; color: var(--sea-blue);"></i>
                    <p class="text-secondary mt-3 mb-0">Belum ada destinasi yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center align-items-center gap-3 mt-5" data-reveal>

            @if ($destinasiList->onFirstPage())
                <span class="social-icon" style="opacity: 0.35; pointer-events: none;" aria-hidden="true">
                    <i class="bi bi-arrow-left"></i>
                </span>
            @else
                <a href="{{ $destinasiList->appends(['cari' => $keyword])->previousPageUrl() }}"
                   class="social-icon" aria-label="Halaman sebelumnya">
                    <i class="bi bi-arrow-left"></i>
                </a>
            @endif

            <span class="text-secondary" style="font-family: var(--font-heading); font-weight: 600; font-size: 0.88rem;">
                {{ $destinasiList->currentPage() }} / {{ $destinasiList->lastPage() }}
            </span>

            @if ($destinasiList->hasMorePages())
                <a href="{{ $destinasiList->appends(['cari' => $keyword])->nextPageUrl() }}"
                   class="social-icon" aria-label="Halaman berikutnya">
                    <i class="bi bi-arrow-right"></i>
                </a>
            @else
                <span class="social-icon" style="opacity: 0.35; pointer-events: none;" aria-hidden="true">
                    <i class="bi bi-arrow-right"></i>
                </span>
            @endif

        </div>

    </div>
</section>

@endsection