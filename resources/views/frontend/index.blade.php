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
            margin-top: -300px;
            margin-left: 650px;
            border-radius: 20px;
            background-color: #803D3C;
            color: #FFFF;
            border: none;
        }

        .section-one {
            background: url('{{ asset('img/Assets-01.png') }}') no-repeat bottom center;
            background-size: cover;
            position: relative;
            min-height: 100vh;
            /* Sesuaikan dengan tinggi konten */
            padding-bottom: 250px;
            /* Pastikan wave tidak tertutup */
        }

        .title-solution {
            margin-top: 50px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            color: black;
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

        .sub-title-solution {
            margin-top: -60px;
        }

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
            padding: 10px 80px 10px 80px;
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

        @media (max-width: 575.98px) {
            .title-solution {
                margin-top: 20px;
                font-size: 20px;font-size: 20px;
            }

            .sub-title-solution img {
                width: 100%;
            }

            .sub-title-solution .mt-style {
                margin-top: -150px;
            }

            .section-one {
                padding-bottom: 150px;
            }

            .sub-title-our-service img {
                width: 100%;
            }

            .btn-our-service {
                font-size: 16px;
                padding: 10px 60px 10px 60px;
            }

            .btn-location {
                font-size: 16px;
                padding: 2px 20px 2px 20px;
            }
         }
    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner Home-02.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="https://wa.me/62811998208?text=Hi Caninus Dental House! saya mau konsultasi dan membuat janji temu dengan dokter gigi."
                            target="_blank" style="list-style: none; text-decoration: none;">
                            <button class="btn btn-light btn-banner">{{ __('messages.make_appointment') }}</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/Banner-01.jpg') }}" class="d-block w-100" alt="...">
                </div>
                {{--  <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>  --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="section-one">
            <div class="container solution">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <h1 class="title-solution">{!! __('messages.dental_care') !!}</h1>
                    </div>
                </div>
                <div class="row text-center sub-title-solution">
                    <div class="col-12 col-lg-4 col-md-4">
                        <img src="{{ asset('img/Assets-02.png') }}" alt="picture" width="420">
                    </div>
                    <div class="col-12 col-lg-4 col-md-4 mt-style">
                        <img src="{{ asset('img/Assets-03.png') }}" alt="picture" width="420">
                    </div>
                    <div class="col-12 col-lg-4 col-md-4 mt-style">
                        <img src="{{ asset('img/Assets-05.png') }}" alt="picture" width="420">
                    </div>
                </div>
            </div>
            <div class="container our-service">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <h1 class="title-our-service">{{ __('messages.our_service') }}
                        </h1>
                    </div>
                </div>
                <div class="row text-center sub-title-our-service">
                    <div class="col-12 col-lg-4 col-md-4">
                        <img src="{{ asset('img/Service-09.png') }}" alt="" width="400">
                    </div>
                    <div class="col-12 col-lg-4 col-md-4">
                        <img src="{{ asset('img/Service-10.png') }}" alt="" width="400">
                    </div>
                    <div class="col-12 col-lg4 col-md-4">
                        <img src="{{ asset('img/Service-11.png') }}" alt="" width="400">
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
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-flex justify-content-center gap-5">
                                    <img src="{{ asset('img/1.jpg') }}" alt="" width="35%">
                                    <img src="{{ asset('img/2.jpg') }}" alt="" width="35%">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn-location">
                            <img src="{{ asset('img/Assets-04.png') }}" alt="" width="50">
                            {{ __('messages.location') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
