@extends('admin/layouts/manage')
@section('component')

<div class="container my-5">
    <div class="card mt-3 p-3">
        <h2>Categories</h2>
        <div class="row">
            @foreach($categoryShowed as $category)
            <div class="col-2">
                <a href="category/hidden/{{$category->id}}" class='btn btn-primary btn-block'>{{$category->name}}</a>
                <input type="number" value='{{$category->level}}' data-category='{{$category->id}}' class="form-control mt-2 level">
            </div>
            @endforeach
        </div>
        <hr/>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-2">
                <div class="btn-group btn-block">
                    <a href="category/show/{{$category->id}}" class="btn btn-warning">
                    {{$category->name}}
                    </a>
                    <a href="category/delete/{{$category->id}}" class ='btn btn-danger'>&times;</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md">
            <div class="card">
                <div class="d-flex justify-content-between p-3">
                    <div>
                        <h2 class='my-0'>Title</h2>
                    </div>
                    <div>
                        <form action="setting/title" method='post'>
                            @csrf
                            <div class="input-group">
                                <input type="text" name='title' value='{{$setting->title}}' class="form-control"/>
                                <div class="input-group-append">
                                    <button class="btn btn-success">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card p-3 mt-3">
                <h2>Description</h2>
                <hr/>
                <div>
                    <form action="setting/description" method="post">
                        @csrf
                        <textarea name="description" class='form-control' style='min-height:250px'>{{$setting->description}}</textarea>
                        <div class="mt-2 text-right">
                            <button class="btn btn-success">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card p-3 mt-3">
                <div class="d-flex justify-content-between">
                    <h2>Products</h2>
                    <div>
                        <form action="setting/sortBy" method="post">
                            @csrf
                            <div class="input-group">
                                <select name="sortBy" class='custom-select' id="">
                                    <option value="best sell" {{$setting->sort_product == 'best sell' ? 'selected' :''}}>Best sell</option>
                                    <option value="newest" {{$setting->sort_product == 'newest' ? 'selected' :''}}>Newest</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr/>
                <div class="row">
                <!--*  Product  *-->
                @foreach($products as $product)
                    <div class="col-4">
                        <a href="product/{{$product->id}}">
                            <img class='w-100 border' src="{{asset('storage/ImageProduct/'.$product->id.'.png')}}" alt=""/>
                        </a>
                    </div>
                @endforeach            
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card p-3">
                <h2>Logo</h2>
                <img src="{{asset('storage/logo.png')}}" class='w-100 my-2' alt="">
                <hr>
                <form action="setting/logo" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-success">Apply</button>
                        </div>
                        <div class="custom-file">
                            <input type="file" name='logo' class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('script')
<script>
    $(".custom-file-input").on("change", function() {
       var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    const ajax = axios.create({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('.level').change(function(e){
        ajax.post('category/level/'+this.dataset.category,{
            level : $(this).val(),
        }); 
    });
    
</script>
@endsection