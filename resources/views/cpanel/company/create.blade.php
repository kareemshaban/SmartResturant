
    <div class="container-fluid">
        @include('flash-message')
        <form class="center" method="POST" action="{{ route('storeCompany') }}" enctype="multipart/form-data">

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
                                         placeholder="{{ __('main.name_ar') }}" autofocus />
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
                                         placeholder="{{ __('main.name_en') }}" autofocus />
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
                                           placeholder="{{ __('main.activity_ar') }}" autofocus />
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
                                           placeholder="{{ __('main.activity_en') }}" autofocus />
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
                                           placeholder="{{ __('main.phone') }} 1" autofocus />
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
                                           placeholder="{{ __('main.phone') }} 2" autofocus />
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
                                           placeholder="{{ __('main.commerical_register') }}" autofocus />
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
                                           placeholder="{{ __('main.tax_number') }} 2" autofocus />
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
                                           placeholder="{{ __('main.online_url') }}" autofocus />
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

