<header id="header"><!--header-->
    @if (!Auth::user())
    <div class="header_top" style="background-color: red"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="color: white; text-align: center;">Login To Get Full Featcher</h3>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    @endif
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +8801766221373</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> biprobhowmik5@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/biprojoy/"><i class="fa fa-facebook"></i></a></li>
                            {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ route('welcomeProduct') }}"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if (Auth::user())
                                <li><a href="{{ route('profile.show') }}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="{{ route('whitelist') }}"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="{{ route('cmprlist') }}"><i class="fa fa-star"></i> Comparelist</a></li>
                                <li><a href="{{ route('orderPage') }}"><i class="fa fa-crosshairs"></i> My Orderes</a></li>
                                <li><a href="{{ route('cartView') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @endif
                            @if (Auth::check())
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                  @csrf

                                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fa fa-lock"></i>Logout</a>
                              </form>
                          </li>
                          @else
                          <li><a href="{{ route('flogin') }}"><i class="fa fa-lock"></i> Login</a></li>
                          @endif
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div><!--/header-middle-->

  <div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{ route('welcomeProduct') }}" class="active">Home</a></li>
                        <li><a href="{{ route('frontProducts') }}">Products</a>
                        </li>
                        @if (Auth::user()) 
                        <li><a href="{{ route('reportPage') }}">Report</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
    </header><!--/header-->