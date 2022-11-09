<div class="hero_area">
    <div class="bg-box">
      <img src="../images/hero-bg.jpg" alt="" class="hero-img">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container " 
        @if ( Config::get('app.locale') == 'ar') style="direction: rtl" @else style="direction: ltr;" @endif>
          <a class="navbar-brand" href="{{route('index')}}">
            <span style="
            font-family: 'Dancing Script', cursive !important;">
                Smart Restuarnt 
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li   @if($slag == 1) class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="{{route('index')}}">{{__('main.nav_home')}} </a>
              </li>
              <li @if($slag == 2) class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="{{route('about')}}">{{__('main.nav_about')}}</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                 data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                  aria-expanded="false">{{__('main.lang')}}</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">Arabic - العربيـة</a>
                  <a class="dropdown-item" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">English - الإنجليزية</a>
                </div>
              </li>
            </ul>
            <div class="user_option">
              @guest
              <a href="{{route('login')}}" class="order_online">
                {{__('main.login_btn')}}
              </a>
              @endguest

              @auth
              <a href="{{route('home')}}" class="order_online">
                {{__('main.dashboard_btn')}}
              </a>
              @endauth
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                       {{__('main.hero_title')}}
                    </h1>
                    <p>
                        {{__('main.hero_detail1')}}
                    </p>
                    <div class="btn-box" hidden>
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                        {{__('main.hero_title')}}
                    </h1>
                    <p>
                        {{__('main.hero_detail2')}}                  
                     </p>
                    <div class="btn-box" hidden>
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                        {{__('main.hero_title')}}                   
                    
                    </h1>
                    <p>
                        {{__('main.hero_detail3')}}                
                    
                    </p>
                    <div class="btn-box" hidden>
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>