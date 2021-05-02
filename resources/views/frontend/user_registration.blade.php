@extends('frontend.layouts.app')
@section('meta_title','')
@section('meta_description','')
@section('meanubar','header_in')
@section('content')
    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="sign_up">
                    <div class="head">
                        <div class="title">
                        <h3>Sign Up</h3>
                    </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <a href="#0" class="social_bt facebook">Sign up with Facebook</a>
                        <a href="#0" class="social_bt google">Sign up with Google</a>
                        <div class="divider"><span>Or</span></div>
                        <h6>Personal details</h6>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                @error('name') <label style="color: red">* {{ $errors->first('name') }} </label>
                                @enderror
                                <input type="text" class="form-control" name="name" placeholder="First and Last Name">
                                <i class="icon_pencil"></i>
                            </div>
                            <div class="form-group">
                                @error('email') <label style="color: red">* {{ $errors->first('email') }} </label>
                                @enderror
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                                <i class="icon_mail"></i>
                            </div>
                            <div class="form-group">
                                @error('mobile') <label style="color: red">* {{ $errors->first('mobile') }} </label>
                                @enderror
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile Number">
                                <i class="icon_phone"></i>
                            </div>
                            <div class="form-group add_bottom_15">
                                @error('password') <label style="color: red">* {{ $errors->first('password') }} </label>
                                @enderror
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <i class="icon_lock"></i>
                            </div>
                            <button type="" class="btn_1 full-width mb_5">Sign up Now</button>
                        </form>
                    </div>
                </div>
                <!-- /box_booking -->
            </div>
            <!-- /col -->

        </div>
        <!-- /row -->
    </div>
@endsection
@section('styles')
    <link href="{{ asset('frontend/css/booking-sign_up.css') }}" rel="stylesheet">
@endsection
@section('scripts')

@endsection
