@extends('layouts.frontend.master')
@section('title', 'Caninus | About Us')
@section('content')
<style>
    body {
        background-color: #EFE8D7;
    }

    .custom-rounded {
        border-radius: 30px !important;
        box-shadow: 1px 2px 5px rgb(145, 145, 145);
    }

    .title-founder {
        color: black;
        font-weight: 600;
    }

    .title-founder {
        font-weight: 600;
        text-align: center;
        display: inline-block;
        color: black;
    }

    .title-founder::after {
        content: "";
        display: block;
        width: 100%;
        /* Atur panjang border sesuai keinginan */
        margin: 10px auto 0 auto;
        /* Mengatur jarak antara teks dan border */
        border-bottom: 5px solid #803D3C;
    }

    .carousel-caption .title-founder-name {
        font-weight: 600;
        color: black !important
    }

    #title-sub {
        color: #A7801D;
        font-family: "Alex Brush", serif;
    }

    #title-vision-mission {
        color: #A7801D;
        font-weight: 600;
    }

    .title-mod {
        color: #A7801D;
        font-weight: 600;
    }

    .card-body {
        background-color: #8a3739;
        color: white;
    }

    .mod {
        box-shadow: 1px 2px 5px rgb(105, 105, 105);
    }

    .group-banner {}

    #background-banner {
        height: 750px;
    }

    .accordion-item {
        width: 1000px
    }

    @media (max-width: 575.98px) {
        #background-banner {
            height: 1300px;
        }

        .accordion-item {
            width: 300px;
        }
    }
</style>
<div class="wrapper">
    <div id="carouselExample" class="carousel slide mt-1">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/Banner About-Us.jpg') }}" class="d-block w-100 img-fluid" alt="...">
            </div>
        </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div> -->

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('img/aboutus-banner.png') }}" class="d-block w-100 mb-20" alt="..."
                    id="background-banner">
                <div class="carousel-caption  top-0 rounded">
                    <div class="row group-banner">
                        <div class="col-12 col-lg-12 col-md-12 text-center mb-4">
                            <h1 class="title-founder">{{ __('messages.founder') }}
                            </h1>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6" align="left" style="margin-top: 30px">
                            <h1 class="title-founder-name">drg. Inge Carolina</h1>
                            <h2 id="title-sub">Founder Caninus Dental House</h2>
                            <p class="text-black">
                                {{ __('messages.founder_biography') }}
                            </p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6" align="center">
                            <img src="{{ asset('img/doctor.png') }}" class="img-fluid mt-3" width="350px"
                                style="border-radius: 10%; box-shadow: 1px 2px 5px rgb(105, 105, 105); margin-top: 0px !important;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            {{-- <div class="carousel-item">
                        <img src="{{ asset('img/slide2.png') }}" class="d-block w-100" alt="...">
            <div
                class="carousel-caption position-absolute top-50 start-50 translate-middle text-center bg-dark bg-opacity-50 p-4 rounded">
                <h5>Second Slide Title</h5>
                <p>Deskripsi slide kedua yang menarik.</p>
                <img src="{{ asset('img/image2.png') }}" class="img-fluid mt-3" style="max-width: 150px;">
            </div>
        </div> --}}

        <!-- Slide 3 -->
        {{-- <div class="carousel-item">
                        <img src="{{ asset('img/slide3.png') }}" class="d-block w-100" alt="...">
        <div
            class="carousel-caption position-absolute top-50 start-50 translate-middle text-center bg-dark bg-opacity-50 p-4 rounded">
            <h5>Third Slide Title</h5>
            <p>Deskripsi slide ketiga yang menarik.</p>
            <img src="{{ asset('img/image3.png') }}" class="img-fluid mt-3" style="max-width: 150px;">
        </div>
    </div> --}}
</div>

