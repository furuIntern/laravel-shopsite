@extends('layouts.user')


@section('section')
    
@endsection

@section('article')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">Profile</div>
        <div class="card-body">
            <form id="upProfile">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name"/>
                <label for="phone">Phone Number</label>
                <input class="form-control" type="text" name="phone" id="phone"/>
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address"/>
                <input class="btn btn-success btn-block mt-3" type="submit" value="Update"/>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#upProfile').submit(function() {
                var form = $(this).serialize();

                axios.post('{{route("updateProfile")}}', {
                    form: form
                })
                 .then(function(data) {
                    alert(data);
                 })
                 .catch(function() {
                     
                 })
            })
        })
    </script>
@endsection
