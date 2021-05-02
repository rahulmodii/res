<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{URL::asset('admin/dist/img/admin_logo.png')}}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{Auth::user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

     <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('public/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{__('User Name')}}</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('restaurant.banners') }}" class="nav-link {{areActiveNav(['banners','banner.create','banner.edit'])}}">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                  <p>{{__('Banners')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('restaurant.galleries') }}" class="nav-link {{areActiveNav(['banners','banner.create','banner.edit'])}}">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                  <p>{{__('Galleries')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('vendor.restaurant.edit',Auth::user()->restaurant->slug) }}" class="nav-link">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                  <p>{{__('Restaurant Info')}}</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-graduation-cap nav-ico"></i>
                  <p>
                    {{__('Menus')}}
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('restaurant.categories') }}" class="nav-link">
                      <i class="fa fa-bars" aria-hidden="true"></i>
                      <p>{{__('Categories')}}</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('restaurant.menus') }}" class="nav-link">
                      <i class="fa fa-bars" aria-hidden="true"></i>
                      <p>{{__('Menu Items')}}</p>
                    </a>
                  </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
