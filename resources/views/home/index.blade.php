<x-app-layout title="Home">
    <!-- ==========Banner-Section========== -->
    <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="/demo/assets/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">book your</span> tickets for
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Movie</b>
                        <b>Event</b>
                        <b>Sport</b>
                    </span>
                </h1>
                <p>Safe, secure, reliable ticketing.Your ticket to live entertainment!</p>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Ticket-Search========== -->
    <section class="search-ticket-section padding-top pt-lg-0">
        <div class="container">
            <div class="search-tab bg_img" data-background="/demo/assets/images/ticket/ticket-bg01.jpg">
                <div class="row align-items-center mb--20">
                    <div class="col-lg-6 mb-20">
                        <div class="search-ticket-header">
                            <h6 class="category">welcome to Boleto </h6>
                            <h3 class="title">what are you looking for</h3>
                        </div>
                    </div>
                </div>
                <div class="tab-area">
                    <div class="tab-item active">
                        <form class="ticket-search-form">
                            <div class="form-group large">
                                <input type="text" placeholder="Search for Movies">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Ticket-Search========== -->
    <section class="movie-section padding-top padding-bottom bg-two">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-lg-11">
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">movies</h2>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            @foreach($movies as $movie)
                                <div class="col-sm-4 col-lg-3">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{route('home.movie.detail-movie', $movie["id"])}}">
                                                <img src="{{$movie["poster_url"]}}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0">
                                                <a href="#0">{{$movie["title"]}}</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <div class="thumb">
                                                        <img src="/demo/assets/images/movie/tomato.png" alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <img src="/demo/assets/images/movie/cake.png" alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="movie-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/movie/movie01.jpg" alt="movie">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">alone</a>--}}
{{--            </h5>--}}
{{--            <ul class="movie-rating-percent">--}}
{{--                <li>--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/demo/assets/images/movie/tomato.png" alt="movie">--}}
{{--                    </div>--}}
{{--                    <span class="content">88%</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/demo/assets/images/movie/cake.png" alt="movie">--}}
{{--                    </div>--}}
{{--                    <span class="content">88%</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="movie-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/movie/movie02.jpg" alt="movie">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">mars</a>--}}
{{--            </h5>--}}
{{--            <ul class="movie-rating-percent">--}}
{{--                <li>--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/demo/assets/images/movie/tomato.png" alt="movie">--}}
{{--                    </div>--}}
{{--                    <span class="content">88%</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/demo/assets/images/movie/cake.png" alt="movie">--}}
{{--                    </div>--}}
{{--                    <span class="content">88%</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="movie-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/movie/movie03.jpg" alt="movie">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">venus</a>--}}
{{--            </h5>--}}
{{--            <ul class="movie-rating-percent">--}}
{{--                <li>--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/demo/assets/images/movie/tomato.png" alt="movie">--}}
{{--                    </div>--}}
{{--                    <span class="content">88%</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="thumb">--}}
{{--                        <img src="/demo/assets/images/movie/cake.png" alt="movie">--}}
{{--                    </div>--}}
{{--                    <span class="content">88%</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="event-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/event/event01.jpg" alt="event">--}}
{{--            </a>--}}
{{--            <div class="event-date">--}}
{{--                <h6 class="date-title">28</h6>--}}
{{--                <span>Dec</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">Digital Economy Conference 2020</a>--}}
{{--            </h5>--}}
{{--            <div class="movie-rating-percent">--}}
{{--                <span>327 Montague Street</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="event-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/event/event02.jpg" alt="event">--}}
{{--            </a>--}}
{{--            <div class="event-date">--}}
{{--                <h6 class="date-title">28</h6>--}}
{{--                <span>Dec</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">web design conference 2020</a>--}}
{{--            </h5>--}}
{{--            <div class="movie-rating-percent">--}}
{{--                <span>327 Montague Street</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="event-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/event/event03.jpg" alt="event">--}}
{{--            </a>--}}
{{--            <div class="event-date">--}}
{{--                <h6 class="date-title">28</h6>--}}
{{--                <span>Dec</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">digital thinkers meetup</a>--}}
{{--            </h5>--}}
{{--            <div class="movie-rating-percent">--}}
{{--                <span>327 Montague Street</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="sports-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/sports/sports01.jpg" alt="sports">--}}
{{--            </a>--}}
{{--            <div class="event-date">--}}
{{--                <h6 class="date-title">28</h6>--}}
{{--                <span>Dec</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">football league tournament</a>--}}
{{--            </h5>--}}
{{--            <div class="movie-rating-percent">--}}
{{--                <span>327 Montague Street</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="sports-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/sports/sports02.jpg" alt="sports">--}}
{{--            </a>--}}
{{--            <div class="event-date">--}}
{{--                <h6 class="date-title">28</h6>--}}
{{--                <span>Dec</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">world cricket league 2020</a>--}}
{{--            </h5>--}}
{{--            <div class="movie-rating-percent">--}}
{{--                <span>327 Montague Street</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-sm-4 col-lg-3">--}}
{{--    <div class="sports-grid">--}}
{{--        <div class="movie-thumb c-thumb">--}}
{{--            <a href="#0">--}}
{{--                <img src="/demo/assets/images/sports/sports03.jpg" alt="sports">--}}
{{--            </a>--}}
{{--            <div class="event-date">--}}
{{--                <h6 class="date-title">28</h6>--}}
{{--                <span>Dec</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="movie-content bg-one">--}}
{{--            <h5 class="title m-0">--}}
{{--                <a href="#0">basket ball tournament 2020</a>--}}
{{--            </h5>--}}
{{--            <div class="movie-rating-percent">--}}
{{--                <span>327 Montague Street</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
