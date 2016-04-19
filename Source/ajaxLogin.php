<?php

session_start();
include_once('resources/functions/functions.php');

if(isset($_POST['username']) && isset($_POST['password'])) {

	// username and password sent from form, password hashed via php hashing
	$username = $_POST['username'];
	$password = $_POST['password'];

	$datas = $database->select("users", [ 
		"id",
		"password",
		"username",
		"email"
	], [
		"OR" => [
			"username" => $username,
			"email" => $username
		]
	]);

	if ($datas) {
		foreach($datas as $data) {
			$passwordHash = $data["password"];
			if (password_verify($password, $passwordHash)) {
				$id = $data["id"];
				$username = $data["username"];
				$email = $data["email"];
				$_SESSION['login_user'] = ["id" => $id, "username" => $username, "email" => $email]; //Storing user session value.
				echo "success";
			}
		}
	}
}

?>