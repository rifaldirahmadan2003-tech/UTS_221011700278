@extends('layouts.rootspace')

@section('title', 'ROOTSPACE | Urban Farming Academy')

@section('content')

@php
    // Cari gambar di public/images dan public/assets/images.
    // Mendukung JPG, JPEG, PNG, dan WEBP.
    $resolveImage = function (...$filenames) {
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        $directories = ['images', 'assets/images'];

        foreach ($filenames as $filename) {
            if (!is_string($filename) || trim($filename) === '') {
                continue;
            }

            // Ambil nama file saja. Contoh: folder/foto.PNG menjadi foto.
            $basename = pathinfo(basename(trim($filename)), PATHINFO_FILENAME);
            $originalExtension = strtolower(pathinfo(basename(trim($filename)), PATHINFO_EXTENSION));
            $candidateNames = [];

            // Coba ekstensi asli lebih dahulu, lalu ekstensi lain.
            if ($originalExtension !== '') {
                $candidateNames[] = $basename . '.' . $originalExtension;
            }

            foreach ($extensions as $extension) {
                $candidateNames[] = $basename . '.' . $extension;
            }

            foreach (array_unique($candidateNames) as $candidate) {
                foreach ($directories as $directory) {
                    $relativePath = $directory . '/' . $candidate;

                    if (file_exists(public_path($relativePath))) {
                        return asset($relativePath);
                    }
                }
            }
        }

        // Gambar cadangan jika tersedia.
        foreach (['images/hero-garden.jpg', 'images/hero-garden.png', 'images/hero-garden.webp', 'images/hero-garden.svg', 'assets/images/hero-garden.jpg', 'assets/images/hero-garden.png', 'assets/images/hero-garden.webp', 'assets/images/hero-garden.svg'] as $fallback) {
            if (file_exists(public_path($fallback))) {
                return asset($fallback);
            }
        }

        // Jika gambar cadangan belum tersedia, URL ini tetap menjadi petunjuk lokasi.
        return asset('images/hero-garden.svg');
    };

    // Kunci harus sama persis dengan judul kelas di database.
    // Nilai di kanan adalah nama dasar foto, tanpa ekstensi.
    // Ganti nama dasar ini jika nama file foto di folder berbeda.
  
$courseImages = [
    'Dasar Hidroponik untuk Pemula' => 'hidroponik',
    'Merancang Kebun di Lahan Sempit' => 'merancang_kebun',
    'Membuat Kompos dari Sampah Dapur' => 'kompos',
    'Budidaya Microgreens di Rumah' => 'budidaya',

    'Menanam Sayuran Organik' => 'organik',
    'Perawatan Tanaman Hias Indoor' => 'tanaman_hias',
    'Sistem Irigasi Tetes Sederhana' => 'irigasi',
    'Budidaya Jamur Tiram Rumahan' => 'jamur',

    'Akuaponik untuk Pemula' => 'akuaponik',
    'Kebun Vertikal di Rumah' => 'kebun_vertikal',
    'Teknik Pembibitan Tanaman' => 'pembibitan',
    'Perawatan Tanaman di Rumah' => 'perawatan',

    // Menggunakan gambar yang sudah tersedia.
    'Memulai Bisnis Bibit Tanaman' => 'pembibitan',
    'Membuat Media Tanam Berkualitas' => 'kompos',
    'Kebun Herbal di Balkon' => 'kebun_vertikal',
    'Panen dan Pasca Panen untuk Pemula' => 'organik',
];

@endphp

