@extends('layouts.form')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
<<<<<<< HEAD

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
=======
                        <div class="container w-75">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class='text-secondary text-right'>Name</div>
                                </div>
                                <div class="col-md-8">
                                <input type="text" name='name' class="form-control"/>
                                </div>
>>>>>>> master
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
<<<<<<< HEAD
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required autocomplete="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
=======
                        <hr/>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary">
>>>>>>> master
                                    {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection