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
                Semua destinasi wisata pilihan di sekitar {{ $namaDaerah }}, lengkap dengan status buka/tutup secara real-time.
            </p>
        </div>

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

    </div>
</section>

    </div>
</section>

@endsection