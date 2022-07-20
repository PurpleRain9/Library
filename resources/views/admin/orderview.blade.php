@extends('layouts.app')

@section('content')
    <div class="container-fluid ad_order">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">View Orders</h1>
            </div>
            <div class="card-body">
                <div class="order_search my-3">
                    <form action="{{ url('/search-order') }}" method="GET">
                        @csrf
                        <input type="text" name="search" placeholder="serch for something">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Names</th>
                            <th>Quantity</th>
                            <th>Prices</th>
                            <th>Product Photos</th>
                            <th>Slip</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>delivered</th>
                            <th>Paid</th>
                            <th>Send Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order as $orders)
                            <tr>
                                <td>
                                    <p>{{ $orders->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->email }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->phone }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->address }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->product_title }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->quantity }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->price }}</p>
                                </td>
                                <td>
                                    <img src="/product_image/{{ $orders->image }}" width="50px" alt="">
                                </td>
                                <td>
                                    <img src="/slip_images/{{ $orders->slip }}" alt="" width="50px">
                                </td>
                                <td>
                                    <p>{{ $orders->payment_status }}</p>
                                </td>
                                <td>
                                    <p>{{ $orders->delivery_status }}</p>
                                </td>
                                <td>
                                    <a href="{{ url('/order-delivered', $orders->id) }}"
                                        class="btn btn-success">Delivered</a>
                                </td>
                                <td>
                                    <a href="{{ url('/order-paid', $orders->id) }}" class="btn btn-primary">Paid</a>
                                </td>
                                <td>
                                    <a href="{{ url('/email-send-view', $orders->id) }}" class="btn btn-info">Email</a>
                                </td>
                            </tr>
                        @empty
                            <tr colspan = "16">
                                <td class="text-center fs-2 fw-bold">
                                    Data Not Found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
                <div class="paginate">
                    {!!$order->withQueryString()->links('pagination::bootstrap-5')!!}
                </div>
            </div>
            
        </div>
        <div class="container">
            <br />
            <hr />
        </div>
        <div class="copy-sign text-center">
            <p class="text-muted">Design by Hein Minn Aung, &copy;copy right all reverse.</p>
        </div>
    </div>
@endsection
