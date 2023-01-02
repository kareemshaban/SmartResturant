<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Smart Resturant</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/"/>
    <link rel="icon" type="image/png" sizes="16x16" href="../../cpanel/plugins/images/favicon.png">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'icomoon';
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: bold;
            font-style: normal;
        }
        @font-face {
            font-family: 'icomoon';
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: italic;
        }
        @font-face {
            font-family: 'icomoon';
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: bold;
            font-style: italic;
        }
        * {
            font-family: 'icomoon', serif !important;
        }

        .form {
            background: #ffffff !important;
        }

        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 79mm;
            background: #FFF;
            border: solid 1px black;
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top, #mid, #bot { /* Targets all id with 'col-' */
            border-bottom: 1px solid gray;
        }

        #top {
            min-height: 100px;
        }

        #mid {
            min-height: 80px;
            border-bottom: solid 1px gray;
            margin: 10px auto;

        }

        #bot {
            min-height: 50px;
        }

        #top .logo {
        / / float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        .clientlogo {
            display: block;
            margin: auto;
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .info {
            display: block;
        / / float: left;
            margin-left: 0;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
        / / padding: 5 px 0 5 px 15 px;
        / / border: 1 px solid #EEE
        }

        .tabletitle {
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            background: #EEE;
            padding: 3px;
        }

        .service {
            border-bottom: 1px solid #EEE;
        }

        .item {
            width: 24mm;
        }

        .itemtext {
            font-size: 10px;
            font-weight: bold;
            color: black;
        }

        #legalcopy {
            margin-top: 5mm;
            text-align: center;
            border-bottom: solid 1px black;
        }

        .info {
            text-align: center;
            margin: 5px auto;
            font-size: 10px;
            font-weight: bold;
        }

        th, td {
            border: solid 1px black;
        }

        .hedaer_table {
            margin: 10px auto;

        }

        .hedaer_table td {
            font-size: 10px;
            font-weight: normal;
            text-align: center;
        }

        .user {
            font-size: 13px;
            font-weight: bold;
            margin: 5px;
        }
    </style>
</head>
<body>


<div id="invoice-POS">

    <div class="info" id="top">
        <img src="{{ url('/images/Company/' . $printSetting->logo) }}" class="clientlogo">
        <label class="info">{{$companyInfo -> name_ar}} <br>
            {{$companyInfo -> fax1}} : <span>  {{__('س.ج')}}    </span>
            <br> {{$companyInfo -> fax2}} : <span>    ر . ض  </span>
            {!! $printSetting -> header_ar !!}
        </label>
    </div><!--End InvoiceTop-->

    <div id="mid" class="info">
        @if($client == 1)
            <img id='barcode'
                 src="https://api.qrserver.com/v1/create-qr-code/?data=https://seasonsge.com/showBooking/{{$bill -> identifier}}&amp;size=100x100"
                 alt=""
                 title="HELLO"
                 width="100"
                 height="100"
                 style="width: 80px; height: auto; display: block; margin: 5px auto;">
            @else
            <h2 class="text-center"> المطبخ</h2>
        @endif

        <table class="hedaer_table">
            <tr>
                <td class="tabletitle">الوقت</td>
                <td>{{\Illuminate\Support\Carbon::now()}}</td>
            </tr>
            <tr>
                <td class="tabletitle">نوع الفاتورة</td>
                <td>
                    @if($bill -> billType == 1)
                        {{__('main.bill_type1')}}
                    @elseif($bill -> billType == 2)
                        {{__('main.bill_type2')}}
                    @elseif($bill -> billType == 3)
                        {{__('main.bill_type3')}}
                    @else
                        {{__('main.bill_type4')}}
                    @endif

                </td>
            </tr>
            <tr>
                <td class="tabletitle">رقم الفاتورة</td>
                <td>{{$bill -> bill_number}}</td>
            </tr>
            <tr>
                <td class="tabletitle"> العميل </td>
                <td>{{$bill -> client ? $bill -> client -> name_ar : ''}} <br>
                    {{$bill -> client ? $bill -> client -> mobile : ''}}
                </td>
            </tr>
            <tr>
                <td class="tabletitle"> الطاولة</td>
                <td>{{$bill -> table ? $bill -> table -> name_ar   : ''}}
                    -- {{$bill -> table ? $bill -> table -> hall -> name_ar :  ''  }}</td>
            </tr>
        </table>
    </div><!--End Invoice Mid-->

    <div id="bot">

        <div id="table" class="hedaer_table">
            <table>
                <tr >
                    <td class="tabletitle"> الصنف</td>
                    <td class="tabletitle">الكمية</td>
                    <td class="tabletitle">السعر</td>
                    <td class="tabletitle">الإجمالي</td>
                </tr>

                @foreach($bill -> details as $detail)
                    <tr class="service">
                        <td class="tableitem"> {{$detail -> items[0] -> item -> name_ar}}
                                <br> {{$detail -> items[0] -> size -> label}}</td>
                        <td class="tableitem">{{$detail -> qnt}}</td>
                        <td class="tableitem">{{$detail -> priceWithVat}}</td>
                        <td class="tableitem">{{$detail -> totalWithVat}}</td>
                    </tr>
                @endforeach


                <tr class="tabletitle">
                    <td class="tabletitle">الإجمالي</td>
                    <td class="Rate"><h2></h2></td>
                    <td class="payment"><h2></h2></td>
                    <td class="payment"><h2>{{array_sum(array_column($bill -> details ->toArray() , 'totalWithVat'))}}</h2></td>
                </tr>


            </table>

            <table class="hedaer_table">
                <tr>
                    <td class="tabletitle">الإجمالي قبل الضريبة</td>
                    <td>{{$bill -> total}}</td>
                </tr>
                <tr>
                    <td class="tabletitle"> الخصم</td>
                    <td>{{$bill -> discount}}</td>
                </tr>
                <tr>
                    <td class="tabletitle"> التوصيل</td>
                    <td>{{$bill -> delivery_service}}</td>
                </tr>
                <tr>
                    <td class="tabletitle"> الخدمة</td>
                    <td>{{$bill -> serviceVal}}</td>
                </tr>
                <tr>
                    <td class="tabletitle"> الضريبة</td>
                    <td>{{$bill -> vat}}</td>
                </tr>

                <tr>
                    <td class="tabletitle">الإجمالي بعد الضريبة والخصم</td>
                    <td>{{$bill -> net}}</td>
                </tr>

            </table>
        </div><!--End Table-->


        <label class="user">CASHIER : {{\Illuminate\Support\Facades\Auth::user() -> name}}</label>
    </div><!--End InvoiceBot-->
    <div id="legalcopy">
        {!! $printSetting -> footer_ar !!}
    </div>
</div><!--End Invoice-->
</body>
