<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','KanjaBuzz - Pekanbaru Wisata')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-kanja">
            <div class="container">
                <a class="navbar-brand kanja-brand" href="{{ route('beranda') }}">
                   🐝KanjaBuzz
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarMenu" aria-controls="navbarMenu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto gap-lg-2 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link kanja-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link kanja-link {{ request()->routeIs('destinations') ? 'active' : '' }}" href="{{ route('destinations') }}">Destinations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link kanja-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link kanja-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="footer-kanja text-secondary pb-3">
        <div class="container">
            <div class="row gy-4">

                <div class="col-md-4">
                    <div class="footer-brand">
                        🐝 KanjaBuzz
                    </div>
                    <p class="text-secondary small" style="max-width: 280px;">
                        Temukan pesona alam dan destinasi terbaik Sumatera Barat bersama kami — explore, enjoy, experience.
                    </p>
                </div>

                <div class="col-md-4">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('beranda') }}" class="footer-link text-secondary text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('destinations') }}" class="footer-link text-secondary text-decoration-none">Destinations</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}" class="footer-link text-secondary text-decoration-none">About</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="footer-link text-secondary text-decoration-none">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h6 class="mb-3">Ikuti Kami</h6>
                    <div class="d-flex gap-3 fs-5">
                        <a href="https://instagram.com/kanjengratu31_" target="_blank" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://facebook.com/inoyLaundry" target="_blank" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://wa.me/6282381236831" target="_blank" class="social-icon">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://twitter.com/fluffylaaa" target="_blank" class="social-icon">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="mt-5" style="border-color: #E2E8F0;">

            <div class="text-center text-secondary small">
                &copy; {{ date('Y') }} KanjaBuzz. All Rights Reserved. | Explore, Enjoy, Experience.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        // Scroll reveal — lightweight, no external library
        document.addEventListener('DOMContentLoaded', function () {
            const revealEls = document.querySelectorAll('[data-reveal]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            revealEls.forEach((el) => observer.observe(el));

            // Navbar shadow on scroll
            const navbar = document.querySelector('.navbar-kanja');
            window.addEventListener('scroll', function () {
                if (window.scrollY > 12) {
                    navbar.style.boxShadow = '0 4px 20px rgba(15, 23, 42, 0.06)';
                } else {
                    navbar.style.boxShadow = 'none';
                }
            });
        });
    </script>

    @yield('scripts')
</body>
</html>