@extends('layouts.frontend.master')
@section('title', 'Caninus | Services')
@section('content')
    <style>
        body {
            background-color: #EFE8D7;
        }

        .position-relative {
            position: relative;
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
            font-size: 18px;
            text-align: center;
            line-height: 1.2;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            /* Prevent overflow */
            max-width: 95%;
            overflow: hidden;
            box-sizing: border-box;
        }

        .transform-row-one {
            transform: translate(-50%, -50%);
        }

        .carousel-caption h2 {
            margin-top: -28%;
            /* persentase supaya relatif ke tinggi gambar */
            font-size: clamp(20px, 8vw, 100px);
            /* min 20px, max 100px, scaling otomatis */
        }

        .image-service {
            max-width: 380px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .service-image-container {
            position: relative;
            display: inline-block;
            max-width: 100%;
            overflow: hidden;
        }

        @media (max-width: 575.98px) {
            .transform-row-one {
                transform: translate(-50%, -50%);
            }

            .carousel-caption h2 {
                margin-top: -25%;
                /* bisa disesuaikan agar tetap pas di HP */
            }

            .image-service {
                max-width: 250px !important;
                width: 100% !important;
                height: auto;
            }

            .position-relative {
                justify-content: center !important;
            }

            .overlay-text-service {
                font-size: 12px;
                width: 90%;
                line-height: 1.1;
                padding: 0 8px;
                max-height: 50px;
                overflow: hidden;
            }
        }

        /* Tablet responsive */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .image-service {
                max-width: 300px;
                width: 100%;
                height: auto;
            }

            .overlay-text-service {
                font-size: 14px;
                width: 95%;
                line-height: 1.1;
                padding: 0 6px;
                max-height: 60px;
                overflow: hidden;
            }
        }

        /* Small desktop responsive */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .image-service {
                max-width: 320px;
                width: 100%;
                height: auto;
            }

            .overlay-text-service {
                font-size: 16px;
                width: 90%;
                line-height: 1.2;
                padding: 0 8px;
                max-height: 70px;
                overflow: hidden;
            }
        }

        /* Large desktop responsive */
        @media (min-width: 992px) {
            .image-service {
                max-width: 380px;
                width: 100%;
                height: auto;
            }

            .overlay-text-service {
                font-size: 18px;
                width: 100%;
                line-height: 1.2;
                padding: 0 10px;
                max-height: 80px;
                overflow: hidden;
            }
        }

        /* Additional responsive fixes */
        @media (max-width: 767.98px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .row {
                margin-left: 0;
                margin-right: 0;
            }
        }

        /* Center alignment for 2-image rows only */
        .row.justify-content-center {
            justify-content: center !important;
        }

        /* Ensure consistent sizing for ALL service images */
        @media (min-width: 768px) {
            .image-service {
                max-width: 320px !important;
                width: 100% !important;
                height: auto !important;
            }
            
            /* Add spacing between images in 2-image rows only */
            .row.justify-content-center .col-md-4:not(:last-child) {
                margin-right: 20px;
            }
        }

        /* iPad-specific adjustments for service messages */
        @media (min-width: 768px) and (max-width: 1024px) {
            .overlay-text-service {
                font-size: 12px !important;
                line-height: 1.1 !important;
                padding: 0 6px !important;
                max-height: 45px !important;
                overflow: hidden !important;
            }
        }

        /* iPad Pro adjustments */
        @media (min-width: 1024px) and (max-width: 1366px) {
            .overlay-text-service {
                font-size: 13px !important;
                line-height: 1.2 !important;
                padding: 0 8px !important;
                max-height: 50px !important;
                overflow: hidden !important;
            }
        }

        /* Special positioning for service7 - moved down */
        .overlay-text-service.service7 {
            top: 75% !important;
        }

        /* Responsive positioning for service7 - moved down */
        @media (max-width: 575.98px) {
            .overlay-text-service.service7 {
                top: 73% !important;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .overlay-text-service.service7 {
                top: 72% !important;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .overlay-text-service.service7 {
                top: 74% !important;
            }
        }

        @media (min-width: 992px) {
            .overlay-text-service.service7 {
                top: 73% !important;
            }
        }

        @media (min-width: 768px) {
            .row.justify-content-center .col-md-4 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            
            /* Ensure images maintain their responsive sizing */
            .row.justify-content-center .image-service {
                max-width: 320px;
                width: 100%;
                height: auto;
            }
        }

        /* Ensure images don't overflow on small screens */
        @media (max-width: 575.98px) {
            .service-image-container {
                max-width: 100%;
                overflow: hidden;
            }
            
            .image-service {
                max-width: 100% !important;
                height: auto;
            }
        }

        /* Mobile adjustments - bigger font size */
        @media (max-width: 575.98px) {
            .overlay-text-service {
                font-size: 16px !important;
                line-height: 1.3 !important;
                padding: 0 8px !important;
                max-height: 60px !important;
                overflow: hidden !important;
            }
        }

        /* Fix for very small screens */
        @media (max-width: 360px) {
            .overlay-text-service {
                font-size: 14px !important;
                width: 95% !important;
                line-height: 1.2 !important;
                padding: 0 6px !important;
                max-height: 50px !important;
                overflow: hidden !important;
            }
        }
    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide mt-1">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner Services-08.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption">
                        <h2 class="fw-bold"> {!! __('messages.ourservice') !!}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-09.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one">
                            {!! __('messages.service1') !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-10.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one">
                            {!! __('messages.service2') !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-11.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one">
                            {!! __('messages.service3') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-12.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one">
                            {!! __('messages.service4') !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-13.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one">
                            {!! __('messages.service5') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-14.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one">
                            {!! __('messages.service6') !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <div class="service-image-container">
                        <img src="{{ asset('img/Service-15.png') }}" alt="" class="img-fluid image-service">
                        <div class="overlay-text-service transform-row-one service7">
                            {!! __('messages.service7') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
