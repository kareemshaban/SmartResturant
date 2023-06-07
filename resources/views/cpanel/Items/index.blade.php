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
        @include('Layouts.sidebar', ['slag' => 6])

        <div class="page-wrapper" @if(Config::get('app.locale') == 'ar') style="margin-right: 250px; margin-left:0px;" @endif>
            @include('Layouts.subheader', [
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'الأصناف والإضافات': 'Items & Extras',
            ])
            <div class="container-fluid">
                <div class="row">
                    <div class="col4 text-left" style="margin: 10px;">
                           <button id="createButton" type="button" class="btn btn-labeled btn-primary "  >
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
                                    <th class="text-center">{{ __('main.id') }}</th>
                                    <th class="text-center">{{ __('main.img') }}</th>
                                    <th class="text-center">{{ __('main.item_category') }}</th>
                                    <th class="text-center">{{ __('main.name_ar') }}</th>
                                    <th class="text-center">{{ __('main.name_en') }}</th>
                                    <th class="text-center">{{ __('main.item_type') }}</th>
                                    <th class="text-center">{{ __('main.quantity') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $item->code }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('images/Item/' . $item->img) }}" height=50 width=50 alt="Item image">
                                        </td>
                                        <td class="text-center">{{ ( Config::get('app.locale') == 'ar') ? $item->cayegory -> name_ar :
                                        $item->cayegory -> name_en }}</td>
                                        <td class="text-center">{{ $item->name_ar }}</td>
                                        <td class="text-center">{{ $item->name_en }}</td>
                                        <td class="text-center">@if ($item -> type == 0){{__('main.item_type1')}} @elseif ($item -> type == 1) {{  __('main.item_type2')   }}
                                            @else  {{ __('main.item_type3') }}
                                            @endif </td>

                                        <td class="text-center"> {{$item -> type != 2 ? 0 : $item -> qnt}}    </td>
                                        <td class="text-center">
                                         <button
                                                    type="button" class="btn btn-success editBtn" value="{{$item -> id}}"><i
                                                        class="fas fa-edit"></i></button>
                                        <button
                                                    type="button" class="btn btn-danger deleteBtn" value="{{$item -> id}}"><i
                                                        class="far fa-trash-alt"></i></button>
                                            <br>
                                            <br>
                                            <a href="{{route('itemSizes' , $item -> id)}}">
                                                <button
                                                    type="button" class="btn btn-info">
                                                    {{ __('main.item_sizes') }}</button>
                                            </a>
                                            @if($item -> type != 2)
                                            <a href="{{route('itemMaterials' , $item -> id)}}">
                                                <button
                                                    type="button" class="btn btn-warning">
                                                    {{ __('main.itemMaterials') }}</button>
                                            </a>
                                                @endif

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
    @include('cpanel.Items.create')
    @include('deleteModal')
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
        var id = 0;
        $(document).ready(function () {

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
                        $(".modal-body #code").val("");
                        $(".modal-body #type").val("");
                        $(".modal-body #name_ar").val("");
                        $(".modal-body #name_en").val("");
                        $(".modal-body #category_id").val('');
                       // $(".modal-body #addValue").val(0);
                        $(".modal-body #description_ar").val("");
                        $(".modal-body #description_en").val("");
                     //   $(".modal-body #isAddValue").prop('checked' , false);
                        $(".modal-body #isAddValue").prop('canPurshased' , false);



                        $(".modal-body .form-header").html($('<div>{{trans('main.new_item')}}</div>').text());



                        $(".modal-body #profile-img-tag").attr('src', '../images/photo.png');

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
                    url:'getItem' + '/' + id,
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

                                    var img =  '../images/Item/' + response.img ;
                                    $('#createModal').modal("show");
                                    $(".modal-body #code").val(response.code);
                                    $(".modal-body #type").val(response.type);
                                    $(".modal-body #name_ar").val(response.name_ar);
                                    $(".modal-body #name_en").val(response.name_en);
                                    $(".modal-body #category_id").val(response.category_id);
                                    $(".modal-body #addValue").val(response.addValue);
                                    $(".modal-body #description_ar").val(response.description_ar);
                                    $(".modal-body #description_en").val(response.description_en);
                                    $(".modal-body #isAddValue").prop('checked' , response.isAddValue);
                                    $(".modal-body #canPurshased").prop('checked' , response.canPurshased);

                                    if(response.isAddValue){
                                        $(".modal-body #addValue").attr('disabled', false);
                                    } else {
                                        $(".modal-body #addValue").attr('disabled', true);
                                    }
                                    $(".modal-body #id").val( response.id);

                                    $(".modal-body .form-header").html($('<div>{{trans('main.edit_new')}}</div>').text());

                                    $(".modal-body #profile-img-tag").attr('src', img);
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
            let url = "{{ route('destroyItem', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }
    </script>
</body>
