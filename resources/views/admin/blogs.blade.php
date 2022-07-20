@extends('layouts.app')

@section('content')
    <div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body fs-2 fw-bold text-center">
                    <input type="hidden" id="dele_id">
                    Are you sure delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-danger delete_btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Add Blog Modal Start --}}
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Blogs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="addBlogForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div id="error_msg">

                        </div>
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter the blog title">
                        </div>
                        <div class="form-group">
                            <label for="image">Blog Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">Blog Content</label>
                            <textarea name="content" id="content" rows="3" class="form-control" placeholder="Enter the blog content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add Blog Modal End --}}
    {{-- Edit Blog Modal Start --}}
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Blogs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="editBlogForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div id="error_msg">

                        </div>
                        <div class="form-group">
                            <input type="hidden" id="ed_id">
                            <label for="ed_title">Blog Title</label>
                            <input type="text" name="ed_title" id="ed_title" class="form-control"
                                placeholder="Enter the blog title">
                        </div>
                        <div class="form-group">
                            <label for="ed_image">Blog Image</label>
                            <input type="file" name="ed_image" id="ed_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ed_content">Blog Content</label>
                            <textarea name="ed_content" id="ed_content" rows="3" class="form-control"
                                placeholder="Enter the blog content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Edit Blog Modal End --}}
    <div class="container">
        <div class="row">
            <div class="blog_search">
                <label for="search">
                    <i class="las la-search"></i>
                </label>
                <input type="text" class="form-control" name="search" id="search"
                    placeholder="Search Something Blog">
            </div>
            <div class="card blog_card col-md-12 p-0">
                <div class="card-header">
                    <h1 class="card-title">BLog</h1>
                    <div id="success_msg">

                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addBlogModal"><i class="las la-plus-circle"></i> Add-Blogs
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Blog Title</th>
                                <th>Blog Content</th>
                                <th>Blog Imgaes</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($blog as $blogs )
                            <tr>
                                <td>
                                    <p>{{$blogs->title}}</p>
                                </td>
                                <td>
                                    <p>{{$blogs->content}}</p>
                                </td>
                                <td>
                                    <img src="/blog_image/{{$blogs->image}}" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-info edit_button" value="{{$blogs->id}}"><i
                                            class="las la-edit"></i>Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger delete_button" value="{{$blogs->id}}"><i
                                            class="las la-trash-alt"></i>Delete</button>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jq-blog')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit_button', function(e) {
                var blog_id = $(this).val()
                $('#editBlogModal').modal('show')

                $.ajax({
                    type: "GET",
                    url: "/edit_blog/" + blog_id,
                    success: function(response) {
                        if (response.status == 400) {
                            alert(response.message)
                            $('#editBlogModal').modal('hide')
                        } else {
                            $("#ed_title").val(response.blog.title)
                            $("textarea").val(response.blog.content)
                            $("#ed_id").val(response.blog.id)
                        }
                    }
                });
            })
            $(document).on('submit', '#editBlogForm', function(e) {
                e.preventDefault()
                let Idblog = $('#ed_id').val()

                // console.log(Idblog);
                var blogEditForm = new FormData($('#editBlogForm')[0])
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/update_blog/" + Idblog,
                    data: blogEditForm,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);

                        if (response.status == 400) {
                            $('#error_msg').html('')
                            $('#error_msg').addClass('alert alert-danger fs-4')
                            $.each(response.message, function(index, value) {
                                $('#error_msg').append(`
                                    <span>` + value + `</span>` + `<br>
                                `)
                            });
                        } else if (response.status == 404) {
                            $('#error_msg').html('')
                            $('#error_msg').addClass('alert alert-danger fs-4')
                            $('#error_msg').text(response.message)
                        } else {
                            $('#success_msg').html('')
                            $('#success_msg').addClass(
                                'alert alert-success m-0 fs-5 fw-bold w-25 text-center')
                            $('#success_msg').text(response.message)
                            $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                            $('#editBlogModal').modal('hide')
                            $('.form-control').val('')
                            fetchBlog();
                        }
                    }
                });
            })
            $(document).on('submit', '#addBlogForm', function(e) {
                e.preventDefault();
                let productaddForm = new FormData($('#addBlogForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/add-blogs",
                    data: productaddForm,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#error_msg').html('')
                            $('#error_msg').addClass('alert alert-danger fs-4')
                            $.each(response.message, function(index, value) {
                                $('#error_msg').append(`
                                    <span>` + value + `</span>` + `<br>
                                `)
                            });
                        } else {
                            $('#success_msg').html('')
                            $('#success_msg').addClass(
                                'alert alert-success m-0 fs-5 fw-bold w-25 text-center')
                            $('#success_msg').text(response.message)
                            $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                            $('#addBlogModal').modal('hide')
                            $('.form-control').val('')
                            fetchBlog();
                        }
                    }
                });
            })
            fetchBlog();

            function fetchBlog() {
                $.ajax({
                    type: "GET",
                    url: "/fetchBlog",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html('')
                        $.each(response.blog, function(index, value) {
                            $('tbody').append(`
                            <tr>
                                <td>
                                    <p>` + value.title + `</p>
                                </td>
                                <td>
                                    <p>` + value.content + `</p>
                                </td>
                                <td>
                                    <img src="/blog_image/` + value.image + `" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-info edit_button" value=` + value.id + `><i class="las la-edit"></i>Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger delete_button" value="` + value.id + `"><i class="las la-trash-alt"></i>Delete</button>
                                </td>
                            </tr>
                        `)
                        });

                    }
                });
            }
            $(document).on('click', '.delete_button', function(e) {
                e.preventDefault()
                $('#deleteBlogModal').modal('show')
                var del_id = $(this).val()
                var del_id_blog = $('#dele_id').val(del_id)
                // console.log(del_id_blog);
            })
            $(document).on('click', '.delete_btn', function(e) {
                e.preventDefault()
                var del_id = $('#dele_id').val()
                // console.log(del_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/delete_blog/" + del_id,
                    success: function(response) {
                        if (response.status == 200) {
                            $('#success_msg').html('')
                            $('#success_msg').addClass(
                                'alert alert-success m-0 fs-5 fw-bold w-25 text-center')
                            $('#success_msg').text(response.message)
                            $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                            $('#deleteBlogModal').modal('hide')
                            fetchBlog()
                        }
                    }
                });
            })

            $(document).on('keyup', '#search', function(e) {
                e.preventDefault()
                $value = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/search_blog",
                    data: "data",
                    success: function(response) {
                        console.log(response);
                        $('tbody').html(data);
                    }
                });
            })
        });
    </script>
@endsection
