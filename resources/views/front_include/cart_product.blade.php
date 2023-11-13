@if(count($cart)>0)
@foreach ($cart as $item)

<div class="item-box d-flex gap-3 mb-5">
    <div class="image">
        @if($item->thumb_image!=null)
        <img src="{{ asset('product_image/'.$item->thumb_image) }}" alt="" class="img-fluid">
        @else
        <img src="https://via.placeholder.com/350x150" class="img-fluid">
        @endif
    </div>
    <div class="info">
        <div class="d-flex justify-content-between">
            <div class="title">
                <input type="hidden"  name="cart_id[]" value="{{ @$item->id }}">

                <h6 class="mb-1">{{ @$item->product_name }}</h6>
                <p class="mb-0">Sent to essential workers</p>
            </div>
            <div class="price">
                <input type="hidden"  value="{{ @$item->price }}" class="p_price">
                <p> <span class="add_price">{{ @$item->total_price }}</span> $</p>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-end">
            <a href="javascript:void(0)" onclick="remove_cart({{ $item->id }})">Remove</a>
            <div class="d-flex quantity align-items-center gap-4">
                <button type="button" class="fas fa-minus"></button>
                <p class="mb-0">{{ @$item->quantity }}</p>
                <input type="hidden" name="qty[]" class="qty_price" value="{{ @$item->quantity }}">
                <button type="button" class="fas fa-plus"></button>
            </div>
        </div>
    </div>
</div>
@endforeach
<hr style="color: grey;">
<div class="subtotal d-flex justify-content-between">
    <p class="fw-bold">Subtotal</p>
    <p class="subtotal_price">$ {{ @$price }} </p>
</div>

   <button type="submit"  class="my-btn w-100">Checkout</button>
@else
No Cart Found
@endif