<?php
// Load global functions and open session
session_start();
include_once("resources/functions/functions.php");


$datas = $database->select("snippets", [
	"[>]users" => ["creator_id" => "id"],
],[ 
	"snippets.id",
	"snippets.creator_id",
	"snippets.created_date",
	"snippets.snippet_votes_count",
	"snippets.child_snippet_ids",
	"snippets.privacy_setting",

	"snippets.title",
	"snippets.language",
	"snippets.tags",
	"snippets.updated_date",
	"snippets.updated_by_id",
	"snippets.description",
	"snippets.snippet_data",

	"users.username",
	"users.firstname",
	"users.lastname",
	"users.infoline1",
	"users.infoline2"
], [
	"LIMIT" => 10,
	"ORDER" => "snippets.snippet_votes_count DESC"
]);

// If we found something
if (!$datas) {
	// There was no snippet returned
	$snippet_error = "No snippets found.";
}

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
						<p>We are a snippet repository with a focus on collaboration and cross-project code to help you reuse the best snippets.<br>
						Get started by viewing some of our public snippets below, or <a href="#" class="alert-link">create one of your own!</a></p> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="col-thicksep">
						<h3>Popular Public Snippets<small><a class="viewall" href="#">View all</a></small></h3>
					</div>
					<ul class="snippet-list">


						<?php foreach ($datas as $data) { 
							$tags = explode(",", $data["tags"]);
						?>

						<li>
							<!-- .active -->
							<i class="fa fa-star fav-snippet inactive"></i> <span class="snippet-titleline"><a href="snippet?s=<?php echo $data["id"]; ?>"><strong><?php echo $data["title"]; ?></strong></a></span><br>
							<span class="snippet-subline">
								<a href="search?l=<?php echo $data["language"]; ?>"><span class="lang<?php echo ' ' . $data["language"]; ?>"><?php echo $data["language"]; ?></span></a>
								<span class="tags"> 
									<?php foreach ($tags as $tag) {?>
										<a href="search?t=<?php echo $tag; ?>"><?php echo $tag; ?></a>
									<? } ?>
								</span>
								<span class="saved-by">
									-- faved by <?php echo $data["snippet_votes_count"]; ?> people
								</span>
							</span><br>
							<span class="snippet-byline">
								Posted
								<span class="time-moment" data-len="0" datetime="<?php echo $data["created_date"]; ?>">
									<?php echo date('M d \'y \a\t G:i', strtotime($data["created_date"])); ?>
								</span> 
								by <a href="profile?u=<?php echo $data["username"]; ?>"><?php echo $data["username"]; ?></a>
							</span>
						</li>

						<?php } ?>

					</ul>
				</div>
				<div class="col-md-6">
					<div class="col-thicksep">
						<h3>Active Private Snippets<small><a class="viewall" href="#">View all</a></small></h3>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.min.js"></script>
		<script src="resources/js/moment-maker.js"></script>

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