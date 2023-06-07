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
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'الصالات': 'Halls',
            ])
            <div class="container-fluid">
                <div class="row">
                    <div class="col4 text-left" style="margin: 10px;">
                        <a href="{{ route('createHall') }}">
                           <button type="button" class="btn btn-labeled btn-primary "  >
                                <span class="btn-label"><i class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>

                        </a>

                            <button type="button" class="btn btn-labeled btn-success " style="margin-left: 30px;" id="showBtn">
                                <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.show_machines')}}</button>


                    </div>

                </div>
                <div class="row justify-content-center">
                    @include('flash-message')
                    <div class="col-12">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('main.id') }}</th>
                                    <th class="text-center">{{ __('main.name_ar') }}</th>
                                    <th class="text-center">{{ __('main.name_en') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($halls as $hall)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $hall->id }}</td>
                                        <td class="text-center">{{ $hall->name_ar }}</td>
                                        <td class="text-center">{{ $hall->name_en }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('editHall', $hall->id) }}"> <button
                                                    type="button" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></button> </a>
                                            <a onclick="return confirm('Are you sure?')"
                                                href="{{ route('destroyHall', $hall->id) }} "> <button
                                                    type="button" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i></button> </a>
                                            <button type="button" class="btn btn-info" onclick="showModalMachine( {{$hall -> id }}  )">{{__('main.add_machine')}}</button>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modelTitle"> {{__('main.machines')}}</label>
                    <button type="button" class="close modal-close-btn"  data-bs-dismiss="modal"  aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="paymentBody">
                    <form   method="POST" action="{{ route('storeMachine') }}"
                            enctype="multipart/form-data" >
                        @csrf

                        <div class="row">
                            <div class="col-12 " >
                                <div class="form-group">
                                    <label>{{ __('main.hall') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="hall" name="hall"
                                           class="form-control"
                                           placeholder="{{ __('main.symbol') }}"  readonly/>
                                    <input hidden="hidden" id="hall_id" name="hall_id" type="text"/>
                                    <input hidden="hidden" id="mac_address" name="mac_address" type="text"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('main.machine_code') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="code" name="code"
                                           class="form-control" readonly
                                           placeholder="{{ __('main.machine_code') }}"  />
                                    <input type="text"  id="id" name="id"
                                           class="form-control"
                                           placeholder="{{ __('main.code') }}"  hidden=""/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 " >
                                <div class="form-group">
                                    <label>{{ __('main.machine_name') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="name" name="name"
                                           class="form-control"
                                           placeholder="{{ __('main.machine_name') }}"  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6" style="display: block; margin: 20px auto; text-align: center;">
                                <button type="submit" class="btn btn-labeled btn-primary"  >
                                    {{__('main.save_btn')}}</button>
                            </div>
                        </div>
                    </form>
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
    <script src="../cpanel/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="../cpanel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../cpanel/js/pages/dashboards/dashboard1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();

            $(document).on('click', '#showBtn', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    type: 'get',
                    url: 'getMachines' ,
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
                                    cell1.className = "text-center";
                                    cell2.className = "text-center";
                                    cell3.className = "text-center";
                                    cell4.className = "text-center";
                                    cell5.className = "text-center";

                                    cell1.innerHTML = i + 1;
                                    cell2.innerHTML = response[i].id;
                                    cell3.innerHTML = response[i].code;
                                    cell4.innerHTML = response[i].name;
                                    cell5.innerHTML = response[i].hall.name_ar ;


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

        });
        function showModalMachine(id ){
            $.ajax({
                type:'get',
                url:'getHall' + '/' + id,
                dataType: 'json',

                success:function(response){
                    console.log(response);
                    if(response){
                        let href = $(this).attr('data-attr');
                        console.log(name);
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            // return the result
                            success: function(result) {
                                $('#createModal').modal("show");
                                $(".modal-body #name").val( "" );
                                $.ajax({
                                    type:'get',
                                    url:'getMachineNo',
                                    dataType: 'json',
                                    success:function(response){
                                        console.log(response);
                                        if(response){
                                            $(".modal-body #code").val( response );

                                        }
                                    }
                                });
                                $.ajax({
                                    type:'get',
                                    url:'getMac',
                                    dataType: 'json',
                                    success:function(response){
                                        console.log(response);
                                        if(response){
                                            $(".modal-body #mac_address").val( response );

                                        }
                                    }
                                });
                                $(".modal-body #hall").val( response.name_ar + '---' + response.name_en);
                                $(".modal-body #hall_id").val( id );
                                $(".modal-body #id").val( 0 );
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
                    } else {

                    }
                }
            });


        }


    </script>
</body>
