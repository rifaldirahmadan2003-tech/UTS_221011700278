<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ROOTSPACE | Urban Farming Academy')</title>
    <meta name="description" content="ROOTSPACE Urban Farming Academy - belajar urban farming, hidroponik, dan berkebun di rumah.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --root-dark: #102d20;
            --root-green: #b8e765;
            --root-text: #183a27;
            --root-bg: #f7f8f1;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 90px; }
        body { margin: 0; font-family: 'Inter', sans-serif; color: var(--root-text); background: var(--root-bg); }
        .root-navbar { position: sticky; top: 0; z-index: 1030; background: var(--root-dark); box-shadow: 0 3px 15px rgba(0,0,0,.08); }
        .root-navbar .navbar-brand { color: #fff !important; font-size: 1.2rem; font-weight: 800; letter-spacing: -.5px; line-height: 1.35; text-decoration: none; }
        .root-navbar .brand-highlight { color: var(--root-green) !important; }
        .root-navbar .brand-subtitle { display: block; color: #d0ddcf !important; font-size: .48rem; letter-spacing: 1.8px; font-weight: 700; }
        .root-navbar .nav-link { color: #fff !important; font-size: .85rem; font-weight: 600; padding: .65rem .7rem; transition: color .2s ease; }
        .root-navbar .nav-link:hover, .root-navbar .nav-link:focus { color: var(--root-green) !important; }
        .root-navbar .navbar-toggler { border-color: rgba(255,255,255,.35); }
        .root-navbar .navbar-toggler:focus { box-shadow: 0 0 0 .2rem rgba(184,231,101,.2); }
        .root-navbar .navbar-toggler-icon { filter: invert(1); }
        .root-navbar .btn-start { display: inline-block; border: 0; border-radius: 50px; padding: .7rem 1.2rem; background: var(--root-green) !important; color: var(--root-dark) !important; font-size: .85rem; font-weight: 800; text-decoration: none; transition: background .2s ease, transform .2s ease; }
        .root-navbar .btn-start:hover { background: #c9f783 !important; color: var(--root-dark) !important; transform: translateY(-1px); }
        main { min-height: 70vh; }
        section[id] { scroll-margin-top: 90px; }

        .rootspace-footer { margin-top: 35px; padding: 32px 0 24px; background: var(--root-dark); color: #fff; }
        .footer-content { display: flex; align-items: center; justify-content: space-between; gap: 22px; flex-wrap: wrap; }
        .footer-brand { display: inline-block; color: #fff !important; font-size: 1.3rem; font-weight: 800; letter-spacing: .5px; line-height: 1.3; text-decoration: none; }
        .footer-brand span { color: var(--root-green) !important; }
        .footer-tagline { margin: 5px 0 0; color: #d0ddcf; font-size: .75rem; letter-spacing: 1.2px; text-transform: uppercase; }
        .footer-copy { align-self: center; margin-top: 16px; color: #d0ddcf; font-size: .70rem; line-height: 1.9; }
        .footer-copy div:first-child { font-size: .68rem; color: #d0ddcf; }
        .footer-copy div:last-child { font-size: .72rem; color: #fff; }
        .footer-link { display: inline-block; color: var(--root-green) !important; font-size: .85rem; font-weight: 700; text-decoration: none; transition: color .2s ease, transform .2s ease; }
        .footer-link:hover { color: #fff !important; transform: translateY(-1px); }

        @media (max-width: 991.98px) {
            .root-navbar .navbar-nav { align-items: flex-start !important; padding: .8rem 0; }
            .root-navbar .btn-start { margin-top: .4rem; margin-bottom: .5rem; }
        }
        @media (max-width: 575.98px) {
            .rootspace-footer { padding: 26px 0; }
            .footer-content { flex-direction: column; align-items: flex-start; gap: 15px; }
            .footer-copy { margin-top: 4px; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg root-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">
                <span aria-hidden="true">🌱</span>
                FALDI ROOT<span class="brand-highlight">SPACE</span>
                <span class="brand-subtitle">URBAN FARMING ACADEMY</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#rootspaceNavbar" aria-controls="rootspaceNavbar" aria-expanded="false" aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="rootspaceNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}#courses">Katalog Kelas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}#about">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}#mentor">Mentor</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}#blog">Blog</a></li>
                    <li class="nav-item ms-lg-2"><a class="btn-start" href="{{ route('courses.index') }}#courses">Mulai Belajar ↗</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="rootspace-footer">
        <div class="container footer-content">
            <div class="footer-brand-group">
                <a href="{{ route('courses.index') }}" class="footer-brand">ROOT<span>SPACE</span></a>
                <p class="footer-tagline">Urban Farming Academy</p>
            </div>
            <div class="footer-copy">
                <div>&copy; {{ date('Y') }} ROOTSPACE. All rights reserved.</div>
                <div>Grow your knowledge, grow your world.</div>
            </div>
            <a href="{{ route('courses.index') }}#courses" class="footer-link">Jelajahi Kelas ↗</a>
        </div>
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
