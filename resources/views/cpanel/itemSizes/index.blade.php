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
    <link rel="icon" type="image/png" sizes="16x16" href="../../cpanel/plugins/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../../cpanel/css/bootstrap.css" />

    <link href="../../cpanel/css/style.min.css" rel="stylesheet">
    <link href="../../cpanel/css/style.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../../fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../../fonts/ArbFONTS-The-Sans-Plain.otf");
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
        @include('Layouts.sidebar', ['slag' => 6])

        <div class="page-wrapper" @if(Config::get('app.locale') == 'ar') style="margin-right: 250px; margin-left:0px;" @endif>
            @include('Layouts.subheader', [
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'أحجام الصنف': 'Item Sizes',
            ])
            <div class="container-fluid">
                <div class="row">
                    <div class="col4 text-left" style="margin: 10px;">
                        @if($item -> type != 2 || count($sizess) ==0)
                           <button id="createButton" type="button" class="btn btn-labeled btn-primary "  >
                                <span class="btn-label"><i class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>
                        @endif

                    </div>

                </div>
                <div class="row justify-content-center">
                    @include('flash-message')
                    <div class="col-12">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('main.item') }}</th>
                                    <th class="text-center">{{ __('main.size') }}</th>
                                    <th class="text-center">{{ __('main.level') }}</th>
                                    <th class="text-center">{{ __('main.transform') }}</th>
                                    <th class="text-center">{{ __('main.price') }}</th>
                                    <th class="text-center">{{ __('main.priceWithAddValue') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizess as $size)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{( Config::get('app.locale') == 'ar') ?
                                         $size-> item -> name_ar : $size-> item -> name_en }}</td>
                                        <td class="text-center">{{( Config::get('app.locale') == 'ar') ?
                                    $size-> size -> name_ar : $size-> size -> name_en }}</td>
                                        <td class="text-center">{{ $size->level }}</td>
                                        <td class="text-center">{{ $size->transformFactor }}</td>
                                        <td class="text-center">{{ $size->price }}</td>
                                        <td class="text-center">{{ $size->priceWithAddValue }}</td>

                                        <td class="text-center">
                                  <button
                                                    type="button" class="btn btn-success editBtn" value="{{$size -> id}}"><i
                                                        class="fas fa-edit"></i></button><button
                                                    type="button" class="btn btn-danger deleteBtn" value="{{$size -> id}}"><i
                                                        class="far fa-trash-alt"></i></button>
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
    @include('cpanel.itemSizes.create')
    @include('deleteModal')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


    <script src="../../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../cpanel/js/app-style-switcher.js"></script>
    <script src="../../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../../cpanel/js/waves.js"></script>
    <script src="../../cpanel/js/sidebarmenu.js"></script>
    <script src="../../cpanel/js/custom.js"></script>

    @if(!empty(Session::get('res')) )
        <script>
            $(function() {
                sessionStorage.removeItem('res');
                openCreateModal();
            });
        </script>
    @endif

    <script type="text/javascript">

        function openCreateModal(){
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#createModal').modal("show");
                    $(".modal-body #size_id").val("");
                    $(".modal-body #level").val('');
                    $(".modal-body #transformFactor").val(1);
                    $(".modal-body #price").val("");
                    $(".modal-body #priceWithAddValue").val("");
                    $(".modal-body #id").val(0);

                    $(".modal-body .form-header").html($('<div>{{trans('main.new_size')}}</div>').text());


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
        var id = 0;
        $(document).ready(function () {





            $('#table').DataTable();

            $(document).on('click', '#createButton', function (event) {
                id = 0;
                event.preventDefault();
                openCreateModal();
            });
            $(document).on('click', '.editBtn', function(event) {
                id = event.currentTarget.value ;
                console.log(id);
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    type:'get',
                    url:'/getItemSize' + '/' + id,
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response){
                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result
                                success: function(result) {
                                    $('#createModal').modal("show");

                                    $('#createModal').modal("show");
                                    $(".modal-body #size_id").val(response.size_id);
                                    $(".modal-body #level").val(response.level);
                                    $(".modal-body #transformFactor").val(response.transformFactor);
                                    $(".modal-body #price").val(response.price);
                                    $(".modal-body #priceWithAddValue").val(response.priceWithAddValue);
                                    $(".modal-body #id").val(response.id);

                                    $(".modal-body .form-header").html($('<div>{{trans('main.edit_size')}}</div>').text());
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
            let url = "{{ route('destroyItemSize', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }
    </script>
</body>
