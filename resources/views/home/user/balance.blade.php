@extends('home.user.index',[
    'title_name' => $title
])
@section('content')
    <div class="tab-item {{request()->is('*/user/balance') ? 'active': ''}}">
        <div class="">
            <h3 class="title">{{$title}}</h3>
            <div class="row justify-content-center mt-2">
                <div class="col-sm-8 col-md-6">
                    <div class="contact-counter-item">
                            <img src="/demo/icon/wallet-icon.png" width="60px" alt="contact">
                        <div class="contact-counter-content mt-3">
                            <div class="counter-item">
                                <h6 class="title my-2">
                                <p>Rp. {{number_format(auth()->user()->balance['amount'])}}</p>
                                </h6>
                            </div>
                            <button class="btn btn-sm btn-outline-primary border-right-0 border-left-0" type="button">Top up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
