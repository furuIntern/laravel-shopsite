<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
=======
@extends('layouts.form')
@section('content')
<form action="{{route('login')}}" method="post">
    @csrf
    <div class="container w-50 my-5">
        <div class="card shadow border-primary">
            <div class="card-header bg-primary text-light"><h2 class='text-center'><b>Login</b></h2></div>
            <div class="container my-3">
                @if($errors->any())
                    <div class="alert alert-danger">Your username or password is incorrect</div>
                @endif
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
                            <input type="password" class="form-control border-primary" name='password' placeholder='Password'/>
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
>>>>>>> origin/trung-admin
