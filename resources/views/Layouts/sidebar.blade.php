<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a @if ($slag == 1) class="sidebar-link waves-effect waves-dark sidebar-link" @else  class="sidebar-link waves-effect waves-dark sidebar-link" @endif
                        href="{{ route('home') }}" aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_dashborad') }}</span>
                    </a>
                </li>
                <li class="nav-item sidebar-item  has-submenu">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#">
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
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a @if ($slag == 2) class="sidebar-link waves-effect waves-dark sidebar-link" @else  class="sidebar-link waves-effect waves-dark sidebar-link" @endif 
                    href="{{ route('employees') }}" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">{{ __('main.side_employees') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html"
                        aria-expanded="false">
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
