@extends('layouts.app')

@section('title', 'Beranda - KanjaBuzz')

@section('content')

{{-- ============================= HERO SINEMATIK ============================= --}}
<section class="hero-cinematic">
    <img src="{{ asset('images/Sumbar.jpg') }}" alt="Panorama Sumatera Barat" class="hero-cinematic-img">

    <div class="container hero-cinematic-content">
        <span class="hero-cinematic-eyebrow"><i class="bi bi-compass"></i> Sumatera Barat, Indonesia</span>
        <h1 class="hero-cinematic-title">Jelajahi Keindahan<br>Alam Sumatera Barat</h1>
        <p class="hero-cinematic-subtitle">
            Dari lembah curam hingga kepulauan tersembunyi — temukan cerita di balik setiap destinasi,
            dipandu langsung oleh warga lokal.
        </p>
        <div class="hero-cinematic-actions">
            <a href="{{ route('destinations') }}" class="btn-editorial">
                Mulai Jelajah <i class="bi bi-arrow-right"></i>
            </a>
            <a href="{{ route('about') }}" class="btn-editorial-outline">
                Tentang Kami
            </a>
        </div>
    </div>

    <div class="hero-cinematic-scroll">Scroll</div>
</section>

{{-- ============================= STORYTELLING ============================= --}}
<section class="storytelling-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-12 col-lg-5" data-reveal>
                <div class="storytelling-media">
                    <img src="{{ asset('images/Sumbar.jpg') }}" alt="Kehidupan masyarakat Minangkabau">
                    <div class="storytelling-media-tag">
                        <i class="bi bi-quote"></i> Sejak generasi ke generasi
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7" data-reveal style="transition-delay: 0.1s;">
                <span class="eyebrow-editorial">Cerita Kami</span>
                <h2 class="section-title-editorial">Lebih dari Sekadar Perjalanan</h2>

                <p class="storytelling-quote">
                    "Setiap lembah, setiap rumah gadang, menyimpan cerita yang layak didengar —
                    bukan sekadar dilihat."
                </p>

                <div class="storytelling-body">
                    <p>
                        KanjaBuzz lahir dari kecintaan pada Sumatera Barat — provinsi yang menyimpan
                        kekayaan alam dan budaya Minangkabau yang jarang tersentuh wisata massal.
                    </p>
                    <p>
                        Kami menghubungkan wisatawan dengan pemandu lokal, pelaku UMKM, dan komunitas adat,
                        sehingga setiap perjalanan memberi dampak nyata bagi daerah yang dikunjungi.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================= PETA INTERAKTIF ============================= --}}
<section class="map-section">
    <div class="container">

        <div class="text-center mb-5" data-reveal>
            <span class="eyebrow-editorial" style="justify-content: center;">Peta Wisata</span>
            <h2 class="section-title-editorial">Temukan Lokasinya</h2>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-8" data-reveal>
                <div class="map-frame-editorial ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps?q={{ urlencode('Sumatera Barat, Indonesia') }}&output=embed"
                        style="border:0;" allowfullscreen loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="col-12 col-lg-4" data-reveal style="transition-delay: 0.1s;">
                <div class="map-legend">
                    <h3 class="mb-3" style="font-size: 1.05rem;">Wilayah Populer</h3>

                    <div class="map-legend-item">
                        <span class="map-legend-dot"></span>
                        <div>
                            <div class="fw-semibold" style="font-family: var(--font-heading); font-size: 0.92rem;">Bukittinggi & Agam</div>
                            <div class="text-secondary small">Ngarai, danau, udara sejuk pegunungan</div>
                        </div>
                    </div>
                    <div class="map-legend-item">
                        <span class="map-legend-dot" style="background: var(--sea-blue);"></span>
                        <div>
                            <div class="fw-semibold" style="font-family: var(--font-heading); font-size: 0.92rem;">Kepulauan Mentawai</div>
                            <div class="text-secondary small">Ombak kelas dunia & budaya suku asli</div>
                        </div>
                    </div>
                    <div class="map-legend-item">
                        <span class="map-legend-dot" style="background: var(--accent-gold);"></span>
                        <div>
                            <div class="fw-semibold" style="font-family: var(--font-heading); font-size: 0.92rem;">Kota Padang</div>
                            <div class="text-secondary small">Kuliner khas & gerbang menuju provinsi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ============================= PAKET TUR ============================= --}}
