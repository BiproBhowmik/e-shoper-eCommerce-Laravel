<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">E-Shoper</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <a href="{{ route('profile.show') }}">
        <img src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" class="img-circle elevation-2" alt="User Image">
      </a>
      </div>
      <div class="info">
        <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{ route('addProduct') }}" class="nav-link">
              <i class="nav-icon ion ion-calculator"></i>
              <p>
                Add Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('viewProduct') }}" class="nav-link">
              <i class="nav-icon ion ion-search"></i>
              <p>
                All Products
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-printer"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('addCatPage') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('viewCatPage') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Categories</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-nuclear"></i>
              <p>
                Brands
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('addBrPage') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('viewBrPage') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brands</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('viewOrderPage') }}" class="nav-link">
              <i class="nav-icon ion ion-flag"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          
          <li class="nav-header">EXTRAS</li>
          <li class="nav-item">
            <a href="{{ route('userlist') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Userlist
                <span class="badge badge-info right">{{ DB::table('users')->count() }}</span>
              </p>
            </a>
          </li>
          <!-- Authentication -->
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-jet-dropdown-link class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              <i class="nav-icon ion ion-close-circled"></i>
              {{ __('Logout') }}
            </x-jet-dropdown-link>
          </form>
        </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>