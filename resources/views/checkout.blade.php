<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Toko Buku Habib</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row align-items-start">
            <h1 class="my-3">Toko Buku Habib</h1>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images') }}/{{  "1.png" }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Detail Pesanan</h5>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $order->name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor HP</td>
                                <td>: {{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $order->address }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Pesanan</td>
                                <td>: {{ $order->quantity }}</td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>: {{ $order->total_price }}</td>
                            </tr>
                        </table>
                        <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
                        <a href="#" class="btn btn-primary" id="pay-button">Bayar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                    <div id="snap-container"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
    </script>
</body>
</html>