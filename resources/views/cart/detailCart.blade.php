@extends('layouts/app')

@section('content')
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

                    axios.post('{{route("editCart")}}', {
                        qty: qty
                    })
                     .then(function(data) {
                        showCart();
                     })
                     .catch(function(error) {
                         
                     })
                }) 
        })
    </script>
@endsection