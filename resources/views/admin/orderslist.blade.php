@extends('admin.layouts.manage')
@section('component')
@if($errors->any())
    <div class="alert alert-danger text-center w-50 container fixed-top">Your request is invalid</div>
@endif
<div class="container mt-3">
<div class='text-right px-5'>
    <button class="border rounded-top border-warning bg-warning" data-toggle="modal" data-target="#addOrder">
        <b style='font-size: 16px;'><i class="fas fa-plus-square"></i> Add</b>
    </button>
</div>
<!-- Add order form  -->
<div class="modal fade" id='addOrder'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="order/add" method="post">
                @csrf
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class='text-dark'><b>New order</b></h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container " >
                        <input type="text" name='name' class="form-control" placeholder='Name...'/>
                        <div class="row mt-3">
                            <div class="col-md-6">
                            <input type="text" class="form-control" name='phone' placeholder='Number phone...'/>
                            </div>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name='address' placeholder='Address...'/>
                            </div>
                        </div>
                        <hr/>
                        <div id='ProductInOrder'>
                            <datalist id="products">
                                @foreach($products as $product)
                                <option value="{{$product->name}}">
                                @endforeach
                            </datalist>
                            <div class="row mb-3">
                                <div class="col-9">
                                    <input list='products' class="form-control" name='product[]' placeholder='Product...'/>
                                </div>
                                <div class="col-3">
                                    <input type="number" min='1' step='1' class="form-control" name='amount[]' placeholder='Amonut...'/>
                                </div>
                            </div>
                        </div>
                        <div class='text-right'>
                            <button class="btn btn-outline-success" id='AddProductToOrder' type='button'> <i class="fas fa-plus-square"></i> Add</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center justify-content-center">
                    <button class="btn btn-success">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End add order form -->
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class='col-2 text-center'><b>ID</b></div>
                <div class='col-5 text-center'><b>Name</b></div>
                <div class='col-3 text-center'><b>Price</b></div>
                <div class='col-2 text-center'><b>State</b></div>
            </div>
        </div>
        <div class="card-body">
            @foreach($orders as $order)
            <div class="row">
                <div class='col-2 text-center'>{{$order->id}}</div>
                <div class='col-5 text-center'>
                    <a href="order/detail/{{$order->id}}" class="text-secondary">{{$order->name}}</a>
                </div>
                <div class='col-3 text-center'>{{$order->total_price}}</div>
                <div class='col-2 text-center'>
                    <button class="btn btn-outline-primary btn-sm">
                    {{$order->state}}
                    </button>
                </div>
            </div>    
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    
    $('.alert').fadeOut('slow');
    $('#AddProductToOrder').click(function(e){
        axios.get("{{route('add-productForm-order')}}").then((res)=>{
            $('#ProductInOrder').append(res.data);
        })
    });
</script>
@endsection