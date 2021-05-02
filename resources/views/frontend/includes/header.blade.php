<header class="@yield('meanubar') clearfix">
    <div class="container">
    <div id="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('frontend/img/logo.svg') }}" width="140" height="35" alt="" class="logo_normal">
            <img src="{{ asset('frontend/img/logo_sticky.svg') }}" width="140" height="35" alt="" class="logo_sticky">
        </a>
    </div>
    <ul id="top_menu">
        <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
        <li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
    </ul>
    <!-- /top_menu -->
    <a href="#0" class="open_close">
        <i class="icon_menu"></i><span>Menu</span>
    </a>
    <nav class="main-menu">
        <div id="header_menu">
            <a href="#0" class="open_close">
                <i class="icon_close"></i><span>Menu</span>
            </a>
            <a href="{{ route('home') }}"><img src="img/logo.svg" width="140" height="35" alt=""></a>
        </div>
        <ul>
            <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
            <li><a href="{{ route('restaurant.list') }}">{{ __('Restaurants') }}</a></li>
            <li><a href="{{ route('restaurant.registeration') }}">Register Restaurant</a></li>
        </ul>
    </nav>
</div>
</header>