<style>
    :root {
        --root-dark: #0c2b1e;
        --root-green: #194b32;
        --root-leaf: #b8e765;
        --root-cream: #f7f8f1;
        --root-muted: #718075;
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 90px;
    }

    body {
        background: var(--root-cream);
    }

    /* HERO FULL-WIDTH */

    .hero {
        position: relative;
        isolation: isolate;
        min-height: 420px;
        overflow: hidden;
        color: #fff;
        background-color: var(--root-dark);
        background-image:
            linear-gradient(
                90deg,
                rgba(7, 29, 19, .97) 0%,
                rgba(7, 29, 19, .91) 24%,
                rgba(7, 29, 19, .67) 42%,
                rgba(7, 29, 19, .12) 73%,
                rgba(7, 29, 19, .18) 100%
            ),
            url('{{ $resolveImage('hero-garden') }}');
        background-position: center, center 48%;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 0;
        min-height: clamp(420px, 43vw, 570px);
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background: linear-gradient(
            0deg,
            rgba(5, 25, 16, .28),
            transparent 45%
        );
        pointer-events: none;
    }

    .hero-container {
        position: relative;
        z-index: 1;
        min-height: 420px;
        display: flex;
        align-items: center;
        padding-top: 44px;
        padding-bottom: 44px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        width: 48%;
        max-width: 590px;
    }

    .hero-title {
        text-wrap: balance;
    }

    .eyebrow {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 22px;
        color: var(--root-leaf);
        font-size: .72rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .eyebrow::before {
        content: "";
        width: 22px;
        height: 2px;
        flex-shrink: 0;
        background: var(--root-leaf);
    }

    .hero-title {
        margin-bottom: 20px;
        font-size: clamp(2.8rem, 4.3vw, 4.4rem);
        font-weight: 800;
        letter-spacing: -2.8px;
        line-height: 1.04;
    }

    .hero-title span {
        color: var(--root-leaf);
    }

    .hero-copy {
        max-width: 510px;
        margin-bottom: 23px;
        color: rgba(255, 255, 255, .9);
        font-size: .98rem;
        line-height: 1.8;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .hero .btn-leaf {
        color: #122c1b;
        background: var(--root-leaf);
        border: 1px solid var(--root-leaf);
        font-size: .9rem;
        font-weight: 800;
        transition: .25s ease;
    }

    .hero .btn-leaf:hover {
        color: #122c1b;
        background: #c9f484;
        border-color: #c9f484;
        transform: translateY(-2px);
    }

    .hero .btn-outline-light {
        font-size: .9rem;
        transition: .25s ease;
    }

    .hero .btn-outline-light:hover {
        color: var(--root-dark);
        transform: translateY(-2px);
    }

    /* HERO FEATURE PANEL */

    .hero-features {
        position: absolute;
        top: 50%;
        right: 12px;
        width: 225px;
        padding: 17px;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 20px;
        background: rgba(12, 38, 25, .72);
        box-shadow: 0 16px 42px rgba(0, 0, 0, .15);
        backdrop-filter: blur(13px);
        transform: translateY(-50%);
    }

    .hero-feature {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 2px;
    }

    .hero-feature + .hero-feature {
        border-top: 1px solid rgba(255, 255, 255, .10);
    }

    .hero-feature-icon {
        display: grid;
        width: 35px;
        height: 35px;
        flex-shrink: 0;
        place-items: center;
        color: var(--root-leaf);
    }

    .hero-feature-icon svg {
        width: 27px;
        height: 27px;
    }

    .hero-feature strong {
        display: block;
        color: #fff;
        font-size: .78rem;
        font-weight: 700;
        line-height: 1.45;
    }

    .hero-feature small {
        display: block;
        margin-top: 2px;
        color: rgba(255, 255, 255, .7);
        font-size: .69rem;
        line-height: 1.4;
    }

    /* CATALOG */

    .catalog-section {
        padding-top: 22px;
        padding-bottom: 35px;
        background: var(--root-cream);
    }

    .catalog-heading {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 22px;
    }

    .kicker {
        margin-bottom: 6px;
        color: #648345;
        font-size: .7rem;
        font-weight: 800;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .catalog-title {
        margin-bottom: 5px;
        color: #173627;
        font-size: clamp(1.55rem, 2.3vw, 2rem);
        font-weight: 800;
        letter-spacing: -1px;
    }

    .catalog-description {
        margin: 0;
        color: var(--root-muted);
        font-size: .88rem;
    }

    .catalog-search {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .search-input-wrap {
        position: relative;
        width: 290px;
    }

    .search-icon {
        position: absolute;
        top: 50%;
        left: 13px;
        width: 17px;
        height: 17px;
        color: #637565;
        pointer-events: none;
        transform: translateY(-50%);
    }

    .searchbox {
        width: 100%;
        min-height: 44px;
        padding: 10px 13px;
        color: #203529;
        border: 1px solid #e2e8dc;
        border-radius: 12px;
        background: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: .81rem;
    }

    .search-input-wrap .searchbox {
        padding-left: 39px;
    }

    .searchbox:focus {
        border-color: #91bd62;
        outline: none;
        box-shadow: 0 0 0 3px rgba(145, 189, 98, .13);
    }

    .category-select {
        width: 175px;
    }

    .btn-search {
        min-height: 44px;
        padding: 10px 24px;
        color: #fff;
        border: 1px solid var(--root-dark);
        border-radius: 12px;
        background: var(--root-dark);
        font-size: .82rem;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-search:hover {
        color: var(--root-dark);
        border-color: var(--root-leaf);
        background: var(--root-leaf);
    }

    /* COURSE CARDS */

    .course-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #e7eade;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 4px 14px rgba(27, 55, 33, .025);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
        border-color: #d3e4bd;
        box-shadow: 0 14px 30px rgba(27, 55, 33, .09);
    }

    .course-image-wrap {
        position: relative;
        height: 125px;
        overflow: hidden;
        background: #e5edda;
    }

    .course-image-link {
        display: block;
        height: 100%;
        overflow: hidden;
    }

    .course-cover {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .course-image-link img {
        background: #e5edda;
    }

    .course-card:hover .course-cover {
        transform: scale(1.06);
    }

    .course-image-wrap::after {
        content: "";
        position: absolute;
        inset: 45% 0 0;
        background: linear-gradient(
            to bottom,
            transparent,
            rgba(0, 0, 0, .2)
        );
        pointer-events: none;
    }

    .course-duration {
        position: absolute;
        z-index: 1;
        top: 9px;
        right: 9px;
        padding: 5px 8px;
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .15);
        border-radius: 30px;
        background: rgba(12, 43, 30, .82);
        font-size: .68rem;
        backdrop-filter: blur(8px);
    }

    .course-body {
        padding: 13px;
    }

    .course-category {
        display: inline-flex;
        padding: 5px 10px;
        color: #3c662b;
        border-radius: 50px;
        background: #edf5e3;
        font-size: .66rem;
        font-weight: 800;
    }

    .course-card h5 {
        margin-top: 10px;
        margin-bottom: 6px;
        font-size: .86rem;
        font-weight: 800;
        line-height: 1.45;
    }

    .course-card h5 a {
        color: #183a27;
        text-decoration: none;
    }

    .course-card h5 a:hover {
        color: #639d3b;
    }

    .course-mentor {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 9px;
        color: var(--root-muted);
        font-size: .72rem;
    }

    .mentor-avatar {
        display: grid;
        width: 22px;
        height: 22px;
        flex-shrink: 0;
        place-items: center;
        overflow: hidden;
        color: #31563a;
        border-radius: 50%;
        background: #e3edda;
        font-size: .62rem;
        font-weight: 800;
    }

    .course-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding-top: 9px;
        border-top: 1px solid #edf0e9;
    }

    .price {
        color: var(--root-dark);
        font-size: .91rem;
        font-weight: 800;
    }

    .course-detail {
        display: grid;
        width: 27px;
        height: 27px;
        flex-shrink: 0;
        place-items: center;
        color: #fff;
        border: 1px solid var(--root-green);
        border-radius: 50%;
        background: var(--root-green);
        font-size: .95rem;
        text-decoration: none;
        transition: .2s ease;
    }

    .course-detail:hover {
        color: var(--root-dark);
        border-color: var(--root-leaf);
        background: var(--root-leaf);
        transform: translateX(2px);
    }

    /* ABOUT */

    .about-panel {
        position: relative;
        overflow: hidden;
        border: 1px solid #e0ebd3;
        background:
            radial-gradient(
                circle at 100% 0,
                rgba(184, 231, 101, .2),
                transparent 36%
            ),
            #edf4e4;
    }

    .feature {
        height: 100%;
        padding: 20px;
        border: 1px solid rgba(53, 91, 45, .10);
        border-radius: 15px;
        background: rgba(255, 255, 255, .82);
        transition: .25s ease;
    }

    .feature:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(27, 55, 33, .07);
    }

    .feature-icon {
        display: grid;
        width: 42px;
        height: 42px;
        margin-bottom: 12px;
        place-items: center;
        color: #355f2c;
        border-radius: 12px;
        background: #e2efcf;
        font-size: 1.25rem;
    }

    /* RESPONSIVE */

    @media (min-width: 1400px) {
        .hero,
        .hero-container {
            min-height: 450px;
        }

        .course-image-wrap {
            height: 145px;
        }
    }

    @media (max-width: 1199.98px) {
        .hero-content {
            width: 55%;
        }

        .hero-features {
            right: 8px;
            width: 205px;
            padding: 12px;
        }

        .catalog-heading {
            align-items: stretch;
            flex-direction: column;
        }

        .catalog-search {
            width: 100%;
        }

        .search-input-wrap {
            flex: 1;
            width: auto;
        }
    }

    @media (max-width: 991.98px) {
        .hero,
        .hero-container {
            min-height: 500px;
        }

        .hero-content {
            width: 70%;
        }

        .hero-features {
            right: 15px;
            bottom: 18px;
            top: auto;
            width: auto;
            max-width: 400px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 12px;
            transform: none;
        }

        .hero-feature {
            gap: 6px;
            padding: 7px 2px;
        }

        .hero-feature-icon {
            width: 28px;
            height: 28px;
        }

        .hero-feature-icon svg {
            width: 22px;
            height: 22px;
        }

        .hero-feature strong {
            font-size: .7rem;
        }

        .hero-feature small {
            font-size: .63rem;
        }

        .course-image-wrap {
            height: 155px;
        }
    }

    @media (max-width: 767.98px) {
        .hero,
        .hero-container {
            min-height: 620px;
        }

        .hero {
            background-image:
                linear-gradient(
                    90deg,
                    rgba(7, 29, 19, .92),
                    rgba(7, 29, 19, .66)
                ),
                url('{{ $resolveImage('hero-garden') }}');
            background-position: center, 60% center;
        }

        .hero-container {
            align-items: flex-start;
            padding-top: 48px;
            padding-bottom: 205px;
        }

        .hero-content {
            width: 100%;
            max-width: 560px;
        }

        .hero-title {
            font-size: clamp(2.7rem, 8vw, 4rem);
            letter-spacing: -2px;
        }

        .hero-copy {
            font-size: .94rem;
        }

        .hero-features {
            right: 20px;
            bottom: 20px;
            left: 20px;
            max-width: none;
        }

        .catalog-search {
            align-items: stretch;
            flex-wrap: wrap;
        }

        .search-input-wrap {
            flex-basis: 100%;
        }

        .category-select {
            flex: 1;
            width: auto;
        }

        .course-image-wrap {
            height: 170px;
        }
    }

    @media (max-width: 420px) {
        .hero,
        .hero-container {
            min-height: 680px;
        }

        .hero-title {
            font-size: 2.65rem;
        }

        .hero-actions .btn {
            padding: 11px 15px !important;
            font-size: .82rem;
        }

        .hero-features {
            right: 12px;
            bottom: 15px;
            left: 12px;
            padding: 10px;
        }

        .hero-feature strong {
            font-size: .67rem;
        }

        .hero-feature small {
            font-size: .6rem;
        }

        .course-image-wrap {
            height: 140px;
        }

        .course-body {
            padding: 11px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            animation-duration: .01ms !important;
            transition-duration: .01ms !important;
        }
    }

    
/* MENTOR SECTION */

#mentor {
    scroll-margin-top: 95px;
}

.mentor-profile {
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform .25s ease, box-shadow .25s ease;
}

.mentor-profile:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(27, 55, 33, .09);
}

