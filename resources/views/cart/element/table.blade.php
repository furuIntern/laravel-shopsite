@foreach ($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td><input class="form-control" type="number" name="qty" value="{{$item->qty}}"/></td>
        <td>{{$item->price}}</td>
        <td>{{$item->price * $item->qty}}</td>
    </tr>
@endforeach

