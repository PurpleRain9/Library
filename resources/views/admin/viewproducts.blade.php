@extends('layouts.app')

@section('content')
    <div class="container view-products">
        <div class="row mb-3 mt-3">
            <div class="card view-products-card p-0">
                <div class="card-header">
                    <h2>VIEW PRODUCTS</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Titles</th>
                                <th>Prices</th>
                                <th>Quantity</th>
                                <th>Categories</th>
                                <th>Images</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $products)
                                <tr>
                                    <td>
                                        <p>{{ $products->title }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $products->price }} $</p>
                                    </td>
                                    <td>
                                        <p>{{ $products->quantity }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $products->category }}</p>
                                    </td>
                                    <td>
                                        <img src="/product_image/{{ $products->image }}" alt="" width="50px">
                                    </td>
                                    <td>
                                        <p>{{ $products->description }}</p>
                                    </td>
                                    <td>
                                        <a href="{{url('/edit-product',$products->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{url('/porduct-delete',$products->id)}}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                        <span>{!! $product->withQueryString()->links('pagination::bootstrap-5') !!}</span>
                    </div>
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
