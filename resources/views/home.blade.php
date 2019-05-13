<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
=======
@extends('layouts.user')



@section('article')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<<<<<<< HEAD

                    You are logged in!
=======
                    <div id="content" class="table-responsive">
                        @if ($items)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Phone</td>
                                        <td>Address</td>
                                        <td>Total Amount</td>
                                        <td>Total Price</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                       
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->address}}</td>
                                                    <td>{{$item->total_amount}}</td>
                                                    <td>{{$item->total_price}}</td>
                                                    <td><a class="btn btn-primary" name="detail" data-id="{{$item->id}}" href="">Detail</a></td>
                                                    <td><a class="btn btn-danger" name="delete" data-id="{{$item->id}}" href="">Delete</a></td>
                                                </tr>
                                            @endforeach
                                        
                                    
                                        
                                    </tbody>
                            </table>
                            {{$items->links()}}  
                        @else
                            <div>
                                Emty Order
                            </div>
                        @endif
                        
                        
                    </div>
                       
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
@endsection
=======
    
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on('click','a[name="detail"]',function(e) {
                
                e.preventDefault();
                axios.post('{{route("detail")}}', {

                    id: $(this).data('id')
                })
                 .then(function(data) {

                    $('#content').html(data.data);
                 })
            })
            
            $(document).on('click','a[name="back"]',function(e) {
                
                e.preventDefault();
                axios.post('{{route("home")}}')
                 .then(function(data) {

                    $('#content').html(data.data);
                 })    
            })

            $('a[name="delete"]').click(function(e) {

                e.preventDefault();
                axios.post('{{route("deleteOrder")}}', {

                    id: $(this).data('id')
                }).then(function(data) {

                    $('#content').html(data.data);
                })
            })
        })
    </script>
@endsection


>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
