@extends('front_include.header')
@section('front_section')

<section class="hero-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1 class="display-4 mb-4">Virtual Fundraising</h1>
                    <p class="">25 cents of every dollar we make goes back
                        into the community Kid Biz 101</p>
                    <a href="#" class="my-btn">Shop Gummy</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/home.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row g-5 mb-5">
            <div class="col-lg-3">
                <div class="feature-box">
                    <img src="assets/images/feature-1.png" alt="">
                    <h3>100% VIRTUAL</h3>
                    <p>No paperwork to fill out, no cash
                        to collect, and no product to distribute.
                        Fundraise from anywhere.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="feature-box">
                    <img src="assets/images/feature-2.png" alt="">
                    <h3>EXCEED YOUR GOALS</h3>
                    <p>You keep 50% of what you sell. No fees and no minimums to meet.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="feature-box">
                    <img src="assets/images/feature-3.png" alt="">
                    <h3>GET PAID QUICKLY</h3>
                    <p>Fundraising Events are four days long. So you get your payout faster.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="feature-box">
                    <img src="assets/images/feature-4.png" alt="">
                    <h3>NO PRODUCT TO HANDLE</h3>
                    <p>We pop, pack and ship all orders right to the supporter, anywhere in the USA.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-store">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-lg-0 mb-5">
                <div class="text">
                    <h2>Our Store</h2>
                    <h4>LEAVE A REVIEW FOR YOUR
                        FAVORITE TREAT & QUALIFY
                        FOR A $10 GIFT CARD</h4>

                    <p>Lorem ipsum dolor sit amet consectetur.
                        Varius aenean ut amet aliquam rhoncus parturient.
                        Purus viverra viverra accumsan praesent libero malesuada
                        placerat at. Purus eget feugiat non lacus malesuada
                        volutpat egestas dignissim suspendisse. Viverra turpis eros
                        et lectus scelerisque ultricies in volutpat.</p>

                    <a href="#" class="my-btn mt-5">Get Started</a>
                </div>
            </div>
            <div class="col-lg-6 text-lg-end">
                <img src="assets/images/store.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="charity">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2>working on charity</h2>
                <h4>Live Pop-Up Stores</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 mb-5">
                <div class="owl-carousel" id="charity-carousel">

                    @foreach($store as $item)
                    <div class="item">
                        <div class="box">
                         <a href="{{ url('popupstore/'.$item->store_code) }}">
                            <img src="{{ asset('store_image/'.$item->image) }}" alt="">
                            <div class="text">
                                <h2>{{ @$item->display_name }}</h2>
                                <h5>Give Children Access to Early Education</h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="raised">Raised: $8,100</span>
                                    <span class="goal">Goal: ${{ @$item->amount }}</span>
                                </div>
                            </div>
                         </a>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="item">
                        <div class="box">
                            <img src="assets/images/charity-5.jpg.png" alt="">
                            <div class="text">
                                <h2>in South Africa</h2>
                                <h5>Support Healthcare for Women and Children</h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="raised">Raised: $8,100</span>
                                    <span class="goal">Goal: $26,500</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="box">
                            <img src="assets/images/charity-6.jpg.png" alt="">
                            <div class="text">
                                <h2>in South Africa</h2>
                                <h5>Provide Gift & food to 700 Street Children</h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="raised">Raised: $8,100</span>
                                    <span class="goal">Goal: $26,500</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="box">
                            <img src="assets/images/charity-4.jpg.png" alt="">
                            <div class="text">
                                <h2>in South Africa</h2>
                                <h5>Provide Gift & food to 700 Street Children</h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="raised">Raised: $8,100</span>
                                    <span class="goal">Goal: $26,500</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
            <a href="#" class="my-btn mt-5 w-auto mx-auto">see all</a>
        </div>
    </div>
</section>

