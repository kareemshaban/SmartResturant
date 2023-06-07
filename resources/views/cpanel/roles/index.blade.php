<!DOCTYPE html>
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
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="shortcut icon" href="../images/favicon.png" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <br>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../cpanel/css/bootstrap.css" />

    <link href="../cpanel/css/style.min.css" rel="stylesheet">
    <link href="../cpanel/css/style.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            src: url("../fonts/ArbFONTS-The-Sans-Plain.otf");
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'icomoon';
        }
    </style>
</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('Layouts.cheader')
    @include('Layouts.sidebar', ['slag' => 10])

    <div class="page-wrapper" @if(Config::get('app.locale') == 'ar') style="margin-right: 250px; margin-left:0px;" @endif>
        @include('Layouts.subheader', [
            'pageTitle' => Config::get('app.locale') == 'ar' ? 'صلاحيات المستخدمين': 'Users Roles',
        ])
        <div class="container-fluid">
            <form class="center" method="POST" action="{{ route('user_roles_store') }}" enctype="multipart/form-data" >
                @csrf <!-- {{ csrf_field() }} -->
            <div class="row justify-content-center">
                @include('flash-message')

                <div class="col-md-9 col-xl-7 data-entry">
                    <div class="row card-header px-0 mt-2 bg-transparent clearfix"
                    style="display: flex; align-items: center">
                        <div class="col-3 float-left pt-2">
                            <h4 class="float-left pt-2">{{__('main.user_roles')}}</h4>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="user_id" class="form-label"> {{__('main.user')}} </label>
                                <select class="form-select" id="user_id" name="user_id">
                                    <option value="" selected> choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{$user -> id}}">{{$user -> name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-3 text-right float-right card-header-actions mr-1">
                            <button type="submit" class="btn btn-labeled btn-primary "  >
                                <span class="btn-label"><i class="fa fa-check-circle"></i></span>{{__('main.save_btn')}}</button>
                        </div>
                    </div>
                    <div class="card-body px-0">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{{ __('main.id') }}</th>
                            <th class="text-center">{{ __('main.menu') }}</th>
                            <th class="text-center">{{ __('main.has_role') }}</th>
                            <th class="text-center" hidden>{{ __('main.has_role') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($roles as $role)
                              <tr id="tr-{{$role -> id}}">
                                  <td class="text-center">{{$loop -> index + 1}}</td>
                                  <td class="text-center"><input type="hidden" name="role_id[]" id="role_id[]" value="{{$role -> id}}">  {{$role -> id}}</td>
                                  <td class="text-center">{{ Config::get('app.locale') == 'ar' ? $role -> name_ar : $role -> name_en}}</td>
                                  <td class="text-center"><input name="is_role[]" id="is_role[]" type="checkbox" value="0" onchange="getHasRole(this , {{$loop -> index }})"></td>
                                  <td class="text-center"> <input name="has_role[]" id="has_role[]" type="hidden" value="0"></td>
                              </tr>

                          @endforeach

                        </tbody>


                    </table>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


<script src="../cpanel/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../cpanel/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../cpanel/js/app-style-switcher.js"></script>
<script src="../cpanel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../cpanel/js/waves.js"></script>
<script src="../cpanel/js/sidebarmenu.js"></script>
<script src="../cpanel/js/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#user_id').value = '';
        $('#user_id').change(function (){
             $.ajax(
                 {
                     type:'get',
                     url:'/user_roles_get' + '/' + this.value,
                     dataType: 'json',

                     success:function(response){
                         console.log(response);
                         setUserRoles(response);
                     }
                 }
             );
        });

    });
    function setUserRoles(response){
      const table = document.getElementById('table');
      const body = table.getElementsByTagName('tbody')[0];
      const trs = body.getElementsByTagName('tr');
      for (let r = 0 ; r < trs.length ; r ++){
          const Rtd = trs[r].getElementsByTagName('td')[3];
          const Rtd2 = trs[r].getElementsByTagName('td')[4];
          const Rinp = Rtd.getElementsByTagName('input')[0];
          const Rinp2 = Rtd2.getElementsByTagName('input')[0];
          Rinp.checked = false ;
          Rinp.value = 0 ;
          Rinp2.value = 0 ;
      }
      for(let i = 0 ; i < response.length ; i++){
          var id = 'tr-' + response[i].role_id ;
          const tr = document.getElementById(id);
          console.log(tr);
          if(tr){
              const td = tr.getElementsByTagName('td')[3];
              const inp = td.getElementsByTagName('input')[0];

              const td2 = tr.getElementsByTagName('td')[4];
              const inp2 = td2.getElementsByTagName('input')[0];
              inp.checked = true ;
              inp.value = 1 ;
              inp2.value = 1 ;
          }

      }
    }
    function getHasRole(ele , index){
        console.log(index);
            const table = document.getElementById('table');
            const body = table.getElementsByTagName('tbody')[0];
        var tr = null ;
            if(index < 10)
             tr = body.getElementsByTagName('tr')[index];
            else
                tr = body.getElementsByTagName('tr')[index];

            const td = tr.getElementsByTagName('td')[4];
            const inp = td.getElementsByTagName('input')[0];
            inp.value = ele.checked ? "1" : "0" ;
        console.log(tr);
    }
</script>
</body>
