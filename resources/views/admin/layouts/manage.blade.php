<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Management</title>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 bg-info text-light px-4" >
                <h2 class='text-center my-3'>Company</h2>
                <hr/>
                <a class='component text-light btn btn-info btn-block' href="{{route('show-setting')}}"><i class="fas fa-cogs"></i> Setting</a>
                <a href="{{route('show-orders')}}" class='component btn btn-info text-light btn-block'><i class="fas fa-store"></i> Orders</a>
                <a class='component text-light btn btn-info btn-block' href="{{route('show-products')}}"><i class="fas fa-warehouse"></i> Products</a>
                <a class='component text-light btn btn-info btn-block' href="{{route('show-members')}}"><i class="fas fa-user-friends"></i> Member</a>

            </div>
            <div class="col-md-10 text-secondary">
                <div class='row bg-white shadow-sm justify-content-end px-3'>
                    <h2 class='my-3'>Superadmin</h2>
                    <!--Logout-->
                    <a href="{{route('get-logout')}}" class="text-secondary"><h2 class='my-3 pl-2 ml-2 border-left'><i class="fas fa-power-off"></i></h2></a>
                </div>
                @yield('component')
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
</body>
</html>