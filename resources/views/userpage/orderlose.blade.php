<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order-end</title>
    @include('userpage.css')
</head>

<body>
    @include('userpage.header')

    <div class="container order_end">
        {{-- @foreach ($order as $orders)
            @if ($orders->payment_status == 'Paid') --}}
        {{-- <div class="card bg-success">
                    <div class="card-body">
                        <h1>Your Order Was Successfully</h1>
                        <p>Thank Your For Your Order</p>
                    </div>
                </div> --}}
        {{-- @else --}}
        <div class="card bg-danger">
            <div class="card-body">
                <h1>Thank You For Order</h1>
                <p>But Your Order Was Failed.</p>
            </div>
        </div>
        {{-- @endif
        @endforeach --}}
    </div>

    @include('userpage.footer')
    @include('userpage.script')
</body>

</html>
