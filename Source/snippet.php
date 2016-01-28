<?php
// Load global functions and open session
session_start();
include_once('resources/functions/functions.php');

if (isset($_GET['s'])) {
	$snippet_id = $_GET['s'];
} else {
	$snippet_id = NULL;
}

if (isset($snippet_id)) {
	// We have some snippet value, so search the DB for it and retrieve the information
	$datas = $database->select("snippets", [
		"[>]users" => ["creator_id" => "id"],
	],[ 
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
		"snippets.id" => $snippet_id,
		"LIMIT" => 1
	]);

	// If we found something
	if ($datas) {
		// Then we put it in to some variables to make it easier later on
		foreach($datas as $data) {
			$creator_id = $data["creator_id"];
			$created_date = $data["created_date"];
			$snippet_votes_count = $data["snippet_votes_count"];
			$child_snippet_ids = $data["child_snippet_ids"];
			$privacy_setting = $data["privacy_setting"];

			$title = $data["title"];
			$language = $data["language"];
			$tag_list = $data["tags"];
			$updated_date = $data["updated_date"];
			$updated_by_id = $data["updated_by_id"];
			$description = $data["description"];
			$snippet_data = $data["snippet_data"];

			$created_username = $data["username"];
			$created_firstname = $data["firstname"];
			$created_lastname = $data["lastname"];
			$created_infoline1 = $data["infoline1"];
			$created_infoline2 = $data["infoline2"];

			$tags = explode(",", $tag_list);
		}
	} else {
		// There was no snippet returned
		$snippet_error = "Uh oh! No snippet with that id was found.";
	}

	// Now lets get the username of the person that last updated this snippet
	$datas = $database->select("snippets", [
		"[>]users" => ["updated_by_id" => "id"],
	],[ 
		"users.username"
	], [
		"snippets.id" => $snippet_id,
		"LIMIT" => 1
	]);

	if ($datas) {
		foreach($datas as $data) {
			$updated_username = $data["username"];
		}
	}

	/*
	 * THIS CAN BE USED FOR THE SNIPPET HISTORY PAGE

	

	$snippet_histories = $database->select("snippet_history", [
		"[>]users" => ["updated_by_id" => "id"]
	], [
		"snippet_histories.id",
		"snippet_histories.title",
		"snippet_histories.language",
		"snippet_histories.tags",
		"snippet_histories.updated_date",
		"snippet_histories.updated_by_id",
		"snippet_histories.description",
		"snippet_histories.snippet_data",
		"users.username"
	], [
		"snippet_history.snippet_id" => $snippet_id,
		"LIMIT" => 1,
		"ORDER" => "updated_date DESC"
	]);

	if ($snippet_histories) {
		foreach($snippet_histories as $snippet_history) {
			$id = $snippet_history["id"];
			$title = $snippet_history["title"];
			$language = $snippet_history["language"];
			$tag_list = $snippet_history["tags"];
			$updated_date = $snippet_history["updated_date"];
			$updated_by_id = $snippet_history["updated_by_id"];
			$description = $snippet_history["description"];
			$snippet_data = $snippet_history["snippet_data"];
			$updated_username = $data["username"];

			$tags = explode(",", $tag_list);
		}
	} else {
		$snippet_error = "Sorry, that snippet seems to be corrupt.";
	}
	 *
	 */

	

} else {
	// ?s does not have a value, so no snippet to display
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index">';
	exit;
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
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="resources/css/main.css" media="screen, projection" type="text/css">
		<link rel="stylesheet" href="resources/css/snippet.css" type="text/css">
		<link rel="stylesheet" href="resources/css/prism.css" type="text/css">
		<!--[if IE]>
		<link href="resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
		<![endif]--> 

	</head>
	
	<body>
	
		<?php include_once($root . "/resources/includes/navsection.php"); ?>

		<?php if (!isset($snippet_error)) { ?>
		<div class="container no-pad">
			<div class="row">
				<div class="col-md-6">
					<div class="header-left snippet-title">
						<ul>
							<li><h4 class="page-title"><a href="snippet?s=<?php echo $snippet_id; ?>"><?php echo $title; ?></a></h4></li>
							<li><h5>
								<a href="search?l=<?php echo $language; ?>"><span class="lang<?php echo ' ' . $language; ?>"><?php echo $language; ?></span></a> 
								<span class="tags">
									<?php foreach ($tags as $tag) {?>
										<a href="search?t=<?php echo $tag; ?>"><?php echo $tag; ?></a>
									<? } ?>
								</span>
							</h5></li>
							<li><h5>Updated by <a href="profile?u=<?php echo $updated_username; ?>"><?php echo $updated_username; ?></a> - 
								<span class="time-moment" data-len="2" datetime="<?php echo $updated_date; ?>">
									<?php echo date('M d \'y \a\t G:i', strtotime($updated_date)); ?>
								</span>
								<small><a href="snippet-history?s=<?php echo $snippet_id; ?>">View History</a></small>
							</h5></li>
							<li><h5><small>Created by <a href="profile?u=<?php echo $created_username; ?>"><?php echo $created_username; ?></a> - 
								<span class="time-moment" data-len="2" datetime="<?php echo $created_date; ?>">
									<?php echo date('M d \'y \a\t G:i', strtotime($created_date)); ?>
								</span>
							</small></h5></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<a class="user-link" href="profile?u=<?php echo $created_username; ?>">
						<div class="header-right">
							<div class="user-image">
								<img id="profile-image-id" src="" width="105" height="105">
							</div>
							<div class="info-container">
								<ul>
									<li>
										<h4><small>Snippet by</small> <?php echo $created_firstname . " " . $created_lastname; ?></h4> 
									</li>
									<li>
										<h5><?php echo $created_infoline1; ?></h5>
									</li>
									<li>
										<h5><?php echo $created_infoline2; ?></h5>
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
									<!-- * Here is some quick HTML5 boilerplate code! &#013;&#010; */ -->
									<pre class="textarea-comment"><?php echo htmlspecialchars($description); ?></pre>
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
									<pre class="textarea-body line-numbers"><code class="language-<?php echo $language; ?>"><?php echo htmlspecialchars($snippet_data); ?></code></pre>
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
		<?php } else { ?>
		<div class="container filled">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h3><?php echo $snippet_error; ?></h3>
				</div>
			</div>
		</div>
		<?php } ?>	
	
	
		<!-- JS and analytics only. -->
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.min.js"></script>
		<script src="resources/js/pnglib.js"></script>
		<script src="resources/js/identicon.js"></script>
		<script src="resources/js/moment-maker.js"></script>
		<script src="resources/js/prism.js"></script>
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