<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Owen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
  <link rel="stylesheet" href=" {{ asset('front_assets/css/style.css') }} ">
</head>
<?php   Helper::check_login(); ?>

<body>

    <header>
    <!-- Modal -->
    <div class="modal fade sign-modal pe-0 modal-lg" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mx-auto">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="box mb-lg-0 mb-3">
                    <div class="image mb-4">
                      <img src="{{ asset('front_assets/images/modal-1.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="text text-center">
                      <h5 class="dark text-capitalize mb-4">Brochure option</h5>


                      {{-- <a href="{{ url('profile') }}" class="my-btn d-block w-100">My Account</a> --}}

                        <a href="{{ url('login/b') }}" class="my-btn d-block w-100">Sign in</a>

                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="box">
                    <div class="image mb-4">
                      <img src="{{ asset('front_assets/images/modal.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="text text-center">
                      <h5 class="dark text-capitalize mb-4">Virtual Fundraiser</h5>
                      <a href="{{ url('login/v') }}" class="my-btn d-block w-100">Sign in</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="container">
      <div class="d-flex justify-content-between py-3 flex-wrap">
        <div class="d-inline-flex gap-3 align-items-center flex-wrap">
          <div class="d-flex align-items-center gap-2">
            <span class="fa-stack" style="vertical-align: top;">
              <i class="fa-solid fa-circle fa-stack-2x"></i>
              <i class="fa-solid fa-flag fa-stack-1x fa-inverse"></i>
            </span>
            <span class="small">Phone:</span>
            <p class="head mb-0">800-836-4620</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <span class="fa-stack" style="vertical-align: top;">
              <i class="fa-solid fa-circle fa-stack-2x"></i>
              <i class="fa-solid fa-envelope fa-stack-1x fa-inverse"></i>
            </span>
            <span class="small">Email:</span>
            <p class="mb-0 head">information@domain.com</p>
          </div>
        </div>
        <div class="d-inline-flex flex-wrap gap-3 align-items-center">
          <div class="d-lg-flex align-items-center d-none">
            <ul class="list-unstyled d-flex gap-1 mb-0">
              <li>
                <a href="https://www.facebook.com/GummysRUs">
                  <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/gummysrus">
                  <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fw-bold fa-stack-1x"></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                    <i class="fab fa-google-plus-g fa-stack-1x"></i>
                  </span>
                </a>
              </li>
            </ul>
            <!--<div class="mx-4 border"></div>-->
            <!--<div class="d-flex gap-2 align-items-center">-->
            <!--  <i class="fa-solid fa-user"></i>-->
            <!--  <a href="login.php">Login and Register</a>-->
            <!--</div>-->
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg my-3">
        <div class="container">
          <a href="index.php">
            <!-- <img src="https://www.freeiconspng.com/thumbs/logo-design/circle-logo-brand-design-png-transparent-image-19.png" class="img-fluid" width="60" height="60" alt=""> -->
            <h5 class="fw-bold text-theme mb-0">LOGO HERE</h5>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars-progress"></i>
          </button>
          <div class="offcanvas offcanvas-bottom d-block d-md-none" tabindex="-1" id="navOffcanvas" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header pb-0">
              <h5 class="offcanvas-title" id="offcanvasBottomLabel" style="font-family: cursive;">Brand Name</h5>
              <i class="fa-regular fa-circle-xmark" data-bs-dismiss="offcanvas"></i>
            </div>
            <div class="offcanvas-body small">
              <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                  <a href="{{ url('index') }}">
                    Home
                  </a>
                </li>
                <li class="list-group-item">
                  <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" class="d-flex align-items-center">
                    Shop Gummy
                    <i class="fa-solid fa-angle-down text-light ps-2" style="font-size: .9em;"></i>
                  </a>
                  <div class="collapse" id="collapseExample2">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <a href="shopp" class="d-flex align-items-center gap-2">
                          <i class="fa-solid fa-minus"></i>
                          Birthday Gummys
                        </a>
                      </li>
                      <li class="list-group-item">
                        <a href="shopp" class="d-flex align-items-center gap-2">
                          <i class="fa-solid fa-minus"></i>
                          Gummys
                        </a>
                      </li>
                      <li class="list-group-item">
                        <a href="shop.php" class="d-flex align-items-center gap-2">
                          <i class="fa-solid fa-minus"></i>
                          Graduation Gummys
                        </a>
                      </li>
                      <li class="list-group-item">
                        <a href="shop.php" class="d-flex align-items-center gap-2">
                          <i class="fa-solid fa-minus"></i>
                          Chocolates
                        </a>
                      </li>
                      <li class="list-group-item">
                        <a href="shop.php" class="d-flex align-items-center gap-2">
                          <i class="fa-solid fa-minus"></i>
                          Mix & Match
                        </a>
                      </li>
                      <li class="list-group-item">
                        <a href="shop.php" class="d-flex align-items-center gap-2">
                          <i class="fa-solid fa-minus"></i>
                          Branded Snacks
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="list-group-item">
                  <a href="fundraising.php">
                    Fundrasingn
                  </a>
                </li>
                <li class="list-group-item">
                  <a href="custom-option.php">
                    Custom option
                  </a>
                </li>
                <li class="list-group-item">
                  <a href="kidz_biz.php">
                    Kidz biz 101
                  </a>
                </li>
                <li class="list-group-item">
                  <a href="about.php">
                    About
                  </a>
                </li>
                <li class="list-group-item">
                  <a href="contact.php">
                    Contact us
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2 gap-sm-4 px-1">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('index') }}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Shop Gummy
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ url('shop') }}"><i class="fa-solid fa-gift me-2 text-danger"></i> Birthday Gummys</a></li>
                  <li><a class="dropdown-item" href="{{ url('shop') }}"><i class="fa-solid fa-gift me-2 text-success"></i> Gummys</a></li>
                  <li><a class="dropdown-item" href="{{ url('shop') }}"><i class="fa-solid fa-gift me-2" style="color: purple;"></i> Graduation Gummys</a></li>
                  <li><a class="dropdown-item" href="{{ url('shop') }}"><i class="fa-solid fa-gift me-2" style="color: brown;"></i> Chocolates</a></li>
                  <li><a class="dropdown-item" href="{{ url('shop') }}"><i class="fa-solid fa-gift me-2" style="color: yellow;"></i> Mix & Match</a></li>
                  <li><a class="dropdown-item" href="{{ url('shop') }}"><i class="fa-solid fa-gift me-2 text-primary"></i> Branded Snacks</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('popup') }}">Fundrasingn</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="custom-option.php">Custom option</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kidz_biz.php">Kidz biz 101</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>
          </div>
          <div class="d-flex">
            <ul class="d-inline-flex align-items-center list-unstyled ps-0 gap-2 gap-sm-4 mb-0">
              <li class="nav-item">
                <a class="nav-link text-theme" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <span class="fa-stack" style="vertical-align: top;">
                      <i class="fa-solid fa-circle fa-stack-2x"></i>
                      <i class="fa-solid fa-bag-shopping fa-stack-1x fa-inverse"></i>
                      <span class="fa-layers-counter"></span>
                    </span>
                  </a>
              </li>
              <li class="nav-item">
                @if(Auth::user())
                <a href="{{ url('my-account') }}" class="my-btn d-block w-100">My Account</a>
                  @else
                  <a class="nav-link fw-semibold text-theme" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign in</a>
                  {{-- <a href="{{ url('login/b') }}" class="my-btn d-block w-100">Sign in</a> --}}
                  @endif
              </li>
              <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
              </button> -->
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  @yield('front_section')

  @include('front_include.cart')
  @include('admin.layout.javascript')
  <footer class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h2>Fundraise</h2>
                <ul class="footer-list">
                    <li><a href="fundraising.php">Virtual Fundraising</a></li>
                    <li><a href="">Brochure Option</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2>shop</h2>
                <ul class="footer-list">
                    <li><a href="shop.php">Shop Gummy</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2>About</h2>
                <ul class="footer-list">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="">Careers</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2>Need more help?</h2>
                <ul class="footer-list">
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <ul class="footer-social-list">
                <li><a href="https://www.facebook.com/GummysRUs"><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/gummysrus"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
