<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mylogo">
                <a href="home.html"><img src="image/logo.png" alt=""></a>
            </div>
            <div class="col-md-6 my-navbar-setup">
                <nav id="navbar" class="navbar navbar-expand-lg  navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link d-lnk" href="{{url('login')}}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-lnk" href="#">Sign up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" aria-current="page" href="{{url('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link {{ (request()->is('about_us')) ? 'active' : '' }}" href="{{url('about_us')}}">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#">How it works</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link {{ (request()->is('events')) ? 'active' : '' }}" href="{{url('events')}}">Events</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link {{ (request()->is('message')) ? 'active' : '' }}" href="{{url('message')}}">Get in touch</a>
                                </li>
                                @if(Auth::user())
                                <li class="nav-item ">
                                    <a class="nav-link {{ (request()->is('affiliate')) ? 'active' : '' }}" href="{{url('affiliate')}}">affiliate</a>
                                </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-3 login-set">
                @if(Auth::user())
                <a href="#">{{Auth::user()->first_name ?? ''}} {{Auth::user()->last_name ?? ''}}</a>
                <a class="mysignup" href="{{url('logout')}}">Logout</a>
                @else
                    <a href="{{url('login')}}">Log in</a>
                    <!--<a class="mysignup" href="sign-up.html">Sign up</a>-->
                @endif


            </div>
        </div>
    </div>
</header>
