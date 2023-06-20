<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <img src="../../images/warning.png" class="alertImage">
                <label class="alertTitle">{{__('main.booked_table_title')}}</label>
                <br> <label class="alertSubTitle" id="modal_table_bill"></label>
                <div class="row">
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-warning" onclick="setBill()">
                            <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.show_bill')}}</button>
                    </div>
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-labeled btn-primary paymentBillButton">
                            <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.pay')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
