@extends('layouts.frontend.master')
@section('title', 'Caninus | Membership')
@section('content')
    <style>
        <style>.countdown-wrapper {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: nowrap;
            padding: 20px 0;
        }

        .countdown-wrapper .countdown-item {
            text-align: center;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            min-width: 90px;
        }

        .countdown-wrapper .countdown-item:hover {
            transform: scale(1.1);
        }

        .countdown-wrapper .number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #dc3545;
            animation: fadeIn 0.6s ease-in-out;
        }

        .countdown-wrapper .label {
            font-size: 1rem;
            color: #6c757d;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsif untuk Tablet */
        @media (max-width: 768px) {
            .countdown-wrapper {
                gap: 1rem;
            }

            .countdown-wrapper .countdown-item {
                padding: 15px;
            }

            .countdown-wrapper .number {
                font-size: 2.2rem;
            }

            .countdown-wrapper .label {
                font-size: 0.9rem;
            }
        }

        /* Responsif untuk Mobile */
        @media (max-width: 480px) {
            .countdown-wrapper {
                gap: 1rem;
                justify-content: center;
            }

            .countdown-wrapper .countdown-item {
                padding: 12px;
                min-width: 70px;
            }

            .countdown-wrapper .number {
                font-size: 1.8rem;
            }

            .countdown-wrapper .label {
                font-size: 0.85rem;
            }
        }
    </style>

    </style>
    <div class="wrapper">
        <div id="carouselExample" class="carousel slide mt-1">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner membership.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
        </div>
        <div class="container">
            @if (Auth::check())
                <div class="row mt-5 pb-5 text-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="mt-5 text-center">
                            <h4 class="mb-3">Offer Ends In</h4>
                            <div id="countdown" class="d-flex justify-content-center gap-4 fs-2 countdown-wrapper pb-5">
                                <div class="countdown-item">
                                    <div class="number" id="days">00</div>
                                    <div class="label">Days</div>
                                </div>
                                <div class="countdown-item">
                                    <div class="number" id="hours">00</div>
                                    <div class="label">Hours</div>
                                </div>
                                <div class="countdown-item">
                                    <div class="number" id="minutes">00</div>
                                    <div class="label">Minutes</div>
                                </div>
                                <div class="countdown-item">
                                    <div class="number" id="seconds">00</div>
                                    <div class="label">Seconds</div>
                                </div>
                            </div>
                        </div>
                        <h2>{{ isset($activeVouchersDetail->code) ? $activeVouchersDetail->code : '' }}</h2>
                        @if (isset($activeVouchersDetail->image))
                            <img src="{{ asset('storage/' . $activeVouchersDetail->image) }}" alt="Voucher Image"
                                class="img-fluid" width="800">
                        @endif
                        <h3 class="mt-5">
                            {{ isset($activeVouchersDetail->name) ? $activeVouchersDetail->name : '' }}
                        </h3>
                        <p>{{ isset($activeVouchersDetail->description) ? $activeVouchersDetail->description : '' }}</p>
                    </div>
                </div>
            @endif
            @if (!Auth::check())
                <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-5 p-5 rounded">
                            <h2 class="text-center mt-3 mb-4">{{ __('messages.login') }}</h2>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" class="form-control rounded-3" id="email" name="email"
                                        placeholder="Email" required>
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control rounded-3" id="password" name="password"
                                        placeholder="Password" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 rounded-3"
                                    style="background-color: #928036 !important">Sign In</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>
    <script>
        const endDate = "{{ isset($activeVouchersDetail->end_date) ? $activeVouchersDetail->end_date : '' }}";
        const endTime = "{{ isset($activeVouchersDetail->end_time) ? $activeVouchersDetail->end_time : '' }}";
        
        let endDateTime = new Date(endDate + 'T' + endTime);
    
        // Jika tanggal invalid, paksa jadi tanggal masa lalu agar countdown langsung 00
        if (isNaN(endDateTime.getTime())) {
            endDateTime = new Date(0); // Unix epoch start time (Jan 1, 1970)
        }
    
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = endDateTime - now;
    
            if (distance < 0) {
                document.getElementById("days").innerText = "00";
                document.getElementById("hours").innerText = "00";
                document.getElementById("minutes").innerText = "00";
                document.getElementById("seconds").innerText = "00";
                clearInterval(interval);
                return;
            }
    
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
            document.getElementById("days").innerText = String(days).padStart(2, '0');
            document.getElementById("hours").innerText = String(hours).padStart(2, '0');
            document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
            document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
        }
    
        const interval = setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
    
    


@endsection
