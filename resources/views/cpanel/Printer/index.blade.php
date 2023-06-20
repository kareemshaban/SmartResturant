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
    @include('layout.side' , ['slag' => 10 , 'subSlag' => 1013])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.side_cats') , 'menue' => __('main.side_items') ])

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
                                    <th class="text-center">{{__('main.id')}}</th>
                                    <th class="text-center">{{__('main.printer_name')}}</th>
                                    <th class="text-center">{{__('main.printer_type')}}</th>
                                    <th class="text-center">{{__('main.printer_nickname')}}</th>
                                    <th class="text-center">{{__('main.operations')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($printers as $printer)
                                    <tr>
                                        <td class="text-center">{{ $loop-> index +1}}</td>
                                        <td class="text-center">{{$printer -> id}}</td>
                                        <td class="text-center">{{$printer -> name}}</td>
                                        <td class="text-center">
                                            @if($printer -> type == 1)
                                                {{__('main.printer_type1')}}
                                            @elseif($printer -> type == 2)
                                                {{__('main.printer_type2')}}
                                            @endif

                                        </td>
                                        <td class="text-center">{{$printer -> nickName}}</td>
                                        <td class="text-center">
                                               <button type="button" class="btn btn-success editBtn" value="{{$printer -> id}}"><i class="fas fa-edit"></i></button>
                                             <button type="button" class="btn btn-danger deleteBtn" value="{{$printer -> id}}"><i class="far fa-trash-alt"></i></button>
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

    @include('cpanel.Printer.create')
    @include('deleteModal')
</div>

<script type="text/javascript">
    $(document).ready(function (){
        console.log('ready');
    });
    $(document).on('click', '#createButton', function (event) {
        console.log('clicked');
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
                $(".modal-body #name").val("");
                $(".modal-body #nickName").val("");
                $(".modal-body #type").val("");
                $(".modal-body #id").val(0);




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
            url:'/getPrinter' + '/' + id,
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

                            $(".modal-body #name").val(response.name);
                            $(".modal-body #nickName").val(response.nickName);
                            $(".modal-body #type").val(response.type);
                            $(".modal-body #id").val(response.id);

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




    function confirmDelete(){
        let url = "{{ route('destroyPrinter', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }
</script>


</body>
</html>








