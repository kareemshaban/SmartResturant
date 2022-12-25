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
        .arabic-input {
            text-align: right;
        }
        .form {
            background: #ffffff !important;
    border: outset 3px saddlebrown;
    border-radius: 15px;
    box-shadow: 20px 19px 38px rgba(0,0,0,0.30), 20px 15px 12px rgba(0,0,0,0.22);
        }

        h2 {
            width: 90%;
    text-align: center;
    border-bottom: 2px solid saddlebrown;
    line-height: 0.1em;
    margin: 20px auto;
}

h2 span {
    background:#fff;
    padding:0 10px;
    color: brown;
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
                'pageTitle' => Config::get('app.locale') == 'ar' ? 'الموظفيين': 'Employees',
        ])
        <div class="container-fluid">
            <form class="center" method="POST" action="{{ route('updateEmployee' , $employee -> id) }}" enctype="multipart/form-data">

                <div class="row justify-content-center" style="padding-bottom: 50px;">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="col-md-9 col-xl-9 form data-entry" >
                        <div class="card-header px-0 mt-2 bg-transparent clearfix">
                            <h4 class="float-left pt-2">{{ __('main.edit_employee') }}
                            <br> <span style="    font-size: 9pt;
                            color: gray;">{{  __('main.required_note') }}</span> <span style="color:red; font-size:20px; font-weight:bold;">*</span>
                            </h4>
                            <div class="float-right card-header-actions mr-1">
                               <button type="submit" class="btn btn-labeled btn-primary data-entry-btn"  >
                                    <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                            </div>
                        </div>
                        <div class="card-body px-0 col12">
                        <h2 class="text-center"> <span>{{ __('main.side_basic') }} </span>  </h2>


                        <div class="row">
                           <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.name_ar') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" name="name_ar" id="name_ar"
                                    class="form-control @error('name_ar') is-invalid @enderror arabic-input"
                                    placeholder="{{ __('main.name_ar_place') }}" autofocus value="{{ $employee -> name_ar }}" />
                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.name_en') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                <input type="text" name="name_en" id="name_en"
                                    class="form-control @error('name_en') is-invalid @enderror"
                                    placeholder="{{ __('main.name_en_place') }}" autofocus  value="{{ $employee -> name_en }}"/>
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
                                <label>{{ __('main.religion') }}</label>
                                <select class="custom-select mr-sm-2 @error('religion_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                name="religion_id" id="religion_id">
                                  @if($employee -> religion_id == 0 )  <option selected value="0">Choose...</option> @endif
                                   @foreach ($religions as $item)
                                   <option value="{{$item -> id}}"      @if($employee -> religion_id == $item ->  id) selected @endif> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                @error('religion_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                <label>{{ __('main.gender') }}</label>
                                <select class="custom-select mr-sm-2 @error('gender_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                name="gender_id" id="gender_id">
                                @if($employee -> gender_id == 0) <option selected value="0">Choose...</option> @endif
                                   @foreach ($genders as $item)
                                   <option value="{{$item -> id}}"  @if($employee -> gender_id == $item ->  id) selected @endif> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                @error('gender_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>

                            </div>


                         </div>


                        </div>
                        <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                <label>{{ __('main.nationalty') }}</label>
                                <select class="custom-select mr-sm-2 @error('nationalty_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                name="nationalty_id" id="nationalty_id">
                                @if($employee -> nationalty_id == 0)  <option selected value="0">Choose...</option> @endif
                                   @foreach ($nationalties as $item)
                                   <option value="{{$item -> id}}"   @if($employee -> nationalty_id == $item -> id) selected @endif> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                @error('nationalty_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                <label>{{ __('main.martial') }}</label>
                                <select class="custom-select mr-sm-2 @error('martialState_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                name="martialState_id" id="martialState_id">
                                @if($employee -> martialState_id == 0)   <option selected value="0">Choose...</option> @endif
                                   @foreach ($martialStats as $item)
                                   <option value="{{$item -> id}}" @if($employee -> martialState_id == $item -> id) selected @endif> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                @error('martialState_id')
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
                                    <label>{{ __('main.ID') }}</label>
                                    <input type="text" name="ID_number" id="ID_number"
                                        class="form-control @error('ID_number') is-invalid @enderror"
                                        placeholder="{{ __('main.ID') }}" autofocus value="{{ $employee -> ID_number == null ? $employee -> ID_number : '' }}"/>
                                    @error('ID_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.child_count') }}</label>
                                    <input type="number" name="child_number" id="child_number"
                                        class="form-control @error('child_number') is-invalid @enderror"
                                        placeholder="{{ __('main.child_count') }}" autofocus value="{{ $employee -> child_number !== null ? $employee -> child_number : '' }}" />
                                    @error('child_number')
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
                                    <label>{{ __('main.birth_date') }}</label>
                                    <input type="date" name="birth_date" id="birth_date"
                                        class="form-control @error('birth_date') is-invalid @enderror"
                                        placeholder="{{ __('main.birth_date') }}" autofocus value="{{ $employee -> birth_date !== null ? Carbon\Carbon::parse( $employee -> birth_date) ->format('Y-m-d') : '' }}" />
                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.education') }}</label>
                                    <select class="custom-select mr-sm-2 @error('education_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                    name="education_id" id="education_id">
                                      @if($employee -> education_id == 0)  <option selected value="0">Choose...</option> @endif
                                       @foreach ($educations as $item)
                                       <option value="{{$item -> id}}"  @if($employee -> education_id == $item -> id) selected @endif>  {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                       @endforeach
                                      </select>
                                    @error('education_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                               </div>
                        </div>
                    </div>
                        <h2 class="text-center"> <span>{{ __('main.work_data') }} </span> </h2>
                        <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                <label>{{ __('main.department') }}</label>
                                <select class="custom-select mr-sm-2 @error('department_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                name="department_id" id="department_id">
                                @if($employee -> department_id == 0)  <option selected value="0">Choose...</option> @endif
                                   @foreach ($departments as $item)
                                   <option value="{{$item -> id}}" @if($employee -> department_id == $item -> id) selected @endif> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                <label>{{ __('main.job') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                <select class="custom-select mr-sm-2 @error('job_id') is-invalid @enderror" id="inlineFormCustomSelect"
                                name="job_id" id="job_id">
                                   @foreach ($jobs as $item)
                                   <option value="{{$item -> id}}" @if($employee -> job_id == $item -> id) selected @endif> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                   @endforeach
                                  </select>
                                @error('job_id')
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
                                 <label>{{ __('main.work_hour') }}</label>
                                 <input type="number" name="work_hours" id="work_hours"
                                     class="form-control @error('work_hours') is-invalid @enderror"
                                     placeholder="{{ __('main.work_hour') }}" autofocus  value="{{ $employee -> work_hours !== null ? $employee -> work_hours : '' }}"/>
                                 @error('work_hours')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label>{{ __('main.work_off') }}</label>
                                 <input type="text" name="week_off_days" id="week_off_days"
                                     class="form-control @error('week_off_days') is-invalid @enderror"
                                     placeholder="{{ __('main.work_off') }}" autofocus  value="{{ $employee -> week_off_days !== null ? $employee -> week_off_days : '' }}"/>
                                 @error('week_off_days')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>

                            </div>


                         </div>



                         <h2 class="text-center"> <span>{{ __('main.contact_data') }} </span> </h2>

                         <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                 <label>{{ __('main.phone') }}</label>
                                 <input type="tele" name="phone" id="phone"
                                     class="form-control @error('phone') is-invalid @enderror"
                                     placeholder="{{ __('main.phone') }}" autofocus value="{{ $employee -> phone !== null ? $employee -> phone : '' }}"/>
                                 @error('phone')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label>{{ __('main.mobile') }}</label>
                                 <input type="tele" name="mobile" id="mobile"
                                     class="form-control @error('mobile') is-invalid @enderror"
                                     placeholder="{{ __('main.mobile') }}" autofocus value="{{ $employee -> mobile !== null ? $employee -> mobile : '' }}" />
                                 @error('mobile')
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
                                 <label>{{ __('main.email_title') }}</label>
                                 <input type="email" name="email" id="email"
                                     class="form-control @error('email') is-invalid @enderror"
                                     placeholder="{{ __('main.email_title') }}" autofocus  value="{{ $employee -> email !== null ? $employee -> email : '' }}"/>
                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label>{{ __('main.postcode') }}</label>
                                 <input type="text" name="postal_code" id="postal_code"
                                     class="form-control @error('postal_code') is-invalid @enderror"
                                     placeholder="{{ __('main.postcode') }}" autofocus  value="{{ $employee -> postal_code !== null ? $employee -> postal_code : '' }}"/>
                                 @error('postal_code')
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
                                 <label>{{ __('main.fax') }}</label>
                                 <input type="text" name="fax_number" id="fax_number"
                                     class="form-control @error('fax_number') is-invalid @enderror"
                                     placeholder="{{ __('main.fax') }}" autofocus  value="{{ $employee -> fax_number !== null ? $employee -> fax_number : '' }}"/>
                                 @error('fax_number')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-12">
                             <div class="form-group">
                                 <label>{{ __('main.address') }}</label>

                                 <textarea name="address" id="address"
                                 class="form-control @error('address') is-invalid @enderror"
                                 placeholder="{{ __('main.address') }}" autofocus> {{ $employee -> address !== null ? $employee -> address : '' }} </textarea>
                                 @error('address')
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




        </div>
        </form>

    </div>


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
