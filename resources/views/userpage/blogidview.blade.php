<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Blog One</title>
    @include('userpage.css')
</head>
<body>
    @include('userpage.header')
    <div class="container">
        <div class="card blog_detail_card">
            <div class="card-header">
                <h1>Blog Detail Page</h1>
            </div>
            <div class="card-body">
                <img src="/blog_image/{{$blog->image}}" alt="">
                <h2>{{$blog->title}}</h2>
                <p>
                    {{$blog->content}}
                </p>
            </div>
        </div>
    </div>
    @include('userpage.footer')
    @include('userpage.script')
</body>
</html>