<!-- Tombol Navigasi Carousel -->
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>
<div class="container">
    <div class="row vision-mission">
        <h1 class="text-center mt-5" id="title-vision-mission">{{ __('messages.vision and mission') }}</h1>
        <div class="col-12 col-md-4 col-lg-4 text-center">
            <h1>{{ __('messages.vision') }}</h1>
        </div>
        <div class="col-12 col-md-8 col-lg-8">
            <p> {{ __('messages.vision and mission title') }}
            </p>
        </div>
        <div class="col-12 col-md-4 col-lg-4 text-center">
            <h1>{{ __('messages.mission') }}</h1>
        </div>
        <div class="col-12 col-md-8 col-lg-8">
            <ol>
                <li>{{ __('messages.vmdesc1') }}</li>
                <li>{{ __('messages.vmdesc2') }}</li>
                <li>{{ __('messages.vmdesc3') }}</li>
                <li>{{ __('messages.vmdesc4') }}</li>
            </ol>
        </div>
    </div>
    <div class="row acordion-about-us pb-5 mb-4 mt-5">
        <div class="col-12 d-flex justify-content-center" align="center">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button"
                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"
                            style="background-color: #928036">
                            {{ __('messages.faq title1') }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body" align="left">
                            {{ __('messages.faq desc1') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button"
                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                            aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo"
                            style="background-color: #928036">
                            {{ __('messages.faq title2') }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body" align="left">
                            {{ __('messages.faq desc2') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button"
                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                            aria-expanded="false" aria-controls="panelsStayOpen-collapseThree"
                            style="background-color: #928036">
                            {{ __('messages.faq title3') }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body" align="left">
                            {{ __('messages.faq desc3') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Desktop Carousel: dua dokter berdampingan, hanya tampil di desktop -->
<div id="carouselExampleCaptionsDesktop" class="carousel slide mod d-none d-md-block" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/aboutustrp.png') }}" class="d-block w-100" alt="Background Image"
                style="opacity: 0.2; position: absolute; left: 0; top: 0; height: 100%; width: 100%; object-fit: cover; z-index: 0;">
            <div class="carousel-caption position-static" style="z-index: 1;">
                <h1 class="title-mod mb-5">Meet Our Dentist</h1>
                <div class="d-flex justify-content-center gap-5 flex-wrap">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/doctor.png') }}" class="card-img-top img-fluid" alt="Dentist Image"
                            style="object-fit: contain; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">drg. Inge Carolina</h5>
                            <p class="card-text">Dentist</p>

                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/doctor1.png') }}" class="card-img-top img-fluid" alt="Dentist Image"
                            style="object-fit: contain; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">drg. Felicia</h5>
                            <p class="card-text">Dentist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Carousel: satu dokter per slide, hanya tampil di mobile -->
<div id="carouselExampleCaptionsMobile" class="carousel slide mod d-block d-md-none" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/aboutustrp.png') }}" class="d-block w-100" alt="Background Image"
                style="opacity: 0.2; position: absolute; left: 0; top: 0; height: 100%; width: 100%; object-fit: cover; z-index: 0;">
            <div class="carousel-caption position-static" style="z-index: 1;">
                <h1 class="title-mod mb-5">Meet Our Dentist</h1>
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/doctor.png') }}" class="card-img-top img-fluid" alt="Dentist Image"
                            style="object-fit: contain; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">drg. Inge Carolina</h5>
                            <p class="card-text">Dentist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/aboutustrp.png') }}" class="d-block w-100" alt="Background Image"
                style="opacity: 0.2; position: absolute; left: 0; top: 0; height: 100%; width: 100%; object-fit: cover; z-index: 0;">
            <div class="carousel-caption position-static" style="z-index: 1;">
                <h1 class="title-mod mb-5">Meet Our Dentist</h1>
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/doctor1.png') }}" class="card-img-top img-fluid" alt="Dentist Image"
                            style="object-fit: contain; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">drg. Felicia</h5>
                            <p class="card-text">Dentist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptionsMobile" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptionsMobile" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
@endsection