
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark"  @if(Config::get('app.locale') == 'ar') style="direction: rtl" @endif >
        <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="{{route('home')}}">
                <b class="logo-icon ps-2">
                    <img
                        src="{{asset('assets/images/logo-icon.png')}}"
                        alt="homepage"
                        class="light-logo"
                        width="25"
                    />
                </b>
                <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <img
                    src="{{asset('assets/images/logo-text.png')}}"
                    alt="homepage"
                    class="light-logo"
                />
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


                <li class="nav-item dropdown" style="margin-left: 50px;  margin-right:50px;">
                    <a
                        class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="{{asset('assets/images/users/1.jpg')}}"
                            alt="user"
                            class="rounded-circle"
                            width="31"
                        />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end user-dd animated"
                        aria-labelledby="navbarDropdown"
                    >
                        <a class="dropdown-item" href="javascript:void(0)"
                        ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
                        >
                        <a class="dropdown-item" href="javascript:void(0)"
                        ><i class="mdi mdi-wallet me-1 ms-1"></i> My Balance</a
                        >
                        <a class="dropdown-item" href="javascript:void(0)"
                        ><i class="mdi mdi-email me-1 ms-1"></i> Inbox</a
                        >
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)"
                        ><i class="mdi mdi-settings me-1 ms-1"></i> Account
                            Setting</a
                        >
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)"
                        ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                        >
                        <div class="dropdown-divider"></div>
                        <div class="ps-4 p-10">
                            <a
                                href="javascript:void(0)"
                                class="btn btn-sm btn-success btn-rounded text-white"
                            >View Profile</a
                            >
                        </div>
                    </ul>
                </li>


            </ul>

            <ul class="navbar-nav @if(Config::get('app.locale') == 'en')  float-end ml-auto @else float-start me-auto @endif" style="margin-left: 100px ; margin-right: 100px  ;">

                <li class="nav-item dropdown">
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
                                            <span class="font-weight-bold">Arabic | اللغة العربية</span>
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
                                            <span class="font-weight-bold">English | اللغة الإنجليزية</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="mdi mdi-bell font-24"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>







            </ul>
        </div>
    </nav>
</header>


