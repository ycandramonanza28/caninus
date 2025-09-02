<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        nav {
            box-shadow: 1px 2px 5px rgb(98, 98, 98);
        }

        .nav-link {
            margin-right: 20px;
            color: black;
            font-weight: 500;
            font-family: 'poppins-Bold', 700 sans-serif;
            font-weight: 600;
        }

        .nav-link.active {
            border-bottom: 2px solid #E9CA6D;
            /* Warna border saat aktif (contoh: kuning) */
        }

        .nav-link:hover {
            color: #E9CA6D;
            /* Warna teks saat hover (contoh: kuning) */
        }

        .copyright {
            background-color: #E2CE98
        }

        .btn-radius {
            background: linear-gradient(45deg, #E9CA6D, #D8B45C);
            /* Gradasi warna */
            border-radius: 20px;
            /* Membuat sudut membulat */
            color: black;
            /* Warna teks */
            padding: 8px 10px;
            /* Ruang di dalam tombol */
            display: inline-block;
            /* Agar seperti tombol */
            text-decoration: none;
            /* Menghilangkan garis bawah */
            font-weight: 600;
            /* Menebalkan teks */
        }

        .btn-radius:hover {
            background: linear-gradient(45deg, #D8B45C, #E9CA6D);
            /* Warna gradasi saat hover */
            color: white;
            /* Warna teks saat hover */
        }

        .btn-location-footer {
            font-size: 16px;
            background-color: #ffffff;
            color: #000000;
            padding: 2px 20px 2px 20px;
            border-radius: 20px;
            border: none;
            box-shadow: 2px 2px 2px 2px #cbcbcb;
        }

        .list-unstyled a {
            text-decoration: none;
            list-style-type: none;
            color: #000000
        }

        footer {
            box-shadow: inset 0px 8px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg navbar-white bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" width="65" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}">{{ __('messages.home') }}</a>
                    <a class="nav-link {{ Request::is('services') ? 'active' : '' }}"
                        href="{{ url('/services') }}">{{ __('messages.service') }}</a>
                    <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}"
                        href="{{ url('/about-us') }}">{{ __('messages.about_us') }}</a>
                    <a class="nav-link {{ Request::is('membership') ? 'active' : '' }}"
                        href="{{ url('/membership') }}">{{ __('messages.membership') }}</a>
                    <a class="nav-link btn-radius"
                        href="https://wa.me/62811998208?text=Hi Caninus Dental House! saya mau konsultasi dan membuat janji temu dengan dokter gigi."
                        target="_blank">{{ __('messages.make_appointment') }}</a>
                    @php
                    $locale = app()->getLocale();
                    $flags = [
                    'id' => 'img/flag.png',
                    'en' => 'img/united-kingdom.png',
                    'zh' => 'img/china.png',
                    ];
                    @endphp

                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset($flags[$locale] ?? 'img/flag.png') }}" alt="Selected Language"
                                width="24" class="me-2">
                            {{ strtoupper($locale) }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('change.language', 'id') }}">
                                    <img src="{{ asset('img/flag.png') }}" alt="Indonesia" width="24"
                                        class="me-2">
                                    ID
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('change.language', 'en') }}">
                                    <img src="{{ asset('img/united-kingdom.png') }}" alt="English" width="24"
                                        class="me-2">
                                    EN
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('change.language', 'zh') }}">
                                    <img src="{{ asset('img/china.png') }}" alt="Mandarin" width="24"
                                        class="me-2">
                                    ZH
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- User Dropdown -->
                    @if (Auth::check())
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center"
                            type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                class="rounded-circle" width="30" height="30">
                            <span class="ms-2">{{ ucfirst(Auth::user()->name) }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-2">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                class="rounded-circle" width="40" height="40">
                                        </div>
                                        <div class="flex-grow-1">
                                            <span
                                                class="fw-semibold d-block">{{ ucfirst(Auth::user()->name) }}</span>
                                            <small
                                                class="text-muted">{{ Auth::user()->getRoleNames()->implode(', ') }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer style="background-color: #FFFF">
        <div class="container px-5 py-md-5 py-0">
            <div class="row">
                <div class="col-12 col-lg-2 col-md-2">
                    <img src="{{ asset('img/logo.png') }}" width="100" alt="logo" class="mt-5">
                </div>
                <div class="col-12 col-lg-5 col-md-5 mt-3">
                    <p><u><b>{{ __('messages.information') }}</b></u></p>
                    <div class="address">
                        <b>{{ __('messages.branch_location') }}</b><br>
                        <span>Jl. Ir. H. Juanda No.21a, kb. klp., <br> Kecamatan Gambir, Kota Jakarta Pusat, <br> Daerah
                            Khusus Ibukota
                            Jakarta 10120</span>
                        <div class="mt-1">
                            <a href="https://maps.app.goo.gl/P9gN8v8nTr3K52aYA?g_st=aw">
                                <button class="btn-location-footer">
                                    <img src="{{ asset('img/Assets-04.png') }}" alt="" width="30">
                                    {{ __('messages.location') }}</button>
                            </a>
                        </div>
                    </div>
                    <div class="contact mt-3">
                        <b>{{ __('messages.contact') }}</b><br>
                        <span class="d-flex align-items-center">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #007bff; margin-right: 8px;">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            0811-998-208
                        </span>
                    </div>
                    <div class="follow-us-on mt-3">
                        <b>{{ __('messages.follow_us_on') }}</b><br>
                        <span class="d-flex align-items-center">
                            <a href="https://www.instagram.com/coninusdentalhouse" target="_blank" class="mx-2" style="text-decoration: none;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="color: #E4405F;">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            coninusdentalhouse
                        </span>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5 mt-3">
                    <p><u><b>{{ __('messages.clinic_name') }}</b></u></p>
                    <ul class="list-unstyled">
                        <li class="mt-0">
                            <a href="" class="d-flex align-items-center" style="text-decoration: none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #6c757d; margin-right: 8px;">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <b>{{ __('messages.about_us') }}</b>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="" class="d-flex align-items-center" style="text-decoration: none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #6c757d; margin-right: 8px;">
                                    <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.5-0.24,0.97-0.56,1.39-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                                </svg>
                                <b>{{ __('messages.service') }}</b>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="" class="d-flex align-items-center" style="text-decoration: none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #6c757d; margin-right: 8px;">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <b>{{ __('messages.membership') }}</b>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="/privacy-policy" class="d-flex align-items-center" style="text-decoration: none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #6c757d; margin-right: 8px;">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <b>{{ __('messages.privacy_policy') }}</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright p-2">
            <div class="text-center">
                <p>{{ __('messages.copyright_notice') }}</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>