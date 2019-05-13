
<div class="container">
<div class="row">
    @foreach($categories as $categories)
    <div class="col-2 text-center">
        <a href='#categories-{{$categories->id}}' class='btn btn-warning' data-toggle="collapse">{{$categories->name}}</a>
            <div class="collapse mt-2" id='categories-{{$categories->id}}'>
                @foreach($categories->category as $category)
                    <a href="" class='badge badge-dark'>{{$category->name}}</a>
                @endforeach
            </div>
    </div>
    @endforeach
</div>
    
</div>