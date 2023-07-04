


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
    @include('layout.side' , ['slag' => 30 , 'subSlag' => 307])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.report_client_movements') , 'menue' => __('main.reports') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')

                        <form class="center" method="POST" action="{{ route('report_client_account') }}" enctype="multipart/form-data">
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
                                            <label>{{ __('main.from_date') }}</label>
                                            <input type="checkbox" name="is_from_date" id="is_from_date"/>
                                            <input type="date" name="from_date" id="from_date"
                                                   class="form-control @error('from_date') is-invalid @enderror" autofocus />
                                            @error('bill_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label>{{ __('main.to_date') }}</label>
                                            <input type="checkbox" name="is_to_date" id="is_to_date"/>
                                            <input type="date" name="to_date" id="to_date"
                                                   class="form-control @error('to_date') is-invalid @enderror" autofocus />
                                            @error('to_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-6">
                                            <label>{{ __('main.client_side') }}</label>
                                            <input type="checkbox" name="is_client" id="is_client"/>
                                            <select name="client" id="client" class="form-select">
                                                @foreach($clients as $client)
                                                    <option selected value="{{$client -> id}}"> {{Config::get('app.locale') == 'ar' ? $client -> name_ar : $client -> name_en}}</option>
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

        $('#is_client').prop('checked' , false);
        $('#client').attr('disabled' , true);
        $('#client').val('');
        $('#is_from_date').prop('checked' , false);
        $('#from_date').attr('disabled' , true);
        $('#is_to_date').prop('checked' , false);
        $('#to_date').attr('disabled' , true);
        $('#to_date').val(today);
        $('#from_date').val(today);

        $('#print_type').val(0);



        $('#is_client').change(function (){
            $('#client').attr('disabled' , !this.checked);
        });
        $('#is_client').change(function (){
            $('#client_id').attr('disabled' , !this.checked);
        });
        $('#is_from_date').change(function (){
            $('#from_date').attr('disabled' , !this.checked);
        });
        $('#is_to_date').change(function (){
            $('#to_date').attr('disabled' , !this.checked);
        });


    });
</script>

</body>
</html>