<section class="video">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="box text-center">
                    <h2 class="text-white">Charity Services</h2>
                    <h4 class="mb-5 text-white">How Its Work</h4>
                    <a href="#" class="my-btn mt-5">Learn More</a>
                    <a href="#" class="vid-icon">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="events">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center mb-5">
                <h2>Fundraising and events</h2>
                <h4>Organizing an Event</h4>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="tab-btn active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Organizing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab-btn" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Participating</button>
                    </li>
                </ul>
            </div>
            <div class="col-12 mb-5">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row g-0 align-items-center">

                            <div class="col-lg-6">
                                <img src="assets/images/events.png" alt="" class="img-fluid">
                            </div>

                            <div class="col-lg-6">
                                <div class="steps">

                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>1. DOWNLOAD THE APP</h4>
                                            <p>The Double Good app is available on the App Store or Google Play Store.</p>
                                        </div>
                                    </div>
                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>2. SCHEDULE YOUR EVENT</h4>
                                            <p>Select the date and time you’d like your 4-day fundraiser to begin.</p>
                                        </div>
                                    </div>
                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>3. SHARE THE EVENT CODE</h4>
                                            <p>You’ll get a 6-letter Event Code to distribute to your team so they can join and participate in your fundraising Event.</p>
                                        </div>
                                    </div>
                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>4. SET UP YOUR PAYOUT</h4>
                                            <p>The Double Good app is available on the App Store or Google Play Store.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="row g-0 align-items-center">

                            <div class="col-lg-6">
                                <img src="assets/images/events.png" alt="" class="img-fluid">
                            </div>

                            <div class="col-lg-6">
                                <div class="steps">

                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>1. DOWNLOAD THE APP</h4>
                                            <p>The Double Good app is available on the App Store or Google Play Store.</p>
                                        </div>
                                    </div>
                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>2. SELECT YOUR EVENT</h4>
                                            <p>Select the date and time you’d like your 4-day fundraiser to begin.</p>
                                        </div>
                                    </div>
                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>3. ENTER THE EVENT CODE</h4>
                                            <p>You’ll get a 6-letter Event Code to distribute to your team so they can join and participate in your fundraising Event.</p>
                                        </div>
                                    </div>
                                    <div class="box d-flex align-items-center gap-5 mb-3">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="text">
                                            <h4>4. SET UP YOUR PAYOUT</h4>
                                            <p>The Double Good app is available on the App Store or Google Play Store.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product">
    <div class="container">
        <div class="row mb-5 g-0">
            <div class="col-lg-6 mb-0 mb-sm-5">
                <h2>Shop Products</h2>
                <h4>Taste good As<br> it look</h4>
            </div>
            <div class="col-lg-5">
                <div class="owl-carousel" id="shop-carousel">

                    <div class="items">
                        <div class="box">
                            <img src="assets/images/image 8.png" alt="">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text">
                                    <h6 class="price">$70.00 <span>$120.00</span></h6>
                                    <h5>Lorem ipsum</h5>
                                    <div class="ratings d-flex">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                                <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <div class="box">
                            <img src="assets/images/image 9.png" alt="">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text">
                                    <h6 class="price">$70.00 <span>$120.00</span></h6>
                                    <h5>Lorem ipsum</h5>
                                    <div class="ratings d-flex">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                                <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <div class="box">
                            <img src="assets/images/image 9.png" alt="">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text">
                                    <h6 class="price">$70.00 <span>$120.00</span></h6>
                                    <h5>Lorem ipsum</h5>
                                    <div class="ratings d-flex">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                                <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <div class="box">
                            <img src="assets/images/image 9.png" alt="">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text">
                                    <h6 class="price">$70.00 <span>$120.00</span></h6>
                                    <h5>Lorem ipsum</h5>
                                    <div class="ratings d-flex">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                                <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <div class="box">
                            <img src="assets/images/image 9.png" alt="">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text">
                                    <h6 class="price">$70.00 <span>$120.00</span></h6>
                                    <h5>Lorem ipsum</h5>
                                    <div class="ratings d-flex">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                                <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="gift-card">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2>Join our community of supporters.</h2>
                <h4 class="text-capitalize"><span class="text-theme">Gift</span> Card</h4>
                <p>Send a gift card to friends and family or <br> buy it now for your future use.</p>

                <form method="POST" action="" class="gift-form">
                    <div class="form-group w-75">
                        <div class="icon"><img src="assets/images/SVG.png" alt="" class="img-fluid"></div>
                        <input type="email" placeholder="Add your email address." class="form-control">
                    </div>
                    <button type="submit" class="my-btn mt-4">Buy Now</button>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/Section-3.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="companies">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-2 col-md-6 mb-lg-0 mb-5">
                <img src="assets/images/client-1.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2 col-md-6 mb-lg-0 mb-5">
                <img src="assets/images/client-2.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2 col-md-6 mb-lg-0 mb-5">
                <img src="assets/images/client-3.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2 col-md-6 mb-lg-0 mb-5">
                <img src="assets/images/client-4.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2 col-md-6 mb-lg-0 mb-5">
                <img src="assets/images/client-5.png" alt="" class="img-fluid">

            </div>
        </div>
    </div>
</section>


@endsection
