<x-app-layout title="My - {{$title_name}}" >
    <section class="movie-details-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center flex-wrap-reverse mb--50">
                <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                    <div class="widget-1 widget-offer">
                        <h3 class="title">Menu</h3>
                        @php
                            $isProfilePage = request()->is('*/user/profile') ? 'active': '';
                            $isBalancePage = request()->is('*/user/balance') ? 'active': '';
                            $isHistoryPage = Str::is('*/user/history', request()->path()) ? 'active' : '';
                        @endphp
                        <div class="offer-body">
                            <ul class="tab-menu">
                                <li class="contact-counter-item p-2 mb-2 {{$isProfilePage}}">
                                    <a href="{{route('home.user.profile')}}" class="">Profile</a>
                                </li>
                                <li class="contact-counter-item p-2 mb-2 {{$isBalancePage}}">
                                    <a href="{{route('home.user.balance')}}" class="">Balance</a>
                                </li>
                                <li class="contact-counter-item p-2 mt-2 {{$isHistoryPage}}">
                                    <a href="{{route('home.user.history')}}" class="">History</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mb-50">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
