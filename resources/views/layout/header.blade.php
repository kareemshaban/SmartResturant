<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
        name="keywords"
        content="Futech smartResturant pos"
    />

    <meta name="robots" content="noindex,nofollow" />
    <title>Smart POS</title>
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{asset('assets/images/favicon.png')}}"
    />
    <link href="{{asset('assets/libs/flot/css/float-chart.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet" />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <style>
        body{
            background: #eeeeee !important;
        }
        .left {
            margin-left: 250px !important;
            margin-right: 0 !important;
        }
        .right {
            margin-right: 250px !important;
            margin-left: 0 !important;
        }
        .no-page-margin{
            margin-right: 60px !important;
            margin-left: 60px !important;
        }

        .avatar-sm {
            width: 36px !important;
            height: 36px !important;
            font-size: 0.875rem;
        }
        @font-face {
            font-family: 'icomoon';
            src: url("{{asset('assets/fonts/ArbFONTS-The-Sans-Plain.otf')}}");
            src: url("{{asset('assets/fonts/ArbFONTS-The-Sans-Plain.otf')}}");
            font-weight: normal;
            font-style: normal;
        }
        *{
            font-family: 'icomoon' !important;
        }
        .fa {
            font-family: 'Font Awesome 5 Free' !important;
        }

        @if(Config::get('app.locale') == 'ar')

        .sidebar-nav .has-arrow::after {
            position: absolute;
            content: "";
            width: 7px;
            height: 7px;
            border-width: 1px 0 0 1px;
            border-style: solid;
            border-color: #fff;
            margin-left: 10px;
            transform: rotate(135deg) translate(0,-50%);
            transform-origin: top;
            top: 26px;
            left: 15px !important;
            right: unset;
            transition: all 0.3s ease-out;
            rotate: 180deg !important;
        }
        @endif
        .modal-close-btn {
            color: white;
            font-size: 20px;
            font-weight: bold;
            background: red;
            box-shadow: none;
            height: 35px;
            width: 35px;
        }
        .alertImage{
            width: 60px;
            height: 60px;
            display: block;
            margin: 0 auto;
        }
        .alertTitle{
            text-align: center;
            color: red;
            font-size: 15px;
            font-weight: bold;
            margin: 5px auto;
            display: block;
        }
        .alertSubTitle{
            text-align: center;
            color: #149ddd;
            font-size: 15px;
            font-weight: bold;
            margin: 10px auto;
            display: block;
        }
        .modelTitle{
            font-size: 20px;
            font-weight: bold;
            color: #149ddd;
        }
        .checkRow {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;

        }
        .checkRow input{
            margin-left: 20px;
            width: 20px;
        }

    </style>
</head>
