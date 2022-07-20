@extends('layouts.app')

@section('content')
    <!--Add Category Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cate_err_msg">

                    </div>
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter the category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_category">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Category Delet Model --}}
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" id="delete_id">
                    <h1 class="text-center">Are you sure delete this item?</h1>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="las la-window-close"></i> Cancel</button>
                    <button type="button" class="btn btn-danger category_destory"><i class="las la-trash-alt"></i>
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="card category_card">
            <div class="card-header">
                <h1>Category Page</h1>
                <p id="success_msg">

                </p>


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                    <i class="las la-plus-circle"></i> Add-Category
                </button>

            </div>

            <div class="card-body">
                <table class="table table-bordered category_table" style="border-top: 1px solid #666;" id="">
                    <thead class="text-center">
                        <tr>
                            <th>Category Name</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jq-category')
    <script>
        const myModalEl = document.getElementById('addCategory')
        myModalEl.addEventListener('hidden.bs.modal', event => {
            document.getElementById('cate_err_msg').classList.remove('alert-danger')
            document.getElementById('cate_err_msg').innerHTML = ''
        });
        $(document).ready(function() {

            // $('#category_table').
            var table = $(".category_table").DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{ route('category.fetch') }}",
                columns: [{
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            })



            $(document).on('click', '.save_category', function(e) {
                e.preventDefault()
                var data = {
                    'name': $('#name').val()
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/category_add",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#cate_err_mdata: "data",sg').html('')
                            $('#cate_err_msg').addClass('alert alert-danger');
                            $.each(response.message, function(index, value) {
                                $('#cate_err_msg').append('<span>' + value + '</span>')
                            });
                            // $('#cate_err_msg').stop().fadeIn(400).delay(500).fadeOut(400);
                        } else {
                            $('#success_msg').html('')
                            $('#success_msg').addClass(
                                'alert alert-success m-0 fs-5 fw-bold w-25 text-center')
                            $('#success_msg').text(response.message)
                            $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                            $('#addCategory').modal('hide')
                            $('#name').val('')
                            $('.category_table').dataTable().fnClearTable();
                            // $('.category_table').dataTable().fnAddData(data);

                        }
                    }
                });
            });

            $(document).on('click', '.category_delete', function(e) {
                e.preventDefault()
                $('#deleteCategoryModal').modal('show')
                var category_id = $(this).data('id')
                // console.log(category_id);
                var delete_category_id = $('#delete_id').val(category_id)
            })
            $(document).on('click', '.category_destory', function(e) {
                e.preventDefault();
                var del_id = $('#delete_id').val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/category_delete/" + del_id,
                    success: function(response) {
                        $('#success_msg').html('')
                        $('#success_msg').addClass(
                            'alert alert-success m-0 fs-5 fw-bold w-25 text-center ')
                        $('#success_msg').text(response.message)
                        $('#success_msg').stop().fadeIn(400).delay(2500).fadeOut(400);
                        $('#deleteCategoryModal').modal('hide')
                        $('#name').val('')
                        $('.category_table').dataTable().fnClearTable();
                        $('.category_table').dataTable().fnAddData(data);
                    }
                });
            })
        })
    </script>
@endsection