.mentor-avatar-large {
    width: 76px;
    height: 76px;
    min-width: 76px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    color: #183a27;
    background: #e3edda;
    border: 2px solid #d5e5c9;
    font-size: 1.8rem;
    font-weight: 800;
}

.mentor-name {
    color: #183a27;
    font-size: 1rem;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.mentor-profile .course-category {
    display: inline-block;
    max-width: 100%;
}

/* BLOG SECTION */

.blog-card {
    height: 100%;
    transition: transform .25s ease, box-shadow .25s ease;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(27, 55, 33, .09);
}

.blog-card-image {
    position: relative;
    height: 190px;
    display: flex;
    align-items: flex-end;
    padding: 16px;
    overflow: hidden;
    background-color: #dfead6;
}

.blog-image-one {
    background:
        linear-gradient(0deg, rgba(12, 43, 30, .65), transparent 75%),
        url("{{ $resolveImage('hidroponik') }}") center / cover no-repeat;
}

.blog-image-two {
    background:
        linear-gradient(0deg, rgba(12, 43, 30, .65), transparent 75%),
        url("{{ $resolveImage('kompos') }}") center / cover no-repeat;
}

.blog-image-three {
    background:
        linear-gradient(0deg, rgba(12, 43, 30, .65), transparent 75%),
        url("{{ $resolveImage('kebun_vertikal') }}") center / cover no-repeat;
}

.blog-label {
    position: relative;
    z-index: 1;
    padding: 6px 11px;
    border-radius: 50px;
    color: #183a27;
    background: #b8e765;
    font-size: .68rem;
    font-weight: 800;
}

.blog-meta {
    margin-bottom: 9px;
    color: #648345;
    font-size: .68rem;
    font-weight: 800;
    letter-spacing: 1px;
}

.blog-title {
    margin-bottom: 10px;
    color: #183a27;
    font-size: 1.05rem;
    font-weight: 800;
    line-height: 1.5;
}

.blog-link {
    display: inline-block;
    margin-top: 6px;
    color: #27653d;
    font-size: .85rem;
    font-weight: 800;
    text-decoration: none;
}

.blog-link:hover {
    color: #639d3b;
}

</style>

{{-- HERO SECTION --}}

<section class="hero">
    <div class="container hero-container">

        <div class="hero-content">

            <div class="eyebrow">
                Learn to grow, wherever you are
            </div>

            <h1 class="hero-title">
                Ruang kecil,<br>
                <span>dampak nyata.</span>
            </h1>

            <p class="hero-copy">
                Pelajari cara menanam, merawat, dan memanen tanaman
                di ruang terbatas bersama mentor berpengalaman.
                Kelas praktis, fleksibel, dan bisa kamu akses
                dari mana saja.
            </p>

            <div class="hero-actions">

                <a href="#courses"
                   class="btn btn-leaf rounded-pill px-4 py-3">
                    Mulai Belajar ↗
                </a>

                <a href="#courses"
                   class="btn btn-outline-light rounded-pill px-4 py-3">
                    Lihat Katalog Kelas
                </a>

            </div>

        </div>

        {{-- FEATURE PANEL --}}

        <aside class="hero-features"
               aria-label="Keunggulan ROOTSPACE">

            <div class="hero-feature">
                <span class="hero-feature-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.7"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9 12 4l9 5-9 5-9-5Z"/>
                        <path d="M6 11v5c3 3 9 3 12 0v-5"/>
                        <path d="M21 9v6"/>
                    </svg>
                </span>
                <div>
                    <strong>Kelas Praktis</strong>
                    <small>Materi terstruktur</small>
                </div>
            </div>

            <div class="hero-feature">
                <span class="hero-feature-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.7"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 21V10"/>
                        <path d="M12 13C5 13 3 9 3 4c6 0 10 3 9 9Z"/>
                        <path d="M12 10c0-6 4-8 9-7 0 5-3 9-9 9"/>
                    </svg>
                </span>
                <div>
                    <strong>Mentor Berpengalaman</strong>
                    <small>Belajar lebih terarah</small>
                </div>
            </div>

            <div class="hero-feature">
                <span class="hero-feature-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.7"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="16" rx="3"/>
                        <path d="m10 9 5 3-5 3V9Z"/>
                    </svg>
                </span>
                <div>
                    <strong>Akses Online</strong>
                    <small>Belajar kapan saja</small>
                </div>
            </div>

            <div class="hero-feature">
                <span class="hero-feature-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.7"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="7" r="3"/>
                        <circle cx="17" cy="8" r="2.5"/>
                        <path d="M3 20v-2a6 6 0 0 1 12 0v2H3Z"/>
                        <path d="M16 14a5 5 0 0 1 5 5v1h-4"/>
                    </svg>
                </span>
                <div>
                    <strong>Komunitas</strong>
                    <small>Pecinta tanaman</small>
                </div>
            </div>

            <div class="hero-feature">
                <span class="hero-feature-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="m12 2 3.1 6.3 6.9 1-5 4.9 1.2 6.9-6.2-3.3-6.2 3.3L7 14.2 2 9.3l6.9-1L12 2Z"/>
                    </svg>
                </span>
                <div>
                    <strong>Sertifikat</strong>
                    <small>Untuk penyelesaian kelas</small>
                </div>
            </div>

        </aside>

    </div>
</section>

{{-- COURSE CATALOG --}}

<section class="catalog-section" id="courses">

    <div class="container">

        <div class="catalog-heading">

            <div>
                <div class="kicker">Katalog Kelas</div>

                <h2 class="catalog-title">
                    Temukan Kelas Pilihanmu
                </h2>

                <p class="catalog-description">
                    Belajar praktis untuk membuat ruangmu lebih hijau.
                </p>
            </div>

            <form method="GET"
                  action="{{ route('courses.index') }}"
                  class="catalog-search"
                  id="course-search">

                <div class="search-input-wrap">

                    <svg class="search-icon"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         stroke-linecap="round">
                        <circle cx="10.8" cy="10.8" r="6.8"/>
                        <path d="m16 16 5 5"/>
                    </svg>

                    <input
                        class="searchbox"
                        name="q"
                        type="search"
                        placeholder="Cari kelas, mentor, atau topik..."
                        value="{{ request('q') }}"
                        aria-label="Cari kelas, mentor, atau topik"
                    >

                </div>

                <select class="searchbox category-select"
                        name="category"
                        aria-label="Pilih kategori">

                    <option value="All">Semua Kategori</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category }}"
                            @selected(request('category') === $category)
                        >
                            {{ $category }}
                        </option>
                    @endforeach

                </select>

                <button type="submit" class="btn btn-search">
                    Cari
                </button>

            </form>

        </div>

        <div class="row g-3">

            @forelse($courses as $course)

                <div class="col-6 col-lg-3">

                    <article class="course-card">

                        <div class="course-image-wrap">

                            <a class="course-image-link"
                               href="{{ route('courses.show', $course) }}">

                                <img
                                    class="course-cover"
                                    src="{{ $resolveImage($courseImages[$course->title] ?? null, $course->image ?? null) }}"
                                    alt="{{ $course->title }}"
                                    loading="lazy"
                                >

                            </a>

                            <span class="course-duration">
                                ◷ {{ $course->duration }}
                            </span>

                        </div>

                        <div class="course-body">

                            <span class="course-category">
                                {{ $course->category }}
                            </span>

                            <h5>
                                <a href="{{ route('courses.show', $course) }}">
                                    {{ $course->title }}
                                </a>
                            </h5>

                            <div class="course-mentor">

                                <span class="mentor-avatar" aria-hidden="true">
                                    {{ mb_strtoupper(mb_substr($course->instructor, 0, 1)) }}
                                </span>

                                <span>
                                    {{ $course->instructor }}
                                </span>

                            </div>

                            <div class="course-bottom">

                                <span class="price">
                                    Rp{{ number_format($course->price, 0, ',', '.') }}
                                </span>

                                <a
                                    class="course-detail"
                                    href="{{ route('courses.show', $course) }}"
                                    aria-label="Lihat kelas {{ $course->title }}"
                                >
                                    →
                                </a>

                            </div>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="bg-white rounded-4 p-5 text-center">

                        <h5 class="fw-bold">
                            Kelas belum ditemukan
                        </h5>

                        <p class="muted">
                            Coba kata kunci atau kategori lain.
                        </p>

                        <a href="{{ route('courses.index') }}"
                           class="btn btn-leaf rounded-pill px-4">
                            Reset pencarian
                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

