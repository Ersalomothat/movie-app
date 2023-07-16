@extends('home.user.index',[
    'title_name' => $title
])
@section('content')
    <div class="tab-item {{request()->is('*/user/history') ? 'active': ''}}">
        <div class="">
            <h3 class="title">{{$title}}</h3>
            <div class="row justify-content-between">
                <div class="col-md-4 col-lg-6 col-xl-8">
                    <div class="widget-1 widget-banner p-1">
                        History
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
