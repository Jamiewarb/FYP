<?php
// Load global functions and open session
session_start();


include_once('resources/functions/functions.php');

if (isset($_SESSION['login_user'])) {
	header("Location: index");
	exit();
}
?>

<!DOCTYPE html>
<html>	
	<head>

		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Shnip.it - Efficient Cross-Project Snippet Reuse Tool</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="resources/css/main.css">
		<link rel="stylesheet" href="resources/css/login.css">
		<!--[if IE]>
		<link href="resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
		<![endif]--> 

	</head>
	
	<body>
	
		<?php include_once($root . "/resources/includes/navsection.php"); ?>

		
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-info filled" id="loginbox">

						<div class="panel-body">

							<h3>Welcome Back! Please Sign In</h3>

							<hr class="colorgraph">

							<?php // Error handling
							echo '<div id="login-alert" class="alert alert-danger col-sm-12';

							if (isset($_GET['e'])) { 
								if ($_GET['e'] == "snipcreate") {
									echo '">You must login to create a snippet.';
								} else {
									echo ' hidden">No error';
								
								}
							} else {
								echo ' hidden">No error';							
							}

							echo '</div>';
							?>

							</div>

							<form id="loginform" class="form-horizontal" role="form">
										
								<div class="input-group spacer">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
								</div>
									
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
								</div>
								<p class="help-block"><a class="forgot-pw" href="#">Forgot password?</a></p>
										

									
								<div class="input-group">
									<div class="checkbox">
										<label>
											<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
										</label>
									</div>
								</div>


								<div style="margin-top:10px" class="form-group">
									<!-- Button -->

									<div class="col-sm-12 controls">
									  <a id="btn-login" href="#" class="btn btn-success">Login  </a>
									  <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

									</div>
								</div>


								<div class="form-group">
									<div class="col-md-12 control">
										<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
											Don't have an account! 
										<a href="#" onClick="$('#loginbox').addClass('hidden'); $('#signupbox').removeClass('hidden'); $('#login-alert').addClass('hidden')">
											Sign Up Here
										</a>
										</div>
									</div>
								</div>    
							</form>  
						</div>
					</div> <!-- Login box end -->

					<div class="panel panel-info filled hidden" id="signupbox">

						<div class="panel-body">

							<h3>Welcome to Shnip.it!</h3>

							<hr class="colorgraph">

							<div id="login-alert" class="alert alert-danger col-sm-12 hidden"></div>

							<form id="signupform" class="form-horizontal" role="form">
								
								<div class="input-group spacer">Please enter a username and password to sign up</div>

								<div class="input-group spacer">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="signup-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
								</div>
									
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="signup-password" type="password" class="form-control" name="password" placeholder="password">
								</div>


								<div style="margin-top:10px" class="form-group">
									<!-- Button -->

									<div class="col-sm-12 controls">
									  <a id="btn-signup" href="#" class="btn btn-success">Sign up  </a>
									  <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

									</div>
								</div>


								<div class="form-group">
									<div class="col-md-12 control">
										<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
											<a href="#" onClick="$('#signupbox').addClass('hidden'); $('#loginbox').removeClass('hidden'); $('#login-alert').addClass('hidden')">
												I already have an account!
											</a>
										</div>
									</div>
								</div>    
							</form>  
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- JS and analytics only. -->
		<!-- Bootstrap core JavaScript, jQuery and identicon
		================================================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
		<script src="resources/js/pnglib.js"></script>
		<script src="resources/js/identicon.js"></script>
		<script>
		$(document).ready(function() {

			$('#loginform').keypress(function(e){
				if(e.keyCode==13)
					$('#btn-login').click();
			});

			$('#signupform').keypress(function(e){
				if(e.keyCode==13)
					$('#btn-signup').click();
			});

			$('#btn-login').click(function() {
				$('#login-alert').addClass('hidden');
				var username = $('#login-username').val();
				var password = $('#login-password').val();
				if ($.trim(username).length>0) {
					if ($.trim(password).length>0) {
						var dataString = 'username='+username+'&password='+password;
						$.ajax({
							type: "POST",
							url: "ajaxLogin.php",
							data: dataString,
							cache: false,
							// beforeSend: function(){ } //set the button to loading or something
							success: function(data){
								if (data == "success") {
									window.location.href = "index";
								} else {
									// $('#loginbox').shake();
									// Undo the beforeSend shit here
									$('#login-alert').html("Invalid username or password. Please try again").removeClass('hidden');
									alert(data);
								}
							}
						});
					} else {
						$('#login-alert').html("Please enter your password").removeClass('hidden');
					}
				} else {
					$('#login-alert').html("Please enter your username or email address").removeClass('hidden');
				}
				return false;
			});
		});
		</script>
	
	</body>
</html>