{{-- MENTOR SECTION --}}

@php
    $mentorSource = $courses instanceof \Illuminate\Pagination\AbstractPaginator
        ? $courses->getCollection()
        : collect($courses);

    $mentorList = $mentorSource
        ->filter(fn ($course) => !empty($course->instructor))
        ->unique('instructor')
        ->take(8)
        ->values();
@endphp

<section class="container py-5" id="mentor">
    <div class="text-center mb-5">
        <div class="kicker">MENTOR KAMI</div>

        <h2 class="catalog-title mt-2">
            Belajar Bersama Mentor
        </h2>

        <p class="catalog-description mt-2">
            Belajar urban farming langsung dari instruktur
            yang membimbing setiap kelas ROOTSPACE.
        </p>
    </div>

    <div class="row g-4 justify-content-center">
        @forelse ($mentorList as $mentor)
            <div class="col-6 col-md-4 col-lg-3">
                <article class="course-card mentor-profile text-center p-4 h-100">

                    <div class="mentor-avatar mentor-avatar-large mx-auto mb-3">
                        {{ mb_strtoupper(mb_substr($mentor->instructor, 0, 1)) }}
                    </div>

                    <span class="course-category">
                        {{ $mentor->category }}
                    </span>

                    <h5 class="mentor-name mt-3 mb-2">
                        {{ $mentor->instructor }}
                    </h5>

                    <p class="muted small mb-3">
                        Mentor Urban Farming
                    </p>

                    <a
                        href="{{ route('courses.show', $mentor) }}"
                        class="btn btn-success rounded-pill px-3 btn-sm mt-auto"
                    >
                        Lihat Kelas
                    </a>

                </article>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="muted">
                    Data mentor belum tersedia.
                </p>
            </div>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a
            href="{{ route('courses.index') }}#courses"
            class="btn btn-outline-success rounded-pill px-4 py-2"
        >
            Jelajahi Semua Kelas
        </a>
    </div>
