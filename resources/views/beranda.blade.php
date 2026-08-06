@extends('layouts.app')

@section('title', 'Beranda - KanjaBuzz')

@section('content')

{{-- ============================= HERO ============================= --}}
<section class="hero-cinematic">
    <img src="{{ asset('images/Pasumpahan.jpg') }}" alt="Panorama Sumatera Barat" class="hero-cinematic-img">

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
            ['img' => 'Aul.jpeg', 'caption' => 'Mimin cantik'],
            ['img' => 'Mentawai 1.jpeg', 'caption' => 'Pulau Tuapejat'],
            ['img' => 'Mentawai 2.jpeg', 'caption' => 'Suku Mentawai'],
            ['img' => 'Jokowi.jpg', 'caption' => 'Hidup Jokowiii'],
            ['img' => 'Ngarai-Sianok 1.jpeg', 'caption' => 'Ngarai Sianok'],
            ['img' => 'Mentawai Tengkorak.jpeg', 'caption' => 'UMA'],
            ['img' => 'Pulau Awera Mentawai.jpeg', 'caption' => 'Pulau Awera'],
            ['img' => 'Wowo.jpg', 'caption' => 'Pria Sawit'],
            ['img' => 'Suku Mentawai.jpeg', 'caption' => 'Pemandangan Suku Mentawai'],
            ['img' => 'kubi.gif', 'caption' => 'Pentol'],

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
                [
                    'nama' => 'Mr. Prabowo Subianto', 
                    'peran' => 'Presiden RI 8, Jakarta', 
                    'teks' => 'Perjalanan ke Mentawai bersama KanjaBuzz benar-benar tak terlupakan — pemandunya ramah dan sangat paham budaya lokal.',
                    'foto' => 'Wowo.jpg' // TAMBAHKAN INI
                ],
                [
                    'nama' => 'Jokowi Dodo', 
                    'peran' => 'Presiden RI 7, Belanda', 
                    'teks' => 'Ngarai Sianok jadi jauh lebih berkesan karena ceritanya disampaikan dengan detail oleh pemandu lokal kami.',
                    'foto' => 'Jokowi.jpg' // TAMBAHKAN INI
                ],
                [
                    'nama' => 'Megawati Soekarno Putri', 
                    'peran' => 'Presiden RI 5, Spanyol', 
                    'teks' => 'Paket Petualangan Lengkap sepadan dengan harganya — semua terorganisir rapi dari awal sampai akhir.',
                    'foto' => 'Megachan.jpg' // TAMBAHKAN INI
                ],
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
                        {{-- UBAH BAGIAN INI --}}
                        <div class="testimonial-avatar flex-shrink-0">
                            @if(isset($t['foto']) && !empty($t['foto']))
                                <img src="{{ asset('images/' . $t['foto']) }}" alt="Foto {{ $t['nama'] }}" class="img-fluid rounded-circle">
                            @else
                                {{-- Fallback jika foto tidak ada --}}
                                <div class="testimonial-avatar-fallback d-flex align-items-center justify-content-center" style="background: var(--leaf-green); color: var(--white); font-family: var(--font-heading); font-weight: 600; width: 100%; height: 100%; border-radius: 50%;">
                                    {{ strtoupper(substr($t['nama'], 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        {{-- SELESAI UBAH BAGIAN INI --}}
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