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
<form class="center" method="POST" action="{{ route('storeRecipt') }}" enctype="multipart/form-data">

    <div class="row justify-content-center">
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="col-md-12 col-xl-12 form data-entry" style="margin-top: 0!important;">
            <div class="card-header px-0 mt-2 bg-transparent clearfix">
                <h4 class="float-left pt-2 form-header">{{ __('main.new_recipit') }}</h4>
                <div class="float-right card-header-actions mr-1">
                    <button type="submit" class="btn btn-labeled btn-primary ">
                        <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}
                    </button>
                </div>
            </div>
            <div class="card-body px-0">

                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('main.doc_number') }} <span
                                    style="color:red;">*</span></label>
                            <input type="text" name="bill_number" id="bill_number"
                                   class="form-control @error('bill_number') is-invalid @enderror"
                                   placeholder="{{ __('main.doc_number') }}" autofocus readonly/>
                            <input type="hidden" name="id" id="id">
                            @error('bill_number')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('main.doc_date') }} <span
                                    style="color:red;">*</span></label>
                            <input type="date" name="doc_date" id="doc_date"
                                   class="form-control @error('doc_date') is-invalid @enderror"
                                   autofocus required/>
                            @error('doc_date')
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
                            <label>{{ __('main.doc_type') }} <span
                                    style="color:red;">*</span></label>
                            <select class="custom-select mr-sm-2 @error('doc_type') is-invalid @enderror"
                                    name="doc_type" id="doc_type" required>
                                <option selected value="">Choose...</option>
                                @foreach ($expenses as $item)
                                    <option
                                        value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

                                @endforeach
                            </select>
                            @error('doc_type')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('main.tax_type') }} <span
                                    style="color:red;">*</span></label>
                            <select class="custom-select mr-sm-2 @error('tax_type') is-invalid @enderror"
                                    name="tax_type" id="tax_type" required>
                                <option selected value="">Choose...</option>
                                <option value="1">{{__('main.tax_type1')}}</option>
                                <option value="2">{{__('main.tax_type2')}}</option>
                            </select>

                            @error('tax_type')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>{{ __('main.amount') }} <span
                                    style="color:red;">*</span></label>
                            <input type="number" step="any" name="amount" id="amount"
                                   class="form-control @error('amount') is-invalid @enderror"
                                   placeholder="{{ __('main.amount') }}" autofocus onkeyup="amountChange(this)" required/>
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>{{ __('main.tax') }}</label>
                            <input type="text" step="any" name="tax" id="tax"
                                   class="form-control @error('tax') is-invalid @enderror"
                                   placeholder="{{ __('main.tax') }}" autofocus readonly/>
                            <input type="text" step="any" name="taxPer" id="taxPer"
                                   class="form-control"
                                   placeholder="{{ __('main.tax') }}" autofocus hidden/>
                            @error('tax')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>{{ __('main.net') }} <span
                                    style="color:red;">*</span></label>
                            <input type="number" step="any" name="amount_with_tax" id="amount_with_tax"
                                   class="form-control @error('amount_with_tax') is-invalid @enderror"
                                   placeholder="{{ __('main.amount_tax') }}" autofocus  onkeyup="amountWithVatChange(this)"
                            onchange="amountWithVatChange(this)" required/>
                            @error('amount_with_tax')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4" id="show_bill_number">
                        <div class="form-group">
                            <label>{{ __('main.bill_number_txt') }}</label>
                            <input type="text" name="bill_number_txt" id="bill_number_txt"
                                   class="form-control @error('bill_number_txt') is-invalid @enderror"
                                   placeholder="{{ __('main.bill_number_txt') }}" autofocus/>
                            @error('bill_number_txt')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4" id="show_tax_number">
                        <div class="form-group">
                            <label>{{ __('main.tax_number_txt') }}</label>
                            <input type="text" name="tax_number_txt" id="tax_number_txt"
                                   class="form-control @error('tax') is-invalid @enderror"
                                   placeholder="{{ __('main.tax_number_txt') }}" autofocus/>
                            @error('tax_number_txt')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4" id="show_supplier_name">
                        <div class="form-group">
                            <label>{{ __('main.supplier') }}</label>
                            <select class="form-select" id="supplier_id" name="supplier_id">
                                <option selected value="">Choose...</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier -> id}}">{{$supplier -> name_ar}} </option>
                                @endforeach
                            </select>
                            @error('supplier_name_txt')
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
                        <label>{{ __('main.notes') }}</label>
                        <textarea class="form-control" name="notes" id="notes" placeholder="Enter notes"></textarea>
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

