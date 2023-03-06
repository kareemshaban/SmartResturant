


<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.tax_settings')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">

                <div class="container-fluid">
                    @include('flash-message')
                    <form class="center" method="POST" action="{{ route('updateTaxSetting' , $setting -> id) }}" enctype="multipart/form-data">

                        <div class="row justify-content-center">
                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <div class="col-md-11 col-xl-11 data-entry" style="margin-top: 0 !important;">
                                <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                    <h4 class="float-left pt-2">{{ __('main.tax_settings') }}</h4>
                                    <div class="float-right card-header-actions mr-1">
                                        <button type="submit" class="btn btn-labeled btn-primary "  >
                                            <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                                    </div>
                                </div>
                                <div class="card-body px-0">
                                    <div class="form-group">
                                        <label>{{ __('main.delivery_service') }}</label>
                                        <input type="number" name="delivery_service" id="delivery_service"
                                               class="form-control @error('delivery_service') is-invalid @enderror"
                                               placeholder="{{ __('main.delivery_service') }}" autofocus
                                               value="{{$setting -> delivery_service}}"/>
                                        @error('delivery_service')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('main.service') }}</label>
                                        <input type="number" name="service" id="service"
                                               class="form-control @error('service') is-invalid @enderror"
                                               placeholder="{{ __('main.service') }}" autofocus min="0" max="100"
                                               value="{{$setting -> service}}"/>
                                        @error('service')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('main.tobacco_tax') }}</label>
                                        <input type="number" name="tobacco_tax" id="tobacco_tax"
                                               class="form-control @error('tobacco_tax') is-invalid @enderror"
                                               placeholder="{{ __('main.tobacco_tax') }}" autofocus min="0" max="100"
                                               value="{{$setting -> tobacco_tax}}"/>
                                        @error('tobacco_tax')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('main.receipt_tax') }}</label>
                                        <input type="number" name="receipt_tax" id="receipt_tax"
                                               class="form-control @error('receipt_tax') is-invalid @enderror"
                                               placeholder="{{ __('main.receipt_tax') }}" autofocus min="0" max="100"
                                               value="{{$setting -> receipt_tax}}"/>
                                        @error('receipt_tax')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
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

