<?php
// Load global functions and open session
session_start();
include_once("resources/functions/functions.php");
?>

<!DOCTYPE html>
<html>	
	<head>

		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="canonical" href="index.php">
		<title>Shnip.it - Efficient Cross-Project Snippet Reuse Tool</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="resources/css/main.css">
		<!--[if IE]>
		<link href="resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
		<![endif]--> 

	</head>
	
	<body>
	
		<?php include_once($root . "/resources/includes/navsection.php"); ?>

		<div class="container filled" id="home-panel">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<p><strong>Welcome to Shnip.it!</strong></p>
						<p>We are a snippet repository with a focus on collaboration and cross-project code.<br>
						Get started by viewing some of our public collections below, or <a href="#" class="alert-link">create one of your own!</a></p> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="col-thicksep">
						<h3>Popular Public Snippets</h3>
					</div>
					<ul class="snippet-list">
						<li>
							<i class="fa fa-star fav-snippet active"></i> <span class="snippet-titleline"><a href="snippet"><strong>Cheeky HTML 5 boilerplate</strong></a></span><br>
							<span class="snippet-subline">
								<a href="#"><span class="lang html">html</span></a>
								<span class="tags"> 
									<a href="#">html</a> <a href="#">boiler</a> <a href="#">plate</a>
								</span>
								<span class="saved-by">
									-- faved by 37 people
								</span>
							</span>
						</li>
						<li>
							<i class="fa fa-star fav-snippet inactive"></i> <a><strong>Some more code here</strong></a></span><br>
							<span class="snippet-subline">
								<a><span class="lang java">java</span></a>
								<span class="tags"> 
									<a>java</a> <a>nice</a> <a>code</a>
								</span>
								<span class="saved-by">
									-- faved by 4 people
								</span>
							</span>
						</li>
						<li>
							<i class="fa fa-star fav-snippet inactive"></i> <a><strong>Some more code here</strong></a></span><br>
							<span class="snippet-subline">
								<a><span class="lang css">css</span></a>
								<span class="tags"> 
									<a>java</a> <a>nice</a> <a>code</a>
								</span>
								<span class="saved-by">
									-- faved by 4 people
								</span>
							</span>
						</li>
						<li>
							<i class="fa fa-star fav-snippet inactive"></i> <a><strong>Some more code here</strong></a></span><br>
							<span class="snippet-subline">
								<a><span class="lang ruby">ruby</span></a>
								<span class="tags"> 
									<a>java</a> <a>nice</a> <a>code</a>
								</span>
								<span class="saved-by">
									-- faved by 4 people
								</span>
							</span>
						</li>
						<li>
							<i class="fa fa-star fav-snippet inactive"></i> <a><strong>Some more code here</strong></a></span><br>
							<span class="snippet-subline">
								<a><span class="lang php">php</span></a>
								<span class="tags"> 
									<a>java</a> <a>nice</a> <a>code</a>
								</span>
								<span class="saved-by">
									-- faved by 4 people
								</span>
							</span>
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<div class="col-thicksep">
						<h3>Active Private Snippets</h3>
					</div>
					<ul class="snippet-list">
						<li>
							<i class="fa fa-star fav-snippet active"></i> <span class="snippet-titleline"><a href="#"><strong>Cheeky HTML 5 boilerplate</strong></a> -- <a href="#"><i class="fa fa-bug"></i> Company Collection</a><br>
							<span class="snippet-subline">
								<a href="#"><span class="lang html">html</span></a>
								<span class="tags"> 
									<a href="#">html</a> <a href="#">boiler</a> <a href="#">plate</a>
								</span>
								<span class="saved-by">
									-- faved by 37 people
								</span>
							</span>
						</li>
						<li>
							<i class="fa fa-star fav-snippet active"></i> <span class="snippet-titleline"><a href="#"><strong>Cheeky HTML 5 boilerplate</strong></a> -- <a href="#"><i class="fa fa-camera"></i> Jamiew Collection</a></span><br>
							<span class="snippet-subline">
								<a href="#"><span class="lang html">html</span></a>
								<span class="tags"> 
									<a href="#">html</a> <a href="#">boiler</a> <a href="#">plate</a>
								</span>
								<span class="saved-by">
									-- faved by 37 people
								</span>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div> <!-- .container#home-panel -->
	
		<!-- JS and analytics only. -->
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>


		<!-- Page-functionality code -->
		<script>
		$(document).ready(function() {
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