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
                        <form class="payment-card-form account-form"
                              action="{{route('home.payment.make-payment', $detail['booking_id'])}}"
                              method="post"
                        >
                            @csrf
                            <div class="form-group">
                                @if($canPay)
                                <input type="submit" class="custom-button" value="make payment">
                                @else
                                    <a href="javascript::void();" class="custom-button" data-toggle="modal" data-target="#staticBackdrop"> Top up</a>

                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-utils.modal-top-up/>

</x-app-layout>