<div id="loader" class="d-none">
    <img src="{{asset('front_assets/loader.gif')}}">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.manage-address').click(function(event) {
        event.preventDefault();
        $('button[data-bs-target="#nav-address"]').click();
    });
    // navigation
    $(function() {
        var current = window.location.href;
        $('.navbar-nav .nav-item .nav-link').each(function() {
            if (this.href === current) {
                $(this).addClass('active');
            }
        })
    });

    // carousels
    $(document).ready(function() {
        $("#charity-carousel").owlCarousel({
            autoplay: true,
            items: 3,
            nav: true,
            rewind: true,
            navSpeed: 550,
            autoplaySpeed: 550,
            responsive: {
                1200: {
                    items: 3,
                },
                991: {
                    items: 2,
                },
                756: {
                    items: 1,
                },
                300: {
                    items: 1,
                },
            },
        });
        $("#shop-carousel").owlCarousel({
            autoplay: true,
            items: 2,
            nav: true,
            rewind: true,
            navSpeed: 550,
            autoplaySpeed: 550,
            responsive: {
                1200: {
                    items: 2,
                },
                991: {
                    items: 2,
                },
                756: {
                    items: 1,
                },
                300: {
                    items: 1,
                },
            },
        });
        $("#shop-carousel .owl-nav .owl-next").html('<i class="fa-solid fa-angle-right"></i>');
        $("#charity-carousel .owl-nav .owl-next").html('<i class="fa-solid fa-angle-right"></i>');
        $("#charity-carousel .owl-nav .owl-prev").html('<i class="fa-solid fa-angle-left"></i>');


        // Product Gallery
        $('.product-gallery .image').on('click', function() {
            var self = $(this);
            var src = self.find('img').attr('src');

            $('.product-gallery .image').each(function() {
                // console.log(index);
                $(this).removeClass('active');
            });

            self.addClass('active');

            $('.product-image .main-img').css('opacity', '0');

            setTimeout(function() {
                $('.product-image .main-img').attr('src', src);
            }, 500);

            setTimeout(function() {
                $('.product-image .main-img').delay(2000).css('opacity', '1');
            }, 500);
        });

        // cart
        var quantity = Number($(".cart .offcanvas-body .item-box .info .quantity p").text());
        if (quantity <= 1) {
            $(".cart .offcanvas-body .item-box .info .quantity button.fa-minus").attr("disabled", 'true');
        }
        $(".cart .offcanvas-body .item-box .info .quantity button").on("click", function() {
            var Squantity = Number($(this).closest('.quantity').find('p').text());
            if ($(this).hasClass('fa-plus')) {
                Squantity = Squantity + 1;
                $(this).closest('.quantity').find('p').text(Squantity);
                $(this).closest('.quantity').find('button.fa-minus').attr("disabled", null);
            }
            if ($(this).hasClass('fa-minus')) {
                if (Squantity <= 1) {
                    $(this).attr("disabled", 'true');
                    return false;
                } else {
                    Squantity = Squantity - 1;
                    $(this).closest('.quantity').find('p').text(Squantity);
                }
            }
        });




            $('.payment-card').hide();
        $(document).ready(function() {

        $('.checkout-form .form-control').on('keyup keydown keypress', function() {
            var inputs = $('.checkout-form .validate');
            const allFiled = Array.from(inputs).every(input => input.value !== "");
            $(this).closest('.checkout-form').find('#continue').attr('type', 'button');
            $(this).closest('.checkout-form').find('.verify').slideUp();
            $(this).closest('.checkout-form').find('#edit').fadeOut();
            if (allFiled) {
                $(this).closest('.checkout-form').find('#continue').attr('disabled', null);
                // console.log("done");
            } else {
                $(this).closest('.checkout-form').find('#continue').attr('disabled', true);
            }
        });
        $('.checkout-form #continue').on('click', function() {
            $(this).closest('.checkout-form').find('#edit').fadeIn();
            var address = $(this).closest('.checkout-form').find('#address').val();
            var appartment = $(this).closest('.checkout-form').find('#appartment').val();
            var city = $(this).closest('.checkout-form').find('#city').val();
            var state = $(this).closest('.checkout-form').find('#state').val();
            var zip = $(this).closest('.checkout-form').find('#zip').val();
            $(this).closest('.checkout-form').find('.verify #verify_addre').text(address + ", " + appartment);
            $(this).closest('.checkout-form').find('.verify #verify_city').text(city + ", " + state + ", " + zip);
            $(this).closest('.checkout-form').find('.verify').fadeIn();
            setTimeout(() => {
                $(this).attr('type', 'submit');
            }, 1000);
            $('.payment-card').show();
            $('#continue').hide();
        });
        $('.checkout-form #edit').on('click', function() {
            var focus = $(this).closest('.checkout-form').find('#address');
            focus.focus();
            var pos = focus.position().top;
            $('html, body').animate({
                scrollTop: pos - 100
            }, 200);
            $(this).closest('.checkout-form').find('.verify').slideUp();
            $(this).closest('.checkout-form').find('#continue').attr('type', 'button');
        });

        $('#gift').on('click', function(){
            if($('#gift:checked').length > 0){
                $('.gift-option').fadeIn();
            }
            else{
                $('.gift-option').fadeOut();
            }
        });

        $('#gift-option').on('change', function(){
            if($(this).val() == 'custom Option'){
                $('.customOption').fadeIn();
            }
            else{
                $('.customOption').fadeOut();
            }
        });

        $('.dropzone-btn').on('click', function(e) {
            e.preventDefault();
            $(".dz-button").click();
        });
    });

var total_pay = $('.total_pay').text();
        console.log(total_pay);
        $('#card-button').html('<i class="fas fa-lock me-2"></i> Pay ' + total_pay);

    });


</script>

</body>

</html>
