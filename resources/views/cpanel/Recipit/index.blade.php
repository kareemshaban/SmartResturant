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
    @include('layout.side' , ['slag' => 4 , 'subSlag' => 42])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.recipt') , 'menue' => __('main.accountancy') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 @if(Config::get('app.locale') == 'ar') text-right @else text-left @endif">
                                    <button id="createButton" type="button" class="btn btn-labeled btn-warning ">
                                        <span class="btn-label"><i
                                                class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" @if(Config::get('app.locale') == 'ar') style="direction: rtl" @else style="direction: ltr" @endif">
                            <table id="table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('main.doc_date') }}</th>
                                    <th class="text-center">{{ __('main.doc_number') }}</th>
                                    <th class="text-center">{{ __('main.doc_type') }}</th>
                                    <th class="text-center">{{ __('main.amount') }}</th>
                                    <th class="text-center">{{ __('main.net') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $bill-> doc_date}}</td>
                                        <td class="text-center">{{ $bill-> bill_number}}</td>
                                        <td class="text-center"> {{( Config::get('app.locale') == 'ar') ? $bill-> doc -> name_ar : $bill-> doc -> name_en}}    </td>
                                        <td class="text-center"> {{ $bill-> amount}}   </td>
                                        <td class="text-center"> {{ $bill-> amount_with_tax}}   </td>

                                        <td class="text-center">

                                            <button
                                                type="button" class="btn btn-success editBtn" value="{{$bill -> id}}"><i
                                                    class="fas fa-edit"></i></button>
                                            <button
                                                type="button" class="btn btn-danger deleteBtn" value="{{$bill -> id}}"><i
                                                    class="far fa-trash-alt"></i></button>
                                            <br>
                                            <br>

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


    @include('cpanel.Recipit.create')
    @include('deleteModal')
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#createButton', function (event) {
            id = 0;
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#createModal').modal("show");
                    $(".modal-body #id").val(0);
                    $(".modal-body #doc_type").val("");
                    $(".modal-body #tax_type").val("");
                    $(".modal-body #amount").val("");
                    $(".modal-body #tax").val("");
                    $(".modal-body #taxPer").val('');
                    $(".modal-body #amount_with_tax").val('');
                    $(".modal-body #bill_number_txt").val('');
                    $(".modal-body #tax_number_txt").val('');
                    $(".modal-body #supplier_id").val('');
                    $(".modal-body .form-header").html($('<div>{{trans('main.new_recipit')}}</div>').text());

                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        $(document).on('click', '.editBtn', function(event) {
            id = event.currentTarget.value ;
            console.log(id);
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                type:'get',
                url:'getRecipit' + '/' + id,
                dataType: 'json',

                success:function(response){
                    if(response){
                        var now = new Date(response.doc_date);

                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


                        let href = $(this).attr('data-attr');
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            // return the result


                            success: function(result) {
                                $('#createModal').modal("show");
                                $(".modal-body #bill_number").val(response.bill_number);
                                $(".modal-body #id").val(response.id);
                                $(".modal-body #doc_date").val(today);
                                $(".modal-body #doc_type").val(response.doc_type);
                                $(".modal-body #tax_type").val(response.tax_type);
                                $(".modal-body #amount").val(response.amount);
                                $(".modal-body #tax").val(response.tax);
                                $(".modal-body #taxPer").val((response.tax / response.amount) * 100);
                                $(".modal-body #amount_with_tax").val(response.amount_with_tax);
                                $(".modal-body #bill_number_txt").val(response.bill_number_txt);
                                $(".modal-body #tax_number_txt").val(response.tax_number_txt);
                                $(".modal-body #supplier_id").val(response.supplier_id);
                                $(".modal-body .form-header").html($('<div>{{trans('main.edit_recipit')}}</div>').text());

                                $.ajax({
                                    type: 'get',
                                    url: 'getExpense/' + response.doc_type,
                                    dataType: 'json',
                                    success: function (res) {
                                        console.log(res);

                                        if (res) {
                                            if (res.show_bill_number == 0) {
                                                $(".modal-body #show_bill_number").slideUp();
                                            } else {
                                                $(".modal-body #show_bill_number").slideDown();
                                            }
                                            if (res.show_supplier_name == 0) {
                                                $(".modal-body #show_supplier_name").slideUp();
                                            } else {
                                                $(".modal-body #show_supplier_name").slideDown();
                                            }
                                            if (res.show_tax_number == 0) {
                                                $(".modal-body #show_tax_number").slideUp();
                                            } else {
                                                $(".modal-body #show_tax_number").slideDown();
                                            }

                                        } else {
                                            $("#show_bill_number").slideUp();
                                            $("#show_supplier_name").slideUp();
                                            $("#show_tax_number").slideUp();
                                        }
                                    }
                                });

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
                    } else {

                    }
                }
            });
        });

        $(document).on('click', '.deleteBtn', function(event) {
            id = event.currentTarget.value ;
            console.log(id);
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
        $(document).on('click', '.btnConfirmDelete', function(event) {
            console.log(id);
            confirmDelete();
        });
        $(document).on('click', '.cancel-modal', function(event) {
            $('#deleteModal').modal("hide");
            console.log()
            id = 0 ;
        });
    });

    function confirmDelete(){
        let url = "{{ route('destroyRecipt', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }


    function getExpense(id){
        console.log(id)
        $.ajax({
            type: 'get',
            url: '/getExpense/' + id,
            dataType: 'json',

            success: function (response) {
                console.log(response);

                if (response) {
                    if(response.show_bill_number == 0){
                        $(".modal-body #show_bill_number").slideUp();
                    }else {
                        $(".modal-body #show_bill_number").slideDown();
                    }
                    if(response.show_supplier_name == 0){
                        $(".modal-body #show_supplier_name").slideUp();
                    } else {
                        $(".modal-body #show_supplier_name").slideDown();
                    }
                    if(response.show_tax_number == 0){
                        $(".modal-body #show_tax_number").slideUp();
                    } else {
                        $(".modal-body #show_tax_number").slideDown();
                    }

                } else {
                    $(".modal-body #show_bill_number").slideUp();
                    $(".modal-body #show_supplier_name").slideUp();
                    $(".modal-body #show_tax_number").slideUp();
                }
            }
        });
    }
</script>


</body>
</html>
