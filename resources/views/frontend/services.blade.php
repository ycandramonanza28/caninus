@extends('layouts.frontend.master')
@section('title', 'Caninus | Services')
@section('content')
    <style>
        body {
            background-color: #EFE8D7;
        }
    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide mt-1">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner Services-08.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4 d-flex d-md-flex justify-content-md-end d-lg-flex justify-content-lg-end">
                    <img src="{{ asset('img/Service-09.png')}}" alt="image-services" width="350px">
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <img src="{{ asset('img/Service-10.png')}}" alt="image-services" width="350px">
                </div>
                <div class="col-12 col-md-4 col-lg-4 d-flex d-md-flex justify-content-md-start d-lg-flex justify-content-lg-start">
                    <img src="{{ asset('img/Service-11.png')}}" alt="image-services" width="350px">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-end d-lg-flex justify-content-lg-end">
                    <img src="{{ asset('img/Service-12.png')}}" alt="image-services" width="350px">
                </div>
                <div class="ol-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-start d-lg-flex justify-content-lg-start">
                    <img src="{{ asset('img/Service-13.png')}}" alt="image-services" width="350px">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-end d-lg-flex justify-content-lg-end">
                    <img src="{{ asset('img/Service-14.png')}}" alt="image-services" width="350px">
                </div>
                <div class="col-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-start d-lg-flex justify-content-lg-start">
                    <img src="{{ asset('img/Service-15.png')}}" alt="image-services" width="350px">
                </div>
            </div>
        </div>
    </div>
@endsection
