<x-app-layout title="Movie Detail">
    <!-- ==========Banner-Section========== -->
    <section class="details-banner bg_img" data-background="{{$movie["poster_url"]}}">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="{{$movie["poster_url"]}}" alt="movie">
                    <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                        <img src="/demo/assets/images/movie/video-button.png" alt="movie">
                    </a>
                </div>
                <div class="details-banner-content offset-lg-3">
                    <h3 class="title">{{$movie["title"]}}</h3>
                    <a href="#0" class="button">horror</a>
                    <div class="social-and-duration">
                        <div class="duration-area">
                            <div class="item">
                                <i class="fas fa-calendar-alt"></i><span>{{$movie["release_date"]}}</span>
                            </div>
                            <div class="item">
                                <i class="far fa-clock"></i><span>2 hrs 50 mins</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Book-Section========== -->
    <section class="book-section bg-one">
        <div class="container">
            <div class="book-wrapper offset-lg-3">
                <div class="left-side">

                    <div class="item">
                        <div class="item-header">
                            <div class="thumb">
                                <img src="/demo/assets/images/movie/cake2.png" alt="movie">
                            </div>
                            <div class="counter-area">
                                <span class="counter-item ">{{$movie["age_rating"]}}</span>
                            </div>
                        </div>
                        <p>Age Rating</p>
                    </div>
                    <div class="item">
                        <div class="item-header">
                            <h5 class="title">4.5</h5>
                            <div class="rated">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                        <p>Users Rating</p>
                    </div>

                </div>
                <a href="{{route('home.movie.movie-detail.seat-plan', $movie["id"])}}" class="custom-button">book
                    tickets</a>
            </div>
        </div>
    </section>
    <!-- ==========Book-Section========== -->

    <!-- ==========Movie-Section========== -->
    <section class="movie-details-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center flex-wrap-reverse mb--50">
                <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                </div>
                <div class="col-lg-9 mb-50">
                    <div class="movie-details">
                        <h3 class="title">Description</h3>
                        <p>{{$movie->description}}</p>
                    </div>
                    <div class="tab summery-review mt-4">
                        <div class="tab-area mt-2">
                            <div class="tab-item active" style="">
                                @foreach($show_times as $show)
                                <div class="movie-review-item">
                                    <div class="author">
{{--                                        <div class="thumb">--}}
{{--                                            <a href="#0">--}}
{{--                                                <img src="assets/images/cast/cast04.jpg" alt="cast">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                        <div class="movie-review-info">
                                            <h6 class="subtitle"><a href="#0">{{$show->teather["theater_name"]}}</a></h6>
                                            <span>{{$show->teather["theater_location"]}}</span>
                                            <span>{{$show["showtime_date"]}}</span>
                                        </div>
                                    </div>
                                    <div class="movie-review-content">
                                        <a href="" class="custom-button">book tickets</a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ==========Movie-Section========== -->

</x-app-layout>
