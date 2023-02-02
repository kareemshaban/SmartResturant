<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.side_sizes')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form class="center" method="POST" action="{{ route('storeSize') }}" enctype="multipart/form-data">

                    <div class="row justify-content-center">
                        @csrf
                        <!-- {{ csrf_field() }} -->
                        <div class="col-md-12 col-xl-12 data-entry" style="margin-top: 0">
                            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                <h4 class="float-left pt-2 form-header">{{ __('main.new_size') }}</h4>
                                <div class="float-right card-header-actions mr-1">
                                    <button type="submit" class="btn btn-labeled btn-primary ">
                                        <span class="btn-label"><i
                                                class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <div class="form-group">
                                    <label>{{ __('main.name_ar') }}</label>
                                    <input type="text" name="name_ar" id="name_ar"
                                           class="form-control @error('name_ar') is-invalid @enderror"
                                           placeholder="{{ __('main.name_ar_place') }}" autofocus/>
                                    <input type="hidden" name="id" id="id">
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
                                           placeholder="{{ __('main.name_en_place') }}" autofocus/>
                                    @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('main.label') }}</label>
                                    <input type="text" name="label" id="label"
                                           class="form-control @error('label') is-invalid @enderror"
                                           placeholder="{{ __('main.label') }}" autofocus/>
                                    @error('label')
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
