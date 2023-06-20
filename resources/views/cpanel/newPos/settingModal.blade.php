<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">{{__('main.settings')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form class="center" method="POST" action="{{ route('store_bill_type') }}"
                      enctype="multipart/form-data" >
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="row" style="margin-bottom: 30px;">


                        <div class="form-group">
                            <label>{{ __('main.def_bill_type') }}</label>
                            <select class="custom-select mr-sm-2" name="def_bill_type" id="def_bill_type" >
                                <option selected value="">Choose...</option>
                                <option  value="1">{{__('main.bill_type1')}}</option>
                                <option  value="2">{{__('main.bill_type2')}}</option>
                                <option  value="3">{{__('main.bill_type3')}}</option>
                                <option  value="4">{{__('main.bill_type4')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row text-center" style="display: flex;justify-content: center;">
                        <div class="col-6 text-center">
                            <button type="submit" class="btn btn-labeled btn-warning" >
                            <span class="btn-label" style="margin-right: 10px"><i
                                    class="fa fa-check"></i></span>{{__('main.save_btn')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
