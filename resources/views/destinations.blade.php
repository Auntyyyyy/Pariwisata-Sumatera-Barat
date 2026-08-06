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

{{-- ============================= HERO CAROUSEL ============================= --}}
<section class="hc-hero" id="destHero">

    @php
        $heroSlides = [];
        foreach ($destinasiList as $d) {
            if (count($heroSlides) >= 5) break;
            $heroSlides[] = [
                'img'  => $d->gambar,
                'nama' => $d->nama,
                'desc' => \Illuminate\Support\Str::limit($d->deskripsi, 90),
                'link' => route('destinations.detail', $d->id),
            ];
        }
        $totalDestinasi = $destinasiList->total() ?? count($heroSlides);
    @endphp

    <div class="hc-media">
        @if (count($heroSlides) > 0)
            <div class="hc-slides">
                @foreach ($heroSlides as $index => $slide)
                <div class="hc-slide {{ $index === 0 ? 'is-active' : '' }}" data-index="{{ $index }}">
                    <div class="hc-slide-img" style="background-image: url('{{ asset('images/' . $slide['img']) }}');"></div>
                    <div class="hc-slide-overlay"></div>
                </div>
                @endforeach
            </div>
        @else
            <div class="hc-slide is-active">
                <div class="hc-slide-img hc-slide-fallback"></div>
                <div class="hc-slide-overlay"></div>
            </div>
        @endif
    </div>

    <div class="hc-content container">
        <span class="section-eyebrow"><i class="bi bi-compass"></i> {{ $ucapan }}</span>
        <h1 class="hc-title">Destinations</h1>
        <p class="hc-desc">
            Semua destinasi wisata pilihan di sekitar {{ $namaDaerah }}.
            @if ($totalDestinasi > 0)
               sekarang baru <strong>{{ $totalDestinasi }}</strong> sihh, gakk tau kalau besok.
            @endif
        </p>

        @if (count($heroSlides) > 0)
        <a href="{{ $heroSlides[0]['link'] }}" class="hc-caption-box" id="hcCaptionLink">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
                <div class="hc-caption-location" id="hcDestName">{{ $heroSlides[0]['nama'] }}</div>
                <div class="hc-caption-text" id="hcDestDesc">{{ $heroSlides[0]['desc'] }}</div>
            </div>
            <i class="bi bi-arrow-up-right hc-caption-go"></i>
        </a>
        @endif
    </div>

    @if (count($heroSlides) > 1)
    {{-- Prev / Next --}}
    <button class="hc-arrow hc-arrow-prev" id="hcPrev" aria-label="Slide sebelumnya">
        <i class="bi bi-chevron-left"></i>
    </button>
    <button class="hc-arrow hc-arrow-next" id="hcNext" aria-label="Slide berikutnya">
        <i class="bi bi-chevron-right"></i>
    </button>

    {{-- Dots + progress --}}
    <div class="hc-dots" id="hcDots">
        @foreach ($heroSlides as $index => $slide)
        <button class="hc-dot {{ $index === 0 ? 'is-active' : '' }}" data-goto="{{ $index }}" aria-label="Ke slide {{ $index + 1 }}">
            <span class="hc-dot-progress"></span>
        </button>
        @endforeach
    </div>
    @endif

    {{-- Search bar melayang, overlap ke section berikutnya --}}
    <div class="hc-search-float">
        <form action="{{ route('destinations') }}" method="GET" class="hc-search-form">
            <i class="bi bi-search"></i>
            <input type="text" name="cari" placeholder="Cari nama destinasi..." value="{{ $keyword ?? '' }}">
            <button type="submit">
                Cari <i class="bi bi-arrow-right"></i>
            </button>
        </form>
    </div>

</section>

