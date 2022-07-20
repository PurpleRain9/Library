<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Library Detail</title>
    @include('userpage.css')
</head>

<body style="overflow-y: hidden;">
    {{-- Library Detail Modal --}}
    <div class="view_pdf_div container-fluid" id="view_pdf_div">
        <div class="view_pdf_div_two">
            <div class="btn_div bg-dark">
                <button type="button" id="pdf_close" class="btn btn-danger"><i class="las la-times"></i></button>
            </div>
            <iframe src="/library_pdf/{{ $library->pdf }}#toolbar=0" frameborder="0">
            </iframe>
        </div>
    </div>
    {{-- Library Detail Modal --}}
    @include('userpage.header')

    <div class="container">
        <!--Review Modal Start-->
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Review This Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form action="" id="reviewForm"> --}}
                    <div class="modal-body">
                        <div class="err_msg" id="error_msg">

                        </div>
                        <div class="form-group">
                            <input type="hidden" name="library_id" id="id" value="{{ $library->id }}">
                            <textarea name="comment" id="comment" rows="3" class="form-control" placeholder="Enter the review"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning save_comment">Save</button>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
        {{-- Review Modal End --}}

        <div class="row">
            <div class="card library_detail_card p-5 mt-5">
                <div class="library_detail_img">
                    <img src="/library_image/{{ $library->image }}" alt="">
                </div>
                <div class="library_detail_con">
                    <h1>{{ $library->title }}</h1>
                    <p>Author : {{ $library->author }}</p>
                    <p>Published Year : {{ $library->published_years }}</p>
                    <h4>For You Gift Of Speech</h4>
                    <p>{{ $library->label }}</p>
                    <button type="button" id="pdf_show" class="btn btn-info mt-3" data-bs-toggle="modal"
                        data-bs-target="#library_detail_modal">
                        Read This Book
                    </button>
                    @auth
                        <button type="button" class="btn btn-warning mt-3 ms-2" data-bs-toggle="modal"
                            data-bs-target="#reviewModal">
                            Review
                        </button>
                    @endauth
                    <div id="success_msg" class="mt-1"></div>
                </div>
            </div>
        </div>
        <div class="cad review_card">
            <div class="card-header">
                <h1 class="text-center">Review Contents</h1>
            </div>
            <div class="card-body">
                @forelse ($library_com as $library_coms)
                    {{-- @if ($comments->library_id === $library->id) --}}
                        <div class="card p-3" id="commentScoll" style="background-color: #f5f5f5f5">
                            <h3 class="fs-1 fw-bold">{{ $library_coms->name }}</h3>
                            <p style="font-size: 1.5rem;">{{ $library_coms->comment }}</p>
                        </div>
                    {{-- @endif --}}
                @empty
                    <div class="comment_NotFound_div">
                        <h1 class="mt-5 text-center fs-1 fw-bold">
                            Review Not Found!
                        </h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    @include('userpage.footer')
    @include('userpage.script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.save_comment', function(e) {
                e.preventDefault()
                var data = {
                    'library_id': $('#id').val(),
                    'comment': $('#comment').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/library_comment",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_msg').html('')
                            $('#error_msg').addClass('alert alert-danger fs-4')
                            $('#error_msg').text(response.message)
                        } else {
                            $('#success_msg').html('')
                            $('#success_msg').addClass(
                                'alert alert-success m-0 fs-5 fw-bold w-100 text-center')
                            $('#success_msg').text(response.message)
                            $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                            $('#reviewModal').modal('hide')
                            $('.form-control').val('')
                            location.reload();
                        }
                    }
                });

            });
            let iframeDiv = document.querySelector(".view_pdf_div .view_pdf_div_two");
            let iframeDivShowBtn = document.querySelector("#pdf_show");
            let pdf_close_btn = document.querySelector('#pdf_close')
            iframeDivShowBtn.addEventListener("click", () => {
                iframeDiv.classList.toggle('showIframDiv')
            });
            pdf_close_btn.addEventListener("click", () => {
                iframeDiv.classList.remove(
                    'showIframDiv'
                )
            })
        });
    </script>
</body>

</html>
{{-- <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $library->title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            <iframe src="/library_pdf/{{ $library->pdf }}#toolbar=0" frameborder="0" width="100%"
                height="470px"></iframe>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div> --}}
