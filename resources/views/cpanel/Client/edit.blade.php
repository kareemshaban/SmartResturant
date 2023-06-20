<!DOCTYPE html>

<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('layout.header')


<body>


<div
    id="main-wrapper"
    data-layout="vertical"
    data-navbarbg="skin5"
    data-sidebartype="full"
    data-sidebar-position="absolute"
    data-header-position="absolute"
    data-boxed-layout="full"
>

    @include('layout.subHeader')

    @if($client -> type == 0)
        @include('layout.side' , ['slag' => 8 , 'subSlag' => 0])
    @else
        @include('layout.side' , ['slag' => 9 , 'subSlag' => 0])
    @endif
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">

        @if($client -> type == 0)
            @include('layout.cramp' , ['page_Title' => __('main.edit_client') , 'menue' => __('main.client_side') ])
        @else
            @include('layout.cramp' , ['page_Title' => __('main.edit_supplier') , 'menue' => __('main.supplier') ])

        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-header">
                            <h4 class="float-left pt-2">{{ $client -> type == 0 ?  __('main.edit_client')  : __('main.edit_supplier') }}
                                <br> <span style="    font-size: 9pt;
                            color: gray;">{{  __('main.required_note') }}</span> <span
                                    style="color:red; font-size:20px; font-weight:bold;">*</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form class="center" method="POST" action="{{ route('updateClient' , $client -> id) }}"
                                  enctype="multipart/form-data">

                                <div class="row justify-content-center" style="padding-bottom: 50px;">
                                    @csrf
                                    <!-- {{ csrf_field() }} -->
                                    <div class="col-md-9 col-xl-9 form data-entry">
                                        <div class="card-header px-0 mt-2 bg-transparent clearfix">

                                            <div class="float-right card-header-actions mr-1">
                                                <button type="submit" class="btn btn-labeled btn-warning ">
                                                    <span class="btn-label"><i
                                                            class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 col12">
                                            <h2 class="text-center"><span>{{ __('main.side_basic') }} </span></h2>


                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>{{ __('main.name_ar') }} <span
                                                                style="color:red; font-size:20px; font-weight:bold;">*</span>
                                                        </label>
                                                        <input type="text" name="name_ar" id="name_ar"
                                                               class="form-control @error('name_ar') is-invalid @enderror arabic-input"
                                                               placeholder="{{ __('main.name_ar_place') }}" autofocus
                                                               value="{{ $client -> name_ar }}"/>
                                                        <input type="hidden" id="type" name="type"
                                                               value="{{$client -> type}}">
                                                        @error('name_ar')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>{{ __('main.name_en') }} <span
                                                                style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                                        <input type="text" name="name_en" id="name_en"
                                                               class="form-control @error('name_en') is-invalid @enderror"
                                                               placeholder="{{ __('main.name_en_place') }}" autofocus
                                                               value="{{ $client -> name_en }}"/>
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
                                                        <label>{{ __('main.discount_type') }}</label>
                                                        <select
                                                            class="custom-select mr-sm-2 @error('discount_type') is-invalid @enderror"
                                                            id="discount_type"
                                                            name="discount_type" onchange="discount_typeChange()">
                                                            <option @if($client -> discount_type == 0) selected
                                                                    @endif value="0">{{ __('main.discount_type1') }}</option>
                                                            <option @if($client -> discount_type == 1) selected
                                                                    @endif value="1">{{ __('main.discount_type2') }}</option>
                                                            <option @if($client -> discount_type == 2) selected
                                                                    @endif value="2">{{ __('main.discount_type3') }}</option>

                                                        </select>
                                                        @error('discount_type')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>{{ __('main.discount_val') }}</label>
                                                        <input type="number" name="discount_value" id="discount_value"
                                                               class="form-control @error('discount_value') is-invalid @enderror"
                                                               placeholder="{{ __('main.discount_val') }}" autofocus
                                                               value="{{ $client -> discount_value != null ? $client -> discount_value : ''  }}"/>

                                                        @error('discount_value')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-1" style="    display: flex;
                            flex-direction: column;
                            justify-content: center;">
                                                    <label id="discount_label"
                                                           style=" margin-top: 10px;font-size: 18px;"></label>
                                                </div>


                                            </div>


                                        </div>


                                        <h2 class="text-center"><span> {{ __('main.contact_data') }} </span></h2>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.phone') }}</label>
                                                    <input type="tele" name="phone" id="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           placeholder="{{ __('main.phone') }}" autofocus
                                                           value="{{ $client -> phone != null ? $client -> phone : ''  }}"/>
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
                                                           placeholder="{{ __('main.mobile') }}" autofocus
                                                           value="{{ $client -> mobile != null ? $client -> mobile : ''  }}"/>
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
                                                           placeholder="{{ __('main.email_title') }}" autofocus
                                                           value="{{ $client -> email != null ? $client -> email : ''  }}"/>
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
                                                           placeholder="{{ __('main.postcode') }}" autofocus
                                                           value="{{ $client -> postal_code != null ? $client -> postal_code : ''  }}"/>
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
                                                           placeholder="{{ __('main.fax') }}" autofocus
                                                           value="{{ $client -> fax_number != null ? $client -> fax_number : ''  }}"/>
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
                                                              placeholder="{{ __('main.address') }}"
                                                              autofocus>  {{ $client -> address != null ? $client -> address : ''  }} </textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <h2 class="text-center"><span> {{ __('main.money_data') }} </span></h2>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.oppening_balance') }}</label>
                                                    <input type="number" step="any" name="oppening_balance"
                                                           id="oppening_balance"
                                                           class="form-control @error('oppening_balance') is-invalid @enderror"
                                                           placeholder="{{ __('main.oppening_balance') }}" autofocus
                                                           value="{{ $client -> oppening_balance != null ? $client -> oppening_balance : '0'  }}"/>
                                                    @error('oppening_balance')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.current_balance') }}</label>
                                                    <input type="text" name="current_balance" id="current_balance"
                                                           class="form-control @error('current_balance') is-invalid @enderror"
                                                           placeholder="{{ __('main.current_balance') }}" autofocus
                                                           disabled
                                                           value="{{ $client -> current_balance != null ? $client -> current_balance : '0'  }}"/>
                                                    @error('current_balance')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                </div>

                                            </div>


                                        </div>

                                        <div class="row type0">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.limit_money') }}</label>
                                                    <input type="number" step="any" name="limit_money" id="limit_money"
                                                           class="form-control @error('limit_money') is-invalid @enderror"
                                                           placeholder="{{ __('main.limit_money') }}" autofocus
                                                           value="{{ $client -> limit_money != null ? $client -> limit_money : '0'  }}"/>
                                                    @error('limit_money')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.limit_days') }}</label>
                                                    <input type="number" name="limit_days" id="limit_days"
                                                           class="form-control @error('limit_days') is-invalid @enderror"
                                                           placeholder="{{ __('main.limit_days') }}" autofocus
                                                           value="{{ $client -> limit_days != null ? $client -> limit_days : '0'  }}"/>
                                                    @error('limit_days')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                </div>

                                            </div>


                                        </div>
                                        <div class="row type1">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.tax_number_txt') }}</label>
                                                    <input type="text" name="tax_number" id="tax_number"
                                                           class="form-control @error('tax_number') is-invalid @enderror"
                                                           placeholder="{{ __('main.tax_number_txt') }}" autofocus
                                                           value="{{$client -> tax_number}}"/>
                                                    @error('tax_number')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{ __('main.commerical_register') }}</label>
                                                    <input type="text" name="registration_number"
                                                           id="registration_number"
                                                           class="form-control @error('registration_number') is-invalid @enderror"
                                                           placeholder="{{ __('main.commerical_register') }}" autofocus
                                                           value="{{$client -> registration_number}}"/>
                                                    @error('registration_number')
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
        </div>

    </div>


</div>

</div>

@include('layout.footer')
<input type="hidden" id="local" value="{{Config::get('app.locale') == 'ar' ? 'ar' : 'en'}}">
</div>

</div>
</body>
</html>


