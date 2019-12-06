<?php

// Connecting to the MySQL database
$user = 'bhandaris2';
$password = '165b8204';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_fall19_bhandaris2', $user, $password);
function my_autoloader($class){
	include 'classes/class.' . $class . '.php';
}
spl_autoload_register('my_autoloader');


// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if customerID is not set in the session and current URL not login.php redirect to login page
if (!isset($_SESSION["customerID"]) && $current_url != 'login.php') {
    header("Location: login.php");
}

// Else if session key customerID is set get $customer from the database
elseif (isset($_SESSION["customerID"])) {
	
	$customer = new customer($_SESSION["customerID"], $database);
	
}