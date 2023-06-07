<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.new_shift')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">

                <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
                     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                    <div class="container-fluid">
                        @include('flash-message')
                        <form class="center" method="POST" action="{{ route('storeShift') }}"
                              enctype="multipart/form-data">

                            <div class="row justify-content-center">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="col-md-11 col-xl-11 data-entry" style="margin-top: 0 !important;">
                                    <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                        <h4 class="float-left pt-2">{{__('main.new_shift')}}</h4>
                                        <div class="float-right card-header-actions mr-1">
                                            <button type="submit" class="btn btn-labeled btn-primary ">
                                                <span class="btn-label"><i
                                                        class="fa fa-power-off"></i></span>{{__('main.start')}}</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <label>{{__('main.user')}}</label>
                                            <input
                                                type="text"
                                                name="name_ar"
                                                id="name_ar"
                                                class="form-control"
                                                value="{{$name}} -- {{ $user}}"
                                                disabled
                                                style="text-align: center"
                                            />
                                            <input
                                                type="text"
                                                name="user_id"
                                                id="user_id"
                                                class="form-control"
                                                value="{{$user}}"
                                                hidden
                                            />

                                        </div>

                                        <div class="form-group">
                                            <label>{{__('main.start_money')}}</label>
                                            <input
                                                type="number"
                                                name="start_money"
                                                id="start_money"
                                                class="form-control"
                                                placeholder="{{__('main.start_money')}}"
                                                autofocus
                                                step="any"
                                                required
                                                min="0"

                                            />
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

