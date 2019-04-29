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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection