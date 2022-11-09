

<!doctype html>
<html lang="en">
  <head>
  	<title>Smart System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/auth.css">
    <link rel="shortcut icon" href="../images/favicon.png" type="">

	</head>
	<body class="img js-fullheight" style="background-image: url(../images/login_bg.jpg);">
	<section class="ftco-section">
		<div class="container">
            <div class="card_custom">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center mb-8">
					<h2 class="heading-section">{{__('main.login_title')}}</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-8">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">{{__('main.login_title1')}}</h3>
		      	<form method="POST" action="{{ route('login') }}" class="signin-form">
                    @csrf <!-- {{ csrf_field() }} -->

		      		<div class="form-group">
		      			<input type="email" id="email" name="email" class="form-control" placeholder="{{__('main.email_hint')}}" required autocomplete="email" autofocus>
		      		</div>
	            <div class="form-group">
	              <input id="password" type="password"  name="password" required autocomplete="current-password"  class="form-control" placeholder="{{__('main.password_hint')}}">
	              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">{{__('main.signin')}}</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary"> {{__('main.login_remember')}}
									  <input type="checkbox" checked name="remember" id="remember" >
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">

                                    @if (Route::has('password.request'))
                                    <a style="color: #fff" href="{{ route('password.request') }}">
                                        {{__('main.login_forget')}}
                                    </a>
                                @endif
								</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
        </div>
		</div>
	</section>

	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>

	</body>
</html>











