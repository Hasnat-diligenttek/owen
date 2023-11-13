@extends('front_include.header')
@section('front_section')
<section class="banner-sec custom-option">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-white">
                <h1 class="text-white fw-bold display-3">KIDS BIZ 101</h1>
                <p>Organisations committed to ending poverty worldwide.</p>
            </div>
            <div class="col-12">
                <div class="banner-nav-sec">
                    <ul class="banner-nav">
                        <li><a href="{{ url('home') }}">Home</a></li>
                        <li>-</li>
                        <li><a href="#">KIDS BIZ 101</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-main">
    <div class="container">
        {{-- <div class="row">
            <div class="col-12 text-end mb-4">
                <a href=""><i class="fa-solid fa-chevron-down me-2"></i>Show Newest</a>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <h5 class="dark mb-4">Category</h5>
                <ul class="category-list">
                    <li><a href="">Birthday Gummys</a></li>
                    <li><a href="">Gummys</a></li>
                    <li><a href="">Graduation Gummys</a></li>
                    <li><a href="">Chocolates</a></li>
                    <li><a href="">Mix & Match</a></li>
                    <li><a href="">Mix & Match</a></li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row" id="product_html">
                        @include('front_include.product')
                        {{-- @foreach($items as $data)

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="box">
                            <img src="{{ asset('front_assets/images/image 8.png') }}" alt="" class="w-100">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text">
                                    <h6 class="price">$70.00 <span>$120.00</span></h6>
                                    <h5>Lorem ipsum</h5>
                                    <div class="ratings d-flex align-items-end">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <em>15</em>
                                    </div>
                                </div>
                                <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}


                </div>
            </div>
        </div>
        <div id="items-list">
            <div class="pagination">
                {{-- {{ $items->links() }} --}}
            </div>
        </div>
        {{-- <div class="row">
            <ul class="pagination">
                <li class="prev"><a href="">
                    <i class="fa-solid fa-chevron-left"></i>
                </a></li>
                <li class="active"><a href="{{ url('shop?page=1') }}">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li class="prev"><a href="">
                    <i class="fa-solid fa-chevron-right"></i>
                </a></li>
            </ul>
        </div> --}}
    </div>
</section>
@endsection
