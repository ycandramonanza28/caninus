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

        /* Responsive background height for founder section */
        @media (max-width: 991.98px) {
            #background-banner {
                height: 850px;
            }
        }

        @media (max-width: 767.98px) {
            #background-banner {
                height: 900px;
            }
        }

        .accordion-item {
            width: 100%;
            max-width: 1000px;
        }

        .carousel-caption #aboutus-banner {
            margin-top: -28%;
            /* persentase supaya relatif ke tinggi gambar */
            font-size: clamp(20px, 8vw, 100px);
            /* min 20px, max 100px, scaling otomatis */
        }

        .founderbiography {
            text-align: justify;
        }



        .vision-text {
            text-align: justify;
        }

        .mission-text {
            text-align: justify;
        }

        @media (max-width: 991.98px) {
            .accordion-item {
                width: 100% !important;
                max-width: 100% !important;
            }
        }

        @media (max-width: 575.98px) {
            #background-banner {
                height: 1200px;
            }

            .accordion-item {
                width: 100% !important;
                max-width: 100% !important;
            }

            .carousel-caption #aboutus-banner {
                margin-top: -25%;
                /* bisa disesuaikan agar tetap pas di HP */
            }
        }

        @media (max-width: 480px) {
            #background-banner {
                height: 1400px;
            }
        }

        /* Custom Carousel Arrow Styling */
        .custom-carousel-control {
            width: 50px !important;
            height: 50px !important;
            background: rgba(255, 255, 255, 0.9) !important;
            border: 2px solid #A7801D !important;
            border-radius: 50% !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
        }

        .custom-carousel-control:hover {
            background: rgba(255, 255, 255, 1) !important;
            border-color: #803D3C !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
            transform: translateY(-50%) scale(1.1) !important;
        }

        .custom-carousel-control:active {
            transform: translateY(-50%) scale(0.95) !important;
        }

        .custom-carousel-control.prev {
            left: 20px !important;
        }

        .custom-carousel-control.next {
            right: 20px !important;
        }

        .custom-arrow {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            height: 100% !important;
            color: #A7801D !important;
            transition: color 0.3s ease !important;
        }

        .custom-carousel-control:hover .custom-arrow {
            color: #803D3C !important;
        }

        .custom-arrow svg {
            width: 20px !important;
            height: 20px !important;
        }

        /* Responsive adjustments for mobile */
        @media (max-width: 768px) {
            .custom-carousel-control {
                width: 40px !important;
                height: 40px !important;
            }
            
            .custom-carousel-control.prev {
                left: 10px !important;
            }
            
            .custom-carousel-control.next {
                right: 10px !important;
            }
            
            .custom-arrow svg {
                width: 16px !important;
                height: 16px !important;
            }
        }

        /* Konsistensi rasio & pencegahan distorsi (Safari/Chrome) */
        .founder-image {
            aspect-ratio: 3 / 4;
            width: clamp(200px, 28vw, 300px) !important;
            height: auto !important;
            object-fit: cover !important;
            border-radius: 10% !important;
            box-shadow: 1px 2px 5px rgb(105, 105, 105) !important;
            display: block;
        }

        /* Consistent styling for all carousel images */
        .carousel-image {
            aspect-ratio: 3 / 4;
            width: 100% !important;
            height: auto !important;
            object-fit: cover !important;
            border-radius: 8px !important;
            display: block;
        }

        /* Batasi lebar kartu di desktop agar konsisten antar browser */
        #carouselExampleCaptionsDesktop .card {
            width: 320px !important;
            max-width: 100% !important;
        }

        /* Mobile card adjustments to prevent image cropping */
        @media (max-width: 767.98px) {
            .card {
                width: 100% !important;
                max-width: 250px !important;
                margin: 0 auto !important;
            }
            
            .carousel-image { height: auto !important; }
        }

        @media (max-width: 575.98px) {
            .card {
                width: 100% !important;
                max-width: 220px !important;
                margin: 0 auto !important;
            }
            
            .carousel-image { height: auto !important; }
        }

        @media (max-width: 480px) {
            .card {
                width: 100% !important;
                max-width: 200px !important;
                margin: 0 auto !important;
            }
            
            .carousel-image { height: auto !important; }
        }

        /* Mobile text sizing for Meet Our Dentist section */
        @media (max-width: 767.98px) {
            .card-title {
                font-size: 1rem !important;
                margin-bottom: 0.5rem !important;
            }
            
            .card-text {
                font-size: 0.875rem !important;
                margin-bottom: 0 !important;
            }
        }

        @media (max-width: 575.98px) {
            .card-title {
                font-size: 0.9rem !important;
            }
            
            .card-text {
                font-size: 0.8rem !important;
            }
        }

        @media (max-width: 480px) {
            .card-title {
                font-size: 0.8rem !important;
            }
            
            .card-text {
                font-size: 0.75rem !important;
            }
        }

        /* Responsive image height adjustments */
        @media (max-width: 991.98px) {
            .founder-image { width: 250px !important; height: auto !important; }
            
            .carousel-image { height: auto !important; }

            /* iPad spacing improvements */
            .group-banner .row {
                gap: 2rem;
            }
            
            .group-banner .col-md-7 {
                padding-right: 2rem !important;
            }
            
            .group-banner .col-md-5 {
                padding-left: 2rem !important;
            }
        }

        @media (max-width: 767.98px) {
            .founder-image { width: 200px !important; height: auto !important; }
            
            .carousel-image { height: auto !important; }

            /* Mobile spacing improvements */
            .group-banner .row {
                gap: 1.5rem;
            }
            
            .group-banner .col-md-7 {
                padding-right: 1.5rem !important;
            }
            
            .group-banner .col-md-5 {
                padding-left: 1.5rem !important;
            }
        }

        @media (max-width: 575.98px) {
            .founder-image { width: 180px !important; height: auto !important; }
            
            .carousel-image { height: auto !important; }
        }
    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide mt-1">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner About-Us.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption">
                        <h2 class="fw-bold" id="aboutus-banner"> {!! __('messages.aboutus') !!}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
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
                            <div class="col-12 col-md-7 col-lg-7" align="left" style="margin-top: 30px">
                                <h1 class="title-founder-name">drg. Inge Carolina</h1>
                                <h2 id="title-sub">Founder Caninus Dental House</h2>
                                <p class="text-black founderbiography">
                                    {{ __('messages.founder_biography') }}
                                </p>
                            </div>
                            <div class="col-12 col-md-5 col-lg-5" align="center">
                                <img src="{{ asset('img/doctor.png') }}" class="img-fluid mt-3 founder-image" alt="drg. Inge Carolina">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('img/aboutus-banner.png') }}" class="d-block w-100 mb-20" alt="..."
                        id="background-banner">
                    <div class="carousel-caption  top-0 rounded">
                        <div class="row group-banner">
                            <div class="col-12 col-lg-12 col-md-12 text-center mb-4">
                                <h1 class="title-founder">{{ __('messages.founder') }}
                                </h1>
                            </div>
                            <div class="col-12 col-md-7 col-lg-7" align="left" style="margin-top: 30px">
                                <h1 class="title-founder-name">Garry Gaven</h1>
                                <h2 id="title-sub">Founder Caninus Dental House</h2>
                                <p class="text-black founderbiography">
                                    {{ __('messages.founder_biography2') }}
                                </p>
                            </div>
                            <div class="col-12 col-md-5 col-lg-5" align="center">
                                <img src="{{ asset('img/founder2.jpeg') }}" class="img-fluid mt-3 founder-image" alt="Garry Gaven">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom Arrow Navigation -->
            <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <div class="custom-arrow prev-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <div class="custom-arrow next-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="row">
                <h1 class="text-center mt-5" id="title-vision-mission">{{ __('messages.vision and mission') }}</h1>
                <div class="col-12 col-md-4 col-lg-4 text-center">
                    <h1>{{ __('messages.vision') }}</h1>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <p class="vision-text"> {{ __('messages.vision and mission title') }}
                    </p>
                </div>
                <div class="col-12 col-md-4 col-lg-4 text-center">
                    <h1>{{ __('messages.mission') }}</h1>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <ol class="mission-text">
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
                            <div class="card">
                                <img src="{{ asset('img/doctor.png') }}" class="card-img-top img-fluid carousel-image"
                                    alt="Dentist Image">
                                <div class="card-body text-center">
                                    <h5 class="card-title">drg. Inge Carolina</h5>
                                    <p class="card-text">Dentist</p>

                                </div>
                            </div>
                            <div class="card">
                                <img src="{{ asset('img/doctor1.png') }}" class="card-img-top img-fluid carousel-image"
                                    alt="Dentist Image">
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
                            <div class="card">
                                <img src="{{ asset('img/doctor.png') }}" class="card-img-top img-fluid carousel-image"
                                    alt="Dentist Image">
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
                            <div class="card">
                                <img src="{{ asset('img/doctor1.png') }}" class="card-img-top img-fluid carousel-image"
                                    alt="Dentist Image">
                                <div class="card-body text-center">
                                    <h5 class="card-title">drg. Felicia</h5>
                                    <p class="card-text">Dentist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#carouselExampleCaptionsMobile"
                data-bs-slide="prev">
                <div class="custom-arrow prev-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#carouselExampleCaptionsMobile"
                data-bs-slide="next">
                <div class="custom-arrow next-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script>
        // Initialize all carousels with auto-slide every 8 seconds
        document.addEventListener('DOMContentLoaded', function() {
            // Main carousel (carouselExampleCaptions)
            const mainCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'), {
                interval: 8000, // 8 seconds
                ride: true,
                wrap: true
            });

            // Desktop carousel (carouselExampleCaptionsDesktop)
            const desktopCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptionsDesktop'), {
                interval: 8000, // 8 seconds
                ride: true,
                wrap: true
            });

            // Mobile carousel (carouselExampleCaptionsMobile)
            const mobileCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptionsMobile'), {
                interval: 8000, // 8 seconds
                ride: true,
                wrap: true
            });

            // Start auto-slide for all carousels
            mainCarousel.cycle();
            desktopCarousel.cycle();
            mobileCarousel.cycle();
        });
    </script>
@endsection
