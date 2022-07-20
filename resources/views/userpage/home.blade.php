<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Store</title>
    @include('userpage.css')
</head>

<body>
    <!-- header start -->
    @include('userpage.header')
    <!-- header end -->

    {{-- Banner Start --}}
    <div class="banner">
        <div class="banner-content">
            <h6>Welcome To Book World Store</h6>
            <h3>Read books for your life.</h3>
            <a href="">view books</a>
        </div>
        <div class="banner-img">

            <div id="banner_img_slide">
                <img src="/images/book-3.png" alt="" />
                <img src="/images/book-2.png" alt="" />
                <img src="/images/book-1.png" alt="" />
            </div>


        </div>
    </div>
    {{-- Banner End --}}

    <main>
        <div class="container-fluid mt-3 ">
            <div class="card p-0 category_content">
                <div class="card-header text-center fw-bold">
                    <h1>Categories</h1>
                </div>
            </div>
            <div class="row cate_card_slider">
                <div class="card px-0 col-md-3 cate_card music_card">
                    <div class="card-body">
                        <h1>Musics & Arts</h1>
                        <a href="">
                            <img class="card-img" src="/images/book-5.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>History</h1>
                        <a href="">
                            <img class="card-img" src="/images/book7.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>Cooking</h1>
                        <a href="">
                            <img class="card-img" src="/images/book3.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>Comics</h1>
                        <a href="">
                            <img class="card-img" src="/images/book-7.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>Horror</h1>
                        <a href="">
                            <img class="card-img" src="/images/book-4.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>Romatic</h1>
                        <a href="">
                            <img class="card-img" src="/images/book-9.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>Religion</h1>
                        <a href="">
                            <img class="card-img" src="/images/book5.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
                <div class="card px-0 col-md-3 cate_card">
                    <div class="card-body">
                        <h1>Fiction</h1>
                        <a href="">
                            <img class="card-img" src="/images/book-8.png" alt="">
                        </a>
                        <a href="" class="cate_link">view all</a>
                    </div>
                </div>
            </div>
            <div class="category_slider">
                <div class="las la-caret-square-left next"></div>
                <div class="las la-caret-square-right prev"></div>
            </div>
        </div>
    </main>
    <!-- Footer Start -->
    @include('userpage.footer')
    <!-- Footer End -->
    @include('userpage.script')
</body>

</html>
