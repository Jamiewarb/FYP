<?php
require_once($root . '/vendor/autoload.php');

$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'shnipit',
	'server' => 'localhost',
	'username' => 'shnipituser',
	'password' => 'fourwordsalluppercase',
	'charset' => 'utf8',
 
	// [optional] Table prefix
	// 'prefix' => 'shnipit_',
 
	// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
]);

/*$password = "testpass";
$options = [
    'cost' => 9,
];
$pass = password_hash($password, PASSWORD_BCRYPT, $options);
 
$database->insert("users", [
	"username" => "jamie",
	"email" => "jamiewarb@gmail.com",
	"password" => $pass,
	"firstname" => "Jamie",
	"lastname" => "Warburton"
]);



$database->update("users", [
	"password" => $passwordHash
], [
	"username" => $username
]);*/

?>