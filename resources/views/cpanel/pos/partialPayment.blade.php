


<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document"  style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title"> {{__('main.pay_partial')}}</label>
                <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">


                    <form method="POST" action="{{ route('partialPaymentAction') }}"
                          enctype="multipart/form-data" id="partial-payment-form">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.bill_no') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="modalBillNo2" name="modalBillNo2"
                                           class="form-control" value="{{$bill -> bill_number}}"
                                           placeholder="{{ __('main.bill_no') }}" readonly/>
                                    <input type="text" id="modalBillId2" name="modalBillId2"
                                           class="form-control" value="{{$bill -> id}}"
                                           placeholder="{{ __('main.bill_no') }}" hidden/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.table') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                    <input type="text" id="modalTableHall2"
                                           class="form-control" value="{{Config::get('app.locale') == 'ar' ? ($bill -> table -> name_ar . '--' . $bill -> table -> hall -> name_ar) :
                    ($bill -> table -> name_en . '--' . $bill -> table -> hall ->name_en)}}"
                                           placeholder="{{ __('main.table') }}" readonly/>
                                    <input type="text" id="modalTableId2" name="modalTableId2"
                                           class="form-control" value="{{$bill -> table  -> id}}"
                                           placeholder="{{ __('main.table') }}" hidden/>
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <table  id="sTable" class="table items table-striped table-bordered table-condensed table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">{{ __('main.item') }}</th>
                                    <th class="text-center">{{ __('main.size') }}</th>
                                    <th class="text-center">{{ __('main.quantity') }}</th>
                                    <th class="text-center">{{ __('main.price') }}</th>
                                    <th class="text-center">{{ __('main.total') }}</th>
                                    <th class="text-center">{{ __('main.payed') . ' ?' }}</th>
                                    <th class="text-center">{{__('main.select')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bill -> details as $detail)
                                    <tr >
                                        <td hidden> <input name="detailsId[]" value="{{$detail -> id}}">  </td>
                                        <td>{{Config::get('app.locale') == 'ar' ? $detail -> items[0] -> item -> name_ar : $detail.items[0].item.name_en}}</td>
                                        <td>{{$detail -> items[0] -> size -> label}}</td>
                                        <td>{{$detail->qnt}} </td>
                                        <td>{{$detail->priceWithVat}} </td>
                                        <td>{{$detail->totalWithVat}} </td>
                                        <td>{{$detail-> payed == 1 ? __('main.yes') : __('main.no')}} </td>
                                        @if($detail-> payed == 0)
                                        <td><input type="checkbox" name="select[]" value="{{$detail -> id}}" onchange="rowCheckChange(this)"/> </td>
                                            @else
                                            <td><input type="checkbox" name="select[]" value="{{$detail -> id}}" onchange="rowCheckChange(this)" disabled/> </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="col-4 " >
                                <div class="form-group">
                                    <label>{{ __('main.total') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="modalBillTotal2" name="modalBillTotal2"
                                           class="form-control" value="0"
                                           placeholder="{{ __('main.total') }}" readonly/>
                                </div>
                            </div>
                            <div class="col-4 " >
                                <div class="form-group">
                                    <label>{{ __('main.tax') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="modalBillTax2" name="modalBillTax2"
                                           class="form-control" value="0"
                                           placeholder="{{ __('main.tax') }}" readonly/>
                                </div>
                            </div>
                            <div class="col-4 " >
                                <div class="form-group">
                                    <label>{{ __('main.service_val') }} / {{__('main.delivery_service')}} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="modalBillService2" name="modalBillService2"
                                           class="form-control" value="0"
                                           placeholder="{{ __('main.tax') }}" readonly/>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-6 text-center " style="display: block; margin: auto">
                                <div class="form-group">
                                    <label>{{ __('main.net') }} <span
                                            style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text" id="modalBillNet2" name="modalBillNet2"
                                           class="form-control" value="0"
                                           placeholder="{{ __('main.net') }}" readonly/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.cash') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span>
                                    </label>
                                    <input type="number" step="any" id="modalBillCash2" name="modalBillCash2"
                                           class="form-control" value="0"
                                           placeholder="{{ __('main.cash') }}" readonly/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label>{{ __('main.visa') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <div class="form-group">
                                    <input type="number" step="any" id="modalBillCredit2" name="modalBillCredit2"
                                           class="form-control" value="0"
                                           placeholder="{{ __('main.visa') }}" min="0" required
                                           onblur="leaveVisa2()"/>
                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-6" style="display: block; margin: 20px auto; text-align: center;">
                                <button type="submit"  id="modalPartialPaySumbit" class="btn btn-labeled btn-primary">
                                    {{__('main.finish_bill')}}</button>
                            </div>
                        </div>
                    </form>

                  <input type="hidden" value="{{$bill -> total}}" id="nettt">
                <input type="hidden" value="{{$bill -> vat}}" id="vatttt">
                <input type="hidden" value="{{$bill -> billType}}" id="billTypeeee">
                <input type="hidden" value="{{$bill -> serviceVal}}" id="serviceValll">
                <input type="hidden" value="{{$bill -> delivery_service}}" id="delivery_serviceee">
            </div>
        </div>
    </div>
</div>
<script>

    $('#modalBillCredit2').keyup(function () {
        const total = document.getElementById('modalBillNet2').value;
        const visa = document.getElementById('modalBillCredit2').value;
        const cash = total - visa;
        document.getElementById('modalBillCash2').value = cash;
    });
    $('#modalBillCredit2').change(function () {
        const total = document.getElementById('modalBillNet2').value;
        const visa = document.getElementById('modalBillCredit2').value;
        const cash = total - visa;
        document.getElementById('modalBillCash2').value = cash;
    });

    function rowCheckChange(ele){
        var total = 0 ;
        $('#sTable input[type="checkbox"]:checked').each(function() {
            total += Number ($(this).closest("tr")[0].cells[5].innerHTML);
          //  console.log($(this).closest("tr")[0].cells[5].innerHTML);

        });

        const net = $('#nettt').val();
        const vat = $('#vatttt').val();
        const vatPer = (net / vat);
        const totalNovat = (total / (1 + (vatPer / 100))).toFixed(2) ;
        const vatVal = total - totalNovat ;
        const billTypeeee = $('#billTypeeee').val();
        const serviceValll = $('#serviceValll').val();
        const delivery_serviceee = $('#delivery_serviceee').val();


        $('#modalBillTax2').val( vatVal.toFixed(2));
        $('#modalBillTotal2').val(totalNovat);
        $('#modalBillNet2').val(total);
        $('#modalBillCash2').val(total);



        if (billTypeeee > 1) {
            $('#modalBillService2').value = serviceValll;
        } else {
            $('#modalBillService2').value = delivery_serviceee;

        }

    }
    function leaveVisa2(){
        console.log('blured');
        var modalBillCredit2 = document.getElementById('modalBillCredit2');
        if(!modalBillCredit2.value){
            modalBillCredit2.value = 0 ;
        }
    }
</script>
