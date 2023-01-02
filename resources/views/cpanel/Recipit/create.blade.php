<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Smart Resturant</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
      <link rel="shortcut icon" href="../images/favicon.png" type="">
    <!-- Custom CSS -->
    <!-- Custom CSS -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link href="../cpanel/css/style.min.css" rel="stylesheet">
 <link href="../cpanel/css/style.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'icomoon';
        }

        .arabic-input {
            text-align: right;
        }
        .form {
    background: #ffffff !important;
    border: outset 3px saddlebrown;
    border-radius: 15px;
    box-shadow: 20px 19px 38px rgba(0,0,0,0.30), 20px 15px 12px rgba(0,0,0,0.22);
            margin-bottom: 50px;
        }
        h2 {
            width: 90%;
    text-align: center;
    border-bottom: 2px solid saddlebrown;
    line-height: 0.1em;
    margin: 20px auto;
}

h2 span {
    background:#fff;
    padding:0 10px;
    color: brown
}
.perc{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-top: 20px;
    font-size: 20px;
    font-weight: bold;
}
    </style>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('Layouts.cheader')
        @include('Layouts.subheader', [
                  'pageTitle' => Config::get('app.locale') == 'ar' ? 'مستند صرف صندوق ': 'Cash Out Document',
        ])
        <div class="container-fluid">
            <form class="center" method="POST" action="{{ route('storeRecipt') }}" enctype="multipart/form-data">

                <div class="row justify-content-center">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="col-md-7 col-xl-7 form data-entry">
                        <div class="card-header px-0 mt-2 bg-transparent clearfix">
                            <h4 class="float-left pt-2">{{ __('main.new_recipit') }}</h4>
                            <div class="float-right card-header-actions mr-1">
                               <button type="submit" class="btn btn-labeled btn-primary "  >
                                    <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                            </div>
                        </div>
                        <div class="card-body px-0">

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                        <label>{{ __('main.doc_number') }}</label>
                                        <input type="text" name="bill_number" id="bill_number"
                                            class="form-control @error('bill_number') is-invalid @enderror"
                                            placeholder="{{ __('main.doc_number') }}" autofocus readonly/>
                                        @error('bill_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label>{{ __('main.doc_date') }}</label>
                                        <input type="datetime-local" name="doc_date" id="doc_date"
                                               class="form-control @error('doc_date') is-invalid @enderror"
                                                autofocus />
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
                                        <label>{{ __('main.doc_type') }}</label>
                                        <select class="custom-select mr-sm-2 @error('doc_type') is-invalid @enderror"
                                                name="doc_type" id="doc_type">
                                            <option selected value="">Choose...</option>
                                            @foreach ($expenses as $item)
                                                <option value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>

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
                                        <label>{{ __('main.tax_type') }}</label>
                                        <select class="custom-select mr-sm-2 @error('tax_type') is-invalid @enderror"
                                                name="tax_type" id="tax_type">
                                            <option selected value="">Choose...</option>
                                            <option  value="1">{{__('main.tax_type1')}}</option>
                                            <option  value="2">{{__('main.tax_type2')}}</option>
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
                                            <label>{{ __('main.amount') }}</label>
                                            <input type="number" step="any" name="amount" id="amount"
                                                   class="form-control @error('amount') is-invalid @enderror"
                                                   placeholder="{{ __('main.amount') }}" autofocus onkeyup="amountChange(this)"/>
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
                                            <label>{{ __('main.amount_tax') }}</label>
                                            <input type="number" step="any" name="amount_with_tax" id="amount_with_tax"
                                                   class="form-control @error('amount_with_tax') is-invalid @enderror"
                                                   placeholder="{{ __('main.amount_tax') }}" autofocus readonly/>
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
                                        <input type="text"  name="bill_number_txt" id="bill_number_txt"
                                               class="form-control @error('bill_number_txt') is-invalid @enderror"
                                               placeholder="{{ __('main.bill_number_txt') }}" autofocus />
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
                                        <input type="text"  name="tax_number_txt" id="tax_number_txt"
                                               class="form-control @error('tax') is-invalid @enderror"
                                               placeholder="{{ __('main.tax_number_txt') }}" autofocus />
                                        @error('tax_number_txt')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4" id="show_supplier_name">
                                    <div class="form-group">
                                        <label>{{ __('main.supplier_name_txt') }}</label>
                                        <input type="text"  name="supplier_name_txt" id="supplier_name_txt"
                                               class="form-control @error('supplier_name_txt') is-invalid @enderror"
                                               placeholder="{{ __('main.supplier_name_txt') }}" autofocus />
                                        @error('supplier_name_txt')
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

<script >
         $(document).ready(function() {
             getBillNo();
             document.getElementById('doc_date').valueAsDate = new Date();
             document.getElementById('doc_type').value = "";
             document.getElementById('tax_type').value = "";
             document.getElementById('tax').value = "";
             document.getElementById('amount').value = "";
             document.getElementById('amount_with_tax').value = "";
             document.getElementById('taxPer').value = "";


             setTimeout(() =>{
                 $("#show_bill_number").slideUp();
                 $("#show_supplier_name").slideUp();
                 $("#show_tax_number").slideUp();
             } , 1000);

             $("#doc_type").change(function(){
                 if(this.value){
                     getExpense(this.value) ;
                 } else {
                     $("#show_bill_number").slideUp();
                     $("#show_supplier_name").slideUp();
                     $("#show_tax_number").slideUp();
                 }

             });
             $("#tax_type").change(function(){
                 console.log(this.value);
                 var tax = document.getElementById('tax');

                  if(this.value == 1 || !this.value){
                      tax.value = "";
                      var amount = document.getElementById('amount').value;
                      document.getElementById('amount_with_tax').value = amount;
                  } else {
                      getVats();
                  }
             });




        });
         function amountChange(ele){
             console.log(0);
             console.log(ele.value)
             var amount = ele.value ;
             var amountWithTax = 0 ;
             var tax = 0 ;
             var taxper = document.getElementById('taxPer').value;
             if(taxper){
                 tax = Number(amount) * Number(taxper/100)
                 amountWithTax = Number(tax) + Number(amount);
             } else {
                 amountWithTax = Number(amount);
                 tax = 0 ;
             }
             document.getElementById('amount_with_tax').value = amountWithTax ;
             document.getElementById('tax').value = tax ;
         }
     function getBillNo(){
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
     function getExpense($id){
         $.ajax({
             type: 'get',
             url: 'getExpense/' + $id,
             dataType: 'json',

             success: function (response) {
                 console.log(response);

                 if (response) {
                    if(response.show_bill_number == 0){
                        $("#show_bill_number").slideUp();
                    }else {
                        $("#show_bill_number").slideDown();
                    }
                    if(response.show_supplier_name == 0){
                         $("#show_supplier_name").slideUp();
                     } else {
                        $("#show_supplier_name").slideDown();
                    }
                     if(response.show_tax_number == 0){
                         $("#show_tax_number").slideUp();
                     } else {
                         $("#show_tax_number").slideDown();
                     }

                 } else {
                     $("#show_bill_number").slideUp();
                     $("#show_supplier_name").slideUp();
                     $("#show_tax_number").slideUp();
                 }
             }
         });
     }
     function getVats(){
         var taxPer = document.getElementById('taxPer');

         $.ajax({
             type: 'get',
             url: 'getVats',
             dataType: 'json',

             success: function (response) {
                 if (response) {
                     taxPer.value = response.receipt_tax ;
                     var amount = document.getElementById('amount').value;
                     tax = Number(amount) * Number(taxPer.value/100)
                     document.getElementById('tax').value = tax;
                     document.getElementById('amount_with_tax').value = Number(amount) + Number(tax);
                 } else {
                     taxPer.value = 0 ;
                 }
             }
         });
     }


 </script>

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
</body>
