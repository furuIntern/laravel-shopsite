@extends('layouts\app')
    
        @section('content')
            <div class="row mt-3">
                <div class="col-9" id="products">

                </div>
                <div class="col-3">
                    <div class="mb-3" id="shoppingCart">
                      
                    </div>
                    <div class="container card">
                        <h4 class="content-center">Fillter</h4>
                        <form class="m-3">
                            <div class="form-group">
                                <input type="checkbox" name="" id=""/>
                                <span><label for="">Best Seller</label></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="" id=""/>
                                <span><label for="">Price Down</label></span>
                            </div>
                                <div class="form-group">
                                    <input type="checkbox" name="" id=""/>
                                    <span><label for="">Price Up</label></span>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="" id=""/>
                                    <span><label for="">Newest</label></span>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="" id=""/>
                                    <span><label for="">Oldest</label></span>
                                </div>
                        </form>
                    </div>
                </div>
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
                        console.log(data);
                        $('#shoppingCart').html(data.data);
                    })
                    .catch(function(error) {

                    })
                }
                $(document).on('click','.btn-success' , function() {
                    var id = $(this).attr('id');
                    showCart(id);
                })
            })
        </script>
    @endsection


