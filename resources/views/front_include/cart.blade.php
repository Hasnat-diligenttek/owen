<div class="offcanvas offcanvas-end rounded-0 cart" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header justify-content-start">
        <button type="button" class="cart-btn" data-bs-dismiss="offcanvas" aria-label="Close"><i
                class="fas fa-arrow-left"></i> Continue shopping</button>
            </div>
            <!--function for helper-->
            
            <p class="text-dark"> {{ Helper::check_blance() }} </p>
            <div class="offcanvas-body mt-5">
        <form method="post" action="{{ url('checkout') }}">
        <h3 class="">Cart</h3>
        <p>50% of each purchase benefits the Double Good Kids Foundation</p>
            @csrf
        <div class="append_cart">
            {{-- <div class="item-box d-flex gap-3 mb-5">
                <div class="image">
                    <img src="assets/images/toys.png" alt="" class="img-fluid">
                </div>
                <div class="info">
                    <div class="d-flex justify-content-between">
                        <div class="title">
                            <h6 class="mb-1">Make a popcorn donation</h6>
                            <p class="mb-0">Sent to essential workers</p>
                        </div>
                        <div class="price">
                            <p>$20</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="#">Remove</a>
                        <div class="d-flex quantity align-items-center gap-4">
                            <button type="button" class="fas fa-minus"></button>
                            <p class="mb-0">0</p>
                            <button type="button" class="fas fa-plus"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-box d-flex gap-3 mb-5">
                <div class="image">
                    <img src="assets/images/toys.png" alt="" class="img-fluid">
                </div>
                <div class="info">
                    <div class="d-flex justify-content-between">
                        <div class="title">
                            <h6 class="mb-1">Make a popcorn donation</h6>
                            <p class="mb-0">Sent to essential workers</p>
                        </div>
                        <div class="price">
                            <p>$20</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="#">Remove</a>
                        <div class="d-flex quantity align-items-center gap-4">
                            <button type="button" class="fas fa-minus"></button>
                            <p class="mb-0">2</p>
                            <button type="button" class="fas fa-plus"></button>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>
        {{-- <hr style="color: grey;">
        <div class="subtotal d-flex justify-content-between">
            <p class="fw-bold">Subtotal</p>
            <p class="subtotal_price">$55</p>
        </div> --}}
        
        <!--<button type="submit"  class="my-btn w-100">Checkout</button>-->
    </form>

    </div>


</div>
