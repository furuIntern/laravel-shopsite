<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div></div>
    <div> <!---->
        <ul class="navbar-nav" id="bar">
            <li class="nav-item">
                <a class="nav-link" href="">pages</a>
            </li>
            <li class="nav-item ">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    shop
                </a>
                <ul class="">
                        @foreach (App\Categories::with('children')->where('parent_id', NULL)->get() as $parent)
                       
                        <li class="">
                            <a data-id="{{$parent->id}}" class="category" href="">{{$parent->name}}</a>
                            
                            @if (!empty($parent->children[0]))
                                <ul class="">
                                    @foreach ($parent->children as $chill)
                                        <li>
                                            <a data-id="{{$chill->id}}" class="category" href="">{{$chill->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item"><a href=""></a></li>
            <li class="nav-item"><a href=""></a></li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>
            </li>
        </ul>
    </div>
</nav>
