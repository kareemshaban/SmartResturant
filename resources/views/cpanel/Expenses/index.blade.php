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
    @include('layout.side' , ['slag' => 4 , 'subSlag' => 41])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.expenses_type') , 'menue' => __('main.accountancy') ])

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
                                    <th class="text-center">{{ __('main.id') }}</th>
                                    <th class="text-center">{{ __('main.name_ar') }}</th>
                                    <th class="text-center">{{ __('main.name_en') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($expenses as $expense)
                                    @if($expense -> id > 2)
                                        <tr>
                                            <td class="text-center">{{ $expense->index + 1 }}</td>
                                            <td class="text-center">{{ $expense->id }}</td>
                                            <td class="text-center">{{ $expense->name_ar }}</td>
                                            <td class="text-center">{{ $expense->name_en }}</td>
                                            <td class="text-center">

                                                <button
                                                    type="button" class="btn btn-success editBtn" value="{{$expense -> id}}"><i
                                                        class="fas fa-edit"></i></button>
                                                <button
                                                    type="button" class="btn btn-danger deleteBtn" value="{{$expense -> id}}"><i
                                                        class="far fa-trash-alt"></i></button>


                                            </td>
                                        </tr>
                                    @endif
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
    @include('cpanel.Expenses.create')
    @include('deleteModal')
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();

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
                    $(".modal-body #name_ar").val("");
                    $(".modal-body #name_en").val("");
                    $(".modal-body #id").val(0);
                    $(".modal-body #description_ar").val("");
                    $(".modal-body #description_en").val("");
                    $(".modal-body #show_bill_number").prop('checked', false);
                    $(".modal-body #show_supplier_name").prop('checked', false);
                    $(".modal-body #show_tax_number").prop('checked', false);
                    $(".modal-body .form-header").html($('<div>{{trans('main.new_expenses')}}</div>').text());

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
                url:'getExpenses' + '/' + id,
                dataType: 'json',

                success:function(response){
                    console.log(response);
                    if(response){
                        let href = $(this).attr('data-attr');
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            // return the result
                            success: function(result) {
                                $('#createModal').modal("show");
                                $(".modal-body #name_ar").val(response.name_ar);
                                $(".modal-body #name_en").val(response.name_en);
                                $(".modal-body #id").val(response.id);
                                $(".modal-body #description_ar").val(response.description_ar);
                                $(".modal-body #description_en").val(response.description_en);
                                $(".modal-body #show_bill_number").prop( 'checked', response.show_bill_number == 0 ? false : true);
                                $(".modal-body #show_supplier_name").prop('checked', response.show_supplier_name == 0 ? false : true);
                                $(".modal-body #show_tax_number").prop('checked', response.show_tax_number == 0 ? false : true);
                                $(".modal-body .form-header").html($('<div>{{trans('main.edit_expenses')}}</div>').text());

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
        let url = "{{ route('destroyExpenses_type', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }
</script>


</body>
</html>






