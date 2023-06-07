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
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/"/>
    <link rel="shortcut icon" href="../images/favicon.png" type="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">


    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="../css/pos.css">

    <style>
        .btn {
            font-size: 10px;
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
    @include('cpanel.pos.nav')
    <input hidden id="local" value="{{Config::get('app.locale') }}"/>
    <div class="viewed">
        @include('flash-message')
        <div class="container page ">
            <div class="row " data-aos="fade-up" style="margin: 0; width: 100%" id="controls">
                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-success" name="action" form="header-form"
                            value="pay_prepare" id="pay_prepare">
                        <span class="btn-label"><i class="fa fa-check"></i></span> <br>{{__('main.pay_prep') . ' (F9)'}}
                    </button>
                </div>

                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-warning paymentBillButton">
                        <span class="btn-label"><i class="fa fa-dollar"></i></span>  <br> {{__('main.pay')  . ' (F6)' }}</button>
                </div>
                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-secondary" id="partialPayment">
                        <span class="btn-label"><i class="fa fa-dollar"></i></span>  <br> {{__('main.pay_partial')  . ' (F7)' }}</button>
                </div>




                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-info " form="header-form" name="action"
                            value="prepare" id="prepare">
                        <span class="btn-label"><i class="fa fa-shopping-bag"></i></span>  <br> {{__('main.prepare')  . ' (F3)'}}
                    </button>
                </div>
                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-primary " onclick="increaseQnt()">
                        <span class="btn-label"><i class="fa fa-plus-circle tools"></i> </span></button>
                </div>

                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-dark " onclick="decreaseQnt()">
                        <span class="btn-label"><i class="fa fa-minus-circle tools"></i></span></button>
                </div>

                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-danger " onclick="removeItem()">
                        <span class="btn-label"><i class="fa fa-trash tools"></i></span></button>
                </div>


                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-warning  print_btn">
                        <span class="btn-label"><i class="fa fa-print"></i></span>  <br> {{__('main.print') . ' (F2)' }}
                    </button>
                </div>
                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-danger " id="cancelOrder">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>  <br>{{__('main.cancel_order')  . ' (F12)' }}
                    </button>
                </div>
                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-info" onclick="refresh(1)">
                        <span class="btn-label"><i class="fa fa-refresh"></i></span>  <br>{{__('main.refresh' ) . ' (F5)'}}
                    </button>
                </div>

                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-dark" id="mediumButton">
                        <span class="btn-label"><i class="fa fa-cutlery"></i></span>  <br> {{   __('main.tables')   . ' (F11)' }}
                    </button>
                </div>

                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-danger" id="unpaidBills">
                                <span class="btn-label"><i
                                        class="fa fa-calculator"></i></span>  <br> {{   __('main.unpaidBills' ) . ' (F8)'}}
                    </button>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user() -> email == '0000@restaurant.com')
                <div class="col-lg-1 d-flex justify-content-center margin-content">
                    <button type="button" class="btn btn-labeled btn-danger" id="deleteBill">
                                <span class="btn-label"><i
                                        class="fa fa-trash"></i></span> {{   __('main.delete')}}
                    </button>
                </div>
                @endif

            </div>
            <div class="row">
                <div class="col-8 ">
                    <div class="menue">
                        <div class="bbb_viewed_title_container">
                            <h3 class="bbb_viewed_title">{{ __('main.item_category') }}</h3>
                        </div>

                        <div class="row mx-auto my-auto justify-content-center">
                            <div id="recipeCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox" style="    padding-right: 10px;
    padding-left: 10px;">
                                    @foreach ($categories  as $key => $category)
                                        <div @if($key == 0) class="carousel-item active"
                                             @else class="carousel-item" @endif >
                                            <div class="col-lg-2">
                                                <div class="movie-card m-1"
                                                     onclick="selecCategory(this , {{$category -> id}} )">
                                                    <div class="movie-img">
                                                        <img src="{{ asset('images/Category/' . $category->img) }}"
                                                             class="img-fluid">
                                                    </div>
                                                    <div class="movie-title">
                                                        <p class="text-white text-sm-center font-small flex-center"> {{ Config::get('app.locale') == 'ar' ? $category -> name_ar : $category -> name_en }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                                <a class="carousel-control-prev bg-dark w-auto"
                                   href="javascript:;" role="button" data-slide="prev"
                                   onclick="$('#recipeCarousel').carousel('prev')">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next bg-dark w-auto" href="javascript:;" role="button"
                                   data-slide="next" onclick="$('#recipeCarousel').carousel('next')">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>


                        <div class="bbb_viewed_title_container">
                            <h3 class="bbb_viewed_title">{{__('main.menue_items')}}</h3>

                        </div>
                        <div class="row" style="min-height: 300px;">
                            <div class="col-8" style="padding: 0;">
                                <div class="row portfolio-container"
                                     style="margin: 10px; display: flex;align-items: center;" data-aos="fade-up"
                                     data-aos-delay="100">
                                    @foreach($items as $item)
                                        @if($item -> type == 0 && count($item -> sizes) > 0)
                                            <div
                                                class="col-lg-4 col-md-6 portfolio-item  item-div .{{$item -> category_id}}">
                                                <div class="portfolio-wrap item-parent">
                                                    <img src="{{ asset('images/Item/' . $item->img) }}"
                                                         class="img-fluid item-img" alt="">
                                                    <label
                                                        class="item-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>
                                                    <div class="row sizes">
                                                        @foreach($item -> sizes as $size)
                                                            @if($loop -> index == count($item -> sizes) - 1)
                                                                @if(count($item -> sizes) == 5 )
                                                                    <div class="col-4 text-center"
                                                                         onclick="selecItemSize( {{$size}} , {{ $item}})">
                                                                        {{$size -> size -> label}}
                                                                    </div>
                                                                @else
                                                                    <div
                                                                        class="col-{{ count($item -> sizes) != 5 ? 12 / count($item -> sizes) : 12 / 6}} text-center"
                                                                        onclick="selecItemSize( {{$size}} , {{ $item}})">
                                                                        {{$size -> size -> label}}
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div
                                                                    class="col-{{ count($item -> sizes) != 5 ? 12 / count($item -> sizes) : 12 / 6}} text-center"
                                                                    onclick="selecItemSize( {{$size}} , {{ $item}})">
                                                                    {{$size -> size -> label}}
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @if( count($item -> sizes) == 5)

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-4" style="padding: 0;     border-left: solid 2px gray;">
                                <div class="row portfolio-container"
                                     style="margin: 10px; display: flex;align-items: center;" data-aos="fade-up"
                                     data-aos-delay="100">

                                    @foreach($items as $item)
                                        @if($item -> type == 1 )
                                            @if( count($item -> sizes) > 0)
                                                <div
                                                    class="col-lg-6 col-md-6 portfolio-item  item-div .{{$item -> category_id}} ">
                                                    <div class="portfolio-wrap item-parent extra"
                                                         onclick="selectExtra({{ $item}})">
                                                        <img src="{{ asset('images/Item/' . $item->img) }}"
                                                             class="img-fluid extra-img" alt="">
                                                        <label
                                                            class="extra-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">
                                                            {{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>

                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>



                </div>

                <div class="col-4 ">
                    <h2 class="text-center btn-danger" id="canceled_bill" > فاتورة ملغاة</h2>
                    <div class="menue" id="bill">
                        <div class="row" data-aos="fade-up" >
                            <div class="col-lg-12 d-flex justify-content-center">
                                <ul id="portfolio-flters">
                                    <li class="filter-active" onclick="selectBillType(this , 1)"
                                        id="default_type">{{__('main.bill_type1')}}</li>
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
                                                    <select
                                                        class="custom-select mr-sm-2 @error('client_id') is-invalid @enderror"
                                                        name="client_id" id="client_id" onchange="selectClient()">
                                                        <option selected value="">Choose...</option>
                                                        @foreach($clients as $item)
                                                            @if($item -> type == 0)
                                                                <option
                                                                    value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>
                                                            @endif
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
                                                           placeholder="{{ __('main.phone') }}" autofocus/>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="client_name" name="client_name" hidden/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('main.address') }}</label>
                                            <input type="text" name="address" id="address"
                                                   class="form-control"
                                                   placeholder="{{ __('main.address') }}" autofocus/>
                                        </div>
                                        <div class="form-group" id="driver_data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>{{ __('main.driver') }}</label>
                                                    <select
                                                        class="custom-select mr-sm-2 @error('driver_id') is-invalid @enderror"
                                                        name="driver_id" id="driver_id" onchange="selectDriver()">
                                                        <option selected value="">Choose...</option>
                                                        @foreach($employees as $item)
                                                            <option
                                                                value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>
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
                                                           onkeyup="calculateDeliveryService()"
                                                           onchange="calculateDeliveryService()"
                                                    />
                                                    <input type="text"
                                                           class="form-control"
                                                           id="driver_name" name="driver_name" hidden/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="hall_data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>{{ __('main.table') }}</label>

                                                    <input type="text"
                                                           class="form-control text-center @error('table_id') is-invalid @enderror"
                                                           id="table_name" name="table_name" readonly
                                                           style="font-size: 14px;"/>
                                                    <input type="text"
                                                           class="form-control text-center" id="table_id" name="table_id"
                                                           hidden/>

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

                            <div class="table-responsive">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="card-body px-0" style="margin: 0 ; padding: 0;">
                                            <div class="table-wrap-height">
                                                <table id="details" class="table table-bordered " style="width:100%; direction: rtl">
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
                                                        <th class="text-center" hidden>category_id</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="details-body">


                                                    </tbody>


                                                </table>
                                            </div>


                                            <div class="table-wrap-height">
                                                <table id="totalls" class="table table-bordered "
                                                       style="width:100%; direction: rtl">
                                                    <tr>
                                                        <th> {{ __('main.date') }}</th>
                                                        <td colspan="3"><input type="text"
                                                                               id="date" name="bill_date"
                                                                               class="form-control text-center"
                                                                               placeholder="{{ __('main.date') }}" autofocus
                                                                               value="{{\Carbon\Carbon::now()}}" readonly/></td>
                                                    </tr>
                                                    <tr>
                                                        <th> {{ __('main.bill_no') }}</th>
                                                        <td colspan="3"><input type="text" id="bill_number" name="bill_number"
                                                                               class="form-control text-center"
                                                                               placeholder="{{ __('main.bill_no') }}" autofocus
                                                                               readonly/>
                                                            <input type="text" id="identifier" name="identifier"
                                                                   class="form-control text-center"
                                                                   placeholder="identifier" hidden=""/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th> {{ __('main.total') }}</th>
                                                        <td><input type="text"
                                                                   class="form-control text-center"
                                                                   id="total" name="total"
                                                                   autofocus readonly
                                                                   value="0"/>

                                                        </td>
                                                        <th> {{ __('main.Vat') }}</th>
                                                        <td><input type="text"
                                                                   class="form-control text-center" id="vat" name="vat"
                                                                   placeholder="{{ __('main.Vat') }}" autofocus readonly
                                                                   value="0"/>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th> {{ __('main.discount') }}</th>
                                                        <td><input type="text"
                                                                   class="form-control text-center"
                                                                   id="discount" name="discount"
                                                                   placeholder="{{ __('main.discount') }}" autofocus readonly
                                                                   value="0"/>

                                                        </td>
                                                        <th> {{ __('main.net') }}</th>
                                                        <td><input type="text"
                                                                   class="form-control text-center" id="net" name="net"
                                                                   placeholder="{{ __('main.net') }}" autofocus readonly
                                                                   value="0"/>
                                                            <input type="text"
                                                                   class="form-control text-center" id="cash" name="cash"
                                                                   placeholder="{{ __('main.cash') }}" hidden value="0"/>
                                                            <input type="text"
                                                                   class="form-control text-center" id="credit" name="credit"
                                                                   placeholder="{{ __('main.credit') }}" hidden value="0"/>
                                                            <input type="text"
                                                                   class="form-control text-center" id="bank" name="bank"
                                                                   placeholder="{{ __('main.net') }}" hidden value="0"/>
                                                            <input type="text"
                                                                   class="form-control text-center" id="serviceVal"
                                                                   name="serviceVal"
                                                                   placeholder="{{ __('main.service_val') }}" autofocus readonly
                                                                   value="0" hidden/>

                                                        </td>
                                                    </tr>
                                                </table>
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

</div>

{{--    tables Modal   --}}
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" id="hall0" name="hall0" value="{{ count($halls) > 0 ? $halls[0] -> id : 0}}">
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


                    <div class="row portfolio-container" style="margin: 10px; display: flex;align-items: center;"
                         data-aos="fade-up" data-aos-delay="100">
                        @foreach($tables as $table)

                            <div class="col-lg-2 col-md-4 col-4 portfolio-item  table-div .{{$table -> hall_id}}">
                                <div
                                    class="portfolio-wrap tables {{$table -> available == 1 ? 'available' : 'notAvailable'}}"
                                    #
                                    onclick="selectTable(this , {{$table}})" id="{{$table -> id}}">

                                    <label
                                        class="table-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $table -> name_ar : $table -> name_en}}</label>

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
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <img src="../../images/warning.png" class="alertImage">
                <label class="alertTitle">{{__('main.booked_table_title')}}</label>
                <br> <label class="alertSubTitle" id="modal_table_bill"></label>
                <div class="row">
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-warning" onclick="setBill()">
                            <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.show_bill')}}</button>
                    </div>
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-primary paymentBillButton">
                            <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.pay')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <img src="../../images/warning.png" class="alertImage">
                <label class="alertTitle">{{__('main.cancel_order_title')}}</label>
                <br> <label class="alertSubTitle" id="modal_table_bill"></label>
                <div class="row">
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-warning" onclick="DeleteBillAction()">
                            <span class="btn-label" style="margin-right: 10px"><i
                                    class="fa fa-check"></i></span>{{__('main.confirm_btn')}}</button>
                    </div>
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-primary" data-bs-dismiss="modal"
                                aria-label="Close">
                            <span class="btn-label" style="margin-right: 10px"><i
                                    class="fa fa-close"></i></span>{{__('main.cancel_btn')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirmModal2" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <img src="../../images/warning.png" class="alertImage">
                <label class="alertTitle">{{__('main.cancel_order_title')}}</label>
                <br> <label class="alertSubTitle" id="modal_table_bill"></label>
                <div class="row">
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-warning" onclick="cancelOrder()">
                            <span class="btn-label" style="margin-right: 10px"><i
                                    class="fa fa-check"></i></span>{{__('main.confirm_btn')}}</button>
                    </div>
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-primary" data-bs-dismiss="modal"
                                aria-label="Close">
                            <span class="btn-label" style="margin-right: 10px"><i
                                    class="fa fa-close"></i></span>{{__('main.cancel_btn')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">{{__('main.settings')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form class="center" method="POST" action="{{ route('store_bill_type') }}"
                      enctype="multipart/form-data" >
                    @csrf
                    <!-- {{ csrf_field() }} -->
                <div class="row" style="margin-bottom: 30px;">


                 <div class="form-group">
                     <label>{{ __('main.def_bill_type') }}</label>
                     <select class="custom-select mr-sm-2" name="def_bill_type" id="def_bill_type" >
                         <option selected value="">Choose...</option>
                         <option  value="1">{{__('main.bill_type1')}}</option>
                         <option  value="2">{{__('main.bill_type2')}}</option>
                         <option  value="3">{{__('main.bill_type3')}}</option>
                         <option  value="4">{{__('main.bill_type4')}}</option>
                     </select>
                 </div>
                </div>

                <div class="row text-center" style="display: flex;justify-content: center;">
                    <div class="col-6 text-center">
                        <button type="submit" class="btn btn-labeled btn-warning" >
                            <span class="btn-label" style="margin-right: 10px"><i
                                    class="fa fa-check"></i></span>{{__('main.save_btn')}}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="shortcutModal" tabindex="-1" role="dialog" aria-labelledby="shortcutModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">{{__('main.shortcut')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <table style="width: 100%;" class="table table-bordered table-striped">
                    <thead class="btn-primary">
                    <tr>
                        <th class="text-center">KEY</th>
                        <th class="text-center">Function</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">F9</td>
                        <td class="text-center">{{__('main.pay_prep')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F3</td>
                        <td class="text-center">{{__('main.prepare')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F6</td>
                        <td class="text-center">{{__('main.pay')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F2</td>
                        <td class="text-center">{{__('main.print')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F12</td>
                        <td class="text-center">{{__('main.cancel_order')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F11</td>
                        <td class="text-center">{{__('main.tables')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">+</td>
                        <td class="text-center">{{__('main.plus')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">-</td>
                        <td class="text-center">{{__('main.mins')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">Del</td>
                        <td class="text-center">{{__('main.del')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{--    Payment  Modal   --}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.payment_header')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form method="POST" action="{{ route('payBill') }}"
                      enctype="multipart/form-data" id="payment-form">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.bill_no') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillNo" name="modalBillNo"
                                       class="form-control"
                                       placeholder="{{ __('main.bill_no') }}" readonly/>
                                <input type="text" id="modalBillId" name="modalBillId"
                                       class="form-control"
                                       placeholder="{{ __('main.bill_no') }}" hidden/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.table') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                <input type="text" id="modalTableHall"
                                       class="form-control"
                                       placeholder="{{ __('main.table') }}" readonly/>
                                <input type="text" id="modalTableId" name="modalTableId"
                                       class="form-control"
                                       placeholder="{{ __('main.table') }}" hidden/>
                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-4 " >
                            <div class="form-group">
                                <label>{{ __('main.total') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillTotal" name="modalBillTotal"
                                       class="form-control"
                                       placeholder="{{ __('main.total') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 " >
                            <div class="form-group">
                                <label>{{ __('main.tax') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillTax" name="modalBillTax"
                                       class="form-control"
                                       placeholder="{{ __('main.tax') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 " >
                            <div class="form-group">
                                <label>{{ __('main.service_val') }} / {{__('main.delivery_service')}} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillService" name="modalBillService"
                                       class="form-control"
                                       placeholder="{{ __('main.tax') }}" readonly/>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.discount') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">%</span> </label>
                                <input type="number" step="any" id="modalBillDiscountPer" name="modalBillDiscountPer"
                                       class="form-control" max="100"
                                       placeholder="{{ __('main.discount') }} %" onkeyup="calculateModalDiscount()"
                                       onchange="calculateModalDiscount()" min="0" required
                                       onblur="leaveModalDiscountPer()"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>{{ __('main.discount') }} <span
                                    style="color:red; font-size:20px; font-weight:bold;"></span> </label>
                            <div class="form-group">
                                <input type="number" step="any" id="modalBillDiscount" name="modalBillDiscount"
                                       class="form-control"
                                       placeholder="{{ __('main.discount') }}" onkeyup="calculateModalDiscountPer()"
                                       onchange="calculateModalDiscountPer()" min="0" required
                                onblur="leaveModalDiscount()"/>
                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.net') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillNet" name="modalBillNet"
                                       class="form-control"
                                       placeholder="{{ __('main.net') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.paid') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillpaid" name="modalBillpaid"
                                       class="form-control"
                                       placeholder="{{ __('main.paid') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.tax_after_discount') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillNetTax" name="modalBillNetTax"
                                       class="form-control"
                                       placeholder="{{ __('main.tax_after_discount') }}" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.cash') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span>
                                </label>
                                <input type="number" step="any" id="modalBillCash" name="modalBillCash"
                                       class="form-control"
                                       placeholder="{{ __('main.cash') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>{{ __('main.visa') }} <span
                                    style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                            <div class="form-group">
                                <input type="number" step="any" id="modalBillCredit" name="modalBillCredit"
                                       class="form-control"
                                       placeholder="{{ __('main.visa') }}" min="0" required
                                       onblur="leaveModalVisa()"/>
                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-6" style="display: block; margin: 20px auto; text-align: center;">
                            <button type="button"  id="modalPaySumbit" class="btn btn-labeled btn-primary">
                                {{__('main.finish_bill')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div class="show_modal">

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function () {
        $("#canceled_bill").hide();
        $(document).keypress(
            function (event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            });

        $('#pay_prepare').click(function () {

            if(Bill == null) {
                const bill_type = document.getElementById("bill_type").value;
                if (bill_type == 3) {
                    alert($('<div>{{trans('main.wrong_pay_prepare')}}</div>').text());
                } else {
                    let table_id = document.getElementById("table_id").value;
                    if(table_id == 0){
                        let form = document.getElementById("header-form");
                        form.submit();

                        $.ajax({
                            type: 'get',
                            url: 'getLastBill',
                            dataType: 'json',

                            success: function (response) {

                                if (response) {

                                    printKitchenAction(response.id);


                                }
                            }
                        });
                    } else {
                        alert($('<div>{{trans('main.can_not_book_table')}}</div>').text());
                    }



                }
            } else {
                console.log(Bill);
                alert($('<div>{{trans('main.can_not_edit_bill')}}</div>').text());
            }
        });

        $(document).on('click' , '#deleteBill' , function (){
            if (Bill) {
                if(Bill.payed == 0) {
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
                    });
                } else {
                    alert($('<div>{{trans('main.can_not_cancel_payed')}}</div>').text());
                }
            } else {
                alert($('<div>{{trans('main.no_bill_found')}}</div>').text());
            }
        });

        $('#prepare').click(function () {
            if(Bill == null) {
                let bill_type = document.getElementById("bill_type").value;
                console.log(bill_type);
                if (bill_type == 3) {
                    const table_id = document.getElementById('table_id').value;
                    if (table_id > 0) {
                        let form = document.getElementById("header-form");
                        form.submit();
                        //last bill from ajax
                        $.ajax({
                            type: 'get',
                            url: 'getLastBill',
                            dataType: 'json',

                            success: function (response) {
                                console.log(response);
                                if (response) {
                                    printKitchenAction(response.id);

                                }
                            }
                        });

                    } else {
                        alert($('<div>{{trans('main.table_required')}}</div>').text());
                    }
                } else {
                    alert($('<div>{{trans('main.wrong_prepare')}}</div>').text());
                }
            } else {
                if(Bill.billType == 3){
                    if(!Bill.payed){
                        const table_id = document.getElementById('table_id').value;
                        if (table_id > 0) {
                            let form = document.getElementById("header-form");
                            form.submit();
                            //last bill from ajax
                            $.ajax({
                                type: 'get',
                                url: 'getLastBill',
                                dataType: 'json',

                                success: function (response) {
                                    console.log(response);
                                    if (response) {
                                        printKitchenAction(response.id);

                                    }
                                }
                            });

                        } else {
                            alert($('<div>{{trans('main.table_required')}}</div>').text());
                        }
                    } else {
                        alert($('<div>{{trans('main.can_not_edit_paid_bills')}}</div>').text());
                    }

                } else {
                    alert($('<div>{{trans('main.can_not_edit_bill')}}</div>').text());
                }

            }
        });

        $('#modalPaySumbit').click(function (){
            let form = document.getElementById("payment-form");
            form.submit();
            //last bill from ajax
            $.ajax({
                type: 'get',
                url: 'getLastBill',
                dataType: 'json',

                success: function (response) {
                    console.log(response);
                    if(response){
                        printAction(response.id);

                    }
                }
            });
        })

        $('#unpaidBills').click(function () {

            showUnPaidBills();
        });

        $(document).on('click', '.unPaidPay', function (event) {
            $('#paymentsModal').modal('hide');
            $.ajax({
                type: 'get',
                url: 'searchBill' + '/' + this.value,
                dataType: 'json',

                success: function (response) {
                    console.log(response);
                    if (response[0]) {
                        Bill = response[0];
                        PayBillEvent();


                    } else {
                        alert($('<div>{{trans('main.no_search_result')}}</div>').text());
                    }
                }
            });
        });
        $(document).on('click', '.unPaidShow', function (event) {
            $('#paymentsModal').modal('hide');
            $.ajax({
                type: 'get',
                url: 'searchBill' + '/' + this.value,
                dataType: 'json',

                success: function (response) {
                    console.log(response);
                    if (response[0]) {
                        Bill = response[0];
                        setBill();


                    } else {
                        alert($('<div>{{trans('main.no_search_result')}}</div>').text());
                    }
                }
            });

        });
        $(".carousel").on("touchstart", function (event) {

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function (event) {

                var yMove = event.originalEvent.touches[0].pageY;
                if (Math.floor(yClick - yMove) > 1) {
                    $(".carousel").carousel('next');
                } else if (Math.floor(yClick - yMove) < -1) {
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function () {
                $(this).off("touchmove");
            });
        });

        $('.carousel').carousel({
            interval: false,
        });

        $('.carousel .carousel-item').each(function () {
            var minPerSlide = 6;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });




        $(".print_btn").click(function () {

            PrintBill();
        });


        let hall_data = document.getElementById("hall_data");
        hall_data.style.display = "none";
        details = [];

        refresh(1);

        if ($('.bbb_viewed_slider').length) {
            var viewedSlider = $('.bbb_viewed_slider');

            viewedSlider.owlCarousel(
                {
                    loop: false,
                    autoplay: false,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: true,
                    responsive:
                        {
                            0: {items: 1},
                            575: {items: 2},
                            768: {items: 3},
                            991: {items: 4},
                            1230: {items: 5},
                        }
                });

            if ($('.bbb_viewed_prev').length) {
                var prev = $('.bbb_viewed_prev');
                prev.on('click', function () {
                    viewedSlider.trigger('prev.owl.carousel');
                });
            }

            if ($('.bbb_viewed_next').length) {
                var next = $('.bbb_viewed_next');
                next.on('click', function () {
                    viewedSlider.trigger('next.owl.carousel');
                });
            }
        }

        $(document).on('click', '#mediumButton', function (event) {
            event.preventDefault();
            openTables();
        });

        $(document).on('click', '.notAvailable', function (event) {
            const table_id = event.target.id;
            const local = document.getElementById("local").value;
            $.ajax({
                type: 'get',
                url: 'getTableBill' + '/' + table_id,
                dataType: 'json',

                success: function (response) {
                    console.log(response);
                    if (response[0]) {
                        Bill = response[0];
                        var modal_table_bill = document.getElementById('modal_table_bill');
                        modal_table_bill.innerHTML = 'Bill Number :' + response[0].bill_number + '<br>'
                            + 'Table :' + (local == 'ar' ? response[0].table.name_ar : response[0].table.name_en);

                        let identifier = document.getElementById('identifier');
                        identifier.value = Bill.identifier;
                    } else {
                        Bill = null;
                        modal_table_bill.innerHTML = "";
                    }
                    event.preventDefault();
                    let href = $(this).attr('data-attr');
                    $.ajax({
                        url: href
                        , beforeSend: function () {
                            $('#loader').show();
                        },
                        // return the result
                        success: function (result) {
                            $('#smallModal').modal("show");
                            $('#mediumModal').modal("hide");
                        }
                        , complete: function () {
                            $('#loader').hide();
                        }
                        , error: function (jqXHR, testStatus, error) {
                            console.log(error);
                            alert("Page " + href + " cannot open. Error:" + error);
                            $('#loader').hide();
                        }
                        , timeout: 8000
                    })
                }


            });


        });

        $(document).on('click', '.paymentBillButton', function (event) {
            PayBillEvent();
        });
        $(document).on('click', '#partialPayment', function (event) {
            partialPayment();
        });





        $("#keyboard").click(function () {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#shortcutModal').modal("show");
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
        });

        $("#gear").click(function () {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#settingsModal').modal("show");
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
        });

        $(document).keydown(function (event) {
            // event.preventDefault();
            console.log(event.keyCode);
            if (event.keyCode == 107) {
                increaseQnt();
            } else if (event.keyCode == 109) {
                decreaseQnt();
            } else if (event.keyCode == 46) {
                removeItem();
            } else if (event.keyCode == 122) {
                openTables();
            } else if (event.keyCode == 123) {
                cancekOrderEvent();
            } else if (event.keyCode == 113) {
                PrintBill();
            } else if (event.keyCode == 117) {
                PayBillEvent();
            } else if (event.keyCode == 118) {
                event.preventDefault();
                partialPayment();
            } else if (event.keyCode == 119) {
                event.preventDefault();
               showUnPaidBills();
            }
            else if (event.keyCode == 116) {
                event.preventDefault();
                refresh(1);
            }
            else if (event.keyCode == 114) {
                //sumbit
                let form = document.getElementById("header-form");
                form.submit();
            } else if (event.keyCode == 120) {
                //sumbit
                let form = document.getElementById("header-form");
                form.submit();
            }
        });
    });
    $(document).on('click', '#cancelOrder', function (event) {
        event.preventDefault();
        cancekOrderEvent();
    });

    $(document).on('click', '#searchBill', function (event) {
        const val = document.getElementById('val').value;
        console.log(val);
        $.ajax({
            type: 'get',
            url: 'searchBill' + '/' + val,
            dataType: 'json',

            success: function (response) {
                console.log(response);
                if (response[0]) {
                    Bill = response[0];
                    setBill();


                } else {
                    alert($('<div>{{trans('main.no_search_result')}}</div>').text());
                }
            }
        });
    });

    function cancekOrderEvent() {
        if (Bill) {
           if(Bill.payed == 0) {
               let href = $(this).attr('data-attr');
               $.ajax({
                   url: href,
                   beforeSend: function () {
                       $('#loader').show();
                   },
                   // return the result
                   success: function (result) {
                       $('#confirmModal2').modal("show");
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
               });
           } else {
               alert($('<div>{{trans('main.can_not_cancel_payed')}}</div>').text());
           }
        } else {
            alert($('<div>{{trans('main.no_bill_found')}}</div>').text());
        }
    }

    function PrintBill() {
        if (Bill) {
            printAction(Bill.id);
        } else {
            alert('Please Select Bill First');
        }
    }

    function showUnPaidBills() {
        var route = '{{route('getUnpaidBills')}}';
        $.get(route, function (data) {
            console.log(data);
            $(".show_modal").html(data);
            $('#paymentsModal').modal('show');
        });

    }

    function PayBillEvent() {
        if (Bill) {
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
            alert($('<div>{{trans('main.can_not_pay_before_save')}}</div>').text());
        }
    }

    function partialPayment(){
        if (Bill) {
            if (Bill.payed == 0) {

                var route = '{{route('partialPayment' , ':id')}}';
                route = route.replace(':id', Bill.id);
                $.get(route, function (data) {
                    $(".show_modal").html(data);
                    $('#paymentsModal').modal('show');
                });
            }else {
                // bill is payed
                alert($('<div>{{trans('main.bill_payed_alredy')}}</div>').text());
            }
        } else {
            alert($('<div>{{trans('main.can_not_pay_before_save')}}</div>').text());
        }
    }



    function cancelOrder() {
        let url = "{{ route('cancelOrder', ':id') }}";
        url = url.replace(':id', Bill.id);
        document.location.href = url;
    }
    function DeleteBillAction() {
        let url = "{{ route('delteBill', ':id') }}";
        url = url.replace(':id', Bill.id);
        document.location.href = url;
    }

    function printAction(id) {
        let url = "{{ route('printAction', ':id') }}";
        url = url.replace(':id', id);
        window.open(url, "_blank",);
    }
    function printKitchenAction(id) {
        let url = "{{ route('PrintActionKitchen', ':id') }}";
        url = url.replace(':id', id);
       window.open(url, "_blank",);
    }

    function openTables() {
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                $('#mediumModal').modal( {backdrop: 'static', keyboard: false});
                $('#mediumModal').modal( 'show');
             //   $(".modal-body #modal-flters li:first-child");


                const hall0 = document.getElementById('hall0').value ;
                selectHall($(".modal-body #modal-flters li:first-child").get(0) , hall0);
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
    }

    function fillPaymentModal() {

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
        const modalBillTax = document.getElementById('modalBillTax');
        const modalBillService = document.getElementById('modalBillService');
        const modalBillpaid = document.getElementById('modalBillpaid');



        if (Bill) {
            modalBillId.value = Bill.id;
            modalBillNo.value = Bill.bill_number;
            if (Bill.table) {
                modalTableHall.value = local == 'ar' ? (Bill.table.name_ar + '--' + Bill.table.hall.name_ar) :
                    (Bill.table.name_en + '--' + Bill.table.hall.name_en);
                modalTableId.value = Bill.table.id;
            } else {
                modalTableId.value = 0;
            }

            var selected = new Array();
            $('#details input[type="checkbox"]:checked').each(function() {
                selected.push($(this).closest("tr")[0].cells[10].children[0].value);
            });

         if(true){
             var per = (Bill.discount / (Number(Bill.net) + Number(Bill.discount))) * 100;
             modalBillTotal.value = Bill.total ;
             modalBillTax.value = Bill.vat;

             if (Bill.billType > 1) {
                 modalBillService.value = Bill.serviceVal;
             } else {
                 modalBillService.value = Bill.delivery_service;

             }

             modalBillDiscountPer.value = per;
             modalBillDiscount.value = Bill.discount;
             modalBillNet.value = Bill.net;
             modalBillpaid.value = ( Number (Bill.cash) + Number(Bill.credit));
             modalBillCash.value =  Number(Bill.net)  -  ( Number (Bill.cash) + Number(Bill.credit)) ;
             modalBillCredit.value = 0;
         } else {
             // const net = selected.reduce(( partialSum,  a) =>  Number(partialSum)  + Number(a) , 0);
             // const vat = Bill.total / Bill.vat ;
             // const total = net(1 + (vat / 100)) ;
             // modalBillDiscountPer.value = 0;
             // modalBillDiscount.value = 0;
             // modalBillNet.value = net;
             // modalBillCash.value = net ;
             // modalBillCredit.value = 0;
             // modalBillTotal.value = total ;
             // modalBillTax.value = Number(net)  - Number(total) ;
             //
             //
             // console.log(net);

         }



        }

        $('#modalBillCash').keyup(function () {
            const total = document.getElementById('modalBillTotal').value;
            const cash = document.getElementById('modalBillCash').value;
            const visa = total - cash;
            console.log(cash);
            document.getElementById('modalBillCredit').value = visa;
        });
        $('#modalBillCash').change(function () {
            const total = document.getElementById('modalBillTotal').value;
            const cash = document.getElementById('modalBillCash').value;
            const visa = total - cash;
            console.log(cash);
            document.getElementById('modalBillCredit').value = visa;
        });


        $('#modalBillCredit').keyup(function () {
            const total = document.getElementById('modalBillNet').value;
            const paid = document.getElementById('modalBillpaid').value;
            const visa = document.getElementById('modalBillCredit').value;
            const cash = Number(total) - Number(paid) - Number(visa);
            document.getElementById('modalBillCash').value = cash;
        });
        $('#modalBillCredit').change(function () {
            const total = document.getElementById('modalBillNet').value;
            const paid = document.getElementById('modalBillpaid').value;
            const visa = document.getElementById('modalBillCredit').value;
            const cash = Number(total) - Number(paid) - Number(visa);
            document.getElementById('modalBillCash').value = cash;
        });
    }

    function calculateModalDiscount() {
        const modalBillTotal = document.getElementById('modalBillTotal');
        const modalBillDiscountPer = document.getElementById('modalBillDiscountPer');
        var modalBillDiscount = document.getElementById('modalBillDiscount');
        const modalBillNet = document.getElementById('modalBillNet');
        const modalBillCash = document.getElementById('modalBillCash');
        const modalBillCredit = document.getElementById('modalBillCredit');
        const modalBillTax = document.getElementById('modalBillTax');
        const modalBillService = document.getElementById('modalBillService');
        const modalBillNetTax = document.getElementById('modalBillNetTax');


        var total = modalBillTotal.value;
        var vat = modalBillTax.value;
        var service = modalBillService.value ;

        total = Number(total ) + Number(vat) + Number(service);
        var per = modalBillDiscountPer.value;
        var discount = total * (per / 100);
        var net = Number(total) - Number(discount);
        var vatAfter = 0;
        vatAfter = vat - (vat * (per / 100)) ;

        modalBillDiscount.value = discount.toFixed("2");
        modalBillNet.value = net.toFixed("2");
        modalBillCash.value = net.toFixed("2");
        modalBillCredit.value = 0;
        modalBillNetTax.value = vatAfter ;
    }

    function calculateModalDiscountPer() {
        const modalBillTotal = document.getElementById('modalBillTotal');
        const modalBillDiscountPer = document.getElementById('modalBillDiscountPer');
        var modalBillDiscount = document.getElementById('modalBillDiscount');
        const modalBillNet = document.getElementById('modalBillNet');
        const modalBillCash = document.getElementById('modalBillCash');
        const modalBillCredit = document.getElementById('modalBillCredit');
        const modalBillTax = document.getElementById('modalBillTax');
        const modalBillService = document.getElementById('modalBillService');
        const modalBillNetTax = document.getElementById('modalBillNetTax');


        var total = modalBillTotal.value;
        var discount = modalBillDiscount.value;
        var vat = modalBillTax.value;
        var service = modalBillService.value ;

        total = Number(total ) + Number(vat) + Number(service);


        var per = (discount / total) * 100;
        var net = Number(total) - Number(discount);

        var vatAfter = 0;
        vatAfter = vat - (vat * (per / 100)) ;

        modalBillDiscountPer.value = per.toFixed("2");
        modalBillNet.value = net.toFixed("2");
        modalBillCash.value = net.toFixed("2");
        modalBillCredit.value = 0;
        modalBillNetTax.value = vatAfter ;
    }

    function leaveModalDiscount(){
        var modalBillDiscount = document.getElementById('modalBillDiscount');
        if(!modalBillDiscount.value){
            modalBillDiscount.value = 0 ;
        }
    }
    function leaveModalDiscountPer(){
        var modalBillDiscountPer = document.getElementById('modalBillDiscountPer');
        if(!modalBillDiscountPer.value){
            modalBillDiscountPer.value = 0 ;
        }
    }
    function leaveModalVisa(){
        var modalBillCredit = document.getElementById('modalBillCredit');
        if(!modalBillCredit.value){
            modalBillCredit.value = 0 ;
        }
    }

    function selecCategory(element, id) {
        const collection = document.getElementsByClassName("selected-cat");
        let add = 0;
        if (element.classList.contains("selected-cat")) {
            add = 0;
        } else {
            add = 1;
        }
        if (collection) {
            for (let item of collection) {
                item.classList.remove("selected-cat");
            }

        }
        if (add == 1)
            element.classList.add("selected-cat");


        var x, i;
        id = '.' + id;
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

    function selecItemSize(size, item) {
        const local = document.getElementById("local").value;
        var table = document.getElementById("details-body");
        var repeate = document.getElementById('details-body-tr' + size.id);
        console.log(repeate);
        if (!repeate) {

            AddItemToTable(size, item);
            calculateTotal();
        } else {

            const table = document.getElementById("details");
            var checkBoxes = table.getElementsByTagName("INPUT");
            for (let item of checkBoxes) {
                item.checked = false;
            }

            var tds = repeate.getElementsByTagName('td');
            var check = tds[13];

            var checkBox = check.getElementsByTagName("input")[0];
            checkBox.checked = true;
            increaseQnt();
            checkBox.checked = false;
        }
    }

    function AddItemToTable(size, item) {
        var table = document.getElementById("details-body");

        var row = table.insertRow(-1);

        let obj = {
            'item_id': item.id,
            'size_id': size.size.id,
            'item_size_id': size.id,
            'qnt': 1,
            'price': size.price,
            'priceWithVat': size.priceWithAddValue,
            'total': size.price,
            'totalWithVat': size.priceWithAddValue,
            'isExtra': 0,
            'extra_item_id': 0,
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
        var cell15 = row.insertCell(15);

        cell2.hidden = true;
        cell3.hidden = true;
        cell4.hidden = true;
        cell5.hidden = true;
        cell50.hidden = true;
        cell11.hidden = true;
        cell12.hidden = true;
        cell14.hidden = true;
        cell15.hidden = true;


        cell1.innerHTML = details.length;
        cell2.innerHTML = item.id + '<input name="item_id[]" value="' + item.id + '" hidden>';
        cell3.innerHTML = size.size.id + '<input name="size_id[]" value="' + size.size.id + '" hidden>';
        cell4.innerHTML = size.id + '<input name="item_size_id[]" value="' + size.id + '" hidden>';
        cell5.innerHTML = "0";
        cell50.innerHTML = "0" + '<input name="isExtra[]" value="0" hidden>';
        cell6.innerHTML = local == 'ar' ? item.name_ar : item.name_en;
        cell7.innerHTML = size.size.label;
        cell8.innerHTML = "1" + '<input name="qnt[]" value="1" hidden>';
        cell9.innerHTML = size.priceWithAddValue + '<input name="priceWithVat[]" value="' + size.priceWithAddValue + '" hidden>';
        cell10.innerHTML = size.priceWithAddValue + '<input name="totalWithVat[]" value="' + size.priceWithAddValue + '" hidden>';
        cell11.innerHTML = size.price + '<input name="price[]" value="' + size.price + '" hidden>';
        cell12.innerHTML = size.price + '<input name="totalTable[]" value="' + size.price + '" hidden>';

        cell14.innerHTML = 0 + '<input name="extra_item_id[]" value="0" hidden>';
        cell15.innerHTML = 0 + '<input name="category_id[]" value="' + item.category_id + '" hidden>';

        cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
    }


    function selectExtra(item) {
        if (details.length > 0) {
            var table = document.getElementById("details-body");
            var repeate = document.getElementById('details-body-tr-extra' + item.id);
            const local = document.getElementById("local").value;
            if (!repeate) {
                AddExtraToTable(item);
                calculateTotal();
            } else {

                const table = document.getElementById("details");
                var checkBoxes = table.getElementsByTagName("INPUT");
                for (let item of checkBoxes) {
                    item.checked = false;
                }
                var tds = repeate.getElementsByTagName('td');
                var check = tds[13];

                var checkBox = check.getElementsByTagName("input")[0];
                checkBox.checked = true;
                increaseQnt();
                checkBox.checked = false;
            }
        } else {
            alert($('<div>{{trans('main.add_item_first')}}</div>').text());
        }

    }

    function AddExtraToTable(item) {
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
        var cell15 = row.insertCell(15);
        cell2.hidden = true;
        cell3.hidden = true;
        cell4.hidden = true;
        cell5.hidden = true;
        cell50.hidden = true;
        cell11.hidden = true;

        cell12.hidden = true;
        cell14.hidden = true;
        cell15.hidden = true;

        cell1.innerHTML = "";
        cell1.style.background = "#E8E8F2";
        cell2.innerHTML = item.id + '<input name="item_id[]" value="' + item.id + '" hidden>';
        cell3.innerHTML = item.sizes[0].size_id + '<input name="size_id[]" value="' + item.sizes[0].size_id + '" hidden>';
        cell4.innerHTML = item.sizes[0].id + '<input name="item_size_id[]" value="' + item.sizes[0].id + '" hidden>';

        cell5.innerHTML = "0";
        cell50.innerHTML = "1" + '<input name="isExtra[]" value="1" hidden>';
        cell6.innerHTML = local == 'ar' ? item.name_ar : item.name_en;
        cell7.innerHTML = "---";
        cell8.innerHTML = "1" + '<input name="qnt[]" value="1" hidden>';
        cell9.innerHTML = item.sizes[0].priceWithAddValue + '<input name="priceWithVat[]" value="' + item.sizes[0].priceWithAddValue + '" hidden>';
        cell10.innerHTML = item.sizes[0].priceWithAddValue + '<input name="totalWithVat[]" value="' + item.sizes[0].priceWithAddValue + '" hidden>';
        cell11.innerHTML = item.sizes[0].price + '<input name="price[]" value="' + item.sizes[0].price + '" hidden>';
        cell12.innerHTML = item.sizes[0].price + '<input name="totalTable[]" value="' + item.sizes[0].price + '" hidden>';
        cell14.innerHTML = details[details.length - 1].item_size_id + '<input name="extra_item_id[]" value="' + details[details.length - 1].item_size_id + '" hidden>';
        cell15.innerHTML = 0 + '<input name="category_id[]" value="' + item.category_id + '" hidden>';

        cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
        row.style.background = "cornflowerblue";
        row.style.color = "white";
    }

    function rowCheckChange(ele) {
        console.log(ele.checked);
        const table = document.getElementById("details");
        var checkBoxes = table.getElementsByTagName("INPUT");
        for (let item of checkBoxes) {
            if (item != ele)
                item.checked = false;
        }
    }

    function selectBillType(element, i) {
        const collection = document.getElementsByClassName("filter-active");
        let add = 0;
        if (element.classList.contains("filter-active")) {
            add = 0;
        } else {
            add = 1;
        }
        if (collection) {
            for (let item of collection) {
                item.classList.remove("filter-active");
            }

        }
        if (add == 1)
            element.classList.add("filter-active");

        let driver_data = document.getElementById("driver_data");
        let hall_data = document.getElementById("hall_data");
        let bill_type = document.getElementById("bill_type");
        let mediumButton = document.getElementById("mediumButton");
        bill_type.value = i;
        if (i == 1) {
            driver_data.style.display = "block";
        } else {
            driver_data.style.display = "none";
        }
        if (i == 3 ) {
            // mediumButton.style.display = "block";
            hall_data.style.display = "block";
        } else {
            // mediumButton.style.display = "none";
            hall_data.style.display = "none";
        }

        let total = 0;

        const table = document.getElementById("details");
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

    function calculateTotal() {

        const table = document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var total = 0;
        var totalWithoutVat = 0;
        var service = 0;
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

        if (totalEl && discountEl && vatEl && netEl) {
            let discount = discountEl.value;
            let vat = Number(total) - Number(totalWithoutVat);
            let net = Number(total) - Number(discount) + Number(service);
            totalEl.value = totalWithoutVat;
            vatEl.value = vat;
            netEl.value = net;

        }
    }

    function handleService(total) {
        var service = 0, servicePer = 0;
        let bill_type = document.getElementById("bill_type").value;
        const delivery_service = document.getElementById("delivery_service").value;
        const serviceEl = document.getElementById("service");
        const serviceVal = document.getElementById("serviceVal");
        if (Number(total) > 0) {
            if (bill_type == 1) {
                service = delivery_service;
                servicePer = 0;
            } else if (bill_type == 2) {
                service = 0;
                servicePer = 0;
            } else {
                servicePer = serviceEl.value;

                service = (Number(total) * (Number(servicePer) / 100)).toFixed(2);
            }
        } else {
            service = 0;
            servicePer = 0;
        }
        if (!Bill) {
            serviceVal.value = service;
        }

        return service;
    }

    function increaseQnt() {
        const table = document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var target;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[13];
            var checkBox = td.getElementsByTagName("input")[0];
            if (checkBox.checked) {
                target = item;
                break;
            }
        }

        var qntTd = target.getElementsByTagName("td")[8];
        var qntInp = qntTd.getElementsByTagName("input")[0];
        var oldQnt = qntInp.value;
        var qnt = Number(oldQnt) + 1;
        qntTd.innerHTML = qnt + '<input name="qnt[]" value="' + qnt + '" hidden>';


        var idTd = target.getElementsByTagName("td")[3];
        var id = idTd.innerHTML;

        if (details.filter(c => c.item_size_id == id).length > 0) {
            details.filter(c => c.item_size_id == id)[0].qnt = qnt;
        }


        var priceTd = target.getElementsByTagName("td")[9];
        var price2Td = target.getElementsByTagName("td")[11];
        var priceInp = priceTd.getElementsByTagName("input")[0];
        var price2Inp = price2Td.getElementsByTagName("input")[0];

        var price = priceInp.value;
        var price2 = price2Inp.value;

        var totalTd = target.getElementsByTagName("td")[10];
        var total2Td = target.getElementsByTagName("td")[12];


        var total = Number(price) * Number(qnt);
        var total2 = Number(price2) * Number(qnt);
        totalTd.innerHTML = total + '<input name="totalWithVat[]" value="' + total + '" hidden>';
        total2Td.innerHTML = total2 + '<input name="totalTable[]" value="' + total2 + '" hidden>';

        calculateTotal();

    }

    function decreaseQnt() {
        const table = document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var target;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            var td = item.getElementsByTagName("td")[13];
            var checkBox = td.getElementsByTagName("input")[0];
            if (checkBox.checked) {
                target = item;
                break;
            }
        }
        var qntTd = target.getElementsByTagName("td")[8];
        var qntInp = qntTd.getElementsByTagName("input")[0];
        var oldQnt = qntInp.value;
        if (oldQnt > 1) {
            var qnt = Number(oldQnt) - 1;
            qntTd.innerHTML = qnt + '<input name="qnt[]" value="' + qnt + '" hidden>';


            var idTd = target.getElementsByTagName("td")[3];
            var id = idTd.innerHTML;

            if (details.filter(c => c.item_size_id == id).length > 0) {
                details.filter(c => c.item_size_id == id)[0].qnt = qnt;
            }


            var priceTd = target.getElementsByTagName("td")[9];
            var price2Td = target.getElementsByTagName("td")[11];
            var priceInp = priceTd.getElementsByTagName("input")[0];
            var price2Inp = price2Td.getElementsByTagName("input")[0];

            var price = priceInp.value;
            var price2 = price2Inp.value;

            var totalTd = target.getElementsByTagName("td")[10];
            var total2Td = target.getElementsByTagName("td")[12];


            var total = Number(price) * Number(qnt);
            var total2 = Number(price2) * Number(qnt);
            totalTd.innerHTML = total + '<input name="totalWithVat[]" value="' + total + '" hidden>';
            total2Td.innerHTML = total2 + '<input name="totalTable[]" value="' + total2 + '" hidden>';


            calculateTotal();
        }
    }

    function removeItem() {
        const table = document.getElementById("details");
        var tbodys = table.getElementsByTagName("tbody");
        var tbody = tbodys[0];
        var target;
        var index = 0;
        var trs = tbody.getElementsByTagName("tr");
        for (let item of trs) {
            index += 1;
            var td = item.getElementsByTagName("td")[13];
            var checkBox = td.getElementsByTagName("input")[0];
            if (checkBox.checked) {
                target = item;
                break;
            }
        }
        if (target) {
            var ExtrasToBeDelete = [];
            var targetTD = target.getElementsByTagName("td")[5];
            var targetIsExtra = targetTD.getElementsByTagName("input")[0].value;
            if (targetIsExtra == 0) {
                //this is item look for exrtras
                for (let item of trs) {
                    if (item.rowIndex > index) {
                        var td = item.getElementsByTagName("td")[5];
                        var extra = td.getElementsByTagName("input")[0].value;
                        if (extra == 1) {
                            ExtrasToBeDelete.push(item);
                            var idd = target.getElementsByTagName("td")[3].innerHTML;
                            if (details.filter(c => c.item_size_id == idd).length > 0) {
                                details.splice(details.indexOf(details.filter(c => c.item_size_id == idd)[0]), 1);
                            }

                        } else {
                            break;
                        }
                    }
                }
            }

            for (let ex of ExtrasToBeDelete) {
                table.deleteRow(ex.rowIndex);
            }
            console.log(ExtrasToBeDelete);
            ExtrasToBeDelete = [];
            var idTd = target.getElementsByTagName("td")[3];
            var id = idTd.innerHTML;

            if (details.filter(c => c.item_size_id == id).length > 0) {
                details.splice(details.indexOf(details.filter(c => c.item_size_id == id)[0]), 1);
            }

            table.deleteRow(target.rowIndex);
            calculateTotal();
        }
    }

    function selectHall(element, id) {

        const collection = document.getElementsByClassName("model-filter-active");
        let add = 0;
        if (element.classList.contains("model-filter-active")) {
            add = 0;
        } else {
            add = 1;
        }
        if (collection) {
            for (let item of collection) {
                item.classList.remove("model-filter-active");
            }

        }
        if (add == 1)
            element.classList.add("model-filter-active");


        var x, i;
        id = '.' + id;
        x = document.getElementsByClassName("table-div");
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(id) > -1) w3AddClass(x[i], "show");
        }
    }

    function calculateDeliveryService() {
        var value = document.getElementById('delivery_service').value;
        document.getElementById('serviceVal').value = value;
        calculateTotal();
    }

    function selectTable(element, table) {
        if (table.available == 1) {
            // select table
            const collection = document.getElementsByClassName("selected_table");
            let add = 0;
            if (element.classList.contains("selected_table")) {
                add = 0;
            } else {
                add = 1;
            }
            if (collection) {
                for (let item of collection) {
                    item.classList.remove("selected_table");
                }

            }
            const table_id = document.getElementById('table_id');
            const table_name = document.getElementById('table_name');
            if (add == 1) {
                element.classList.add('selected_table');
                table_id.value = table.id;
                table_name.value = table.hall.name_ar + "--" + table.name_ar;

            } else {
                table_id.value = 0;
                table_name.value = "";
            }
            console.log( table_id.value );

        } else {
            // table is not available
            //alert($('<div>{{trans('main.table_not_available')}}</div>').text());
        }

        $('#mediumModal').modal( 'hide');
    }

    function refresh(i) {
        const client_id = document.getElementById("client_id");
        const phone = document.getElementById("phone");
        const address = document.getElementById("address");
        const driver_id = document.getElementById("driver_id");
        const delivery_service = document.getElementById("delivery_service");
        const service = document.getElementById("service");
        const table_name = document.getElementById("table_name");
        const table_id = document.getElementById("table_name");
        const bill_number = document.getElementById("bill_number");
        const default_type = document.getElementById("default_type");
        let identifier = document.getElementById('identifier');

        document.getElementById('cash').value = '0';
        document.getElementById('credit').value = '0';
        document.getElementById('bank').value = '0';
        document.getElementById('serviceVal').value = '0';

        identifier.value = "";
        document.getElementById('val').value = '';
        document.getElementById('table_id').value = 0;
        details = [];
        if (i == 1) {
            Bill = null;
        }

        let bill_type = document.getElementById("bill_type");
        bill_type.value = 1;


        client_id.selectedIndex = "0";
        table_name.value = "";
        table_id.value = "0";
        phone.value = "";
        address.value = "";
        driver_id.selectedIndex = "0";
         var ele ;
        $.ajax({
            type: 'get',
            url: 'getVats',
            dataType: 'json',

            success: function (response) {
                if (response) {
                    console.log(response);

                    if(!Bill) {
                        if (response.bill_type == 1) {
                            ele = document.getElementById("default_type");
                        } else if (response.bill_type == 2) {
                            ele = document.getElementById("default_type2");
                        } else if (response.bill_type == 3) {
                            ele = document.getElementById("default_type3");
                        } else if (response.bill_type == 4) {
                            ele = document.getElementById("default_type4");
                        }
                        if (ele.classList.contains('filter-active'))
                            ele.classList.remove('filter-active');

                        selectBillType(ele, response.bill_type);

                    }


                    if (!Bill) {
                        delivery_service.value = response.delivery_service;
                        service.value = response.service;
                    }


                } else {
                    if (default_type.className.indexOf("filter-active") == -1) {
                        selectBillType(default_type, response.bill_type);
                    }

                    delivery_service.value = "";
                    service.value = "";
                }
            }
        });

        if (i == 1) {
            $.ajax({
                type: 'get',
                url: 'getBillNo',
                dataType: 'json',

                success: function (response) {
                    console.log(response);

                    if (response) {
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
        if (totalEl && discountEl && vatEl && netEl) {
            totalEl.value = 0;
            discountEl.value = 0;
            vatEl.value = 0;
            netEl.value = 0;
            serviceVal.value = 0;
            date.value = new Date().toLocaleString();
            $("#details tbody tr").remove();


        }
    }

    function selectClient() {
        const client_id = document.getElementById("client_id").value;
        $.ajax({
            type: 'get',
            url: 'getClient' + '/' + client_id,
            dataType: 'json',

            success: function (response) {
                if (response) {
                    document.getElementById("phone").value = response.mobile ? response.mobile :
                        (response.phone ? response.phone : "");
                    document.getElementById("address").value = response.address ? response.address : "";
                    document.getElementById("client_name").value = response.name_ar + '--' + response.name_en;
                } else {
                    document.getElementById("client_id").selectedIndex = 0;
                    document.getElementById("phone").value = "";
                    document.getElementById("address").value = "";
                    document.getElementById("client_name").value = "";
                }
            }
        });
    }

    function selectDriver() {
        const driver_id = document.getElementById("driver_id").value;
        $.ajax({
            type: 'get',
            url: 'getDriver' + '/' + driver_id,
            dataType: 'json',

            success: function (response) {
                console.log(response);
                if (response) {
                    document.getElementById("driver_name").value = response.name_ar + '--' + response.name_en;
                } else {
                    document.getElementById("driver_name").value = "";
                }
            }
        });
    }


    function setBillDetailsItem(detail) {
        var table = document.getElementById("details-body");

        var row = table.insertRow(-1);

        let obj = {
            'item_id': detail.items[0].item_id,
            'size_id': detail.items[0].size_id,
            'item_size_id': detail.items[0].id,
            'qnt': detail.qnt,
            'price': detail.price,
            'priceWithVat': detail.priceWithVat,
            'total': detail.total,
            'totalWithVat': detail.totalWithVat,
            'isExtra': 0,
            'extra_item_id': 0,
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
        var cell15 = row.insertCell(14);


        cell2.hidden = true;
        cell3.hidden = true;
        cell4.hidden = true;
        cell5.hidden = true;
        cell50.hidden = true;
        cell11.hidden = true;
        cell12.hidden = true;
        cell14.hidden = true;
        cell15.hidden = true;

        cell1.innerHTML = details.length;
        cell2.innerHTML = detail.items[0].item_id + '<input name="item_id[]" value="' + detail.items[0].item_id + '" hidden>';
        cell3.innerHTML = detail.items[0].size_id + '<input name="size_id[]" value="' + detail.items[0].size_id + '" hidden>';
        cell4.innerHTML = detail.items[0].id + '<input name="item_size_id[]" value="' + detail.items[0].id + '" hidden>';
        cell5.innerHTML = detail.id + '<input name="detail_id[]" value="' + detail.id + '" hidden>';
        cell50.innerHTML = "0" + '<input name="isExtra[]" value="0" hidden>';
        cell6.innerHTML = local == 'ar' ? detail.items[0].item.name_ar : detail.items[0].item.name_en;
        cell7.innerHTML = detail.items[0].size.label;
        cell8.innerHTML = detail.qnt + '<input name="qnt[]" value="' + detail.qnt + '" hidden>';
        cell9.innerHTML = detail.priceWithVat + '<input name="priceWithVat[]" value="' + detail.priceWithVat + '" hidden>';
        cell10.innerHTML = detail.totalWithVat + '<input name="totalWithVat[]" value="' + detail.totalWithVat + '" hidden>';
        cell11.innerHTML = detail.price + '<input name="price[]" value="' + detail.price + '" hidden>';
        cell12.innerHTML = detail.total + '<input name="totalTable[]" value="' + detail.total + '" hidden>';

        cell14.innerHTML = 0 + '<input name="extra_item_id[]" value="0" hidden>';
        cell15.innerHTML = 0 + '<input name="category_id[]" value="' + detail.category_id + '" hidden>';
        cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
    }

    function setBillDetailsExtra(detail) {
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
        cell2.innerHTML = detail.items[0].item_id + '<input name="item_id[]" value="' + detail.items[0].item_id + '" hidden>';
        cell3.innerHTML = detail.items[0].size_id + '<input name="size_id[]" value="' + detail.items[0].size_id + '" hidden>';
        cell4.innerHTML = detail.items[0].id + '<input name="item_size_id[]" value="' + detail.items[0].id + '" hidden>';
        ;
        cell5.innerHTML = detail.id + '<input name="detail_id[]" value="' + detail.id + '" hidden>';
        cell50.innerHTML = "1" + '<input name="isExtra[]" value="1" hidden>';
        cell6.innerHTML = local == 'ar' ? detail.items[0].item.name_ar : detail.items[0].item.name_en;
        cell7.innerHTML = "---";
        cell8.innerHTML = detail.qnt + '<input name="qnt[]" value="' + detail.qnt + '" hidden>';
        cell9.innerHTML = detail.priceWithVat + '<input name="priceWithVat[]" value="' + detail.priceWithVat + '" hidden>';
        cell10.innerHTML = detail.totalWithVat + '<input name="totalWithVat[]" value="' + detail.totalWithVat + '" hidden>';
        cell11.innerHTML = detail.price + '<input name="price[]" value="' + detail.price + '" hidden>';
        cell12.innerHTML = detail.total + '<input name="totalTable[]" value="' + detail.total + '" hidden>';

        cell14.innerHTML = details[details.length - 1].item_size_id + '<input name="extra_item_id[]" value="' + details[details.length - 1].item_size_id + '" hidden>';
        cell13.innerHTML = `<td><input type="checkbox" name="myTextEditBox" value="checked" onchange="rowCheckChange(this)"/> </td>`;
        row.style.background = "cornflowerblue";
        row.style.color = "white";
    }

    function setBill() {
        refresh(0);
        if (Bill) {

            if(Bill.state == 3){
                $("#canceled_bill").show();
                $('#controls .btn').attr('disabled' , true);

            } else {
                $("#canceled_bill").hide();
                $('#controls .btn').attr('disabled' , false);
            }


            var elem = null;

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
            let delivery_service = document.getElementById('delivery_service');

            console.log(Bill.billType);
            identifier.value = Bill.identifier;
            bill_type.value = Bill.billType;
            if (Bill.billType == 1) {
                elem = document.getElementById("default_type");
            } else if (Bill.billType == 2) {
                elem = document.getElementById("default_type2");
            } else if (Bill.billType == 3) {
                elem = document.getElementById("default_type3");
            } else if (Bill.billType == 4) {
                elem = document.getElementById("default_type4");
            }
            if (elem.classList.contains('filter-active'))
                elem.classList.remove('filter-active');
            console.log(Bill.billType);
            selectBillType(elem, Bill.billType);

            client_id.value = Bill.client_id;
            phone.value = Bill.phone;
            address.value = Bill.address;
            if (Bill.driver_id > 0) {
                driver_id.value = Bill.driver_id;
            }
            if (Bill.table_id > 0) {
                table_id.value = Bill.table_id;
                table_name.value = Bill.table.hall.name_ar + "--" + Bill.table.name_ar;

            } else {
                table_id.value = 0;
                table_name.value = "";
            }
            date.value = new Date(Bill.bill_date).toLocaleString();
            bill_number.value = Bill.bill_number;
            total.value = Bill.total;
            vat.value = Bill.vat;
            if (Bill.billType > 1) {
                serviceVal.value = Bill.serviceVal;
            } else {
                delivery_service.value = Bill.delivery_service;
                serviceVal.value = Bill.delivery_service;
            }
            discount.value = Bill.discount;
            net.value = Bill.net;
            cash.value = Bill.cash;
            credit.value = Bill.credit;
            bank.value = Bill.bank;


            for (let i = 0; i < Bill.details.length; i++) {
                if (Bill.details[i].isExtra == 0) {
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
