@extends('layouts.form')
@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <form action="update/{{$user->id}}" method="post">
            @csrf
            <div class="card-header">
                <div class="float-left"><a href="/admin/members">Back</a></div>
                <div class="text-center"><b><h4>{{$user->username}}</h4></b></div>
            </div>
            <div class="card-body">
                <div class="row">   
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-4 text-right">Name</div>
                            <div class="col-8">
                                <input type="text" name='name' value='{{$user->name}}' class="form-control"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 text-right">Phone</div>
                            <div class="col-8">
                                <input type="text" name='phone' value='{{$user->phone}}' class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="row mb-3">
                            <div class="col-4 text-right">Role</div>
                            <div class="col-8">
                                <select name="role" class='custom-select'>
                                    <option value="user" {{$user->getRoleNames()[0] == 'user' ? 'selected' : ''}}>User</option>
                                    <option value="seller" {{$user->getRoleNames()[0] == 'seller' ? 'selected' : ''}}>Seller</option>
                                    <option value="admin" {{$user->getRoleNames()[0] == 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="super-admin" {{$user->getRoleNames()[0] == 'super-admin' ? 'selected' : ''}}>Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="delete/{{$user->id}}" class='btn btn-danger'>Delete</a>
                            <button class="btn btn-success">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection