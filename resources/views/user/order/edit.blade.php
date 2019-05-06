@extends('layouts\user')

@section('article')
    @if (App\Orders::find())
        <div>
            @foreach ($collection as $item)
                <div class="card">
                    <div class="row">
                        <div>{{$item->phone}}</div>
                        <div>{{$item->address}}</div>
                        <div>{{$item->total_amount}}</div>
                        <div>{{$item->total_price}}</div>
                    </div>
                </div> 
            @endforeach
        
        </div>
    @else
        
    @endif
        
@endsection