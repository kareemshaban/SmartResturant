<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.payment_header')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentBody">
                <form method="POST" action="{{ route('payBill') }}"
                      enctype="multipart/form-data" id="payment-form">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.bill_no') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillNo" name="modalBillNo"
                                       class="form-control"
                                       placeholder="{{ __('main.bill_no') }}" readonly/>
                                <input type="text" id="modalBillId" name="modalBillId"
                                       class="form-control"
                                       placeholder="{{ __('main.bill_no') }}" hidden/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.table') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span></label>
                                <input type="text" id="modalTableHall"
                                       class="form-control"
                                       placeholder="{{ __('main.table') }}" readonly/>
                                <input type="text" id="modalTableId" name="modalTableId"
                                       class="form-control"
                                       placeholder="{{ __('main.table') }}" hidden/>
                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-4 " >
                            <div class="form-group">
                                <label>{{ __('main.total') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillTotal" name="modalBillTotal"
                                       class="form-control"
                                       placeholder="{{ __('main.total') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 " >
                            <div class="form-group">
                                <label>{{ __('main.tax') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillTax" name="modalBillTax"
                                       class="form-control"
                                       placeholder="{{ __('main.tax') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 " >
                            <div class="form-group">
                                <label>{{ __('main.service_val') }} / {{__('main.delivery_service')}} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillService" name="modalBillService"
                                       class="form-control"
                                       placeholder="{{ __('main.tax') }}" readonly/>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.discount') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">%</span> </label>
                                <input type="number" step="any" id="modalBillDiscountPer" name="modalBillDiscountPer"
                                       class="form-control" max="100"
                                       placeholder="{{ __('main.discount') }} %" onkeyup="calculateModalDiscount()"
                                       onchange="calculateModalDiscount()" min="0" required
                                       onblur="leaveModalDiscountPer()"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>{{ __('main.discount') }} <span
                                    style="color:red; font-size:20px; font-weight:bold;"></span> </label>
                            <div class="form-group">
                                <input type="number" step="any" id="modalBillDiscount" name="modalBillDiscount"
                                       class="form-control"
                                       placeholder="{{ __('main.discount') }}" onkeyup="calculateModalDiscountPer()"
                                       onchange="calculateModalDiscountPer()" min="0" required
                                       onblur="leaveModalDiscount()"/>
                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.net') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillNet" name="modalBillNet"
                                       class="form-control"
                                       placeholder="{{ __('main.net') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.paid') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillpaid" name="modalBillpaid"
                                       class="form-control"
                                       placeholder="{{ __('main.paid') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group">
                                <label>{{ __('main.tax_after_discount') }} <span
                                        style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                <input type="text" id="modalBillNetTax" name="modalBillNetTax"
                                       class="form-control"
                                       placeholder="{{ __('main.tax_after_discount') }}" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('main.cash') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span>
                                </label>
                                <input type="number" step="any" id="modalBillCash" name="modalBillCash"
                                       class="form-control"
                                       placeholder="{{ __('main.cash') }}" readonly/>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>{{ __('main.visa') }} <span
                                    style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                            <div class="form-group">
                                <input type="number" step="any" id="modalBillCredit" name="modalBillCredit"
                                       class="form-control"
                                       placeholder="{{ __('main.visa') }}" min="0" required
                                       onblur="leaveModalVisa()"/>
                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-6" style="display: block; margin: 20px auto; text-align: center;">
                            <button type="button"  id="modalPaySumbit" class="btn btn-labeled btn-primary">
                                {{__('main.finish_bill')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
