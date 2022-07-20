<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('userpage.css')
</head>

<body>
    @include('userpage.header')
    <div class="container">
        <div class="row">
            @include('userpage.libraryheader')
            <div class="card music_and_arts col-md-12 mt-4">

                <div class="card-body m_and_a_cb">
                    <div class="music_and_arts_slide row">
                        @foreach ($library as $library)
                                <div class="card each col-md-2">
                                    <h3>{{ $library->title }}</h3>
                                    <a href="{{url('/library_detail',$library->id)}}">
                                        <img src="/library_image/{{ $library->image }}" class="card-img"
                                            alt="">
                                    </a>
                                    <p>Published Year : {{ $library->published_years }}</p>
                                    <p>{{ $library->author }}</p>
                                </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('userpage.footer')
    @include('userpage.script')
</body>

</html>
