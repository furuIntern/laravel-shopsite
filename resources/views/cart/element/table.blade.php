@foreach ($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td><input class="form-control col-5" type="number" name="qty" value="{{$item->qty}}" data-id="{{$item->id}}"/></td>
        <td>{{$item->price}}</td>
        <td>{{$item->total}}</td>
        <td><input class="btn btn-danger" type="submit" name="delete" value="Delete" data-id="{{$item->id}}"/></td>
    </tr>
@endforeach
<tr>
    <td>{{$total}}</td>
</tr>