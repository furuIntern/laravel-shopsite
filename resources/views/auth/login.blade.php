@extends('layouts.form')
@section('content')
<form action="{{route('login')}}" method="post">
    @csrf
    <div class="container w-50 my-5">
        <div class="card shadow border-primary">
            <div class="card-header bg-primary text-light"><h2 class='text-center'><b>Login</b></h2></div>
            <div class="container my-3">
                <div class='row'>
                    <div class="col-md-8">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light border-primary">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <!--Input username-->
                            <input type="text" class="form-control border-primary" name='username' placeholder='Username'/>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light border-primary">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <!--Input password-->
                            <input type="text" class="form-control border-primary" name='password' placeholder='Password'/>
                        </div>
                    </div>
                    <div class="col-md-4 border-left text-center">
                        <div class="btn-group-vertical btn-group-lg">
                            <button class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                            <a href="{{route('register')}}" class="btn border-primary text-primary">
                            <i class="fas fa-user-edit"></i> Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>
@endsection