



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
    @include('layout.side' , ['slag' => 30 , 'subSlag' => 314])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.stock_report') , 'menue' => __('main.reports') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')

                        <form class="center" method="POST" action="{{ route('stock_report') }}" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 @if(Config::get('app.locale') == 'ar') text-right @else text-left @endif">
                                        <button type="submit" class="btn btn-labeled btn-primary "  >
                                            <span class="btn-label"><i class="fa fa-eye"></i></span>{{__('main.search_btn')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf
                                <!-- {{ csrf_field() }} -->
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-6">
                                            <label>{{ __('main.side_items') }}</label>
                                            <input type="checkbox" name="is_category" id="is_category"/>
                                            <select name="category" id="category" class="form-select">
                                                <option selected value="0"> choose...</option>
                                                @foreach($items as $category)
                                                    <option selected value="{{$category -> id}}"> {{ Config::get('app.locale') == 'ar' ?
                                                $category -> name_ar : $category -> name_en}}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-6">
                                            <label>{{ __('main.print_type') }}</label>
                                            <select name="print_type" id="print_type" class="form-select">
                                                <option selected value="0"> {{__('main.print_type1')}}</option>
                                                <option  value="1"> {{__('main.print_type2')}}</option>
                                                <option  value="2"> {{__('main.print_type3')}}</option>


                                            </select>

                                        </div>

                                    </div>
                                </div>

                            </div>



                        </form>


                    </div>


                </div>

            </div>

            @include('layout.footer')


        </div>


    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log('ready');
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
        console.log(now);
        var currentTime = now.toISOString().substring(11,16);
        console.log(currentTime);


        $('#is_category').prop('checked' , false);
        $('#category').attr('disabled' , true);
        $('#category').val('') ;


        $('#print_type').val(0);


        $('#is_category').change(function (){
            $('#category').attr('disabled' , !this.checked);
        });
        $('#is_report_type').change(function (){
            $('#report_type').attr('disabled' , !this.checked);
        });



    });
</script>

</body>
</html>













