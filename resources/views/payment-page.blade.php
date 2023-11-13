<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- <link rel="stylesheet" href="app.css" preload> -->
  <script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
  <div id="payment-form">
    <div id="card-container"></div>
    <button id="card-button" type="button">Pay</button>
    <div id="payment-status-container"></div>
  </div>
  <script type="module">
    const payments = Square.payments('sandbox-sq0idb-JwLhf-U6zz3eYvInhT6t_A', 'L8TND7DB25H58');
    const card = await payments.card();
    await card.attach('#card-container');

    const cardButton = document.getElementById('card-button');
    cardButton.addEventListener('click', async () => {
      const statusContainer = document.getElementById('payment-status-container');

      try {
        const result = await card.tokenize();
        if (result.status === 'OK') {
          console.log(`Payment token is ${result.token}`);
          alert("Payment Successful");
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
          jQuery.ajax({
            url:"{{ url('process-page') }}",
            method:"POST",
            data:{token:result.token},
            success:function(response) {
              console.log(response);
              console.log(result.token);
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
  </script>
</body>

</html>
