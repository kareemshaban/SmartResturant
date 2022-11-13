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
    <link rel="icon" type="image/png" sizes="16x16" href="../cpanel/plugins/images/favicon.png">
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

        <div class="page-wrapper">
            @include('Layouts.subheader', [
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'المدن': 'Cities',
            ])
            <div class="container-fluid">
                <div class="row">
                    <div class="col4 text-left" style="margin: 10px;">
                        <a href="{{ route('createCity') }}">
                            <button type="button" class="btn btn-primary ">{{ __('main.add_new') }}</button>

                        </a>

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
                                    <th class="text-center">{{ __('main.country') }}</th>
                                    <th class="text-center">{{ __('main.governorate') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name_ar }}</td>
                                        <td class="text-center">{{ $item->name_en }}</td>
                                        <td class="text-center">{{ $item->Governorate -> name_ar}} --- {{$item -> Governorate -> name_en }}</td>

                                        <td class="text-center">{{ $item-> Governorate -> country -> name_ar}} --- {{$item -> Governorate -> country -> name_en }}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{ route('editCity', $item->id) }}"> <button
                                                    type="button" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></button> </a>
                                            <a onclick="return confirm('Are you sure?')"
                                                href="{{ route('destroyCity', $item->id) }} "> <button
                                                    type="button" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i></button> </a>
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
        });
    </script>
</body>
