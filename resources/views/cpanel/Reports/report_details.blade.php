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
    @include('layout.side' , ['slag' => 30 , 'subSlag' => 302])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        @include('layout.cramp' , ['page_Title' => __('main.report_details') , 'menue' => __('main.reports') ])

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card">
                        @include('flash-message')

                        <form class="center" method="POST" action="{{ route('report_details') }}" enctype="multipart/form-data">
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
                                            <label>{{ __('main.bill_no') }}</label>
                                            <input type="checkbox" name="is_bill_no" id="is_bill_no"/>
                                            <input type="text" name="bill_no" id="bill_no"
                                                   class="form-control @error('bill_no') is-invalid @enderror"
                                                   placeholder="{{ __('main.bill_no') }}" autofocus />
                                            @error('bill_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label>{{ __('main.client_side') }}</label>
                                            <input type="checkbox" name="is_client" id="is_client"/>
                                            <select name="client_id" id="client_id" class="form-select @error('bill_no') is-invalid @enderror">
                                                <option selected value=""> choose...</option>
                                                @foreach($clients as $client)
                                                    <option value="{{$client -> id}}">{{  Config::get('app.locale') == 'ar' ?  $client -> name_ar : $client -> name_en }} </option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
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
                                            <label>{{ __('main.from_time') }}</label>
                                            <input type="checkbox" name="is_from_time" id="is_from_time"/>
                                            <input type="time" name="from_time" id="from_time"
                                                   class="form-control @error('from_time') is-invalid @enderror" autofocus />
                                            @error('from_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label>{{ __('main.to_time') }}</label>
                                            <input type="checkbox" name="is_to_time" id="is_to_time"/>
                                            <input type="time" name="to_time" id="to_time"
                                                   class="form-control @error('to_time') is-invalid @enderror" autofocus />
                                            @error('to_time')
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
                                            <label>{{ __('main.machines') }}</label>
                                            <input type="checkbox" name="is_machine" id="is_machine"/>
                                            <select name="machine_id" id="machine_id" class="form-select @error('machine_id') is-invalid @enderror">
                                                <option selected value=""> choose...</option>
                                                @foreach($machines as $machine)
                                                    <option value="{{$machine -> id}}">{{  $machine -> code }} -- {{  $machine -> name }} </option>
                                                @endforeach
                                            </select>
                                            @error('bill_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label>{{ __('main.shifts') }}</label>
                                            <input type="checkbox" name="is_shifts" id="is_shifts"/>
                                            <input type="text" name="shift_no" id="shift_no"
                                                   class="form-control @error('shift_no') is-invalid @enderror"
                                                   placeholder="{{ __('main.shift_no') }}" autofocus />
                                            @error('shift_no')
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
                                            <label>{{ __('main.side_cats') }}</label>
                                            <input type="checkbox" name="is_category" id="is_category"/>
                                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                                <option selected value=""> choose...</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat -> id}}">{{  Config::get('app.locale') == 'ar' ? $cat -> name_ar : $cat -> name_en }} </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <div class="container">
                                                <label>{{ __('main.side_items') }}</label>
                                                <input type="checkbox" name="is_item" id="is_item"/>
                                                <input type="text" name="item_id" id="item_id"
                                                       class="form-control @error('item_id') is-invalid @enderror"
                                                       placeholder="{{ __('main.item_auto_complete') }}" autofocus />
                                                @error('item_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>{{ __('main.users') }}</label>
                                            <input type="checkbox" name="is_user" id="is_user"/>
                                            <select name="user_id" id="user_id" class="form-select">
                                                <option selected value=""> choose...</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user -> id}}"> {{  $user -> name }} </option>
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

                $('#is_bill_no').prop('checked' , false);
                $('#bill_no').attr('disabled' , true);
                $('#bill_no').val('');
                $('#is_client').prop('checked' , false);
                $('#client_id').attr('disabled' , true);
                $('#client_id').val('');
                $('#is_from_date').prop('checked' , false);
                $('#from_date').attr('disabled' , true);
                $('#is_to_date').prop('checked' , false);
                $('#to_date').attr('disabled' , true);
                $('#to_date').val(today);
                $('#from_date').val(today);
                $('#is_from_time').prop('checked' , false);
                $('#from_time').attr('disabled' , true);
                $('#is_to_time').prop('checked' , false);
                $('#to_time').attr('disabled' , true);
                $('#to_time').val(currentTime);
                $('#from_time').val(currentTime);
                $('#is_machine').prop('checked' , false);
                $('#machine_id').attr('disabled' , true);
                $('#machine_id').val('') ;
                $('#is_shifts').prop('checked' , false);
                $('#shift_no').attr('disabled' , true);
                $('#shift_no').val('');
                $('#is_user').prop('checked' , false);
                $('#user_id').attr('disabled' , true);
                $('#user_id').val('');
                $('#is_category').prop('checked' , false);
                $('#category_id').attr('disabled' , true);
                $('#category_id').val('');
                $('#is_item').prop('checked' , false);
                $('#item_id').attr('disabled' , true);
                $('#item_id').val('');


                $('#print_type').val(0);


                $('#is_bill_no').change(function (){
                    $('#bill_no').attr('disabled' , !this.checked);
                });
                $('#is_client').change(function (){
                    $('#client_id').attr('disabled' , !this.checked);
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
                $('#is_from_time').change(function (){
                    $('#from_time').attr('disabled' , !this.checked);
                });
                $('#is_to_time').change(function (){
                    $('#to_time').attr('disabled' , !this.checked);
                });
                $('#is_machine').change(function (){
                    $('#machine_id').attr('disabled' , !this.checked);
                });
                $('#is_shifts').change(function (){
                    $('#shift_no').attr('disabled' , !this.checked);
                });
                $('#is_user').change(function (){
                    $('#user_id').attr('disabled' , !this.checked);
                });

                $('#is_category').change(function (){
                    $('#category_id').attr('disabled' , !this.checked);
                });

                $('#is_item').change(function (){
                    $('#item_id').attr('disabled' , !this.checked);
                });
            });
        </script>
        <script type="text/javascript">
            var route = "{{ url('autocomplete-search') }}";
            $('#item_id').typeahead({
                source: function (query, process) {
                    return $.get(route, {
                        query: query
                    }, function (data) {
                        return process(data);
                    });
                }
            });
        </script>


    </div>
</div>
</body>
</html>

















