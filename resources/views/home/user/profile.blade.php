@extends('home.user.index', ['title_name' => $title])
@section('content')
    <div class="tab-item {{request()->is('*/user/profile') ? 'active': ''}}">
        <div class="">
            <h3 class="title">{{$title}}</h3>
            <div class="row justify-content-between">
                <div class="col-md-4 col-lg-6 col-xl-8">
                    <div class="widget-1 widget-banner p-1">
                        <form class="contact-form" id="contact_form_submit">
                            <div class="form-group">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" placeholder="Enter Your Full Name" name="name"
                                       id="name" required="" value="{{auth()->user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" placeholder="Enter Your Email" name="email"
                                       id="email" required="" value="{{auth()->user()->email}}">
                            </div>
                            <div class="form-group">
                                <label for="subject">Age<span>*</span></label>
                                <input type="text" placeholder="Enter Your Subject" name="subject"
                                       id="subject" required="" disabled
                                       value="{{get_age(auth()->user()['birth_date']). " years old"}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="save changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
