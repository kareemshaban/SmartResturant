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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../cpanel/css/bootstrap.css"/>

    <link href="../cpanel/css/style.min.css" rel="stylesheet">
    <link href="../cpanel/css/style.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../assets/fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../assets/fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }

        @keyframes scale {
            from {
                transform: scale(1.2);
            }
            to {
                transform: scale(1);
            }
        }

        body {
            font-family: 'icomoon';
            background-image: url('../assets/img/login.jpg') !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            object-fit: cover;
            animation: scale 2000ms ease-in-out forwards;
            height: 100vh !important;
            overflow-y: hidden;
        }

        i {
            font-size: 30px;
        }

        @import 'https://fonts.googleapis.com/css?family=Share+Tech+Mono';

        body {

        }

        #header {
            text-align: center !important;
            font-family: 'Share Tech Mono', monospace !important;
        }

        #calc {
            text-align: center !important;
            width: 380px !important;
            display: block !important;
            border-radius: 8px !important;
            border: 1px solid !important;
            bordel-color: #abc6c2 !important;
            padding: 8px !important;
            margin-top: 20px !important;
            margin-left: auto !important;
            margin-right: auto !important;
            background: #224662 !important;
        }

        #display {
            background: #bcbcbc !important;
            padding: 8px !important;
            margin: 16px 12px 10px 16px !important;
            text-align: center !important;
            font-family: 'Share Tech Mono', monospace !important;
            border-radius: 8px !important;
        }

        #result p {
            font-size: 1.8em !important;
        }

        #result,
        #previous {
            text-align: right !important;

        }

        #keyboard {
            display: inline-block !important;
            text-align: center !important;
            margin-bottom: 8px !important;
        }

        #calculatorModal .row {
            margin-top: 4px !important;
            display: contents;
        }

        #calculatorModal .last-row {
            float: left;
            display: contents;
            margin-top: -11.5% !important;
        }

        #calculatorModal button {
            width: 62px !important;
            margin: 2px !important;
        }

        #calculatorModal .invisible {
            width: 0 !important;
        }

        #calculatorModal .btn-zero {
            width: 134px !important;
        }

        #calculatorModal .btn-result {
            float: right !important;
            margin-left: 4px !important;
            height: 74px !important;
        }
        .menu{
            position: relative;
            height: 400px;
        }
        .centered-element {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
        }
        .menue-button{
            height: 225px;
            width: 225px;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            opacity: .9;
        }

        .centered-element .row{
            margin: 20px;
        }
        .menue-label{
            width: 225px;
            background: white;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
            opacity: .6;
            color: black;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-warning navbar-dark"
     @if(Config::get('app.locale') == 'ar')) style="direction: rtl ; opacity: .7 ;"
     @else style="direction: ltr ; opacity: .7 ;" @endif>
    <!-- Container wrapper -->
    <div class="container-fluid">

        <a class="navbar-brand" href="#" style="font-size: 30px">SMART POS ( <span
                style="color: #8c0404"> {{auth()->user()->name}} </span> )
        </a>


        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" aria-label="Toggle navigation"
                aria-controls="navbarSupportedContent" aria-expanded="false" data-mdb-target="#navbarSupportedContent">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <!-- Icons -->
            <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link mx-1 text-white" href="#"><i class="fas fa-globe"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0" id="keyboard" onclick="shortcut()">
                    <a class="nav-link mx-1 text-white" href="#"><i class="far fa-keyboard"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0" onclick="calculator()">
                    <a class="nav-link mx-1 text-white" href="#"><i class="fas fa-calculator"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link mx-1 text-danger"
                       href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="fas fa-power-off"></i></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- Container wrapper -->
</nav>