</section>


{{-- BLOG SECTION --}}

<section class="container py-5" id="blog">
    <div class="d-flex flex-column flex-md-row
                justify-content-between align-items-md-end gap-3 mb-4">

        <div>
            <div class="kicker">ROOTSPACE JOURNAL</div>

            <h2 class="catalog-title mt-2">
                Tips dan Inspirasi Berkebun
            </h2>

            <p class="catalog-description mt-2">
                Temukan pengetahuan praktis untuk memulai urban farming
                di rumah.
            </p>
        </div>

        <a href="{{ route('courses.index') }}#courses"
           class="btn btn-outline-success rounded-pill px-4 py-2">
            Lihat Kelas
        </a>
    </div>

    <div class="row g-4">
        {{-- ARTIKEL 1 --}}
        <div class="col-md-4">
            <article class="course-card blog-card">
                <div class="blog-card-image blog-image-one">
                    <span class="blog-label">HIDROPONIK</span>
                </div>

                <div class="p-4">
                    <div class="blog-meta">
                        PANDUAN PEMULA
                    </div>

                    <h5 class="blog-title">
                        Cara Memulai Hidroponik di Rumah
                    </h5>

                    <p class="muted small">
                        Pelajari kebutuhan dasar hidroponik, mulai dari
                        wadah, air, nutrisi, hingga pemilihan tanaman.
                    </p>

                    <a href="{{ route('courses.index') }}#courses"
                       class="blog-link">
                        Pelajari Kelas Terkait →
                    </a>
                </div>
            </article>
        </div>

        {{-- ARTIKEL 2 --}}
        <div class="col-md-4">
            <article class="course-card blog-card">
                <div class="blog-card-image blog-image-two">
                    <span class="blog-label">KOMPOS</span>
                </div>

                <div class="p-4">
                    <div class="blog-meta">
                        TIPS BERKELANJUTAN
                    </div>

                    <h5 class="blog-title">
                        Mengolah Sampah Dapur Menjadi Kompos
                    </h5>

                    <p class="muted small">
                        Kenali bahan organik yang dapat digunakan dan
                        langkah dasar membuat kompos untuk tanaman.
                    </p>

                    <a href="{{ route('courses.index') }}#courses"
                       class="blog-link">
                        Pelajari Kelas Terkait →
                    </a>
                </div>
            </article>
        </div>

        {{-- ARTIKEL 3 --}}
        <div class="col-md-4">
            <article class="course-card blog-card">
                <div class="blog-card-image blog-image-three">
                    <span class="blog-label">KEBUN RUMAH</span>
                </div>

                <div class="p-4">
                    <div class="blog-meta">
                        INSPIRASI BERKEBUN
                    </div>

                    <h5 class="blog-title">
                        Memanfaatkan Lahan Sempit untuk Berkebun
                    </h5>

                    <p class="muted small">
                        Gunakan rak tanaman, pot, dan area vertikal untuk
                        membuat kebun sederhana di rumah.
                    </p>

                    <a href="{{ route('courses.index') }}#courses"
                       class="blog-link">
                        Pelajari Kelas Terkait →
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ABOUT SECTION --}}

<section class="container pb-5 pt-4" id="about">

    <div class="about-panel rounded-4 p-4 p-lg-5">

        <div class="row g-4 align-items-center">

            <div class="col-lg-7">

                <div class="kicker mb-2">
                    Why ROOTSPACE?
                </div>

                <h2 class="catalog-title mb-3">
                    Ruang kecil, dampak nyata.
                </h2>

                <p class="muted mb-0" style="line-height: 1.9;">
                    ROOTSPACE membantu siapa pun memahami cara
                    menanam dan merawat tanaman, bahkan ketika
                    hanya memiliki balkon, teras, atau sudut
                    kecil di rumah.
                </p>

            </div>

            <div class="col-lg-5">

                <div class="row g-3">

                    <div class="col-6">
                        <div class="feature">

                            <div class="feature-icon">♧</div>

                            <strong>Praktis</strong>

                            <p class="small muted mb-0 mt-2">
                                Panduan yang mudah diikuti.
                            </p>

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="feature">

                            <div class="feature-icon">✳</div>

                            <strong>Fleksibel</strong>

                            <p class="small muted mb-0 mt-2">
                                Belajar sesuai waktumu.
                            </p>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
