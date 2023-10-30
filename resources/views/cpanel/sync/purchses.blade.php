<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modelTitle"> {{__('main.sync_purchase')}}</label>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                           <h2 class="text-danger"> {{ __('main.sales_sync_alert') }} </h2>
                        </div>
                    </div>
                    <div class="alert alert-success alert-block" style="text-align: center; display: none"  id="tost">

                        <button type="button" class="close" style="float: left;" onclick="setDisplayNone()">×</button>

                            <label id="message"></label>

                    </div>
                    <div class="row" style="justify-content: center;padding: 30px;">
                        <div class="spinner-border text-primary" role="status" id="loader" style="display: none">
                            <span class="sr-only">Loading...</span>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-6 text-center">


                                <button id="import" type="button" class="btn btn-labeled btn-warning " onclick="impotItems()">
                                    <span class="btn-label"><i
                                            class="fa fa-download"></i></span>{{__('main.import')}}</button>

                          </div>
                          <div class="col-6 text-center">
                            <button id="export" type="button" class="btn btn-labeled btn-danger " onclick="exportItems()">
                                <span class="btn-label"><i
                                        class="fa fa-upload"></i></span>{{__('main.export')}}</button>
                          </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function setDisplayNone(){
        $("#tost").css("display", "none");
    }

   function impotItems(){
    $("#loader").css("display", "block");


    $.ajax({
            type:'get',
            url:'/importPurchase',
            dataType: 'json',

            success:function(response){
                console.log(response);
                if(response){
                    $("#loader").css("display", "none");
                    $("#tost").css("display", "block");
                  $('#message').html(response)  ;
                } else {

                }
            }
        });


   }
   function exportItems(){
    $("#loader").css("display", "block");
    $.ajax({
            type:'get',
            url:'/exportPurchase',
            dataType: 'json',

            success:function(response){
                console.log(response);
                if(response){
                    $("#loader").css("display", "none");
                    $("#tost").css("display", "block");
                    $('#message').html('Your Local Items has been Synced to server')  ;
                    console.log(response);
                } else {

                }
            },
            error: function(err) {
                console.log(err.status);
                if(err.status == 200){
                    $("#loader").css("display", "none");
                    $("#tost").css("display", "block");
                    $('#message').html('Your Local Items has been Synced to server')  ;
                }
            }
        });
   }



</script>

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}




