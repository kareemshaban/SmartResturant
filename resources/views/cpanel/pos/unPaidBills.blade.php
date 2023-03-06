


    <div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
         aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document"  style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title"> {{__('main.unpaidBills')}}</label>
                <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <table  id="sTable" class="table items table-striped table-bordered table-condensed table-hover text-center">
                    <thead>
                    <tr>
                        <th>{{__('main.date')}}</th>
                        <th>{{__('main.bill_no')}}</th>
                        <th>{{__('main.total')}}</th>
                        <th>{{__('main.operations')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                        <tr>
                            <td>{{$bill->bill_date}}</td>
                            <td>{{$bill->bill_number}}</td>
                            <td>{{$bill->net}} </td>
                            <td>
                                <button type="button" class="btn btn-labeled btn-primary unPaidPay" value="{{$bill -> bill_number}}" hidden>
                                    <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.pay')}}</button>
                                <button type="button" class="btn btn-labeled btn-warning unPaidShow" value="{{$bill -> bill_number}}">
                                    <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.show_bill')}}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
