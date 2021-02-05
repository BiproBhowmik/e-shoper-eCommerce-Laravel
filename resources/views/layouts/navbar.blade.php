<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
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
        
      
    </ul>
  </nav>
  <!-- /.navbar -->