<?php
// Load global functions and open session
session_start();
include_once('resources/functions/functions.php');
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

							<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

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
										<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
											Sign Up Here
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

			var hashes = [
				{id: 'jamiewarb@gmail.com', hash: '84ea8e3ae685162c6bac9fb223535330'}
			];
			var i, data;
			data = new Identicon(hashes[0].hash, 130).toString();
			document.getElementById("profile-image-id").src='data:image/png;base64,' + data;

			$('i.fa-star').click(function() {
				if ($(this).hasClass("inactive")) {
					$(this).removeClass("inactive");
				} else {
					$(this).addClass("inactive");
				}
			});
		});
		</script>
	
	</body>
</html>