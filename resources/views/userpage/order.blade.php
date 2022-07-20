<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    @include('userpage.css')
</head>

<body>
    @include('userpage.header')
    <div class="container">
        <div class="row">
            <div class="card p-0 order_card">
                @if (session('order'))
                    <div class="alert alert-success alert-dismissable fs-2">
                        <strong>Success!</strong>
                        {{ session('order') }}
                    </div>
                @endif
                <div class="card-header">
                    <h2>Please! Cash Order</h2>
                </div>
                <div class="card-body">
                    <div class="aya-div">
                        <h2 class="aya-banking">AYA Banking Account</h2>
                        <div class="ayapadncode" id="aya-div-cash">
                            <p class="" id="aya-code">1234567891234567</p>
                            <button id="aya-copy"><i class="fas fa-clone"></i></button>
                        </div>
                    </div>
                    <div class="wave-div">
                        <h2 class="wave-banking">Wave Money Account</h2>
                        <div class="wavepadncode" id="wave-div-cash">
                            <p class="" id="wave-code">09259722783</p>
                            <button id="wave-copy"><i class="fas fa-clone"></i></button>
                        </div>
                    </div>
                    <div class="wave-div">
                        <h2 class="wave-banking">K-pay Account</h2>
                        <div class="wavepadncode" id="k-div-cash">
                            <p class="" id="k-code">09259722783</p>
                            <button id="k-copy"><i class="fas fa-clone"></i></button>
                        </div>
                    </div>
                    <div class="kbz-div">
                        <h2 class="kbz-banking">KBZ Banking Account</h2>
                        <div class="kbzpadncode" id="kbz-div-cash">
                            <p class="" id="kbz-code">1234567891234569</p>
                            <button id="kbz-copy"><i class="fas fa-clone"></i></button>
                        </div>
                    </div>
                    <form action="{{ url('/user-order') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="slip">Please! enter deposit slip photo</label>
                            <input type="file" name="slip"
                                class="form-control @error('slip') is-invalid @enderror">
                            @error('slip')
                                <div class="invalid-feedback">
                                    <i>{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Order Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('userpage.footer')
    @include('userpage.script')
</body>

</html>
