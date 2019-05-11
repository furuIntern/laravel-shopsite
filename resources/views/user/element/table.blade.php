<table class="table">
    <thead>
        <tr>
            <td>Name</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Total Amount</td>
            <td>Total Price</td>
        </tr>
    </thead>
        <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->total_amount}}</td>
                        <td>{{$item->total_price}}</td>
                        <td><a class="btn btn-primary" name="detail" data-id="{{$item->id}}" href="{{route('detail')}}">Detail</a></td>
                    </tr>
                @endforeach
                    
        </tbody>
</table>
{{$items->links()}}
