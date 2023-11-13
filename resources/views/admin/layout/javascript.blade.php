<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script>
    $(document).ready(function() {

        fetch_cart();


        $('#add_to_cart').on('submit', function(event) {

            event.preventDefault();

            $.ajax({
                url: '{{ url('add_to_cart') }}', // Change this to your route URL
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    if (data == 1) {
                        fetch_cart()
                        $('.offcanvas').addClass('show');
                    } else {

                    }
                },
            });
        });



        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
            // alert(page);
        });
        // fetch_cart();

    });


    function fetch_data(page) {
        $.ajax({

            url: "http://localhost/Doublegood/public/pagination/fetch_data?page=" + page,
            success: function(data) {
                // console.log(data);
                $('#product_html').html(data);


            }
        });
    }



    // function fetch_data(page) {
    //     $_token = "{{ csrf_token() }}";
    //     $.ajax({
    //  	headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
    //         // url: "{{ route('product') }}",
    //         url:"/pagination/fetch_data?page="+page,
    //         type: 'GET',
    //     cache: false,
    //     data: {'_token': $_token },
    //     datatype: 'html',
    //     beforeSend: function() {
    //         //something before send
    //     },
    //     success: function(data) {
    //         // console.log(data);
    //         $('#product_html').html(data);
    //     }
    //     });
    // }

    function remove_cart(id){
                            alert(id)
                            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({

            url: '{{ url('remove_cart') }}',
            type: 'POST',
        cache: false,
        data: {id:id },
        success: function(data) {
            if (data==1) {
                fetch_cart();
            }
            // $('#product_html').html(data);
        }
        });

                        }
                        function fetch_cart(){

                            $('.append_cart').empty();

$.ajax({

    url: '{{ url('fetch_cart') }}',
    success: function(cart) {
        console.log(cart);
        $('.append_cart').append(cart)



        var quantity = Number($(
                ".cart .offcanvas-body .append_cart .item-box .info .quantity p")
        .text());
        let p_price = $(".price .add_price").text();
        if (quantity <= 1) {
            $(".cart .offcanvas-body .append_cart .item-box .info .quantity button.fa-minus")
                .attr("disabled",
                    'true');
        }

        $(".cart .offcanvas-body .append_cart .item-box .info .quantity button").on("click",
            function() {

                var Squantity = Number($(this).closest('.quantity').find('p').text());
                var price = $(this).closest('.item-box').find('.price .p_price').val();

                // console.log(new_price);
                var sum = 0;

                if ($(this).hasClass('fa-plus')) {
                    Squantity = Squantity + 1
                    var new_price = price * Squantity;
                    $(this).closest('.item-box').find('.price .add_price').text(new_price);
                    $(this).closest('.item-box').find('.qty_price').val(Squantity);




                    $(this).closest('.quantity').find('p').text(Squantity);
                    $('.price .add_price').each(function(){
                        sum += parseFloat($(this).text());
                    });
                    $('.subtotal_price').text('$ '+sum);

                    $(this).closest('.quantity').find('button.fa-minus').attr(
                        "disabled", null);
                }
                if ($(this).hasClass('fa-minus')) {
                    if (Squantity <= 1) {
                        $(this).attr("disabled", 'true');
                        return false;
                    } else {
                        Squantity = Squantity - 1;
                    var new_price = price * Squantity;

                        $(this).closest('.item-box').find('.price .add_price').text(new_price);
                        $(this).closest('.item-box').find('.qty_price').val(Squantity);

                        $(this).closest('.quantity').find('p').text(Squantity);

                    $('.price .add_price').each(function(){
                        sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                    });
                    $('.subtotal_price').text('$ '+sum);
                }
                }

            });

    }
});


}
</script>
