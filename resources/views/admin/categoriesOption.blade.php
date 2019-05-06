<option>Select...</option>
@foreach($categories as $categories)
    <option value="{{$categories->id}}">{{$categories->name}}</option>
@endforeach