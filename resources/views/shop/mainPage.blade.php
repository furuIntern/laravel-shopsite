@extends('layouts\app')

@section('content')
    <div id="products">
        
    </div>  
@endsection

@section('aside')
    <div class="mb-3" id="shoppingCart">
        <h4 class="d-flex justify-content-between">
            <strong>Cart</strong>
            @if (Session::has('cart'))
                <span class="badge badge-secondary">{{Cart::count()}}</span>
            @endif
        </h4>
    
        @if (Session::has('cart'))
            <ul class="list-group">
                @foreach (Cart::content() as $item)
                <li class="list-group-item justify-content-between d-flex">
                    <div>
                        <h5>{{$item->name}}</h5>
                        <strong>Qty: {{$item->qty}}</strong>
                    </div>
                    <span>${{$item->price}}</span>
                </li>
                @endforeach
                <li class="list-group-item justify-content-between d-flex">
                    <strong>Total:</strong>
                    <strong>{{Cart::total()}}</strong>
                </li>
                <li class="list-group-item text-center p-0">
                    <button class="btn btn-success btn-block"><a href="{{route('detailCart')}}" style="text-decoration:none ; color:#fff">Detail</a></button>
                </li>
            </ul>
            
        @else
            <ul class="list-group">
                <li class="list-group-item">
                   <h4>Empty Cart</h4> 
                </li>
            </ul>
        @endif
    </div>

    <div class="container card">
        <h4 class="content-center">Fillter</h4>
        <form class="m-3" id="demo">
            <div class="form-group">
                <input class="fillter" value="desc" type="checkbox" name="popular" id=""/>
                <span><label for="">Best Seller</label></span>
            </div>
            <div class="form-group">
                <label for="min_price">From</label>
                <input class="form-control rangePrice" type="number" name="min_price" id="min_price" min="0"  max="{{App\Products::max('price')}}" value="0"/>
                <label for="max_price">To</label>
                <input class="form-control rangePrice" type="number" name="max_price" id="max_price" min="0" value="{{App\Products::max('price')}}"/>
                <br/>
                <input class="fillter" value="desc" type="radio" name="price" id=""/>
                <span><label for="">Price Down</label></span>
                <br/>
                <input class="fillter" value="asc" type="radio" name="price" id=""/>
                <span><label for="">Price Up</label></span>
            </div>
                
            <div class="form-group">
                <input class="fillter" type="radio" value="desc" name="time" id=""/>
                <span><label for="">Newest</label></span>
                <br/>
                <input class="fillter" type="radio" value="asc" name="time" id=""/>
                <span><label for="">Oldest</label></span>
            </div>
                
        </form>
    </div>
@endsection

@section('script')
        <script>
            $(document).ready(function() {
                
                axios.post('{{route("product")}}', {
                   
                })
                .then(function(data) {
                   
                    $('#products').html(data.data);
                })
                .catch(function(error) {

                })
                
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
                    
                    var rangePrice = [
                            $('input[name="min_price"]').val(),
                            $('input[name="max_price"]').val()
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
