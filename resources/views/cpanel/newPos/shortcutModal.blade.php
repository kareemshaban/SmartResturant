<div class="modal fade" id="shortcutModal" tabindex="-1" role="dialog" aria-labelledby="shortcutModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">{{__('main.shortcut')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <table style="width: 100%;" class="table table-bordered table-striped">
                    <thead class="btn-primary">
                    <tr>
                        <th class="text-center">KEY</th>
                        <th class="text-center">Function</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">F9</td>
                        <td class="text-center">{{__('main.pay_prep')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F3</td>
                        <td class="text-center">{{__('main.prepare')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F6</td>
                        <td class="text-center">{{__('main.pay')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F2</td>
                        <td class="text-center">{{__('main.print')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F12</td>
                        <td class="text-center">{{__('main.cancel_order')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">F11</td>
                        <td class="text-center">{{__('main.tables')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">+</td>
                        <td class="text-center">{{__('main.plus')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">-</td>
                        <td class="text-center">{{__('main.mins')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">Del</td>
                        <td class="text-center">{{__('main.del')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
