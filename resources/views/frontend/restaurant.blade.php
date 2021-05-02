@extends('frontend.layouts.app')
@section('meta_title','')
@section('meta_description','')
@section('meanubar','header_in')
@section('content')
    <div class="hero_in detail_page background-image" @if($banner=App\Models\RestaurantBanner::orderBy('id')->first()) data-background="url({{ asset('uploads/restaurant/banner/'.$banner->image) }})" @else data-background="url(img/restaurant_detail_hero.jpg)" @endif >
        <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container">
                <div class="main_info">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6">
                            <div class="head"><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></div>
                            <h1>{{ $restaurant->name }}</h1>
                            {{ $restaurant->address.', '.$restaurant->city->name.', '.$restaurant->state->name.', '.$restaurant->country->name }} - <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="blank">Get directions</a>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-6">
                            <div class="buttons clearfix">
                                <span class="magnific-gallery">
                                   @foreach($banners as $key => $banner)
                                    @if($key==0)
                                        <a href="{{ asset('uploads/restaurant/banner/'.$banner->image) }}" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
                                    @else
                                        <a href="{{ asset('uploads/restaurant/banner/'.$banner->image) }}" title="Photo title" data-effect="mfp-zoom-in"></a>
                                    @endif
                                   @endforeach
                                </span>
                                <a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /main_info -->
            </div>
        </div>
    </div>
    <!--/hero_in-->

    <div class="container margin_detail">
        <div class="row">
            <div class="col-lg-8">

                <div class="tabs_detail">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Information</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
                        </li>
                    </ul>

                    <div class="tab-content" role="tablist">
                        <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                            <div class="card-header" role="tab" id="heading-A">
                                <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                        Information
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                                <div class="card-body info_content">
                                    <p>Mei at intellegat reprehendunt, te facilisis definiebas dissentiunt usu. Choro delicata voluptatum cu vix. Sea error splendide at. Te sed facilisi persequeris definitiones, ad per scriptorem instructior, vim latine adipiscing no. Cu tacimates salutandi his, mel te dicant quodsi aperiri. Unum timeam his eu.</p>
                                    <p>An malorum ornatus nostrum vel, graece iracundia laboramus cu ius. No pro mazim blandit instructior, sumo voluptaria has et, vide persecuti abhorreant ne est.</p>
                                    <div class="add_bottom_25"></div>
                                    <h2>Pictures from our users</h2>
                                    <div class="pictures magnific-gallery clearfix">
                                        @foreach($galleries as $key => $gallery)
                                            @if($key==count($galleries)-1)
                                            <figure><a  href="{{ asset('uploads/restaurant/gallery/'.$gallery->image) }}" title="{{ $gallery->heading }}" data-effect="mfp-zoom-in"><span class="d-flex align-items-center justify-content-center">+{{ count($galleries) }}</span><img src="{{ asset('uploads/restaurant/gallery/'.$gallery->image) }}" data-src="{{ asset('uploads/restaurant/gallery/'.$gallery->image) }}" class="lazy" alt=""></a></figure>
                                            @else
                                            <figure><a href="{{ asset('uploads/restaurant/gallery/'.$gallery->image) }}" title="{{ $gallery->heading }}" data-effect="mfp-zoom-in"><img src="{{ asset('uploads/restaurant/gallery/'.$gallery->image) }}" data-src="{{ asset('uploads/restaurant/gallery/'.$gallery->image) }}" class="lazy" alt=""></a></figure>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- /pictures -->
                                    <h2>{{ $restaurant->name }} Menu</h2>
                                    @foreach ($categories as $cat_key=>$category)
                                        <h3>{{ $category->name }}</h3>
                                        @if(App\Models\Menu::whereCategoryId($category->id)->orderBy('name')->count()<=3)
                                            @foreach (App\Models\Menu::whereCategoryId($category->id)->orderBy('name')->get() as $menu)
                                                <div class="menu_item">
                                                    <em>&#8377; {{ $menu->price }}</em>
                                                    <h4>{{ $menu->name }}</h4>
                                                    <p>{{ $menu->brief_decription }}</p>
                                                </div>
                                            @endforeach
                                            <hr>
                                        @else
                                            @foreach (App\Models\Menu::whereCategoryId($category->id)->orderBy('name')->get() as $key=>$menu)
                                                @if($key<=2)
                                                    <div class="menu_item">
                                                        <em>&#8377; {{ $menu->price }}</em>
                                                        <h4>{{ $menu->name }}</h4>
                                                        <p>{{ $menu->brief_decription }}</p>
                                                    </div>
                                                @endif

                                            @endforeach
                                            <div class="content_more">
                                            @foreach (App\Models\Menu::whereCategoryId($category->id)->orderBy('name')->get() as  $key=>$menu)
                                                @if($key>=3)
                                                    <div class="menu_item">
                                                        <em>&#8377; {{ $menu->price }}</em>
                                                        <h4>{{ $menu->name }}</h4>
                                                        <p>{{ $menu->brief_decription }}</p>
                                                    </div>
                                                @endif

                                            @endforeach
                                            </div>
                                            <a href="#{{ $cat_key }}" class="show_hide" data-content="toggle-text">Read More</a>
                                            <hr>
                                        @endif
                                    @endforeach
                                    <!-- /special_offers -->

                                    <div class="other_info">
                                    <h2>How to get to {{ $restaurant->name }}</h2>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Address</h3>
                                            <p>{{ $restaurant->address.', '.$restaurant->city->name.', '.$restaurant->state->name.', '.$restaurant->country->name }}<br><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="blank"><strong>Get directions</strong></a></p>
                                            <strong>Follow Us</strong><br>
                                            <p class="follow_us_detail"><a href="#0"><i class="social_facebook_square"></i></a><a href="#0"><i class="social_instagram_square"></i></a><a href="#0"><i class="social_twitter_square"></i></a></p>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Opening Time</h3>
                                            <p><strong>Lunch</strong><br> Mon. to Sat. 11.00am - 3.00pm<p>
                                            <p><strong>Dinner</strong><br> Mon. to Sat. 6.00pm- 1.00am</p>
                                            <p><span class="loc_closed">Sunday Closed</span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Services</h3>
                                            <p><strong>Credit Cards</strong><br> Mastercard, Visa, Amex</p>
                                            <p><strong>Other</strong><br> Wifi, Parking, Wheelchair Accessible</p>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tab -->

                        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                            <div class="card-header" role="tab" id="heading-B">
                                <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                        Reviews
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                <div class="card-body reviews">
                                    <div class="row add_bottom_45 d-flex align-items-center">
                                        <div class="col-md-3">
                                            <div id="review_summary">
                                                <strong>{{ $restaurant->ratings()->avg('rating_food_quality') }}</strong>
                                                <em>Superb</em>
                                                <small>Based on {{ $restaurant->ratings()->avg('rating_food_quality') }} reviews</small>
                                            </div>
                                        </div>
                                        <div class="col-md-9 reviews_sum_details">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>Food Quality</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: {{ $restaurant->ratings()->avg('rating_food_quality')*20 }}%" aria-valuenow="{{ $restaurant->ratings()->avg('rating_food_quality')*20 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{ $restaurant->ratings()->avg('rating_food_quality') }}</strong></div>
                                                    </div>
                                                    <!-- /row -->
                                                    <h6>Service</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: {{ $restaurant->ratings()->avg('rating_service')*20 }}%" aria-valuenow="{{ $restaurant->ratings()->avg('rating_service')*20 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{ $restaurant->ratings()->avg('rating_service') }}</strong></div>
                                                    </div>
                                                    <!-- /row -->
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Location</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: {{ $restaurant->ratings()->avg('rating_location')*20 }}%" aria-valuenow="{{ $restaurant->ratings()->avg('rating_location')*20 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{ $restaurant->ratings()->avg('rating_location') }}</strong></div>
                                                    </div>
                                                    <!-- /row -->
                                                    <h6>Price</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: {{ $restaurant->ratings()->avg('price_rating')*20 }}%" aria-valuenow="{{ $restaurant->ratings()->avg('price_rating')*20 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{ $restaurant->ratings()->avg('price_rating') }}</strong></div>
                                                    </div>
                                                    <!-- /row -->
                                                </div>
                                            </div>
                                            <!-- /row -->
                                        </div>
                                    </div>

                                    <div id="reviews">
                                        @foreach ($restaurant->ratings as $key=>$rating)
                                        <div class="review_card">
                                            <div class="row">
                                                <div class="col-md-2 user_info">
                                                    <figure><img src="img/avatar4.jpg" alt=""></figure>
                                                    <h5>{{ Str::ucfirst($rating->user->name) }}</h5>
                                                </div>
                                                <div class="col-md-10 review_content">
                                                    <div class="clearfix add_bottom_15">
                                                        <span class="rating">{{ $rating->rating_food_quality }}<small>/5</small> <strong>Rating average</strong></span>
                                                        <em>Published  {{ \Carbon\Carbon::parse($rating->created_at)->diffForhumans() }}</em>
                                                    </div>
                                                    <h4>{{ $rating->title }}</h4>
                                                    <p>{{ $rating->comment }}</p>

                                                </div>
                                            </div>
                                            <!-- /row -->
                                        </div>
                                        @endforeach
                                        <!-- /review_card -->
                                    </div>
                                    <!-- /reviews -->
                                    <div class="text-right"><a href="{{ route('leave.review',$restaurant->slug) }}" class="btn_1">Leave a review</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_detail -->
            </div>
            <!-- /col -->

            <div class="col-lg-4" id="sidebar_fixed">
                <div class="box_booking">
                    <div class="head">
                        <h3>Book your table</h3>
                        {{-- <div class="offer">Up to -40% off</div> --}}
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <form method="post">
                            @csrf
                        <input type="text" id="datepicker_field">
                        <div id="DatePicker"></div>
                        <div class="dropdown time">
                            <a href="#" data-toggle="dropdown">Hour <span id="selected_time"></span></a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-content">
                                    <h4>Lunch</h4>
                                    <div class="radio_select add_bottom_15">
                                        <ul>
                                            <li>
                                                <input type="radio" id="time_1" name="time" value="12.00am">
                                                <label for="time_1">12.00<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="time_2" name="time" value="08.30pm">
                                                <label for="time_2">12.30<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="time_3" name="time" value="09.00pm">
                                                <label for="time_3">1.00<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="time_4" name="time" value="09.30pm">
                                                <label for="time_4">1.30<em>-40%</em></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /time_select -->
                                    <h4>Dinner</h4>
                                    <div class="radio_select">
                                        <ul>
                                            <li>
                                                <input type="radio" id="time_5" name="time" value="08.00pm">
                                                <label for="time_1">20.00<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="time_6" name="time" value="08.30pm">
                                                <label for="time_2">20.30<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="time_7" name="time" value="09.00pm">
                                                <label for="time_3">21.00<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="time_8" name="time" value="09.30pm">
                                                <label for="time_4">21.30<em>-40%</em></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /time_select -->
                                </div>
                            </div>
                        </div>
                        <!-- /dropdown -->
                        <div class="dropdown people">
                            <a href="#" data-toggle="dropdown">People <span id="selected_people"></span></a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-content">
                                    <h4>How many people?</h4>
                                    <div class="radio_select">
                                        <ul>
                                            <li>
                                                <input type="radio" id="people_1" name="people" value="1">
                                                <label for="people_1">1<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="people_2" name="people" value="2">
                                                <label for="people_2">2<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="people_3" name="people" value="3">
                                                <label for="people_3">3<em>-40%</em></label>
                                            </li>
                                            <li>
                                                <input type="radio" id="people_4" name="people" value="4">
                                                <label for="people_4">4<em>-40%</em></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /people_select -->
                                </div>
                            </div>
                        </div>
                        <!-- /dropdown -->
                        <button type="submit"  class="btn_1 full-width mb_5">Reserve Now</button>
                        </form>
                    <div class="text-center"><small>No money charged on this steps</small></div>
                    </div>
                </div>
                <!-- /box_booking -->
                <ul class="share-buttons">
                    <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                    <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
                    <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                </ul>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection
@section('styles')
    <link href="{{ asset('frontend/css/detail-page.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('frontend/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/specific_detail.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker_func_1.js') }}"></script>
@endsection
