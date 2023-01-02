<nav class="navbar navbar-light bg-light sticky">
    <div class="container-fluid" @if ( Config::get('app.locale') == 'ar') style="direction: rtl"
         @else style="direction: ltr;" @endif>
        <a class="navbar-brand" href="{{route('home')}}">
                <span style="
                font-family: 'Dancing Script', cursive !important; font-weight: bold; color: red">
                     <span class="btn-label" style="    display: flex;
    align-items: center;"> HOME <i class="fa fa-home" style="font-size: 40px; margin-left: 10px; margin-right: 10px;"></i></span>
                </span>
        </a>

        <a class="navbar-brand" href="{{route('pos')}}">
                <span style="
                font-family: 'Dancing Script', cursive !important; font-weight: bold;">
                    Smart Restuarnt POS
                </span>
        </a>

        @if ( Config::get('app.locale') == 'ar')
            <a rel="alternate" hreflang="en"
               href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img
                    src="../images/english.png" style="    width: 50px;
                            margin-left: 30px; margin-right:30px;"></a>
        @endif
        @if ( Config::get('app.locale') == 'en')
            <a rel="alternate" hreflang="ar"
               href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img
                    src="../images/arabic.png" style="    width: 50px;
                                margin-left: 30px; margin-right:30px;"></a>
        @endif
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="{{__('main.search_by_bill_number')}}"
                   aria-label="Search" name="val" id="val">
            <button type="button" class="btn btn-labeled btn-primary "  id="searchBill" style="margin-right: 10px ; margin-left: 10px">
                <span class="btn-label" style="margin-right: 10px ; margin-left: 10px"><i class="fa fa-search" ></i></span>{{__('main.search')}}
            </button>

        </form>
    </div>
</nav>
