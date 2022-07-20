<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    @include('userpage.css')
</head>

<body>
   {{-- Header Start --}}
   @include('userpage.header')
   {{-- Header End --}}
    <div class="about-page-div container-fluid">
        <h2 class="text-center">CONTACT US</h2>
        <p class="text-center">
            <a href="{{url('/')}}l" class="ms-1">Home</a>
            /
            <a href="{{url('/user-contact')}}" class="text-dark">Contact</a>
        </p>
    </div>
    <div class="container">
        <div class="card mt-3 form-card-div">
            @if (session('contact'))
                <div class="alert alert-success">
                    <h1>{{session('contact')}}</h1>
                </div>
            @endif
            <form action="{{url('/user-contact-up')}}" method="POST">
                @csrf
                <div class="d-flex row p-5 form-card">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter your name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter your email" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control"
                            placeholder="Enter your phone" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="Enter your address" />
                    </div>
                    <div class="form-group col-md-12">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="5" class="form-control" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Contact</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Footer Start --}}
    @include('userpage.footer')
    {{-- Footer End --}}
    @include('userpage.script')
</body>

</html>