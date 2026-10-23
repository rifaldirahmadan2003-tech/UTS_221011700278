
@extends('layouts.rootspace')

@section('title', $course->title . ' | ROOTSPACE')

@section('content')

@php
    // Samakan pencarian gambar dengan halaman katalog.
    // Mendukung JPG, JPEG, PNG, dan WEBP di dua folder berikut.
    $resolveImage = function (...$filenames) {
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        $directories = ['images', 'assets/images'];

        foreach ($filenames as $filename) {
            if (!is_string($filename) || trim($filename) === '') {
                continue;
            }

            $basename = pathinfo(basename(trim($filename)), PATHINFO_FILENAME);
            $originalExtension = strtolower(pathinfo(basename(trim($filename)), PATHINFO_EXTENSION));
            $candidateNames = [];

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

        foreach (['images/hero-garden.jpg', 'images/hero-garden.png', 'images/hero-garden.svg', 'assets/images/hero-garden.jpg', 'assets/images/hero-garden.png', 'assets/images/hero-garden.svg'] as $fallback) {
            if (file_exists(public_path($fallback))) {
                return asset($fallback);
            }
        }

        return asset('images/hero-garden.jpg');
    };
@endphp

<style>
    .detail-page {
        padding-top: 42px;
        padding-bottom: 60px;
    }

    .detail-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        color: #426c3a;
        font-size: .9rem;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .detail-back:hover {
        color: #183d2b;
        transform: translateX(-3px);
    }

    .detail-cover-wrap {
        position: relative;
        overflow: hidden;
        margin-bottom: 26px;
        border: 1px solid #e3e9de;
        border-radius: 22px;
        background: #e5edda;
    }

    .detail-cover {
        display: block;
        width: 100%;
        height: 350px;
        max-height: none;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .detail-cover-wrap:hover .detail-cover {
        transform: scale(1.025);
    }

    .detail-category {
        display: inline-flex;
        align-items: center;
        padding: 7px 13px;
        color: #426c31;
        border: 1px solid #e0ebd4;
        border-radius: 50px;
        background: #edf5e3;
        font-size: .77rem;
        font-weight: 800;
    }

    .detail-title {
        margin-top: 18px;
        margin-bottom: 16px;
        color: #193c2a;
        font-size: clamp(2rem, 4vw, 3.15rem);
        font-weight: 800;
        letter-spacing: -1.7px;
        line-height: 1.15;
    }

    .detail-description {
        max-width: 760px;
        color: #718075;
        font-size: 1rem;
        line-height: 1.9;
    }

    .detail-meta {
        height: 100%;
        padding: 20px;
        border: 1px solid #e4e9df;
        border-radius: 17px;
        background: #fff;
        transition: .25s ease;
    }

    .detail-meta:hover {
        border-color: #cfdfc1;
        box-shadow: 0 10px 25px rgba(23, 56, 36, .06);
        transform: translateY(-3px);
    }

    .detail-meta-label {
        margin-bottom: 7px;
        color: #718075;
        font-size: .73rem;
        font-weight: 700;
        letter-spacing: .8px;
    }

    .detail-meta-value {
        color: #193c2a;
        font-size: 1rem;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .detail-learning {
        margin-top: 30px;
    }

    .detail-learning h2 {
        margin-bottom: 16px;
        color: #193c2a;
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .learning-list {
        padding-left: 22px;
        color: #506356;
        line-height: 1.9;
    }

    .learning-list li {
        padding-left: 4px;
        margin-bottom: 9px;
    }

    /* PRICE CARD */

    .detail-price-card {
        position: sticky;
        top: 100px;
        padding: 30px;
        overflow: hidden;
        border: 1px solid #e3e9de;
        border-radius: 22px;
        background: #fff;
        box-shadow: 0 12px 35px rgba(24, 61, 43, .055);
    }

    .price-eyebrow {
        margin-bottom: 9px;
        color: #648345;
        font-size: .7rem;
        font-weight: 800;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .price-card-title {
        margin-bottom: 7px;
        color: #203b2c;
        font-size: 1.4rem;
        font-weight: 700;
    }

    .detail-price {
        margin: 14px 0 22px;
        color: #193c2a;
        font-size: clamp(2rem, 3.5vw, 2.8rem);
        font-weight: 800;
        letter-spacing: -1.5px;
        overflow-wrap: anywhere;
    }

    .detail-divider {
        margin: 20px 0;
        border-color: #e5e9e2;
        opacity: 1;
    }

    .detail-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
        padding: 11px 0;
    }

    .detail-row-label {
        color: #718075;
        font-size: .9rem;
    }

    .detail-row-value {
        color: #233d2e;
        font-size: .9rem;
        font-weight: 800;
        text-align: right;
        overflow-wrap: anywhere;
    }

    /* PROFESSIONAL NOTICE */

    .course-notice {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        margin-top: 22px;
        padding: 18px;
        border: 1px solid #dfe9d5;
        border-radius: 15px;
        background: linear-gradient(135deg, #f4f8ed, #eaf3df);
    }

    .course-notice-icon {
        display: grid;
        width: 39px;
        height: 39px;
        flex-shrink: 0;
        place-items: center;
        color: #426d37;
        border: 1px solid #d8e7c9;
        border-radius: 12px;
        background: #fff;
    }

    .course-notice-label {
        display: block;
        margin-bottom: 6px;
        color: #678447;
        font-size: .63rem;
        font-weight: 800;
        letter-spacing: 1.3px;
    }

    .course-notice-content h3 {
        margin-bottom: 7px;
        color: #24452d;
        font-size: .96rem;
        font-weight: 800;
    }

    .course-notice-content p {
        margin: 0;
        color: #68776c;
        font-size: .82rem;
        line-height: 1.75;
    }

    .detail-catalog-button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        margin-top: 20px;
        padding: 15px 18px;
        color: #fff;
        border: 1px solid #198754;
        border-radius: 50px;
        background: #198754;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .detail-catalog-button:hover {
        color: #fff;
        border-color: #146c43;
        background: #146c43;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(25, 135, 84, .16);
    }

    /* Tombol WhatsApp */
    .whatsapp-button {
        color: #fff !important;
        background: #25D366 !important;
        border-color: #25D366 !important;
    }

    .whatsapp-button:hover {
        color: #fff !important;
        background: #128C7E !important;
        border-color: #128C7E !important;
    }

    .detail-secondary-button {
        margin-top: 12px;
        color: #183a27;
        background: #fff;
        border: 1px solid #dce6d5;
    }

    .detail-secondary-button:hover {
        color: #183a27;
        background: #f1f7e9;
        border-color: #b8e765;
        box-shadow: none;
    }

    /* RELATED COURSES */

    .related-section {
        margin-top: 55px;
    }

    .related-heading {
        margin-bottom: 20px;
        color: #193c2a;
        font-size: 1.65rem;
        font-weight: 800;
    }

    .related-card {
        display: block;
        height: 100%;
        padding: 20px;
        border: 1px solid #e4e9df;
        border-radius: 16px;
        background: #fff;
        text-decoration: none;
        transition: .25s ease;
    }

    .related-card:hover {
        border-color: #cddfbd;
        box-shadow: 0 12px 28px rgba(24, 61, 43, .07);
        transform: translateY(-4px);
    }

    .related-card-title {
        color: #193c2a;
        font-size: .98rem;
        font-weight: 800;
        line-height: 1.5;
    }

    .related-card-meta {
        margin-top: 9px;
        color: #718075;
        font-size: .8rem;
        line-height: 1.6;
    }

    @media (max-width: 991.98px) {
        .detail-price-card {
            position: static;
        }

        .detail-cover {
            height: 300px;
        }
    }

    @media (max-width: 575.98px) {
        .detail-page {
            padding-top: 25px;
        }

        .detail-cover {
            height: 220px;
        }

        .detail-title {
            font-size: 2rem;
            letter-spacing: -1px;
        }

        .detail-price-card {
            padding: 22px;
        }

        .detail-meta {
            padding: 16px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            transition-duration: .01ms !important;
        }
    }
</style>

<section class="container detail-page">

    <a href="{{ route('courses.index') }}" class="detail-back">
        <span aria-hidden="true">←</span>
        Kembali ke katalog
    </a>

    <div class="row g-4 g-xl-5 mt-1 align-items-start">

        {{-- COURSE INFORMATION --}}

        <div class="col-lg-7">

            <div class="detail-cover-wrap">
                <img
                    class="detail-cover"
                    src="{{ $resolveImage($course->image ?? null, $course->title ?? null) }}"
                    alt="{{ $course->title }}"
                >
            </div>

            <span class="detail-category">
                {{ $course->category }}
            </span>

            <h1 class="detail-title">
                {{ $course->title }}
            </h1>

            <p class="detail-description">
                Kelas online ROOTSPACE dirancang untuk membantumu
                memahami konsep dasar dan menerapkannya secara
                bertahap di rumah.
            </p>

            <div class="row g-3 mt-3">

                <div class="col-sm-6">
                    <div class="detail-meta">
                        <div class="detail-meta-label">
                            INSTRUKTUR
                        </div>

                        <div class="detail-meta-value">
                            {{ $course->instructor }}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="detail-meta">
                        <div class="detail-meta-label">
                            DURASI BELAJAR
                        </div>

                        <div class="detail-meta-value">
                            {{ $course->duration }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="detail-learning">

                <h2>Apa yang akan dipelajari?</h2>

                <ul class="learning-list">
                    <li>
                        Memahami alat dan bahan dasar sesuai topik kelas.
                    </li>

                    <li>
                        Mengenali tahapan praktik dan perawatan yang benar.
                    </li>

                    <li>
                        Menyusun langkah sederhana untuk memulai di rumah.
                    </li>
                </ul>

            </div>

        </div>

        {{-- PRICE AND COURSE DETAILS --}}

        <div class="col-lg-5">

            <aside class="detail-price-card">

                <div class="price-eyebrow">
                    Start growing today
                </div>

                <h2 class="price-card-title">
                    Detail kelas
                </h2>

                <div class="detail-price">
                    Rp{{ number_format($course->price, 0, ',', '.') }}
                </div>

                <hr class="detail-divider">

                <div class="detail-row">
                    <span class="detail-row-label">Kategori</span>

                    <strong class="detail-row-value">
                        {{ $course->category }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span class="detail-row-label">Instruktur</span>

                    <strong class="detail-row-value">
                        {{ $course->instructor }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span class="detail-row-label">Durasi</span>

                    <strong class="detail-row-value">
                        {{ $course->duration }}
                    </strong>
                </div>

                {{-- REPLACEMENT NOTICE --}}

                <div class="course-notice">

                    <div class="course-notice-icon">
                        <svg
                            width="22"
                            height="22"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>

                    <div class="course-notice-content">

                        <span class="course-notice-label">
                            YOUR LEARNING JOURNEY
                        </span>

                        <h3>Siap mulai belajar?</h3>

                        <p>
                            Pelajari materi secara bertahap dan
                            terapkan pengetahuan barumu untuk
                            menciptakan ruang hijau di rumah.
                        </p>

                    </div>

                </div>

                @php
                    $whatsappNumber = '6287817031059';
                    $whatsappMessage = 'Halo ROOTSPACE, saya tertarik dengan kelas '
                        . $course->title
                        . '. Boleh minta informasi lebih lanjut mengenai kelas, materi, harga, dan cara pendaftarannya?';
                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber
                        . '?text=' . urlencode($whatsappMessage);
                @endphp

                <a
                    href="{{ $whatsappUrl }}"
                    class="detail-catalog-button whatsapp-button"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Tanya Kelas via WhatsApp
                </a>

                <a
                    href="{{ route('courses.index') }}#courses"
                    class="detail-catalog-button detail-secondary-button"
                >
                    Jelajahi kelas lainnya
                    <span aria-hidden="true">→</span>
                </a>

            </aside>

        </div>

    </div>

    {{-- RELATED COURSES --}}

    @if($relatedCourses->isNotEmpty())

        <section class="related-section">

            <h2 class="related-heading">
                Kelas lain dalam kategori {{ $course->category }}
            </h2>

            <div class="row g-3">

                @foreach($relatedCourses as $related)

                    <div class="col-md-4">

                        <a
                            class="related-card"
                            href="{{ route('courses.show', $related) }}"
                        >

                            <div class="related-card-title">
                                {{ $related->title }}
                            </div>

                            <div class="related-card-meta">
                                {{ $related->duration }}
                                ·
                                Rp{{ number_format($related->price, 0, ',', '.') }}
                            </div>

                        </a>

                    </div>

                @endforeach

            </div>

        </section>

    @endif

</section>

@endsection
