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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../images/favicon.png" type="">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->


    <link href="../cpanel/css/style.min.css" rel="stylesheet">
 <link href="../cpanel/css/style.css" rel="stylesheet">

    <link href="../cpanel/css/style.css" rel="stylesheet">
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
            @include('Layouts.sidebar' , ['slag' => 1])
        <div class="page-wrapper">
             @include('Layouts.subheader' , ['pageTitle' =>  Config::get('app.locale') == 'ar'? 'لوحة التحكم' : 'DashBoard'])
            <div class="container-fluid">

                <img src="../../assets/img/dashboard.jpg" style="width: 100%; height: auto">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12" >
                </div>

                    </div>
            </div>

            @include('Layouts.cfooter')

        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <img src="../assets/img/warning.png" class="alertImage">
                    <label class="alertTitle" id="open_shift">{{__('main.open_shift')}}</label>
                    <label class="alertTitle" id="no_open_shift">{{__('main.no_open_shift')}}</label>
                    <br> <label  class="alertSubTitle" id="modal_table_bill"></label>
                    <div class="row">
                        <div class="col-6 text-center">
                            <a href="{{route('myShift')}}">
                                <button type="button" class="btn btn-labeled btn-primary" >
                                    <span class="btn-label" style="margin-right: 10px;"><i class="fa fa-check"></i></span>{{__('main.control_shift')}}</button>
                            </a>

                        </div>
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-labeled btn-secondary cancel-modal"  >
                                <span class="btn-label" style="margin-right: 10px;"><i class="fa fa-close"></i></span>{{__('main.cancel_btn')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        let id = 0 ;
        $(document).ready(function()
        {
            $.ajax({
                type:'get',
                url:'checkShift' ,
                dataType: 'json',

                success:function(response){
                    console.log();
                    if(response){
                       if(response.length > 0){
                           openDialog(1);
                       } else {
                           openDialog(0);
                       }
                    } else {
                       openDialog(0);
                    }
                }
            });

            $(document).on('click' , '.cancel-modal' , function (event) {
                $('#deleteModal').modal("hide");
                id = 0 ;
            });
        });
        function openDialog(i){
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#deleteModal').modal("show");
                    if(i == 0){
                        $(".modal-body #open_shift").hide();
                        $(".modal-body #no_open_shift").show( "" );
                    } else {
                        $(".modal-body #open_shift").show();
                        $(".modal-body #no_open_shift").hide( "" );
                    }

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
        }
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

</html>
