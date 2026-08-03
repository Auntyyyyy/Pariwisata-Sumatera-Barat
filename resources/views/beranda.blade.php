@extends('layouts.app')

@section('title', 'Beranda - KanjaBuzz')

@section('content')

{{-- ============================= HERO ============================= --}}
<section class="hero-nature">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-6 hero-content">
                <span class="section-eyebrow">
                    <i class="bi bi-geo-alt-fill"></i> SUmatera Barat, Indonesia
                </span>
                <h1 class="hero-title">
                    Jelajahi Keindahan<br> Alam Sumatera Barat
                </h1>
                <p class="hero-subtitle">
                    Dari sungai yang tenang hingga hutan kota yang rimbun — temukan destinasi wisata terbaik
                    yang jarang diketahui orang, dipandu langsung oleh warga lokal.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('destinations') }}" class="btn-nature">
                        Mulai Jelajah <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('about') }}" class="btn-outline-nature">
                        Tentang Kami
                    </a>
                </div>

                <div class="hero-stats">
                    <div>
                        <div class="hero-stat-number">40+</div>
                        <div class="hero-stat-label">Destinasi</div>
                    </div>
                    <div>
                        <div class="hero-stat-number">12k</div>
                        <div class="hero-stat-label">Wisatawan</div>
                    </div>
                    <div>
                        <div class="hero-stat-number">4.8★</div>
                        <div class="hero-stat-label">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= GALLERY BERJALAN ============================= --}}
<section class="marquee-section">
    <div class="container">

        <div class="gallery-header" data-reveal>
            <span class="section-eyebrow"><i class="bi bi-images"></i> Galeri Destinasi</span>
            <h2 class="section-title">Destinasi Pilihan Wisatawan</h2>
            <p class="section-subtitle mx-auto">
                Kumpulan tempat wisata alam dan budaya terbaik di Sumatera Barat yang wajib kamu kunjungi.
            </p>
        </div>
    </div>

    @php
        // Foto statis — silakan ganti nama file & caption sesuai kebutuhan.
        // Tidak diambil dari database, cukup edit array ini.
        $galeriFoto = [
            ['img' => 'Maninjau 1.jpeg', 'caption' => 'Kelok 44'],
            ['img' => 'Mentawai 1.jpeg', 'caption' => 'Pulau Tuapejat'],
            ['img' => 'Mentawai 2.jpeg', 'caption' => 'Suku Mentawai'],
            ['img' => 'Ngarai-Sianok 1.jpeg', 'caption' => 'Ngarai Sianok'],
            ['img' => 'MEntawai Tengkorak.jpeg', 'caption' => 'UMA'],
            ['img' => 'Pulau Awera Mentawai.jpeg', 'caption' => 'Pulau Awera'],
            ['img' => 'Suku Mentawai.jpeg', 'caption' => 'Pemandangan Suku Mentawai'],
        ];
    @endphp

    <div class="marquee-viewport" data-reveal>
        <div class="marquee-track">
            {{-- Set pertama --}}
            @foreach ($galeriFoto as $foto)
            <div class="marquee-item">
                <img src="{{ asset('images/' . $foto['img']) }}" alt="{{ $foto['caption'] }}">
                <span class="marquee-item-caption">{{ $foto['caption'] }}</span>
            </div>
            @endforeach

            {{-- Set kedua (duplikat) — wajib ada supaya animasi loop terlihat mulus tanpa jeda --}}
            @foreach ($galeriFoto as $foto)
            <div class="marquee-item">
                <img src="{{ asset('images/' . $foto['img']) }}" alt="{{ $foto['caption'] }}">
                <span class="marquee-item-caption">{{ $foto['caption'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection