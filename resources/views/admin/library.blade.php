@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card libary_card p-0">
                <div class="card-header">
                    <h1>Library Page</h1>
                    <div id="success_msg">

                    </div>
                    <a href="{{ '/library_add' }}">
                        <i class="las la-plus-circle"></i> Add Library Book
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered libary-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th>Label</th>
                                <th>Image</th>
                                <th>Pdf</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($library as $librarys)
                                <tr>
                                    <td>
                                        <p>{{$librarys->title}}</p>
                                    </td>
                                    <td>
                                        <p>{{$librarys->author}}</p>
                                    </td>
                                    <td>
                                        <p>{{$librarys->category}}</p>
                                    </td>
                                    <td>
                                        <p>{{$librarys->published_years}}</p>
                                    </td>
                                    <td>
                                        <p>{{$librarys->label}}</p>
                                    </td>
                                    <td>
                                        <img src="/library_image/{{$librarys->image}}" alt="" height="130px" width="100px">
                                    </td>
                                    <td>
                                        <iframe src="/library_pdf/{{$librarys->pdf}}" height="130px" width="100px"></iframe>
                                    </td>
                                    <td>
                                        <a href="{{url('/ed_library',$librarys->id)}}" class="btn btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{url('/library_de', $librarys->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{$library->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jq-library')
@endsection
