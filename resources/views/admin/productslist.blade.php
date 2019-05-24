@extends('admin.layouts.manage')
@section('component')
    @can('add-products')
    <div class="container mt-3">
        <div class="d-flex justify-content-end">
        <button class='btn btn-light' data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus"></i> Category</button>
        <button class='btn btn-light ml-2' data-toggle="modal" data-target="#addCategories"><i class="fas fa-plus"></i> Categories</button>
        <button class='btn btn-light ml-2' data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus"></i> Product</button>
        </div>
        <hr/>
    @else
    <div class="mt-3"></div>    
    @endcan
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2 text-center">
                        <b>ID</b>
                    </div>
                    <div class="col-6 text-center">
                        <b>Name</b>
                    </div>
                    <div class="col-2 text-center">
                        <b>Amount</b>
                    </div>
                    @can('read-products')
                    @cannot('update-products')
                    <div class="col-2 text-center">
                        <b>Sold</b>
                    </div>
                    @endcannot
                    @endcan
                </div>
            </div>
            <div class="card-body">
            @foreach($products as $product)
                <div class="row mb-2">
                    <div class="col-2 text-center">
                        {{$product->id}}
                    </div>
                    <div class="col-6 text-center">
                        {{$product->name}}
                    </div>
                    @can('update-products')
                    <div class="col-2 text-center">
                        <input type="number" value='{{$product->amount}}' min='0' data-apply='#apply-{{$product->id}}' id='product-{{$product->id}}' class="form-control form-control-sm amount"/>
                    </div>
                    <div class="col-2">
                        <a href="product/{{$product->id}}" class="btn btn-primary btn-sm">Detail</a>
                        <button class='btn btn-success btn-sm apply' style='display:none' data-product='{{$product->id}}'  data-apply='#product-{{$product->id}}' id='apply-{{$product->id}}'>Apply</button>                          
                    </div>
                    @elsecan('read-products')
                    <div class="col-2 text-center">
                    {{$product->amount}}
                    </div>
                    <div class="col-2 text-center">
                    {{$product->sold}}
                    </div>
                    @endcan
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <!-- Add categories form -->
    <div class="modal fade" id="addCategories">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form action="{{route('add-categories')}}" method="post">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">New Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>Name</div>
                        <input type="text" class="form-control" name='name'/>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End categories form -->

    <!-- Add category form -->
    <div class="modal fade" id="addCategory">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form action="{{route('add-category')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>In categories</div>
                        <select name="parent_id" class='custom-select categorieslist'>
                        </select>
                        <div>Name</div>
                        <input type="text" class="form-control" name='name'/>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End add category form -->

    <!-- Add product form -->
    <div class="modal fade" id="addProduct">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div>Category</div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <select class='custom-select categorieslist' id='categoriesPorductForm'>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="category" class='custom-select' id='categoryPorductForm'>
                                    </select>
                                </div>
                            </div>
                            <div>Name</div>
                            <input type="text" name='name' class="form-control mb-2"/>
                            <div>Price</div>
                            <input type="number" min='0' step='1000' name='price' class="form-control mb-2"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>Amount</div>
                                    <input type="number" min='0' name='amount' class="form-control "/>
                                </div>
                                <div class="col-md-6">
                                    <div>Image</div>
                                    <div class="custom-file">
                                        <input type="file" name='img' class="custom-file-input" id="img">
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div>Description</div>
                            <textarea name="description" id="" cols="100%" rows="5" class='form-control'></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End product form -->
    <div class='d-flex justify-content-center mt-5'>
    {{$products->links()}}
    </div>
@endsection
@section('script')
    
    <script>
        const ajax = axios.create({
            
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
        ajax.get("{{route('option-categories')}}").then(function(res){
            $('.categorieslist').html(res.data);
        });
        $('#categoriesPorductForm').change(function(e){
            ajax.get("/admin/category/option/"+this.value).then(function(res){
                $('#categoryPorductForm').html(res.data);  
            });
        });
        $(".custom-file-input").on("change", function() {
           var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $('.amount').change(function(e){
            $(this.dataset.apply).show();
        })
        $('.apply').click(function(e){
            ajax.post('product/update/'+this.dataset.product,{
                amount: $(this.dataset.apply).val(),
            }).then(function(res){
                console.log(res.data);
            })
            $(this).hide();
        })
    </script>
@endsection