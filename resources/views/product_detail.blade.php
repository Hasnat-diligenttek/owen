@extends('front_include.header')
@section('front_section')


<section class="banner-sec fundraising">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-white">
                <h1 class="text-white fw-bold display-3">Product Details</h1>
                <p>Organisations committed to ending poverty worldwide.</p>
            </div>
            <div class="col-12">
                <div class="banner-nav-sec">
                    <ul class="banner-nav">
                        <li><a href="index.php">Home</a></li>
                        <li>-</li>
                        <li><a href="shop.php">shop</a></li>
                        <li>-</li>
                        <li><a href="#">Product Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-detail">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">

                <div class="product-image">
                    <img src="{{ asset('product_image/'.$product->thumb_image) }}" alt="" class="main-img img-fluid">
                </div>

                <div class="product-gallery">

                    {{-- <div class="image active">
                        <img src="{{ asset('product_image/'.$product->thumb_image) }}" alt="" class="img-fluid">
                    </div> --}}
                    @foreach($images as $img)
                    <div class="image">
                        <img src="{{ asset('product_image/'.$img->image) }}" alt="" class="img-fluid">
                    </div>
                    @endforeach
                    {{-- <div class="image">
                        <img src="assets/images/toys-3.png" alt="" class="img-fluid">
                    </div>
                    <div class="image">
                        <img src="assets/images/toys.png" alt="" class="img-fluid">
                    </div>
                    <div class="image">
                        <img src="assets/images/toys-2.png" alt="" class="img-fluid">
                    </div> --}}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="product-info p-lg-4 ps-lg-5 p-0 mt-4">

                    <div class="reviews d-flex gap-2">
                        <ul class="rating d-flex list-inline">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <p>( 1 Review )</p>
                    </div>

                    <h1>{{ @$product->product_name }}</h1>

                    <div class="price">$ {{ @$product->price_1 }} <span>$2245.00</span> <em> In Stock </em></div>

                    <div class="quantity-form mt-5">
                        <form action="" method="POST" id="add_to_cart">
                            <input type="hidden" name="product_id" value="{{ @$product->id }}">
                            @csrf

                            <div class="d-flex align-items-center gap-3">
                                <label for="#quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="1" placeholder="1" class="form-control">
                            </div>

                            <div class="d-flex mt-5 gap-3">
                                <button type="submit" class="my-btn">Add to cart</button>
                                <button type="submit" class="my-btn overflow-hidden heart"><i class="fas fa-heart"></i></button>
                            </div>
                        </form>
                    </div>
                    <hr style="margin-top: 4rem; margin-bottom: 4rem;">

                    <div class="product-meta">

                        <div class="d-flex gap-2">
                            <p>Category:</p>
                            <ul class="meta-list d-flex gap-1 list-inline">
                                <li><a href="#">Bags</a></li>
                                <li>,</li>
                                <li><a href="#">Clothing</a></li>
                                <li>,</li>
                                <li><a href="#">Apparel</a></li>
                            </ul>
                        </div>

                        <div class="d-flex gap-2">
                            <p>Tags:</p>
                            <ul class="meta-list d-flex gap-1 list-inline">
                                <li><a href="#">Bags</a></li>
                                <li>,</li>
                                <li><a href="#">unero</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="product-tab">
                    <ul class="nav nav-tabs shadow" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">secification</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">reviews (1)</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="description">
                                <p class="mb-3">{{ @$product->short_desc }}</p>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="specification">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Color</th>
                                            <td>Blue, Green, Red</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Logo</th>
                                            <td>Yes, No</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address:</th>
                                            <td>88 Some Street, Some Town
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Capacity</th>
                                            <td>45L</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Size</th>
                                            <td>37W x 50H x23.5D cm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Weight</th>
                                            <td>1.3kg</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <div class="reviews-tab">
                                <h5 class="dark text-capitalize">2 Review For This Product</h5>

                                <div class="reviews-box mt-4 d-flex align-items-center gap-4 ms-0 ms-lg-3 border-bottom pb-3">
                                    <div class="iamge">
                                        <img src="assets/images/review-1.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="text">
                                        <div class="d-flex align-items-baseline gap-4">
                                            <h3 class="name fw-bold fs-4">Walkar Jomsan</h3>
                                            <p class="date text-theme fw-bold mb-0">Jun 07, 2023</p>
                                        </div>
                                        <p class="mb-0 fw-bold">This is Photoshop's version of Lorem Ipsum. Proin gravida Aenean sollicitudin.</p>
                                    </div>
                                </div>

                                <div class="reviews-box mt-5 d-flex align-items-center gap-4 ms-0 ms-lg-3">
                                    <div class="iamge">
                                        <img src="assets/images/review-2.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="text">
                                        <div class="d-flex align-items-baseline gap-4">
                                            <h3 class="name fw-bold fs-4">Markoo Walkar</h3>
                                            <p class="date text-theme fw-bold mb-0">Jun 07, 2023</p>
                                        </div>
                                        <p class="mb-0 fw-bold">This is Photoshop's version of Lorem Ipsum.
                                            Proin gravida nbh vel velit auctor aliquet Aenean sollicitudin.</p>
                                    </div>
                                </div>

                                <div class="review-form ms-lg-3 me-lg-3 ms-0 me-0">
                                    <form action="" method="POST">
                                        <h5 class="text-capitalize mb-3 text-black">Add Review</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="text" name="name" id="name" placeholder="Complete Name" class="form-control">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="email" name="name" id="name" placeholder="Email Address" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="review" id="review" rows="7" placeholder="Add review" class="form-control"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="my-btn w-auto rounded-pill overflow-hidden">Add review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
