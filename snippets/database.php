<?php


// Database Settings
$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "scotchbox";

// Create connection
$db_connection = new mysqli($db_server, $db_username, $db_password, $db_database);

// Check connection
if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error);
} 

// FUNCTIONS

// LOG IN VERIFICATION FUNCTIONALITY


function isLogInValid($submittedEmail, $submittedPassword) {

	global $db_connection;

	$clean_email = mysqli_real_escape_string($db_connection, $submittedEmail);

	$query = "SELECT * FROM `users` WHERE `email` = '$clean_email';";

	$result = mysqli_query($db_connection, $query);

	if (mysqli_num_rows($result) === 1){

		$userInformation = mysqli_fetch_assoc($result);

		// var_dump($userInformation);

		if ($submittedPassword === $userInformation['password']) {

			return true;

		} 

	return false;

	}	
}



// FUNCTIONS END 
?>