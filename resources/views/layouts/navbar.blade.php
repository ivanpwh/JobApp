<nav class="navbar is-light" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{url('/home')}}">
        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>
    
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>
    
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            {{-- <a class="navbar-item">
                Home
            </a> --}}
        
            {{-- <a class="navbar-item">
                Documentation
            </a>
        
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                More
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div> --}}
        </div>
    
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                @guest
                    <a class="button is-primary" name="signup" href="{{route('register')}}" >
                        <strong>Sign up</strong>
                    </a>
                    <a href="{{ route('login') }}" class="button is-light" name="login">
                        Log in
                    </a>
                @else
                    @if (Route::has('login'))
                        @auth
                        <a href="{{url('/home')}}" class="button is-primary">
                            <strong>Home</strong>
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @else
                        <a class="button is-primary" name="signup" href="{{route('register')}}" >
                            <strong>Sign up</strong>
                        </a>
                        <a href="{{ route('login') }}" class="button is-light" name="login">
                            Log in
                        </a>
                        @endauth
                    @endif
                @endguest
                </div>
            </div>
        </div>
    </div>
</nav>