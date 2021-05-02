@extends('frontend.layouts.app')
@section('meta_title','')
@section('meta_description','')
@section('meanubar','header_in')
@section('content')
    <div class="page_header element_to_stick">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Category</a></li>
                            <li>Page active</li>
                        </ul>
                        </div>
                    <h1>145 restaurants in Convent Street 2983</h1>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                        <input type="text" class="form-control" placeholder="Search again...">
                        <input type="submit" value="Search">
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->
    <div class="container margin_30_40">
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="clearfix">
                <div class="sort_select">
                        <select name="sort" id="sort">
                            <option value="popularity" selected="selected">Sort by Popularity</option>
                            <option value="rating">Sort by Average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by Price: low to high</option>
                            <option value="price-desc">Sort by Price: high to low</option>
                        </select>
                    </div>
                    <a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i><span>Filters</span></a>
                </div>
                <div class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
                    <div class="filter_type">
                        <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categories</a></h4>
                        <div class="collapse show" id="filter_1">
                            <ul>
                                <li>
                                    <label class="container_check">Pizza - Italian <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Japanese - Sushi <small>24</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Burghers <small>23</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Vegetarian <small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Bakery <small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Chinese <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Mexican <small>15</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <!-- /filter_type -->
                    </div>
                    <!-- /filter_type -->
                    <div class="filter_type">
                        <h4><a href="#filter_2" data-toggle="collapse" class="closed">Rating</a></h4>
                        <div class="collapse" id="filter_2">
                            <ul>
                                <li>
                                    <label class="container_check">Superb 9+ <small>06</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Very Good 8+ <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Good 7+ <small>17</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Pleasant 6+ <small>43</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="filter_type">
                        <h4><a href="#filter_3" data-toggle="collapse" class="closed">Distance</a></h4>
                        <div class="collapse" id="filter_3">
                            <div class="distance"> Radius around selected destination <span></span> km</div>
                            <div class="add_bottom_15"><input type="range" min="10" max="100" step="10" value="30" data-orientation="horizontal"></div>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="filter_type">
                        <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
                        <div class="collapse" id="filter_4">
                            <ul>
                                    <li>
                                        <label class="container_check">$0 — $50<small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$50 — $100<small>08</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$100 — $150<small>05</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$150 — $200<small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="buttons">
                        <a href="#0" class="btn_1 full-width">Filter</a>
                    </div>
                </div>
            </aside>

            <div class="col-lg-9">
                <div class="row">
                    @foreach ($restaurants as $restaurant)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                <figure>
                                    {{-- <span class="ribbon off">-30%</span> --}}
                                    <img src="{{ asset('frontendt/img/lazy-placeholder.png') }}" data-src="{{ asset('frontend/img/location_1.jpg') }}" class="img-fluid lazy" alt="">
                                    <a href="{{ route('restaurant.deatils',$restaurant->slug) }}" class="strip_info">
                                        {{-- <small>Pizza</small> --}}
                                        <div class="item_title">
                                            <h3>{{ $restaurant->name }}</h3>
                                            <small>{{ $restaurant->address.', '.$restaurant->city->name.', '.$restaurant->state->name.', '.$restaurant->country->name }}</small>
                                        </div>
                                    </a>
                                </figure>
                                <ul>
                                    <li><span>Avg. Price 24$</span></li>
                                    <li>
                                        <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /row -->
                <div class="pagination_fg">
                    {{ $restaurants->links() }}
                {{-- <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">&raquo;</a> --}}
                </div>
            </div>
            <!-- /col -->
        </div>
    </div>
    <!-- /container -->
@endsection
@section('styles')
    <link href="{{ asset('frontend/css/listing.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('frontend/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/specific_listing.js') }}"></script>
@endsection
