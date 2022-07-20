@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
            <!--Edit Product Modal -->
            <div class="modal modal-lg fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" id="update_modal_form" method="POST" enctype="multipart/form-data">
                            <div class="modal-body row" id="product_modalbody">
                                <div id="error_msg">

                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="ed_id" value="">
                                    <label for="ed_title">Product Title</label>
                                    <input type="text" name="ed_title" id="ed_title" class="form-control"
                                        placeholder="Enter the product title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ed_price">Product Price</label>
                                    <input type="text" name="ed_price" id="ed_price" class="form-control"
                                        placeholder="Enter the product price">
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label for="ed_quantity">Product Quantity</label>
                                    <input type="text" name="ed_quantity" id="ed_quantity" class="form-control"
                                        placeholder="Enter the product price">
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label for="ed_category">Categories</label>

                                    <select name="ed_category" id="ed_category" class="form-control">
                                        <option value="">--Select Category--</option>
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->category_name }}">
                                                {{ $categories->category_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label for="ed_image">Product Image</label>
                                    <input type="file" name="ed_image" id="ed_image" class="form-control">
                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label for="ed_author">Author Name</label>
                                    <input type="text" name="ed_author" id="ed_author" class="form-control"
                                        placeholder="Enter the author name">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            {{-- Add Products Modal --}}
            <div class="modal modal-lg fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" class="row" id="addProductForm" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-body row" id="product_modalbody">
                                <div id="error_msg">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">Product Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter the product title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Product Price</label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        placeholder="Enter the product price">
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label for="quantity">Product Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control"
                                        placeholder="Enter the product price">
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label for="category">Categories</label>

                                    <select name="category" id="category" class="form-control">
                                        <option value="">--Select Category--</option>
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->category_name }}">
                                                {{ $categories->category_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label for="image">Product Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label for="author">Author Name</label>
                                    <textarea name="author" id="author" rows="2" class="form-control"
                                        placeholder="Enter the products author"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary save_product">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            {{-- Add Products Modal End --}}
            <div class="card col-md-12 product_card">
                <div class="card-header">
                    <h1>Products Page</h1>
                    <div id="success_msg">

                    </div>
                    <button type="button"type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">
                        <i class="las la-plus-circle"></i> Add-products
                    </button>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-bordered product_table" style="border-top: 1px solid #666;">
                            <thead class="text-center">
                                <tr class="">
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Images</th>
                                    <th class="text-center">Categories</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Prices</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jq-product')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#addProductForm', function(e) {
                e.preventDefault();
                let productData = new FormData($('#addProductForm')[0]);
                // console.log(productData)
                $.ajax({
                    type: "POST",
                    url: "/product_add",
                    data: productData,
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
                            $('#addProductModal').modal('hide')
                            $('.form-control').val('')
                            // fetchproducts()
                            $('.product_table').dataTable().fnClearTable();
                        }
                    }

                });
            });

            var table = $(".product_table").DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{ route('product.fetch') }}",
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'image',
                        name: 'iamge'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }



                ]
            })


            $(document).on('click', '.edit_button', function(e) {
                e.preventDefault()
                var pro_id = $(this).data('id')
                $('#editProductModal').modal('show')

                $.ajax({
                    type: "GET",
                    url: "/edit_products/" + pro_id,
                    success: function(response) {
                        if (response.status == 400) {
                            alert('Product not found!')
                            $('#editProductModal').modal('hide')
                        } else {
                            $('#ed_id').val(response.product.id)
                            $('#ed_title').val(response.product.title)
                            $('#ed_price').val(response.product.price)
                            $('#ed_author').val(response.product.author)
                            $('#ed_quantity').val(response.product.quantity)
                            // $('select').val(response.product.category)
                            // $('#ed_image').val(response.product.image)

                        }

                    }
                });

            })

            $(document).on('submit', "#update_modal_form", function(e) {
                e.preventDefault()
                var proId = $('#ed_id').val()
                let updateForm = new FormData($('#update_modal_form')[0])
                $.ajax({
                    type: "POST",
                    url: "/update_products/" + proId,
                    data: updateForm,
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
                            $('#editProductModal').modal('hide')
                            $('.form-control').val('')
                            // fetchproducts()
                        }
                    }
                });

            })
            $(document).on('click', '.delete_button', function(e) {
                e.preventDefault()
                $('#deleteProductModal').modal('show')
                var pro_id = $(this).data('id')
                var pro_dele = $('#dele_id').val(pro_id)

            })

            $(document).on('click', '.delete_btn', function(e) {
                e.preventDefault()
                $dle_id = $('#dele_id').val()
                $.ajax({
                    type: "DELETE",
                    url: "/delete_products/" + $dle_id,
                    success: function(response) {
                        if (response.status == 200) {
                            $('#success_msg').html('')
                            $('#success_msg').addClass(
                                'alert alert-success m-0 fs-5 fw-bold w-25 text-center')
                            $('#success_msg').text(response.message)
                            $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                            $('#deleteProductModal').modal('hide')
                            // fetchproducts()
                            $('.product_table').dataTable().fnClearTable();
                            $('.product_table').dataTable().fnAddData(data);
                        }
                    }
                });
            })

        });
    </script>
@endsection
