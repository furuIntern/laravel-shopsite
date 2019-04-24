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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-info text-light px-4" >
                <h2 class='text-center my-3'>Company</h2>
                <hr/>
                <a class='component btn btn-info btn-block'><i class="fas fa-cogs"></i> Setting</a>
                <a class='component btn btn-info btn-block'><i class="fas fa-store"></i> Orders</a>
                <a class='component btn btn-info btn-block'><i class="fas fa-warehouse"></i> Products</a>
                <a class='component btn btn-info btn-block'><i class="fas fa-user-friends"></i> Member</a>

            </div>
            <div class="col-md-9 text-secondary">
                @yield('component')
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
</body>
</html>