<div id="bootstrap-sidebar" class="light-theme big-icon-menu">
    <ul class="sidebar-nav">
        <li>
            <a class="navbar-brand" href="{{route('home')}}" style="width: 100%; margin-bottom: 50px;">

                    <img
                        src="{{asset('assets/images/logo-icon.png')}}"
                        alt="homepage"
                        class="light-logo"
                        width="25"
                        style="display: block ; margin: auto ; width: 50px; border-bottom: solid 3px lightgray;padding-bottom: 30px;"
                    />

            </a>
        </li>
        <li >
            <button type="button" class="btn btn-labeled btn-success" name="action" form="header-form"
                    value="pay_prepare" id="pay_prepare">
                <span class="btn-label"><i class="fa fa-check"></i></span> <br>{{__('main.pay_prep') . ' (F9)'}}
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-warning paymentBillButton">
                <span class="btn-label"><i class="fa fa-dollar"></i></span>  <br> {{__('main.pay')  . ' (F6)' }}</button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-secondary" id="partialPayment">
                <span class="btn-label"><i class="fa fa-dollar"></i></span>  <br> {{__('main.pay_partial')  . ' (F7)' }}</button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-info " form="header-form" name="action"
                    value="prepare" id="prepare">
                <span class="btn-label"><i class="fa fa-shopping-bag"></i></span>  <br> {{__('main.prepare')  . ' (F3)'}}
            </button>

        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-primary " onclick="increaseQnt()">
                <span class="btn-label"><i class="fa fa-plus-circle tools"></i> </span></button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-dark " onclick="decreaseQnt()">
                <span class="btn-label"><i class="fa fa-minus-circle tools"></i></span></button>
        </li>
        <li >
            <button type="button" class="btn btn-labeled btn-danger " onclick="removeItem()">
                <span class="btn-label"><i class="fa fa-trash tools"></i></span></button>
        </li>

        <li>
            <button type="button" class="btn btn-labeled btn-warning  print_btn">
                <span class="btn-label"><i class="fa fa-print"></i></span>  <br> {{__('main.print') . ' (F2)' }}
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-danger " id="cancelOrder">
                <span class="btn-label"><i class="fa fa-remove"></i></span>  <br>{{__('main.cancel_order')  . ' (F12)' }}
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-info" onclick="refresh(1)">
                <span class="btn-label"><i class="fa fa-refresh"></i></span>  <br>{{__('main.refresh' ) . ' (F5)'}}
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-dark" id="mediumButton" onclick="openTables()">
                <span class="btn-label"><i class="fa fa-cutlery"></i></span>  <br> {{   __('main.tables')   . ' (F11)' }}
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-labeled btn-danger" id="unpaidBills">
                                <span class="btn-label"><i
                                        class="fa fa-calculator"></i></span>  <br> {{   __('main.unpaidBills' ) . ' (F8)'}}
            </button>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user() -> email == '0000@restaurant.com')
            <li>
                <button type="button" class="btn btn-labeled btn-danger" id="deleteBill">
                                <span class="btn-label"><i
                                        class="fa fa-trash"></i></span> {{   __('main.delete')}}
                </button>
            </li>
        @endif
        <li>

        </li>
        <li>

        </li>
    </ul>
</div>
