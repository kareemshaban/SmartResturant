<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.printers')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form class="center" method="POST" action="{{ route('storePrinter') }}" enctype="multipart/form-data" >

                    <div class="row justify-content-center">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="col-md-9 col-xl-7 data-entry">
                            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                <h4 class="float-left pt-2">{{__('main.printers')}}</h4>
                                <div class="float-right card-header-actions mr-1">
                                    <button type="submit" class="btn btn-labeled btn-primary "  >
                                        <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <div class="form-group">
                                    <label>{{__('main.printer_name')}}</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{__('main.printer_name')}}"
                                        autofocus
                                    />
                                    <input type="hidden" id="id"  name="id">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{__('main.printer_nickname')}}</label>
                                    <input
                                        type="text"
                                        name="nickName"
                                        id="nickName"
                                        class="form-control @error('nickName') is-invalid @enderror"
                                        placeholder="{{__('main.printer_nickname')}}"
                                        autofocus
                                    />
                                    @error('nickName')
                                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('main.printer_type') }}</label>
                                    <select class="custom-select mr-sm-2 @error('type') is-invalid @enderror"
                                            name="type" id="type">
                                        <option selected>Choose...</option>
                                        <option value="1"> {{__('main.printer_type1')}} </option>
                                        <option value="2"> {{__('main.printer_type2')}} </option>
                                    </select>
                                    @error('type')
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






