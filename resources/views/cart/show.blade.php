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
                    <strong>Qty: {{$item->qty}}</strong>
                </div>
                <span>${{$item->price}}</span>
            </li>
            @endforeach
            <li class="list-group-item justify-content-between d-flex">
                <strong>Total:</strong>
                <strong>{{$total}}</strong>
            </li>
            <li class="list-group-item text-center p-0">
                <a  class="btn btn-success btn-block link" 
                    href="{{route('detailCart')}}">
                    Detail
                </a>
                <a  class="btn btn-danger btn-block link mt-2" 
                    href="{{route('deleteCart')}}" name="deleteCart">
                    Delete Cart
                </a>
            </li>
        </ul>
    @else
        <ul class="list-group">
            <li class="list-group-item">
                <h4>Empty Cart</h4> 
            </li>
        </ul>
    @endif 