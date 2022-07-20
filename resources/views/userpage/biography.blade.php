<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biography</title>
    @include('userpage.css')
</head>

<body>
    @include('userpage.header')
    <div class="container">
        <div class="row">
            @include('userpage.libraryheader')
            <div class="library_search mt-2">
                <label for="">
                    <i class="las la-search"></i>
                </label>
                <input type="text" class="form-control p-2" placeholder="Search for item" id="search">
            </div>
            <div class="card onlymusicpagecard p-0 mt-3">
                <div class="card-header text-center">
                    <h1>Biography</h1>
                </div>
                <div class="card-body row" id="inside">
                    @foreach ($library as $library)
                        @if ($library->category == 'Biography')
                            <div class="card col-md-2">
                                <h3>{{ $library->title }}</h3>
                                <a href="{{ url('/library_detail', $library->id) }}">
                                    <img src="/library_image/{{ $library->image }}" class="card-img" alt="">
                                </a>
                                <p>
                                    {{ $library->published_years }}
                                </p>
                                <p>
                                    {{ $library->author }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('userpage.footer')
    @include('userpage.script')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '#search', function(){
                $value = $(this).val()
                // console.log(value);
                $.ajax({
                    type: "GET",
                    url: "{{ URL::to('biosearch') }}",
                    data: {
                        'search': $value
                    },
                    success: function (data) {
                        console.log(data);
                        $('#inside').html(data)
                    }
                });
            });
        });
    </script>
</body>

</html>
