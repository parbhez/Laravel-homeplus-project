<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from livedemo.base5builder.com/circloid_html/type_1/templates/blue/pages-signin-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2016 09:21:26 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Fav and touch icons -->

<title>E-Shopping</title>

	<!-- Required CSS Files -->
	<link type="text/css" href="public/assets/css/required/bootstrap/bootstrap.min.css" rel="stylesheet">
	
	<link type="text/css" href="public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.min.css" rel="stylesheet" />
	<link type="text/css" href="public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.structure.min.css" rel="stylesheet" />
	<link type="text/css" href="public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.theme.min.css" rel="stylesheet" />
	
	<link type="text/css" href="public/assets/fonts/metrize-icons/styles-metrize-icons.css" rel="stylesheet">

	<!-- More Required CSS Files -->
	<link type="text/css" href="public/assets/css/styles-core.css" rel="stylesheet" />
	<link type="text/css" href="public/assets/css/styles-core-responsive.css" rel="stylesheet" />

	<!-- Demo CSS Files -->
	<link type="text/css" href="public/assets/css/demo-files/pages-signin-2.css" rel="stylesheet" />
	<link type="text/css" href="public/assets/css/demo-files/pages-signin-signup.css" rel="stylesheet" />

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="public/assets/js/required/misc/ie10-viewport-bug-workaround.js"></script>

</head>
<body id="signin-type-2">
	<div class="container-fluid">
		<div id="body-container">
			<div class="row"> 
	        	@include('backend.errors.messages')
				@include('backend.errors.ajaxMsg')
	        </div> 
			<div class="standalone-page">
				<div class="standalone-page-logo">
					<a href="{{URL::to('login')}}">
						<img src="public/assets/images/required/logo-default.png" width="200" height="49" alt="Logo" />
					</a>
				</div>
				<div class="error-messages hidden"></div>
				<div class="standalone-page-content" data-border-top="multi">
					<div class="standalone-page-block">
						<div class="row">
							<div class="col-xs-12">
								<h2 class="heading text-center">
									<span aria-hidden="true" class="icon icon-key text-right"></span>
									<span>
										Enter your login details.
									</span>
								</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								{!!Form::open(['route'=>'login.post','class'=>'form-horizontal'])!!}
									<div class="form-group">
										<label for="inputEmail" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-9">
											<input autocomplete="on" class="form-control" id="inputEmail" placeholder="Email" type="email" name="email">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-9">
											<input autocomplete="on" class="form-control" id="inputPassword" placeholder="Password" type="password" name="password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<div class="checkbox">
												<label>
													<input type="checkbox"> Remember me
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button id="submit-form" type="submit" class="btn main-btn">Sign In</button>
											<a href="" class="btn btn-link btn-sm pull-right">I forgot my password</a>
										</div>
									</div>
								{!!Form::close()!!}
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="change-section">
									<h4 class="heading">Not Registered Yet?</h4>
									<button href="" class="btn main-btn btn-block">Create New Account</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container --> 
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Required JS Files -->
	<script type="text/javascript" src="public/assets/js/required/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="public/assets/js/required/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/assets/js/required/jquery.easing.1.3-min.js"></script>
	<script type="text/javascript" src="public/assets/js/required/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="public/assets/js/required/icheck.min.js"></script>
	<script type="text/javascript" src="public/assets/js/required/circloid-functions.js"></script>

	<!-- Optional JS Files -->
	<script type="text/javascript" src="public/assets/js/optional/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="public/assets/js/optional/toastr.min.js"></script>
	<!-- add optional JS plugin files here -->

	<!-- REQUIRED: User Editable JS Files -->
	<!-- add additional User Editable files here -->

	<!-- Demo JS Files -->
	<script type="text/javascript" src="public/assets/js/demo-files/pages-signin-2.js"></script>
<!-- Start of StatCounter Code for Default Guide -->

</body>

<!-- Mirrored from livedemo.base5builder.com/circloid_html/type_1/templates/blue/pages-signin-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2016 09:21:28 GMT -->
</html>