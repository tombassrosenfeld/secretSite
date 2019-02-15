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

// SIGN UP FUNCTIONALITY

function registerNewUser($firstname, $surname, $email, $password){

	global $db_connection;

	//CLEAN USER INPUT
	$clean_firstname = mysqli_real_escape_string($db_connection, $firstname);
	$clean_surname = mysqli_real_escape_string($db_connection, $surname);
	$clean_email = mysqli_real_escape_string($db_connection, $email);
	$clean_password = mysqli_real_escape_string($db_connection, $password);
	
	$query = "INSERT INTO `users` (`firstname`, `surname`, `email`, `password`) VALUES ('$clean_firstname', '$clean_surname', '$clean_email', '$clean_password');";

	$result = mysqli_query($db_connection, $query);

	echo $query;
	echo $result;

	if ($result){
	// query ran okay
		if (mysqli_affected_rows($db_connection) == 1){
			// and we changed 1 or more rows of data
			return true;
		} else {

			return false;
		}
	}else{
		// Uh oh, query didn't run! A problem with the query
		return false;
	}

	if (mysqli_affected_rows($db_connection) === 1){
	echo 'New record ID is '.mysqli_insert_id($db_connection);
}


}



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