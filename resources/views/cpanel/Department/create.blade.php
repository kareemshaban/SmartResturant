
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.department_title')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form class="center" method="POST" action="{{ route('storeDepartment') }}" enctype="multipart/form-data">

                    <div class="row justify-content-center">
                        @csrf
                        <!-- {{ csrf_field() }} -->
                        <div class="col-md-9 col-xl-7 data-entry">
                            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                <h4 class="float-left pt-2">{{ __('main.new_department') }}</h4>
                                <div class="float-right card-header-actions mr-1">
                                    <button type="submit" class="btn btn-labeled btn-primary "  >
                                        <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <div class="form-group">
                                    <label>{{ __('main.name_ar') }}</label>
                                    <input type="text" name="name_ar" id="name_ar"
                                           class="form-control @error('name_ar') is-invalid @enderror"
                                           placeholder="{{ __('main.name_ar_place') }}" autofocus />
                                    @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <input type="hidden" id="id" name="id">
                                </div>

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

    $("#img").change(function () {
        readURL(this);
    });
</script>








