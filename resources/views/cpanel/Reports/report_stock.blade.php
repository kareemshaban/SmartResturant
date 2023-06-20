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
    <link rel="shortcut icon" href="../images/favicon.png" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../cpanel/css/bootstrap.css" />

    <link href="../cpanel/css/style.min.css" rel="stylesheet">
    <link href="../cpanel/css/style.css" rel="stylesheet">
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
        input[type=checkbox]{
            width: 15px;
            height: 15px;
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
    @include('Layouts.sidebar', ['slag' => 2])

    <div class="page-wrapper" @if(Config::get('app.locale') == 'ar') style="margin-right: 250px; margin-left:0px;" @endif>
        @include('Layouts.subheader', [
            'pageTitle' => Config::get('app.locale') == 'ar' ? 'تقرير كميات الأصناف ': 'Items Stock Report' ])
        <div class="container-fluid">

            <div class="row justify-content-center">
                @include('flash-message')
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-8 form data-entry">

                        <form class="center" method="POST" action="{{ route('stock_report') }}" enctype="multipart/form-data">
                            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                <h4 class="float-left pt-2">{{ __('main.stock_report') }}</h4>
                                <div class="float-right card-header-actions mr-1">
                                    <button type="submit" class="btn btn-labeled btn-primary "  >
                                        <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.search_btn')}}</button>
                                </div>
                            </div>
                                @csrf
                                <!-- {{ csrf_field() }} -->

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-6">
                                        <label>{{ __('main.side_items') }}</label>
                                        <input type="checkbox" name="is_category" id="is_category"/>
                                        <select name="category" id="category" class="form-select">
                                            <option selected value="0"> choose...</option>
                                            @foreach($items as $category)
                                                <option selected value="{{$category -> id}}"> {{ Config::get('app.locale') == 'ar' ?
                                                $category -> name_ar : $category -> name_en}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-6">
                                        <label>{{ __('main.print_type') }}</label>
                                        <select name="print_type" id="print_type" class="form-select">
                                            <option selected value="0"> {{__('main.print_type1')}}</option>
                                            <option  value="1"> {{__('main.print_type2')}}</option>
                                            <option  value="2"> {{__('main.print_type3')}}</option>


                                        </select>

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


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        console.log('ready');
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
        console.log(now);
        var currentTime = now.toISOString().substring(11,16);
        console.log(currentTime);


        $('#is_from_date').prop('checked' , false);
        $('#from_date').attr('disabled' , true);
        $('#is_to_date').prop('checked' , false);
        $('#to_date').attr('disabled' , true);
        $('#to_date').val(today);
        $('#from_date').val(today);
        $('#is_from_time').prop('checked' , false);
        $('#from_time').attr('disabled' , true);
        $('#is_to_time').prop('checked' , false);
        $('#to_time').attr('disabled' , true);
        $('#to_time').val(currentTime);
        $('#from_time').val(currentTime);
        $('#is_category').prop('checked' , false);
        $('#category').attr('disabled' , true);
        $('#category').val('') ;


        $('#report_type').val(0) ;

        $('#print_type').val(0);


        $('#is_category').change(function (){
            $('#category').attr('disabled' , !this.checked);
        });
        $('#is_report_type').change(function (){
            $('#report_type').attr('disabled' , !this.checked);
        });

        $('#is_from_date').change(function (){
            $('#from_date').attr('disabled' , !this.checked);
        });
        $('#is_to_date').change(function (){
            $('#to_date').attr('disabled' , !this.checked);
        });
        $('#is_from_time').change(function (){
            $('#from_time').attr('disabled' , !this.checked);
        });
        $('#is_to_time').change(function (){
            $('#to_time').attr('disabled' , !this.checked);
        });


    });
</script>

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