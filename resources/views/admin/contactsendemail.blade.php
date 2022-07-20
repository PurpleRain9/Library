@extends('layouts.app')

@section('content')
    <div class="container send_eamil">
        <div class="row">
            <div class="card p-0">
                <div class="card-header">
                    <h2 class="card-title">SEND EMAIL TO ({{ $contact->email }})</h2>
                </div>
                <div class="card-body ">
                    <form action="{{url('contact-email-send',$contact->id)}}" method="POST" class="row">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="greeting">Email Greeting</label>
                            <input type="text" class="form-control" name="greeting" id="greeting"
                                placeholder="enter greeting email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstline">First Line</label>
                            <input type="text" class="form-control" name="firstline" id="firstline"
                                placeholder="enter firstline">
                        </div>
                        <div class="form-group">
                            <label for="body">Email Body</label>
                            <textarea name="body" id="body" rows="3" class="form-control" placeholder="enter email body"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buttom">Email Button Name</label>
                            <input type="text" id="button" name="button" class="form-control" placeholder="enter email button name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="url">Email Url</label>
                            <input type="text" id="url" name="url" class="form-control" placeholder="enter email url">
                        </div>
                        <div class="form-group">
                            <label for="lastline">Email Lastline</label>
                            <input type="text" id="lastline" name="lastline" class="form-control" placeholder="enter email lasline">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Send Email</button>
                        </div>
                    </form>
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