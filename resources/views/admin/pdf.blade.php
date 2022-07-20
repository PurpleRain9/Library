<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog PDF</title>
    @include('userpage.css')
</head>
<body>
    <h1>{{$blog->title}}</h1>
    <img src="blog_images/{{$blog->image}}" alt="">
    <p>{{$blog->content}}</p>
</body>
</html>