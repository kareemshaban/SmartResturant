<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" 
    @if ( Config::get('app.locale') == 'ar') style="direction: rtl" @else style="direction: ltr;" @endif>
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="dashboard.html">
                <a class="navbar-brand" href="{{route('index')}}" style="font-weight: 900 ; font-size: 25px; padding-left: 30px; padding-right:30px;">
                    <span style="
                    font-family: 'Dancing Script', cursive !important;">
                        Smart Restuarnt 
                    </span>
                </a>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
           
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
  
            					@if ( Config::get('app.locale') == 'ar') 
						<a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"  ><img src="../../images/english.png" style="    width: 50px;
                            margin-left: 30px; margin-right:30px;"></a>
						@endif 
						@if ( Config::get('app.locale') == 'en') 
							<a rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" ><img src="../../images/arabic.png" style="    width: 50px;
                                margin-left: 30px; margin-right:30px;"></a>
							@endif 

                            
        </div>
    </nav>
</header>