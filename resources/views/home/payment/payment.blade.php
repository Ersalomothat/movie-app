<x-app-layout title="Payment">
    <div class="movie-facility padding-bottom padding-top">

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <x-utils.booking-summary
                :title="$detail['title']"
                :showtime="$detail['showtime']"
                :seat_number="$detail['seat_number']"
                :ticket_price="$detail['ticket_price']"


                />
            </div>
            <div class="col-lg-8">
                <div class="checkout-widget checkout-card mb-0">
                    <h5 class="title">Payment Option </h5>
                    <ul class="payment-option">
                        <li class="d-flex">
                            <a href="#0">
                                <img src="/demo/icon/wallet-icon.png" width="40px" alt="payment">
                                <span>My Wallet</span>
                            </a>
                        </li>
                        <li class="d-flex">
                            <h4 class="title my-auto">Rp. {{number_format($user->balance['amount'])}}</h4>
                        </li>
                    </ul>
                    <form class="payment-card-form" action="{{route('home.payment.make-payment', $detail['booking_id'])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="submit" class="custom-button" value="make payment">
                        </div>
                    </form>
                    <p class="notice">
{{--                        By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>--}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
