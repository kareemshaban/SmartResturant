<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.expenses_type')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
            <form class="center" method="POST" action="{{ route('storeExpenses_type') }}" enctype="multipart/form-data">

                <div class="row justify-content-center">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="col-md-12 col-xl-12 data-entry" style="margin-top: 0 !important;">
                        <div class="card-header px-0 mt-2 bg-transparent clearfix">
                            <h4 class="float-left pt-2 form-header">{{ __('main.new_expenses') }}</h4>
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
                                               placeholder="{{ __('main.name_ar_place') }}" autofocus />
                                        <input type="hidden" name="id" id="id">
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
                                               placeholder="{{ __('main.name_en_place') }}" autofocus />
                                        @error('name_en')
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
                                        <label>{{ __('main.description_ar') }}</label>

                                        <textarea  name="description_ar" id="description_ar"
                                                  class="form-control @error('description_ar') is-invalid @enderror"
                                                  placeholder="{{ __('main.description_ar') }}" autofocus>  </textarea>
                                        @error('description_ar')
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
                                        <label>{{ __('main.description_en') }}</label>

                                        <textarea name="description_en" id="description_en"
                                                  class="form-control @error('description_en') is-invalid @enderror"
                                                  placeholder="{{ __('main.description_en') }}" autofocus>  </textarea>
                                        @error('description_en')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center m-20">
                                <div class="col-4">
                                    <div class="form-group">
                                    <label>{{ __('main.show_bill_number') }}</label>

                                    <input class="form-control-cehck  @error('show_bill_number') is-invalid @enderror" type="checkbox"
                                           id="show_bill_number" name="show_bill_number" >
                                        @error('show_bill_number')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                    <label>{{ __('main.show_supplier_name') }}</label>

                                    <input class="form-control-cehck  @error('show_supplier_name') is-invalid @enderror" type="checkbox"
                                           id="show_supplier_name" name="show_supplier_name" >
                                        @error('show_supplier_name')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                    <label>{{ __('main.show_tax_number') }}</label>

                                    <input class="form-control-cehck  @error('show_tax_number') is-invalid @enderror" type="checkbox"
                                           id="show_tax_number" name="show_tax_number" >
                                        @error('show_tax_number')
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

