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
    <link href="../../cpanel/css/style.min.css" rel="stylesheet">
 <link href="../../cpanel/css/style.css" rel="stylesheet">
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
        @include('Layouts.sidebar', ['slag' => 9])

        <div class="page-wrapper" @if(Config::get('app.locale') == 'ar') style="margin-right: 250px; margin-left:0px;" @endif>
            @include('Layouts.subheader', [
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'مستند صرف صندوق ': 'Cash Out Document',
            ])
            <div class="container-fluid">
                <div class="row">
                    <div class="col4 text-left" style="margin: 10px;">
                           <button type="button" class="btn btn-labeled btn-primary " id="createButton" >
                                <span class="btn-label"><i class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>

                    </div>

                </div>
                <div class="row justify-content-center">
                    @include('flash-message')
                    <div class="col-12">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('main.doc_date') }}</th>
                                    <th class="text-center">{{ __('main.doc_number') }}</th>
                                    <th class="text-center">{{ __('main.doc_type') }}</th>
                                    <th class="text-center">{{ __('main.amount') }}</th>
                                    <th class="text-center">{{ __('main.net') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $bill-> doc_date}}</td>
                                        <td class="text-center">{{ $bill-> bill_number}}</td>
                                        <td class="text-center"> {{( Config::get('app.locale') == 'ar') ? $bill-> doc -> name_ar : $bill-> doc -> name_en}}    </td>
                                        <td class="text-center"> {{ $bill-> amount}}   </td>
                                        <td class="text-center"> {{ $bill-> amount_with_tax}}   </td>

                                        <td class="text-center">

                                            <button
                                                type="button" class="btn btn-success editBtn" value="{{$bill -> id}}"><i
                                                    class="fas fa-edit"></i></button>
                                            <button
                                                type="button" class="btn btn-danger deleteBtn" value="{{$bill -> id}}"><i
                                                    class="far fa-trash-alt"></i></button>
                                            <br>
                                            <br>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('cpanel.Recipit.create')
        @include('deleteModal')

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();


            $(document).on('click', '#createButton', function (event) {
                id = 0;
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function () {
                        $('#loader').show();
                    },
                    // return the result
                    success: function (result) {
                        $('#createModal').modal("show");
                        $(".modal-body #id").val(0);
                        $(".modal-body #doc_type").val("");
                        $(".modal-body #tax_type").val("");
                        $(".modal-body #amount").val("");
                        $(".modal-body #tax").val("");
                        $(".modal-body #taxPer").val('');
                        $(".modal-body #amount_with_tax").val('');
                        $(".modal-body #bill_number_txt").val('');
                        $(".modal-body #tax_number_txt").val('');
                        $(".modal-body #supplier_id").val('');
                        $(".modal-body .form-header").html($('<div>{{trans('main.new_recipit')}}</div>').text());

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

            $(document).on('click', '.editBtn', function(event) {
                id = event.currentTarget.value ;
                console.log(id);
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    type:'get',
                    url:'getRecipit' + '/' + id,
                    dataType: 'json',

                    success:function(response){
                        if(response){
                            var now = new Date(response.doc_date);

                            var day = ("0" + now.getDate()).slice(-2);
                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result


                                success: function(result) {
                                    $('#createModal').modal("show");
                                    $(".modal-body #bill_number").val(response.bill_number);
                                    $(".modal-body #id").val(response.id);
                                    $(".modal-body #doc_date").val(today);
                                    $(".modal-body #doc_type").val(response.doc_type);
                                    $(".modal-body #tax_type").val(response.tax_type);
                                    $(".modal-body #amount").val(response.amount);
                                    $(".modal-body #tax").val(response.tax);
                                    $(".modal-body #taxPer").val((response.tax / response.amount) * 100);
                                    $(".modal-body #amount_with_tax").val(response.amount_with_tax);
                                    $(".modal-body #bill_number_txt").val(response.bill_number_txt);
                                    $(".modal-body #tax_number_txt").val(response.tax_number_txt);
                                    $(".modal-body #supplier_id").val(response.supplier_id);
                                    $(".modal-body .form-header").html($('<div>{{trans('main.edit_recipit')}}</div>').text());

                                    $.ajax({
                                        type: 'get',
                                        url: 'getExpense/' + response.doc_type,
                                        dataType: 'json',
                                        success: function (res) {
                                            console.log(res);

                                            if (res) {
                                                if (res.show_bill_number == 0) {
                                                    $(".modal-body #show_bill_number").slideUp();
                                                } else {
                                                    $(".modal-body #show_bill_number").slideDown();
                                                }
                                                if (res.show_supplier_name == 0) {
                                                    $(".modal-body #show_supplier_name").slideUp();
                                                } else {
                                                    $(".modal-body #show_supplier_name").slideDown();
                                                }
                                                if (res.show_tax_number == 0) {
                                                    $(".modal-body #show_tax_number").slideUp();
                                                } else {
                                                    $(".modal-body #show_tax_number").slideDown();
                                                }

                                            } else {
                                                $("#show_bill_number").slideUp();
                                                $("#show_supplier_name").slideUp();
                                                $("#show_tax_number").slideUp();
                                            }
                                        }
                                    });

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
            });

            $(document).on('click', '.deleteBtn', function(event) {
                id = event.currentTarget.value ;
                console.log(id);
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#deleteModal').modal("show");
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
            $(document).on('click', '.btnConfirmDelete', function(event) {
                console.log(id);
                confirmDelete();
            });
            $(document).on('click', '.cancel-modal', function(event) {
                $('#deleteModal').modal("hide");
                console.log()
                id = 0 ;
            });
        });

        function confirmDelete(){
            let url = "{{ route('destroyRecipt', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }


        function getExpense(id){
            console.log(id)
            $.ajax({
                type: 'get',
                url: '/getExpense/' + id,
                dataType: 'json',

                success: function (response) {
                    console.log(response);

                    if (response) {
                        if(response.show_bill_number == 0){
                            $(".modal-body #show_bill_number").slideUp();
                        }else {
                            $(".modal-body #show_bill_number").slideDown();
                        }
                        if(response.show_supplier_name == 0){
                            $(".modal-body #show_supplier_name").slideUp();
                        } else {
                            $(".modal-body #show_supplier_name").slideDown();
                        }
                        if(response.show_tax_number == 0){
                            $(".modal-body #show_tax_number").slideUp();
                        } else {
                            $(".modal-body #show_tax_number").slideDown();
                        }

                    } else {
                        $(".modal-body #show_bill_number").slideUp();
                        $(".modal-body #show_supplier_name").slideUp();
                        $(".modal-body #show_tax_number").slideUp();
                    }
                }
            });
        }
    </script>
</body>
