@extends('layouts.app')

@section('title', 'Home')

@section('content')


<div class="text-center mt-5">

    <h1>
        Selamat Datang
    </h1>

    <p class="mt-3">
        Selamat datang di Website Profile Mahasiswa.
    </p>

    <p>
        Website ini dibuat menggunakan Laravel dan Blade.
    </p>

    <a href="/profile" class="btn btn-primary">

        Lihat Profile

    </a>

</div>


@endsection