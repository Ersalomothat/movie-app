@props([
    'title',
    'seat_number',
    'ticket_price'
])

<div class="booking-summery bg-one">
    <h4 class="title">booking summery</h4>
    <ul>
        <li>
            <h6 class="subtitle">{{$title}}</h6>
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
            @endphp

            <h6 class="subtitle mb-0"><span>Tickets  Price</span><span>Rp. {{number_format(count($numOfSeat) * $ticket_price)}}</span></h6>
        </li>
    </ul>

</div>
