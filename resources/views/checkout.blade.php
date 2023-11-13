@extends('front_include.header')
@section('front_section')

<script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>

<main>
    <div class="container">
        <div class="row mt-5">
            <a href="shop.php" class="cart-btn w-auto"> <i class="fas fa-arrow-left"></i> Continue Shopping</a>
        </div>
    </div>

    <section class="checkout mt-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-capitalize">Checkout</h4>
                    <hr class="mt-5" style="color: gray;">
                    <p class="text-uppercase mt-5 mb-5">information > <span class="text-body-tertiary">payment method</span></p>
                    <h3 class="fw-semibold mb-5">Information</h3>
                    <form action="{{ url('save_order') }}" id="save_order" method="POST" class="contact-form checkout-form p-0 bg-transparent" enctype="multipart/form-data">
                        @csrf
                        <h5 class="dark text-capitalize fw-semibold text-dark fs-5 mb-4">contact information</h5>
                        <input type="email" class="form-control validate" name="email" id="email" placeholder="Email Address*">
                        <input type="number" class="form-control validate" name="phone" id="phone" placeholder="Phone number*">
                        <input type="hidden" name="order_id" id="order_id">


                        <h5 class="dark text-capitalize fw-semibold text-dark fs-5 mb-4 mt-5 pt-2">Shipping address</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="name" class="form-control validate" name="first_name" id="first_name" placeholder="First Name*" value="{{ old('first_name') }}">
                            </div>
                            <div class="col-lg-6">
                                <input type="name" class="form-control validate" name="last_name" id="last_name" placeholder="Last Name*" value="{{ old('last_name') }}">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Street Address*" value="{{ old('address') }}">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="form-control validate" name="appartment" id="appartment" placeholder="Appartment / Suite / Unit*" value="{{ old('appartment') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control validate" name="city" id="city" placeholder="City*" value="{{ old('city') }}">
                            </div>
                            <div class="col-lg-4">
                                <select name="state" id="state" class="form-control form-select validate">
                                    <option value="sindh">Sindh</option>
                                    <option value="punjab">punjab</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <input type="number" class="form-control validate" name="zip" id="zip" placeholder="Zip code*" value="{{ old('zip') }}">
                            </div>
                            <div class="col-12">
                                <input type="file" class="form-control form-control-sm" name="box_cover" accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="col-lg-12 mt-3">
                                <input type="checkbox" name="gift" id="gift" value="{{ old('first_name') }}">
                                <label for="gift" class="ms-2">This is a gift</label>
                            </div>
                            <div class="col-12 gift-option mt-3">
                                <select name="gift_option" id="gift-option" class="form=control form-select" value="{{ old('gift_option') }}">
                                    <option value="birthday">-- Select Option --</option>
                                    <option value="birthday gummy">BIRTHDAY GUMMY'S</option>
                                    <option value="graduation gummy">GRADUATION GUMMY'S</option>
                                    <option value="custom Option">Custom Option</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3 customOption">
                                <textarea name="custom_option" id="custom_option" cols="20" rows="5" class="form-control" placeholder="Custom Option" value="{{ old('custom_option') }}"></textarea>
                            </div>
                            <hr style="color: gray;" class="mt-4">


                            <div class="row">
                                <div class="verify col-12" style="display: none;">
                                    <h5 class="dark text-capitalize fw-semibold text-dark fs-5 mb-4 mt-5 pt-2">Verify Shipping address</h5>
                                    <p>We could not verify your shipping address please edit</p>

                                    <input type="radio" name="orgi_address" id="orgi_address" value="{{ old('orgi_address') }}">
                                    <label for="orgi_address" class="mb-3">Original Address</label>
                                    <p id="verify_addre" class="ms-3 mb-1">SKAdfguasyf</p>
                                    <p id="verify_city" class="ms-3">adsukgfua</p>
                                </div>


                                <div class="col-lg-6 text-end mt-5">
                                    <button type="button" style="display: none;" id="edit" class="cart-btn ms-auto">Edit Shipping Address</button>
                                </div>
                                <div class="col-lg-6 text-end mt-5">
                                    <button type="button" id="continue" disabled class="blue-btn ms-auto">Continue to Payment method</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-semibold">Order Summary</h3>
                    <p class="mb-5">50% of each purchase benefots the Double Good Kids Foundation</p>

                    @foreach ($cart as $item)

                    <div class="item-box d-flex gap-3 mb-5">
                        <div class="image">
                            <img src="{{ asset('product_image/'.$item->thumb_image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="info">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <h6 class="mb-1">{{ @$item->product_name }}</h6>
                                    <p class="mb-0">Sent to essential workers</p>
                                </div>
                                <div class="price">
                                    <p>${{ @$item->total_price }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <p class="mb-0">Qty: {{ @$item->quantity }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="item-box d-flex gap-3 mb-5">
                        <div class="image">
                            <img src="{{ asset('images/toys-2.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="info">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <h6 class="mb-1">Butter believe it!</h6>
                                </div>
                                <div class="price">
                                    <p>$20</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <p class="mb-0">Qty: 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="item-box d-flex gap-3 mb-5">
                        <div class="image">
                            <img src="assets/images/toys-3.png" alt="" class="img-fluid">
                        </div>
                        <div class="info">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <h6 class="mb-1">Chi Town</h6>
                                </div>
                                <div class="price">
                                    <p>$20</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <p class="mb-0">Qty: 2</p>
                            </div>
                        </div>
                    </div> --}}

                    <hr class="mb-4" style="color: gray;">
                    <div class="d-flex justify-content-between">
                        <p>Subtotal</p>
                        <p>$ {{ @$subtotal }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Tax</p>
                        <p class="text-body-secondary">$0.0</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Shipping</p>
                        <p>$0.0</p>
                    </div>
                    <p class="mt-3">Estimate delivery: {{ @$deliv_start_date }} - {{ @$deliv_end_date }}</p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>Total</p>
                        <p class="total_pay">$ {{ @$subtotal }}</p>


   </div>
                    <div class="payment-card bg-light p-5 rounded-5">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="custom_pay">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Fund Payment</label>
                          </div>
<div class="my_blance">

    <h5 class="dark text-capitalize fw-semibold text-dark fs-5 mb-4">My Blance : ${{ @$blance }}</h5>
<button type="button" class="btn btn-primary blance_pay">Pay Now</button>

</div>
                          <div id="payment-form" >
                            <h5 class="dark text-capitalize fw-semibold text-dark fs-5 mb-4">Payment Information</h5>
                            <div id="card-container"></div>
                            <button id="card-button" class="blue-btn w-100" type="button"></button>
                            <div id="payment-status-container"></div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<input type="hidden" value="{{ @$subtotal }}" id="subtotal_check">
<input type="hidden" value="{{ @$blance }}" id="blance">



<script type="module">


    const payments = Square.payments('sandbox-sq0idb-JwLhf-U6zz3eYvInhT6t_A', 'L8TND7DB25H58');
    const card = await payments.card();
    await card.attach('#card-container');

    const cardButton = document.getElementById('card-button');
    cardButton.addEventListener('click', async () => {
        $('#loader').removeClass('d-none');


        const statusContainer = document.getElementById('payment-status-container');

        try {
            const result = await card.tokenize();
            if (result.status === 'OK') {
                // console.log(`Payment token is ${result.token}`);
                // alert("Payment Successful");
                $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
                jQuery.ajax({
                    url:  '{{ url('process-payment') }}',
                    method: "POST",
                    data: {
                        token: result.token
                    },

                    success: function(response) {
                        $('#loader').addClass('d-none');

                        // console.log(response);

                        var responseObject = JSON.parse(response);
                       var order_id = responseObject.payment.order_id;
                       var status = responseObject.payment.status;

                        if(status=='COMPLETED'){
                                $('#order_id').val(order_id);
                                $('#save_order').submit();
                        }else{
                        console.log('Failed!');

                        }

                    }
                });
            } else {
                let errorMessage = `Tokenization failed with status: ${result.status}`;
                if (result.errors) {
                    errorMessage += ` and errors: ${JSON.stringify(
              result.errors
            )}`;
                }

                throw new Error(errorMessage);
            }
        } catch (e) {
            console.error(e);
            statusContainer.innerHTML = "Payment Failed";
        }
    });

$('#custom_pay').click(function(){
    if ($('#custom_pay').is(':checked')) {
        // alert('on')
    $('#payment-form').hide();

    $('.my_blance').show();

}else{
    $('.my_blance').hide();

        $('#payment-form').show();


    }
})

$(document).ready(function(){
    $('.my_blance').hide();

    $('.blance_pay').click(function(){
          var blance =  $('#blance').val();
          var subtotal_check =  $('#subtotal_check').val();

    if(subtotal_check <= blance){

        $('#order_id').val(0);
        $('#save_order').submit();

    }else{
            alert('Checkout Amount must be less than Blance!');
            }



        })

});
</script>


@endsection
