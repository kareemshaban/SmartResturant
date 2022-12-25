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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link href="../../cpanel/css/style.min.css" rel="stylesheet">
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
    @include('Layouts.subheader', [
            'pageTitle' => Config::get('app.locale') == 'ar' ? 'معلومات الشركة' : 'Company Information',
    ])
    <div class="container-fluid">
        @include('flash-message')
        <form class="center" method="POST" action="{{ route('updateCompany' , $setting -> id) }}" enctype="multipart/form-data">

            <div class="row justify-content-center">
                @csrf
                <!-- {{ csrf_field() }} -->
                <div class="col-md-9 col-xl-7">
                    <div class="card-header px-0 mt-2 bg-transparent clearfix">
                        <h4 class="float-left pt-2">{{ __('main.company_info') }}</h4>
                        <div class="float-right card-header-actions mr-1">
                            <button class="btn btn-primary" type="submit">
                                <span class="ml-1">{{ __('main.save_btn') }}</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.name_ar') }}</label>
                                    <input type="text" name="name_ar" id="name_ar"
                                               class="form-control @error('name_ar') is-invalid @enderror"
                                           placeholder="{{ __('main.name_ar') }}" autofocus  value="{{$setting -> name_ar }}"/>
                                    @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.name_en') }}</label>
                                    <input type="text" name="name_en" id="name_en"
                                           class="form-control @error('name_en') is-invalid @enderror"
                                           placeholder="{{ __('main.name_en') }}" autofocus value="{{$setting -> name_en }}"/>
                                    @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.activity_ar') }}</label>
                                    <input type="text" name="activity_ar" id="activity_ar"
                                           class="form-control @error('activity_ar') is-invalid @enderror"
                                           placeholder="{{ __('main.activity_ar') }}" autofocus value="{{$setting -> activity_ar }}"/>
                                    @error('activity_ar')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.activity_en') }}</label>
                                    <input type="text" name="activity_en" id="activity_en"
                                           class="form-control @error('activity_en') is-invalid @enderror"
                                           placeholder="{{ __('main.activity_en') }}" autofocus value="{{$setting -> activity_en }}"/>
                                    @error('activity_en')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.phone') }} 1</label>
                                    <input type="text" name="phone1" id="phone1"
                                           class="form-control @error('phone1') is-invalid @enderror"
                                           placeholder="{{ __('main.phone') }} 1" autofocus value="{{$setting -> phone1 }}"/>
                                    @error('phone1')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.phone') }} 2</label>
                                    <input type="text" name="phone2" id="phone2"
                                           class="form-control @error('phone2') is-invalid @enderror"
                                           placeholder="{{ __('main.phone') }} 2" autofocus value="{{$setting -> phone2 }}"/>
                                    @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.fax') }} 1</label>
                                    <input type="text" name="fax1" id="fax1"
                                           class="form-control @error('fax1') is-invalid @enderror"
                                           placeholder="{{ __('main.fax') }} 1" autofocus value="{{$setting -> fax1 }}"/>
                                    @error('fax1')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.fax') }} 2</label>
                                    <input type="text" name="fax2" id="fax2"
                                           class="form-control @error('fax2') is-invalid @enderror"
                                           placeholder="{{ __('main.fax') }} 2" autofocus value="{{$setting -> fax2 }}"/>
                                    @error('fax2')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>




    </div>
    </form>

</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
            document.getElementById('path').innerHTML = input.files[0].name;
        }
    }
    $("#img").change(function(){
        readURL(this);
    });
</script>

<script src="../../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../cpanel/js/app-style-switcher.js"></script>
<script src="../../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../../cpanel/js/waves.js"></script>
<script src="../../cpanel/js/sidebarmenu.js"></script>
<script src="../../cpanel/js/custom.js"></script>
<script src="../../cpanel/plugins/bower_components/chartist/dist/chartist.min.js"></script>
<script src="../../cpanel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../../cpanel/js/pages/dashboards/dashboard1.js"></script>
</body>
