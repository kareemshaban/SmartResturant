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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="../../vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


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
            padding-right: 20px;
            padding-left: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 30px;
            height: 100ch;
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
        .table-div{
            display: none;
        }
        .show {
            display: block;
        }
        .item-parent{
            background: white;
            min-height: 150px;
            padding-bottom: 5px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            box-shadow: 0 27px 25px 0px darkgrey;
            border: outset 1px brown;
        }
        .item-img{
            width:70px;
            height: 70px;
            border-radius: 50%;
            margin: 10px auto;
            display: block;
            box-shadow: 0 27px 25px 0px darkgrey;
        }
        .extra{
            height: 70px;
            min-height: 70px;
        }
        .extra-img{
            width:30px;
            height: 30px;
            border-radius: 50%;
            margin: 10px auto;
            display: block;
            box-shadow: 0 27px 25px 0px darkgrey;
        }
        .extra-name{
            display: block;
            margin: auto;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            width: 95%;
        }
        .item-name{
            display: block;
            margin: auto;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            width: 95%;
        }
        .sizes{
            width: 100%;
            margin: auto;
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
            box-shadow: 0 27px 25px 0px darkgrey;
        }
        .sizes div {
            border: solid 1px brown ;
            padding: 5px;
            background: antiquewhite;
        }
        .form-group {
            margin: 0;
        }
        .last-form{
            border-bottom: solid 1px #dadada;
            padding-bottom: 5px;
        }
        .table-wrap-height {
            max-height:300px;
            height: 300px;
            border-bottom: solid 1px #dadada;
            overflow-y: auto;
        }

        .row_border{
            border-bottom: solid 2px #dadada;
        }
        .row-center{
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .margin-content{
            margin: 10px auto;
        }
        .margin-content button {
            width: 100%;
            white-space: normal;
        }
        .margin-content button i , span{
            font-size: 20px;
            font-weight: bold;
        }
        .margin-content button .tools{
            font-size: 40px;
        }
        .margin-content button span {
            margin-right: 10px;
        }
        .name_en {
            direction: ltr;
        }
        .name_ar{
            direction: rtl;
        }
      .available{
          background: green;

         }
       .notAvailable{
           background: red;
       }
       .selected_table{
           background: #149ddd !important;
       }
      .tables{
          width: 80px;
          height: 80px;
          text-align: center;
          justify-content: center;
          display: flex;
          flex-direction: column;
          border-radius: 15px;
          color: white;
          box-shadow: 0 27px 25px 0px darkgrey;
          margin-bottom: 5px;
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
                <div class="col-6 menue">
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
                    <div class="row" style="min-height: 300px;">
                    <div  class="col-8" style="padding: 0;">
                    <div class="row portfolio-container" style="margin: 10px; display: flex;align-items: center;" data-aos="fade-up" data-aos-delay="100">
                     @foreach($items as $item)
                         @if($item -> type == 0 && count($item -> sizes) > 0)
                        <div class="col-lg-4 col-md-6 portfolio-item  item-div .{{$item -> category_id}}">
                            <div class="portfolio-wrap item-parent">
                                <img src="{{ asset('images/Item/' . $item->img) }}" class="img-fluid item-img" alt="">
                                <label class="item-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>
                                <div class="row sizes">
                                    @foreach($item -> sizes as $size)
                                        <div class="col-{{12 / count($item -> sizes)}} text-center"
                                             onclick="selecItemSize( {{$size}} , {{ $item}})" >
                                            {{$size -> size -> label}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                            @endif
                    @endforeach
                     </div>
                    </div>
                    <div  class="col-4" style="padding: 0;     border-left: solid 2px gray;">
                        <div class="row portfolio-container" style="margin: 10px; display: flex;align-items: center;" data-aos="fade-up" data-aos-delay="100">

                        @foreach($items as $item)
                            @if($item -> type == 1 )
                                <div class="col-lg-6 col-md-6 portfolio-item  item-div .{{$item -> category_id}} ">
                                    <div class="portfolio-wrap item-parent extra">
                                        <img src="{{ asset('images/Item/' . $item->img) }}" class="img-fluid extra-img" alt="">
                                        <label class="extra-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>

                                    </div>
                                </div>
                            @endif
                        @endforeach

                        </div>
                    </div>

                    </div>




                </div>
                 <div class="col-2">
                     <div class="row " data-aos="fade-up">
                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="button" class="btn btn-labeled btn-success ">
                                 <span class="btn-label"><i class="fa fa-check"></i></span>{{__('main.pay_prep')}}</button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="button" class="btn btn-labeled btn-warning ">
                             <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.pay')}}</button>
                         </div>



                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="button" class="btn btn-labeled btn-info ">
                             <span class="btn-label"><i class="fa fa-shopping-bag"></i></span> {{__('main.prepare')}} </button>
                         </div>
                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="button" class="btn btn-labeled btn-primary " onclick="increaseQnt()">
                             <span class="btn-label"><i class="fa fa-plus-circle tools"></i> </span></button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="button" class="btn btn-labeled btn-dark " onclick="decreaseQnt()">
                                 <span class="btn-label"><i class="fa fa-minus-circle tools"></i></span></button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="button" class="btn btn-labeled btn-danger " onclick="removeItem()">
                                 <span class="btn-label"><i class="fa fa-trash tools" ></i></span></button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="button" class="btn btn-labeled btn-info ">
                                 <span class="btn-label"><i class="fa fa-search"></i></span> {{__('main.search')}} </button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="button" class="btn btn-labeled btn-warning ">
                                 <span class="btn-label"><i class="fa fa-print"></i></span> {{__('main.print')}} </button>
                         </div>
                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="button" class="btn btn-labeled btn-danger ">
                                 <span class="btn-label"><i class="fa fa-remove"></i></span>{{__('main.cancel_order')}}</button>
                         </div>
                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="button" class="btn btn-labeled btn-info" onclick="refresh()">
                             <span class="btn-label"><i class="fa fa-refresh"></i></span>{{__('main.refresh')}}</button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content" >
                             <button  type="button" class="btn btn-labeled btn-dark"  id="mediumButton">
                                 <span class="btn-label"><i class="fa fa-cutlery"></i></span>    {{   __('main.tables')}}</button>
                         </div>


                     </div>

                 </div>
                <div class="col-4 menue">
                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                <li  class="filter-active" onclick="selectBillType(this , 1)" id="default_type">{{__('main.bill_type1')}}</li>
                                <li onclick="selectBillType(this , 2)">{{__('main.bill_type2')}}</li>
                                <li onclick="selectBillType(this , 3)">{{__('main.bill_type3')}}</li>
                                <li onclick="selectBillType(this , 4)">{{__('main.bill_type4')}}</li>
                            </ul>
                        </div>
                    </div>
                    <form class="center" method="POST" action="{{ route('storeBill') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- {{ csrf_field() }} -->
                        <div class="row justify-content-center">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="card-body px-0" style="margin: 0 ; padding: 0;">
                                   <div class="form-group">
                                     <div class="row">
                                        <div class="col-6">
                                            <label>{{ __('main.client') }}</label>
                                            <select class="custom-select mr-sm-2 @error('client_id') is-invalid @enderror"
                                            name="client_id" id="client_id">
                                            <option selected value="">Choose...</option>
                                             @foreach($clients as $item)
                                                <option value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>
                                             @endforeach
                                            </select>

                                            @error('client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                        <div class="col-6">
                                            <label>{{ __('main.phone') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="phone" name="phone"
                                                   placeholder="{{ __('main.phone') }}" autofocus />
                                        </div>
                                    </div>
                                  </div>
                                    <div class="form-group">
                                        <label>{{ __('main.address') }}</label>
                                        <input type="text" name="address" id="address"
                                               class="form-control"
                                               placeholder="{{ __('main.address') }}" autofocus />
                                    </div>
                                    <div class="form-group" id="driver_data">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>{{ __('main.driver') }}</label>
                                                <select class="custom-select mr-sm-2 @error('driver_id') is-invalid @enderror"
                                                        name="driver_id" id="driver_id">
                                                    <option selected value="">Choose...</option>
                                                    @foreach($employees as $item)
                                                        <option value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>
                                                    @endforeach
                                                </select>

                                                @error('driver_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>{{ __('main.delivery_service') }}</label>
                                                <input type="number" name="delivery_service" id="delivery_service"
                                                       class="form-control"
                                                       placeholder="{{ __('main.delivery_service') }}" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group last-form">
                                        <input id="bill_type" name="bill_type" hidden type="text">
                                    </div>


                            </div>

                            </div>

                        </div>



                    <div class="row justify-content-center">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="card-body px-0" style="margin: 0 ; padding: 0;" >
                                <div class="table-wrap-height">
                                    <table id="details" class="table table-bordered  table-striped"  style="width:100%">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center" hidden>item_id</th>
                                            <th class="text-center" hidden>size_id</th>
                                            <th class="text-center" hidden>item_size_id</th>
                                            <th class="text-center" hidden>details_id</th>
                                            <th class="text-center">{{ __('main.item') }}</th>
                                            <th class="text-center">{{ __('main.size') }}</th>
                                            <th class="text-center">{{ __('main.quantity') }}</th>
                                            <th class="text-center">{{ __('main.price') }}</th>
                                            <th class="text-center">{{ __('main.total') }}</th>
                                            <th class="text-center" hidden>price without vat</th>
                                            <th class="text-center" hidden>total without vat</th>
                                            <th class="text-center">{{ __('main.select') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="details-body">


                                        </tbody>


                                    </table>
                                </div>
                                <div class="form-group row_border">
                                  <div class="row justify-content-center">
                                      <div class="col-4">
                                          <label>{{ __('main.date') }}</label>
                                          <input type="text"
                                                 id="date" name="date"
                                                 class="form-control text-center"
                                                 placeholder="{{ __('main.date') }}" autofocus value="{{\Carbon\Carbon::now()}}" readonly/>
                                      </div>
                                      <div class="col-4">
                                          <label>{{ __('main.bill_no') }}</label>
                                          <input type="text"
                                                 class="form-control text-center"
                                                 placeholder="{{ __('main.bill_no') }}" autofocus value="000001" readonly/>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group row_border">
                                    <div class="row justify-content-center" >
                                        <div class="col-4">
                                            <label>{{ __('main.total') }}</label>
                                            <input type="text"
                                                   class="form-control text-center"
                                                   id="total" name="total"
                                                   placeholder="{{ __('main.date') }}" autofocus  readonly value="0"/>
                                        </div>
                                        <div class="col-4">
                                            <label>{{ __('main.Vat') }}</label>
                                            <input type="text"
                                                   class="form-control text-center"  id="vat" name="vat"
                                                   placeholder="{{ __('main.Vat') }}" autofocus  readonly value="0"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row_border">
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                            <label>{{ __('main.discount') }}</label>
                                            <input type="text"
                                                   class="form-control text-center"
                                                   id="discount" name="discount"
                                                   placeholder="{{ __('main.discount') }}" autofocus  readonly value="0"/>
                                        </div>
                                        <div class="col-4">
                                            <label>{{ __('main.net') }}</label>
                                            <input type="text"
                                                   class="form-control text-center"  id="net" name="net"
                                                   placeholder="{{ __('main.net') }}" autofocus  readonly value="0"/>

                                            <input type="text"
                                                   class="form-control text-center"  id="table_id" name="table_id"  hidden />

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    </form>
                </div>

            </div>


        </div>


    </div>

    </div>


    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close"  style="color: red; font-size: 20px; font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div class="container">
                        <div class="row" data-aos="fade-up">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <ul id="modal-flters">
                                    @foreach($halls as $hall)
                                        <li
                                        onclick="selectHall(this , {{$hall -> id}})">
                                            {{ ( Config::get('app.locale') == 'ar') ?
                                             $hall -> name_ar : $hall -> name_en}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>


                        <div class="row portfolio-container" style="margin: 10px; display: flex;align-items: center;" data-aos="fade-up" data-aos-delay="100">
                            @foreach($tables as $table)

                                    <div class="col-lg-3 col-md-6 portfolio-item  table-div .{{$table -> hall_id}}">
                                        <div class="portfolio-wrap tables {{$table -> available == 1 ? 'available' : 'notAvailable'}}" #
                                        onclick="selectTable(this , {{$table}})">

                                            <label class="table-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $table -> name_ar : $table -> name_en}}</label>

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

    <script src="../../vendor/purecounter/purecounter.js"></script>
    <script src="../../vendor/aos/aos.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../../vendor/php-email-form/validate.js"></script>


    <script type="text/javascript">
 $(document).ready(function()
{
    const mediumButton = document.getElementById("mediumButton");
    mediumButton.style.display = "none";

    refresh();

        if($('.bbb_viewed_slider').length)
        {
            var viewedSlider = $('.bbb_viewed_slider');

            viewedSlider.owlCarousel(
            {
                loop:false,
                autoplay:false,
                autoplayTimeout:6000,
                nav:false,
                dots:true,
                responsive:
                {
                    0:{items:1},
                    575:{items:2},
                    768:{items:3},
                    991:{items:4}
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

    $(document).on('click', '#mediumButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#mediumModal').modal("show");
              //  $('#mediumBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    });

    function selecCategory(element , id){
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

    function  selecItemSize(size , item ){
        var table = document.getElementById("details-body");
        var repeate = document.getElementById( 'details-body-tr' + size.id);
        console.log(repeate);
        if(!repeate) {
            var row = table.insertRow(-1);
            row.id = 'details-body-tr' + size.id;
            row.className = "text-center";
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);
            var cell10 = row.insertCell(9);
            var cell11 = row.insertCell(10);
            var cell12 = row.insertCell(11);
            var cell13 = row.insertCell(12);
            cell2.hidden = true;
            cell3.hidden = true;
            cell4.hidden = true;
            cell5.hidden = true;
            cell11.hidden = true;
            cell12.hidden = true;

            cell1.innerHTML = Number(row.rowIndex);
            cell2.innerHTML = item.id;
            cell3.innerHTML = size.size.id;
            cell4.innerHTML = size.id;
            cell5.innerHTML = "0";

            cell6.innerHTML = item.name_en
            cell7.innerHTML = size.size.label;
            cell8.innerHTML = "1";
            cell9.innerHTML = size.priceWithAddValue;
            cell10.innerHTML = size.priceWithAddValue;
            cell11.innerHTML = size.price;
            cell12.innerHTML = size.price;

            cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;

            calculateTotal();
        } else {
            var tds = repeate.getElementsByTagName('td');
            var check = tds[12];

            var checkBox = check.getElementsByTagName("input")[0];
            checkBox.checked = true ;
            increaseQnt();
            checkBox.checked = false ;
        }
    }

    function  rowCheckChange(ele){
        console.log(ele.checked);
        const table =  document.getElementById("details");
        var checkBoxes = table.getElementsByTagName("INPUT");
        for (let item of checkBoxes) {
            if(item != ele)
            item.checked = false;
        }

         //   ele.checked = true ;


    }
    function selectBillType(element , i){
        const collection = document.getElementsByClassName("filter-active");
        let add = 0 ;
        if(element.classList.contains("filter-active")){
            add = 0 ;
        } else {
            add = 1 ;
        }
        if(collection){
            for (let item of collection) {
                item.classList.remove("filter-active");
            }

        }
        if(add == 1)
            element.classList.add("filter-active");

        let driver_data = document.getElementById("driver_data");
        let bill_type = document.getElementById("bill_type");
        let mediumButton = document.getElementById("mediumButton");
        bill_type.value = i ;
         if(i == 1){
             driver_data.style.display = "block";
         } else {
             driver_data.style.display = "none";
         }
         if(i == 3 || i == 4){
             mediumButton.style.display = "block";
         } else {
             mediumButton.style.display = "none";
         }

    }

    function calculateTotal(){

        const table =  document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var total = 0 ;
        var totalWithoutVat = 0 ;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[9];
            var td2 = item.getElementsByTagName("td")[11];
            total += Number(td.innerHTML);
            totalWithoutVat += Number(td2.innerHTML);
        }
        const totalEl = document.getElementById("total");
        const discountEl = document.getElementById("discount");
        const vatEl = document.getElementById("vat");
        const netEl = document.getElementById("net");
        if(totalEl && discountEl && vatEl && netEl){
            let discount = discountEl.value ;
            let vat = Number(total) - Number(totalWithoutVat) ;
            let net = Number(total)- Number(discount) ;
            totalEl.value = total ;
            netEl.value = net ;
            vatEl.value = vat ;
        }
    }
    function increaseQnt(){
        const table =  document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var target ;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[12];
            var checkBox = td.getElementsByTagName("input")[0];
            if(checkBox.checked){
                target = item ;
                break;
            }
        }
        var qntTd = target.getElementsByTagName("td")[7];
        var oldQnt = qntTd.innerHTML ;
        var qnt = Number(oldQnt) + 1 ;
        qntTd.innerHTML = qnt ;

        var priceTd = target.getElementsByTagName("td")[8];
        var price2Td = target.getElementsByTagName("td")[10];

        var price = priceTd.innerHTML ;
        var price2 = price2Td.innerHTML ;

        var totalTd = target.getElementsByTagName("td")[9];
        var total2Td = target.getElementsByTagName("td")[11];

        var total = Number(price) * Number(qnt);
        var total2 = Number(price2) * Number(qnt);
        totalTd.innerHTML = total ;
        total2Td.innerHTML = total2 ;

        calculateTotal();

    }

     function decreaseQnt(){
         const table =  document.getElementById("details");
         var tbodys = table.getElementsByTagName("tbody");
         var tbody = tbodys[0];
         var target ;
         var trs = tbody.getElementsByTagName("tr");
         for (let item of trs) {
             var td = item.getElementsByTagName("td")[12];
             var checkBox = td.getElementsByTagName("input")[0];
             if(checkBox.checked){
                 target = item ;
                 break;
             }
         }
         var qntTd = target.getElementsByTagName("td")[7];
         var oldQnt = qntTd.innerHTML ;
         if(oldQnt > 1) {
             var qnt = Number(oldQnt) - 1;
             qntTd.innerHTML = qnt;


             var priceTd = target.getElementsByTagName("td")[8];
             var price = priceTd.innerHTML;

             var price2Td = target.getElementsByTagName("td")[10];
             var price2 = price2Td.innerHTML;

             var totalTd = target.getElementsByTagName("td")[9];
             var total = Number(price) * Number(qnt);

             var total2Td = target.getElementsByTagName("td")[11];
             var total2 = Number(price) * Number(qnt);

             totalTd.innerHTML = total;
             total2Td.innerHTML = total2 ;

             calculateTotal();
         }
     }
 function  removeItem(){
     const table =  document.getElementById("details");
     var tbodys = table.getElementsByTagName("tbody");
     var tbody = tbodys[0];
     var target ;
     var trs = tbody.getElementsByTagName("tr");
     for (let item of trs) {
         var td = item.getElementsByTagName("td")[12];
         var checkBox = td.getElementsByTagName("input")[0];
         if(checkBox.checked){
             target = item ;
             break;
         }
     }
     console.log(target.rowIndex);
     table.deleteRow(target.rowIndex);
     calculateTotal();
 }
     function  selectHall(element , id){

         console.log(id);
         const collection = document.getElementsByClassName("model-filter-active");
         let add = 0 ;
         if(element.classList.contains("model-filter-active")){
             add = 0 ;
         } else {
             add = 1 ;
         }
         if(collection){
             for (let item of collection) {
                 item.classList.remove("model-filter-active");
             }

         }
         if(add == 1)
             element.classList.add("model-filter-active");


         var x, i;
         id = '.' + id ;
         x = document.getElementsByClassName("table-div");
         for (i = 0; i < x.length; i++) {
             w3RemoveClass(x[i], "show");
             if (x[i].className.indexOf(id) > -1) w3AddClass(x[i], "show");
         }
     }
     function selectTable(element , table){
        if(table.available == 1){
            // select table
            const collection = document.getElementsByClassName("selected_table");
            let add = 0 ;
            if(element.classList.contains("selected_table")){
                add = 0 ;
            } else {
                add = 1 ;
            }
            if(collection){
                for (let item of collection) {
                    item.classList.remove("selected_table");
                }

            }
            const table_id = document.getElementById('table_id');
            if(add == 1){
                element.classList.add('selected_table');
                table_id.value = table.id ;
            } else {
                table_id.value = 0 ;
            }

        } else {
            // table is not available
            alert($('<div>{{trans('main.table_not_available')}}</div>').text());
        }
     }
     function refresh(){
        const client_id = document.getElementById("client_id");
        const phone = document.getElementById("phone");
        const  address = document.getElementById("address");
        const driver_id = document.getElementById("driver_id");
        const delivery_service = document.getElementById("delivery_service");
        const default_type = document.getElementById("default_type");

       if(default_type.className.indexOf("filter-active") == - 1){
           selectBillType(default_type ,  1);
       }

         client_id.selectedIndex = "0";
         phone.value = "";
         address.value = "" ;
         driver_id.selectedIndex = "0";
         delivery_service.value = "" ;
         const totalEl = document.getElementById("total");
         const discountEl = document.getElementById("discount");
         const vatEl = document.getElementById("vat");
         const netEl = document.getElementById("net");
         const date = document.getElementById("date");
         if(totalEl && discountEl && vatEl && netEl){
             totalEl.value = 0 ;
             discountEl.value = 0 ;
             vatEl.value = 0 ;
             netEl.value = 0 ;
             date.value = new Date().toLocaleString();
             $("#details tbody tr").remove();



         }
     }
    </script>

</body>
