@extends('layouts.frontend.master')
@section('title', 'Caninus | Home')
@section('content')
    <style>
        .title-privacy-policy {
            color: #A7801D;
            font-weight: 600;
        }

        .scroll-container {
            width: 100%;
            height: 600px;
            overflow: auto;
            background: #fff;
            border: 1px solid #ccc;
            padding: 0;
            box-sizing: border-box;
          }
          
          .scroll-container iframe {
            width: 100%;
            height: 100%;
          }
          
          @media (max-width: 768px) {
            .scroll-container {
              height: 400px; /* Lebih pendek untuk layar HP */
            }
          }
          
    </style>
    <div class="wrapper">
        <div class="container mt-5 mb-5">
            <h1 class="title-privacy-policy">{!! __('messages.privacycaninusdental') !!} </h1>
            <div class="scroll-container">
                <iframe src="{{ asset('Kebijakan.pdf') }}" width="100%" height="600px" style="border:none;"></iframe>
            </div>
        </div>
    </div>
    </div>
@endsection
