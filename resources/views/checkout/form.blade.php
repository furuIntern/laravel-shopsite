@extends('layouts\app')

@section('content')
    
    <div class="w-50 m-auto">
        <form action="{{route('submitOrder')}}" method="POST">
            <label for="name">Name</label>
            <input class="form-control mb-3" type="text" name="name" value="{{Auth::check() ? Auth::user()->name : NULL}}"/>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="phone">Phone</label>
            <input class="form-control  mb-3" type="text" name="phone" value="{{Auth::check() ? Auth::user()->phone : NULL}}"/>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="address">Address</label>
            <input class="form-control  mb-3" type="text" name="address" value="{{Auth::check() ? Auth::user()->address : NULL}}"/>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @csrf
            <input class="btn btn-success btn-block mt-5" type="submit" value="Checkout"/>
        </form>
    </div>
@endsection

