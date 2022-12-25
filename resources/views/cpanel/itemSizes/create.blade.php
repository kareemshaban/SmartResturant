<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Smart Resturant</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../cpanel/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <!-- Custom CSS -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link href="../../cpanel/css/style.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../public/fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../public/fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'icomoon';
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
        @include('Layouts.cheader')
        @include('Layouts.subheader', [
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'أحجام الصنف': 'Item Sizes',
        ])
        <div class="container-fluid">
            <form class="center" method="POST" action="{{ route('storeItemSize') }}" enctype="multipart/form-data">

                <div class="row justify-content-center">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="col-md-9 col-xl-7 data-entry">
                        <div class="card-header px-0 mt-2 bg-transparent clearfix">
                            <h4 class="float-left pt-2">{{ __('main.new_size') }}</h4>
                            <div class="float-right card-header-actions mr-1">
                               <button type="submit" class="btn btn-labeled btn-primary " form="header-form" >
                                    <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                            </div>
                        </div>
                        @include('flash-message')

                        <div class="card-body px-0">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>{{ __('main.item') }}</label>
                                        <input type="text" class="form-control"
                                               value="{{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item ->name_en}}" disabled/>
                                    </div>
                                    <div class="col-6">
                                        <label>{{ __('main.isAddValue') }}</label>

                                        <input type="text" class="form-control"
                                               value="{{ $item -> addValue  }} %" disabled/>
                                        <input type="text" class="form-control" id="addValue"
                                               value="{{ $item -> addValue  }}" hidden/>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <label>{{ __('main.size') }}</label>
                                <select class="custom-select mr-sm-2 @error('size_id') is-invalid @enderror"
                                    name="size_id" id="size_id"  onchange="getLevel()">
                                    <option selected value="">Choose...</option>
                                   @foreach ($sizes as $item)
                                   <option value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                  <input type="text" name="item_id" id="item_id" hidden
                                  value="{{ $itemId }}"/>
                                  @error('size_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                             <div class="row">
                                <div class="col-6">
                                    <label>{{ __('main.level') }}</label>
                                    <input type="number" name="level" id="level"
                                        class="form-control @error('level') is-invalid @enderror"
                                        placeholder="{{ __('main.level') }}" autofocus readonly/>
                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>{{ __('main.transform') }}</label>
                                    <input type="number" step="any" name="transformFactor" id="transformFactor"
                                        class="form-control @error('transformFactor') is-invalid @enderror"
                                        placeholder="{{ __('main.transform') }}" autofocus />
                                    @error('transformFactor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                             </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                   <div class="col-6">
                                       <label>{{ __('main.price') }}</label>
                                       <input type="number" step="any" name="price" id="price"
                                           class="form-control @error('price') is-invalid @enderror"
                                           placeholder="{{ __('main.price') }}" autofocus
                                              onkeyup="getPriceWithAddValue()"
                                              onchange="getPriceWithAddValue()"/>
                                       @error('price')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>

                                    <div class="col-6">
                                        <label>{{ __('main.priceWithAddValue') }}</label>
                                        <input type="number" step="any" name="priceWithAddValue" id="priceWithAddValue"
                                               class="form-control @error('priceWithAddValue') is-invalid @enderror"
                                               placeholder="{{ __('main.priceWithAddValue') }}" autofocus  readonly/>
                                        @error('priceWithAddValue')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>


                                </div>


                               </div>


                        </div>
                    </div>

                </div>


        </form>

    </div>
    </div>

   <script type="text/javascript">

       $(document).ready(function() {
          let price = document.getElementById("price");
           let priceWithAddValue = document.getElementById("priceWithAddValue");
          if(price){
              price.value = "" ;
          }
           if(priceWithAddValue){
               priceWithAddValue.value = "" ;
           }


       });

       function getPriceWithAddValue(){
           let priceVal = 0 , priceWithAddValueVal = 0 , addValueVal = 0 ;
           let price = document.getElementById("price");
           let priceWithAddValue = document.getElementById("priceWithAddValue");
           let addValue = document.getElementById("addValue");
           if(price && priceWithAddValue && addValue){
               priceVal = price.value ;
               addValueVal = (addValue.value / 100 )* priceVal;
               priceWithAddValueVal = Number(priceVal) + Number(addValueVal) ;
               priceWithAddValue.value = priceWithAddValueVal ;
               console.log(addValueVal);
               console.log(priceVal);
           }
       }
       function getLevel(){

           let select = document.getElementById("size_id");
           let level = document.getElementById("level");
           console.log(select);
           console.log(level);
           if(select && level){

               console.log(select.selectedIndex);
               level.value = select.selectedIndex ;
           }
       }
   </script>

    <script src="../../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../cpanel/js/app-style-switcher.js"></script>
    <script src="../../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../../cpanel/js/waves.js"></script>
    <script src="../../cpanel/js/sidebarmenu.js"></script>
    <script src="../../cpanel/js/custom.js"></script>
</body>
