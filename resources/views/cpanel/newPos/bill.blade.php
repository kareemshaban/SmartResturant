<h2 class="text-center btn-danger" id="canceled_bill"> فاتورة ملغاة</h2>
<div class="menue" id="bill">
    <div class="row" data-aos="fade-up">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters" style="background: #F5F5F5 ;">
                <li class="filter-active" onclick="selectBillType(this , 1)"
                    id="default_type">{{__('main.bill_type1')}}</li>
                <li onclick="selectBillType(this , 2)" id="default_type2">{{__('main.bill_type2')}}</li>
                <li onclick="selectBillType(this , 3)" id="default_type3">{{__('main.bill_type3')}}</li>
                <li onclick="selectBillType(this , 4)" id="default_type4">{{__('main.bill_type4')}}</li>
            </ul>
        </div>
    </div>
    <form class="center" method="POST" action="{{ route('storeBill') }}"
          enctype="multipart/form-data" id="header-form">
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="row justify-content-center">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="card-body px-0" style="margin: 0 ; padding: 0;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>{{ __('main.client') }}</label>
                                <select
                                    class="form-select @error('client_id') is-invalid @enderror"
                                    name="client_id" id="client_id" onchange="selectClient()">
                                    <option selected value="">Choose...</option>
                                    @foreach($clients as $item)
                                        @if($item -> type == 0)
                                            <option
                                                value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('client_id')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label>{{ __('main.phone') }}</label>
                                <input type="text"
                                       class="form-control"
                                       id="phone" name="phone"
                                       placeholder="{{ __('main.phone') }}" autofocus/>
                                <input type="text"
                                       class="form-control"
                                       id="client_name" name="client_name" hidden/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('main.address') }}</label>
                        <input type="text" name="address" id="address"
                               class="form-control"
                               placeholder="{{ __('main.address') }}" autofocus/>
                    </div>
                    <div class="form-group" id="driver_data">
                        <div class="row">
                            <div class="col-6">
                                <label>{{ __('main.driver') }}</label>
                                <select
                                    class="form-select @error('driver_id') is-invalid @enderror"
                                    name="driver_id" id="driver_id" onchange="selectDriver()">
                                    <option selected value="">Choose...</option>
                                    @foreach($employees as $item)
                                        <option
                                            value="{{$item -> id}}"> {{ ( Config::get('app.locale') == 'ar') ? $item -> name_ar : $item -> name_en  }}</option>
                                    @endforeach
                                </select>

                                @error('driver_id')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label>{{ __('main.delivery_service') }}</label>
                                <input type="number" name="delivery_service" id="delivery_service"
                                       class="form-control"
                                       placeholder="{{ __('main.delivery_service') }}" autofocus
                                       onkeyup="calculateDeliveryService()"
                                       onchange="calculateDeliveryService()"
                                />
                                <input type="text"
                                       class="form-control"
                                       id="driver_name" name="driver_name" hidden/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="hall_data">
                        <div class="row">
                            <div class="col-6">
                                <label>{{ __('main.table') }}</label>

                                <input type="text"
                                       class="form-control text-center @error('table_id') is-invalid @enderror"
                                       id="table_name" name="table_name" readonly
                                       style="font-size: 14px;"/>
                                <input type="text"
                                       class="form-control text-center" id="table_id" name="table_id"
                                       hidden/>

                                @error('table_id')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label>{{ __('main.service') }}</label>
                                <input type="number" name="service" id="service"
                                       class="form-control"
                                       placeholder="{{ __('main.service') }}" readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="form-group last-form">
                        <input id="bill_type" name="billType" hidden type="text">
                    </div>


                </div>

            </div>

        </div>

        <div class="table-responsive">
            <div class="row justify-content-center">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="card-body px-0" style="margin: 0 ; padding: 0;">
                        <div class="table-wrap-height">
                            <table id="details" class="table  " style="width:100%; direction: rtl">
                                <thead >
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center" hidden>item_id</th>
                                    <th class="text-center" hidden>size_id</th>
                                    <th class="text-center" hidden>item_size_id</th>
                                    <th class="text-center" hidden>details_id</th>
                                    <th class="text-center" hidden>isExtra</th>
                                    <th class="text-center">{{ __('main.item') }}</th>
                                    <th class="text-center">{{ __('main.size') }}</th>
                                    <th class="text-center">{{ __('main.quantity') }}</th>
                                    <th class="text-center">{{ __('main.price') }}</th>
                                    <th class="text-center">{{ __('main.total') }}</th>
                                    <th class="text-center" hidden>price without vat</th>
                                    <th class="text-center" hidden>total without vat</th>
                                    <th class="text-center">{{ __('main.select') }}</th>
                                    <th class="text-center" hidden>extraitemId</th>
                                    <th class="text-center" hidden>category_id</th>

                                </tr>
                                </thead>
                                <tbody id="details-body">


                                </tbody>


                            </table>
                        </div>


                        <div class="table-wrap-height">
                            <table id="totalls" class="table table-bordered "
                                   style="width:100%; direction: rtl">
                                <tr>
                                    <th> {{ __('main.date') }}</th>
                                    <td colspan="3"><input type="text"
                                                           id="date" name="bill_date"
                                                           class="form-control text-center"
                                                           placeholder="{{ __('main.date') }}" autofocus
                                                           value="{{\Carbon\Carbon::now()}}" readonly/></td>
                                </tr>
                                <tr>
                                    <th> {{ __('main.bill_no') }}</th>
                                    <td colspan="3"><input type="text" id="bill_number" name="bill_number"
                                                           class="form-control text-center"
                                                           placeholder="{{ __('main.bill_no') }}" autofocus
                                                           readonly/>
                                        <input type="text" id="identifier" name="identifier"
                                               class="form-control text-center"
                                               placeholder="identifier" hidden=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <th> {{ __('main.total') }}</th>
                                    <td><input type="text"
                                               class="form-control text-center"
                                               id="total" name="total"
                                               autofocus readonly
                                               value="0"/>

                                    </td>
                                    <th> {{ __('main.Vat') }}</th>
                                    <td><input type="text"
                                               class="form-control text-center" id="vat" name="vat"
                                               placeholder="{{ __('main.Vat') }}" autofocus readonly
                                               value="0"/>

                                    </td>
                                </tr>

                                <tr>
                                    <th> {{ __('main.discount') }}</th>
                                    <td><input type="text"
                                               class="form-control text-center"
                                               id="discount" name="discount"
                                               placeholder="{{ __('main.discount') }}" autofocus readonly
                                               value="0"/>

                                    </td>
                                    <th> {{ __('main.net') }}</th>
                                    <td><input type="text"
                                               class="form-control text-center" id="net" name="net"
                                               placeholder="{{ __('main.net') }}" autofocus readonly
                                               value="0"/>
                                        <input type="text"
                                               class="form-control text-center" id="cash" name="cash"
                                               placeholder="{{ __('main.cash') }}" hidden value="0"/>
                                        <input type="text"
                                               class="form-control text-center" id="credit" name="credit"
                                               placeholder="{{ __('main.credit') }}" hidden value="0"/>
                                        <input type="text"
                                               class="form-control text-center" id="bank" name="bank"
                                               placeholder="{{ __('main.net') }}" hidden value="0"/>
                                        <input type="text"
                                               class="form-control text-center" id="serviceVal"
                                               name="serviceVal"
                                               placeholder="{{ __('main.service_val') }}" autofocus readonly
                                               value="0" hidden/>

                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </form>
</div>
