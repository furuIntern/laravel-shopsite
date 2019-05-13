
    
        <table class="table p-3">
            <thead>
                <tr>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Price Product</th>
                    <th>Total Amount</th>
                    <th>Tax</th>
                    <th>Total Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ($item as $info)
                    <tr>
                        <td><img src="{{$info->img}}" alt="" width="50" height="50"/></td>
                        <td>{{$info->name}}</td>
                        <td>{{$info->price}}</td>
                        <td><input type="text" name="qty" value="{{$info->pivot->qty}}"/></td>
                        <td>{{$info->pivot->priceTax}}</td>
                        <td>{{$info->pivot->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="d-flex justify-content-center mb-3">
        <a class="btn btn-primary" name="back" href="">Back</a>
        <a href="{{route('edit',[ 'id' => $id])}}">restore</a>
    </div>
    
   

    