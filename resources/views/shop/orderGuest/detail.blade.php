@if ($items)
    <div class="mt-2">
        <h4>Detail</h4>
        @foreach ($items as $item)
            <ul class="list-group">
                <li class="list-group-item">
                    <span>Name: {{$item->name}}</span>
                    <span>Qty: {{$item->qty}}</span>
                    <span>Price: {{$item->pivot->price}}</span>
                </li>
            </ul>
        @endforeach
    </div>
@endif