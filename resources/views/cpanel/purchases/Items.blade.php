<div class="modal fade" id="ItemsModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document"  style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title"> {{__('main.side_items')}}</label>
                <button type="button" class="close"  data-bs-dismiss="modal"  aria-label="Close" style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <table  id="sTable" class="table items table-striped table-bordered table-condensed table-hover text-center">
                    <thead>
                    <tr>
                        <th>{{__('main.code')}}</th>
                        <th>{{__('main.name_ar')}}</th>
                        <th>{{__('main.name_en')}}</th>
                        <th>{{__('main.item_category')}}</th>
                        <th>{{__('main.quantity')}}</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->code}}</td>
                            <td>{{$item->name_ar}}</td>
                            <td>{{$item->name_en}} </td>
                            <td>{{ Config::get('app.locale') == 'ar' ?  $item->cayegory -> name_ar : $item->cayegory -> name_en}} </td>
                            <td>
                                <button type="button" class="btn btn-labeled btn-primary selectItem" value="{{$item -> code}}" >
                                    <span class="btn-label"><i class="fa fa-dollar"></i></span>{{__('main.select')}}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
