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
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="resources/css/main.css" media="screen, projection" type="text/css">
		<link rel="stylesheet" href="resources/css/snippet.css" type="text/css">
		<!--[if IE]>
		<link href="resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
		<![endif]--> 

	</head>
	
	<body>
	
		<?php include_once($root . "/resources/includes/navsection.php"); ?>

		<div class="container no-pad">
			<div class="row">
				<div class="col-md-6">
					<div class="header-left snippet-title">
						<ul>
							<li><h4 class="page-title">Cheeky HTML 5 boilerplate</h4></li>
							<li><h5><a href="#"><span class="lang html">html</span></a> <span class="tags"><a href="#">html</a> <a href="#">boiler</a> <a href="#">plate</a></span></h5></li>
							<li><h5>Updated 01/01/16 <small>Created 15/12/15</small><h5></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<a class="user-link" href="profile?a=jamiewarb">
						<div class="header-right">
							<div class="user-image">
								<img id="profile-image-id" src="" width="105" height="105">
							</div>
							<div class="info-container">
								<ul>
									<li>
										<h4><small>Snippet by</small> Jamie Warburton</h4> 
									</li>
									<li>
										<h5>CS Student</h5>
									</li>
									<li>
										<h5>University of Bath</h5>
									</li>
								</ul>
							</div>
						</div>
					</a>
				</div> <!-- col-md-6 close -->
			</div>
			<div class="row">
				<div class="col-md-12">
					<header class="snippet-headbar blue">
						Test
					</header>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<section class="edit-snippet">
						<!-- &#013;&#010; -->
						<div class="edit-snippet-body">
							<div class="row">
								<div class="col-md-12">
									<pre class="textarea-comment">/*&#013;&#010; * Here is some quick HTML5 boilerplate code! &#013;&#010; */</pre>
								</div>
								<div class="functions-right panel-blue" id="func-corner">
									<div class="functions-square"><a href="edit-snippet.html"><i class="fa fa-pencil"></i></a></div>
									<div class="functions-square"><a href="#"><i class="function-save fa fa-save"></i></a></div>
									<div class="clear"></div>
									<div class="functions-square corner-radius"><a href="#"><i class="function-trash fa fa-trash-o"></i></a></div>
									<div class="functions-square"><a href="#"><i class="function-star fa fa-star"></i></a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<pre class="textarea-body">
&lt;!doctype html>
&lt;html lang="en">
&lt;head>
  &lt;meta charset="utf-8">
  &lt;title>Title Tag&lt;/title>
  &lt;meta name="author" content="Author">
  &lt;meta name="description" content="Site Description">
  &lt;link rel="stylesheet" href="resources/css/styles.css">
  &lt;!--[if lt IE 9]>
  &lt;script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  &lt;![endif]-->
&lt;/head>
&lt;body>
 
 
 
  &lt;!-- run javascript at the end -->
  &lt;script src="resources/js/scripts.js">&lt;/script>
&lt;/body>
&lt;/html>
									</pre>
								</div>
							</div>

						<div id="func-headbar">
							<div class="functions-square corner-radius"><a href="edit-snippet.html"><i class="fa fa-pencil"></i></a></div>
							<div class="functions-square"><a href="#"><i class="function-save fa fa-save"></i></a></div>
							<div class="functions-square"><a href="#"><i class="function-trash fa fa-trash-o"></i></a></div>
							<div class="functions-square"><a href="#"><i class="function-star fa fa-star"></i></a></div>
							<div class="clear"></div>
						</div>
						</div>
					</section>
					<p>Related Snippets</p>
					<p>Comments</p>
				</div>
			</div>
		</div>			
	
	
		<!-- JS and analytics only. -->
    	<!-- Bootstrap core JavaScript
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
			data = new Identicon(hashes[0].hash, 105).toString();
			document.getElementById("profile-image-id").src='data:image/png;base64,' + data;

		    $('.function-save').click(function() {
		    	alert("Snippet saved");
		    	// do save item
		    });
		    $('.function-trash').click(function() {
		      if (confirm('Are you sure you want to delete this snippet?')) {
			      // do delete item
	      	}
		    });
		    $('.function-star').click(function() {
		    	if ($(this).hasClass("fav-on")) {
		    		$(this).removeClass("fav-on");
		    		// Remove from favourites
			    } else {
					$(this).addClass("fav-on");
					// Add to favourites
			    }
		    });
		});
		</script>
	
	</body>
</html>