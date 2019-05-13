<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
=======
    <title></title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<<<<<<< HEAD

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
=======
 
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
<<<<<<< HEAD
                    {{ config('app.name', 'Laravel') }}
=======
                    <img src="" alt="" srcset="">
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
<<<<<<< HEAD
                    <ul class="navbar-nav mr-auto">

=======
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a data-id="{{$parent->id}}" class="dropdown-item category" href="">{{$parent->name}}</a>
                                @foreach (App\Categories::with('children')->where('parent_id', NULL)->get() as $parent)
                                    @if (!empty($parent->children[0]))
                                        <ul class="dropdown-menu">
                                            @foreach ($parent->children as $chill)
                                                <li>
                                                    <a data-id="{{$chill->id}}" class="dropdown-item category " href="">{{$chill->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                        </li>
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
<<<<<<< HEAD
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
=======
                            
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('home')}}">Profile</a>
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
<<<<<<< HEAD
=======
                                    
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<<<<<<< HEAD
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
=======
        
            
        
    </div>
    <div class="container mt-5 mb-5 main">
       
        @yield('content')
        
    </div>
    <footer class="footer">
        @include('element\footer')
    </footer>
</body>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    @yield('script')
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
</html>
