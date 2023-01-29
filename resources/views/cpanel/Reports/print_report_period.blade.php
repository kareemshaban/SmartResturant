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
        #invoice-POS2 {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 57mm;
            background: #FFF;
            border: solid 1px black;
        }
        #invoice-POS3 {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 210mm;
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
            direction: rtl;

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


<div @if($paper_type == 0 ) id="invoice-POS" @elseif($paper_type == 1) id="invoice-POS2" @else id="invoice-POS3" @endif >

    <div class="info" id="top">
        <img src="{{ url('/images/Company/' . $printSetting->logo) }}" class="clientlogo">
        <label class="info">{{$companyInfo -> name_ar}} <br>
            {{$companyInfo -> fax1}} : <span>  {{__('س.ج')}}    </span>
            <br> {{$companyInfo -> fax2}} : <span>    ر . ض  </span>
            {!! $printSetting -> header_ar !!}
        </label>
    </div><!--End InvoiceTop-->

    <div id="mid" class="info" style="">
        @if($report_type == 1)
        <table class="hedaer_table">
          <thead>
            <tr>
                <th class="text-center tabletitle">اسم الصنف</th>
                <th class="text-center tabletitle">الكمية</th>
                <th class="text-center tabletitle">الحجم</th>
                <th class="text-center tabletitle">السعر</th>
                <th class="text-center tabletitle">الضريبة</th>
                <th class="text-center tabletitle">الإجمالي</th>
                <th class="text-center tabletitle">الصافي</th>

            </tr>
          </thead>
            <tbody>
            <?php $sum_tot_Price = 0 ?>
               @foreach($bills as $bill)
                   <tr>
                       <td class="text-center">{{Config::get('app.locale') == 'ar'? $bill -> item_name_ar : $bill -> item_name_en}}</td>
                       <td class="text-center">{{$bill -> qnt}}</td>
                       <td class="text-center">{{$bill -> label}}</td>
                       <td class="text-center">{{$bill -> price}}</td>
                       <td class="text-center">{{ $bill -> priceWithVat - $bill -> price}}</td>
                       <td class="text-center">{{$bill -> total}}</td>
                       <td class="text-center">{{$bill -> totalWithVat}}</td>
                   </tr>
                       <?php $sum_tot_Price += $bill->totalWithVat ?>
               @endforeach
               <tr>
                   <td colspan="6" class="text-center tabletitle"> الإجمالي</td>
                   <td>{{$sum_tot_Price}}</td>
               </tr>
            </tbody>
        </table>
        @endif

            @if($report_type == 0)
                <table class="hedaer_table">
                    <thead>
                    <tr>
                        <th class="text-center tabletitle">الفئة</th>
                        <th class="text-center tabletitle">الإجمالي</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $sum_tot_Price = 0 ?>
                    @foreach(Config::get('app.locale') == 'ar'? $arabic : $english as $category => $bill)
                        @foreach($bill as $item )
                        <tr>
                            <td class="text-center">{{$category }}</td>
                            <td class="text-center">{{$item}}</td>
                        </tr>
                        <?php $sum_tot_Price += $item ?>
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="1" class="text-center tabletitle"> الإجمالي</td>
                        <td>{{$sum_tot_Price}}</td>
                    </tr>
                    </tbody>
                </table>
            @endif

    </div><!--End Invoice Mid-->

    <div id="legalcopy">
        {!! $printSetting -> footer_ar !!}
    </div>
</div><!--End Invoice-->
<script type="text/javascript">
    try {
        this.print();
    } catch (e) {

    }
</script>
</body>
