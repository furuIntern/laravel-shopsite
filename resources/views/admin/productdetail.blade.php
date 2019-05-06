@extends('layouts.form')
@section('content')
<div class="container mt-5">
    <form action="{{$product->id}}/edit" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card shadow">
        <div class="card-header">
            <a href="{{route('show-products')}}" class='float-left'>Back</a>
            <a href="delete/{{$product->id}}" class='badge badge-danger float-right'>
                &times; Delete
            </a>
            <div class="text-center">
                <b>{{$product->name}}</b>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                <div class="col-lg-7">
                    <img class='w-100' src="{{asset('storage/ImageProduct/'.$product->id.'.png')}}" alt="">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img" name='img'>
                            <label class="custom-file-label" for="img">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div>Price</div>
                    <input name='price' step='1000' type="number" value='{{$product->price}}' class="form-control"/>
                    <div class="row">
                        <div class="col-6">
                            <div>Amount</div>
                            <input name='amount' type="number" value='{{$product->amount}}' class='form-control'/>
                        </div>
                        <div class="col-6">
                            <div class='text-center'>Sold</div>
                            <h3 class='text-center'>{{$product->sold}}</h3>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-success">
                Confirm
            </button>
        </div>
    </div>
    </form>
</div>
@endsection
@section('script')
<script> 
    $(".custom-file-input").on("change", function() {
       var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection