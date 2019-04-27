
<div class="row">
    @foreach ($products as $product)
        <div class="card mr-3 ml-3 mb-3" style="width:15rem; text-align:center">
            <a href="{{route('detail' , [ 'id' => $product->id])}}">
                <img class="" src="{{ $product->img }}" alt="" style="width: 100%">
            </a>
            <div class="card-body">
              <h3 class="card-title">{{ $product->name }}</h3>
            </div>
            <div class="row mb-2">
              <strong class="m-auto">${{ $product->price }}</strong>
              <button id="{{$product->id}}" class="btn btn-success m-auto ">
                  Add-To-Cart
              </button>
            </div>
        </div>
    @endforeach
</div>

<div>
    {{$products->links()}}
</div>
