<div class="container">

    <div class="screen-area">
        <div class="screen-thumb">
            <img src="/demo/assets/images/movie/screen-thumb.png" alt="movie">
        </div>
        <h4 class="screen">screen</h4>
        <div class="screen-wrapper">
            <ul class="seat-area">
                @foreach(range(1,4) as $i)
                    <li class="seat-line">
                        <ul class="seat--area">
                            @foreach($seats[$i] as $idx => $seat)
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat">
                                            @if(!$seat['is_available'])
                                                {{--booked--}}
                                                <img src="/demo/assets/images/movie/seat01-free.png" alt="seat">
                                            @elseif(in_array($seat["id"], $this->id_seats))
                                                <img src="/demo/assets/images/tour/icon01.png" width="40px"
                                                     wire:click.lazy="changeSeat({{$seat['id']}})" alt="seat">
                                            @else
                                                <img src="/demo/assets/images/movie/seat01.png"
                                                     wire:click.lazy="selectSeat({{$seat['id']}})" alt="seat">
                                            @endif
                                            <span class="sit-num">{{$seat['id']}}</span>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{--                <button wire:click="get">d</button>--}}
    <div class="proceed-book bg_img py" data-background="/demo/assets/images/movie/movie-bg-proceed.jpg"
         style="background-image: url(&quot;/demo/assets/images/movie/movie-bg-proceed.jpg&quot;);">
        <div class="proceed-to-book">
            <div class="book-item">
                <span>You have Choosed Seat</span>

                <h6 class="title">{{$this->seatIdsToString()}}</h6>
            </div>
            <div class="book-item">
                <span>total harga</span>
                <h3 class="title">Rp. {{number_format($this->totalPrice)}}</h3>
            </div>
            <div class="book-item">
                <input type="button" class="custom-button" wire:click.lazy="proceed" value="proceed">
            </div>
        </div>
    </div>
</div>