<section class="package-section">
    <div class="container">

        <div class="text-center mb-5" data-reveal>
            <span class="eyebrow-editorial" style="justify-content: center;">Paket Tur</span>
            <h2 class="section-title-editorial">Pilih Paket Perjalananmu</h2>
        </div>

        @php
            $paketList = [
                [
                    'nama' => 'Jelajah Singkat', 'durasi' => '2 Hari 1 Malam', 'harga' => '850.000',
                    'fitur' => ['Pemandu lokal', 'Transportasi dalam kota', '1x makan khas Minang'],
                    'featured' => false,
                ],
                [
                    'nama' => 'Petualangan Lengkap', 'durasi' => '4 Hari 3 Malam', 'harga' => '2.450.000',
                    'fitur' => ['Pemandu lokal', 'Transportasi & penginapan', 'Semua makan disertakan', 'Kunjungan ke 5 destinasi utama'],
                    'featured' => true,
                ],
                [
                    'nama' => 'Ekspedisi Mentawai', 'durasi' => '5 Hari 4 Malam', 'harga' => '3.900.000',
                    'fitur' => ['Kapal & pemandu lokal', 'Penginapan tepi pantai', 'Aktivitas surfing/snorkeling'],
                    'featured' => false,
                ],
            ];
        @endphp

        <div class="row g-4 align-items-center">
            @foreach ($paketList as $index => $paket)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="package-card {{ $paket['featured'] ? 'featured' : '' }}" data-reveal style="transition-delay: {{ $index * 0.1 }}s;">
                    @if ($paket['featured'])
                        <span class="package-badge">Paling Diminati</span>
                    @endif

                    <h3 style="font-size: 1.2rem; margin-bottom: 4px;">{{ $paket['nama'] }}</h3>
                    <div class="package-duration">{{ $paket['durasi'] }}</div>

                    <div class="package-price">
                        Rp {{ $paket['harga'] }} <span>/ orang</span>
                    </div>

                    <ul class="package-list">
                        @foreach ($paket['fitur'] as $fitur)
                        <li><i class="bi bi-check-circle-fill"></i> {{ $fitur }}</li>
                        @endforeach
                    </ul>

                    <a href="{{ route('beranda') }}#pesan-form" class="btn-editorial w-100 justify-content-center" style="{{ $paket['featured'] ? 'background: var(--accent-gold); color: var(--ink);' : '' }}">
                        Pesan Sekarang <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================= GALERI BERJALAN ============================= --}}
<section class="marquee-section">
    <div class="container">
        <div class="gallery-header" data-reveal>
            <span class="eyebrow-editorial" style="justify-content: center;"><i class="bi bi-images"></i> Galeri</span>
            <h2 class="section-title-editorial">Momen di Sumatera Barat</h2>
        </div>
    </div>

    @php
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
            @foreach ($galeriFoto as $foto)
            <div class="marquee-item">
                <img src="{{ asset('images/' . $foto['img']) }}" alt="{{ $foto['caption'] }}">
                <span class="marquee-item-caption">{{ $foto['caption'] }}</span>
            </div>
            @endforeach

            @foreach ($galeriFoto as $foto)
            <div class="marquee-item">
                <img src="{{ asset('images/' . $foto['img']) }}" alt="{{ $foto['caption'] }}">
                <span class="marquee-item-caption">{{ $foto['caption'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= TESTIMONI ============================= --}}
<section class="testimonial-section">
    <div class="container">

        <div class="text-center mb-5" data-reveal>
            <span class="eyebrow-editorial" style="justify-content: center;">Testimoni</span>
            <h2 class="section-title-editorial">Kata Mereka yang Sudah Berkunjung</h2>
        </div>

        @php
            $testimoniList = [
                ['nama' => 'Mr. Prabowo Subianto', 'peran' => 'Presiden RI 8, Jakarta', 'teks' => 'Perjalanan ke Mentawai bersama KanjaBuzz benar-benar tak terlupakan — pemandunya ramah dan sangat paham budaya lokal.'],
                ['nama' => 'Jokowi dodo', 'peran' => 'Presiden RI 7, Belanda', 'teks' => 'Ngarai Sianok jadi jauh lebih berkesan karena ceritanya disampaikan dengan detail oleh pemandu lokal kami.'],
                ['nama' => 'Megawati Soekarno Putri', 'peran' => 'Presiden RI 5, Spanyol', 'teks' => 'Paket Petualangan Lengkap sepadan dengan harganya — semua terorganisir rapi dari awal sampai akhir.'],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($testimoniList as $index => $t)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="testimonial-card" data-reveal style="transition-delay: {{ $index * 0.1 }}s;">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"{{ $t['teks'] }}"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar d-flex align-items-center justify-content-center flex-shrink-0" style="background: var(--leaf-green); color: var(--white); font-family: var(--font-heading); font-weight: 600;">
                            {{ strtoupper(substr($t['nama'], 0, 1)) }}
                        </div>
                        <div>
                            <div class="testimonial-name">{{ $t['nama'] }}</div>
                            <div class="testimonial-role">{{ $t['peran'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================= CTA BOOKING ============================= --}}
<section class="cta-booking" id="pesan-form">
    <div class="container cta-booking-content" data-reveal>
        <span class="hero-cinematic-eyebrow" style="justify-content: center;">Mulai Perjalananmu</span>
        <h2 class="cta-booking-title">Siap Menjelajahi Sumatera Barat?</h2>
        <p class="cta-booking-subtitle">
            Hubungi tim kami untuk merancang perjalanan yang sesuai dengan waktu dan minatmu.
        </p>
        <a href="{{ route('contact') }}" class="btn-editorial">
            Pesan Sekarang <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</section>

@endsection