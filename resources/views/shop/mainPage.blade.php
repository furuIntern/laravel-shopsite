@extends('layouts\shop')

@section('main')
    <div id="products">
        <div class="row">
            @foreach ($products as $product)
                <div class="card mr-3 ml-3 mb-3" style="width:15rem; text-align:center">
                    <a href="{{route('detailProduct' , [ 'id' => $product->id ] )}}">
                        <img class="" src="{{ $product->img }}" alt="" style="width: 100%">
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
                
                $(document).on('click','.btn-success' , function() {
                    
                    axios.post('{{route("addCart")}}' , {

                        id : $(this).attr('id')
                    })
                        .then(function(data) {
      
                            $('#shoppingCart').html(data.data);
                        })
                        .catch(function(error) {

                        })
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
                    
                    axios.get('{{route("filter")}}', {
                        params: {
                            price: $('input[name="price"]:checked').val(),
                            time: $('input[name="time"]:checked').val(),
                            popular: $('input[name="popular"]:checked').val()
                            
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
                        $('.eRange').css('display','block');
                        return false;
                    }

                    $('.eRange').css('display','none');

                    axios.get('{{route("filter")}}', {
                        params: {
                            rangePrice: [
                                min,
                                max
                            ]
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
