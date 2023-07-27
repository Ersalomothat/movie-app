@extends('home.user.index',[
    'title_name' => $title
])
@section('content')
    <div class="tab-item {{request()->is('*/user/history') ? 'active': ''}}">
        <div class="">
            <h3 class="title">{{$title}}</h3>
            <div class="row justify-content-between">
                <div class="col mb-50 mb-lg-0">
                    <div class="filter-tab tab">
                        <div class="filter-area">
                            <div class="filter-main">
                                <div class="left">
                                    <div class="item">
                                        <span class="show">Show :</span>
                                        <select class="select-bar" style="display: block;">
                                            <option value="12">12</option>
                                            <option value="15">15</option>
                                            <option value="18">18</option>
                                            <option value="21">21</option>
                                            <option value="24">24</option>
                                            <option value="27">27</option>
                                            <option value="30">30</option>
                                        </select>
                                        <div class="nice-select select-bar" tabindex="0"><span class="current">12</span>
                                            <ul class="list">
                                                <li data-value="12" class="option selected">12</li>
                                                <li data-value="15" class="option">15</li>
                                                <li data-value="18" class="option">18</li>
                                                <li data-value="21" class="option">21</li>
                                                <li data-value="24" class="option">24</li>
                                                <li data-value="27" class="option">27</li>
                                                <li data-value="30" class="option">30</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <span class="show">Sort By :</span>
                                        <select class="select-bar" style="display: none;">
                                            <option value="showing">now showing</option>
                                            <option value="exclusive">exclusive</option>
                                            <option value="trending">trending</option>
                                            <option value="most-view">most view</option>
                                        </select>
                                        <div class="nice-select select-bar" tabindex="0"><span class="current">now showing</span>
                                            <ul class="list">
                                                <li data-value="showing" class="option selected">now showing</li>
                                                <li data-value="exclusive" class="option">exclusive</li>
                                                <li data-value="trending" class="option">trending</li>
                                                <li data-value="most-view" class="option">most view</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <ul class="grid-button tab-menu">
                                    <input type="search">
                                </ul>
                            </div>
                        </div>
                        <div class="tab-area">
                            <div class="tab-item active">
                                <div class="movie-area mb-10">
                                    @foreach($histories as $booking)
                                        <div class="movie-list">
                                            <div class="movie-thumb c-thumb">
                                                <a href="#" class="w-100 bg_img h-100"
                                                   data-background="{{$booking->showtime->movie['poster_url']}}"
                                                   style="background-image: url(&quot;/demo/assets/images/movie/movie01.jpg&quot;);">
                                                    <img class="d-sm-none" src="/demo/assets/images/movie/movie01.jpg"
                                                         alt="movie">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title">
                                                    <a href="{{route('home.movie.detail-movie',$booking->showtime["movie"]["id"])}}">{{$booking->showtime->movie['title']}}</a>
                                                </h5>
                                                <p class="duration">2hrs 50 min</p>
                                                <div class="release">
                                                    <span>Release Date : </span> <a
                                                        href="#0">{{$booking->showtime->movie['release_date']}}</a><br>
                                                    <span>Age Rating : </span> <a
                                                        href="#0">{{$booking->showtime->movie['age_rating']}}</a>
                                                </div>
                                                <div class="release">
                                                </div>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="/demo/assets/images/movie/tomato.png" alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                    <li>
                                                        <form class="w-auto"
                                                              @if($booking["status"] == "paid")
                                                            action="{{route('home.booking.cancel-booking-movie', $booking["id"])}}"
                                                              @elseif($booking["status"] == "pending")
                                                            action="{{route('home.booking.booking', $booking["id"])}}"
                                                              @else
                                                            action="{{route('home.booking.booking-again', $booking["id"])}}"
                                                              @endif
                                                            method="post"
                                                            id="cancel-booking">
                                                            @csrf
                                                            <button class="custom-button" id="cancel-btn"
                                                                    type="submit" data-id="">
                                                                @if($booking["status"] == "paid")
                                                                    {{__("cancel")}}
                                                                @elseif($booking["status"] == "pending")
                                                                    {{__("booking")}}
                                                                @else
                                                                    {{__("booking again")}}
                                                                @endif
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                                <div class="book-area">
                                                    <div class="book-ticket">
                                                        <div class="react-item">
                                                            {{$booking["status"]}}

                                                        </div>
                                                        <div class="react-item mr-auto">
                                                            <a href="#0">
                                                                <div class="thumb">
                                                                    <img src="/demo/assets/images/icons/book.png"
                                                                         alt="icons">
                                                                </div>
                                                                <span>Total price : Rp. {{number_format($booking["total_price"])}}</span>
                                                            </a>
                                                        </div>
                                                        <div class="react-item">
                                                            <a href="#0">
                                                                <span>Number seats : {{$booking->ids_seats}}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
{{--    <script !src="">--}}
{{--        $("#cancel-booking").on('click', function (e) {--}}
{{--            e.preventDefault()--}}

{{--            $.ajax({--}}
{{--                url : e.target["action"],--}}
{{--                method : e.target["method"],--}}
{{--                processData: false,--}}
{{--                contentType: 'json',--}}
{{--                dataType: false,--}}
{{--                success(res) {--}}

{{--                },--}}
{{--                error(res) {--}}

{{--                },--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endpush
