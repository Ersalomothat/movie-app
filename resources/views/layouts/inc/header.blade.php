<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="#">
                    <img src="/demo/assets/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="{{route('home')}}" class="{{request()->is('home') ? 'active': ''}}">Home</a>
                </li>
                <li>
                    <a href="#0" class="{{request()->is('*/movie/*') ? 'active': ''}}">movies</a>
                </li>
                @auth
                    <li class="">
                        <a href="{{route('home.user.profile')}}" class="{{request()->is('*/user/*') ? 'active': ''}}">Profile</a>

                    </li>
                    <li class="">
                        <form action="{{route('home.logout')}}" method="post" id="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="custom-button text-sm-center py-0">Logout</button>
                            @csrf
                        </form>
                    </li>
                @else

                    <li class="header-button pr-0">
                        <a href="{{route('auth.sign-up')}}">join us</a>
                    </li>
                @endauth
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
