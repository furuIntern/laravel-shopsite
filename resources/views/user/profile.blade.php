@extends('layouts\user')

@section('article')
    <div class="card p-0 col-md-8">
        <div class="card-header">Profile</div>
        <div class="card-body">
            <form id="profile" method="POST">
                <label for="name">Name</label>
<<<<<<< HEAD
                <input class="form-control mb-3" type="text" name="name" value="{{$user->name ? $user->name : NULL}}"/>
=======
                <input class="form-control mb-3" type="text" name="name" value="{{$user->name}}"/>
>>>>>>> master
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="phone">Phone</label>
<<<<<<< HEAD
                <input class="form-control  mb-3" type="text" name="phone" value="{{$user->phone ? $user->phone : NULL}}"/>
=======
                <input class="form-control  mb-3" type="text" name="phone" value="{{$user->phone}}"/>
>>>>>>> master
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="address">Address</label>
<<<<<<< HEAD
                <input class="form-control  mb-3" type="text" name="address" value="{{$user->address ? $user->address : NULL}}"/>
=======
                <input class="form-control  mb-3" type="text" name="address" value="{{$user->address}}"/>
>>>>>>> master
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @csrf
                <input class="btn btn-success btn-block mt-3" type="submit" id="update" value="Update"/>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            
            $('#update').click(function(e) {
                
                e.preventDefault();
                var name = $('input[name="name"]').val();
                var phone = $('input[name="phone"]').val();
                var address = $('input[name="address"]').val();

                axios.post('{{route("upProfile")}}', {
                    
                    name: name,
                    phone: phone,
                    address: address
                })
                 .then(function(data) {
                    
                    console.log(data);
                 })
            })
        })
    </script>
@endsection