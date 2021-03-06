<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="p-logo" href="{{route('admin')}}">English conversation </a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                            <!-- Authentication Links -->
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('getRegister') }}">Register</a></li>
                            </ul>
                    </li>
                @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}<span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin') }}">Admin Management</a></li>
                                <li><a href="{{route('userPost')}}">{{Auth::user()->name}}'s post</a></li>
                                <li><a href="{{ route('getUserProfile', Auth::user()->id) }}">Profile</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                @endif
            </ul>
        </div>
    </div>
</nav>