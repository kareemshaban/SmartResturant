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
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../images/favicon.png" type="">
    <!-- Custom CSS -->
    <!-- Custom CSS -->



    <link id="pagestyle" href= "{{asset('assets/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
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

        body {
            font-family: 'icomoon';
        }
        .quick-button.small {
            padding: 15px 0px 1px 0px;
            font-size: 13px;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .quick-button.small:hover{
            transform: scale(1.1);
        }
        .quick-button {
            margin-bottom: -1px;
            padding: 30px 0px 10px 0px;
            font-size: 15px;
            display: block;
            text-align: center;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
            opacity: 0.9;
        }
        .bblue {
            background: #428BCA !important;
        }.white {
             color: white !important;
         }
        .bdarkGreen {
            background: #78cd51 !important;
        }
        .blightOrange {
            background: #fabb3d !important;
        }.bred {
             background: #ff5454 !important;
         }
        .bpink {
            background: #e84c8a !important;
        }
        .bgrey {
            background: #b2b8bd !important;
        }
        .blightBlue {
            background: #5BC0DE !important;
        }
        .padding1010 {
            padding: 10px;
        }

        .card{
            box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05) !important;
            border-radius: 15px !important;
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
                @include('flash-message')

                <div class="container-fluid py-4" style="min-height: 500px">


                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-lg-12">
                            <div class="box" style="padding-bottom: 30px; width: 90%; margin: auto">
                                <div class="box-header">
                                    <h2 class="blue"><i class="fa fa-th" aria-hidden="true"></i><span class="break"></span>{{__('main.daily_total')}}
                                    <label> </label> ( {{\Carbon\Carbon::now() -> format('d - m - Y')}} ) </h2>
                                </div>
                                <div class="box-content" style=" background: whitesmoke;">

                                    <div class="row" style=" margin: 30px auto; width: 80% ;">
                                        <div class="col-xl-6 col-sm-6 ">
                                            <div class="card" style="height: 150px; ">
                                                <div class="card-body p-3" style="display: flex; flex-direction: column; justify-content: center">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="numbers">
                                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('main.total_sales')}}</p>
                                                                <h5 class="font-weight-bolder mb-0">
                                                                    {{$sales_total}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-end">
                                                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                                <i class="fa fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card" style="height: 150px; ">
                                                <div class="card-body p-3" style="display: flex; flex-direction: column; justify-content: center">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="numbers">
                                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('main.total_tax')}}</p>
                                                                <h5 class="font-weight-bolder mb-0">
                                                                    {{$sales_tax}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-end">
                                                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                                <i class="fa fa-money text-lg opacity-10" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style=" margin: 30px auto; width: 80% ;">
                                        <div class="col-xl-6 col-sm-6 ">
                                            <div class="card" style="height: 150px; ">
                                                <div class="card-body p-3" style="display: flex; flex-direction: column; justify-content: center">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="numbers">
                                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('main.sold_item_total')}}</p>
                                                                <h5 class="font-weight-bolder mb-0">
                                                                    {{$items_total}}

                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-end">
                                                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                                <i class="fa fa-calculator text-lg opacity-10" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card" style="height: 150px; ">
                                                <div class="card-body p-3" style="display: flex; flex-direction: column; justify-content: center">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="numbers">
                                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('main.expenses_total')}}</p>
                                                                <h5 class="font-weight-bolder mb-0">
                                                                  {{$total_expenses}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-end">
                                                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                                <i class="fa fa-box-open text-lg opacity-10" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-lg-12">
                            <div class="box" style="padding-bottom: 30px; width: 90%; margin: auto">
                                <div class="box-header">
                                    <h2 class="blue"><i class="fa fa-th" aria-hidden="true"></i><span class="break"></span>روابط سريعة</h2>
                                </div>
                                <div class="box-content" style="display: flex;flex-flow: wrap; padding: 20px; background: whitesmoke;">
                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bblue white quick-button small" href="{{route('items')}}">
                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                                            <p>{{__('main.menue_items')}}</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bdarkGreen white quick-button small" href="{{route('recipt')}}">
                                            <i class="fa fa-box-open" aria-hidden="true"></i>

                                            <p>{{__('main.recipt')}}</p>
                                        </a>
                                    </div>

                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="blightOrange white quick-button small" href="{{route('pos')}}">
                                            <i class="fa fa-calculator" aria-hidden="true"></i>

                                            <p> {{__('main.side_bill')}}</p>
                                        </a>
                                    </div>




                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bred white quick-button small" href="{{route('halls')}}">
                                            <i class="fa fa-home" aria-hidden="true"></i>

                                            <p>{{__('main.halls')}}</p>
                                        </a>
                                    </div>

                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bpink white quick-button small" href="{{route('tables')}}">
                                            <i class="fa fa-table" aria-hidden="true"></i>

                                            <p>{{__('main.tables')}}</p>
                                        </a>
                                    </div>

                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bgrey white quick-button small" href="{{route('printers')}}">
                                            <i class="fa fa-print" aria-hidden="true"></i>

                                            <p>{{__('main.printers')}}</p>
                                        </a>
                                    </div>


                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="blightOrange white quick-button small" href="{{route('report_daily_sales')}}">
                                            <i class="fa fa-print" aria-hidden="true"></i>

                                            <p>{{__('main.report_daily_sales')}}</p>
                                        </a>
                                    </div>

                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bred white quick-button small" href="{{route('report_box_transactions')}}">
                                            <i class="fa fa-print" aria-hidden="true"></i>

                                            <p>{{__('main.report_box_movement')}}</p>
                                        </a>
                                    </div>

                                    <div class="col-md-4 col-xs-4 padding1010">
                                        <a class="bdarkGreen white quick-button small" href="{{route('report_total_transactions')}}">
                                            <i class="fa fa-print" aria-hidden="true"></i>

                                            <p>{{__('main.report_movements_total')}}</p>
                                        </a>
                                    </div>



                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
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

           $(document).on('click', '#myShift' , function (event){
               showShift();
           } );
            $(document).on('click', '# tax-settings' , function (event){
                showTaxSettings();
            } );




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
</body>

</html>
