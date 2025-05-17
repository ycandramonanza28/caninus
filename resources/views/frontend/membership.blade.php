@extends('layouts.frontend.master')
@section('title', 'Caninus | Membership')
@section('content')
    <style>
        .wrapper {
            box-shadow: 1px 2px 5px rgb(105, 105, 105);
        }

        .btn-join {
            font-size: 23px
        }
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
                    @forelse ($activeVouchers as $item)
                        <div class="col-12 col-md-12 col-lg-12">
                            <a href="{{ route('membership.detail', $item->id) }}">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Voucher Image" class="img-fluid"
                                    width="800">
                            </a>
                        </div>
                    @empty
                        <div class="voucher-container">
                            <div class="voucher-card">
                                <div class="voucher-icon">🎁</div>
                                <h2>Voucher Belum Tersedia</h2>
                                <p>
                                    Saat ini belum ada voucher yang tersedia.<br>
                                    Tapi jangan khawatir — kami akan segera menghadirkan penawaran menarik untuk Anda!<br>
                                    <strong>Silakan kunjungi halaman ini secara berkala</strong> untuk update voucher
                                    terbaru.
                                </p>
                            </div>
                        </div>

                        <style>
                            @keyframes fadeFloat {
                                0% {
                                    opacity: 0;
                                    transform: translateY(20px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: translateY(0);
                                }
                            }

                            .voucher-container {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                padding: 40px 20px;
                                animation: fadeFloat 1s ease forwards;
                            }

                            .voucher-card {
                                background: white;
                                border-radius: 20px;
                                padding: 30px;
                                max-width: 600px;
                                width: 100%;
                                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                                text-align: center;
                                animation: fadeFloat 1.2s ease forwards;
                            }

                            .voucher-icon {
                                font-size: 50px;
                                margin-bottom: 20px;
                                animation: float 2s ease-in-out infinite alternate;
                            }

                            @keyframes float {
                                from {
                                    transform: translateY(0);
                                }

                                to {
                                    transform: translateY(-8px);
                                }
                            }

                            h2 {
                                color: #2b6cb0;
                                margin-bottom: 12px;
                                font-size: 24px;
                            }

                            p {
                                color: #444;
                                font-size: 16px;
                                line-height: 1.6;
                            }

                            strong {
                                color: #2b6cb0;
                            }

                            @media (max-width: 600px) {
                                .voucher-card {
                                    padding: 20px;
                                }

                                h2 {
                                    font-size: 20px;
                                }

                                .voucher-icon {
                                    font-size: 40px;
                                }
                            }
                        </style>
                    @endforelse
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
@endsection
