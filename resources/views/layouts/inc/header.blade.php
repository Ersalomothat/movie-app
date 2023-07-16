<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="index-2.html">
                    <img src="/demo/assets/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="{{route('home')}}" class="{{request()->is('home') ? 'active': ''}}">Home</a>
                </li>
{{--                movie-app/movie-detail/movie-id/checkout#0--}}

                <li>
                    <a href="#0" class="{{request()->is('*/movie/*') ? 'active': ''}}">movies</a>
                </li>
                <li>
                    <a href="{{route('home.user.profile')}}" class="{{request()->is('*/user/*') ? 'active': ''}}">Profile</a>
                </li>
                <li class="header-button pr-0">
                    <a href="{{route('auth.sign-up')}}">join us</a>
                </li>
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
