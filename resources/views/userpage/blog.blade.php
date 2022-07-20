<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog</title>
    @include('userpage.css')
</head>

<body>
    {{-- Header Start --}}
    @include('userpage.header')
    {{-- Footer End --}}
    <div class="about-page-div container-fluid">
        <h2 class="text-center">OUR BLOGS</h2>
        <p class="text-center">
            <a href="{{ url('/') }}" class="ms-1">Home</a>
            /
            <a href="{{ url('/user-blog') }}" class="text-dark">Blog</a>
        </p>
    </div>
    <div class="blog-page-div-one container my-5">
        <div class="blogTitleandBlog row container-fluid">
            @foreach ($blog as $blogs)
                <div class="card col-md-4">
                    <div class="card-body">
                        <img src="/blog_image/{{ $blogs->image }}" class="card-img" alt="" />
                        <h3 class="text-center my-2 fw-bold">{{ $blogs->title }}</h3>
                        <a href="{{ url('/user-home-blog', $blogs->id) }}" class="card-link text-info fw-bold">View
                            Detail</a>
                    </div>
                </div>
            @endforeach
            <div class="paginate mt-1">
                {{-- <span style="font-size: 2rem;font-weight:bold;">{!! $blog->withQueryString()->links('pagination::bootstrap-5') !!}</span> --}}
            </div>

        </div>
    </div>
    {{-- Footer Start --}}
    @include('userpage.footer')
    {{-- Footer End --}}
    @include('userpage.script')
</body>

</html>
