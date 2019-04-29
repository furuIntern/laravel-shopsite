@extends('admin.layouts.manage')
@section('component')
@if($errors->any())
    <div class="alert alert-danger text-center w-50 container fixed-top">Your request is invalid</div>
@endif
<div class="container mt-3">

<div class='text-right px-5'>
    <button class="border rounded-top border-warning bg-warning" data-toggle="modal" data-target="#addMember">
        <b style='font-size: 16px;'><i class="fas fa-plus-square"></i> Add</b>
    </button>
</div>
<div class="modal fade" id='addMember'>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="members/add" method="post">
                @csrf
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class='text-dark'><b>New member</b></h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Name</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name='name' class="form-control" placeholder='Name...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Phone</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name='phone' placeholder='Number phone...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Email</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name='email' placeholder='Email...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Username</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name='username' placeholder='Username...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Password</div>
                            </div>
                            <div class="col-md-8">
                            <input type="password" class="form-control" name='password' placeholder='Password...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 text-secondary text-right">
                                Confirm password
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name='password_confirmation' placeholder='Confirm password...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 text-secondary text-right">
                                Role
                            </div>
                            <div class="col-md-8">
                                <select name="role" class='custom-select'>
                                    <option value="user">User</option>
                                    <option value="seller">Seller</option>
                                    <option value="admin">Admin</option>
                                    <option value="super-admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center justify-content-center">
                    <button class="btn btn-success">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class='col-2 text-center'><b>ID</b></div>
                <div class='col-7 text-center'><b>Username</b></div>
                <div class='col-3 text-center'><b>Role</b></div>
            </div>
        </div>
        <div class="card-body">
            @foreach($users as $user)
                <a href="member/{{$user->id}}">
                    <div class="row my-2 py-2 text-muted">
                        <div class="col-2 text-center">{{$user->id}}</div>
                        <div class="col-7 text-center">{{$user->username}}</div>
                        <div class="col-3 text-center">{{$user->getRoleNames()[0]}}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.alert').fadeOut('slow');
</script>
@endsection