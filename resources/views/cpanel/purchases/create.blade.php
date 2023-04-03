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
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/"/>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../../images/favicon.png" type="">
    <!-- Custom CSS -->
    <!-- Custom CSS -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>

    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <link href="../../cpanel/css/style.min.css" rel="stylesheet">
    <link href="../../cpanel/css/style.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../../fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../../fonts/ArbFONTS-The-Sans-Plain.otf");
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
            box-shadow: 20px 19px 38px rgba(0, 0, 0, 0.30), 20px 15px 12px rgba(0, 0, 0, 0.22);
        }

        h2 {
            width: 90%;
            text-align: center;
            border-bottom: 2px solid saddlebrown;
            line-height: 0.1em;
            margin: 20px auto;
        }

        h2 span {
            background: #fff;
            padding: 0 10px;
            color: brown
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
     'pageTitle' => Config::get('app.locale') == 'ar' ? 'فاتورة مشتريات': 'Purchase Invoice',
 ])
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        <form method="POST" action="{{ route('store_purchase') }}"
              enctype="multipart/form-data">
            @csrf
            <!-- {{ csrf_field() }} -->
            <div class="row justify-content-center" style="padding-bottom: 50px;">
                <div class="col-md-9 col-xl-9 form data-entry">
                    <div class="card-header px-0 mt-2 bg-transparent clearfix">
                        <h4 class="float-left pt-2">{{   __('main.purchases')  }}
                            <br> <span style="    font-size: 9pt;
                            color: gray;">{{  __('main.required_note') }}</span> <span
                                style="color:red; font-size:20px; font-weight:bold;">*</span>
                        </h4>
                        <div class="float-right card-header-actions mr-1">
                            <button type="submit" class="btn btn-labeled btn-primary ">
                                <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 col12">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>{{ __('main.bill_number') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="bill_number" name="bill_number"
                                       class="form-control" placeholder="bill_number" readonly
                                />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>{{ __('main.bill_date') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="datetime-local" id="bill_date" name="bill_date"
                                       class="form-control"
                                />
                            </div>
                        </div>

                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.supplier') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <select class="form-select"
                                        name="customer_id" id="customer_id">
                                    <option value="0" selected>Choose...</option>
                                    @foreach ($customers as $item)
                                        <option value="{{$item -> id}}"> {{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="col-md-12" id="sticker" style="padding: 0;">
                                <div class="well well-sm"
                                     @if(Config::get('app.locale') == 'ar')style="direction: rtl;" @endif>
                                    <div class="form-group" style="margin-bottom:0;">
                                        <div class="input-group wide-tip">
                                            <div class="input-group-addon"
                                                 style="padding-left: 10px; padding-right: 10px;">
                                                <i class="fa fa-2x fa-barcode addIcon"></i></div>
                                            <input
                                                style="border-radius: 0 !important;padding-left: 10px;padding-right: 10px;"
                                                type="text" name="add_item" value=""
                                                class="form-control input-lg ui-autocomplete-input" id="add_item"
                                                placeholder="{{__('main.add_item_hint')}}" autocomplete="off">

                                        </div>

                                    </div>
                                    <ul class="suggestions" id="products_suggestions" style="display: block">

                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <h4 class="table-label text-center">{{__('main.items')}} </h4>
                                </div>

                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table id="sTable" style="width:100%" class="table align-items-center mb-0">
                                            <thead>
                                            <tr>
                                                <th class="text-center">{{__('main.item_name_code')}}</th>
                                                <th class="text-center">{{__('main.size')}}</th>
                                                <th class="col-md-2 text-center">{{__('main.price')}}</th>
                                                <th class="col-md-1 text-center">{{__('main.quantity')}} </th>
                                                <th class="col-md-2 text-center">{{__('main.tax')}}</th>
                                                <th class="col-md-2 text-center">{{__('main.net')}}</th>
                                                <th class="text-center">
                                                    <i class="fa fa-trash-o"
                                                       style="opacity:0.5; filter:alpha(opacity=50);"></i>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody"></tbody>
                                            <tfoot></tfoot>
                                        </table>


                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __('main.notes') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <textarea name="notes" id="notes" rows="3" placeholder="{{ __('main.notes') }}"
                                          class="form-control-lg" style="width: 100%"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>{{ __('main.net') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="net" name="net"
                                           class="form-control" placeholder="0" readonly
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>{{ __('main.paid') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="number" id="paid" name="paid"
                                           class="form-control" placeholder="0"
                                    />
                                </div>
                            </div>

                            <div class="col-4 ">
                                <div class="form-group">
                                    <label>{{ __('main.remain') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="remain" name="remain"
                                           class="form-control" placeholder="0" readonly
                                    />
                                </div>
                            </div>

                        </div>



                    </div>

                </div>
            </div>
        </form>

    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Alert!
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: red; font-size: 20px; font-weight: bold; background: white;
                height: 35px; width: 35px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <img src="../assets/img/warning.png" class="alertImage">
                <label class="alertTitle">{{__('main.notfound')}}</label>
                <br> <label class="alertSubTitle" id="modal_table_bill"></label>
                <div class="row text-center">
                    <div class="col-6 text-center" style="display: block;margin: auto">
                        <button type="button" class="btn btn-labeled btn-primary cancel-modal">
                            <span class="btn-label" style="margin-right: 10px;"><i
                                    class="fa fa-check"></i></span>{{__('main.ok_btn')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="local" value="{{Config::get('app.locale') == 'ar' ? 'ar' : 'en'}}">
</div>
<script type="text/javascript">

    var suggestionItems = {};
    var sItems = {};
    var count = 1;

    $(document).ready(function () {

        document.getElementById('net').value = "0";
        document.getElementById('remain').value = "0";
        document.getElementById('paid').value = "0";
        var now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());

        /* remove second/millisecond if needed - credit ref. https://stackoverflow.com/questions/24468518/html5-input-datetime-local-default-value-of-today-and-current-time#comment112871765_60884408 */
        now.setMilliseconds(null);
        now.setSeconds(null);

        document.getElementById('bill_date').value = now.toISOString().slice(0, -1);

        getBillNo();

        $('#warehouse_id').change(function () {
            getBillNo();
        });


        //document.getElementById('bill_date').valueAsDate = new Date();
        $('input[name=add_item]').change(function () {
            console.log($('#add_item').val());
        });
        $('#add_item').on('input', function (e) {
            searchProduct($('#add_item').val());
        });

        $(document).on('click', '.cancel-modal', function (event) {
            $('#deleteModal').modal("hide");
            id = 0;
        });

        $(document).on('click', '.deleteBtn', function (event) {
            var row = $(this).parent().parent().index();

            var row1 = $(this).closest('tr');
            var item_id = row1.attr('data-item-id');
            delete sItems[item_id];
            loadItems();
        });

        $(document).on('click', '.select_product', function () {
            var row = $(this).closest('li');
            var item_id = row.attr('data-item-id');
            addItemToTable(suggestionItems[item_id]);
            document.getElementById('products_suggestions').innerHTML = '';
            suggestionItems = {};
        });

        $('#paid').change(function (){
            calculateRemain(this.value);
        });
        $('#paid').keyup(function (){
            calculateRemain(this.value);
        });





    });

    function calculateRemain(val){
        var net = document.getElementById('net').value ;
        var paid = val ;
        var remain = net - paid ;
        document.getElementById('remain').value = remain;
    }
    function getBillNo() {

        let bill_number = document.getElementById('bill_number');
        $.ajax({
            type: 'get',
            url: '/get_purchase_number',
            dataType: 'json',

            success: function (response) {
                console.log(response);

                if (response) {
                    bill_number.value = response;
                } else {
                    bill_number.value = '';
                }
            }
        });
    }

    function searchProduct(code) {
        $.ajax({
            type: 'get',
            url: 'getProduct' + '/' + code,
            dataType: 'json',

            success: function (response) {

                document.getElementById('products_suggestions').innerHTML = '';
                if (response) {
                    if (response.length == 1) {
                        //addItemToTable
                        if(response[0].canPurshased == 1){
                            addItemToTable(response[0]);
                        }

                    } else if (response.length > 1) {
                        showSuggestions(response);
                    } else if (response.id) {
                        //showSuggestions(response);
                    } else {
                        //showNotFoundAlert
                        openDialog();
                        document.getElementById('add_item').value = '';
                    }
                } else {
                    //showNotFoundAlert
                    openDialog();
                    document.getElementById('add_item').value = '';
                }
            }
        });
    }

    function showSuggestions(response) {

        var local = document.getElementById('local').value ;

        $data = '';
        $.each(response, function (i, item) {
            if(item.canPurshased == 1){
                var name = local == 'ar' ? item.name_ar : item.name_en ;
                suggestionItems[item.id] = item;
                $data += '<li class="select_product" data-item-id="' + item.id + '">' + name + '</li>';
            }

        });
        document.getElementById('products_suggestions').innerHTML = $data;


    }

    function openDialog() {
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                $('#deleteModal').modal("show");
            },
            complete: function () {
                $('#loader').hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    }

    function addItemToTable(item) {
        if (count == 1) {
            sItems = {};
        }

        if (sItems[item.id]) {
            sItems[item.id].qnt = sItems[item.id].qnt + 1;
        } else {
            var price = 0;
            var itemTax = 0;
            var priceWithoutTax = 0;
            var priceWithTax = 0;
            var itemQnt = 1;

            sItems[item.id] = item;
            sItems[item.id].price_with_tax = priceWithTax;
            sItems[item.id].price_withoute_tax = priceWithoutTax;
            sItems[item.id].item_tax = itemTax;
            sItems[item.id].qnt = 1;
            sItems[item.id].unit_id = '';
            sItems[item.id].sizes = item.sizes ;
            console.log(sItems[item.id].sizes);

        }
        count++;
        loadItems();

        document.getElementById('add_item').value = '';
    }

    var old_row_qty = 0;
    var old_row_price = 0;
    var old_row_w_price = 0;

    $(document)
        .on('focus', '.iQuantity', function () {
            old_row_qty = $(this).val();
        })
        .on('change', '.iQuantity', function () {
            var row = $(this).closest('tr');
            if (!is_numeric($(this).val()) || parseFloat($(this).val()) < 0) {
                $(this).val(old_row_qty);
                alert('wrong value');
                return;
            }

            var newQty = parseFloat($(this).val()),
                item_id = row.attr('data-item-id');

            console.log(newQty);
            console.log(item_id);
            sItems[item_id].qnt = newQty;
            loadItems();

        });

    $(document)
        .on('focus', '.iPrice', function () {
            old_row_price = $(this).val();
        })
        .on('change', '.iPrice', function () {
            var row = $(this).closest('tr');
            if (!is_numeric($(this).val()) || parseFloat($(this).val()) < 0) {
                $(this).val(old_row_price);
                alert('wrong value');
                return;
            }

            var item_id = row.attr('data-item-id');
            var item_size_id = this.value ;
            var price = 0 ;
            var priceWithTax = 0 ;
            var tax = 0 ;
            console.log(sItems[item_id].sizes , item_size_id);
            for (let i = 0 ; i < sItems[item_id].sizes.length ; i++){
                if(sItems[item_id].sizes[i].id == item_size_id){
                    price = sItems[item_id].sizes[i].price ;
                    priceWithTax = sItems[item_id].sizes[i].priceWithAddValue;
                    break;
                }
            }



            var newPrice = parseFloat($(this).val());
            tax = priceWithTax - price ;
            sItems[item_id].price_withoute_tax = newPrice;
            sItems[item_id].price_with_tax = (newPrice + tax);
            sItems[item_id].item_tax = tax;
            loadItems();

        });

    $(document)
        .on('focus', '.iPriceWTax', function () {
            old_row_w_price = $(this).val();
        })
        .on('change', '.iUnit', function () {
            var row = $(this).closest('tr');
           var item_id = row.attr('data-item-id');
           var item_size_id = this.value ;
           var price = 0 ;
           var priceWithTax = 0 ;
           var tax = 0 ;
            console.log(sItems[item_id].sizes , item_size_id);
            for (let i = 0 ; i < sItems[item_id].sizes.length ; i++){
                if(sItems[item_id].sizes[i].id == item_size_id){
                    price = sItems[item_id].sizes[i].price ;
                    priceWithTax = sItems[item_id].sizes[i].priceWithAddValue;
                    break;
                }
            }

            tax = priceWithTax - price ;
            sItems[item_id].price_with_tax = priceWithTax;
            sItems[item_id].price_withoute_tax = price;
            sItems[item_id].item_tax = tax;
            sItems[item_id].unit_id = item_size_id ;
            console.log(sItems[item_id]);
             loadItems();

        });

    function is_numeric(mixed_var) {
        var whitespace = ' \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000';
        return (
            (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -1)) &&
            mixed_var !== '' &&
            !isNaN(mixed_var)
        );
    }

    function loadItems() {

        var total = 0;
        var net = 0 ;
        var index = 0 ;
        var local = document.getElementById('local').value ;
        $('#sTable tbody').empty();
        $.each(sItems, function (i, item) {
            console.log(item.item_tax);
             var name = '' ;
             name =  local == 'ar' ?  item.name_ar : item.name_en ;
            var newTr = $('<tr data-item-id="' + item.id + '"  id="' + item.id + '">');
            var tr_html = '<td style="width: 20%;" class="text-center"><input type="hidden" name="product_id[]" value="' + item.id + '"> <span>' + name + '---' + (item.code) + '</span> </td>';
            tr_html += `<td style="width: 10%;" class="text-center"> </td>`
            tr_html += '<td style="width: 10%;" class="text-center"><input type="text" class="form-control iPrice" name="price[]" value="' +  Number(item.price_withoute_tax).toFixed(2) + '"></td>';
            tr_html += '<td style="width: 10%;" class="text-center"><input type="text" class="form-control iQuantity" name="qnt[]" value="' + item.qnt.toFixed(2) + '"></td>';
            tr_html += '<td style="width: 10%;" class="text-center"><input type="text" readonly="readonly" class="form-control" name="tax[]" value="' + (item.item_tax * item.qnt).toFixed(2) + '"></td>';
            tr_html += '<td style="width: 10%;" class="text-center"><input type="text" readonly="readonly" class="form-control" name="net[]" value="' + (item.price_with_tax * item.qnt).toFixed(2) + '"></td>';
            tr_html += `<td style="width: 10%;" class="text-center">      <button type="button" class="btn btn-labeled btn-danger deleteBtn " value=" '+item.id+' ">
                                            <span class="btn-label" style="margin-right: 10px;"><i class="fa fa-trash"></i></span></button> </td>`;

            total += (item.price_with_tax * item.qnt);
            newTr.html(tr_html);
            newTr.appendTo('#sTable');
            var selectList = document.createElement("select");
            selectList.setAttribute("id", "unit_id[]");
            selectList.setAttribute("name", "unit_id[]");
            selectList.classList.add('form-select')  ;
            selectList.classList.add('iUnit')  ;
            var option0 = document.createElement("option");
            option0.setAttribute("value", '');
            option0.text = 'choose';
            selectList.appendChild(option0);
            for (var j = 0; j < item.sizes.length; j++) {
                var option = document.createElement("option");
                option.setAttribute("value", item.sizes[j].id);
                option.text = local == 'ar' ? item.sizes[j].size.name_ar : item.sizes[j].size.name_en;
                if(item.sizes[j].id == item.unit_id){
                    option.selected = true ;
                }

                selectList.appendChild(option);
            }
            console.log(item.sizes);
            var sTable =  document.getElementById('sTable') ;
            console.log(sTable);
            var body = sTable.getElementsByTagName('tbody')[0];
            console.log(body);
            var tr = body.getElementsByTagName('tr')[index];
            console.log(tr);
             var cell = tr.getElementsByTagName('td')[1];
            console.log(cell);
            cell.appendChild(selectList);
            index ++ ;
        });
        document.getElementById('net').value = total ;
        document.getElementById('remain').value = total ;
    }
</script>


<script src="../../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../cpanel/js/app-style-switcher.js"></script>
<script src="../../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../../cpanel/js/waves.js"></script>
<script src="../../cpanel/js/sidebarmenu.js"></script>
<script src="../../cpanel/js/custom.js"></script>
<script src="../../cpanel/plugins/bower_components/chartist/dist/chartist.min.js"></script>
<script
    src="../../cpanel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../../cpanel/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>

