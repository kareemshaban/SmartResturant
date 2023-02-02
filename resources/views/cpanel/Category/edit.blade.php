
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.side_cats')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form  method="POST" action="{{ route('updateCategory' , $category -> id) }}" enctype="multipart/form-data">

                    <div class="row justify-content-center">
                        @csrf
                        <!-- {{ csrf_field() }} -->
                        <div class="col-md-12 col-xl-12 data-entry" style="margin-top: 0">
                            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                <h4 class="float-left pt-2">{{ __('main.edit_cat') }}</h4>
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
                                    @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    div
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
                                    <label>{{ __('main.printer_hnt') }}</label>

                                    <select class="custom-select mr-sm-2 @error('printer') is-invalid @enderror"
                                            id="inlineFormCustomSelect"
                                            name="printer" id="printer">
                                        <option selected value="0">Choose...</option>
                                        @foreach ($printers as $item)
                                            <option value="{{$item -> id}}"> {{  $item -> name }}</option>

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
                                                <input type="file" class="custom-file-input" id="img" name="img"
                                                       accept="image/png, image/jpeg" >
                                                <label class="custom-file-label" for="img"
                                                       id="path">{{__('main.img_choose')}} <span
                                                        style="color:red;">*</span></label>
                                            </div>
                                            <br> <span
                                                style="font-size: 9pt ; color:gray;">{{ __('main.img_hint') }}</span>

                                        </div>
                                        <div class="col-6 text-right">
                                            <img src="../images/photo.png" id="profile-img-tag" width="150px"
                                                 height="150px" class="profile-img"/>
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

                </form>
            </div>
        </div>

    </div>
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

