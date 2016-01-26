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
		<link rel="stylesheet" href="resources/css/profile.css">
		<!--[if IE]>
		<link href="resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
		<![endif]--> 

	</head>
	
	<body>
	
		<?php include_once($root . "/resources/includes/navsection.php"); ?>

		<div class="container filled" id="profile-panel">
			<div class="row">
				<div class="col-md-6">

					<!-- Profile top left -->
					<img class="profile-image" id="profile-image-id" src="" width="130" height="130">
					<ul class="profile-main-info">
						<li>
							<h3>Jamie Warburton</h3>
						</li>
						<li>
							<h5>CS Student</h5>
						</li>
						<li>
							<h5>University of Bath</h5>
						</li>
						<li>
							<a href="#"><h5 class="snip-count"><i class="fa fa-thumb-tack"></i> 4</h5></a>
							<a href="#"><h5 class="snip-count"><i class="fa fa-star"></i> 2</h5></a>
						</li>
						<li>
							<h5><small>Member since 29/12/15</small></h5>
						</li>
					</ul>
					<div class="clear"></div>
					<a href="#" class="profile-edit-text a-blk">Edit Profile</a>

					<!-- Profile bottom left -->
					<div class="profile-bio-section">
						<h5>Bio:</h5>
						<div class="profile-bio">
							<a href="#" class="a-blk">Click here to edit</a>
							<p>(Your bio section is currently blank)</p>
						</div>
					</div>

				</div>
				<div class="col-md-4 col-md-offset-2">
						
					<!-- Profile top right -->
					<div class="profile-latest-snippets">
						<h4><i class="fa fa-thumb-tack"></i> My latest Snippets <a href="#" class="profile-latest-view-all">View all</a></h4>
						<ul class="snippet-list">
							<li>
								<i class="fa fa-star fav-snippet"></i> <span class="snippet-titleline"><a href="snippet"><strong>Cheeky HTML 5 boilerplate</strong></a></span><br>
								<span class="snippet-subline">
									<a href="#"><span class="lang html">html</span></a>
									<span class="saved-by">
										Faved by 37 people
									</span>
								</span>
							</li>
							<li>
								<i class="fa fa-star fav-snippet inactive"></i> <span class="snippet-titleline"><a href="snippet"><strong>Example PHP Code</strong></a></span><br>
								<span class="snippet-subline">
									<a href="#"><span class="lang php">php</span></a>
									<span class="saved-by">
										Faved by 14 people
									</span>
								</span>
							</li>
							<li>
								<i class="fa fa-star fav-snippet inactive"></i> <span class="snippet-titleline"><a href="snippet"><strong>Dungeon of Doom</strong></a></span><br>
								<span class="snippet-subline">
									<a href="#"><span class="lang java">java</span></a>
									<span class="saved-by">
										Faved by 4109 people
									</span>
								</span>
							</li>
						</ul>
					</div>

					<br> <!-- We need a gap here, which adjusts with bootstrap -->

					<!-- Profile bottom right -->
					<!-- Boards I can access/Boards we have in common -->
					<div class="profile-latest-boards">
						<h4><i class="fa fa-lock"></i> Boards I can access <a href="#" class="profile-latest-view-all">View all</a></h4>
						<ul class="profile-latest-list">
							<li><a href="#" class="a-blk">A JS Board <i class="fa fa-certificate"></i></a></li>
							<li><a href="#" class="a-blk">Carl's Board</a></li>
							<li><a href="#" class="a-blk">My First Board <i class="fa fa-certificate"></i></a></li>
							<li><a href="#" class="a-blk">House Board</a></li>
						</ul>
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