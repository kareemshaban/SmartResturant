<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Smart Resturant</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../cpanel/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <!-- Custom CSS -->


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
        @include('Layouts.subheader', [
                'pageTitle' => Config::get('app.locale') == 'ar' ? ' الفئات' : 'Categories',
        ])
        <div class="container-fluid">
            <form class="center" method="POST" action="{{ route('updateCategory' , $category -> id) }}" enctype="multipart/form-data">

                <div class="row justify-content-center">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="col-md-9 col-xl-7">
                        <div class="card-header px-0 mt-2 bg-transparent clearfix">
                            <h4 class="float-left pt-2">{{ __('main.edit_cat') }}</h4>
                            <div class="float-right card-header-actions mr-1">
                                <button class="btn btn-primary" type="submit">
                                    <span class="ml-1">{{ __('main.save_btn') }}</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="form-group">
                                <label>{{ __('main.name_ar') }}</label>
                                <input type="text" name="name_ar" id="name_ar"
                                    class="form-control @error('name_ar') is-invalid @enderror"
                                    placeholder="{{ __('main.name_ar_place') }}" autofocus 
                                    value="{{ $category -> name_ar }}"/>
                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('main.name_en') }}</label>
                                <input type="text" name="name_en" id="name_en"
                                    class="form-control @error('name_en') is-invalid @enderror"
                                    placeholder="{{ __('main.name_en_place') }}" autofocus 
                                    value="{{ $category -> name_en }}"/>
                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('main.printer_hnt') }}</label>
                              
                                <select class="custom-select mr-sm-2 @error('printer') is-invalid @enderror" id="inlineFormCustomSelect" 
                                name="printer" id="printer">
                                  @if($category -> printer == 0)  <option selected value="0">Choose...</option> @endif
                                   @foreach ($printers as $item) 
                                   <option value="{{$item -> name}}"  @if ($category -> printer == $item -> name)
                                    selected
                                   @endif> {{  $item -> name }}</option> 
                                       
                                   @endforeach
                                  </select>
                                @error('printer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('main.img') }}</label>
                                <div class="row">

            
                              <div class="col-6"> 
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img"   name="img"  accept="image/png, image/jpeg" >
                                    <label class="custom-file-label" for="img" id="path">{{__('main.img_choose')}}   <span style="color:red;">*</span></label>
                                </div>
                                <br> <span style="font-size: 9pt ; color:gray;">{{ __('main.img_hint') }}</span>

                              </div>
                              <div class="col-6 text-right"> 
                                <img  src="{{ asset('images/Category/' . $category->img) }}" 
                                id="profile-img-tag" width="150px" height="150px" class="profile-img"/>
                              </div>
                            </div>
                                @error('printer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
