@extends('layouts/app')

@section('content')
    <div class="mt-5" id="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th>Price</th>
                    <th>TotalPrice</th>
                </tr>
            </thead>
            <tbody id="items">
              
                @foreach ($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td><input class="form-control col-5" type="number" name="qty" value="{{$item->qty}}" data-id="{{$item->id}}"/></td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->tax * $item->qty}}</td>
                        <td>{{$item->subtotal}}</td>
                        <td>{{$item->total}}</td>
                        <td><input class="btn btn-danger" type="submit" name="delete" value="Delete" data-id="{{$item->id}}"/></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6">Total Bill:</td>
                    <td>{{$total}}</td>
                </tr>
            </tbody>
            
        </table>
        <button class="btn btn-success" type="button"><a href="{{route('checkout')}}">Checkout</a></button>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on('change','input[name="qty"]', function() {
                    var qty = $(this).val();
                    var id = $(this).data('id');
                    axios.post('{{route("editCart")}}', {
                        id: id,
                        qty: qty
                    })
                     .then(function(data) {
                        
                        $('#items').html(data.data);
                        
                     })
                     .catch(function(error) {
                         
                     })
                })
                $(document).on('click','input[name="delete"]',function() {
                    var id= $(this).data('id');
                    axios.post('{{route("delete")}}', {
                        id: id
                    })
                     .then(function(data) {
                        $('#items').html(data.data);
                     })
                     .catch(function(error) {
                        
                     })
                })
                /*$('button[type="submit"]').click(function() {
                    axios.get('{{route("checkout")}}')
                        .then(function(data) {
                            $('#content').html(data.data);
                        })
                })
                */ 
        })
    </script>
@endsection