<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link rel="stylesheet" href=" {{ asset('front_assets/css/style.css') }} ">

    <title>Dashboard | fundraising</title>
</head>

<body>
    <header class="dasboard-header">

        <div class="offcanvas offcanvas-end rounded-0" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header justify-content-end mt-4">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div class="profile d-flex align-items-center gap-4">
                    <div class="icon text-black">
                        MA
                    </div>
                    <div class="name">
                        Melinda Albert
                    </div>
                </div>
                <div class="main">
                    <div class="box">
                        <a href=""><i class="fa-solid fa-layer-group me-3"></i> Fundraising Events</a>
                    </div>
                    <div class="box">
                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample1" aria-controls="offcanvasExample1"><i class="fa-solid fa-user me-3"></i> Account Settings</a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer">
                <a href="{{ url('b_logout') }}" class="d-block bg-danger bg-opacity-10 py-2 px-3 rounded-2"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
            </div>
        </div>

        <div class="offcanvas offcanvas-end rounded" tabindex="-1" id="offcanvasExample1" aria-labelledby="offcanvasExampleLabel1">
            <div class="offcanvas-header p-0 mt-4">
                <button type="button" class="btn-close fas fa-arrow-left" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></button>
            </div>

            <div class="offcanvas-body p-0 pt-4">
                <div class="text-dark fs-3 fw-semibold mb-5">Account Settings</div>
                <form action="" method="post" class="account-form">
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-4">Personal infromation</h2>
                        <a href="#" id="edit" class="text-theme">Edit</a>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="Melinda" id="name" name="name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" value="Albert" id="last_name" name="last_name" class="form-control" readonly>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="text-theme border-0 outline-0 bg-transparent" style="display: none;">Update</button>
                    </div>
                </form>

                <form action="" method="post" class="account-form mt-5">
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-4">Contact infromation</h2>
                        <a href="#" id="edit1" class="text-theme">Edit</a>
                    </div>
                    <div class="form-group">
                        <label for="number">Mobile number</label>
                        <input type="number" value="12364565237" id="number" name="number" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" value="email@address.com" id="email" name="email" class="form-control" readonly>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="text-theme border-0 outline-0 bg-transparent" style="display: none;">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <h5 class="text-theme fw-bold"><a href="index.php">LOGO HERE</a></h5>
                    </div>
                    <div class="">
                        <button class="btn dashboard-btn text-black" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            MA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

@yield('virtual_dashboard_section')

<div class="modal join_event_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Join Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="Enter Event Code" id="event_code">
            </div>

              <p class="code_message">Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary join_now">Join Now</button>
          <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




<footer class="dashboard-footer">
    <div class="container">
        <div class="footer-top d-flex justify-content-between flex-wrap">
            <div class="link text-sm-center">
                <p class="mb-0">Need Help? <a href="#">Contact Us</a></p>
            </div>
            <ul class="footer-social-list p-0">
                <li><a href="https://www.facebook.com/GummysRUs"><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/gummysrus"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
        <div class="copyrights">

        </div>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#edit").on('click', function(event) {
            event.preventDefault();
            $(this).closest('form').find('.form-control').attr('readonly', null);
            $(this).closest('form').find('.form-group').css('border', '1px solid #fc7300');
        });
        $("#edit1").on('click', function(event) {
            event.preventDefault();
            $(this).closest('form').find('.form-control').attr('readonly', null);
            $(this).closest('form').find('.form-group').css('border', '1px solid #fc7300');
        });
        $(".account-form .form-control").on("keydown", function() {
            // alert("done")
            $(this).closest('.account-form').find('button[type="submit"]').fadeIn();
        })


   });
</script>
<script>
    $(document).ready(function() {
        $(".event-form .event_form .form-1 .form-control").on("keyup keydown keypress focus blur", function() {
            var value = $(this).val();
            if (value !== "") {
                $(this).closest('.form-1').find('.blue-btn').css({
                    'visibility': 'visible',
                    'opacity': '1'
                });
            } else {
                $(this).closest('.form-1').find('.blue-btn').css({
                    'visibility': 'hidden',
                    'opcaity': '0'
                });
            }
        });
        $(".event-form .event_form .form-2 input").on("keyup keydown keypress focus blur", function() {
            var value = $(this).val();
            if (value !== "") {
                $(this).closest('.form-2').find('.blue-btn').css({
                    'visibility': 'visible',
                    'opacity': '1'
                });
            } else {
                $(this).closest('.form-2').find('.blue-btn').css({
                    'visibility': 'hidden',
                    'opcaity': '0'
                });
            }
        });
        $(".event-form .event_form .form-3 input").on("keyup keydown keypress focus blur", function() {
            var value = $(this).val();
            if (value !== "") {
                $(this).closest('.form-3').find('.blue-btn').css({
                    'visibility': 'visible',
                    'opacity': '1'
                });
            } else {
                $(this).closest('.form-3').find('.blue-btn').css({
                    'visibility': 'hidden',
                    'opcaity': '0'
                });
            }
        });
        $(".event-form .event_form .form-4 input").on("focus blur", function() {
            var value = $(this).val();
            if (value !== "") {
                $(this).closest('.form-4').find('.blue-btn').css({
                    'visibility': 'visible',
                    'opacity': '1'
                });
            } else {
                $(this).closest('.form-4').find('.blue-btn').css({
                    'visibility': 'hidden',
                    'opcaity': '0'
                });
            }
        });


        $(".event-form .event_form .form-1 .blue-btn").on("click", function() {
            $(this).closest(".form-1").fadeOut(400);
            $('.form-2').delay(400).fadeIn();
        });
        $(".event-form .event_form .form-2 .blue-btn").on("click", function() {
            $(this).closest(".form-2").fadeOut(400);
            $('.form-3').delay(400).fadeIn();
        });
        $(".event-form .event_form .form-3 .blue-btn").on("click", function() {
            $(this).closest(".form-3").fadeOut(400);
            $('.form-4').delay(400).fadeIn();
        });

        $('.form-2 .form-group select').change(function() {
            $(this).closest('.form-group').next().css({
                'visibility': 'visible',
                'opacity': '1'
            });
            $(this).closest('input').css({
                'visibility': 'visible',
                'opacity': '1'
            });
        });

        $("#dropdown").on('click', function() {
            $(".custom-dropdown").toggleClass("show");
        });

        $(".join_event_modal").on('click', function() {
            $('.join_event_popup').modal('show');
        });
        $(".close").on('click', function() {
            $('.join_event_popup').modal('hide');
        });
        $('.dropzone-btn').on('click', function(e) {
            e.preventDefault();
            $(".dz-button").click();
        });
        $(".join_now").on('click', function() {
            const event_code = $('#event_code').val();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
            type: 'post',
            url: '{{ url("join_event_code") }}',
            data: {event_code : event_code},
            success: function (data) {
                if (data=='done') {
                    alert('Event Join Successfully!');
                    window.location.reload();
                }else{
                    $('.code_message').html(data)
                }


            },


        });


    });
});

function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}

</script>
</body>

</html>
