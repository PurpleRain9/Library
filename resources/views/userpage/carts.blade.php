<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carts</title>
    @include('userpage.css')
</head>

<body>
    @include('userpage.header')
    <div class="container">
        <div class="row">
            <div class="card p-0 cart-div">
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissable">
                        <strong>Success!</strong>
                        {{session('delete')}}
                    </div>
                @endif
                <div class="card-header">
                    <h2 class="card-title text-center">YOUR CARTS</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Books-Title</th>
                                <th>Books-Price</th>
                                <th>Books-Photo</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalprice = 0;
                            @endphp
                            @foreach ($cart as $carts)
                                <tr>
                                    <td>
                                        <p>{{ $carts->product_title }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $carts->price }}$</p>
                                    </td>
                                    <td>
                                        <img src="/product_image/{{ $carts->image }}" alt="" width="70px"
                                            style="object-fit:contain;">
                                    </td>
                                    <td>
                                        <p>{{ $carts->quantity }}</p>
                                    </td>
                                    <td>
                                        <a href="{{url('/user-card-remove',$carts->id)}}" class="btn btn-danger">Remove</a>
                                    </td>
                                </tr>
                                @php
                                    $totalprice = $totalprice + $carts->price;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="totalprice_and_cashbtn">
                        <div class="totalprice">
                            <h3>TOTAL PRICES = {{$totalprice}}$</h3>
                        </div>
                        <div class="cash">
                            <a href="{{url('/user-order-view')}}" class="btn btn-primary">Order Books</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('userpage.footer')
    @include('userpage.script')
</body>

</html>
