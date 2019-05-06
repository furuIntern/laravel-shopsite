@extends('layouts\app')

@section('content')

<div class="row mt-3">
    <div class="col-md-9">
        @yield('main')
    </div>
    <div class="col-md-3">
        @yield('aside')
    </div>
</div>  
@endsection