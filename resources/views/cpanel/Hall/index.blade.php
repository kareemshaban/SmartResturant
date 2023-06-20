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
    @include('layout.side' , ['slag' => 10 , 'subSlag' => 1011])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.halls') , 'menue' => __('main.side_items') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 @if(Config::get('app.locale') == 'ar') text-right @else text-left @endif">

                                    <button type="button" class="btn btn-labeled btn-success " style="margin-left: 30px;" id="showBtn">
                                        <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.show_machines')}}</button>

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
                                @foreach ($halls as $hall)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $hall->id }}</td>
                                        <td class="text-center">{{ $hall->name_ar }}</td>
                                        <td class="text-center">{{ $hall->name_en }}</td>
                                        <td class="text-center">
                                             <button type="button" class="btn btn-success editBtn" value="{{$hall -> id}}"> <i
                                                        class="fas fa-edit"></i></button>
                                         <button type="button" class="btn btn-danger deleteBtn" value="{{$hall -> id}}"><i
                                                        class="far fa-trash-alt"></i></button>
                                            <button type="button" class="btn btn-info" onclick="showModalMachine( {{$hall -> id }}  )">{{__('main.add_machine')}}</button>

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


    <div class="modal fade" id="MachineShowModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modelTitle"> {{__('main.machines')}}</label>
                    <button type="button" class="close modal-close-btn"  data-bs-dismiss="modal"  aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="paymentBody">
                    <form   method="POST" action="{{ route('storeMachine') }}"
                            enctype="multipart/form-data" >
                        @csrf

                        <div class="row">
                            <div class="col-12 " >
                                <div class="form-group">
                                    <label>{{ __('main.hall') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="hall" name="hall"
                                           class="form-control"
                                           placeholder="{{ __('main.symbol') }}"  readonly/>
                                    <input hidden="hidden" id="hall_id" name="hall_id" type="text"/>
                                    <input hidden="hidden" id="mac_address" name="mac_address" type="text"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('main.machine_code') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="code" name="code"
                                           class="form-control" readonly
                                           placeholder="{{ __('main.machine_code') }}"  />
                                    <input type="text"  id="id" name="id"
                                           class="form-control"
                                           placeholder="{{ __('main.code') }}"  hidden=""/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 " >
                                <div class="form-group">
                                    <label>{{ __('main.machine_name') }} <span style="color:red; font-size:20px; font-weight:bold;">*</span> </label>
                                    <input type="text"  id="name" name="name"
                                           class="form-control"
                                           placeholder="{{ __('main.machine_name') }}"  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6" style="display: block; margin: 20px auto; text-align: center;">
                                <button type="submit" class="btn btn-labeled btn-primary"  >
                                    {{__('main.save_btn')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('layout.footer')

    @include('cpanel.Hall.create')
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
                $(".modal-body #name_ar").val("");
                $(".modal-body #name_en").val("");
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
            url:'/getHall' + '/' + id,
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

                            $(".modal-body #name_ar").val( response.name_ar );
                            $(".modal-body #name_en").val( response.name_en );
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

    $(document).on('click', '#showBtn', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type: 'get',
            url: 'getMachines' ,
            dataType: 'json',

            success: function (response) {
                console.log(response);
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#showModal').modal("show");
                        var table = document.getElementById('body');
                         $('#body').empty();
                        for (let i = 0 ; i < response.length ; i++){
                            var row =table.insertRow(-1);
                            row.className = "text-center";
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            cell1.className = "text-center";
                            cell2.className = "text-center";
                            cell3.className = "text-center";
                            cell4.className = "text-center";
                            cell5.className = "text-center";

                            cell1.innerHTML = i + 1;
                            cell2.innerHTML = response[i].id;
                            cell3.innerHTML = response[i].code;
                            cell4.innerHTML = response[i].name;
                            cell5.innerHTML = response[i].hall.name_ar ;


                        }
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
            }
        });




    });


    function confirmDelete(){
        let url = "{{ route('destroyHall', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }


    function showModalMachine(id ){
        $.ajax({
            type:'get',
            url:'getHall' + '/' + id,
            dataType: 'json',

            success:function(response){
                console.log(response);
                if(response){
                    let href = $(this).attr('data-attr');
                    console.log(name);
                    $.ajax({
                        url: href,
                        beforeSend: function() {
                            $('#loader').show();
                        },
                        // return the result
                        success: function(result) {
                            $('#MachineShowModal').modal("show");
                            $(".modal-body #name").val( "" );
                            $.ajax({
                                type:'get',
                                url:'getMachineNo',
                                dataType: 'json',
                                success:function(response){
                                    console.log(response);
                                    if(response){
                                        $(".modal-body #code").val( response );

                                    }
                                }
                            });
                            $.ajax({
                                type:'get',
                                url:'getMac',
                                dataType: 'json',
                                success:function(response){
                                    console.log(response);
                                    if(response){
                                        $(".modal-body #mac_address").val( response );

                                    }
                                }
                            });
                            $(".modal-body #hall").val( response.name_ar + '---' + response.name_en);
                            $(".modal-body #hall_id").val( id );
                            $(".modal-body #id").val( 0 );
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


    }

</script>


</body>
</html>








