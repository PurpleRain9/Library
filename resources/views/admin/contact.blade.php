@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card admin-contact-div">
            <div class="card-header">
                <h1 class="card-tilte">Contact View</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Message</th>
                            <th>Send Email</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $contacts)
                            <tr>
                                <td>
                                    <p>{{$contacts->name}}</p>
                                </td>
                                <td>
                                    <p>{{$contacts->email}}</p>
                                </td>
                                <td>
                                    <p>{{$contacts->phone}}</p>
                                </td>
                                <td>
                                    <p>{{$contacts->address}}</p>
                                </td>
                                <td class="w-50">
                                    <p>{{$contacts->message}}</p>
                                </td>
                                <td>
                                    <a href="{{url('/contact-email-view',$contacts->id)}}" class="btn btn-info">Send Email</a>
                                </td>
                                <td>
                                    <a href="{{url('/delete-contact',$contacts->id)}}" class="btn btn-danger">Delete Contact</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    <span>{!!$contact->withQueryString()->links('pagination::bootstrap-5')!!}</span>
                </div>
            </div>
        </div>
        <div class="container">
            <br />
            <hr />
        </div>
        <div class="copy-sign text-center">
            <p class="text-muted">Design by Hein Minn Aung, &copy;copy right all reverse.</p>
        </div>
    </div> 
    </div>
@endsection
