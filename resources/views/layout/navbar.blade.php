<div class="topBox">
    <div class="topBox-holder">
        <div class="contactLts">
            <a href="tel:+2348032345678" id="contact"><i class="fas fa-phone-alt"></i> +234-803-234-5678</a>
            <a href="mailto:support@venuehub.ng" id="mail"><i class="fas fa-envelope"></i> Support@venuehub.ng</a>
        </div>
        <div class="social-links">
            {{-- <i class="img-icon">
                <img src="{{asset('img/facebook.png')}}">
            </i>
            <i class="img-icon">
                <img src="{{asset('img/whatsapp.png')}}">

            </i>
            <i class="img-icon">
                <img src="{{asset('img/ig.png')}}">
            </i> --}}
            <a  class="btn btn-teal needHelp" href="{{route('venue-concierge')}}">Need Help?</a>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-teal" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand offset-md-1 text-light" href="/">
            VENUEHUB.NG
            {{-- <img src="{{ asset('img/white-logo.png') }}" alt="logo"> --}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav w-100">
                @auth
                    <li class="nav-item dropdown offset-md-10">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                            <img class="avatarImg" width="25" height="25"
                                src="{{ asset('userImages') }}/{{ auth()->user()->image }}" class="img-fluid"
                                alt="User Image">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li>
                                <form action="{{ route('logout.dashboard') }}" method="post">
                                    @csrf
                                    <input class="bgInput" type="submit" value="     Logout">
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
            @guest
                <a type="button" class="btn btn-warning accountBtn" href="{{ route('login-account') }}">ADD VENUE</a>
            @endguest
        </div>
    </div>
</nav>
<script src="{{ asset('/js/navbar.js') }}"></script>
