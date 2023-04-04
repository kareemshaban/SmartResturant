<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header not-print" >
                <label class="modelTitle"> {{__('main.end_shift')}}</label>
         
                <button class="btn btn-info not-print" style="width: 150px" onclick="print_modal()"> <i class="fa fa-print " ></i> Print</button>

            </div>
            <div class="modal-body" id="smallBody">

                <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
                     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                    <div class="container-fluid">
                        @include('flash-message')
                        <form class="center" method="POST" action="{{ route('endShift' , $shift) }}" enctype="multipart/form-data" id="myForm" >

                            <div class="row justify-content-center">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="col-md-11 col-xl-11 data-entry" style="margin-top: 0 !important;">
                                    <div class="card-header px-0 mt-2 bg-transparent clearfix">
                                        <h4 class="float-left pt-2 not-print">{{__('main.end_shift')}}</h4>
                                        <div class="float-right card-header-actions mr-1">


                                            <button type="submit" class="btn btn-labeled btn-primary not-print"  >
                                                <span class="btn-label"><i class="fa fa-power-off"></i></span>{{__('main.end')}}</button>
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


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{__('main.start_money')}}</label>
                                                    <input
                                                        type="number"
                                                        name="end_money"
                                                        id="end_money"
                                                        class="form-control"
                                                        value="{{$start_money}}"
                                                        autofocus
                                                        step="any"
                                                        disabled

                                                    />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{__('main.end_money')}}</label>
                                                    <input
                                                        type="number"
                                                        name="end_money"
                                                        id="end_money"
                                                        class="form-control"
                                                        value="{{$net}}"
                                                        autofocus
                                                        step="any"

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
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

    });
    function print_modal(){
        const originalHTML = document.body.innerHTML;
        document.body.innerHTML = document.getElementById('paymentsModal').innerHTML;
        document.querySelectorAll('.not-print')
            .forEach(img => img.remove())
        window.print();
        document.body.innerHTML = originalHTML;


    }
</script>
