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
    @include('layout.side' , ['slag' => 1])
    <div class="page-wrapper   @if(Config::get('app.locale') == 'ar') right @else  left  @endif ">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Library
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="{{route('items')}}">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-food-fork-drink"></i>
                            </h1>
                            <h6 class="text-white">{{__('main.side_items')}}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{route('pos')}}">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-calculator"></i>
                            </h1>
                            <h6 class="text-white">{{__('main.side_bill')}}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="{{ route('recipt') }}">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-currency-usd"></i>
                                </h1>
                                <h6 class="text-white">{{ __('main.recipt') }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover" onclick="showShift()">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-border-outside"></i>
                            </h1>
                            <h6 class="text-white">{{ __('main.shifts') }}</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a   href="{{ route('employees') }}" >
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-account-star"></i>
                                </h1>
                                <h6 class="text-white">{{ __('main.side_employees') }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{route('purchases')}}">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-shopping"></i>
                                </h1>
                                <h6 class="text-white">{{ __('main.purchases') }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="{{ route('clients' , 0) }}">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-relative-scale"></i>
                                </h1>
                                <h6 class="text-white">{{ __('main.client_side') }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="{{ route('clients' , 1) }}">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-pencil"></i>
                            </h1>
                            <h6 class="text-white">{{ __('main.supplier') }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a  href="{{ route('tables') }}" >
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-calendar-check"></i>
                                </h1>
                                <h6 class="text-white">{{ __('main.tables') }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a      href="{{route('report_box_transactions')}}">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-alert"></i>
                                </h1>
                                <h6 class="text-white">{{ __('main.report_box_movement') }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Site Analysis</h4>
                                </div>
                            </div>
                            <div class="row">
                                <!-- column -->
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="mdi mdi-food-variant fs-3 mb-1 font-16"></i>
                                                <h5 class="mb-0 mt-1">{{$sales_total}}</h5>
                                                <small class="font-light">{{__('main.total_sales')}}</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="mdi mdi-counter fs-3 font-16"></i>
                                                <h5 class="mb-0 mt-1">{{$sales_count}}</h5>
                                                <small class="font-light">{{__('main.sales_count')}}</small>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="mdi mdi-percent fs-3 mb-1 font-16"></i>
                                                <h5 class="mb-0 mt-1">{{$sales_tax}}</h5>
                                                <small class="font-light">{{__('main.total_tax')}}</small>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="mdi mdi-food-fork-drink fs-3 mb-1 font-16"></i>
                                                <h5 class="mb-0 mt-1">{{$items_total}}</h5>
                                                <small class="font-light">{{__('main.sold_item_total')}}</small>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                                <h5 class="mb-0 mt-1">{{$total_expenses}}</h5>
                                                <small class="font-light">{{__('main.expenses_total')}}</small>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="mdi mdi-counter fs-3 mb-1 font-16"></i>
                                                <h5 class="mb-0 mt-1">{{$expenses_count}}</h5>
                                                <small class="font-light">{{__('main.expenses_count')}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('layout.footer')

    </div>
</div>


</body>
</html>


