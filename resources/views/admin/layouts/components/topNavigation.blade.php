<nav class="main-header navbar navbar-expand {{$class_hearder}}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="btn-group">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        {{$USER['name']}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a href="{{ url('admin/clear-cache') }}" class="dropdown-item">Clear Cache <i class="fas fa-redo"></i></a></li>
          <li><a href="{{ url('admin/logout') }}" class="dropdown-item">Logout <i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
      </div>
    </ul>
  </nav>