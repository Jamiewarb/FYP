<?php
// Load global functions and open session
session_start();
include_once('resources/functions/functions.php');

if (!isset($_SESSION['login_user'])) {
	// Not logged in, so send to login page
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login?e=snipcreate">';
	exit();
}

$tags = "";
$language = "";
$title = "";
$description = "";
$body = "";

$valid = true;

if ($_SERVER['REQUEST_METHOD']== "POST") {

	if (empty($_POST["language"])) {
		$errormsg = "You must select a language";
		$valid = false;
	} else if (empty($_POST["tags"])) {
		$errormsg = "You must add at least one tag";
		$valid = false;
	} else if (empty($_POST["title"])) {
		$errormsg = "You must give the snippet a title";
		$valid = false;
	} else if (empty($_POST["description"])) {
		$errormsg = "You must give the snippet a description";
		$valid = false;
	} else if (empty($_POST["body"])) {
		$errormsg = "You must give the snippet a body";
		$valid = false;
	}
	
	$tags = sanitise_input($_POST["tags"]);
	$language = sanitise_input($_POST["language"]);
	$title = sanitise_input($_POST["title"]);
	$description = sanitise_input($_POST["description"]);
	$body = sanitise_input($_POST["body"]);
	if ($valid) {
		// Put the snippet in the database
		// Get the ID of it
		// Go to that snippet page

		if (isset($_POST['button-public'])) {
			$privacy_settings = "public";
		} else if (isset($_POST['button-private'])) {
			$privacy_settings = "private";
		}

		$user_id = $_SESSION['login_user']['id'];

		$snippet_id = $database->insert("snippets", [
			"creator_id" => $user_id,
			"created_date" => date('Y-m-d H:i:s'),
			"privacy_setting" => $privacy_settings,
			"title" => $title,
			"language" => $language,
			"tags" => $tags,
			"updated_date" => date('Y-m-d H:i:s'),
			"updated_by_id" => $user_id,
			"description" => $description,
			"snippet_data" => $body,
			"total_rating" => 0,
			"total_favs" => 0
		]);

		if ($snippet_id > 0) {
			header("Location: snippet?s=" . $snippet_id);
		}
	} else {
		// We got an error
	}
}

// Sanitize data
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
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

		

		<form action="create-snippet.php" method="post">
			<div class="container no-pad">
				<?php // Error handling
				echo '<div id="login-alert" class="alert alert-danger col-sm-12';

				if (empty($errormsg)) {
					echo ' hidden">No error';
				} else {
					echo '">'. $errormsg;
				}

				echo '</div>';
				?>
				<div class="row">
					<div class="col-md-12">
						<select class="select-fields" name="language">
							<optgroup label="Language">
								<option value="html"<?php if ($language == 'html') echo ' selected="selected"'; ?>>html</option>
								<option value="css"<?php if ($language == 'css') echo ' selected="selected"'; ?>>css</option>
								<option value="javascript"<?php if ($language == 'javascript') echo ' selected="selected"'; ?>>javascript</option>
							</optgroup>
						</select>
						<input class="create-fields tagwords" placeholder="Enter tag words" name="tags" value="<?php if (!empty($tags)) echo $tags; ?>"></input>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input class="create-fields" id="create-desc" placeholder="Enter snippet title here" name="title" value="<?php if (!empty($title)) echo $title; ?>"></input>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<textarea class="create-fields" id="create-desc" placeholder="Enter snippet description here" name="description"><?php if (!empty($description)) echo $description; ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<textarea class="create-fields" id="create-body" placeholder="Write your snippet code here" name="body"><?php if (!empty($body)) echo $body; ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="create-buttons" name="button-public">Create Public Snippet</button>
						<button class="create-buttons create-buttons-private" name="button-private">Create Private Snippet</button>
					</div>
				</div>
			</div>
		</form>
	
	
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