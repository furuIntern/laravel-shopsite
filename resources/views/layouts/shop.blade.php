@extends('layouts\app')

@section('content')

<div class="row mt-3">
    <div class="col-md-9">
        @yield('main')
    </div>
    <div class="col-md-3">
        <div class="mb-3" id="shoppingCart">
            @include('cart\show')
        </div>
    
        <div class="">
            <h4 class="fillter">Fillter</h4>
            <form class="container card" style="padding:1rem;">
                <div class="form-group">
                    <input class="fillter" value="desc" type="checkbox" name="popular" id=""/>
                    <span><label for="">Best Seller</label></span>
                </div>
                <div class="form-group">
                    <label for="min_price">From</label>
                    <input class="form-control rangePrice" type="number" name="min_price" id="min_price" min="0"  max="{{App\Products::max('price')}}" value="0"/>
                    <label for="max_price">To</label>
                    <input class="form-control rangePrice" type="number" name="max_price" id="max_price" min="0" value="9999999"/>
                    <div class="alert alert-danger eRange mt-2" style="display:none">Range invalid</div>
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
    </div>
</div>  
@endsection