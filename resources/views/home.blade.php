@extends('layouts.user')



@section('article')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
<<<<<<< HEAD
                                                    <td><a class="btn btn-danger" name="delete" data-id="{{$item->id}}" herf="">Delete</a></td>
=======
                                                    <td><a class="btn btn-danger" name="delete" data-id="{{$item->id}}" href="">Delete</a></td>
>>>>>>> master
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
                       
                </div>
            </div>
        </div>
    </div>
    
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
<<<<<<< HEAD
            })
            
            $(document).on('click','a[name="back"]',function(e) {
                
                e.preventDefault();
                axios.post('{{route("home")}}')
                 .then(function(data) {
                     
                    $('#content').html(data.data);
                 })    
            })

            $('a[name="delete"]').click(function() {
                axios.post('{{route("deleteOrder")}}', {

                    id: $(this).data('id')
                }).then(function(data) {

                    $('#content').html(data.data);
                })
=======
>>>>>>> master
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


