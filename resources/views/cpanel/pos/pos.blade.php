<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Smart Resturant</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../cpanel/plugins/images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">



    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <link rel="stylesheet" href="../../css/pos.css">

    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'icomoon';
        }
        .menue {
            background: #E8E8F2;
    padding: 20px;
    border-radius: 30px;
        }
        .page{
            margin-left: 20px;/
    margin-right: 20px;
    width:  calc( 100% - 40px);
    min-width: calc( 100% - 40px);
}
        }
        .cloned {
            display: none !important;
        }
        .item-div{
            display: none;
        }
        .show {
            display: block;
        }
        .item-parent{
            background: white;
            height: 150px;
            border-radius: 15px;
        }
        .item-img{
            width:70px;
            height: 70px;
            border-radius: 50%;
            margin: 10px auto;
            display: block;
        }
        .item-name{
            display: block;
            margin: auto;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
        }
        }
    </style>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <nav class="navbar navbar-light bg-light sticky">
        <div class="container-fluid"   @if ( Config::get('app.locale') == 'ar') style="direction: rtl" @else style="direction: ltr;" @endif>
            <a class="navbar-brand" href="{{route('index')}}">
                <span style="
                font-family: 'Dancing Script', cursive !important; font-weight: bold;">
                    Smart Restuarnt POS
                </span>
              </a>
                            					@if ( Config::get('app.locale') == 'ar')
						<a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"  ><img src="../../images/english.png" style="    width: 50px;
                            margin-left: 30px; margin-right:30px;"></a>
						@endif
						@if ( Config::get('app.locale') == 'en')
							<a rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" ><img src="../../images/arabic.png" style="    width: 50px;
                                margin-left: 30px; margin-right:30px;"></a>
							@endif
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
      </nav>

      <div class="viewed">
        <div class="container page ">
            <div class="row"  >
                <div class="col-8 menue">
                    <div class="bbb_viewed_title_container">
                        <h3 class="bbb_viewed_title">{{ __('main.item_category') }}</h3>
                        <div class="bbb_viewed_nav_container">
                            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="bbb_viewed_slider_container" style="margin-bottom:20px;">



                        <div class="owl-carousel owl-theme bbb_viewed_slider">
                         @foreach ($categories as $category)
                            <div class="owl-item item" >
                                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center"
                                onclick="selecCategory(this , {{$category -> id}} )" >
                                    <div class="bbb_viewed_image"><img src="{{ asset('images/Category/' . $category->img) }}" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        {{-- <div class="bbb_viewed_price">₹12225<span>₹13300</span></div> --}}
                                        <div class="bbb_viewed_name"><a href="#">{{ Config::get('app.locale') == 'ar' ? $category -> name_ar : $category -> name_en }}</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>


                        <div class="bbb_viewed_title_container">
                            <h3 class="bbb_viewed_title">{{__('main.menue_items')}}</h3>

                        </div>
                    <div class="row portfolio-container" style="margin: 10px;" data-aos="fade-up" data-aos-delay="100">
                     @foreach($items as $item)
                        <div class="col-lg-3 col-md-6 portfolio-item  item-div .{{$item -> category_id}}">
                            <div class="portfolio-wrap item-parent">
                                <img src="{{ asset('images/Item/' . $item->img) }}" class="img-fluid item-img" alt="">
                                <label class="item-name">{{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>
                                <div class="portfolio-links">

                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>




                </div>


            </div>


        </div>


    </div>

    </div>





    <script src="../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../cpanel/js/app-style-switcher.js"></script>
    <script src="../cpanel/js/waves.js"></script>
    <script src="../cpanel/js/sidebarmenu.js"></script>
    <script src="../cpanel/js/custom.js"></script>
    <script type="text/javascript">
 $(document).ready(function()
{


        if($('.bbb_viewed_slider').length)
        {
            var viewedSlider = $('.bbb_viewed_slider');

            viewedSlider.owlCarousel(
            {
                loop:true,
                margin:30,
                autoplay:false,
                autoplayTimeout:6000,
                nav:false,
                dots:true,
                responsive:
                {
                    0:{items:1},
                    575:{items:2},
                    768:{items:3},
                    991:{items:4},
                    1199:{items:5}
                }
            });

            if($('.bbb_viewed_prev').length)
            {
                var prev = $('.bbb_viewed_prev');
                prev.on('click', function()
                {
                    viewedSlider.trigger('prev.owl.carousel');
                });
            }

            if($('.bbb_viewed_next').length)
            {
                var next = $('.bbb_viewed_next');
                next.on('click', function()
                {
                    viewedSlider.trigger('next.owl.carousel');
                });
            }
        }



    });

    function selecCategory(element , id){

       console.log(id);
        const collection = document.getElementsByClassName("selected-cat");
        let add = 0 ;
        if(element.classList.contains("selected-cat")){
             add = 0 ;
        } else {
            add = 1 ;
        }
        if(collection){
        for (let item of collection) {
            item.classList.remove("selected-cat");
        }

        }
        if(add == 1)
        element.classList.add("selected-cat");


        var x, i;
        id = '.' + id ;
        x = document.getElementsByClassName("item-div");
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(id) > -1) w3AddClass(x[i], "show");
        }
        }


 function w3AddClass(element, name) {
     var i, arr1, arr2;
     arr1 = element.className.split(" ");
     arr2 = name.split(" ");
     for (i = 0; i < arr2.length; i++) {
         if (arr1.indexOf(arr2[i]) == -1) {
             element.className += " " + arr2[i];
         }
     }
 }

 // Hide elements that are not selected
 function w3RemoveClass(element, name) {
     var i, arr1, arr2;
     arr1 = element.className.split(" ");
     arr2 = name.split(" ");
     for (i = 0; i < arr2.length; i++) {
         while (arr1.indexOf(arr2[i]) > -1) {
             arr1.splice(arr1.indexOf(arr2[i]), 1);
         }
     }
     element.className = arr1.join(" ");
 }

    </script>

</body>
