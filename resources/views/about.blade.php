@extends('layouts.app')

@section('title', 'Sumatera Barat - Tentang Kami')

@section('content')

{{-- ============================= HERO ============================= --}}
<section class="hero-nature-sm">
    <div class="container">
        <span class="section-eyebrow"><i class="bi bi-info-circle"></i> Tentang Kami</span>
        <h1>KanjaBuzz</h1>
        <p>
            Adalah platform pariwisata yang menghadirkan informasi destinasi, aktivitas,
            kuliner, penginapan, serta berbagai rekomendasi wisata di Sumatera Barat. Kami berkomitmen
            membantu wisatawan menemukan pengalaman yang autentik, mudah diakses, dan berkesan.
        </p>
    </div>
</section>

{{-- ============================= PROFIL DAERAH ============================= --}}
<section class="region-section" id="profil-daerah">
    <div class="container">

        <div class="region-section-header" data-reveal>
            <span class="section-eyebrow"><i class="bi bi-map"></i> Profil Daerah</span>
            <h2 class="section-title">Mengenal Sumatera Barat</h2>
            <p class="section-subtitle mx-auto">
                Provinsi di pesisir barat Pulau Sumatra, rumah bagi budaya Minangkabau dan Mentawai
                dengan bentang alam pegunungan hingga kepulauan.
            </p>
        </div>

        @php
            $profilList = [
                ['icon' => 'bi-building', 'value' => 'Padang', 'label' => 'Ibu Kota Provinsi'],
                ['icon' => 'bi-rulers', 'value' => '± 42.012 km²', 'label' => 'Luas Wilayah'],
                ['icon' => 'bi-signpost-2', 'value' => '19', 'label' => 'Kabupaten & Kota (12 Kab, 7 Kota)'],
                ['icon' => 'bi-people', 'value' => 'Minangkabau & Mentawai', 'label' => 'Suku Mayoritas'],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($profilList as $index => $item)
            <div class="col-6 col-lg-3">
                <div class="profil-stat-card" data-reveal style="transition-delay: {{ $index * 0.08 }}s;">
                    <div class="profil-stat-icon"><i class="bi {{ $item['icon'] }}"></i></div>
                    <div class="profil-stat-value">{{ $item['value'] }}</div>
                    <div class="profil-stat-label">{{ $item['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================= SEJARAH DAERAH ============================= --}}
<section class="region-section" style="background: var(--white);" id="sejarah">
    <div class="container">

        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-reveal>
                <div class="sejarah-visual">
                    <img src="{{ asset('images/Istana Pagaruyuang.jpg') }}" alt="Istana Pagaruyung, Sumatera Barat">
                    <div class="sejarah-badge">
                        <i class="bi bi-hourglass-split"></i>
                        <div>
                            <div class="fw-semibold">Sejak Abad ke-14</div>
                            <div class="text-secondary" style="font-size: 0.8rem;">Kerajaan Pagaruyung</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-reveal style="transition-delay: 0.1s;">
                <span class="section-eyebrow"><i class="bi bi-clock-history"></i> Sejarah</span>
                <h2 class="section-title">Jejak Sejarah Sumatera Barat</h2>

                <div class="sejarah-text">
                    <p>
                        Wilayah ini dahulu menjadi pusat Kerajaan Pagaruyung, kerajaan Minangkabau yang berkembang
                        sejak abad ke-14 dan dikenal dengan sistem pemerintahan adat serta falsafah
                        <em>"Adat Basandi Syarak, Syarak Basandi Kitabullah"</em>.
                    </p>
                    <p>
                        Memasuki masa kolonial, kawasan ini menjadi wilayah penting jalur perdagangan Belanda,
                        sekaligus melahirkan tokoh-tokoh pergerakan nasional seperti Mohammad Hatta dan Tan Malaka.
                    </p>
                    <p>
                        Provinsi Sumatera Barat resmi terbentuk pada 31 Juli 1958 berdasarkan Undang-Undang No. 61
                        Tahun 1958, mewarisi kekayaan adat dan budaya Minangkabau yang masih hidup hingga sekarang.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ============================= BUDAYA (Gallery) ============================= --}}
<section class="region-section" id="budaya">
    <div class="container">

        <div class="region-section-header" data-reveal>
            <span class="section-eyebrow"><i class="bi bi-flower1"></i> Budaya</span>
            <h2 class="section-title">Kekayaan Budaya Minangkabau</h2>
            <p class="section-subtitle mx-auto">
                Tradisi dan kesenian yang masih dijaga secara turun-temurun oleh masyarakat Sumatera Barat.
            </p>
        </div>

        @php
            $budayaList = [
                ['nama' => 'Rumah Gadang', 'tag' => 'Arsitektur', 'desc' => 'Rumah adat beratap gonjong menyerupai tanduk kerbau, simbol filosofi matrilineal Minangkabau.', 'img' => 'Rumah Gadang.jpg'],
                ['nama' => 'Tari Piring', 'tag' => 'Kesenian', 'desc' => 'Tarian tradisional dengan properti piring, menggambarkan rasa syukur atas hasil panen.', 'img' => 'Tari Piring.jpg'],
                ['nama' => 'Silek Minang', 'tag' => 'Bela Diri', 'desc' => 'Seni bela diri tradisional yang menyatu dengan filosofi adat dan gerak randai.', 'img' => 'Silek Minang.jpg'],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($budayaList as $index => $item)
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card" data-reveal style="transition-delay: {{ $index * 0.08 }}s;">
                    <div class="gallery-card-img">
                        <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['nama'] }}">
                        <span class="gallery-card-tag">{{ $item['tag'] }}</span>
                    </div>
                    <div class="gallery-card-body">
                        <h3 class="gallery-card-title">{{ $item['nama'] }}</h3>
                        <p class="gallery-card-desc">{{ $item['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================= AKTIVITAS (Gallery) ============================= --}}
<section class="region-section" style="background: var(--white);" id="aktivitas">
    <div class="container">

        <div class="region-section-header" data-reveal>
            <span class="section-eyebrow"><i class="bi bi-compass"></i> Aktivitas</span>
            <h2 class="section-title">Aktivitas Populer Wisatawan</h2>
            <p class="section-subtitle mx-auto">
                Dari petualangan alam hingga wisata kuliner, ada banyak cara menikmati Sumatera Barat.
            </p>
        </div>

        @php
            $aktivitasList = [
                ['nama' => 'Trekking Ngarai Sianok', 'tag' => 'Petualangan', 'desc' => 'Menyusuri lembah curam di Bukittinggi dengan pemandangan tebing hijau yang dramatis.', 'img' => 'Tracking.jpg'],
                ['nama' => 'Surfing & Snorkeling Mentawai', 'tag' => 'Bahari', 'desc' => 'Menjajal ombak kelas dunia atau menyelam menikmati terumbu karang Kepulauan Mentawai.', 'img' => 'Snorkling.jpg'],
                ['nama' => 'Wisata Kuliner Khas Minang', 'tag' => 'Kuliner', 'desc' => 'Mencicipi rendang, sate padang, hingga kopi kawa daun langsung dari daerah asalnya.', 'img' => 'Wisata kuliner.jpg'],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($aktivitasList as $index => $item)
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card" data-reveal style="transition-delay: {{ $index * 0.08 }}s;">
                    <div class="gallery-card-img">
                        <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['nama'] }}">
                        <span class="gallery-card-tag">{{ $item['tag'] }}</span>
                    </div>
                    <div class="gallery-card-body">
                        <h3 class="gallery-card-title">{{ $item['nama'] }}</h3>
                        <p class="gallery-card-desc">{{ $item['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================= VISI & MISI ============================= --}}
<section class="about-section" id="about-section">
    <div class="container">

        <div class="row g-4 mb-5">
            <div class="col-md-6" data-reveal>
                <div class="visi-misi-card">
                    <div class="visi-misi-icon"><i class="bi bi-bullseye"></i></div>
                    <h3>Visi</h3>
                    <p>Menjadi platform digital terpercaya yang memperkenalkan pesona Sumatera Barat kepada wisatawan lokal maupun mancanegara.</p>
                </div>
            </div>
            <div class="col-md-6" data-reveal style="transition-delay: 0.08s;">
                <div class="visi-misi-card">
                    <div class="visi-misi-icon"><i class="bi bi-rocket-takeoff"></i></div>
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyediakan informasi wisata yang akurat dan terkini.</li>
                        <li>Memperkenalkan budaya dan kearifan lokal Sumatera Barat.</li>
                        <li>Mendukung promosi UMKM dan pelaku pariwisata lokal.</li>
                        <li>Memberikan inspirasi perjalanan yang aman dan menyenangkan.</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- ============================= KEUNGGULAN (Gallery) ============================= --}}
        <div class="text-center mb-4" data-reveal>
            <span class="section-eyebrow"><i class="bi bi-stars"></i> Keunggulan</span>
            <h2 class="section-title">Mengapa Memilih KanjaBuzz?</h2>
        </div>

        <div class="row row-cols-2 row-cols-md-3 g-4">
            @php
                $keunggulanList = [
                    ['icon' => 'bi-geo-alt', 'text' => 'Informasi destinasi lengkap'],
                    ['icon' => 'bi-map', 'text' => 'Rekomendasi itinerary perjalanan'],
                    ['icon' => 'bi-egg-fried', 'text' => 'Wisata kuliner khas Minangkabau'],
                    ['icon' => 'bi-tree', 'text' => 'Tempat wisata alam dan budaya'],
                    ['icon' => 'bi-camera', 'text' => 'Inspirasi aktivitas dan spot foto'],
                    ['icon' => 'bi-chat-dots', 'text' => 'Informasi yang mudah dipahami'],
                ];
            @endphp

            @foreach ($keunggulanList as $index => $item)
                <div class="col">
                    <div class="keunggulan-card" data-reveal style="transition-delay: {{ ($index % 3) * 0.08 }}s;">
                        <div class="keunggulan-icon-wrap">
                            <i class="bi {{ $item['icon'] }}"></i>
                        </div>
                        <p>{{ $item['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endsection