<!DOCTYPE html>
<html lang="en">
<head>
	<title>Loker PST</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('images/logo.jpeg') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login-v4/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('assets/login-v4/images/bg-01.jpg') }}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="/forgot-password" method="POST">
                    @csrf
					<span class="login100-form-title p-b-49">
						Forgot Password
					</span>

						@if(session('error'))
						<div class="alert alert-danger alert-dismissible fade show p-b-10" role="alert">
						<strong>Gagal </strong>{{ session('error') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						@endif

						@if(session('success'))
						<div class="alert alert-success alert-dismissible fade show p-b-10" role="alert">
						<strong>Berhasil </strong>{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						@endif

						@if(session('register'))
						<div class="alert alert-success p-b-10">
							<button type="button" class="btn btn-success btn-sm close" data-dismiss="alert" sty>&times;</button>
							<h4 class="message-head">{{ session('message') }}</h4>
						</div>
						@endif

					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                        @if($errors->has('email'))
                        <small class="help-block" style="color: red">{{ $errors->first('email') }}</small>
                        @endif
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						{{-- <a href="/forgot-password">
							Forgot password?
						</a> --}}
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Forgot Password
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign In
						</span>

						<a href="/login" class="txt2">
							Sign In
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets/login-v4/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assets/login-v4/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login-v4/js/main.js') }}"></script>

</body>
</html>