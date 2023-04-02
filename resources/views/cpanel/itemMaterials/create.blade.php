<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.itemMaterials')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form class="center" method="POST" action="{{ route('storeItemMaterial') }}" enctype="multipart/form-data">

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
                                    <div class="row">
                                        <div class="col-6">
                                            <label>{{ __('main.item') }}</label>
                                            <input type="text" class="form-control"
                                                   value="{{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item ->name_en}}"
                                                   disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label>{{ __('main.material') }}</label>
                                            <select class="custom-select mr-sm-2 @error('material_id') is-invalid @enderror"
                                                    name="material_id" id="material_id" >
                                                <option selected value="">Choose...</option>
                                                @foreach ($materials as $item)
                                                    <option
                                                        value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                                @endforeach
                                            </select>
                                            @error('material_id')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-6" hidden>
                                            <label>{{ __('main.isAddValue') }}</label>

                                            <input type="text" class="form-control" id="add" name="add"
                                                   value="{{ $item -> addValue ?? 0  }}" readonly />
                                            <input type="text" class="form-control" id="addValue"
                                                   value="{{ $item -> addValue ?? 0 }}" hidden/>
                                            <input type="text" class="form-control" id="id" name="id" hidden/>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-6">
                                            <label>{{ __('main.size') }}</label>
                                            <select class="custom-select mr-sm-2 @error('size_id') is-invalid @enderror"
                                                    name="size_id" id="size_id" onchange="getLevel()">
                                                <option selected value="">Choose...</option>

                                            </select>
                                            <input type="text" name="item_id" id="item_id" hidden
                                                   value="{{ $itemId }}"/>
                                            @error('size_id')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label>{{ __('main.quantity') }}</label>
                                            <input type="number" name="qnt" id="qnt" step="any"
                                                   class="form-control @error('qnt') is-invalid @enderror"
                                                   placeholder="{{ __('main.quantity') }}" autofocus />
                                            @error('qnt')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group" hidden>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>{{ __('main.level') }}</label>
                                            <input type="number" name="level" id="level"
                                                   class="form-control @error('level') is-invalid @enderror"
                                                   placeholder="{{ __('main.level') }}" autofocus readonly/>
                                            @error('level')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="col-6" >
                                            <label>{{ __('main.transform') }}</label>
                                            <input type="number" step="any" name="transformFactor" id="transformFactor"
                                                   class="form-control @error('transformFactor') is-invalid @enderror"
                                                   placeholder="{{ __('main.transform') }}" autofocus min="1"/>
                                            @error('transformFactor')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                    </div>


                                </div>
                                <div class="form-group" hidden>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>{{ __('main.price') }}</label>
                                            <input type="number" step="any" name="price" id="price"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   placeholder="{{ __('main.price') }}" autofocus
                                                   onkeyup="getPriceWithAddValue(0)"
                                                   onchange="getPriceWithAddValue(0)"/>
                                            @error('price')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label>{{ __('main.priceWithAddValue') }}</label>
                                            <input type="number" step="any" name="priceWithAddValue"
                                                   id="priceWithAddValue"
                                                   class="form-control @error('priceWithAddValue') is-invalid @enderror"
                                                   placeholder="{{ __('main.priceWithAddValue') }}" autofocus
                                                   onkeyup="getPriceWithAddValue(1)"
                                                   onchange="getPriceWithAddValue(1)"/>
                                            @error('priceWithAddValue')
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
  <input type="hidden" value="{{Config::get('app.locale') == 'ar' ? 'ar' : 'en'}}" id="local">
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        $("#material_id").val("");

        $("#material_id").change(function (){
            console.log(this.value);
            if(this.value != ''){
                var local = document.getElementById('local').value ;
                $.ajax({
                    type:'get',
                    url:'/getMaterialSizes' + '/' + this.value,
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response){
                            $("#size_id option[value !='']").remove();
                            for(let i = 0 ; i < response.length ; i++){
                                $('#size_id').append($('<option>', {
                                    value: response[i].id,
                                    text:  local == 'ar' ? response[i].name_ar : response[i].name_en
                                }));
                            }
                        } else {

                        }
                    }
                });
            } else {
                $("#size_id option[value !='']").remove();
            }


        });


        let price = document.getElementById("price");
        let priceWithAddValue = document.getElementById("priceWithAddValue");
        if (price) {
            price.value = "";
        }
        if (priceWithAddValue) {
            priceWithAddValue.value = "";
        }


    });

    function getPriceWithAddValue(i) {
        let priceVal = 0, priceWithAddValueVal = 0, addValueVal = 0;
        let price = document.getElementById("price");
        let priceWithAddValue = document.getElementById("priceWithAddValue");
        let addValue = document.getElementById("addValue");

            if (price && priceWithAddValue && addValue) {
                if(i == 0) {
                    priceVal = price.value;
                    addValueVal = (addValue.value / 100) * priceVal;
                    priceWithAddValueVal = Number(priceVal) + Number(addValueVal);
                    priceWithAddValue.value = priceWithAddValueVal;
                } else {
                    priceWithAddValueVal = priceWithAddValue.value ;
                    priceVal = priceWithAddValueVal / (1 + (addValue.value / 100));
                    price.value = priceVal.toFixed(2) ;
                }
            }


    }

    function getLevel() {

        let select = document.getElementById("size_id");
        let level = document.getElementById("level");
        console.log(select);
        console.log(level);
        if (select && level) {

            console.log(select.selectedIndex);
            level.value = select.selectedIndex;
        }
    }
</script>


