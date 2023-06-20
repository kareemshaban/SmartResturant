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
    @include('layout.side' , ['slag' => 2 , 'subSlag' => 23])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.itemMaterials') , 'menue' => __('main.side_items') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-header">
                            <div class="row">
                                <div
                                    class="col-12 @if(Config::get('app.locale') == 'ar') text-right @else text-left @endif">
                                    <button id="createButton" type="button" class="btn btn-labeled btn-warning ">
                                        <span class="btn-label"><i
                                                class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>
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
                                    <th class="text-center">{{ __('main.item') }}</th>
                                    <th class="text-center">{{ __('main.material') }}</th>
                                    <th class="text-center">{{ __('main.quantity') }}</th>
                                    <th class="text-center">{{ __('main.size') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sizess as $size)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{( Config::get('app.locale') == 'ar') ?
                                         $size-> item -> name_ar : $size-> item -> name_en }}</td>
                                        <td class="text-center">{{$size -> qnt}}</td>
                                        <td class="text-center">{{( Config::get('app.locale') == 'ar') ?
                                         $size-> material -> name_ar : $size-> material -> name_en }}</td>
                                        <td class="text-center">{{( Config::get('app.locale') == 'ar') ?
                                    $size-> size -> name_ar : $size-> size -> name_en }}</td>

                                        <td class="text-center">
                                            <button
                                                type="button" class="btn btn-success editBtn" value="{{$size -> id}}"><i
                                                    class="fas fa-edit"></i></button><button
                                                type="button" class="btn btn-danger deleteBtn" value="{{$size -> id}}"><i
                                                    class="far fa-trash-alt"></i></button>
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


    @include('cpanel.itemMaterials.create')
    @include('deleteModal')
</div>




<script type="text/javascript">
    var id = 0;
    $(document).ready(function () {

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
                    sessionStorage.clear();
                    $('#createModal').modal("show");
                    $(".modal-body #size_id").val("");
                    $(".modal-body #level").val('');
                    $(".modal-body #transformFactor").val(1);
                    $(".modal-body #price").val("");
                    $(".modal-body #priceWithAddValue").val("");
                    $(".modal-body #id").val(0);
                    $(".modal-body #qnt").val(0);

                    $(".modal-body .form-header").html($('<div>{{trans('main.new_material')}}</div>').text());


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
                url:'/getItemMaterial' + '/' + id,
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
                                sessionStorage.clear();
                                $('#createModal').modal("show");
                                $(".modal-body #material_id").val(response.material_id);

                                var local = 'ar' ;
                                $.ajax({
                                    type:'get',
                                    url:'/getMaterialSizes' + '/' + response.material_id,
                                    dataType: 'json',

                                    success:function(responsee){

                                        if(responsee){
                                            $("#size_id option[value !='']").remove();
                                            for(let i = 0 ; i < responsee.length ; i++){
                                                $('.modal-body #size_id').append($('<option>', {
                                                    value: responsee[i].id,
                                                    text:  local == 'ar' ? responsee[i].name_ar : responsee[i].name_en
                                                }));
                                            }


                                            $(".modal-body #size_id").val(response.size_id);

                                        } else {

                                        }
                                    }
                                });


                                $(".modal-body #qnt").val(response.qnt);
                                $(".modal-body #level").val(response.level);
                                $(".modal-body #id").val(response.id);
                                $(".modal-body #transformFactor").val(response.transformFactor);
                                $(".modal-body #price").val(response.price);
                                $(".modal-body #priceWithAddValue").val(response.priceWithAddValue);


                                $(".modal-body .form-header").html($('<div>{{trans('main.edit_material')}}</div>').text());
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
        let url = "{{ route('destroyItemMaterial', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }
</script>



</body>
</html>




