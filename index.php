<?php 
session_start();

// FUNCTIONS

// LOG IN VARIFICATION FUNCTIONALITY

function isLogInValid($submittedEmail, $submittedPassword) {

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

	$query = "SELECT * FROM `users` WHERE `email` = '$submittedEmail';";

	$result = mysqli_query($db_connection, $query);

	if (mysqli_num_rows($result) > 0){

		$userInformation = mysqli_fetch_assoc($result);

		// var_dump($userInformation);

		if ($submittedEmail === $userInformation['email'] && $submittedPassword === $userInformation['password']) {

			return true;

		} else {

			return false;
		}
	}	
}
?>

<!-- FUNCTIONS END -->


<!-- BEGINNING OF HTML -->

<?php

include'snippets/header.php';


	// if session exists
	
	
	// if form was submitted...


    if (!empty($_POST)) {

    	// if logging out

    	if ('log out' === $_POST['action']) {

    		$_SESSION['loggedIn'] = false;
    		//show logged out message
    		include'snippets/log_out_message.php';
    		//show login form
    		include'snippets/login_form.php';
    	
		// if form was valid
		} else if (isLogInValid($_POST['email'], $_POST['password'])) {

			$_SESSION['loggedIn'] = true;

			// show success HTML
			include'snippets/successful_login.php';
			
			// show welcome HTML
			include'snippets/welcome_message.php';

		// else
		} else {
			// show error message
			printLoginError();
			// show form HTML		
			printLoginForm();
		}
	}

	else if ($_SESSION && $_SESSION['loggedIn'] === true) {
		//returning logged in user welcome
		include'snippets/welcome_message.php';
	// else

	} else {
		// show form HTML
		include'snippets/login_form.php';
	}

include'snippets/footer.php';
?>

 <!-- END OF HTML -->