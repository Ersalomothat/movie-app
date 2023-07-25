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
                                <input type="text" name="q" value="{{$q}}" placeholder="Search for Movies">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
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
                            @forelse($movies as $movie)
                                <div class="col-sm-4 col-lg-3">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{route('home.movie.detail-movie', $movie["id"])}}">
                                                <img src="{{$movie["poster_url"]}}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0">
                                                <a href="{{route('home.movie.detail-movie', $movie["id"])}}">{{$movie["title"]}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div>
                                    No movie found
                                </div>
                            @endforelse
                        </div>
                        <div class="">
                            {{$movies->appends(["q" => $q])->links('pagination::bootstrap-5')}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
