<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container p-5">
            <div class="row">
                <div class="col-12 col-lg-2 col-md-2 mt-3">
                    <img src="{{ asset('img/logo.png') }}" width="120" alt="logo" class="mt-5">
                </div>
                <div class="col-12 col-lg-5 col-md-5 mt-3">
                    <p><u><b>{{ __('messages.information') }}</b></u></p>
                    <div class="address">
                        <b>{{ __('messages.branch_location') }}</b><br>
                        <span>Jl. Ir. H. Juanda No.21a, kb. klp., <br> Kecamatan Gambir, Kota Jakarta Pusat, <br> Daerah
                            Khusus Ibukota
                            Jakarta 10120</span>
                        <div class="mt-1">
                            <button class="btn-location-footer">
                                <img src="{{ asset('img/Assets-04.png') }}" alt="" width="30">
                                {{ __('messages.location') }}</button>
                        </div>
                    </div>
                    <div class="contact mt-3">
                        <b>{{ __('messages.contact') }}</b><br>
                        <span>0811-998-208</span>
                    </div>
                    <div class="follow-us-on mt-3">
                        <b>{{ __('messages.follow_us_on') }}</b><br>
                        <span>coninusdentalhouse</span>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5 mt-3">
                    <p><u><b>{{ __('messages.clinic_name') }}</b></u></p>
                    <ul class="list-unstyled">
                        <li class="mt-0"><a href=""><b>{{ __('messages.about_us') }}</b></a></li>
                        <li class="mt-2"><a href=""><b>{{ __('messages.service') }}</b></a></li>
                        <li class="mt-2"><a href=""><b>{{ __('messages.membership') }}</b></a></li>
                        <li class="mt-2"><a href="/privacy-policy"><b>{{ __('messages.privacy_policy') }}</b></a></li>
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