<script>
    $(document).ready(function () {
        if(document.getElementById('id').value == 0) {
            getBillNo();
            document.getElementById('doc_date').valueAsDate = new Date();
            document.getElementById('doc_type').value = "";
            document.getElementById('tax_type').value = "";
            document.getElementById('tax').value = "";
            document.getElementById('amount').value = "";
            document.getElementById('amount_with_tax').value = "";
            document.getElementById('taxPer').value = "";

            setTimeout(() => {
                $("#show_bill_number").slideUp();
                $("#show_supplier_name").slideUp();
                $("#show_tax_number").slideUp();
            }, 1000);

        } else {
            setTimeout(() =>{
               // console.log(document.getElementById('doc_type').value);
                getExpense(document.getElementById('doc_type').value);
            } , 500);
        }



        $("#doc_type").change(function () {
            console.log('doc_type changed');
            if (this.value) {
                getExpense(this.value);
            } else {
                $("#show_bill_number").slideUp();
                $("#show_supplier_name").slideUp();
                $("#show_tax_number").slideUp();
            }

        });
        $("#tax_type").change(function () {
            console.log(this.value);
            var tax = document.getElementById('tax');

            if (this.value == 1 || !this.value) {
                tax.value = "0";
                var amount = document.getElementById('amount').value;
                document.getElementById('amount_with_tax').value = amount;
            } else {
                getVats();
            }
        });


    });




    function amountChange(ele) {
        console.log(0);
        console.log(ele.value)
        var amount = ele.value;
        var amountWithTax = 0;
        var tax = 0;
        var taxper = document.getElementById('taxPer').value;
        if (taxper) {
            tax = Number(amount) * Number(taxper / 100)
            amountWithTax = Number(tax) + Number(amount);
        } else {
            amountWithTax = Number(amount);
            tax = 0;
        }
        document.getElementById('amount_with_tax').value = amountWithTax;
        document.getElementById('tax').value = tax;
    }
    function amountWithVatChange(ele){
        var amount = 0;
        var amountWithTax = ele.value;
        var tax = 0;
        var taxper = document.getElementById('taxPer').value;
        if (taxper) {
             amount =  Number(amountWithTax / (1+ (taxper/100) )) ;
             tax = (taxper / 100 )* amount;
        } else {
            amount = Number(amountWithTax);
            tax = 0;
        }
        document.getElementById('amount').value = amount.toFixed(2);
        document.getElementById('tax').value = tax.toFixed(2);
    }

    function getBillNo() {
        var bill_number = document.getElementById('bill_number');
        $.ajax({
            type: 'get',
            url: 'getRecipitBillNo',
            dataType: 'json',

            success: function (response) {
                console.log(response);

                if (response) {
                    bill_number.value = response;

                } else {
                    bill_number.value = "";
                }
            }
        });
    }


    function getVats() {
        var taxPer = document.getElementById('taxPer');

        $.ajax({
            type: 'get',
            url: 'getVats',
            dataType: 'json',

            success: function (response) {
                if (response) {
                    taxPer.value = response.receipt_tax;
                    var amount = document.getElementById('amount').value;
                    tax = Number(amount) * Number(taxPer.value / 100)
                    document.getElementById('tax').value = tax;
                    document.getElementById('amount_with_tax').value = Number(amount) + Number(tax);
                } else {
                    taxPer.value = 0;
                }
            }
        });
    }


</script>


