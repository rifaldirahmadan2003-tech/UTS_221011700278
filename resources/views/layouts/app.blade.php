<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'UNPAM - Profile Mahasiswa')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-light d-flex flex-column min-vh-100">


    <nav class="navbar navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand" href="/">
                UNPAM - Profile Mahasiswa
            </a>

            <div>

                <a href="/" class="text-white text-decoration-none me-3">
                    Home
                </a>

                <a href="/profile" class="text-white text-decoration-none me-3">
                    Profile
                </a>

                <a href="/about" class="text-white text-decoration-none">
                    About
                </a>

            </div>

        </div>

    </nav>


    <div class="container flex-grow-1">

        @yield('content')

    </div>


    <footer class="bg-light text-dark border-top text-center py-3 mt-auto">

        <p class="mb-0">
            &copy; {{ date('Y') }} UNPAM. All rights reserved.
        </p>

    </footer>


</body>

</html>