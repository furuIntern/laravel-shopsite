@extends('layouts\app')

@section('content')

<div class="row mt-3">
    <div class="col-md-9">
        @yield('main')
    </div>
    <div class="col-md-3">
        <div class="mb-3" id="shoppingCart">
            @include('cart\show')
        </div>
    
        <div class="">
            @yield('aside')
        </div>
    </div>
</div>  
@endsection