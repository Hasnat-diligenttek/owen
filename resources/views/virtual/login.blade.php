<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
  <link rel="stylesheet" href=" {{ asset('front_assets/css/style.css') }} ">

    <title>Document</title>
</head>

<body>
    <header class="number-login-header py-4">
        <div class="container">
            <div class="row">
                <a href="" class="logo">
                    <h5>LOGO HERE</h5>
                </a>
            </div>
        </div>
    </header>

    <main class="number-form d-flex align-items-center">
        <div class="container">
            @if (Session::has('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@endif
            <form action="{{ url('virtual_login') }}" method="POST">
                @csrf
                <div class="row justify-content-center" id="phone">
                    <div class="col-lg-6">
                        <h3 class="fw-bold fs-1">Enter Phone no</h3>
                        {{-- <p class="mb-5">We sent the 4 digit code to 657-220-6606</p> --}}

                        <input type="number" name="phone" id="code" class="form-control w-50 mb-5 phone">
                        <button type="button" class="continue" onclick="continue_()">Continue</button>
                        <p class="mt-5"> <a href="#" class="text-theme" id="return_msg">  </a></p>

                        {{-- <p class="mt-5">Didn't get code? <a href="#" class="text-theme">More option</a></p> --}}
                    </div>
                </div>


                <div class="row justify-content-center"  id="code_form">
                    <div class="col-lg-6">
                        <h3 class="fw-bold fs-1">Enter the 4 digit code</h3>
                        <p class="mb-5">We sent the 4 digit code to 657-220-6606</p>

                        <input type="number" name="code" id="code" class="form-control w-25 mb-5">
                        <button type="submit" class="">Continue</button>
                        <p class="mt-5">Didn't get code? <a href="#" class="text-theme">More option</a></p>
                    </div>
                </div>
            </form>

        </div>

    </main>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        // alert('gt')
        $('#code_form').addClass('d-none');
    });
    function continue_(){
        send_code();
    }

function send_code() {
    var phone = $('.phone').val();

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
            type: 'post',

            url: '{{ url("send_code") }}',
            data: {phone : phone},
            success: function (data) {
                console.log(data);
                if(data==0) {
                    $('#return_msg').html('Invalid Phone Number');
                }else{
                    $('.continue').hide();
                    $('#phone').addClass('d-none');

                    $('#code_form').removeClass('d-none');
                }
            },

        });
}

</script>
