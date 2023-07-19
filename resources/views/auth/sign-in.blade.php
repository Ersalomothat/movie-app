<x-app-layout title="Sign-in">
    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">Sign in</span>
                        <h2 class="title">welcome back</h2>
                    </div>
                    <form class="account-form" action="{{route('auth.sign-in')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email2">Email<span>*</span></label>
                            <input type="text" placeholder="Enter Your Email" name="email" id="email2" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass3">Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="pass3" name="password" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group checkgroup">
                            <input type="checkbox" id="bal2" required checked>
                            <label for="bal2">remember me</label>
                            <a href="#0" class="forget-pass">Forget Password</a>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="log in">
                        </div>
                    </form>
                    <div class="option">
                        Don't have an account? <a href="{{route('auth.sign-up')}}">sign up now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->
</x-app-layout>
