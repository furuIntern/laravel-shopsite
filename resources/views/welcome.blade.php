@extends('layouts\app')
    
        @section('content')
            <div id="products">

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


