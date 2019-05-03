@extends('shop\shop')

@section('main')
    <div class=row>
        <div class="col-sm-5">
            <img src="{{$product->img}}" alt="">
        </div>
        <div class="col-sm-7">
            <div class="card">
                <p>{{$product->description}}</p>
            </div>
            <div>
                <form class="d-flex justify-content-between">
                    <div class="form-group">
                        <label class="form-label" for="amount">Amount</label>
                        <input class="form-control" type="number" min="1" value="{{$product->amount}}" name="amount" id="amount"/>
                    </div>
                    <div>
                        <input class="btn btn-success" style="margin: 2rem 0 auto 0" type="submit" value="Add-To-Cart" name="addCart" data-id="{{$product->id}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            showCart();
            function showCart(id) {
  

                axios.post('{{route("addCart")}}' , {
                    id : id
                })
                    .then(function(data) {
      
                        $('#shoppingCart').html(data.data);
                    })
                    .catch(function(error) {

                    })
            }
            
            $('input[name="addCart"]').click(function() {
                
                axios.post('route("addCart")', {
                    id: $(this).data('id'),
                    amount : $('#amount').val()
                })
                 .then(function(data) {
                    
                 })
                 .catch(function(error) {

                 })
            });
            
        })
    </script>
@endsection