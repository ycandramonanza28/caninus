@extends('layouts.frontend.master')
@section('title', 'Caninus | Home')
@section('content')
    <style>
        body {
            background-color: #EFE8D7;
        }

        .btn-banner {
            font-weight: 600;
            font-size: 20px;
            border-radius: 20px;
            background-color: #803D3C;
            color: #FFFF;
            border: none;
            padding: 10px 40px;
            position: absolute;
            right: 20vw;
            top: 0;
            transform: translateY(-50%);
            margin: 0;
            display: block;
        }

        .carousel-caption {
            left: 0;
            right: 0;
            bottom: 20%;
            text-align: right;
        }

        .section-one {
            background: url('img/Assets-01.png') no-repeat bottom center;
            background-size: cover;
            position: relative;
            /* min-height: 100vh; */
            /* padding-bottom: 250px; */
            /* Pastikan wave tidak tertutup */
        }

        .title-solution {
            margin-top: 50px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            color: black;
            font-size: 2.2rem;
        }

        .title-solution::after {
            content: "";
            display: block;
            width: 50%;
            /* Atur panjang border sesuai keinginan */
            margin: 10px auto 0 auto;
            /* Mengatur jarak antara teks dan border */
            border-bottom: 5px solid #803D3C;
        }

        /* .sub-title-solution {
                    margin-top: -60px;
                } */

        .title-our-service {
            margin-top: -10px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            color: black;
        }

        .title-our-service::after {
            content: "";
            display: block;
            width: 80%;
            /* Atur panjang border sesuai keinginan */
            margin: 10px auto 0 auto;
            /* Mengatur jarak antara teks dan border */
            border-bottom: 5px solid #803D3C;
        }

        .btn-our-service {
            font-size: 20px;
            background-color: #937D41;
            color: #FFFF;
            padding: 10px 80px;
            border-radius: 20px;
            border: none;
        }

        .title-caninus-dental-house {
            margin-top: -10px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            color: black;
        }

        .title-caninus-dental-house::after {
            content: "";
            display: block;
            width: 50%;
            /* Atur panjang border sesuai keinginan */
            margin: 10px auto 0 auto;
            /* Mengatur jarak antara teks dan border */
            border-bottom: 5px solid #803D3C;
        }

        .btn-location {
            font-size: 20px;
            background-color: #ffffff;
            color: #000000;
            padding: 0px 40px 0px 40px;
            border-radius: 20px;
            border: none;
            box-shadow: 2px 2px 2px 2px #cbcbcb;
        }

        @media (max-width: 1024px) {
            .btn-banner {
                font-size: 16px;
                padding: 8px 28px;
                right: 3vw;
            }

            .carousel-caption {
                bottom: 10%;
                text-align: right;
            }

            .title-solution {
                font-size: 1.5rem;
            }

            .title-our-service {
                font-size: 1.5rem;
            }

            .btn-our-service {
                font-size: 16px;
                padding: 10px 40px;
            }
        }

        @media (max-width: 575.98px) {
            .carousel-caption {
                position: absolute !important;
                background: none !important;
                padding: 0 !important;
                width: 100vw !important;
                left: 0 !important;
                right: 0 !important;
                bottom: 4%;
                z-index: 10 !important;
                text-align: right;
            }

            .btn-banner {
                font-size: 12px;
                padding: 6px 12px;
                position: absolute !important;
                right: 8vw;
                left: auto;
                bottom: 12%;
                top: auto;
                transform: none;
                margin: 0 !important;
                display: inline-block !important;
                z-index: 20 !important;
                background: #803D3C !important;
                color: #fff !important;
                box-shadow: 1px 2px 5px rgb(145, 145, 145);
            }

            .carousel-caption {
                bottom: 4%;
                text-align: center;
            }

            .title-solution {
                margin-top: 20px;
                font-size: 1.1rem;
            }

            /* .sub-title-solution img {
                        width: 100%;
                    } */

            /* .sub-title-solution .mt-style {
                        margin-top: -150px;
                    } */

            .section-one {
                padding-bottom: 120px;
            }

            .sub-title-our-service img {
                width: 100%;
            }

            .btn-our-service {
                font-size: 14px;
                padding: 8px 24px;
            }

            .btn-location {
                font-size: 16px;
                padding: 2px 20px 2px 20px;
            }

            .sub-title-our-service img.img-fluid {
                max-width: 250px;
                width: 100%;
                height: auto;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }
        }

        .solution .row.g-0>[class^="col-"] {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .solution img {
            margin-bottom: 0 !important;
            display: block;
        }

        .solution-img {
            max-width: 250px;
            width: 100%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        @media (min-width: 576px) {
            .solution-img {
                max-width: 180px;
            }
        }

        @media (min-width: 768px) {
            .solution-img {
                max-width: 220px;
            }

            .section-one {
                padding-bottom: 120px;
            }
        }

        @media (min-width: 992px) {
            .solution-img {
                max-width: 350px;
            }

            .section-one {
                padding-bottom: 220px;
            }
        }

        .solution .row.g-0>[class^="col-"] {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        @media (max-width: 991.98px) {
            .solution .row.g-0>[class^="col-"] {
                margin-bottom: 12px;
            }
        }

        @media (min-width: 992px) {
            .solution .row.g-0>[class^="col-"] {
                margin-bottom: 0;
            }
        }

        /* Responsive alignment for 'more' button */
        @media (max-width: 767.98px) {
            .sub-title-our-service .d-flex {
                justify-content: center !important;
            }
        }

        @media (min-width: 768px) {
            .sub-title-our-service .d-flex {
                justify-content: flex-end !important;
            }
        }

        .position-relative {
            position: relative;
        }

        .overlay-text {
            position: absolute;
            width: 60%;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            /* Ubah sesuai warna gambar */
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        .overlay-text-service {
            position: absolute;
            width: 100%;
            top: 71%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            /* Ubah sesuai warna gambar */
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        @media (max-width: 575.98px) {
            .overlay-text {
                font-size: 14px;
            }

            .overlay-text-service {
                font-size: 14px;
            }
        }
    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @php
                    $locale = App::getLocale();
                    $banner =
                        $locale === 'en'
                            ? 'img/banner-caninus-1-en.jpg'
                            : ($locale === 'zh'
                                ? 'img/banner-caninus-1-zh.jpg'
                                : 'img/banner-caninus-1-id.jpg');

                    $banner2 =
                        $locale === 'en'
                            ? 'img/banner-caninus-2-en.jpg'
                            : ($locale === 'zh'
                                ? 'img/banner-caninus-2-zh.jpg'
                                : 'img/banner-caninus-2-id.jpg');
                @endphp

                <div class="carousel-item active">
                    <img src="{{ asset($banner) }}" class="d-block w-100 img-fluid" alt="...">

                    <div class="carousel-caption d-block">
                        <a href="{{ $locale === 'en'
                            ? 'https://wa.me/62811998208?text=Hi Caninus Dental House! I would like to consult and make a dental appointment.'
                            : ($locale === 'zh'
                                ? 'https://wa.me/62811998208?text=你好，我想咨询并预约牙医，谢谢！'
                                : 'https://wa.me/62811998208?text=Hi Caninus Dental House! saya mau konsultasi dan membuat janji temu dengan dokter gigi.') }}"
                            target="_blank" style="list-style: none; text-decoration: none;">
                            <button class="btn btn-light btn-banner w-auto mx-auto">
                                {{ __('messages.make_appointment') }}
                            </button>
                        </a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset($banner2) }}" class="d-block w-100 img-fluid" alt="...">

                    <div class="carousel-caption d-block">
                        <a href="{{ $locale === 'en'
                            ? 'https://wa.me/62811998208?text=Hi Caninus Dental House! I would like to consult and make a dental appointment.'
                            : ($locale === 'zh'
                                ? 'https://wa.me/62811998208?text=你好，我想咨询并预约牙医，谢谢！'
                                : 'https://wa.me/62811998208?text=Hi Caninus Dental House! saya mau konsultasi dan membuat janji temu dengan dokter gigi.') }}"
                            target="_blank" style="list-style: none; text-decoration: none;">
                            <button class="btn btn-light btn-banner w-auto mx-auto">
                                {{ __('messages.make_appointment') }}
                            </button>
                        </a>
                    </div>
                </div>

                {{-- <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>  --}}
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
        </div>
        <div class="section-one">
            <div class="container solution">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title-solution">{!! __('messages.dental_care') !!}</h1>
                    </div>
                </div>
                <div class="row text-center g-2 align-items-center justify-content-center mt-2">
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <img src="{{ 'img/square.png' }}" class="img-fluid solution-img" alt="picture">
                        <div class="overlay-text">
                            {!! __('messages.square1') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <img src="{{ 'img/square.png' }}" class="img-fluid solution-img" alt="picture">
                        <div class="overlay-text">
                            {!! __('messages.square2') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <img src="{{ 'img/square.png' }}" class="img-fluid solution-img" alt="picture">
                        <div class="overlay-text">
                            {!! __('messages.square3') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="container our-service mt-5">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <h1 class="title-our-service">{{ __('messages.our_service') }}
                        </h1>
                    </div>
                </div>
                <div class="row text-center sub-title-our-service g-1 align-items-center">
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <img src="{{ asset('img/Service-09.png') }}" alt="" class="img-fluid">
                        <div class="overlay-text-service">
                            {!! __('messages.service1') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <img src="{{ asset('img/Service-10.png') }}" alt="" class="img-fluid">
                        <div class="overlay-text-service">
                            {!! __('messages.service2') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <img src="{{ asset('img/Service-11.png') }}" alt="" class="img-fluid">
                        <div class="overlay-text-service">
                            {!! __('messages.service3') !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end justify-content-md-end justify-content-center mt-2">
                        <button class="btn-our-service">{{ __('messages.more') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-two pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title-caninus-dental-house">{{ __('messages.clinic_name') }}</h1>
                    </div>
                </div>
                <div class="row mt-3">
                    <!-- Desktop Carousel: dua gambar berdampingan -->
                    <div id="carouselExampleDesktop" class="carousel slide d-none d-md-block">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center g-3">
                                    <div class="col-6 col-lg-4 d-flex justify-content-center">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="img-fluid rounded shadow-sm">
                                    </div>
                                    <div class="col-6 col-lg-4 d-flex justify-content-center">
                                        <img src="{{ asset('img/2.jpg') }}" alt=""
                                            class="img-fluid rounded shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile & Tablet Carousel: satu gambar per slide -->
                    <div id="carouselExampleMobile" class="carousel slide d-block d-md-none" data-bs-ride="carousel"
                        data-bs-interval="4000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col-12 d-flex justify-content-center">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="img-fluid rounded shadow-sm" style="max-width: 250px; width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-12 d-flex justify-content-center">
                                        <img src="{{ asset('img/2.jpg') }}" alt=""
                                            class="img-fluid rounded shadow-sm" style="max-width: 250px; width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleMobile"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleMobile"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="text-center mt-5">
                        <a href="https://maps.app.goo.gl/P9gN8v8nTr3K52aYA?g_st=aw">
                            <button class="btn-location">
                                <img src="{{ asset('img/Assets-04.png') }}" alt="" width="50">
                                {{ __('messages.location') }}</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
