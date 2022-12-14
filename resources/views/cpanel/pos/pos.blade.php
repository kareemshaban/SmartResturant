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
            <input class="form-control me-2" type="search" placeholder="{{__('main.search_by_bill_number')}}"
                   aria-label="Search" name="val" id="val" >
            <button class="btn btn-outline-primary" type="button" id="searchBill">{{__('main.search')}}</button>
          </form>
        </div>
      </nav>
     <input hidden id="local" value="{{Config::get('app.locale') }}"/>
      <div class="viewed">
        @include('flash-message')
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
                            @if( count($item -> sizes) > 0)
                                <div class="col-lg-6 col-md-6 portfolio-item  item-div .{{$item -> category_id}} ">
                                    <div class="portfolio-wrap item-parent extra"  onclick="selectExtra({{ $item}})" >
                                        <img src="{{ asset('images/Item/' . $item->img) }}" class="img-fluid extra-img" alt="">
                                        <label class="extra-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>

                                    </div>
                                </div>
                                @endif
                                @endif
                        @endforeach

                        </div>
                    </div>

                    </div>




                </div>
                 <div class="col-2">
                     <div class="row " data-aos="fade-up">
                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                             <button type="submit" class="btn btn-labeled btn-success " form="header-form" name="action" value="pay_prepare">
                                 <span class="btn-label"><i class="fa fa-check"></i></span>{{__('main.pay_prep')}}</button>
                         </div>

                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="button" class="btn btn-labeled btn-warning paymentButton">
                             <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.pay')}}</button>
                         </div>



                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="submit" class="btn btn-labeled btn-info " form="header-form" name="action" value="prepare">
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
                             <button type="button" class="btn btn-labeled btn-danger " id="cancelOrder">
                                 <span class="btn-label"><i class="fa fa-remove"></i></span>{{__('main.cancel_order')}}</button>
                         </div>
                         <div class="col-lg-12 d-flex justify-content-center margin-content">
                         <button type="button" class="btn btn-labeled btn-info" onclick="refresh(1)">
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
                                <li onclick="selectBillType(this , 2)" id="default_type2">{{__('main.bill_type2')}}</li>
                                <li onclick="selectBillType(this , 3)" id="default_type3">{{__('main.bill_type3')}}</li>
                                <li onclick="selectBillType(this , 4)" id="default_type4">{{__('main.bill_type4')}}</li>
                            </ul>
                        </div>
                    </div>
                    <form class="center" method="POST" action="{{ route('storeBill') }}"
                          enctype="multipart/form-data" id="header-form">
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
                                            name="client_id" id="client_id" onchange="selectClient()">
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
                                            <input type="text"
                                                   class="form-control"
                                                   id="client_name" name="client_name" hidden />
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
                                                        name="driver_id" id="driver_id" onchange="selectDriver()">
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
                                                       placeholder="{{ __('main.delivery_service') }}" autofocus
                                                      />
                                                <input type="text"
                                                       class="form-control"
                                                       id="driver_name" name="driver_name" hidden />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="hall_data">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>{{ __('main.table') }}</label>

                                                <input type="text"
                                                       class="form-control text-center @error('table_id') is-invalid @enderror"
                                                        id="table_name" name="table_name" readonly style="font-size: 14px;"/>
                                                <input type="text"
                                                       class="form-control text-center"  id="table_id" name="table_id"  hidden />

                                                @error('table_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>{{ __('main.service') }}</label>
                                                    <input type="number" name="service" id="service"
                                                       class="form-control"
                                                       placeholder="{{ __('main.service') }}" readonly
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group last-form">
                                        <input id="bill_type" name="billType" hidden type="text">
                                    </div>


                            </div>

                            </div>

                        </div>



                    <div class="row justify-content-center">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="card-body px-0" style="margin: 0 ; padding: 0;" >
                                <div class="table-wrap-height">
                                    <table id="details" class="table table-bordered "  style="width:100%">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center" hidden>item_id</th>
                                            <th class="text-center" hidden>size_id</th>
                                            <th class="text-center" hidden>item_size_id</th>
                                            <th class="text-center" hidden>details_id</th>
                                            <th class="text-center" hidden>isExtra</th>
                                            <th class="text-center">{{ __('main.item') }}</th>
                                            <th class="text-center">{{ __('main.size') }}</th>
                                            <th class="text-center">{{ __('main.quantity') }}</th>
                                            <th class="text-center">{{ __('main.price') }}</th>
                                            <th class="text-center">{{ __('main.total') }}</th>
                                            <th class="text-center" hidden>price without vat</th>
                                            <th class="text-center" hidden>total without vat</th>
                                            <th class="text-center">{{ __('main.select') }}</th>
                                            <th class="text-center" hidden>extraitemId</th>
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
                                                 id="date" name="bill_date"
                                                 class="form-control text-center"
                                                 placeholder="{{ __('main.date') }}" autofocus value="{{\Carbon\Carbon::now()}}" readonly/>
                                      </div>
                                      <div class="col-4">
                                          <label>{{ __('main.bill_no') }}</label>
                                          <input type="text" id="bill_number" name="bill_number"
                                                 class="form-control text-center"
                                                     placeholder="{{ __('main.bill_no') }}" autofocus  readonly/>
                                          <input type="text" id="identifier" name="identifier"
                                                 class="form-control text-center"
                                                 placeholder="identifier"   hidden=""/>

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
                                        <div class="col-4">
                                            <label>{{ __('main.service_val') }}</label>
                                            <input type="text"
                                                   class="form-control text-center"  id="serviceVal" name="serviceVal"
                                                   placeholder="{{ __('main.service_val') }}" autofocus  readonly value="0"/>
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
                                                   class="form-control text-center"  id="cash" name="cash"
                                                   placeholder="{{ __('main.cash') }}" hidden value="0"/>
                                            <input type="text"
                                                   class="form-control text-center"  id="credit" name="credit"
                                                   placeholder="{{ __('main.credit') }}" hidden value="0"/>
                                            <input type="text"
                                                   class="form-control text-center"  id="bank" name="bank"
                                                   placeholder="{{ __('main.net') }}" hidden value="0"/>

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

    {{--    tables Modal   --}}
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                                <ul id="modal-flters" style="background: lightgray;">
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

                                    <div class="col-lg-2 col-md-4 col-4 portfolio-item  table-div .{{$table -> hall_id}}">
                                        <div class="portfolio-wrap tables {{$table -> available == 1 ? 'available' : 'notAvailable'}}" #
                                        onclick="selectTable(this , {{$table}})" id="{{$table -> id}}">

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

    {{--    Confirmation  Modal   --}}
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <img src="../../images/warning.png" class="alertImage">
                    <label class="alertTitle">{{__('main.booked_table_title')}}</label>
                    <br> <label  class="alertSubTitle" id="modal_table_bill"></label>
                    <div class="row">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-labeled btn-warning" onclick="setBill()">
                                <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.show_bill')}}</button>
                        </div>
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-labeled btn-primary paymentButton"  >
                                <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.pay')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <img src="../../images/warning.png" class="alertImage">
                    <label class="alertTitle">{{__('main.cancel_order_title')}}</label>
                    <br> <label  class="alertSubTitle" id="modal_table_bill"></label>
                    <div class="row">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-labeled btn-warning" onclick="cancelOrder()">
                                <span class="btn-label" style="margin-right: 10px"><i class="fa fa-check"></i></span>{{__('main.confirm_btn')}}</button>
                        </div>
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-labeled btn-primary"  data-bs-dismiss="modal"  aria-label="Close">
                                <span class="btn-label" style="margin-right: 10px"><i class="fa fa-close"></i></span>{{__('main.cancel_btn')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    Payment  Modal   --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <label class="modelTitle"> {{__('main.payment_header')}}</label>
                    <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="paymentBody">
                    <form   method="POST" action="{{ route('payBill') }}"
                          enctype="multipart/form-data" >
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.bill_no') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="modalBillNo" name="modalBillNo"
                                           class="form-control"
                                           placeholder="{{ __('main.bill_no') }}" readonly />
                                    <input type="text"  id="modalBillId" name="modalBillId"
                                           class="form-control"
                                           placeholder="{{ __('main.bill_no') }}" hidden />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.table') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                    <input type="text"  id="modalTableHall"
                                           class="form-control"
                                           placeholder="{{ __('main.table') }}" readonly />
                                    <input type="text"  id="modalTableId" name="modalTableId"
                                           class="form-control"
                                           placeholder="{{ __('main.table') }}" hidden />
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6 " style="display: block; margin: auto">
                                <div class="form-group">
                                    <label>{{ __('main.total') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="modalBillTotal" name="modalBillTotal"
                                           class="form-control"
                                           placeholder="{{ __('main.total') }}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.discount') }} <span style="color:red; font-size:20px; font-weight:bold;">%</span> </label>
                                    <input type="number"  step="any"  id="modalBillDiscountPer" name="modalBillDiscountPer"
                                           class="form-control" max="100"
                                           placeholder="{{ __('main.discount') }} %"  onkeyup="calculateModalDiscount()"
                                    onchange="calculateModalDiscount()"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label>{{ __('main.discount') }} <span style="color:red; font-size:20px; font-weight:bold;"></span> </label>
                                <div class="form-group">
                                    <input type="number" step="any" id="modalBillDiscount" name="modalBillDiscount"
                                           class="form-control"
                                           placeholder="{{ __('main.discount') }}"  onkeyup="calculateModalDiscountPer()"
                                           onchange="calculateModalDiscountPer()" />
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6 " style="display: block; margin: auto">
                                <div class="form-group">
                                    <label>{{ __('main.net') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="modalBillNet" name="modalBillNet"
                                           class="form-control"
                                           placeholder="{{ __('main.net') }}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.cash') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="number" step="any" id="modalBillCash" name="modalBillCash"
                                           class="form-control"
                                           placeholder="{{ __('main.cash') }}"  />
                                </div>
                            </div>
                            <div class="col-6">
                                <label>{{ __('main.visa') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <div class="form-group">
                                    <input type="number" step="any" id="modalBillCredit" name="modalBillCredit"
                                           class="form-control"
                                           placeholder="{{ __('main.visa') }}"  />
                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-6" style="display: block; margin: 20px auto; text-align: center;">
                                <button type="submit" class="btn btn-labeled btn-primary"  >
                                    {{__('main.finish_bill')}}</button>
                            </div>
                        </div>
                    </form>
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
    $.ajax({
        type:'get',
        url:'getLastBill',
        dataType: 'json',

        success:function(response){
            console.log(response);

            if(response){

                if(response.billType == 1 || response.billType == 2){
                    if(response.payed == 0){
                        Bill = response ;
                        $('#paymentModal').modal("show");
                        fillPaymentModal();
                    } else {
                        Bill = null ;
                    }

                } else {
                    Bill = null ;
                }


            } else {
                Bill = null ;
            }
        }
    });

    // const mediumButton = document.getElementById("mediumButton");
    // mediumButton.style.display = "none";
    let hall_data = document.getElementById("hall_data");
    hall_data.style.display = "none";
    details = [] ;

    refresh(1);

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

    $(document).on('click', '.notAvailable', function(event) {
        const table_id = event.target.id ;
        const local = document.getElementById("local").value;
        $.ajax({
            type:'get',
            url:'getTableBill' + '/' + table_id,
            dataType: 'json',

            success:function(response){
                console.log(response);
                if(response[0]) {
                    Bill = response[0] ;
                    var modal_table_bill = document.getElementById('modal_table_bill');
                    modal_table_bill.innerHTML = 'Bill Number :' + response[0].bill_number  + '<br>'
                    + 'Table :' + ( local == 'ar' ? response[0].table.name_ar : response[0].table.name_en) ;

                    let identifier = document.getElementById('identifier');
                    identifier.value = Bill.identifier ;
                } else {
                    Bill = null ;
                    modal_table_bill.innerHTML ="";
                }
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href
                    , beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#smallModal').modal("show");
                        $('#mediumModal').modal("hide");
                    }
                    , complete: function() {
                        $('#loader').hide();
                    }
                    , error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    }
                    , timeout: 8000
                })
            }


        });


    });

    $(document).on('click', '.paymentButton', function(event) {
        if(Bill) {
            if (Bill.payed == 0) {
                const local = document.getElementById("local").value;
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function () {
                        $('#loader').show();
                    },
                    // return the result
                    success: function (result) {
                        $('#paymentModal').modal("show");
                        try {
                            $('#smallModal').modal("hide");
                        } catch (err) {
                            console.log(err);
                        }
                        fillPaymentModal();

                        //  $('#mediumBody').html(result).show();
                    },
                    complete: function () {
                        $('#loader').hide();
                    },
                    error: function (jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            } else {
                // bill is payed
                alert($('<div>{{trans('main.bill_payed_alredy')}}</div>').text());
            }
        } else {
            alert($('<div>{{trans('main.no_bill_found')}}</div>').text());
        }
    });
    });
 $(document).on('click', '#cancelOrder', function(event) {
     if(Bill) {
             event.preventDefault();
             let href = $(this).attr('data-attr');
             $.ajax({
                 url: href,
                 beforeSend: function () {
                     $('#loader').show();
                 },
                 // return the result
                 success: function (result) {
                     $('#confirmModal').modal("show");
                 },
                 complete: function () {
                     $('#loader').hide();
                 },
                 error: function (jqXHR, testStatus, error) {
                     console.log(error);
                     alert("Page " + href + " cannot open. Error:" + error);
                     $('#loader').hide();
                 },
                 timeout: 8000
             })
     } else {
         alert($('<div>{{trans('main.no_bill_found')}}</div>').text());
     }
 });

 $(document).on('click', '#searchBill', function(event){
     const val = document.getElementById('val').value ;
     console.log(val);
     $.ajax({
         type:'get',
         url:'searchBill' + '/' + val,
         dataType: 'json',

         success:function(response){
             console.log(response);
             if(response[0]) {
                 Bill = response[0] ;
                 setBill();


             } else {
                 alert($('<div>{{trans('main.no_search_result')}}</div>').text());
             }
         }
     });
 });

    function cancelOrder(){
        let url = "{{ route('cancelOrder', ':id') }}";
        url = url.replace(':id', Bill.id);
        document.location.href=url;
    }
   function  fillPaymentModal(){
     const local = document.getElementById("local").value;
     const modalBillNo = document.getElementById('modalBillNo');
     const modalTableHall = document.getElementById('modalTableHall');
     const modalTableId = document.getElementById('modalTableId');
     const modalBillTotal = document.getElementById('modalBillTotal');
     const modalBillDiscountPer = document.getElementById('modalBillDiscountPer');
     const modalBillDiscount = document.getElementById('modalBillDiscount');
     const modalBillNet = document.getElementById('modalBillNet');
     const modalBillCash = document.getElementById('modalBillCash');
     const modalBillCredit = document.getElementById('modalBillCredit');
     const modalBillId = document.getElementById('modalBillId');


     if(Bill){
         modalBillId.value = Bill.id ;
         modalBillNo.value = Bill.bill_number ;
         if(Bill.table){
             modalTableHall.value = local == 'ar' ?( Bill.table.name_ar + '--' + Bill.table.hall.name_ar  ) :
                 ( Bill.table.name_en + '--' + Bill.table.hall.name_en  ) ;
             modalTableId.value = Bill.table.id ;
         }  else {
             modalTableId.value = 0;
         }

        var per = (Bill.discount / ( Number(Bill.net) + Number(Bill.discount)) )* 100;
         modalBillTotal.value =   Bill.net;
          modalBillDiscountPer.value = per ;
         modalBillDiscount.value = Bill.discount ;
         modalBillNet.value = Bill.net ;
         modalBillCash.value = Bill.cash == 0 ? Bill.net : Bill.cash;
         modalBillCredit.value = Bill.credit;

     }
 }
   function calculateModalDiscount(){
       const modalBillTotal = document.getElementById('modalBillTotal');
       const modalBillDiscountPer = document.getElementById('modalBillDiscountPer');
       var modalBillDiscount = document.getElementById('modalBillDiscount');
       const modalBillNet = document.getElementById('modalBillNet');
       const modalBillCash = document.getElementById('modalBillCash');
       const modalBillCredit = document.getElementById('modalBillCredit');

        var total = modalBillTotal.value ;
        var per = modalBillDiscountPer.value ;
        var discount = total * (per / 100);
        var net = Number(total) - Number(discount);
        modalBillDiscount.value = discount.toFixed("2");
       modalBillNet.value = net.toFixed("2");
       modalBillCash.value = net.toFixed("2");
       modalBillCredit.value = 0;
   }
   function calculateModalDiscountPer(){
     const modalBillTotal = document.getElementById('modalBillTotal');
     const modalBillDiscountPer = document.getElementById('modalBillDiscountPer');
     var modalBillDiscount = document.getElementById('modalBillDiscount');
     const modalBillNet = document.getElementById('modalBillNet');
     const modalBillCash = document.getElementById('modalBillCash');
     const modalBillCredit = document.getElementById('modalBillCredit');

     var total = modalBillTotal.value ;
     var discount = modalBillDiscount.value ;

     var per = (discount / total )* 100;
     var net = Number(total) - Number(discount);
     modalBillDiscountPer.value =per.toFixed("2");
     modalBillNet.value = net.toFixed("2") ;
     modalBillCash.value = net.toFixed("2") ;
     modalBillCredit.value = 0 ;
   }


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

    function selecItemSize(size , item ){
        const local = document.getElementById("local").value;
        var table = document.getElementById("details-body");
        var repeate = document.getElementById( 'details-body-tr' + size.id);
        console.log(repeate);
        if(!repeate) {

            AddItemToTable(size , item);
            calculateTotal();
        } else {

            const table =  document.getElementById("details");
            var checkBoxes = table.getElementsByTagName("INPUT");
            for (let item of checkBoxes) {
                    item.checked = false;
            }

            var tds = repeate.getElementsByTagName('td');
            var check = tds[13];

            var checkBox = check.getElementsByTagName("input")[0];
            checkBox.checked = true ;
            increaseQnt();
            checkBox.checked = false ;
        }
    }
    function AddItemToTable(size , item){
        var table = document.getElementById("details-body");

        var row = table.insertRow(-1);

        let obj ={
            'item_id': item.id ,
            'size_id': size.size.id,
            'item_size_id' : size.id ,
            'qnt' : 1 ,
            'price':  size.price,
            'priceWithVat': size.priceWithAddValue,
            'total': size.price,
            'totalWithVat': size.priceWithAddValue,
            'isExtra': 0,
            'extra_item_id':0,
            'notes': '',
            'txt_holder': ''
        };
        details.push(obj);
        row.id = 'details-body-tr' + size.id;
        row.className = "text-center";
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell50 = row.insertCell(5);
        var cell6 = row.insertCell(6);
        var cell7 = row.insertCell(7);
        var cell8 = row.insertCell(8);
        var cell9 = row.insertCell(9);
        var cell10 = row.insertCell(10);
        var cell11 = row.insertCell(11);
        var cell12 = row.insertCell(12);
        var cell13 = row.insertCell(13);
        var cell14 = row.insertCell(14);
        cell2.hidden = true;
        cell3.hidden = true;
        cell4.hidden = true;
        cell5.hidden = true;
        cell50.hidden = true;
        cell11.hidden = true;
        cell12.hidden = true;
        cell14.hidden = true;

        cell1.innerHTML = details.length ;
        cell2.innerHTML = item.id+'<input name="item_id[]" value="'+item.id+'" hidden>';
        cell3.innerHTML = size.size.id +'<input name="size_id[]" value="'+size.size.id+'" hidden>';
        cell4.innerHTML = size.id +'<input name="item_size_id[]" value="'+size.id+'" hidden>';
        cell5.innerHTML = "0";
        cell50.innerHTML = "0" +'<input name="isExtra[]" value="0" hidden>';
        cell6.innerHTML = local == 'ar' ? item.name_ar : item.name_en ;
        cell7.innerHTML = size.size.label;
        cell8.innerHTML = "1" +'<input name="qnt[]" value="1" hidden>';
        cell9.innerHTML =  size.priceWithAddValue +'<input name="priceWithVat[]" value="'+size.priceWithAddValue+'" hidden>';
        cell10.innerHTML = size.priceWithAddValue +'<input name="totalWithVat[]" value="'+ size.priceWithAddValue+'" hidden>';
        cell11.innerHTML = size.price +'<input name="price[]" value="'+size.price+'" hidden>';
        cell12.innerHTML = size.price +'<input name="totalTable[]" value="'+size.price+'" hidden>';

        cell14.innerHTML = 0 +'<input name="extra_item_id[]" value="0" hidden>';
        cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
    }



    function selectExtra(item){
    if(details.length > 0){
        var table = document.getElementById("details-body");
     var repeate = document.getElementById( 'details-body-tr-extra' + item.id);
     const local = document.getElementById("local").value;
     if(!repeate) {
         AddExtraToTable(item);
         calculateTotal();
     } else {

         const table =  document.getElementById("details");
         var checkBoxes = table.getElementsByTagName("INPUT");
         for (let item of checkBoxes) {
             item.checked = false;
         }
         var tds = repeate.getElementsByTagName('td');
         var check = tds[13];

         var checkBox = check.getElementsByTagName("input")[0];
         checkBox.checked = true ;
         increaseQnt();
         checkBox.checked = false ;
     }
    } else {
        alert($('<div>{{trans('main.add_item_first')}}</div>').text());
    }

 }
    function AddExtraToTable(item){
        var table = document.getElementById("details-body");
        var row = table.insertRow(-1);
        row.id = 'details-body-tr-extra' + item.id;
        row.className = "text-center";
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell50 = row.insertCell(5);
        var cell6 = row.insertCell(6);
        var cell7 = row.insertCell(7);
        var cell8 = row.insertCell(8);
        var cell9 = row.insertCell(9);
        var cell10 = row.insertCell(10);
        var cell11 = row.insertCell(11);
        var cell12 = row.insertCell(12);
        var cell13 = row.insertCell(13);
        var cell14 = row.insertCell(14);
        cell2.hidden = true;
        cell3.hidden = true;
        cell4.hidden = true;
        cell5.hidden = true;
        cell50.hidden = true;
        cell11.hidden = true;

        cell12.hidden = true;
        cell14.hidden = true;


        cell1.innerHTML = "";
        cell1.style.background = "#E8E8F2";
        cell2.innerHTML = item.id +'<input name="item_id[]" value="'+item.id+'" hidden>';
        cell3.innerHTML =item.sizes[0].size_id  +'<input name="size_id[]" value="'+item.sizes[0].size_id +'" hidden>';
        cell4.innerHTML =  item.sizes[0].id  +'<input name="item_size_id[]" value="'+item.sizes[0].id+'" hidden>';;
        cell5.innerHTML = "0";
        cell50.innerHTML = "1" +'<input name="isExtra[]" value="1" hidden>';
        cell6.innerHTML =  local == 'ar' ? item.name_ar : item.name_en ;
        cell7.innerHTML = "---";
        cell8.innerHTML = "1" +'<input name="qnt[]" value="1" hidden>';
        cell9.innerHTML =  item.sizes[0].priceWithAddValue +'<input name="priceWithVat[]" value="'+ item.sizes[0].priceWithAddValue +'" hidden>';
        cell10.innerHTML = item.sizes[0].priceWithAddValue +'<input name="totalWithVat[]" value="'+ item.sizes[0].priceWithAddValue +'" hidden>';
        cell11.innerHTML = item.sizes[0].price+'<input name="price[]" value="'+ item.sizes[0].price  +'" hidden>';
        cell12.innerHTML = item.sizes[0].price  +'<input name="totalTable[]" value="'+ item.sizes[0].price +'" hidden>';
        cell14.innerHTML = details[details.length -1].item_size_id +'<input name="extra_item_id[]" value="'+details[details.length -1].item_size_id +'" hidden>';
        cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
        row.style.background = "cornflowerblue";
        row.style.color = "white";
    }
    function rowCheckChange(ele){
        console.log(ele.checked);
        const table =  document.getElementById("details");
        var checkBoxes = table.getElementsByTagName("INPUT");
        for (let item of checkBoxes) {
            if(item != ele)
            item.checked = false;
        }
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
        let hall_data = document.getElementById("hall_data");
        let bill_type = document.getElementById("bill_type");
        let mediumButton = document.getElementById("mediumButton");
        bill_type.value = i ;
        if(i == 1){
             driver_data.style.display = "block";
         } else {
             driver_data.style.display = "none";
         }
         if(i == 3 || i == 4){
            // mediumButton.style.display = "block";
             hall_data.style.display = "block";
         } else {
            // mediumButton.style.display = "none";
             hall_data.style.display = "none";
         }

         let total = 0 ;

        const table =  document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[9];
            var td2 = item.getElementsByTagName("td")[11];
            total += Number(td.innerHTML);
        }

        handleService(total);
        calculateTotal();

    }

    function calculateTotal(){

        const table =  document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var total = 0 ;
        var totalWithoutVat = 0 ;
        var service = 0  ;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[10];
            var td2 = item.getElementsByTagName("td")[12];
            var inp1 = td.getElementsByTagName("input")[0];
            var inp2 = td2.getElementsByTagName("input")[0];
            total += Number(inp1.value);
            totalWithoutVat += Number(inp2.value);
        }
        const totalEl = document.getElementById("total");
        const discountEl = document.getElementById("discount");
        const vatEl = document.getElementById("vat");
        const netEl = document.getElementById("net");

        service = handleService(total);

        if(totalEl && discountEl && vatEl && netEl){
            let discount = discountEl.value ;
            let vat = Number(total) - Number(totalWithoutVat) ;
            let net = Number(total)- Number(discount)  + Number(service);
            totalEl.value = totalWithoutVat ;
            vatEl.value = vat ;
            netEl.value = net ;

        }
    }
    function handleService(total){
        var service = 0  , servicePer = 0;
        let bill_type = document.getElementById("bill_type").value;
        const delivery_service = document.getElementById("delivery_service").value;
        const serviceEl = document.getElementById("service");
        const serviceVal =  document.getElementById("serviceVal");
        if(Number(total) > 0){
            if(bill_type == 1){
                service = delivery_service ;
                servicePer = 0 ;
            } else if(bill_type == 2){
                service = 0 ;
                servicePer = 0 ;
            } else {
                servicePer = serviceEl.value;

                service =  (Number(total) * (Number(servicePer)/100)).toFixed(2);
            }
        } else {
            service = 0 ;
            servicePer = 0 ;
        }
        serviceVal.value =  service;
        return service ;
    }
    function increaseQnt(){
        const table =  document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var target ;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[13];
            var checkBox = td.getElementsByTagName("input")[0];
            if(checkBox.checked){
                target = item ;
                break;
            }
        }

        var qntTd = target.getElementsByTagName("td")[8];
        var qntInp = qntTd.getElementsByTagName("input")[0];
        var oldQnt = qntInp.value ;
        var qnt = Number(oldQnt) + 1 ;
        qntTd.innerHTML = qnt +'<input name="qnt[]" value="'+qnt+'" hidden>';


        var idTd = target.getElementsByTagName("td")[3];
        var id = idTd.innerHTML ;

        if(details.filter(c=> c.item_size_id == id).length > 0){
            details.filter(c=> c.item_size_id == id)[0].qnt = qnt ;
        }



        var priceTd = target.getElementsByTagName("td")[9];
        var price2Td = target.getElementsByTagName("td")[11];
         var priceInp = priceTd.getElementsByTagName("input")[0];
         var price2Inp = price2Td.getElementsByTagName("input")[0];

        var price = priceInp.value ;
        var price2 = price2Inp.value ;

        var totalTd = target.getElementsByTagName("td")[10];
        var total2Td = target.getElementsByTagName("td")[12];


        var total = Number(price) * Number(qnt);
        var total2 = Number(price2) * Number(qnt);
        totalTd.innerHTML = total +'<input name="totalWithVat[]" value="'+total+'" hidden>';
        total2Td.innerHTML = total2  +'<input name="totalTable[]" value="'+total2+'" hidden>';

        calculateTotal();

    }
    function decreaseQnt(){
         const table =  document.getElementById("details");
         var tbodys = table.getElementsByTagName("tbody");
         var tbody = tbodys[0];
         var target ;
         var trs = tbody.getElementsByTagName("tr");
         for (let item of trs) {
             var td = item.getElementsByTagName("td")[13];
             var checkBox = td.getElementsByTagName("input")[0];
             if(checkBox.checked){
                 target = item ;
                 break;
             }
         }
         var qntTd = target.getElementsByTagName("td")[8];
         var qntInp = qntTd.getElementsByTagName("input")[0];
         var oldQnt = qntInp.value ;
         if(oldQnt > 1) {
             var qnt = Number(oldQnt) - 1;
             qntTd.innerHTML = qnt +'<input name="qnt[]" value="'+qnt+'" hidden>';


             var idTd = target.getElementsByTagName("td")[3];
             var id = idTd.innerHTML ;

             if(details.filter(c=> c.item_size_id == id).length > 0){
                 details.filter(c=> c.item_size_id == id)[0].qnt = qnt ;
             }


            var priceTd = target.getElementsByTagName("td")[9];
            var price2Td = target.getElementsByTagName("td")[11];
            var priceInp = priceTd.getElementsByTagName("input")[0];
            var price2Inp = price2Td.getElementsByTagName("input")[0];

            var price = priceInp.value ;
            var price2 = price2Inp.value ;

            var totalTd = target.getElementsByTagName("td")[10];
            var total2Td = target.getElementsByTagName("td")[12];



            var total = Number(price) * Number(qnt);
            var total2 = Number(price2) * Number(qnt);
            totalTd.innerHTML = total +'<input name="totalWithVat[]" value="'+total+'" hidden>';
            total2Td.innerHTML = total2  +'<input name="totalTable[]" value="'+total2+'" hidden>';


             calculateTotal();
         }
     }
    function removeItem(){
     const table =  document.getElementById("details");
     var tbodys = table.getElementsByTagName("tbody");
     var tbody = tbodys[0];
     var target ;
     var trs = tbody.getElementsByTagName("tr");
     for (let item of trs) {
         var td = item.getElementsByTagName("td")[13];
         var checkBox = td.getElementsByTagName("input")[0];
         if(checkBox.checked){
             target = item ;
             break;
         }
     }
     var idTd = target.getElementsByTagName("td")[3];
     var id = idTd.innerHTML ;

     if(details.filter(c=> c.item_size_id == id).length > 0){
         details.splice(details.indexOf(details.filter(c=> c.item_size_id == id)[0]) , 1);
     }
     console.log(details);
     table.deleteRow(target.rowIndex);
     calculateTotal();
 }
    function selectHall(element , id){

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
            const table_name = document.getElementById('table_name');
            if(add == 1){
                element.classList.add('selected_table');
                table_id.value = table.id ;
                table_name.value = table.hall.name_ar +  "--" + table.name_ar;

            } else {
                table_id.value = 0 ;
                table_name.value = "";
            }

        } else {
            // table is not available
            //alert($('<div>{{trans('main.table_not_available')}}</div>').text());
        }
     }
    function refresh(i){
        const client_id = document.getElementById("client_id");
        const phone = document.getElementById("phone");
        const  address = document.getElementById("address");
        const driver_id = document.getElementById("driver_id");
        const delivery_service = document.getElementById("delivery_service");
        const service = document.getElementById("service");
        const table_name = document.getElementById("table_name");
         const table_id = document.getElementById("table_name");
        const bill_number = document.getElementById("bill_number");
        const default_type = document.getElementById("default_type");
        let identifier = document.getElementById('identifier');
        identifier.value = "" ;
        document.getElementById('val').value = '' ;
         document.getElementById('table_id').value = 0;
         details = [] ;

         let bill_type = document.getElementById("bill_type");
         bill_type.value = 1 ;
       if(default_type.className.indexOf("filter-active") == - 1){
           selectBillType(default_type ,  1);
       }

         client_id.selectedIndex = "0";
         table_name.value = "";
         table_id.value = "0";
         phone.value = "";
         address.value = "" ;
         driver_id.selectedIndex = "0";

         $.ajax({
             type:'get',
             url:'getVats',
             dataType: 'json',

             success:function(response){
                 if(response){
                     delivery_service.value = response.delivery_service ;
                     service.value = response.service ;

                 } else {
                     delivery_service.value = "" ;
                     service.value = "" ;
                 }
             }
         });

         if(i == 1){
             $.ajax({
                 type:'get',
                 url:'getBillNo',
                 dataType: 'json',

                 success:function(response){
                     console.log(response);

                     if(response){
                         bill_number.value = response;

                     } else {
                         bill_number.value = "";
                     }
                 }
             });
         }




         const totalEl = document.getElementById("total");
         const discountEl = document.getElementById("discount");
         const vatEl = document.getElementById("vat");
         const netEl = document.getElementById("net");
         const serviceVal = document.getElementById("serviceVal");
         const date = document.getElementById("date");
         if(totalEl && discountEl && vatEl && netEl){
             totalEl.value = 0 ;
             discountEl.value = 0 ;
             vatEl.value = 0 ;
             netEl.value = 0 ;
             serviceVal.value = 0 ;
             date.value = new Date().toLocaleString();
             $("#details tbody tr").remove();



         }
     }
    function selectClient(){
        const client_id = document.getElementById("client_id").value ;
         $.ajax({
             type:'get',
             url:'getClient' + '/' + client_id,
             dataType: 'json',

             success:function(response){
                 if(response){
                     document.getElementById("phone").value = response.mobile ? response.mobile :
                         (response.phone ? response.phone : "");
                     document.getElementById("address").value = response.address ? response.address : "";
                     document.getElementById("client_name").value = response.name_ar +'--' + response.name_en;
                 } else {
                     document.getElementById("client_id").selectedIndex = 0 ;
                     document.getElementById("phone").value = "";
                     document.getElementById("address").value = "";
                     document.getElementById("client_name").value = "";
                 }
             }
         });
     }
    function selectDriver(){
     const driver_id = document.getElementById("driver_id").value ;
     $.ajax({
         type:'get',
         url:'getDriver' + '/' + driver_id,
         dataType: 'json',

         success:function(response){
             console.log(response);
             if(response){
                 document.getElementById("driver_name").value = response.name_ar +'--' + response.name_en;
             } else {
                 document.getElementById("driver_name").value = "";
             }
         }
     });
 }


 function setBillDetailsItem(detail){
     var table = document.getElementById("details-body");

     var row = table.insertRow(-1);

     let obj ={
         'item_id': detail.items[0].item_id ,
         'size_id': detail.items[0].size_id,
         'item_size_id' : detail.items[0].id,
         'qnt' : detail.qnt ,
         'price':  detail.price,
         'priceWithVat': detail.priceWithVat,
         'total': detail.total,
         'totalWithVat': detail.totalWithVat,
         'isExtra': 0,
         'extra_item_id':0,
         'notes': '',
         'txt_holder': ''
     };
     details.push(obj);
     row.id = 'details-body-tr' + detail.items[0].id;
     row.className = "text-center";
     var cell1 = row.insertCell(0);
     var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
     var cell4 = row.insertCell(3);
     var cell5 = row.insertCell(4);
     var cell50 = row.insertCell(5);
     var cell6 = row.insertCell(6);
     var cell7 = row.insertCell(7);
     var cell8 = row.insertCell(8);
     var cell9 = row.insertCell(9);
     var cell10 = row.insertCell(10);
     var cell11 = row.insertCell(11);
     var cell12 = row.insertCell(12);
     var cell13 = row.insertCell(13);
     var cell14 = row.insertCell(14);
     cell2.hidden = true;
     cell3.hidden = true;
     cell4.hidden = true;
     cell5.hidden = true;
     cell50.hidden = true;
     cell11.hidden = true;
     cell12.hidden = true;
     cell14.hidden = true;

     cell1.innerHTML = details.length ;
     cell2.innerHTML = detail.items[0].item_id +'<input name="item_id[]" value="'+detail.items[0].item_id+'" hidden>';
     cell3.innerHTML = detail.items[0].size_id +'<input name="size_id[]" value="'+detail.items[0].size_id+'" hidden>';
     cell4.innerHTML = detail.items[0].id +'<input name="item_size_id[]" value="'+detail.items[0].id+'" hidden>';
     cell5.innerHTML = detail.id +'<input name="detail_id[]" value="'+detail.id+'" hidden>';
     cell50.innerHTML = "0" +'<input name="isExtra[]" value="0" hidden>';
     cell6.innerHTML = local == 'ar' ? detail.items[0].item.name_ar : detail.items[0].item.name_en ;
     cell7.innerHTML = detail.items[0].size.label;
     cell8.innerHTML = detail.qnt  +'<input name="qnt[]" value="'+detail.qnt +'" hidden>';
     cell9.innerHTML =  detail.priceWithVat +'<input name="priceWithVat[]" value="'+detail.priceWithVat+'" hidden>';
     cell10.innerHTML = detail.totalWithVat +'<input name="totalWithVat[]" value="'+ detail.totalWithVat+'" hidden>';
     cell11.innerHTML = detail.price +'<input name="price[]" value="'+detail.price+'" hidden>';
     cell12.innerHTML = detail.total +'<input name="totalTable[]" value="'+detail.total+'" hidden>';

     cell14.innerHTML = 0 +'<input name="extra_item_id[]" value="0" hidden>';
     cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
 }
 function setBillDetailsExtra(detail){
     var table = document.getElementById("details-body");
     var row = table.insertRow(-1);
     row.id = 'details-body-tr-extra' + detail.items[0].item_id;
     row.className = "text-center";
     var cell1 = row.insertCell(0);
     var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
     var cell4 = row.insertCell(3);
     var cell5 = row.insertCell(4);
     var cell50 = row.insertCell(5);
     var cell6 = row.insertCell(6);
     var cell7 = row.insertCell(7);
     var cell8 = row.insertCell(8);
     var cell9 = row.insertCell(9);
     var cell10 = row.insertCell(10);
     var cell11 = row.insertCell(11);
     var cell12 = row.insertCell(12);
     var cell13 = row.insertCell(13);
     var cell14 = row.insertCell(14);
     cell2.hidden = true;
     cell3.hidden = true;
     cell4.hidden = true;
     cell5.hidden = true;
     cell50.hidden = true;
     cell11.hidden = true;

     cell12.hidden = true;
     cell14.hidden = true;


     cell1.innerHTML = "";
     cell1.style.background = "#E8E8F2";
     cell2.innerHTML = detail.items[0].item_id +'<input name="item_id[]" value="'+detail.items[0].item_id+'" hidden>';
     cell3.innerHTML = detail.items[0].size_id  +'<input name="size_id[]" value="'+detail.items[0].size_id  +'" hidden>';
     cell4.innerHTML =  detail.items[0].id  +'<input name="item_size_id[]" value="'+detail.items[0].id+'" hidden>';;
     cell5.innerHTML = detail.id +'<input name="detail_id[]" value="'+detail.id+'" hidden>';
     cell50.innerHTML = "1" +'<input name="isExtra[]" value="1" hidden>';
     cell6.innerHTML =  local == 'ar' ? detail.items[0].item.name_ar : detail.items[0].item.name_en ;
     cell7.innerHTML = "---";
     cell8.innerHTML = detail.qnt +'<input name="qnt[]" value="'+detail.qnt +'" hidden>';
     cell9.innerHTML =  detail.priceWithVat +'<input name="priceWithVat[]" value="'+detail.priceWithVat+'" hidden>';
     cell10.innerHTML = detail.totalWithVat +'<input name="totalWithVat[]" value="'+ detail.totalWithVat+'" hidden>';
     cell11.innerHTML = detail.price +'<input name="price[]" value="'+detail.price+'" hidden>';
     cell12.innerHTML = detail.total +'<input name="totalTable[]" value="'+detail.total+'" hidden>';

     cell14.innerHTML = details[details.length -1].item_size_id +'<input name="extra_item_id[]" value="'+details[details.length -1].item_size_id +'" hidden>';
     cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
     row.style.background = "cornflowerblue";
     row.style.color = "white";
 }
    function setBill(){
        refresh(0);
            if(Bill){
                var ele = null ;

                let bill_type = document.getElementById("bill_type");
                let client_id = document.getElementById('client_id');
                let phone = document.getElementById('phone');
                let address = document.getElementById('address');
                let driver_id = document.getElementById('driver_id');
                let table_id = document.getElementById('table_id');
                let table_name = document.getElementById('table_name');
                let date = document.getElementById('date');
                let bill_number = document.getElementById('bill_number');
                let total = document.getElementById('total');
                let vat = document.getElementById('vat');
                let serviceVal = document.getElementById('serviceVal');
                let discount = document.getElementById('discount');
                let net = document.getElementById('net');
                let cash = document.getElementById('cash');
                let credit = document.getElementById('credit');
                let bank = document.getElementById('bank');
                let identifier = document.getElementById('identifier');
                identifier.value = Bill.identifier ;
                bill_type.value = Bill.billType ;
                if(Bill.billType == 1){
                    ele =  document.getElementById("default_type");
                } else if(Bill.billType == 2){
                    ele =  document.getElementById("default_type2");
                } else if(Bill.billType == 3){
                    ele =  document.getElementById("default_type3");
                } else if(Bill.billType == 4){
                    ele =  document.getElementById("default_type4");
                }
                selectBillType(ele ,  Bill.billType);
                client_id.value = Bill.client_id ;
                phone.value = Bill.phone ;
                address.value = Bill.address;
                if(Bill.driver_id > 0){
                    driver_id.value = Bill.driver_id ;
                }
                if(Bill.table_id > 0){
                    table_id.value = Bill.table_id ;
                    table_name.value = Bill.table.hall.name_ar +  "--" + Bill.table.name_ar;

                } else {
                    table_id.value = 0 ;
                    table_name.value = "";
                }
                date.value = new Date(Bill.bill_date).toLocaleString() ;
                bill_number.value = Bill.bill_number ;
                total.value = Bill.total ;
                vat.value = Bill.vat ;
                serviceVal.value = Bill.serviceVal ;
                discount.value = Bill.discount ;
                net.value = Bill.net ;
                cash.value = Bill.cash ;
                credit.value = Bill.credit ;
                bank.value = Bill.bank ;
                for(let i = 0 ; i < Bill.details.length ; i++){
                    if(Bill.details[i].isExtra == 0){
                        // AddItem
                        setBillDetailsItem(Bill.details[i]);
                    } else {
                        // AddExtra
                        setBillDetailsExtra(Bill.details[i]);
                    }
                }




                $('#smallModal').modal("hide");
            }
    }
    </script>

</body>
