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

            .title-caninus-dental-house {
                font-size: 1.5rem;
            }

            .btn-our-service {
                font-size: 16px;
                padding: 10px 40px;
            }

            .btn-location {
                font-size: 18px;
                padding: 0px 30px 0px 30px;
            }
        }

        @media (max-width: 768px) {
            .btn-banner {
                font-size: 14px;
                padding: 6px 20px;
                right: 5vw;
            }

            .carousel-caption {
                bottom: 8%;
            }

            .title-solution {
                font-size: 1.3rem;
                margin-top: 30px;
            }

            .title-our-service {
                font-size: 1.3rem;
            }

            .title-caninus-dental-house {
                font-size: 1.3rem;
            }

            .btn-our-service {
                font-size: 15px;
                padding: 8px 30px;
            }

            .btn-location {
                font-size: 16px;
                padding: 0px 25px 0px 25px;
            }

            .overlay-text {
                font-size: 16px;
                width: 70%;
                top: 65%;
            }

            .overlay-text-service {
                font-size: 16px;
                top: 75%;
            }
        }

        /* iPad specific responsive styles */
        @media (min-width: 768px) and (max-width: 1024px) {
            .overlay-text {
                font-size: 18px !important;
                width: 80% !important;
                top: 58% !important;
                line-height: 1.3 !important;
                padding: 0 8px !important;
            }

            .overlay-text-service {
                font-size: 18px !important;
                top: 68% !important;
                line-height: 1.3 !important;
                padding: 0 8px !important;
            }

            .solution-img {
                max-width: 280px !important;
            }
        }

        /* iPad Pro and larger tablets */
        @media (min-width: 1024px) and (max-width: 1366px) {
            .overlay-text {
                font-size: 19px !important;
                width: 75% !important;
                top: 58% !important;
                line-height: 1.3 !important;
                padding: 0 8px !important;
            }

            .overlay-text-service {
                font-size: 19px !important;
                top: 69% !important;
                line-height: 1.3 !important;
                padding: 0 8px !important;
            }

            .solution-img {
                max-width: 320px !important;
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
                text-align: center;
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
                min-height: 44px;
                min-width: 44px;
                touch-action: manipulation;
            }

            .title-solution {
                margin-top: 20px;
                font-size: 1.1rem;
            }

            .title-our-service {
                font-size: 1.1rem;
            }

            .title-caninus-dental-house {
                font-size: 1.1rem;
            }

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
                font-size: 14px;
                padding: 2px 16px 2px 16px;
            }

            .sub-title-our-service img.img-fluid {
                max-width: 250px;
                width: 100%;
                height: auto;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }

            .overlay-text {
                font-size: 16px;
                width: 85%;
                top: 70%;
                line-height: 1.2;
                padding: 0 8px;
            }

            .overlay-text-service {
                font-size: 16px;
                top: 80%;
                line-height: 1.2;
                padding: 0 8px;
            }

            .solution-img {
                max-width: 200px !important;
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



        .solution-image-container {
            position: relative;
            display: inline-block;
            max-width: 100%;
            overflow: hidden;
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

            .overlay-text {
                font-size: 18px;
                width: 65%;
                top: 62%;
                line-height: 1.35;
                padding: 0 10px;
            }

            .overlay-text-service {
                font-size: 18px;
                top: 73%;
                line-height: 1.35;
                padding: 0 10px;
            }
        }

        /* Small tablets and iPad mini */
        @media (min-width: 768px) and (max-width: 820px) {
            .overlay-text {
                font-size: 17px !important;
                width: 85% !important;
                top: 62% !important;
                line-height: 1.3 !important;
                padding: 0 10px !important;
            }

            .overlay-text-service {
                font-size: 17px !important;
                top: 72% !important;
                line-height: 1.3 !important;
                padding: 0 10px !important;
            }

            .solution-img {
                max-width: 240px !important;
            }
        }

        @media (min-width: 992px) {
            .solution-img {
                max-width: 350px;
            }

            .section-one {
                padding-bottom: 220px;
            }

            .overlay-text {
                font-size: 20px;
                width: 60%;
                top: 60%;
                line-height: 1.4;
                padding: 0 12px;
            }

            .overlay-text-service {
                font-size: 20px;
                top: 71%;
                line-height: 1.4;
                padding: 0 12px;
            }
        }

        @media (min-width: 1200px) {
            .solution-img {
                max-width: 400px;
            }

            .overlay-text {
                font-size: 22px;
                width: 55%;
                top: 58%;
                line-height: 1.5;
                padding: 0 15px;
            }

            .overlay-text-service {
                font-size: 22px;
                top: 69%;
                line-height: 1.5;
                padding: 0 15px;
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

        /* iPad specific layout improvements */
        @media (min-width: 768px) and (max-width: 1024px) {
            .solution .row.g-0>[class^="col-"] {
                margin-bottom: 16px;
            }

            .solution .row {
                align-items: stretch;
            }

            .solution .col-md-4 {
                display: flex;
                flex-direction: column;
            }

            .solution .col-md-4 > div {
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .solution .col-md-4 img {
                flex: 1;
                object-fit: cover;
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

        /* Mobile positioning for more button */
        @media (max-width: 575.98px) {
            .more-button-container {
                margin-top: -25px !important;
                margin-bottom: 25px;
            }
        }

        @media (max-width: 767.98px) {
            .more-button-container {
                margin-top: -15px;
                margin-bottom: 20px;
            }
        }

        /* Reduce spacing between service images on mobile */
        @media (max-width: 767.98px) {
            .sub-title-our-service .row {
                margin-bottom: 0;
            }
            
            .sub-title-our-service .col-12 {
                margin-bottom: 8px;
            }
        }

        @media (max-width: 575.98px) {
            .sub-title-our-service .col-12 {
                margin-bottom: 5px;
            }
            
            .sub-title-our-service .row {
                margin-bottom: 0;
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
            line-height: 1.2;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            /* iPad specific fixes */
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-size-adjust: 100%;
            /* Prevent overflow */
            max-width: 90%;
            overflow: hidden;
            box-sizing: border-box;
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
            line-height: 1.2;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            /* iPad specific fixes */
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-size-adjust: 100%;
            /* Prevent overflow */
            max-width: 95%;
            overflow: hidden;
            box-sizing: border-box;
        }





        @media (max-width: 575.98px) {
            .overlay-text {
                font-size: 14px;
            }

            .overlay-text-service {
                font-size: 14px;
            }
        }

        /* Additional iPad fixes for high-DPI displays */
        @media screen and (min-width: 768px) and (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {
            .overlay-text {
                font-size: 16px !important;
                width: 85% !important;
                top: 62% !important;
                line-height: 1.3 !important;
                padding: 0 10px !important;
                max-height: 65px !important;
                overflow: hidden !important;
            }

            .overlay-text-service {
                font-size: 16px !important;
                top: 72% !important;
                line-height: 1.3 !important;
                padding: 0 10px !important;
                max-height: 65px !important;
                overflow: hidden !important;
            }
        }

        /* Force smaller text on all iPad devices */
        @supports (-webkit-touch-callout: none) {
            @media (min-width: 768px) and (max-width: 1024px) {
                .overlay-text {
                    font-size: 17px !important;
                    width: 85% !important;
                    top: 62% !important;
                    line-height: 1.3 !important;
                    padding: 0 10px !important;
                    max-height: 65px !important;
                    overflow: hidden !important;
                }

                .overlay-text-service {
                    font-size: 17px !important;
                    top: 72% !important;
                    line-height: 1.3 !important;
                    padding: 0 10px !important;
                    max-height: 65px !important;
                    overflow: hidden !important;
                }
            }
        }

        /* Additional responsive fixes */
        @media (max-width: 767.98px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .solution .row {
                margin-left: 0;
                margin-right: 0;
            }
            
            .our-service .row {
                margin-left: 0;
                margin-right: 0;
            }
        }

        /* Ensure images don't overflow on small screens */
        @media (max-width: 575.98px) {
            .solution-img {
                max-width: 100% !important;
                height: auto;
            }
            
            .sub-title-our-service img {
                max-width: 100% !important;
                height: auto;
            }
            
            .carousel img {
                max-width: 100% !important;
                height: auto;
            }
        }

        /* Fix for very small screens */
        @media (max-width: 360px) {
            .title-solution,
            .title-our-service,
            .title-caninus-dental-house {
                font-size: 1rem !important;
                margin-top: 15px;
            }
            
            .btn-banner {
                font-size: 11px !important;
                padding: 4px 8px !important;
                right: 5vw !important;
            }
            
            .overlay-text,
            .overlay-text-service {
                font-size: 14px !important;
                width: 90% !important;
                line-height: 1.2 !important;
                padding: 0 6px !important;
            }
        }

        /* Ensure proper spacing and prevent overlap */
        .wrapper {
            overflow-x: hidden;
            width: 100%;
        }

        .section-one,
        .section-two {
            overflow: hidden;
            width: 100%;
        }

        /* Fix button positioning on all screen sizes */
        .btn-banner {
            white-space: nowrap;
            max-width: 90vw;
            overflow: hidden;
            text-overflow: ellipsis;
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
                        <div class="solution-image-container">
                            <img src="{{ 'img/square.png' }}" class="img-fluid solution-img" alt="picture">
                            <div class="overlay-text">
                                {!! __('messages.square1') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <div class="solution-image-container">
                            <img src="{{ 'img/square.png' }}" class="img-fluid solution-img" alt="picture">
                            <div class="overlay-text">
                                {!! __('messages.square2') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                        <div class="solution-image-container">
                            <img src="{{ 'img/square.png' }}" class="img-fluid solution-img" alt="picture">
                            <div class="overlay-text">
                                {!! __('messages.square3') !!}
                            </div>
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
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-1 mb-md-0 position-relative">
                        <img src="{{ asset('img/Service-09.png') }}" alt="" class="img-fluid">
                        <div class="overlay-text-service">
                            {!! __('messages.service1') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-1 mb-md-0 position-relative">
                        <img src="{{ asset('img/Service-10.png') }}" alt="" class="img-fluid">
                        <div class="overlay-text-service">
                            {!! __('messages.service2') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-1 mb-md-0 position-relative">
                        <img src="{{ asset('img/Service-11.png') }}" alt="" class="img-fluid">
                        <div class="overlay-text-service">
                            {!! __('messages.service3') !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end justify-content-md-end justify-content-center mt-2 more-button-container">
                        <a href="/services" class="btn-our-service" style="text-decoration: none">{{ __('messages.more') }}</a>
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
@endsection
