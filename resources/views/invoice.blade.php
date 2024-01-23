<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Invoice</title>
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
        <h1 class="my-3">Invoice</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images') }}/{{  "1.png" }}" class="card-img-top" alt="Image">
            <div class="card-body">
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
                    <tr>
                        <td>Status</td>
                        <td>: {{ $order->status }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>