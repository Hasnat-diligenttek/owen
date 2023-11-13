<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <title>Ecomm</title>
</head>
<style>
    #loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #ffffffcf;
}
#loader img{
    position: relative;
    left: 40%;
    top: 40%;
}
    </style>
<body>
    <section class="mt-5">
        <div class="container">
            <div class="row">
            <h1 class="text-center mb-5" style="font-size: 5rem;-webkit-text-stroke: #0a0085; color: rgb(0 55 255 / 20%); -webkit-text-stroke-width: 2px; font-weight: 800;">Payment</h1>
                <div class="col-lg-6">
                    <h4 class="text-capitalize">{{ @$event->team_name }}</h4>
                    <p class="mb-5">Created by {{ @$event->name }} {{ @$event->lastname }}</p>
                    <?php
                    use Illuminate\Support\Facades\Crypt;

                    $encryptedStringID = Crypt::encrypt($event->id);
                    ?>
                    <input type="hidden" value="{{ @$encryptedStringID }}" id="event_id">

                    <div class="">
                        <p>Event starts in</p>
                        <?php
                            $inputDateTime = new DateTime($event->start_date);
                            $currentDateTime = new DateTime();
                            $interval = $inputDateTime->diff($currentDateTime);
                            $days = $interval->format('%a'); // Total days
                            $hours = $interval->format('%h'); // Remaining hours
                            $minutes = $interval->format('%i'); // Remaining minutes
                            // Format the output string
                            $output = "{$days} days {$hours} hours {$minutes} minutes";
                        ?>

                        <h3 class="fw-semibold mb-5">{{ @$output }}</h3>

                        <h3 class="fw-semibold">Details</h3>
                        <hr class="mb-5" style="color: gray;">

                        <div class="d-flex gap-5 mb-4">
                            <p>Start date</p>
                            <strong>
                                <?php $inputDateTime = new DateTime($event->start_date);
                                    $formattedDate = $inputDateTime->format('l F j, Y \a\t g:i a');
                                    echo $formattedDate;?></strong>
                        </div>

                        <div class="d-flex gap-5 mb-4">
                            <p>End date</p>
                            <strong><?php $inputDateTime = new DateTime($event->end_date);
                                $formattedDate = $inputDateTime->format('l F j, Y \a\t g:i a');
                                echo $formattedDate;?></strong>
                        </div>

                        <div class="d-flex gap-5 mb-4">
                            <p>Category</p>
                            <strong>{{ @$event->org_name }}</strong>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="payment-card bg-light p-5 rounded-5">
                        <div id="payment-form">
                            <h5 class="dark text-capitalize fw-semibold text-dark fs-5 mb-4">Payment Information</h5>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input type="number" class="form-control" id="amount" placeholder="Enter Amount*" >
                              </div>

                            <div id="card-container"></div>
                            <button id="card-button" class="blue-btn w-100" type="button"><i class="fas fa-lock me-2"></i> Pay</button>
                            <div id="payment-status-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="loader" class="d-none">
        <img src="{{asset('front_assets/loader.gif')}}">
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>

<script type="module">

  const payments = Square.payments('sandbox-sq0idb-JwLhf-U6zz3eYvInhT6t_A', 'L8TND7DB25H58');
    const card = await payments.card();
    await card.attach('#card-container');

    const cardButton = document.getElementById('card-button');
    cardButton.addEventListener('click', async () => {

            let x = document.getElementById('amount').value;

            let event_id = document.getElementById('event_id').value;

  if (x == "") {
    alert("Name must be filled out");
    return false;
  }else{

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
                    url:  '{{ url('event-payment') }}',
                    method: "POST",
                    data: {
                        token: result.token,
                        amount:x,
                        event_id:event_id
                    },

                    success: function(response) {
                        $('#loader').addClass('d-none');
                        console.log(response);
                        if(response=='DONE'){
                                window.location.href =  '{{ url('event-payment-successful') }}';
                        }else{
                            alert('Please Try Again');
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
    }
});
</script>

</html>
