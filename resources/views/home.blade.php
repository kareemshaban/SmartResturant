    <!DOCTYPE html>
    <html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }

        body {
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

                <img src="../assets/img/dashboard.jpg" style="width: 100%; height: auto">

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
                    {{__('main.shifts')}}
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
    <div class="modal fade" id="machineModal" tabindex="-1" role="dialog" aria-labelledby="machineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{__('main.user_machine')}}
                    <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <img src="../assets/img/warning.png" class="alertImage">
                    <label class="alertTitle" id="open_shift">{{__('main.no_attached_machine')}}</label>
                    <br> <label  class="alertSubTitle" id="modal_table_bill"></label>
                    <div class="row">
                        <div class="col-6 text-center">

                                <button type="button" class="btn btn-labeled btn-primary" id="showBtn" >
                                    <span class="btn-label" style="margin-right: 10px;"><i class="fa fa-check"></i></span>{{__('main.choose_machine')}}</button>


                        </div>
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-labeled btn-secondary cancel-modal2"  >
                                <span class="btn-label" style="margin-right: 10px;"><i class="fa fa-close"></i></span>{{__('main.cancel_btn')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modelTitle"> {{__('main.machines')}}</label>
                    <button type="button" class="close modal-close-btn"  data-bs-dismiss="modal"  aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="paymentBody">
                    <div class="col-12">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ __('main.id') }}</th>
                                <th class="text-center">{{ __('main.machine_code') }}</th>
                                <th class="text-center">{{ __('main.machine_name') }}</th>
                                <th class="text-center">{{ __('main.hall') }}</th>
                                <th class="text-center">{{ __('main.operations') }}</th>
                            </tr>
                            </thead>
                            <tbody id="body">


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        let id = 0 ;
        var url = document.referrer ;
        console.log(url);
        $(document).ready(function()
        {
            $.ajax({
                type:'get',
                url:'checkShift' ,
                dataType: 'json',

                success:function(response){
                    console.log(response);
                    if(response){
                       if(response.length > 0){
                           if(url.indexOf('login') > -1){
                               openDialog(1);
                           }

                       } else {
                           if(url.indexOf('login') > -1 ){
                               openDialog(0);
                           }                       }
                    } else {
                        if(url.indexOf('login') > -1){
                            openDialog(0);
                        }
                    }
                }
            });
            $.ajax({
                type:'get',
                url: 'getUser',
                datatype:'json',
                success:function (machine_id){
                    console.log(machine_id);
                    if(machine_id== 0){
                        openDialog2();
                    }

                }
            });

            $(document).on('click', '#showBtn', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $('#machineModal').modal("hide");
                $.ajax({
                    type: 'get',
                    url: 'selectMachine' ,
                    dataType: 'json',

                    success: function (response) {
                        console.log(response);
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            // return the result
                            success: function(result) {
                                $('#showModal').modal("show");
                                var table = document.getElementById('body');

                                for (let i = 0 ; i < response.length ; i++){
                                    var row =table.insertRow(-1);
                                    row.className = "text-center";
                                    var cell1 = row.insertCell(0);
                                    var cell2 = row.insertCell(1);
                                    var cell3 = row.insertCell(2);
                                    var cell4 = row.insertCell(3);
                                    var cell5 = row.insertCell(4);
                                    var cell6 = row.insertCell(5);
                                    cell1.className = "text-center";
                                    cell2.className = "text-center";
                                    cell3.className = "text-center";
                                    cell4.className = "text-center";
                                    cell5.className = "text-center";
                                    cell6.className = "text-center";

                                    cell1.innerHTML = i + 1;
                                    cell2.innerHTML = response[i].id;
                                    cell3.innerHTML = response[i].code;
                                    cell4.innerHTML = response[i].name;
                                    cell5.innerHTML = response[i].hall.name_ar ;
                                    cell6.innerHTML = '<td>      <button type="button" class="btn btn-labeled btn-info selectMachine" value="' + response[i].id + '">  <span class="btn-label" style="margin-right: 10px;"><i class="fa fa-check"></i></span>{{__('main.select')}}</button> </td>';

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
                });




            });


            $(document).on('click' , '.cancel-modal' , function (event) {
                $('#deleteModal').modal("hide");
                id = 0 ;
            });
            $(document).on('click' , '.cancel-modal2' , function (event) {
                $('#machineModal').modal("hide");
            });

            $(document).on('click' , '.selectMachine' , function (event) {

                var machine_id = event.currentTarget.value ;
                  $.ajax({
                     type: 'get',
                     url: 'setUserMachine' + '/' +  machine_id ,
                      dataType: 'json' ,
                      success: function (response){
                          console.log(response);
                          $('#showModal').modal("hide");
                          alert($('<div>{{trans('main.machine_selecte')}}</div>').text());
                      }

                  });
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

        function openDialog2(){
            console.log('od');
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#machineModal').modal("show");


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
