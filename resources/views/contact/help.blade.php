@extends('layouts\app')

@section('content')
    <div class="col-9">
        @if (Session('status'))
            <div class="alert alert-success">
                {{Session('status')}}
            </div>
        @endif
        <h3>SEND US MESSAGE</h3>
        <form action="{{ route('sendContact') }}" method="GET">
            <div class="col-sm-6 form-group">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}"/>
            </div>
            <div class="col-sm-6 form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{Auth::user()->email}}"/>
            </div>
            <div class="col-sm-6 form-group">
                <label class="form-label" for="subject">Subject</label>
                <input class="form-control" type="text" name="subject" id="subject"/>
            </div>
            <div class="col-sm-12 form-group">
                <label class="form-label" for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div> 
            <div class="col-sm-3 col-offset-3">
                <input class="btn btn-success" type="submit" value="Send"/>
            </div>
        </form>
    </div>
@endsection