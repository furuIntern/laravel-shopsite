@extends('layouts\app')

@section('content')
    <div class="row mt-3">
        <div class="col-3">
           <ul class="list-group">
               <li class="list-group-item"><a href="">demo</a></li>
               <li class="list-group-item"><a href="">demo</a></li>
               <li class="list-group-item"><a href="">demo</a></li>
           </ul>
        </div>
        <div class="col-9">
            @yield('article')
        </div>
    </div>
@endsection