<?php 

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

			<h3>Something went wrong. Please try again</h3>
			
<?php  

	}

	function printSuccessHTML() {

?>
		<h2>Welcome to the secrets!</h2>
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
	// if form was submitted...
	if (!empty($_POST)) {
		// if form was valid
		if (isLogInValid($_POST['email'], $_POST['password'])) {
			// show success HTML
			printSuccessHTML();
		// else
		} else {
			// show error message
			printLoginError();
			// show form HTML		
			printLoginForm();
		}
	// else
	} else {
		// show form HTML
		printLoginForm();
	}

?>

 </body>
 </html>