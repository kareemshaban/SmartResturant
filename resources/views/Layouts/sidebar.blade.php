<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" style="padding-top: 30px; padding-left: 5px;">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a @if ($slag == 1) class="sidebar-link waves-effect waves-dark sidebar-link" @else  class="sidebar-link waves-effect" @endif
                    href="{{ route('home') }}" aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_dashborad') }}</span>
                    </a>
                </li>
                <li class="nav-item sidebar-item  has-submenu">
                    <a @if ($slag == 2) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link " @endif href="javascript:;">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_basic') }}</span>
                    </a>
                    <ul class="submenu collapse">
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('religions') }}">{{ __('main.religion_title') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('departments') }}">{{ __('main.department_title') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('genders') }}">{{ __('main.gender_title') }}</a> </li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('nationalties') }}">{{ __('main.nationality_title') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('maritalStatus') }}">{{ __('main.marital_status') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('jobs') }}">{{ __('main.jobs_title') }}</a> </li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('educations') }}">{{ __('main.education_title') }}</a> </li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('countries') }}">{{ __('main.country_title') }}</a> </li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('governorates') }}">{{ __('main.governorate_title') }}</a> </li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('cities') }}">{{ __('main.cities_title') }}</a> </li>

                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('halls') }}">{{ __('main.halls') }}</a> </li>

                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('tables') }}">{{ __('main.tables') }}</a> </li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('printers') }}">{{ __('main.printers') }}</a> </li>


                    </ul>
                </li>
                <li class="sidebar-item">
                    <a @if ($slag == 3) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link " @endif
                    href="{{ route('employees') }}" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_employees') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a @if ($slag == 4) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link " @endif
                    href="{{ route('clients' , 0) }}" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.client_side') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a @if ($slag == 5) class="sidebar-link waves-effect waves-dark sidebar-link" @else  class="sidebar-link waves-effect" @endif
                    href="{{ route('clients' , 1) }}" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.supplier') }}</span>
                    </a>
                </li>

                <li class="nav-item sidebar-item  has-submenu">
                <a @if ($slag == 6) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link sidebar-link " @endif href="javascript:;">
                        <i class="fa fa-coffee" aria-hidden="true"></i>

                        <span class="hide-menu">{{ __('main.side_items') }}</span>
                    </a>
                    <ul class="submenu collapse">
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('categories') }}">{{ __('main.side_cats') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('sizes') }}">{{ __('main.side_sizes') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('items') }}">{{ __('main.menue_items') }}</a></li>
                    </ul>
                </li>
                <li class="sidebar-item" onclick="showShift()">
                    <a @if ($slag == 6) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link sidebar-link " @endif href="javascript:;"
                       aria-expanded="false">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.shifts') }}</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pos') }}"
                       aria-expanded="false">
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_bill') }}</span>
                    </a>
                </li>

                <li class="nav-item sidebar-item  has-submenu" >
                    <a @if ($slag == 7) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link sidebar-link " @endif href="javascript:;">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>

                        <span class="hide-menu">{{ __('main.settings') }}</span>
                    </a>
                    <ul class="submenu collapse">
                        <li style="padding-left: 20px;" onclick="showTaxSettings()"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="javascript:;">{{ __('main.tax_settings') }}</a></li>
                        <li style="padding-left: 20px;" onclick="showReportSettings()"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="javascript:;">{{ __('main.report_settings') }}</a></li>
                        <li style="padding-left: 20px;" onclick="showComapnySettings()"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="javascript:;">{{ __('main.company_info') }}</a></li>

                    </ul>
                </li>

                <li class="nav-item sidebar-item  has-submenu">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#">
                        <i class="fa fa-lock" aria-hidden="true"></i>

                        <span class="hide-menu">{{ __('main.roles') }}</span>
                    </a>
                    <ul class="submenu collapse">
                        <li style="padding-left: 20px;" ><a  @if ($slag == 10) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link sidebar-link " @endif
                            href="{{ route('user_roles') }}">{{ __('main.user_roles') }}</a></li>



                    </ul>
                </li>

                <li class="nav-item sidebar-item  has-submenu">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#">
                        <i class="fa fa-calculator" aria-hidden="true"></i>

                        <span class="hide-menu">{{ __('main.accountancy') }}</span>
                    </a>
                    <ul class="submenu collapse">
                        <li style="padding-left: 20px;" ><a  @if ($slag == 8) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link sidebar-link " @endif
                                                           href="{{ route('expenses_type') }}">{{ __('main.expenses_type') }}</a></li>
                        <li style="padding-left: 20px;"><a  @if ($slag == 9) class="sidebar-link waves-effect waves-dark sidebar-link active" @else  class="sidebar-link waves-effect sidebar-link sidebar-link " @endif
                                                           href="{{ route('recipt') }}">{{ __('main.recipt') }}</a></li>


                    </ul>
                </li>

                <li class="nav-item sidebar-item  has-submenu">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#">
                        <i class="fa fa-chart-bar" aria-hidden="true"></i>

                        <span class="hide-menu">{{ __('main.reports') }}</span>
                    </a>
                    <ul class="submenu collapse">
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('report_total') }}">{{ __('main.report_total') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{ route('report_details') }}">{{ __('main.report_details') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_sales_type')}}">{{ __('main.report_billType') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_daily_sales')}}">{{ __('main.report_daily_sales') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_period_sales')}}">{{ __('main.report_period_sales') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_expenses')}}">{{ __('main.report_expense_recipt') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_client_account')}}">{{ __('main.report_client_movements') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_total_transactions')}}">{{ __('main.report_movements_total') }}</a></li>
                        <li style="padding-left: 20px;" hidden><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="javascript:;">{{ __('main.report_clients_toatl_sales') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_box_transactions')}}">{{ __('main.report_box_movement') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_tax_declaration')}}">{{ __('main.report_tax_declaration') }}</a></li>
                        <li style="padding-left: 20px;"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                           href="{{route('report_tax')}}">{{ __('main.report_tax') }}</a></li>




                    </ul>
                </li>


                <li class="sidebar-item">
                    <a href="{{route('logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="sidebar-link waves-effect waves-dark sidebar-link" data-toggle="tooltip" title="" data-original-title="Logout">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_logout') }}</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<div class="show_modal">

</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<script>
    function showShift() {
        console.log('ss');
        var route = '{{route('myShift')}}';

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }


    function showTaxSettings() {
        var route = '{{route('tax-settings')}}';

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }
    function showReportSettings() {
        var route = '{{route('report-settings')}}';

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }
    function showComapnySettings() {
        var route = '{{route('company')}}';

        $.get( route, function( data ) {
            $( ".show_modal" ).html( data );
            $('#paymentsModal').modal('show');
        });
    }
</script>
