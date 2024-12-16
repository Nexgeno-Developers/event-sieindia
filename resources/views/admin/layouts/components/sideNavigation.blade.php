<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url(route('admin.dashboard')) }}" class="brand-link">
      <!--<img src="{{ url($SETTING->app_logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <span class="brand-text font-weight-dark">{{ $SETTING->app_name }}</span>
		
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
          <img src="{{ url($USER['avatar']) }}" class="img-circle elevation-2" alt="User Image">
        </div>-->
        <div class="info">
          <a href="{{ url(route('admin.dashboard')) }}" class="d-block">{{$USER['name']}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
		
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.customer_report')}}" class="nav-link @if(Request::segment(2) == 'customer_report') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>All Doctors</p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="{{route('admin.orders')}}" class="nav-link @if(Request::segment(2) == 'orders') active @endif">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>All Orders</p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="{{route('admin.seats')}}" class="nav-link @if(Request::segment(2) == 'seats') active @endif">
              <i class="nav-icon fas fa-chair"></i>
              <p>Manage Seats</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.coupon')}}" class="nav-link @if(Request::segment(2) == 'coupon') active @endif">
              <i class="nav-icon fas fa-gift"></i>
              <p>Manage Coupon</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.logs')}}" class="nav-link @if(Request::segment(2) == 'logs') active @endif">
              <i class="nav-icon fas fa-history"></i>
              <p>Logs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.business_settings')}}" class="nav-link @if(Request::segment(2) == 'business_settings') active @endif">
              <i class="nav-icon fas fa-cog"></i>
              <p>Business Settings</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>