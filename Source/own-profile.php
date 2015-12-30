<!DOCTYPE html>
<html>	
	<head>

		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Shnip.it - Efficient Cross-Project Snippet Reuse Tool</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="resources/css/main.css">
		<link rel="stylesheet" href="resources/css/own-profile.css">

	</head>
	
	<body>
	
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-col">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Shnip.it</a>
			  </div>
			  
			  <div class="collapse navbar-collapse" id="nav-col">
				<form class="navbar-form navbar-left" role="search">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				  </div>
				  <button type="submit" class="btn btn-default">Go!</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Boards <b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li><a href="my-boards.html">My Boards</a></li>
					  <li><a href="public-boards.html">Public Boards</a></li>
					  <!--<li class="divider"></li>-->
					</ul>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Create <b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li><a href="create-snippet.html">A Snippet</a></li>
					  <li><a href="create-board.html">A Board</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li><a href="login.html">Login</a></li>
					  <li><a href="register.html">Register</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li><a href="faq.html">FAQ</a></li>
					  <li><a href="contact.html">Contact</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li><a href="project.html">Project</a></li>
					  <li><a href="team.html">The Team</a></li>
					</ul>
				  </li>
				</ul>
			  </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>


		<div class="content">
		
			<div class="profile-panel">
				<div class="profile-top-left">
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
				</div>
				<div class="profile-top-right">
					<div class="profile-latest-snippets">
						<h4><i class="fa fa-thumb-tack"></i> My latest Snippets <a href="#" class="profile-latest-view-all">View all</a></h4>
						<ul class="profile-latest-list">
							<li><a href="#" class="a-blk"><span class="lang">JS</span> - A Snippet</a></li>
							<li><a href="#" class="a-blk"><span class="lang">JS</span> - Js plugin</a></li>
							<li><a href="#" class="a-blk"><span class="lang">JS</span> - An ode to snip</a></li>
							<li><a href="#" class="a-blk"><span class="lang">JS</span> - My First Snippet</a></li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				<div class="profile-bottom-left">
					<h5>Bio:</h5>
					<div class="profile-bio">
						<p>(Your bio section is currently blank)</p>
						<a href="#" class="a-blk">Click here to edit</a>
					</div>
				</div>
				<div class="profile-bottom-right">
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
				
				<div class="clear"></div>
			</div>
			
		</div>
	
		<!-- JS and analytics only. -->
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
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

			$('.function-save').click(function() {
				alert("Snippet saved");
			});
			$('.function-trash').click(function() {
				if (confirm('Are you sure you want to delete this snippet?')) {
				  // do delete item
			}
			});
			$('.function-star').click(function() {
				if ($(this).hasClass("fav-on")) {
					alert("Snippet un-favourited");
					$(this).removeClass("fav-on");
				} else {
						alert("Snippet favourited");
						$(this).addClass("fav-on");
				}
			});
		});
		</script>
	
	</body>
</html>