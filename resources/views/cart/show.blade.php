
    <h4 class="d-flex justify-content-between">
        <strong>Cart</strong>
        @if (Session::has('cart'))
            <span class="badge badge-secondary">{{Cart::count()}}</span>
        @endif
    </h4>

    @if (Session::has('cart'))
        <ul class="list-group">
            @foreach ($items as $item)
            <li class="list-group-item justify-content-between d-flex">
                <div>
                    <h6>{{$item->name}}</h6>
                    <label for="">Qty</label>
                    <input class="form-control" name="qty" value="{{$item->qty}}"/>
                </div>
                <span>${{$item->price}}</span>
            </li>
            @endforeach
            <li class="list-group-item justify-content-between d-flex">
                <strong>Total:</strong>
                <strong>{{$total}}</strong>
            </li>
            <li class="list-group-item text-center">
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