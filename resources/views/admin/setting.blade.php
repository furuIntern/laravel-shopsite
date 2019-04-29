@extends('admin/layouts/manage')
@section('component')

<div class="container my-5">
    <div class="card">
        <div class="d-flex justify-content-between p-3">
            <div>
                <h2 class='my-0'>Title</h2>
            </div>
            <div>
                Company
                <a href='' class='text-secondary'><i class="fas fa-edit"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md">
            <div class="card p-3">
                <div class="d-flex justify-content-between">
                    <h2>Description</h2>
                    <div>
                        <a href="" class="text-secondary"><i class="fas fa-edit"></i></a>
                    </div>
                </div>
                <hr/>
                <div>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
            <div class="card p-3 mt-3">
                <div class="d-flex justify-content-between">
                    <h2>Products</h2>
                    <div>
                        <a href="" class="text-secondary"><i class="fas fa-edit"></i></a>
                    </div>
                </div>
                <hr/>
                <div class="row">
                <!--*  Product  *-->            
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card p-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>Logo</h2>
                    </div>
                    <div>
                        <a href='' class ='text-secondary'><i class="fas fa-edit"></i></a>
                    </div>
                </div>
                <img src="{{asset('vendor/logo.jpg')}}" class='w-100 my-2' alt="">
            </div>
        </div>
    </div>
</div>
@endsection