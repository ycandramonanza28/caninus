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
            color: white;
            /* Ubah sesuai warna gambar */
            font-weight: bold;
            font-size: 22px;
            text-align: center;
        }

        .transform-row-one {
            transform: translate(-50%, -50%);
        }

        .transform-row-left {
            transform: translate(-31%, -50%);
        }

        .transform-row-right {
            top: 62%;
            left: 30%;
            transform: translate(-50%, 50%);
        }

        .transform-row-left-unique {
            top: 65%;
            left: 30%;
            transform: translate(-48%, 50%);
        }

        .carousel-caption h2 {
            margin-top: -300px;
            font-size: 100px;
        }
    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide mt-1">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner Services-08.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold">  {!! __('messages.ourservice') !!}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <img src="{{ asset('img/Service-09.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service transform-row-one">
                        {!! __('messages.service1') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <img src="{{ asset('img/Service-10.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service transform-row-one">
                        {!! __('messages.service2') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0 position-relative">
                    <img src="{{ asset('img/Service-11.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service transform-row-one">
                        {!! __('messages.service3') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-end d-lg-flex justify-content-lg-end position-relative">
                    <img src="{{ asset('img/Service-12.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service transform-row-left">
                        {!! __('messages.service4') !!}
                    </div>
                </div>
                <div
                    class="ol-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-start d-lg-flex justify-content-lg-start position-relative">
                    <img src="{{ asset('img/Service-13.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service transform-row-right">
                        {!! __('messages.service5') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-end d-lg-flex justify-content-lg-end position-relative">
                    <img src="{{ asset('img/Service-14.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service transform-row-left">
                        {!! __('messages.service6') !!}
                    </div>
                </div>
                <div
                    class="ol-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-start d-lg-flex justify-content-lg-start position-relative">
                    <img src="{{ asset('img/Service-15.png') }}" alt="" class="img-fluid" width="380px">
                    <div class="overlay-text-service  transform-row-left-unique">
                        {!! __('messages.service7') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
