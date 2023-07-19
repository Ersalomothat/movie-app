<x-app-layout title="Sign-up">

    <section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">welcome</span>
                        <h2 class="title">Movie App </h2>
                    </div>
                    <form class="account-form" action="{{route('auth.sign-up')}}" method="post" id="">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name<span>*</span></label>
                            <input type="text" name="name" placeholder="Enter Your Name" id="name"/>
                            @error('name')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email1">Email<span>*</span></label>
                            <input type="email" name="email" placeholder="Enter Your Email" id="email1">
                            @error('email')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birth_Date">Birth of date<span>*</span></label>
                            <input type="date" name="birth_Date" id="birth_Date">
                            @error('birth_Date')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password<span>*</span></label>
                            <input type="password" name="password" placeholder="Password" id="pass1">
                            @error('password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass2">Confirm Password<span>*</span></label>
                            <input type="password" name="confirm_password" placeholder="Password" id="pass2">
                            @error('confirm_password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Sign Up">
                        </div>
                    </form>
                    <div class="option">
                        Already have an account? <a href="{{route('auth.sign-in')}}">Login</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
