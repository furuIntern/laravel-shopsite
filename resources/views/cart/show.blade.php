
        <ul class="list-group">
            @foreach ($items as $item)
            <li class="list-group-item justify-content-between d-flex">
                <div>
                    <h6>{{$item->name}}</h6>
                    <strong>Qty: {{$items->qty}}</strong>
                </div>
                <span>${{$item->price}}</span>
            </li>
            @endforeach
            <li class="list-group-item justify-content-between d-flex">
                <strong>Total:</strong>
                <strong>{{$total}}</strong>
            </li>
            <li class="list-group-item text-center p-0">
                <button class="btn btn-success btn-block"><a href="{{route('detailCart')}}" style="text-decoration:none ; color:#fff">Detail</a></button>
            </li>
        </ul>