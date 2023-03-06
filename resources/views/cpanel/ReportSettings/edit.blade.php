
<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.report_settings')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">

                <div class="container-fluid">
                    @include('flash-message')
                    <form class="center" method="POST" action="{{ route('updateReportSetting' , $setting -> id) }}" enctype="multipart/form-data">

                        <div class="row justify-content-center">
                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <div class="col-md-12 col-xl-12 form data-entry" style="margin-top: 0 !important;">
                                <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                    <h4 class="float-left pt-2">{{ __('main.report_settings') }}</h4>
                                    <div class="float-right card-header-actions mr-1">
                                        <button type="submit" class="btn btn-labeled btn-primary "  >
                                            <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                                    </div>
                                </div>
                                <div class="card-body px-0">
                                    <div class="form-group">

                                        <label><strong>{{__('main.header_ar')}}</strong></label>

                                        <textarea class="wysihtml5 form-control" name="header_ar" placeholder="{{__('main.header_ar')}}" rows="3">{!! $setting -> header_ar !!} </textarea>

                                    </div>

                                    <div class="form-group">

                                        <label><strong>{{__('main.header_en')}}</strong></label>

                                        <textarea class="wysihtml5 form-control" name="header_en" placeholder="{{__('main.header_en')}}" rows="3"> {!! $setting -> header_en !!} </textarea>

                                    </div>

                                    <div class="form-group">

                                        <label><strong>{{__('main.footer_ar')}}</strong></label>

                                        <textarea class="wysihtml5 form-control" name="footer_ar" placeholder="{{__('main.footer_ar')}}" rows="3"> {!! $setting -> footer_ar !!} </textarea>

                                    </div>

                                    <div class="form-group">

                                        <label><strong>{{__('main.footer_en')}}</strong></label>

                                        <textarea class="wysihtml5 form-control" name="footer_en" placeholder="{{__('main.footer_ar')}}" rows="3">{!! $setting -> footer_ar !!}  </textarea>

                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('main.img') }}  <span style="color:red;">*</span></label>
                                        <div class="row">


                                            <div class="col-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo"   name="logo"  accept="image/png, image/jpeg" >
                                                    <label class="custom-file-label" for="logo" id="path"> {{__('main.logo')}}</label>
                                                </div>
                                                <br> <span style="font-size: 9pt ; color:gray;">{{ __('main.img_hint') }}</span>

                                            </div>
                                            <div class="col-6 text-right">
                                                <img src="{{ asset('images/Company/' . $setting->logo) }}" id="profile-img-tag" width="150px" height="150px" class="profile-img"/>
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">

    $(document).ready(function () {


        $('.wysihtml5').wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": true, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": true,//Button to change color of font
            "blockquote": true,
        });

    });

</script>

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

    $("#logo").change(function () {
        readURL(this);
    });
</script>
