<?php
$root = $_SERVER['DOCUMENT_ROOT'];
header('Content-type: text/html; charset=utf-8');
include_once("connect.php");

function hashPass($pass) {
	$options = [
	    'cost' => 9,
	];
	return password_hash($pass, PASSWORD_BCRYPT, $options);
}

function loggedIn() {
	if (isset($_SESSION['login_user'])) 
		return true;
	else
		return false;
}

?>