<header>
    <nav class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse  " id="navbarColor03">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link "
                       href="{{route('frontHome')}}">Home </a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item active">
                        <a class="nav-link "
                           href="{{route('category',['categories'=>$category->slug])}}">{{$category->name}} </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
