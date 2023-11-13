
@foreach($items as $data)

<div class="col-lg-4 col-md-6 mb-4">
    <div class="box">
        <img src="{{ asset('product_image/'.$data->thumb_image) }}" alt="" class="w-100">
        <div class="d-flex justify-content-between align-items-end">
            <div class="text">
                <h6 class="price">$ {{ $data->price_1 }} <span>$120.00</span></h6>
                <h5><a href="{{ url('product-detail/'.$data->id) }}">{{ @$data->product_name }}</a></h5>
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
@endforeach


{!! $items->links() !!}
