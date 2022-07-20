@extends('layouts.app')

@section('content')
    <div class="add_products">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if (session('edit'))
                    <div class="alert alert-success alert-dismissable">
                        <strong>Success!</strong>
                        {{ session('edit') }}
                    </div>
                @endif
                <div class="card products_card">
                    <div class="card-header">
                        <h3 class="card-title">EDIT PRODUCT</h3>
                    </div>
                    <div class="card-body">
                        <form class="row" action="{{ url('/edit-product-admin', $editpro->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="title">Books Title</label>
                                <input type="text" name="title" id="title" placeholder="Enter books title"
                                    class="form-control" value="{{ $editpro->title }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" placeholder="Enter books price"
                                    class="form-control" value="{{ $editpro->price }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" placeholder="Enter books quantity"
                                    class="form-control" value="{{ $editpro->quantity }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select name="category" id="" class="form-control">
                                    <option>{{ $editpro->category }}</option>
                                    @foreach ($editct as $editcts)
                                        <option value="{{ $editcts->category_name }}">{{ $editcts->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Books Image</label>
                                <img src="/product_image/{{ $editpro->image }}" alt="" width="100px">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="6" class="form-control" placeholder="Enter books description">{{ $editpro->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="container">
            <br />
            <hr />
        </div>
        <div class="copy-sign text-center">
            <p class="text-muted">Design by Hein Minn Aung, &copy;copy right all reverse.</p>
        </div>
    </div>
@endsection
