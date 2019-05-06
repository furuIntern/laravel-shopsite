<<<<<<< HEAD
@extends('layouts.app')

=======
@extends('layouts.form')
>>>>>>> origin/trung-admin
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<<<<<<< HEAD
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
=======
            <div class="card mt-5 shadow">
                <div class="card-header text-center">
                <a href="{{route('login')}}" class="float-left">Back</a>
                <h2>
                {{ __('Register') }}
                </h2>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">Refill the form </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="container w-75">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class='text-secondary text-right'>Name</div>
                                </div>
                                <div class="col-md-8">
                                <input type="text" name='name' class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class='text-secondary text-right'>Phone</div>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name='phone'/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class='text-secondary text-right'>Email</div>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name='email'/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class='text-secondary text-right'>Username</div>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name='username'/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class='text-secondary text-right'>Password</div>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name='password'/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-secondary text-right">
                                    Confirm password
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name='password_confirmation'/>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Register') }}
                            </button>
>>>>>>> origin/trung-admin
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> origin/trung-admin
