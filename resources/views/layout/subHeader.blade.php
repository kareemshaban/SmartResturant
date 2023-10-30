
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark"  @if(Config::get('app.locale') == 'ar') style="direction: rtl" @endif >
        <div class="navbar-header" data-logobg="skin5" style="justify-content: center ; align-items:center">
            <a class="navbar-brand" href="{{route('home')}}">
                <b class="logo-icon ps-2">
                    <img
                        src="{{asset('assets/images/logo-icon.png')}}"
                        alt="homepage"
                        class="light-logo"
                        width="35"
                    />
                </b>
                <span class="logo-text ms-2" style="    font-size: 30px;
                color: orange; font-weight:bold;">
                <!-- dark Logo text -->
                 SMART POS
              </span>
            </a>

            <a
                class="nav-toggler waves-effect waves-light d-block d-md-none"
                href="javascript:void(0)"
            ><i class="ti-menu ti-close"></i
                ></a>
        </div>
        <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
        >

            <ul class="navbar-nav @if(Config::get('app.locale') == 'ar')  float-end ml-auto @else float-start me-auto @endif ">
                <li class="nav-item d-none d-lg-block" id="sidebartogglerLi" style="margin-left: 30px;  margin-right:30px;">
                    <a
                        class="nav-link sidebartoggler waves-effect waves-light"
                        href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"
                    ><i class="mdi mdi-menu font-24"></i
                        ></a>
                </li>





            </ul>


            <div class="btn-group   @if(Config::get('app.locale') == 'en')
            dropleft float-end ml-auto @else dropright float-start me-auto @endif" style="margin-left: 20px ; margin-right: 20px  ;">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __('main.lang') }}
                </button>
                <div class="dropdown-menu ">
                    <a class="dropdown-item border-radius-md" el="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src= "{{asset('assets/img/arabic.png')}}"  class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold" style="margin: 5px">Arabic | اللغة العربية</span>
                                </h6>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item border-radius-md" el="alternate" hreflang="ثلا" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="{{asset('assets/img/english.png')}}"  class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold" style="margin: 5px">English | اللغة الإنجليزية</span>
                                </h6>
                            </div>
                        </div>
                    </a>

                </div>
              </div>

            {{-- <ul class="navbar-nav  @if(Config::get('app.locale') == 'en')
             float-end ml-auto @else float-start me-auto @endif" style="margin-left: 100px ; margin-right: 100px  ;"
            >

                <li class="nav-item dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                  <span class="d-none d-md-block"
                  >{{__('main.lang')}} <i class="fa fa-angle-down"></i
                      ></span>
                        <span class="d-block d-md-none"
                        ><i class="fa fa-plus"></i
                            ></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" el="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src= "{{asset('assets/img/arabic.png')}}"  class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold" style="margin: 5px">Arabic | اللغة العربية</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" el="alternate" hreflang="ثلا" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{asset('assets/img/english.png')}}"  class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold" style="margin: 5px">English | اللغة الإنجليزية</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>









            </ul> --}}
        </div>
    </nav>
</header>