<div class="container menu">
    <div class="centered-element">
        <div class="row">
            <div class="col-lg-4 col-md-2 col-sm-1">
                <a href="{{route('items')}}" target="_blank">
                    <img src="../assets/img/items.jpg" class="menue-button">
                    <label class="menue-label">{{__('main.side_items')}}</label>
                </a>

            </div>
            <div class="col-lg-4 col-md-2 col-sm-1">
                <a href="{{route('categories')}}" target="_blank">
                    <img src="../assets/img/cats.jpg" class="menue-button">
                    <label class="menue-label">{{__('main.side_cats')}}</label>
                </a>

            </div>
            <div class="col-lg-4 col-md-2 col-sm-1">
                <a  href="{{route('sizes')}}" target="_blank" >
                    <img src="../assets/img/sizes.jpg" class="menue-button">
                    <label class="menue-label">{{__('main.side_sizes')}}</label>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-2 col-sm-1">
                <a  href="{{route('tables')}}" target="_blank" >
                    <img src="../assets/img/tables.jpg" class="menue-button">
                    <label class="menue-label">{{__('main.tables')}}</label>
                </a>

            </div>
            <div class="col-lg-4 col-md-2 col-sm-1" onclick="showShift()">
                    <img src="../assets/img/shifts.jpg" class="menue-button">
                    <label class="menue-label">{{__('main.shifts')}}</label>


            </div>
            <div class="col-lg-4 col-md-2 col-sm-1">
                <a  href="{{route('pos')}}"  >
                <img src="../assets/img/pos.jpg" class="menue-button">
                <label class="menue-label">{{__('main.side_bill')}}</label>
                </a>
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
                        <th class="text-center text-white">KEY</th>
                        <th class="text-center text-white">Function</th>
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
<div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="shortcutModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">{{__('main.calculator')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div class="container">
                    <div id="header">
                        <div id="calc" class="text-center">
                            <div id="display">
                                <div id="result"><p>0</p></div>
                                <div id="previous"><p>0</p></div>
                            </div>
                            <div id="keyboard">
                                <div class="row">
                                    <button class="btn btn-info" value="7">7</button>
                                    <button class="btn btn-info" value="8">8</button>
                                    <button class="btn btn-info" value="9">9</button>
                                    <button class="btn btn-danger" value="ac">AC</button>
                                    <button class="btn btn-danger" value="ce">CE</button>
                                </div>
                                <div class="row">
                                    <button class="btn btn-info" value="4">4</button>
                                    <button class="btn btn-info" value="5">5</button>
                                    <button class="btn btn-info" value="6">6</button>
                                    <button class="btn btn-warning" value="/">/</button>
                                    <button class="btn btn-warning" value="*">*</button>
                                </div>
                                <div class="row">
                                    <button class="btn btn-info" value="1">1</button>
                                    <button class="btn btn-info" value="2">2</button>
                                    <button class="btn btn-info" value="3">3</button>
                                    <button class="btn btn-warning" value="+">+</button>
                                    <button class="btn btn-success btn-result" value="=">=</button>

                                </div>
                                <div class="row last-row">
                                    <button class="btn btn-info btn-zero" value="0">0</button>
                                    <!-- <button class="invisible" value=""></button> -->
                                    <button class="btn btn-warning" value=".">.</button>
                                    <button class="btn btn-warning" value="-">-</button>
                                    <!-- <button class="invisible" value=""></button> -->

                                </div>
                            </div>
                        </div>
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
<div class="show_modal">

</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click' , '.cancel-modal2' , function (event) {
            $('#machineModal').modal("hide");
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
        var eq = "";
        var curNumber = "";
        var result = "";
        var entry = "";
        var reset = false;

        $("button").click(function () {
            entry = $(this).attr("value");

            if (entry === "ac") {
                entry = 0;
                eq = 0;
                result = 0;
                curNumber = 0;
                $('#result p').html(entry);
                $('#previous p').html(eq);
            } else if (entry === "ce") {
                if (eq.length > 1) {
                    eq = eq.slice(0, -1);
                    $('#previous p').html(eq);
                } else {
                    eq = 0;
                    $('#result p').html(0);
                }

                $('#previous p').html(eq);

                if (curNumber.length > 1) {
                    curNumber = curNumber.slice(0, -1);
                    $('#result p').html(curNumber);
                } else {
                    curNumber = 0;
                    $('#result p').html(0);
                }

            } else if (entry === "=") {
                result = eval(eq);
                $('#result p').html(result);
                eq += "=" + result;
                $('#previous p').html(eq);
                eq = result;
                entry = result;
                curNumber = result;
                reset = true;
            } else if (isNaN(entry)) {   //check if is not a number, and after that, prevents for multiple "." to enter the same number
                if (entry !== ".") {
                    reset = false;
                    if (curNumber === 0 || eq === 0) {
                        curNumber = 0;
                        eq = entry;
                    } else {
                        curNumber = "";
                        eq += entry;
                    }
                    $('#previous p').html(eq);
                } else if (curNumber.indexOf(".") === -1) {
                    reset = false;
                    if (curNumber === 0 || eq === 0) {
                        curNumber = 0.;
                        eq = 0.;
                    } else {
                        curNumber += entry;
                        eq += entry;
                    }
                    $('#result p').html(curNumber);
                    $('#previous p').html(eq);
                }
            } else {
                if (reset) {
                    eq = entry;
                    curNumber = entry;
                    reset = false;
                } else {
                    eq += entry;
                    curNumber += entry;
                }
                $('#previous p').html(eq);
                $('#result p').html(curNumber);
            }


            if (curNumber.length > 10 || eq.length > 26) {
                $("#result p").html("0");
                $("#previous p").html("Too many digits");
                curNumber = "";
                eq = "";
                result = "";
                reset = true;
            }

            if (result.indexOf(".") !== -1) {
                result = result.truncate()
            }

        });


    });

    function shortcut() {
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
        });

    }

    function calculator() {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                $('#calculatorModal').modal("show");
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
        });

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
    function showShift() {
        var route = '{{route('myShift')}}';

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }


</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


<script src="../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../cpanel/js/app-style-switcher.js"></script>
<script src="../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../cpanel/js/waves.js"></script>
<script src="../cpanel/js/sidebarmenu.js"></script>
<script src="../cpanel/js/custom.js"></script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>




</body>
</html>
