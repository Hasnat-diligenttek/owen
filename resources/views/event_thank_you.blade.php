@extends('front_include.header')
@section('front_section')

<script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>

<main>


    <section class="thankyou-page banner-sec text-center" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-4 mx-auto">
                    <img src="{{ asset('front_assets/like.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="thank-you">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="text-uppercase text-center mb-3">thank you For collaboration In Event!</h1>
                    <div class="d-flex align-items-center justify-content-center mb-5 pb-2">
                        <i class="fa-solid fa-circle-check text-theme me-2 fs-3"></i>
                        <p class="fs-5 text-body-secondary mb-0"> Payment done successfully</p>
                    </div>
                    <a href="{{ url('index') }}" class="my-btn mt-4">Home</a>
                </div>
            </div>
        </div>
    </section>

</main>




@endsection
