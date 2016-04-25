<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-col">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Shnip.it</a>
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
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Create <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="create-snippet">A Snippet</a></li>
			  <li><a href="create-board">A Board</a></li>
			</ul>
		  </li>

		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Boards <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="my-boards">My Boards</a></li>
			  <li><a href="public-boards">Public Boards</a></li>
			  <!--<li class="divider"></li>-->
			</ul>
		  </li>

		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="faq">FAQ</a></li>
			  <li><a href="contact">Contact</a></li>
			</ul>
		  </li>

		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="project">Project</a></li>
			  <li><a href="team">The Team</a></li>
			</ul>
		  </li>

		  <?php if (loggedIn()) { 
		  	$user = $_SESSION['login_user']['username']; ?>
		  <li class="dropdown">
			<a href="profile?u=<?php echo $user ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user ?> <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="profile">View Profile</a></li>
			  <li class="spacer"></li>
			  <li><a href="logout">Logout</a></li>
			</ul>
		  </li>
		  <?php } else { ?>
		  <li>
			<a href="login">Login/Register </a>
			
		  </li>
		  <?php } ?>

		</ul>
	  </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<?php include_once "cookies.php"; ?>