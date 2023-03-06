<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.menue_items')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
<form class="center" method="POST" action="{{ route('storeItem') }}" enctype="multipart/form-data">

    <div class="row justify-content-center">
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="col-md-12 col-xl-12 form data-entry" style="margin-top: 0">
            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                <h4 class="float-left pt-2 form-header">{{ __('main.new_item') }}</h4>
                <div class="float-right card-header-actions mr-1">
                    <button type="submit" class="btn btn-labeled btn-primary ">
                        <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}
                    </button>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('main.code') }}</label>
                            <input type="text" name="code" id="code"
                                   class="form-control @error('code') is-invalid @enderror"
                                   placeholder="{{ __('main.code') }}" autofocus />

                            <input type="hidden" name="id" id="id">
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>{{ __('main.item_type') }}</label>
                            <select class="custom-select mr-sm-2 @error('type') is-invalid @enderror"
                                    name="type" id="type">
                                <option selected value="">Choose...</option>

                                <option value="0"> {{__('main.item_type1') }}</option>
                                <option value="1"> {{__('main.item_type2') }}</option>
                                <option value="2"> {{__('main.item_type3') }}</option>

                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('main.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar"
                                   class="form-control @error('name_ar') is-invalid @enderror arabic-input"
                                   placeholder="{{ __('main.name_ar_place') }}" autofocus  value="{{old('name_ar')}}" />
                            @error('name_ar')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <div class="col-6">
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
                    </div>

                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('main.item_category') }}</label>

                            <select class="custom-select mr-sm-2 @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category_id">
                                <option selected value="">Choose...</option>
                                @foreach ($categories as $item)
                                    <option value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ?
                                         $item -> name_ar : $item -> name_en}}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="col-5">
                            <label>{{ __('main.isAddValue') }}</label>

                            <input class="form-control-cehck  @error('isAddValue') is-invalid @enderror" type="checkbox"
                                   id="isAddValue" name="isAddValue" onchange="addValueChange()">
                            <input type="number" name="addValue" id="addValue"
                                   class="form-control @error('addValue') is-invalid @enderror"
                                   placeholder="{{ __('main.addValue') }}" autofocus disabled/>

                            @error('isAddValue')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="col-1 perc">%</div>
                    </div>

                </div>

                <div class="form-group">
                    <label>{{ __('main.description_ar') }}</label>
                    <textarea type="text" name="description_ar" id="description_ar"
                              class="form-control @error('description_ar') is-invalid @enderror"
                              placeholder="{{ __('main.description_ar') }}" autofocus></textarea>
                    @error('description_ar')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label>{{ __('main.description_en') }}</label>
                    <textarea type="text" name="description_en" id="description_en"
                              class="form-control @error('description_en') is-invalid @enderror"
                              placeholder="{{ __('main.description_en') }}" autofocus></textarea>
                    @error('description_en')
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
                                <label class="custom-file-label" for="img" id="path">{{__('main.img_choose')}} <span
                                        style="color:red;">*</span></label>
                            </div>
                            <br> <span style="font-size: 9pt ; color:gray;">{{ __('main.img_hint') }}</span>

                        </div>
                        <div class="col-6 text-right">
                            <img src="../images/photo.png" id="profile-img-tag" width="150px" height="150px"
                                 class="profile-img"/>
                        </div>
                    </div>
                    @error('img')
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

<script>
    $(document).ready(function () {
        var discount_inp = document.getElementById("isAddValue");
        var discount_label = document.getElementById("addValue");

        discount_inp.checked = false;
        addValue_inp.disabled = true;
    });

    function addValueChange() {
        var value = document.getElementById("isAddValue").checked;
        var addValue_inp = document.getElementById("addValue");

        if (value)
            addValue_inp.disabled = false;
        else
            addValue_inp.disabled = true;
    }

</script>

