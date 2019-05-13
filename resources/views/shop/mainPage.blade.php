@extends('layouts\shop')

@section('main')
 @include('element\navbar')
    <div id="products">
        <div class="row">
            @foreach ($products as $product)
                <div class="card mr-3 ml-3 mb-3" style="width:15rem; text-align:center">
                    <a href="{{route('detailProduct' , [ 'id' => $product->id ] )}}">
                        <img class="" src="{{asset('storage/'.$product->id)}}" alt="" style="width: 100%">
                    </a>
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                    </div>
                    <div class="row mb-2">
                        <strong class="m-auto">${{ $product->price }}</strong>
                        <button id="{{$product->id}}" class="btn btn-success m-auto ">
                            Add-To-Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
          
        <div>
            {{$products->links()}}
        </div>
    </div>  
@endsection


@section('script')
        <script>
            $(document).ready(function() {
                
                
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

                $(document).on('click','.btn-success' , function() {
                    var id = $(this).attr('id');
                    showCart(id);
                })
                
                $(document).on('click','.category',function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                
                    axios.get("{{route('category')}}", {
                        params: {
                            id: id
                        }
                    })
                    .then(function(data) {
                     
                        $('#products').html(data.data);
                    })
                    .catch(function(error) {

                    })
                })

                $(document).on('click','.fillter',function() {
                    var price = $('input[name="price"]:checked').val();
                    var time = $('input[name="time"]:checked').val();
                    var popular = $('input[name="popular"]:checked').val();
                   
                    axios.get('{{route("filter")}}', {
                        params: {
                            price: price,
                            time: time,
                            popular: popular
                            
                        }
                    })
                     .then(function(data) {
                        $('#products').html(data.data);
                     })
                     .catch(function(error) {

                     })
                    
                })
                function checked(val,e) {
                    if(val.val() > parseInt(val.attr('max')) || val.val() < parseInt(val.attr('min'))) {
                        e.preventDefault()
                        $(val).val(0);
                        return false;
                    }
                    return true;
                }
                $(document).on('blur','.rangePrice',function(e) { 
                    if(!checked($(this),e)) {
                        return false;
                    }

                    var min = $('input[name="min_price"]').val();
                    var max = $('input[name="max_price"]').val();

                    if(min > max) {
                        alert('error');
                        return false;
                    }

                    var rangePrice = [
                           min,
                           max
                    ];
                   
                    axios.get('{{route("filter")}}', {
                        params: {
                            rangePrice: rangePrice
                        }
                    })
                     .then(function(data) {
                       
                        $('#products').html(data.data);
                     })
                     .catch(function(error) {

                     })
                })
                $(document).on('click','.page-link' , function(e) {
                    e.preventDefault();

                    var link = $(this).attr('href');

                    axios.post(link)
                        .then(function(data) {
                            $('#products').html(data.data);
                        })
                        .catch(function(error) {

                        })
                })

                               
            })
        </script>
    @endsection
