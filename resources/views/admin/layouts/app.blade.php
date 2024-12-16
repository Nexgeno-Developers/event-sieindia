<!DOCTYPE html>
<html lang="en">
<head>
  <!--Meta Information-->
  @include('admin.layouts.components.meta')

  <!--Stylesheets-->
  @include('admin.layouts.components.stylesheets')
</head>

@php
if($SETTING->ui_mode == 'dark')
{
  $class_body = 'dark-mode';
  $class_hearder = 'navbar-dark';
}
else
{
  $class_body = null;
  $class_hearder = 'navbar-white navbar-light';  
}
@endphp

<!--hold-transition sidebar-mini layout-navbar-fixed-->
<body class="layout-fixed sidebar-mini layout-navbar-fixed {{$class_body}}">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.components.topNavigation')

  <!-- Main Sidebar Container -->
  @include('admin.layouts.components.sideNavigation')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.layouts.components.breadcrumb')
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">      
          @yield('main.content')
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('admin.layouts.components.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('admin.layouts.components.scripts')

@include('admin.layouts.components.scripts_c')

</body>
</html>
