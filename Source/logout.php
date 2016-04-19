<?php
// Load global functions and open session
session_start();
session_destroy();

include_once('resources/functions/functions.php');

header("Location: index");

?>