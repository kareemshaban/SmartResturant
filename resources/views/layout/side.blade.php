<aside class="left-sidebar" @if(Config::get('app.locale') == 'ar')  style="right: 0" @endif data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item  @if ($slag == 1) active @endif"
                    @if(Config::get('app.locale') == 'ar')  style="direction: rtl"
                    @endif   @if(Config::get('app.locale') == 'ar')  style="direction: rtl"
                    @endif  @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('home')}}"
                        aria-expanded="false"
                    ><i class="mdi mdi-view-dashboard"></i
                        ><span class="hide-menu">{{ __('main.side_dashborad') }}</span></a
                    >
                </li>
                <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('pos') }}"
                        aria-expanded="false"
                    ><i class="mdi mdi-calculator"></i
                        ><span class="hide-menu">{{ __('main.side_bill') }}</span></a
                    >
                </li>


                <li class="sidebar-item @if ($slag == 2) active selected @endif"
                    @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false"
                    ><i class="mdi mdi-food-fork-drink"></i
                        ><span class="hide-menu">{{ __('main.side_items') }} </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('categories')}}" class="sidebar-link @if ($subSlag == 21) active @endif"
                            ><i class="mdi mdi-menu"></i
                                ><span class="hide-menu"> {{ __('main.side_cats') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('sizes') }}" class="sidebar-link @if ($subSlag == 22) active @endif"
                            ><i class="mdi mdi-format-size"></i
                                ><span class="hide-menu"> {{ __('main.side_sizes') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('items') }}" class="sidebar-link @if ($subSlag == 23) active selected @endif"
                            ><i class="mdi mdi-food-fork-drink"></i
                                ><span class="hide-menu"> {{ __('main.menue_items') }} </span></a
                            >
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if ($slag == 3) active @endif"
                    @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false"
                    ><i class="mdi mdi-shopping"></i
                        ><span class="hide-menu">{{ __('main.purchases') }} </span></a>
                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('purchases')}}" class="sidebar-link @if ($subSlag == 31) active @endif"
                            ><i class="mdi mdi-shopping"></i
                                ><span class="hide-menu"> {{ __('main.purchases_list') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('create_purchase') }}" class="sidebar-link @if ($subSlag == 32) active @endif"
                            ><i class="mdi mdi-cart-plus"></i
                                ><span class="hide-menu"> {{ __('main.purchases_create') }} </span></a
                            >
                        </li>

                    </ul>
                </li>




                <li class="sidebar-item @if ($slag == 4 ) active @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false"
                    ><i class="mdi mdi-currency-usd"></i
                        ><span class="hide-menu">{{ __('main.accountancy') }} </span></a
                    >
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('expenses_type') }}" class="sidebar-link  @if ($subSlag == 41) active @endif"
                            ><i class="mdi mdi-menu"></i
                                ><span class="hide-menu"> {{ __('main.expenses_type') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('recipt') }}" class="sidebar-link  @if ($subSlag == 42) active @endif"
                            ><i class="mdi mdi-currency-usd"></i
                                ><span class="hide-menu"> {{ __('main.recipt') }} </span></a
                            >
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if ($slag == 30 ) active @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false"
                    ><i class="mdi mdi-move-resize-variant"></i
                        ><span class="hide-menu">{{ __('main.reports') }} </span></a
                    >
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('report_total') }}" class="sidebar-link @if ($subSlag == 301) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_total') }}</span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('report_details') }}" class="sidebar-link @if ($subSlag == 302) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_details') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_sales_type')}}" class="sidebar-link @if ($subSlag == 303) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_billType') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_daily_sales')}}" class="sidebar-link @if ($subSlag == 304) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_daily_sales') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_period_sales')}}" class="sidebar-link @if ($subSlag == 305) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_period_sales') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_expenses')}}" class="sidebar-link @if ($subSlag == 306) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_expense_recipt') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_client_account')}}" class="sidebar-link @if ($subSlag == 307) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_client_movements') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_supplier_account')}}" class="sidebar-link @if ($subSlag == 308) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_supplier_movements') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_total_transactions')}}" class="sidebar-link @if ($subSlag == 309) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_movements_total') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_box_transactions')}}" class="sidebar-link @if ($subSlag == 310) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_box_movement') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_tax_declaration')}}" class="sidebar-link @if ($subSlag == 311) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_tax_declaration') }} </span></a  >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('report_tax')}}" class="sidebar-link @if ($subSlag == 312) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.report_tax') }} </span></a  >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('purchase_report')}}" class="sidebar-link @if ($subSlag == 313) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.purchase_report') }} </span></a  >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{route('stock_report')}}" class="sidebar-link @if ($subSlag == 314) active @endif"
                            ><i class="mdi mdi-message-outline"></i
                                ><span class="hide-menu"> {{ __('main.stock_report') }} </span></a  >
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item @if ($slag == 7) active  selected @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('employees')}}"
                        aria-expanded="false"
                    ><i class="mdi mdi-account"></i
                        ><span class="hide-menu">{{ __('main.side_employees') }}</span></a
                    >
                </li>

                <li class="sidebar-item   @if ($slag == 8) active  selected @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link waves-effect waves-dark  "
                        href="{{route('clients' , 0)}}"
                        aria-expanded="false"
                    ><i class="mdi mdi-account"></i
                        ><span class="hide-menu">{{ __('main.client_side') }}</span></a
                    >
                </li>
                <li class="sidebar-item  @if ($slag == 9) active  selected @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('clients' , 1)}}"
                        aria-expanded="false"
                    ><i class="mdi mdi-account"></i
                        ><span class="hide-menu">{{ __('main.supplier') }}</span></a
                    >
                </li>



                <li class="sidebar-item @if ($slag == 10) active @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false"
                    ><i class="mdi mdi-database"></i
                        ><span class="hide-menu">{{ __('main.side_basic') }} </span></a
                    >
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('religions') }}" class="sidebar-link @if($subSlag == 101) active @endif"
                            ><i class="mdi mdi-sign-caution"></i
                                ><span class="hide-menu"> {{ __('main.religion_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('departments') }}" class="sidebar-link @if($subSlag == 102) active @endif"
                            ><i class="mdi mdi-menu"></i
                                ><span class="hide-menu"> {{ __('main.department_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('genders') }}" class="sidebar-link @if($subSlag == 103) active @endif"
                            ><i class="mdi mdi-gender-male-female"></i
                                ><span class="hide-menu"> {{ __('main.gender_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('nationalties') }}" class="sidebar-link @if($subSlag == 104) active @endif"
                            ><i class="mdi zmdi-globe"></i
                                ><span class="hide-menu"> {{ __('main.nationality_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('maritalStatus') }}" class="sidebar-link @if($subSlag == 105) active @endif"
                            ><i class="mdi mdi-stairs"></i
                                ><span class="hide-menu"> {{ __('main.marital_status') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('jobs') }}" class="sidebar-link @if($subSlag == 106) active @endif"
                            ><i class="mdi mdi-factory"></i
                                ><span class="hide-menu"> {{ __('main.jobs_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('educations') }}" class="sidebar-link @if($subSlag == 107) active @endif"
                            ><i class="mdi mdi-collage"></i
                                ><span class="hide-menu"> {{ __('main.education_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('countries') }}" class="sidebar-link @if($subSlag == 108) active @endif"
                            ><i class="mdi zmdi-globe"></i
                                ><span class="hide-menu"> {{ __('main.country_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('governorates') }}" class="sidebar-link @if($subSlag == 109) active @endif"
                            ><i class="mdi mdi-home-map-marker"></i
                                ><span class="hide-menu"> {{ __('main.governorate_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('cities') }}" class="sidebar-link @if($subSlag == 110) active @endif"
                            ><i class="mdi mdi-home-map-marker"></i
                                ><span class="hide-menu"> {{ __('main.cities_title') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('halls') }}" class="sidebar-link @if($subSlag == 1011) active @endif"
                            ><i class="mdi mdi-home-modern"></i
                                ><span class="hide-menu"> {{ __('main.halls') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('tables') }}" class="sidebar-link @if($subSlag == 1012) active @endif"
                            ><i class="mdi mdi-table"></i
                                ><span class="hide-menu"> {{ __('main.tables') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                            <a href="{{ route('printers') }}" class="sidebar-link @if($subSlag == 1013) active @endif"
                            ><i class="mdi mdi-printer"></i
                                ><span class="hide-menu"> {{ __('main.printers') }} </span></a
                            >
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if ($slag == 7)  active @endif" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a
                        class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false"
                    ><i class="mdi mdi-alert"></i
                        ><span class="hide-menu">{{ __('main.settings') }} </span></a
                    >
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif onclick="showTaxSettings()">
                            <a href="javascript:void(0)" class="sidebar-link"
                            ><i class="mdi mdi-alert-octagon"></i
                                ><span class="hide-menu"> {{ __('main.tax_settings') }}</span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif onclick="showReportSettings()">
                            <a href="javascript:void(0)" class="sidebar-link"
                            ><i class="mdi mdi-alert-octagon"></i
                                ><span class="hide-menu"> {{ __('main.report_settings') }} </span></a
                            >
                        </li>
                        <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif onclick="showComapnySettings()">
                            <a href="javascript:void(0)" class="sidebar-link"
                            ><i class="mdi mdi-alert-octagon"></i
                                ><span class="hide-menu"> {{ __('main.company_info') }} </span></a
                            >
                        </li>

                    </ul>
                </li>


                <li class="sidebar-item" @if(Config::get('app.locale') == 'ar')  style="direction: rtl" @endif>
                    <a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  data-toggle="tooltip" title="" data-original-title="Logout"
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('logout')}}"
                        aria-expanded="false"
                    ><i class="mdi mdi-account"></i
                        ><span class="hide-menu">{{ __('main.side_logout') }}</span></a
                    >
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
