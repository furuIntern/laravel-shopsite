@extends('layouts/app')

@section('content')
    <div class="mt-5" id="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>TotalPrice</th>
                </tr>
            </thead>
            <tbody id="items">
                        
            </tbody>
            
        </table>
        <button type="button"><a href="{{route('checkout')}}">Checkout</a></button>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            showDetail();
            function showDetail() {
                axios.post('{{route("items")}}')
                    .then(function(data) {
                        
                        $('#items').html(data.data);
                    })
                    .catch(function(error) {

                    })
            }
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