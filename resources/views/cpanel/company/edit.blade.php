
<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.company_info')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
<div class="container-fluid">
    @include('flash-message')
    <form class="center" method="POST" action="{{ route('updateCompany' , $setting -> id) }}" enctype="multipart/form-data">

        <div class="row justify-content-center">
            @csrf
            <!-- {{ csrf_field() }} -->
            <div class="col-md-12 col-xl-12 data-entry" style="margin-top: 0!important;">
                <div class="card-header px-0 mt-2 bg-transparent clearfix">
                    <h4 class="float-left pt-2">{{ __('main.company_info') }}</h4>
                    <div class="float-right card-header-actions mr-1">
                        <button type="submit" class="btn btn-labeled btn-primary "  >
                            <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
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
                                <label>{{ __('main.commerical_register') }} </label>
                                <input type="text" name="fax1" id="fax1"
                                       class="form-control @error('fax1') is-invalid @enderror"
                                       placeholder="{{ __('main.commerical_register') }} " autofocus value="{{$setting -> fax1 }}"/>
                                @error('fax1')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.tax_number') }} </label>
                                <input type="text" name="fax2" id="fax2"
                                       class="form-control @error('fax2') is-invalid @enderror"
                                       placeholder="{{ __('main.tax_number') }} " autofocus value="{{$setting -> fax2 }}"/>
                                @error('fax2')
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
                                <label>{{ __('main.online_url') }} </label>
                                <input type="text" name="online_url" id="online_url"
                                       class="form-control @error('online_url') is-invalid @enderror"
                                       placeholder="{{ __('main.online_url') }}" autofocus  value="{{$setting -> online_url }}"/>
                                @error('online_url')
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





    </form>

</div>
            </div>
        </div>
    </div>
</div>
