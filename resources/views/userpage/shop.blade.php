<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>
    @include('userpage.css')
</head>

<body>
    {{-- Header Start --}}
    @include('userpage.header')
    {{-- Header End --}}
    <div class="about-page-div container-fluid">
        <h2 class="text-center">BOOKS SHOP</h2>
        <p class="text-center">
            <a href="{{ url('/') }}" class="ms-1">Home</a>
            /
            <a href="{{ url('/user-shop') }}" class="text-dark">Shop</a>
        </p>
    </div>
    <div class="main-shop container">

        {{-- Best Seller Start --}}

        <div class="best-seller">
            <div class="best-seller-title text-center mt-3">
                <h3>Best Seller Books</h3>
            </div>
            <div class="nextandprev-best">
                <div class="fa-solid fa-angle-left prev"></div>
                <div class="fa-solid fa-angle-right next"></div>
            </div>
            <div class="best-seller-stand row">
                @foreach ($product as $products)
                    @if ($products->category == 'Best Seller Books')
                        <div class="card col-md-4">
                            <div class="card-body row">
                                <img src="/product_image/{{ $products->image }}" alt=""
                                    class="col-md-8 col-sm-8 col-8" width="200px" />
                                <div class="best-cart col-md-4 col-sm-4 col-4">
                                    <h3>{{ $products->title }}</h3>
                                    <p style="font-weight: bold; margin-bottom:0.5rem; font-size:1.2rem;">
                                        {{ $products->price }} $</p>
                                    <form action="{{url('/user-card-add',$products->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="number" value="1" name="quantity"/>
                                        <button type="submit" class="btn btn-warning">
                                            Cart Book
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

        {{-- Best Seller End --}}

        {{-- New Arrived Start --}}
        <div class="new-arrived">
            <div class="new-arrived-title">
                <h3>New Arrived</h3>
            </div>
            <div class="nextandprev-arrive">
                <div class="fa-solid fa-angle-left pre"></div>
                <div class="fa-solid fa-angle-right nex"></div>
            </div>
            <div class="new-arrived-div row">
                @foreach ($product as $products)
                    @if ($products->category == 'New Arrived Books')
                        <div class="card col-md-6">
                            <div class="card-body new-arrived-stand text-center">
                                <img src="/product_image/{{ $products->image }}" alt="" width="350px" />
                                <div class="arrved-card">
                                    <h2>{{ $products->title }}</h2>
                                    <p style="font-weight: bold; margin-bottom:0.5rem; font-size:1.2rem;">
                                        {{ $products->price }} $
                                    </p>
                                    <form action="{{url('user-card-add',$products->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" value="1" name="quantity"/>
                                        <button type="submit" class="btn btn-warning">
                                            Cart book
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{-- New Arrived End --}}

        <div class="all-books">
            <div class="all-books-title">
                <h3>Other Books</h3>
            </div>
            <div class="nextandprev-all">
                <div class="fa-solid fa-angle-left pres"></div>
                <div class="fa-solid fa-angle-right nexs"></div>
            </div>
            <div class="all-books-div row">
                @foreach ($product as $products)
                    @if ($products->category == 'All Books')
                        <div class="card col-md-3">
                            <div class="card-body all-books-stand">
                                <img src="/product_image/{{ $products->image }}" alt="" width="200px" />
                                <div class="all-books-card">
                                    <h2>$products->title</h2>
                                    <p style="font-weight: bold; margin-bottom:0.5rem; font-size:1.2rem;">
                                        {{ $products->price }} $
                                    </p>
                                    <form action="{{url('user-card-add',$products->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" value="1" name="quantity"/>
                                        <button type="submit" class="btn btn-warning">
                                            Cart book
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- Footer Start --}}
    @include('userpage.footer')
    {{-- Footer End --}}
    @include('userpage.script')
</body>

</html>
