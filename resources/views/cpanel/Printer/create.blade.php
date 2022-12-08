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
<link rel="icon" type="image/png" sizes="16x16" href="../cpanel/plugins/images/favicon.png">
<!-- Custom CSS -->
<!-- Custom CSS -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    <link href="../cpanel/css/style.min.css" rel="stylesheet">
<style>
    @font-face {
        font-family: 'icomoon';
        src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
        src: url("../fonts/ArbFONTS-The-Sans-Plain.otf") ;
        font-weight: normal;
        font-style: normal;
      }

      *{
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
        @include('Layouts.subheader' , ['pageTitle' =>  Config::get('app.locale') == 'ar'? 'الطابعات' : 'Printers'])
        <div class="container-fluid">
            <form class="center" method="POST" action="{{ route('storePrinter') }}" enctype="multipart/form-data" >

            <div class="row justify-content-center">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="col-md-9 col-xl-7">
                    <div class="card-header px-0 mt-2 bg-transparent clearfix">
                      <h4 class="float-left pt-2">{{__('main.new_printer')}}</h4>
                      <div class="float-right card-header-actions mr-1">
                        <button class="btn btn-primary"  type="submit">
                          <span class="ml-1">{{__('main.save_btn')}}</span>
                        </button>
                      </div>
                    </div>
                    <div class="card-body px-0">
                      <div class="form-group">
                        <label>{{__('main.printer_name')}}</label>
                        <input
                          type="text"
                          name="name"
                          id="name"
                          class="form-control @error('name') is-invalid @enderror"
                          placeholder="{{__('main.printer_name')}}"
                          autofocus
                        />
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>

                      <div class="form-group">
                        <label>{{__('main.printer_nickname')}}</label>
                        <input
                        type="text"
                        name="nickName"
                        id="nickName"
                        class="form-control @error('nickName') is-invalid @enderror"
                        placeholder="{{__('main.printer_nickname')}}"
                        autofocus
                      />
                      @error('nickName')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                      </div>

                        <div class="form-group">
                            <label>{{ __('main.printer_type') }}</label>
                            <select class="custom-select mr-sm-2 @error('type') is-invalid @enderror"
                                    name="type" id="type">
                                <option selected>Choose...</option>
                                <option value="1"> {{__('main.printer_type1')}} </option>
                                <option value="2"> {{__('main.printer_type2')}} </option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                  </div>

                </div>
        </form>

    </div>


    <script src="../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../cpanel/js/app-style-switcher.js"></script>
    <script src="../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../cpanel/js/waves.js"></script>
    <script src="../cpanel/js/sidebarmenu.js"></script>
    <script src="../cpanel/js/custom.js"></script>
    <script src="../cpanel/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="../cpanel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../cpanel/js/pages/dashboards/dashboard1.js"></script>
</body>
