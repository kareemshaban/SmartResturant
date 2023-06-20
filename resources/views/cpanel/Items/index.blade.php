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
        @include('layout.cramp' , ['page_Title' => __('main.menue_items') , 'menue' => __('main.side_items') ])

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
                                    <th class="text-center">{{ __('main.id') }}</th>
                                    <th class="text-center">{{ __('main.img') }}</th>
                                    <th class="text-center">{{ __('main.item_category') }}</th>
                                    <th class="text-center">{{ __('main.name_ar') }}</th>
                                    <th class="text-center">{{ __('main.name_en') }}</th>
                                    <th class="text-center">{{ __('main.item_type') }}</th>
                                    <th class="text-center">{{ __('main.quantity') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $item->code }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('images/Item/' . $item->img) }}" height=50 width=50 alt="Item image">
                                        </td>
                                        <td class="text-center">{{ ( Config::get('app.locale') == 'ar') ? $item->cayegory -> name_ar :
                                        $item->cayegory -> name_en }}</td>
                                        <td class="text-center">{{ $item->name_ar }}</td>
                                        <td class="text-center">{{ $item->name_en }}</td>
                                        <td class="text-center">@if ($item -> type == 0){{__('main.item_type1')}} @elseif ($item -> type == 1) {{  __('main.item_type2')   }}
                                            @else  {{ __('main.item_type3') }}
                                            @endif </td>

                                        <td class="text-center"> {{$item -> type != 2 ? 0 : $item -> qnt}}    </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ __('main.operations') }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">
                                                        <button type="button" class="btn btn-success editBtn" value="{{$item -> id}}" style="width: 100% ; color: white">
                                                            <i class="fas fa-tr"></i>{{__('main.edit_btn')}}</button>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <button type="button" class="btn btn-danger deleteBtn" value="{{$item -> id}}" style="width: 100% ; color: white">
                                                            <i class="fas fa-trash"></i>{{__('main.delete')}}</button>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('itemSizes' , $item -> id)}}">
                                                        <button type="button" class="btn btn-warning" style="width: 100% ; color: white">
                                                            <i class="fas fa-adjust"></i>{{__('main.item_sizes')}}</button>
                                                    </a>
                                                    @if($item -> type != 2)
                                                        <a class="dropdown-item"  href="{{route('itemMaterials' , $item -> id)}}">
                                                            <button type="button" class="btn btn-secondary" style="width: 100% ; color: white">
                                                                <i class="fas fa-cart-plus"></i>{{__('main.itemMaterials')}}</button>
                                                        </a>
                                                    @endif
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

    @include('cpanel.Items.create')
    @include('deleteModal')
</div>

<script type="text/javascript">
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
                $(".modal-body #code").val("");
                $(".modal-body #type").val("");
                $(".modal-body #name_ar").val("");
                $(".modal-body #name_en").val("");
                $(".modal-body #category_id").val('');
                // $(".modal-body #addValue").val(0);
                $(".modal-body #description_ar").val("");
                $(".modal-body #description_en").val("");
                //   $(".modal-body #isAddValue").prop('checked' , false);
                $(".modal-body #isAddValue").prop('canPurshased' , false);



                $(".modal-body .form-header").html($('<div>{{trans('main.new_item')}}</div>').text());



                $(".modal-body #profile-img-tag").attr('src', '../images/photo.png');

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
            url:'getItem' + '/' + id,
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

                            var img =  '../images/Item/' + response.img ;
                            $('#createModal').modal("show");
                            $(".modal-body #code").val(response.code);
                            $(".modal-body #type").val(response.type);
                            $(".modal-body #name_ar").val(response.name_ar);
                            $(".modal-body #name_en").val(response.name_en);
                            $(".modal-body #category_id").val(response.category_id);
                            $(".modal-body #addValue").val(response.addValue);
                            $(".modal-body #description_ar").val(response.description_ar);
                            $(".modal-body #description_en").val(response.description_en);
                            $(".modal-body #isAddValue").prop('checked' , response.isAddValue);
                            $(".modal-body #canPurshased").prop('checked' , response.canPurshased);

                            if(response.isAddValue){
                                $(".modal-body #addValue").attr('disabled', false);
                            } else {
                                $(".modal-body #addValue").attr('disabled', true);
                            }
                            $(".modal-body #id").val( response.id);

                            $(".modal-body .form-header").html($('<div>{{trans('main.edit_new')}}</div>').text());

                            $(".modal-body #profile-img-tag").attr('src', img);
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
        let url = "{{ route('destroyItem', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

</script>


</body>
</html>




