@extends('layouts\app')

@section('content')
    <div class="col-9">
        <h3>SEND US MESSAGE</h3>
        <form action="">
            <div class="col-sm-6 form-group">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value=""/>
            </div>
            <div class="col-sm-6 form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" value=""/>
            </div>
            <div class="col-sm-6 form-group">
                <label class="form-label" for="subject">Subject</label>
                <input class="form-control" type="text" name="subject" id="subject"/>
            </div>
            <div class="col-sm-12 form-group">
                <label class="form-label" for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div> 
            
        </form>
    </div>
@endsection