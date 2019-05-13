@extends('layouts.form')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <b>#{{$order->id}}</b>
                    </div>
                    <div>
                        <b>{{$order->name}}</b>
                    </div>
                    <div>
                        <a href="{{route('delete-order',['order'=>$order->id])}}" class="badge badge-danger">&times; Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2 text-center">
                        ID
                    </div>
                    <div class="col-5 text-center">
                        Product
                    </div>
                    <div class="col-3 text-center">
                        Price
                    </div>
                    <div class="col-2 text-center">
                        Amount
                    </div>
                </div>
                @foreach($orderDetail as $detail)
                <hr/>
                <div class="row">
                    <div class="col-2 text-center">
                        {{$detail->product->id}}
                    </div>
                    <div class="col-5 text-center">
                        {{$detail->product->name}}
                    </div>
                    <div class="col-3 text-center">
                        {{$detail->product->price}}
                    </div>
                    <div class="col-2 text-center">
                        {{$detail->amount}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection