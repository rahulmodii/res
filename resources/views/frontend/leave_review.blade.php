@extends('frontend.layouts.app')
@section('meta_title','')
@section('meta_description','')
@section('meanubar','header_in')
@section('content')
    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="box_general write_review">
                    <h1 class="add_bottom_15">Write a review for "{{ $restaurant->name }}"</h1>
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                            <label class="d-block add_bottom_15" style="color:#ff0000!important">{{ $error }}</label>
                            @endforeach
                        @elseif(Session::has('success'))
                        <label class="d-block add_bottom_15" style="color:#008000!important">{{ Session::get('success') }}</label>
                        @else
                            <label class="d-block add_bottom_15">Rating Now</label>
                        @endif
                        <form action="{{ route('review.submit',$restaurant->slug) }}" method="post">
                        @csrf
                        @if(Auth::check())
                        <div class="row">
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Food Quality <strong class="food_quality_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="@if($rating=App\Models\RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first()){{$rating->rating_food_quality}}@else{{5}}@endif" data-orientation="horizontal" id="food_quality" name="rating_food_quality">
                            </div>
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Service <strong class="service_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="@if($rating=App\Models\RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first()){{$rating->rating_service}}@else{{5}}@endif" data-orientation="horizontal" id="service" name="rating_service">
                            </div>
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Location <strong class="location_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="@if($rating=App\Models\RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first()){{$rating->rating_location}}@else{{5}}@endif" data-orientation="horizontal" id="location" name="rating_location">
                            </div>
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Price <strong class="price_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="@if($rating=App\Models\RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first()){{$rating->price_rating}}@else{{5}}@endif" data-orientation="horizontal" id="price" name="price_rating">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Title of your review</label>
                            <input class="form-control" type="text" name="title" value="@if($rating=App\Models\RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first()){{$rating->title}}@endif" placeholder="If you could say it in one sentence, what would you say?">
                        </div>
                        <div class="form-group">
                            <label>Your review</label>
                            <textarea class="form-control" style="height: 180px;" name="comment" placeholder="Write your review to help others learn about this online business">@if($rating=App\Models\RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first()){{$rating->comment}}@endif</textarea>
                        </div>
                        <button type="submit" class="btn_1">Submit Review</button>
                        @else
                        <div class="row">
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Food Quality <strong class="food_quality_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="5" data-orientation="horizontal" id="food_quality" name="rating_food_quality">
                            </div>
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Service <strong class="service_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="5" data-orientation="horizontal" id="service" name="rating_service">
                            </div>
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Location <strong class="location_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="5" data-orientation="horizontal" id="location" name="rating_location">
                            </div>
                            <div class="col-md-3 add_bottom_25">
                                <div class="add_bottom_15">Price <strong class="price_val"></strong></div>
                                <input type="range" min="1" max="5" step="0.5" value="5" data-orientation="horizontal" id="price" name="price_rating">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Title of your review</label>
                            <input class="form-control" type="text" name="title" placeholder="If you could say it in one sentence, what would you say?">
                        </div>
                        <div class="form-group">
                            <label>Your review</label>
                            <textarea class="form-control" style="height: 180px;" name="comment" placeholder="Write your review to help others learn about this online business"></textarea>
                        </div>
                        <button type="submit" class="btn_1">Submit Review</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    <!-- /row -->
    </div>
@endsection
@section('styles')
    <link href="{{ asset('frontend/css/review.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('frontend/js/specific_review.js') }}"></script>
@endsection