<style>
    .hc-hero {
        position: relative;
        min-height: 78vh;
        display: flex;
        align-items: center;
        color: #fff;
        isolation: isolate;
    }

    /* ---------- Media layer (yang boleh di-clip) ---------- */
    .hc-media {
        position: absolute;
        inset: 0;
        overflow: hidden;
        clip-path: polygon(0 0, 100% 0, 100% 97%, 0 100%);
        z-index: 0;
    }

    /* ---------- Slides ---------- */
    .hc-slides { position: absolute; inset: 0; }

    .hc-slide {
        position: absolute; inset: 0;
        opacity: 0;
        visibility: hidden;
        transition: opacity 1.1s ease;
        z-index: 0;
    }
    .hc-slide.is-active { opacity: 1; visibility: visible; z-index: 1; }

    .hc-slide-img {
        position: absolute; inset: -20px;
        background-size: cover;
        background-position: center;
        transform: scale(1.08);
        transition: transform 8s ease-out;
    }
    .hc-slide.is-active .hc-slide-img { transform: scale(1); }

    .hc-slide-fallback {
        background: linear-gradient(135deg, #0b332f 0%, #1d6e64 60%, #2a8a7c 100%);
    }

    .hc-slide-overlay {
        position: absolute; inset: 0;
        background:
            linear-gradient(135deg, rgba(10,45,42,0.92) 0%, rgba(15,63,58,0.85) 45%, rgba(20,80,72,0.7) 100%),
            radial-gradient(circle at 85% 15%, rgba(217,164,65,0.18), transparent 55%);
    }

    /* ---------- Content ---------- */
    .hc-content { position: relative; z-index: 2; text-align: center; padding: 0 1rem; }

    .hc-content .section-eyebrow {
        color: #fff;
        background: rgba(255,255,255,0.12);
        border-color: rgba(255,255,255,0.25);
    }

    .hc-title {
        font-size: clamp(2.6rem, 6vw, 4.2rem);
        font-weight: 800;
        margin: 1rem 0 1.25rem;
        letter-spacing: -0.02em;
        color: #fff;
    }

    .hc-desc {
        max-width: 720px;
        margin: 0 auto 2rem;
        font-size: 1.08rem;
        line-height: 1.7;
        color: rgba(255,255,255,0.88);
    }

    .hc-caption-box {
        display: inline-flex;
        align-items: center;
        gap: 0.85rem;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.18);
        backdrop-filter: blur(10px);
        padding: 0.75rem 1.25rem;
        border-radius: 999px;
        text-align: left;
        max-width: 92vw;
        text-decoration: none;
        transition: background 0.2s ease, transform 0.2s ease;
    }
    .hc-caption-box:hover { background: rgba(255,255,255,0.16); transform: translateY(-2px); }
    .hc-caption-box i { font-size: 1.2rem; color: #d9a441; flex-shrink: 0; }
    .hc-caption-location { font-weight: 700; font-size: 0.92rem; color: #fff; }
    .hc-caption-text {
        font-size: 0.82rem;
        color: rgba(255,255,255,0.75);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 320px;
    }
    .hc-caption-go { color: rgba(255,255,255,0.6) !important; font-size: 1rem !important; margin-left: 0.25rem; }

    /* ---------- Arrows ---------- */
    .hc-arrow {
        position: absolute;
        top: 44%;
        transform: translateY(-50%);
        z-index: 3;
        width: 46px; height: 46px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,0.25);
        background: rgba(255,255,255,0.08);
        color: #fff;
        backdrop-filter: blur(8px);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        transition: background 0.25s ease, transform 0.25s ease;
    }
    .hc-arrow:hover { background: rgba(255,255,255,0.22); transform: translateY(-50%) scale(1.08); }
    .hc-arrow-prev { left: clamp(0.75rem, 3vw, 2.5rem); }
    .hc-arrow-next { right: clamp(0.75rem, 3vw, 2.5rem); }

    @media (max-width: 767.98px) {
        .hc-arrow { display: none; }
    }

    /* ---------- Dots + progress ---------- */
    .hc-dots {
        position: absolute;
        bottom: clamp(6.5rem, 14vh, 8.5rem);
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.5rem;
        z-index: 3;
    }
    .hc-dot {
        position: relative;
        width: 38px; height: 5px;
        border-radius: 999px;
        background: rgba(255,255,255,0.25);
        overflow: hidden;
        border: none;
        padding: 0;
    }
    .hc-dot-progress {
        position: absolute; inset: 0;
        width: 0%;
        background: #d9a441;
        border-radius: 999px;
    }
    .hc-dot.is-active .hc-dot-progress { animation: hcProgress 6s linear forwards; }
    .hc-dot:not(.is-active) .hc-dot-progress { width: 0; }

    @keyframes hcProgress {
        from { width: 0%; }
        to { width: 100%; }
    }

    /* ---------- Search bar melayang (overlap) ---------- */
    .hc-search-float {
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translate(-50%, 50%);
        z-index: 5;
        width: min(640px, 92vw);
    }

    .hc-search-form {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        background: #fff;
        padding: 0.6rem 0.6rem 0.6rem 1.1rem;
        border-radius: 999px;
        box-shadow: 0 18px 40px rgba(11,51,47,0.18);
    }
    .hc-search-form i.bi-search { color: #1d6e64; font-size: 1.05rem; }
    .hc-search-form input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 0.95rem;
        color: #1a3b37;
        background: transparent;
    }
    .hc-search-form input::placeholder { color: #9aa8a5; }
    .hc-search-form button {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        border: none;
        background: #1d6e64;
        color: #fff;
        font-weight: 600;
        font-size: 0.88rem;
        padding: 0.65rem 1.15rem;
        border-radius: 999px;
        white-space: nowrap;
        transition: background 0.2s ease;
    }
    .hc-search-form button:hover { background: #145b53; }

    @media (max-width: 575.98px) {
        .hc-search-form button span { display: none; }
    }
</style>

<script>
    (function () {
        const slides   = document.querySelectorAll('#destHero .hc-slide');
        const dots     = document.querySelectorAll('#destHero .hc-dot');
        const prevBtn  = document.getElementById('hcPrev');
        const nextBtn  = document.getElementById('hcNext');
        const nameEl   = document.getElementById('hcDestName');
        const descEl   = document.getElementById('hcDestDesc');
        const linkEl   = document.getElementById('hcCaptionLink');
        const hero     = document.getElementById('destHero');

        if (!hero || slides.length <= 1) return;

        const slideData = @json($heroSlides);

        let current = 0;
        let autoplayTimer = null;
        const AUTOPLAY_MS = 6000;

        function goTo(index) {
            index = (index + slides.length) % slides.length;

            slides[current].classList.remove('is-active');
            dots[current]?.classList.remove('is-active');

            current = index;

            slides[current].classList.add('is-active');
            dots[current]?.classList.add('is-active');

            if (slideData[current]) {
                if (nameEl) nameEl.textContent = slideData[current].nama;
                if (descEl) descEl.textContent = slideData[current].desc;
                if (linkEl) linkEl.setAttribute('href', slideData[current].link);
            }

            restartAutoplay();
        }

        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function restartAutoplay() {
            clearInterval(autoplayTimer);
            autoplayTimer = setInterval(next, AUTOPLAY_MS);
        }

        nextBtn?.addEventListener('click', next);
        prevBtn?.addEventListener('click', prev);

        dots.forEach((dot) => {
            dot.addEventListener('click', () => goTo(parseInt(dot.dataset.goto, 10)));
        });

        hero.addEventListener('mouseenter', () => clearInterval(autoplayTimer));
        hero.addEventListener('mouseleave', restartAutoplay);

        let touchStartX = 0;
        hero.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        hero.addEventListener('touchend', (e) => {
            const diff = e.changedTouches[0].screenX - touchStartX;
            if (Math.abs(diff) > 40) {
                diff > 0 ? prev() : next();
            }
        }, { passive: true });

        restartAutoplay();
    })();
</script>

{{-- ============================= LIST DESTINASI ============================= --}}
<section class="page-section" style="padding-top: 6.5rem;">
    <div class="container">

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