<?php 

session_start();

	function printLoginForm() {
?>

		<form method="post" >
	 		<p>
	 			<label for="email">email</label>
	 		<input id="email" type="email" name="email" placeholder="Please enter your email address here."/>
	 		</p>

	 		<p>
	 			<label for="password">Password</label>
	 			<input id="password" type="password" name="password"/>
	 		</p>
	 		
	 		<p>
	 			<input type="submit" name="action" value="log in" action="index.php">
	 		</p>
 		</form>
<?php
	 	
	}


	function printLoginError() {

?>

			<h3>Something went wrong. Please try again.</h3>
			
<?php  

	}

	function printWelcomeHTML() {

?>
		<h2>Here are all the secrets!</h2>

		<form method="post">
			<input type="submit" name="action" value="log out" action="index.php">
		</form>
		
<?php

	}
	function printsuccessHTML() {

?>
		<h2>You have successfully logged in.</h2>

		
<?php

	}
	
	function printLogOutMessage() {
?>
		<h2>You have successfully logged out. </h2>
<?php

	}


	function isLogInValid($email, $password) {

		$KNOWN_EMAIL = "myemail@myemailprovider.com";

		$KNOWN_PASSWORD = "letmein";

		if ($email === $KNOWN_EMAIL && $password === $KNOWN_PASSWORD) {



			return true;

		} else {

			false;
		}

	}

?>



<!-- BEGINNING OF HTML -->

<!DOCTYPE html>
 <html>
 <head>
 	<title>My Secret Site</title>
 </head>
 <body>

 	<header>
 		<h1>My Secret Site</h1>
 	</header>


<?php
	
	// if session exists
	
	
	// if form was submitted...


    if (!empty($_POST)) {

    	// if logging out

    	if ('log out' === $_POST['action']) {

    		$_SESSION['loggedIn'] = false;
    		printLogOutMessage();
    		printLoginForm();
    	
		// if form was valid
		} else if (isLogInValid($_POST['email'], $_POST['password'])) {

			$_SESSION['loggedIn'] = true;

			// show success HTML
			printSuccessHTML();
			// show welcome HTML
			printWelcomeHTML();

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
		printWelcomeHTML();
	// else

	} else {
		// show form HTML
		printLoginForm();
	}

?>

 </body>
 </html>