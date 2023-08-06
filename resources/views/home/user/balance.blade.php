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
                            <a href="javascript::void();" class="custom-button" data-toggle="modal"
                               data-target="#staticBackdrop"> Top up</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6">
                    <div class="tab summery-review">
                        <ul class="tab-menu">
                            <li>
                                History
                            </li>

                        </ul>
                        <div class="tab-area">
                            <div class="tab-item active">
                                    @forelse($bills as $bill)
                                <div class="movie-review-item py-1">
                                        <div class="author">
                                            <div class="movie-review-info">
                                                <span class="reply-date">{{$bill->created_at}}</span>

                                                <h6 class="subtitle">Rp. {{number_format($bill->amount)}} <span class="">{{$bill->bank}}</span> </h6>

                                                @if($bill['status'] === 'pending')
                                                    <span><i class="fas fa-check"></i>Success</span>
                                                @else
                                                    <span><i class="fas fa-check"></i>{{$bill->status}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="movie-review-content position-relative">
                                            <a href="{{$bill->invoice_url}}" class="custom-button py-1"
                                               style="font-size: 12px;">pay</a>
                                        </div>
                                </div>
                                    @empty
                                        no history bills
                                    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-utils.modal-top-up/>
@stop
