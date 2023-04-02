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
    <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    <link rel="stylesheet" type="text/css" href="../cpanel/css/bootstrap.css" />

    <link href="../cpanel/css/style.min.css" rel="stylesheet">
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
        @include('Layouts.sidebar' , ['slag' => 6])

    <div class="page-wrapper">
        @include('Layouts.subheader', [
            'pageTitle' => Config::get('app.locale') == 'ar' ? 'الفئات': 'Categories',
        ])
        <div class="container-fluid">
            <div class="row">
                <div class="col4 text-left" style="margin: 10px;">

                    <button id="createButton" type="button" class="btn btn-labeled btn-primary ">
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
                            <th class="text-center">{{ __('main.name_ar') }}</th>
                            <th class="text-center">{{ __('main.name_en') }}</th>
                            <th class="text-center">{{ __('main.printer') }}</th>
                            <th class="text-center">{{ __('main.operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $category->id }}</td>
                                <td class="text-center">
                                    <img src="{{asset('images/Category/' . $category->img) }}" height=50 width=50
                                         alt="category image">
                                </td>

                                <td class="text-center">{{ $category->name_ar }}</td>
                                <td class="text-center">{{ $category->name_en }}</td>
                                <td class="text-center">{{ $category-> printerr ? $category-> printerr -> name: '' }}</td>
                                <td class="text-center">
                                    <button
                                        type="button" class="btn btn-success editBtn" value="{{$category -> id}}"><i
                                            class="fas fa-edit"></i></button>
                                        <button
                                            type="button" class="btn btn-danger deleteBtn" value="{{$category -> id}}"><i
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

@include('cpanel.Category.create')
@include('deleteModal')


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    var id = 0;
    $(document).ready(function () {



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
                    $(".modal-body #name_ar").val("");
                    $(".modal-body #name_en").val("");
                    $(".modal-body #printer").val("");
                    $(".modal-body #img").val("");
                    $(".modal-body #id").val(0);
                    $(".modal-body .form-header").html($('<div>{{trans('main.new_cat')}}</div>').text());



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
                url:'getCategory' + '/' + id,
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

                                var img =  '../images/Category/' + response.img ;
                                $(".modal-body #profile-img-tag").attr('src' , img );
                                $(".modal-body #name_ar").val( response.name_ar );
                                $(".modal-body #name_en").val( response.name_en );
                                $(".modal-body #printer").val(response.printer);
                                $(".modal-body #id").val(response.id);
                                $(".modal-body .form-header").html($('<div>{{trans('main.edit_cat')}}</div>').text());

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
        let url = "{{ route('destroyCategory', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
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
    <script src="../cpanel/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="../cpanel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../cpanel/js/pages/dashboards/dashboard1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>

</body>




