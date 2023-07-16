<x-app-layout title="Movie Checkout">
    @php
    $movie = request()->movie;
    $seat_number =request()->query('seat_number');
    @endphp
    <!-- ==========Banner-Section========== -->
    <section class="details-banner hero-area bg_img seat-plan-banner"
             data-background="/demo/assets/images/banner/banner04.jpg">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    <h3 class="title">Venus</h3>
                    <div class="tags">
                        <a href="#0">City Walk</a>
                        <a href="#0">English - 2D</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    <section class="page-title bg-one">
        <div class="container">
            <div class="page-title-area">
                <div class="item md-order-1">
                    <a href="{{route('home.movie.movie-detail.seat-plan', [
                                    'movie'=>$movie["id"],
                                    'seat_number' => $seat_number
                                                ])}}" class="custom-button back-button">
                        <i class="flaticon-double-right-arrows-angles"></i>back
                    </a>
                </div>
                <div class="item date-item">
                    <span class="date">MON, SEP 09 2020</span>
                    <span class="date">
                    {{request()->query('seat_number')}}

                    </span>
                    <select class="select-bar">
                        <option value="sc1">09:40</option>
                        <option value="sc2">13:45</option>
                        <option value="sc3">15:45</option>
                        <option value="sc4">19:50</option>
                    </select>
                </div>
                <div class="item">
                    <h5 class="title">05:00</h5>
                    <p>Mins Left</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    <div class="movie-facility padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-widget checkout-contact">
                        <h5 class="title">Fill identify form </h5>
                        <form class="checkout-contact-form" action="{{route('home.user.booking-movie')}}" method="post">
                            @csrf
                            <input type="hidden" name="movie" value="{{$movie}}">
                            <input type="hidden" name="current_url" value="{{\URL::full()}}" />
                            <div class="form-group">
                                <input type="text" required placeholder="Full Name" name="name">
                                @error('name')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" required placeholder="Enter your Mail" name="email">
                                @error('email')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Birth of date
                                <input type="date" name="birth_Date" required>
                                    @error('birth_Date')
                                    <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Continue" class="custom-button">
                            </div>
                        </form>
                    </div>
                </div>
{{--                booking summarty--}}
                <div class="col-lg-4">
                    <div class="booking-summery bg-one">
                        <h4 class="title">booking summery</h4>
                        <ul>
                            <li>
                                <h6 class="subtitle">{{$movie['title']}}</h6>
                                <span class="info">English-2d</span>
                            </li>
                            <li>
                                <h6 class="subtitle"><span>City Walk</span><span>02</span></h6>
                                <div class="info"><span>10 SEP TUE, 11:00 PM</span> <span>Tickets</span></div>
                            </li>

                        </ul>
                        <ul class="side-shape">
                            <li>
                                <h6 class="subtitle"><span>Seat number</span></h6>
                                <span class="info"><span>{{$seat_number}}</span></span>
                            </li>

                            <li>
                                @php
                                    $numOfSeat = explode(',',$seat_number);
                                    $movie_price = $movie["ticket_price"];

                                @endphp

                                <h6 class="subtitle mb-0"><span>Tickets  Price</span><span>{{count($numOfSeat) * $movie_price}}</span></h6>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->


</x-app-layout>
