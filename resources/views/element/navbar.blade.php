<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div></div>
    <div> <!---->
        <ul class="navbar-nav" id="bar">
            <li class="nav-item dropdown">
                <a class="nav-link" href="">category</a>

                <ul class="dropdown-menu">
                        @foreach (App\Categories::with('children')->where('parent_id', NULL)->get() as $parent)
                                   
                        <li class="dropdown-submenu">
                            <a data-id="{{$parent->id}}" class="dropdown-item category" href="">{{$parent->name}}</a>
                                    
                                @if (!empty($parent->children[0]))
                                    <ul class="dropdown-menu">
                                        @foreach ($parent->children as $chill)
                                            <li>
                                                <a data-id="{{$chill->id}}" class="dropdown-item category " href="">{{$chill->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
            </li>
            
        </ul>
    </div>
</nav>
