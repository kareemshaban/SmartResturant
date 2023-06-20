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
    @include('layout.side' , ['slag' => 7 , 'subSlag' => 0])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.side_employees') , 'menue' => __('main.side_employees') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 @if(Config::get('app.locale') == 'ar') text-right @else text-left @endif">
                                    <a href="{{route('createEmployee')}}">
                                        <button id="createButton" type="button" class="btn btn-labeled btn-warning ">
                                        <span class="btn-label"><i
                                                class="fa fa-plus-circle"></i></span>{{__('main.add_new')}}</button>
                                    </a>

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
                                    <th class="text-center">{{ __('main.job') }}</th>
                                    <th class="text-center">{{ __('main.operations') }}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($employees as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name_ar }}</td>
                                        <td class="text-center">{{ $item->name_en }}</td>
                                        <td class="text-center">  {{  ( Config::get('app.locale') == 'ar') ? $item->Job -> name_ar :  $item->Job -> name_en }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('editEmployee', $item->id) }}"> <button
                                                    type="button" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></button> </a>
                                             <button
                                                    type="button" class="btn btn-danger deleteBtn" value="{{$item -> id}}"><i
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

    @include('deleteModal')
</div>

<script type="text/javascript">
    var id = 0;
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




    function confirmDelete(){
        let url = "{{ route('destroyEmployee', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }
</script>


</body>
</html>









