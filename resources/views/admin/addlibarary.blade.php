@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card libary_card p-0">
                <div class="card-header">
                    <h1>Add Library</h1>
                    <div id="success_msg">

                    </div>
                    <a href="{{ '/library' }}">
                        Back
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <!-- you missed this line of code -->
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ url('/ad_library') }}" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="title">Book Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter book title">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control"
                                placeholder="Enter book author">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Book Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">__Select Category__</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="published_years">Published Year</label>
                            <input type="text" name="published_years" id="published_years" class="form-control"
                                placeholder="Enter published year ">

                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="pdf">Book Pdf</label>
                            <input type="file" name="pdf" id="pdf" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="image">Book image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group col-md-12 mt-3">
                            <label for="label">Book Label</label>
                            <textarea name="label" id="label" rows="3" class="form-control" placeholder="Enter the book label"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
