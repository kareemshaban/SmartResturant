<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('layout.header')


<body>


<div
    id="main-wrapper"
    data-layout="vertical"
    data-navbarbg="skin5"
    data-sidebartype="full"
    data-sidebar-position="absolute"
    data-header-position="absolute"
    data-boxed-layout="full"
>

    @include('layout.subHeader')
    @include('layout.side' , ['slag' => 3 , 'subSlag' => 31])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.purchases_list') , 'menue' => __('main.purchases') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-header">
                            <div class="row">
                                <div
                                    class="col-12 @if(Config::get('app.locale') == 'ar') text-right @else text-left @endif">
                                    <a href="{{route('create_purchase')}}">
                                    <button  type="button" class="btn btn-labeled btn-warning ">
                                        <span class="btn-label"><i
                                                class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" @if(Config::get('app.locale') == 'ar') style="direction: rtl"
                                 @else style="direction: ltr" @endif">

                            <table id="table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{__('main.bill_date')}}</th>
                                     <th class="text-center">{{__('main.bill_number')}}</th>
                                     <th class="text-center">{{__('main.customer')}}</th>
                                     <th class="text-center">{{__('main.total')}}</th>
                                     <th class="text-center">{{__('main.tax')}}</th>
                                     <th class="text-center">{{__('main.discount')}}</th>
                                     <th class="text-center">{{__('main.net')}}</th>
                                     <th class="text-center">{{__('main.paid')}}</th>
                                     <th class="text-center">{{__('main.remain')}}</th>
                                     <th class="text-center">{{__('main.InvoiceType')}}</th>

                                    <th class="text-center">{{__('main.operations')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $process)
                                    <tr>
                                        <td class="text-center">{{$process->id}}</td>
                                        <td class="text-center">{{$process->date}}</td>
                                        <td class="text-center">{{$process->invoice_no}}</td>
                                        <td class="text-center">{{ Config::get('app.locale') == 'ar' ? $process->customer_name_ar : $process->customer_name_en}}</td>
                                        <td class="text-center">{{$process->total}}</td>
                                        <td class="text-center">{{$process->tax}}</td>
                                        <td class="text-center">{{$process->discount}}</td>
                                        <td class="text-center">{{$process->net}}</td>
                                        <td class="text-center">{{$process->paid}}</td>
                                        <td class="text-center">{{$process->net - $process->paid}}</td>
                                        <td class="text-center">
                                            @if($process->net > 0)
                                                <span class="badge bg-success">{{__('main.purchases')}}</span>
                                            @else
                                                <span class="badge bg-danger">{{__('main.return_purchase')}}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ __('main.operations') }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="javascript:;" onclick="showPayments({{$process->id}})">
                                                        <button type="button" class="btn btn-success" value="{{$process -> id}}" style="width: 100% ; color: white" >
                                                            <i class="fas fa-eye"></i>{{__('main.view_payments')}}</button>
                                                    </a>
                                                    @if(abs($process->net) - abs($process->paid) > 0)
                                                    <a class="dropdown-item" href="javascript:;" onclick="addPayments({{$process->id}})">
                                                        <button type="button" class="btn btn-secondary"  style="width: 100% ; color: white">
                                                            <i class="fas fa-money-bill-alt"></i>{{__('main.add_payment')}}</button>
                                                    </a>
                                                    @endif
                                                    <a class="dropdown-item" href="javascript:;" onclick="view_purchase({{$process->id}})">
                                                        <button type="button" class="btn btn-warning" style="width: 100% ; color: white"  >
                                                            <i class="fas fa-search"></i>{{__('main.preview')}}</button>
                                                    </a>

                                                        <a class="dropdown-item"  href="">
                                                            <button type="button" class="btn btn-danger deleteBtn" style="width: 100% ; color: white" id="{{$process->id}}">
                                                                <i class="fas fa-trash"></i>{{__('main.delete')}}</button>
                                                        </a>

                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    @include('layout.footer')


    @include('deleteModal')
</div>

<script type="text/javascript">
    let id = 0 ;
    $(document).ready(function() {
        id = 0;
        $(document).on('click', '.deleteBtn', function(event) {
            id = event.currentTarget.id ;
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#deleteModal').modal("show");
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
        $(document).on('click' , '.cancel-modal' , function (event) {
            $('#deleteModal').modal("hide");
            id = 0 ;
        });
    });

    function confirmDelete(){
        let url = "{{ route('delete_purchase', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

    function showPayments(id) {
        var route = '{{route('purchases_payments',":id")}}';
        route = route.replace(":id",id);

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }

    function addPayments(id) {
        var route = '{{route('add_purchases_payments',":id")}}';
        route = route.replace(":id",id);

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }

    function view_purchase(id) {
        console.log(id);
        var route = '{{route('preview_purchase',":id")}}';
        route = route.replace(":id",id);

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }

</script>

<div class="show_modal">

</div>
</body>
</html>







